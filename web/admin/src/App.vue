<template>
    <div id="app">
        <router-view/>
    </div>
</template>


<style>
    @import '~quill/dist/quill.core.css';
    @import '~quill/dist/quill.snow.css';
    @import '~quill/dist/quill.bubble.css';
    #app {
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: #2c3e50;
    }
</style>