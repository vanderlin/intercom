var webpack = require('webpack');
var path = require('path');

module.exports = {
    context: __dirname + '/resources/assets',
    entry: [
        'webpack-dev-server/client?http://localhost:8080',
        'webpack/hot/only-dev-server',
        __dirname + '/resources/assets/js/app.js',
    ],

    output: {
        path: __dirname + '/public/js',
        filename: "bundle.js",
        publicPath: '/assets/js/'
    },

    module: {

        loaders: [
            { test: /\.jsx?$/, loaders: ['babel'], include: __dirname + '/resources/assets'},
            { test: /\.jsx$/, exclude: /node_modules/, loaders: ['jsx-loader?insertPragma=React.DOM&harmony']},
            { test: /\.jsx$/, exclude: /node_modules/, loader: 'babel-loader'},
            { test: /\.html$/, loader: "html" },
        ]
    },

    resolve: {
        extensions: ['', '.js', '.jsx']
    },

    plugins: [
        new webpack.HotModuleReplacementPlugin(),
        new webpack.NoErrorsPlugin()
    ]
};