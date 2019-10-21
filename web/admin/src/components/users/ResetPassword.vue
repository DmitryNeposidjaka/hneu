<template>
  <el-form :model="ruleForm" :rules="rules" :ref="formName" label-width="120px" class="demo-ruleForm">
    <el-form-item label="Пароль" prop="password">
      <el-input v-model="ruleForm.password" type="password"></el-input>
    </el-form-item>
    <el-form-item label="Подтверждение пароля" prop="password_confirmation">
      <el-input v-model="ruleForm.password_confirmation" type="password"></el-input>
    </el-form-item>
    <div style="margin: 20px 0px">
      <el-button @click="save(formName)" type="success">Сохранить</el-button>
      <el-button @click="$emit('passwordChanged')" type="warning">Отмена</el-button>
    </div>
  </el-form>
</template>

<script>
  export default {
      props: ['user'],
      data() {
          return {
              formName: 'ruleFormCP' + this.user.id,
              ruleForm: {
                  password: '',
                  password_confirmation: '',
              },
              rules: {
                  password: [
                      {required: true, message: 'Укажите пароль', trigger: 'blur'},
                      {min: 3, max: 255, message: 'Длина должна быть от 3 до "255 символов', trigger: 'blur'},
                  ],
                  password_confirmation: [
                      {required: true, message: 'Подтвердите пароль', trigger: 'blur'},
                      {min: 3, max: 255, message: 'Длина должна быть от 3 до "255 символов', trigger: 'blur'},
                      {validator: this.passwordConfirm, trigger: 'blur'}
                  ],
              }
          }
      },
      methods: {
          passwordConfirm(rule, value, callback) {
              if (this.ruleForm.password !== this.ruleForm.password_confirmation) {
                  callback(new Error('Пароль не подтвержден'));
              }
              callback();
          },
          resetForm(formName) {
              this.$refs[formName].resetFields();
          },
          getFormData(data = {}){
              const formData = new FormData();
              for(var key in data){
                  formData.append(key, data[key]);
              }
              return formData;
          },
          getData() {
              const vm = this;
              this.loading = true;
              this.axios({
                  method: 'post',
                  url: 'user/' + this.user.id + '/change-password',
                  data: this.getFormData(this.ruleForm)
              }).then(function (response) {
                  if (response.status == 200) {
                      vm.$emit('passwordChanged');
                  }
              }).then(function () {
                  vm.resetForm(vm.formName);
              })
          },
          save(formName) {
              let vm = this;
              this.$refs[formName].validate((valid) => {
                  if (valid) {
                      vm.getData()
                  } else {
                      return false;
                  }
              });
          }
      }
  }
</script>