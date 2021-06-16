const mix = require("laravel-mix");
mix.browserSync("https://localhost:8000");

mix.sass("resources/sass/home/app.scss", "public/css/home/app.min.css");

// mix.js("resources/js/home/cms.js", "public/js/home/cms.min.js");
// mix.js("resources/js/admin/cms.js", "public/js/admin/cms.min.js");
// mix.js("resources/js/admin/common.js", "public/js/admin/common.min.js");
// mix.sass("resources/sass/admin/app.scss", "public/css/admin/app.min.css");
