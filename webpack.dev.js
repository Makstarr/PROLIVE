const path = require("path");
const config = require("./webpack.config");
const webpack = require('webpack');

const {
    merge
} = require("webpack-merge")
var HtmlWebpackPlugin = require("html-webpack-plugin");

module.exports = merge(config, {
    module: {
        rules: [{
            test: /\.scss$/,
            use: ["style-loader", "css-loader", "sass-loader"]
        }]
    },
    mode: "development",
    output: {
        filename: "[name].js",
        path: path.resolve(__dirname, "dist")
    },
    
    plugins: [new HtmlWebpackPlugin({
        filename: 'about.html',
        template: "./src/about.html",
      }),
      new HtmlWebpackPlugin({
        filename: 'first.html',
        template: "./src/firstMeet.html",
      }),
      new HtmlWebpackPlugin({
        filename: 'whatwedo.html',
        template: "./src/whatwedo.html",
      }),
      new HtmlWebpackPlugin({
      filename: 'help.html',
      template: "./src/help.html",
    }), 
      new HtmlWebpackPlugin({
        template: "./src/index.html",
      }), 
      new webpack.ProvidePlugin({
        $: 'jquery',
        jQuery: 'jquery'
      })
    ]

});