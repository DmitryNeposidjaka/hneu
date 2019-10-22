module.exports = {
    // options...
    devServer: {
        disableHostCheck: true
    },
    chainWebpack: (config) => {
        config.module
            .rule('images')
            .use('url-loader')
            .tap(options => Object.assign({}, options, { name: '[name].[ext]' }));
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
