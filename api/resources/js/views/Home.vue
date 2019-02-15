<template>
  <router-view/>
</template>

<script>

export default {
  name: 'home',
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

  .el-main {
    background-color: #f4f4f5;
    color: #333;
    text-align: center;
    /* line-height: 160px; */
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