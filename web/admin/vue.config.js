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
        module: {
            rules: [{
                test: /\.(ttf|otf|eot|woff|woff2)$/,
                use: {
                    loader: "file-loader",
                    options: {
                        name: "administration/fonts/[name].[ext]",
                    },
                },
            }]
        },
        output: {
            filename: 'administration/js/[name].js',
            chunkFilename: 'administration/js/[name].js',
        }
    }
}
