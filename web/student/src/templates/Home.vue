<template>
  <el-container>
    <el-header><m-header :user="user"/></el-header>
    <el-container>
      <el-main style="border-radius: 8px;
overflow: hidden;
    height: 80vh;">
        <div class="scroller">
          <div class="m-content" style="border-radius: 5px;">
            <router-view/>
          </div>
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
  .scroller {
    overflow: hidden;
    overflow-y: scroll;
    height: 76vh;
    flex-basis: auto;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
  }
  .m-content {
    margin: auto;
    width: 90%;
    padding: 30px;
    background: white;
  }
  .scroller::-webkit-scrollbar {
      display: none;
  }
  .el-main {
    background-color: #4a4c4e;
    color: #333;
    text-align: center;
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