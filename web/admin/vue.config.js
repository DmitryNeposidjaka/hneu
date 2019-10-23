module.exports = {
    // options...
    devServer: {
        disableHostCheck: true
    },
    css: {
        extract: {
            filename: 'administration/css/[name].css',
            chunkFilename: 'administration/css/[name].css',
        },
    },
    configureWebpack: {
        output: {
            filename: 'administration/js/[name].js',
            chunkFilename: 'administration/js/[name].js',
        }
    }
}
