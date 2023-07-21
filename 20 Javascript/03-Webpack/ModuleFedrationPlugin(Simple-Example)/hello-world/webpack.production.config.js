const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const { ModuleFederationPlugin } = require('webpack').container;

module.exports = {
    mode: 'none',
    entry: './src/index.js',
    ouput: {
        filename: '[name].[contenthash].js',
        path: path.resolve(__dirname, './dist/'),
        publicPath: 'http://localhost:9001/'
    },
    devServer: {
        port: 9001,
        static: {
            // point to which directory to be run 
            directory: path.resolve(__dirname, './dist')
        },
        devMiddleware: {
            // pointing file name which will use as index file
            index: 'hello-world.html',
            // application will write in disk means in ram 
            writeToDisk: true
        },
        open: true
    },
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader']
            },
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/env'], // convert ES1-N => ES5 , support all latest features of ES6
                        plugins: ['@babel/plugin-proposal-class-properties']

                    }
                }
            }
        ]
    },
    plugins: [
        new MiniCssExtractPlugin(),
        new CleanWebpackPlugin(),
        new HtmlWebpackPlugin({
            title: 'Hello World',
            filename: 'hello-world.html',
            user: 'Admin'
        }),
        new ModuleFederationPlugin({
            name: 'HelloWorldApp',
            filename: 'remoteEntry.js',
            exposes: {
                './HelloWorldButton': './src/components/hello-world-button/hello-world-button.js'
            }
        })
    ]
} 