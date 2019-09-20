/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

import '../css/global.scss'
import '../css/app.css';

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
window.$ = window.jQuery = require( 'jquery' );

import 'popper.js';
import 'bootstrap';

require( 'datatables.net' );
require( 'datatables.net-bs4' );

import newjavascript from './newjavascript';
//newjavascript()


//console.log('Webpack Encore!');

//execute new javascript code
newjavascript();


