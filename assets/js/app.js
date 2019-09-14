/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)

//require('../css/global.scss');
import '../css/global.scss'
require('../css/app.css');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
var $ = require('jquery');
require('popper.js');
import 'bootstrap';
global.moment = require('moment');

//require('bootstrap');

//require("imports-loader?$=jquery!./app.js");
//import dt from 'datatables.net';
//import dt_bs from 'datatables.net-bs';


// in this call we're attaching Datatables as a jQuery plugin
// without this step $().DataTable is undefined
//dt( window, $ );
// we need to do the same step for the datatables bootstrap plugin
//dt_bs( window, $ );

//window.$.fn.DataTable = dt;
//window.$.fn.DataTable = dt_bs;

console.log('Webpack Encore! Change assets/js/app.js');

//$(document).ready(function(){
//    $('.table').dataTable();
//});
