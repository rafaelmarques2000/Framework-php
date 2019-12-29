const path = require("path");

const VueLoaderPlugin = require('vue-loader/lib/plugin')

module.exports = {
    entry:"./resource/app.js",
    mode:"development",
    watch:true,
    resolve: { 
        alias: { vue: 'vue/dist/vue.esm.js' },
        extensions: ['*', '.js', '.vue', '.json']
    },
    module:{
       rules:[
           {
               test:/\.vue$/,
               loader:'vue-loader'
           },
           {
                test:/\.js$/,
                loader:'babel-loader'
           },
           {
                test: /\.css$/,
                use: [
                  'vue-style-loader',
                  'css-loader'
                ]
            }
       ]
    },
    output:{
        filename:'app.min.js',
        path:path.resolve(__dirname,"public/js")
    },
    plugins:[
        new VueLoaderPlugin()
    ]
}