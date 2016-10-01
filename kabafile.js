"use strict";

let kaba = require("kaba");

let scss = kaba.scss("src/**/assets/scss/", "public/css/", {});
let js = kaba.js("src/**/assets/js/", "public/js/", {});

scss(false)();
js(false)();
