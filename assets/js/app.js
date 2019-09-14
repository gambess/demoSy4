/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)

//require('../css/global.scss');
import '../css/global.scss'
import '../css/app.css';

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
import $ from 'jquery';
//import 'jquery-ui' // if you need only sortable widget.
import 'bootstrap';
require ('datatables.net');
var dt = require ('datatables.net-dt');
//import './datatables.net-dt/css/jquery.dataTables.css'
//require('datatables.net-reponsive')(window);
//require('datatables.net-buttons')(window);
//require('datatables.net-bs4');
//dt(window, $);


import newjavascript from './newjavascript';

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

console.log('Webpack Encore!');
//makeDraggable();

//$(document).ready(function(){
//    $('.table').dataTable();
//});
