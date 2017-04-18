var elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

const ExtractTextPlugin = require("extract-text-webpack-plugin");
const webpack = require('webpack');

var plugins = [];
var extractCSS = new ExtractTextPlugin('../css/[name].css?[contenthash]')
var cssLoader = extractCSS.extract(['css'])
var sassLoader = extractCSS.extract(['css', 'sass'])

plugins.push(extractCSS);


elixir.ready(function () {
    elixir.webpack.mergeConfig({
        resolve: {
            alias: {
                vue: 'vue/dist/vue.js',
                images : __dirname+'/resources/assets/images/',
                sass : __dirname + '/resources/assets/sass/'
            }
        },
        plugins:plugins.concat([
            new webpack.optimize.CommonsChunkPlugin('common'),
        ]),
        module: {
            loaders: [
                {test: /\.css$/, loader: cssLoader},
                {test: /\.scss$/, loader: sassLoader}
            ]
        },
        entry:{
            // 'merchant'  : './resources/assets/js/merchant/main.js',
            'user'   : './resources/assets/js/user/main.js',
            'admin' : './resources/assets/js/admin/main.js'
        }
    })
});

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.webpack(['user/main.js','admin/main.js'],'public/js/[name].js');
});