var webpack = require('webpack');
var path = require('path');

module.exports = {
    entry: [
        __dirname + '/resources/assets/js/app.js',
    ],
    context: __dirname + '/resources/assets',
    devtool: "source-map",
    output: {
        path: __dirname + '/public/js',
        publicPath: 'public/js/',
        filename: "bundle.js",
    },

    module: {
        loaders: [
            { test: /\.jsx?$/, loaders: ['babel'], include: __dirname + '/resources/assets'},
            { test: /\.jsx$/, exclude: /node_modules/, loaders: ['jsx-loader?insertPragma=React.DOM&harmony']},
            { test: /\.jsx$/, exclude: /node_modules/, loader: 'babel-loader'},
            { test: /\.html$/, loader: "vue-html-loader" },
        ]
    },

    resolve: {
        extensions: ['', '.js', '.jsx']
    },

    plugins: [
        new webpack.DefinePlugin({
            'process.env': {
                NODE_ENV: '"production"'
            }
        }),
        new webpack.optimize.UglifyJsPlugin({
            compress: {
                warnings: false
            }
        })
    ]
};