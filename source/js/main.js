// styles

import '../scss/styles.scss'

// dependencies

import * as bootstrap from 'bootstrap'

import {Fancybox} from "@fancyapps/ui";
import "@fancyapps/ui/dist/fancybox/fancybox.css";

import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

import $ from 'jquery';

// global vars

window.$ = $;
window.Fancybox = Fancybox;
window.Swiper = Swiper;

window.mast = ".masthead";
window.mastHeight = $(mast).outerHeight();
window.master = $('#master');
window.velocity = 400;
window.bpDesktop = 1200;

// import custom components

function importAll(r) {
    r.keys().forEach(r);
}

window.addEventListener('DOMContentLoaded', function () {
    document.documentElement.className = document.documentElement.className.replace('no-js', 'js');
    importAll(require.context('./components/', true, /\.js$/));
});
