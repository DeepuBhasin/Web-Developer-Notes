const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const { ModuleFederationPlugin } = require('webpack').container;

module.exports = {
    mode: 'none',
    entry: './src/index.js',
    output: {
        filename: 'bundle.js',
        path: path.resolve(__dirname, './dist/'),
        publicPath: './'
    },
    devServer: {
        port: 9002,
        static: {
            // point to which directory to be run 
            directory: path.resolve(__dirname, './dist')
        },
        devMiddleware: {
            // pointing file name which will use as index file
            index: 'kiwi.html',
            // application will write in disk means in ram 
            writeToDisk: true
        },
        open: true,
        historyApiFallback: true,
        hot: true,
        compress: true
    },
    module: {
        rules: [
            {
                test: /\.(png|jpg|jpeg)$/,
                type: 'asset/resource'
            },
            {
                test: /\.css$/,
                use: ['style-loader', 'css-loader']
            },
            {
                test: /\.scss$/,
                use: ['style-loader', 'css-loader', 'sass-loader']
            }
        ]
    },
    plugins: [
        new CleanWebpackPlugin(),
        new HtmlWebpackPlugin({
            title: 'Kiwi',
            filename: 'kiwi.html',
            user: 'Admin'
        }),
        new MiniCssExtractPlugin(),
        new ModuleFederationPlugin({
            name: 'KiwiApp',
            remotes: {
                HelloWorldApp: "HelloWorldApp@http://localhost:9001/remoteEntry.js"
            }
        })
    ]
}

