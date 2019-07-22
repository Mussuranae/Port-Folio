/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/homePage.css');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// const $ = require('jquery');

let instance = M.Tabs.init('tabs', swipeable = true);
// let instance = M.Tabs.getInstance(elem);

// Go read this Materialize page doc for tabs
// https://materializecss.com/tabs.html

$(document).ready(function(){
    $('.tabs').tabs();
});
