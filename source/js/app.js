import '../css/app.css'

import {Fancybox} from "@fancyapps/ui";
import "@fancyapps/ui/dist/fancybox/fancybox.css";

window.Fancybox = Fancybox;

import.meta.glob([
    './**/*.js',
    '!./app.js'
], {
    eager: true
})