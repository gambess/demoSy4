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

var googleMapsClient = require('@google/maps').createClient({
  key: 'AIzaSyDr79vgwABfw7I3VqQOjEwcOaWVXtIvT9w',
  Promise: Promise
});

var latLng =  { lat: -18.196241, lng: -69.559689 };

googleMapsClient.placesNearby({
    location: latLng,
    radius: 100,
    type: 'map'
    })
    .asPromise()
  .then((response) => {
    console.log(response.json.results);
  })
  .catch((err) => {
    console.log(err);
  });



import initMap from './newjavascript';


console.log('Webpack Encore!');

//execute new javascript code
//newjavascript();


