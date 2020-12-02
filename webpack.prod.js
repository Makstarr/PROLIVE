const path = require("path");
const config = require("./webpack.config");
const { merge} = require("webpack-merge")
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const webpack = require('webpack');

const TerserPlugin = require("terser-webpack-plugin");
var HtmlWebpackPlugin = require("html-webpack-plugin");

module.exports = merge(config, {
    mode: "production",
    
    output: {
        filename: "[name].[contentHash].js",
        path: path.resolve(__dirname, "prod")
    },
    optimization: {
    minimize: true,
      minimizer: [
        new TerserPlugin(),
        new HtmlWebpackPlugin({
          filename: 'page1.html',
          template: "./src/page1.html",
          minify: {
            removeAttributeQuotes: true,
            collapseWhitespace: true,
            removeComments: true
          }
        }), 
        new HtmlWebpackPlugin({
            template: "./src/page2.html",
            minify: {
              removeAttributeQuotes: true,
              collapseWhitespace: true,
              removeComments: true
            }
          })
      ]
    },
    plugins: [new MiniCssExtractPlugin({filename: "[name].[contentHash].css"}), new CleanWebpackPlugin(), new webpack.ProvidePlugin({
      $: 'jquery',
      jQuery: 'jquery'
    }) ],
    module: {
        rules: [{
            test: /\.scss$/,
            use: [MiniCssExtractPlugin.loader , "css-loader", "sass-loader"]
        }]
    }
});