var Encore = require('@symfony/webpack-encore');
var CopyWebpackPlugin = require('copy-webpack-plugin');
//Encore.addLoader({ test: /datatables\.net.*/, loader: 'imports-loader?define=>false' })

// Manually configure the runtime environment if not already configured yet by the "encore" command.
// It's useful when you use tools that rely on webpack.config.js file.
if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
        .setOutputPath('public/build/')
        .setPublicPath('/build')
        
        .cleanupOutputBeforeBuild()
        .enableSourceMaps(!Encore.isProduction())

        // enables Sass/SCSS support
        .enableSassLoader()

        .addEntry('app', './assets/js/app.js')
        .addStyleEntry('global', './assets/css/global.scss')
        .splitEntryChunks()

        
        .enableSingleRuntimeChunk()
        .enableBuildNotifications()


//        .configureBabel(() => {
//        }, {
//            useBuiltIns: 'usage',
//            corejs: 3
//        })


//        .autoProvidejQuery()

//        with this line activate the plugin for deploy images
        .addPlugin(new CopyWebpackPlugin([{from: './assets/images', to: 'images'}]))
        
        ;

module.exports = Encore.getWebpackConfig();
