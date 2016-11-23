module.exports = {
    vue: {
        loaders: {
            'scss': 'vue-style!css!sass'
        }
    },
    output : {
        chunkFilename : "components/component-[name]-[chunkhash:10].js",
        publicPath : "/build/js/"
    }
}