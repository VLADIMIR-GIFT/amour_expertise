const path = require('path');
const mix = require('laravel-mix'); // Déclaration de `mix` une seule fois

// Configuration de Mix
mix.js('resources/js/app.js', 'public/js')
   .vue() // Ajouter cette ligne pour activer le support de Vue
   .sass('resources/sass/app.scss', 'public/css'); // Corrige le chemin ici pour `resources/sass/app.scss`

// Configuration Webpack supplémentaire
mix.webpackConfig({
   resolve: {
      alias: {
         '@': path.resolve(__dirname, 'resources/js'), // Alias pour le dossier js
      },
      extensions: ['.js', '.jsx', '.json', '.vue', '.scss'] // Extensions des fichiers à résoudre
   },
   module: {
      rules: [
         {
            test: /\.js$/,
            exclude: /node_modules/,
            use: {
               loader: 'babel-loader',
               options: {
                  presets: ['@babel/preset-env'],
                  plugins: ['@babel/plugin-transform-object-rest-spread']
               }
            }
         }
      ]
   }
});
