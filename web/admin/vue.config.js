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
            filename: 'administration/[name].css',
            chunkFilename: 'administration/[name].css',
        },
    },
    configureWebpack: {
        output: {
            filename: 'administration/[name].js',
            chunkFilename: 'administration/[name].js',
        }
    }
}
