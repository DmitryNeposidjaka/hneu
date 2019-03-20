<template>
  <el-container>
    <el-header><m-header :user="user"/></el-header>
    <el-container>
      <el-main style="border-radius: 8px;
    overflow: hidden;
    overflow-y: scroll;
    height: 80vh;">
        <div class="m-content" style="border-radius: 5px;">
          <router-view/>
        </div>
      </el-main>
    </el-container>
  </el-container>
</template>

<script>
    import Navigation from '../components/Navigation'
    import MHeader from '../components/Header'
    export default {
        name: 'home',
        data() {
            return {
                user: {
                    username: 'default'
                }
            }
        },
        methods: {
          getUser() {
              const vm = this;
              this.loading = true;
              this.axios({
                  method: 'get',
                  url: 'user/me',
              }).then(function (response) {
                  if (response.status == 200) {
                      vm.user = response.data;
                  }
              })
          }
        },
        components: {
            Navigation, MHeader
        },
        created() {
          this.getUser();
        }
    }
</script>

<style>
  .el-dropdown-link {
    cursor: pointer;
    color: #409EFF;
  }
  .el-icon-arrow-down {
    font-size: 12px;
  }
  .m-content {
    margin: auto;
    width: 90%;
    padding: 20px;
    background: white;
  }
  .el-main::-webkit-scrollbar {
      display: none;
  }
  .el-main {
    background-color: #4a4c4e;
    color: #333;
    text-align: center;
    padding: 100px;
    /* line-height: 160px; */
  }
.el-container {
  padding: 50px;
}
  body > .el-container {
    margin-bottom: 40px;
  }

  .el-container:nth-child(5) .el-aside,
  .el-container:nth-child(6) .el-aside {
    line-height: 260px;
  }

  .el-container:nth-child(7) .el-aside {
    line-height: 320px;
  }
</style>