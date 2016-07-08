<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */


//Route::get('/admin', function () {
//    return view('welcome');
//});

Route::get('/', 'HomeController@index');

Route::get('contact', 'HomeController@contact');
Route::post('contact/create', 'HomeController@contactPost');

Route::get('cars', 'HomeController@cars');
Route::post('cars/create', 'HomeController@addCar');
Route::post('deleteCar', 'HomeController@deleteCar');
Route::post('deleteCarModelMain', 'HomeController@deleteCarModelMain');
Route::post('deleteCarBrand', 'HomeController@deleteCarBrand');
Route::post('deleteCarBrandModel', 'HomeController@deleteCarBrandModel');
Route::post('deleteCarOffersImgs', 'HomeController@deleteCarOffersImgs');
Route::post('deleteCarModelOffer', 'HomeController@deleteCarModelOffer');
Route::post('carbrand/create', 'HomeController@addcarbrand');
Route::post('carbrandmodel/create', 'HomeController@addcarbrandmodel');

Route::get('carsmodel', 'HomeController@carsModel');
Route::post('carsmodel/create', 'HomeController@addCarModel');
Route::post('editCarModel', 'HomeController@editCarModel');

Route::get('carsmodelmain', 'HomeController@carsmodelmain');
Route::post('carsmodelmain/create', 'HomeController@addCarModelMain');


Route::get('carsmodelimg', 'HomeController@carsModelImg');
Route::get('carsmodelotherdetails', 'HomeController@carsModelOtherDetails');

Route::get('carsmodelotherdetails', 'HomeController@carsmodelotherdetails');
Route::post('carsmodelotherdetails/create', 'HomeController@addcarsmodelotherdetails');

Route::get('carsbrand', 'HomeController@carsbrand');
Route::get('carsbrandmodel', 'HomeController@carsbrandmodel');

Route::get('valuecarlog', 'HomeController@valuecarlog');
Route::get('testdrivelog', 'HomeController@testdrivelog');
Route::post('caroffermodelimg/create', 'HomeController@caroffermodelimg');

Route::get('/', 'SiteController@index');
Route::get('/en', 'SiteController@index');

Route::get('subscriber', 'HomeController@subscriberlog');
Route::post('subscribelog/create', 'HomeController@addsubscribelog');
//////
Route::get('contactlog', 'HomeController@contactlog');
Route::post('contactlog/create', 'SiteController@addcontactlog');
/////

//Route::get('/en/offers', 'SiteController@offers');
//Route::get('/ar/offers', 'SiteController@offers');
Route::get('/en/offers/{id}', 'SiteController@offers');
Route::get('/ar/offers/{id}', 'SiteController@offers');

Route::post('valuecaraddlog/create', 'SiteController@valuecaraddlog');

Route::post('testcaraddlog/create', 'HomeController@testcaraddlog');

Route::post('en/valuecar/getCarBrandModel', 'SiteController@getCarBrandModel');
Route::post('ar/valuecar/getCarBrandModel', 'SiteController@getCarBrandModel');


//Route::get('/en/details', 'SiteController@details');
//Route::get('/ar/details', 'SiteController@details');

Route::get('/en/details/{id}', 'SiteController@details');
Route::get('/ar/details/{id}', 'SiteController@details');

Route::get('/en/enquiry/{id}', 'SiteController@enquiry');
Route::get('/ar/enquiry/{id}', 'SiteController@enquiry');

Route::get('/en/valuecar/{id}', 'SiteController@valuecar');
Route::get('/ar/valuecar/{id}', 'SiteController@valuecar');


Route::get('/en/contact_us', 'SiteController@contact_us');
Route::get('/ar/contact_us', 'SiteController@contact_us');



Route::get('/ar', 'SiteController@index');

Route::auth();

Route::get('/home', 'HomeController@index');
