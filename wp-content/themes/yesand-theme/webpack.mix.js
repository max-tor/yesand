// https://laravel-mix.com/docs/6.0/examples
// https://laravel-mix.com/docs/6.0/api
// https://laravel-mix.com/docs/6.0/autoprefixer
// https://github.com/postcss/autoprefixer#options

let mix = require('laravel-mix')
let path = require('path')

mix.setResourceRoot('../')
mix.setPublicPath(path.resolve('./'))

mix.webpackConfig({
  watchOptions: { ignored: [
    path.posix.resolve(__dirname, './node_modules'),
    path.posix.resolve(__dirname, './css'),
    path.posix.resolve(__dirname, './js')
  ] }
})

mix.js('resources/js/app.js', 'js')

mix.sass("resources/css/tailwind.sass", "css")
mix.sass("resources/css/app.sass", "css")
mix.postCss("resources/css/editor-style.css", "css")

// mix.autoload({ jquery: ['$', 'window.$', 'jQuery', 'window.jQuery'] })
// Does not work
// https://laracasts.com/discuss/channels/javascript/jquery-and-laravel-mix-why-you-no-work

if (mix.inProduction()) {
  mix.version()
} else {
  Mix.manifest.refresh = _ => void 0
}
