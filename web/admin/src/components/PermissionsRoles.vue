<template>
    <el-row>
        <el-col :span="8">
            <el-table
                    :data="roles"
                    style="width: 100%"
                    @row-click="rowClick">
                <el-table-column
                        prop="title"
                        label="Title"
                        width="180">
                </el-table-column>
                <el-table-column
                        prop="abilities"
                        label="Abilities"
                        width="180">
                </el-table-column>
            </el-table>
        </el-col>
        <el-col :span="16">
            <div style="text-align: center">
                <div v-if="form.role">Assign to <span style="color: #1d68a7">{{form.role.title}}</span></div>
                <el-transfer
                        style="text-align: left; display: inline-block"
                        v-model="form.permissions"
                        filterable
                        :titles="['Abilities', 'Permissions']"
                        :button-texts="['Unassign', 'Assign']"
                        :format="{
                        noChecked: '${total}',
                        hasChecked: '${checked}/${total}'
                      }"

                        :data="_abilities">
                    <!--               <el-button class="transfer-footer" slot="left-footer" size="small">Operation</el-button>
                                   <el-button class="transfer-footer" slot="right-footer" size="small">Operation</el-button>-->
                    <el-button class="transfer-footer" slot="right-footer" size="small" @click="assignAbilities" :disabled="form.role == null">Assign</el-button>
                </el-transfer>
            </div>
        </el-col>
    </el-row>
</template>

<script>
    export default {
        name: 'PermissionsRoles',
        props: ['roles', 'abilities'],
        data() {
          return {
              data: [],
              form: {
                  role: null,
                  permissions: [],
              },
          }
        },
        computed: {
            _abilities() {
                return this.abilities.map(function (item, i, array) {
                    return {
                        key: item.id,
                        label: item.title,
                        disabled: false,
                    }
                });
            }
        },
        methods: {
            handleChange(i){
                console.log(i)
            },
            rowClick(row, column, event) {
                this.form.role = row;
                this.getRolePermissions(row.id)
            },
            clearRefresh() {
                this.filters = {
                    title: '',
                };
                this.getData();
            },
            assignAbilities(){
                let id = this.form.role.id;
                let formData = {
                    permissions: this.form.permissions
                };
                this.applyPermissions(id, this.getFormData(formData))
            },
            getRolePermissions(id) {
                const vm = this;
                this.axios({
                    method: 'get',
                    url: 'permissions/role/' + id,
                }).then(function (response) {
                    if (response.status == 200) {
                        vm.form.permissions = response.data.map(function (item) {
                            return item.id
                        });
                    }
                })
            },
            applyPermissions(id, formData) {
                const vm = this;
                this.axios({
                    method: 'post',
                    url: 'permissions/role/' + id,
                    data: formData
                }).then(function (response) {
                    if (response.status == 200) {
                        vm.permissions = response.data;
                        vm.$message('Permissions has been applied.')
                    }
                })
            },
            getFormData(data = {}) {
                const formData = new FormData();
                for (var key in data) {
                    formData.append(key, data[key]);
                }
                return formData;
            },
        },
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>

</style>
