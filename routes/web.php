<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('Home.index');
// });

Route::get('/', 'GuestController@index');

Route::get('/i', 'HomeController@index');
Auth::routes();

Route::post('/districtq', 'GuestController@districtq')->name('districtq');
Route::get('/contacts', 'GuestController@contacts');
Route::get('/gallery', 'GuestController@gallery');
Route::get('/specials', 'GuestController@specials');
Route::get('/rooms', 'GuestController@rooms');
Route::post('/valemail','GuestController@valemail')->name('valemail');
Route::post('/checkuser','GuestController@checkuser')->name('checkuser');

Route::get('/admin','AdminController@home');
Route::get('/state','AdminController@state');
Route::post('/checkstate','AdminController@checkstate')->name('checkstate');
Route::post('/checkdistrict','AdminController@checkdistrict')->name('checkdistrict');
Route::post('/district','AdminController@district');
Route::post('/addstate','AdminController@addstate');
Route::post('/adddistrict','AdminController@adddistrict');
Route::post('/rstate','AdminController@rstate');
Route::get('/userlist','AdminController@userlist');
Route::get('/vehicles','AdminController@vehicles');
Route::get('/packages','AdminController@packages');
Route::get('/ahouse','AdminController@house');
Route::post('/avrooms','AdminController@rooms');
Route::get('/breakfasts','AdminController@breakfasts');
Route::post('/districta', 'AdminController@districta')->name('districta');
Route::post('/search','AdminController@search');
Route::get('/search','AdminController@userlist');
Route::get('/acpassword','AdminController@cpassword');
Route::post('/asavepassword','AdminController@savepassword');
Route::post('/savestate','AdminController@savestate');
Route::post('/savedistrict','AdminController@savedistrict');
Route::post('/editstate','AdminController@editstate');
Route::post('/editdistrict','AdminController@editdistrict');
Route::get('/adprofile','AdminController@adprofile');
Route::post('/ckeckpassword','AdminController@ckeckpassword')->name('ckeckpassword');
// Route::post('/userblock','AdminController@userblock');
// Route::post('/userunblock','AdminController@userunblock');

Route::get('/owner','OwnerController@home');
Route::get('/vprofile','OwnerController@vprofile');
Route::get('/eprofile','OwnerController@eprofile');
Route::get('/avehicles','OwnerController@avehicles');
Route::get('/apackages','OwnerController@apackages');
Route::get('/abreakfasts','OwnerController@abreakfasts');
Route::get('/vvehicles','OwnerController@vvehicles');
Route::get('/vpackages','OwnerController@vpackages');
Route::get('/vbreakfasts','OwnerController@vbreakfasts');
Route::get('/bookings','OwnerController@bookings');
Route::get('/vbookingowner','OwnerController@vbookingowner');
Route::get('/pbookingowner','OwnerController@pbookingowner');
Route::post('/saveprofile','OwnerController@saveprofile')->name('saveprofile');
Route::get('/saveprofile','OwnerController@home')->name('saveprofile');
Route::get('/arooms','OwnerController@arooms');
Route::post('/edithouse','OwnerController@edithouse')->name('edithouse');
Route::get('/edithouse','OwnerController@home')->name('edithouse');
Route::get('/vhouse','OwnerController@vhouse');
Route::post('/districtr','OwnerController@districtr')->name('districtr');
Route::post('/edit','OwnerController@edit');
Route::get('/edit','OwnerController@home');
Route::post('/addroom','OwnerController@addroom');
Route::get('/addroom','OwnerController@home');
Route::get('/addroom','OwnerController@home');
Route::post('/saveimage','OwnerController@saveimage');
Route::get('/saveimage','OwnerController@home');
Route::post('/addvehicle','OwnerController@addvehicle');
Route::get('/addvehicle','OwnerController@home');
Route::post('/addpackage','OwnerController@addpackage');
Route::get('/addpackage','OwnerController@home');
Route::post('/addbreakfast','OwnerController@addbreakfast');
Route::get('/addbreakfast','OwnerController@home');
Route::post('/addnewroom','OwnerController@addnewroom');
Route::get('/addnewroom','OwnerController@home');
Route::post('/foods','OwnerController@foods')->name('foods');
Route::get('/foods','OwnerController@home')->name('foods');
Route::post('/editroom','OwnerController@editroom');
Route::get('/editroom','OwnerController@home');
Route::post('/savehouse','OwnerController@savehouse');
Route::get('/savehouse','OwnerController@home');
Route::post('/saveroom','OwnerController@saveroom');
Route::get('/saveroom','OwnerController@home');
Route::post('/editbreakfast','OwnerController@editbreakfast');
Route::get('/editbreakfast','OwnerController@home');
Route::post('/savebreakfast','OwnerController@savebreakfast');
Route::get('/savebreakfast','OwnerController@home');
Route::post('/editvehicle','OwnerController@editvehicle');
Route::post('/savevehicle','OwnerController@savevehicle');
Route::post('/editpackage','OwnerController@editpackage');
Route::post('/savepackage','OwnerController@savepackage');
Route::post('/viewaddroom','OwnerController@viewaddroom');
Route::get('/cpassword','OwnerController@cpassword');
Route::post('/savepassword','OwnerController@savepassword');
Route::post('/roomcapacity','OwnerController@roomcapacity')->name('roomcapacity');
Route::post('/bookingsearch','OwnerController@bookingsearch');
Route::post('/pbookingsearch','OwnerController@pbookingsearch');
Route::post('/vbookingsearch','OwnerController@vbookingsearch');

Route::get('/vhome','VehicleController@home');
Route::post('/savevehicleprofile','VehicleController@saveprofile');
Route::get('/vehicleprofile','VehicleController@vprofile');
Route::get('/vehicleprofileedit','VehicleController@eprofile');
Route::post('/vehicleeditp','VehicleController@edit');
Route::post('/vehicleadd','VehicleController@addvehicle');
Route::get('/viewvehicles','VehicleController@vvehicles');
Route::get('/addvehicles','VehicleController@avehicles');
Route::post('/vehicleedit','VehicleController@editvehicle');
Route::post('/vehiclesave','VehicleController@savevehicle');
Route::get('/vcpassword','VehicleController@cpassword');
Route::post('/vsavepassword','VehicleController@savepassword');
Route::get('/vbookingvowner','VehicleController@vbookingvowner');

Route::get('/user','UserController@home');
Route::get('/uprofile','UserController@profile');
Route::get('/urooms', 'UserController@urooms');
Route::get('/package', 'UserController@package');
Route::get('/ubooking', 'UserController@ubooking');
Route::get('/ucpassword','UserController@cpassword');
Route::post('/usavepassword','UserController@savepassword');
Route::post('/usaveprofile','UserController@saveprofile');
Route::post('/usaveimage','UserController@saveimage');
Route::get('/ueprofile','UserController@eprofile');
Route::post('/usersaveprofile','UserController@edit');
Route::post('/rbooking','UserController@rbooking');
Route::post('/vbooking','UserController@vbooking');
Route::post('/ravailability','UserController@ravailability')->name('ravailability');
Route::post('/vavailability','UserController@vavailability')->name('vavailability');
Route::post('/pavailability','UserController@pavailability')->name('pavailability');
Route::post('/pbooking','UserController@pbooking');
// Route::get('/bbooking','UserController@bbooking');
Route::get('/vibooking','UserController@vibooking');
Route::get('/pibooking','UserController@pibooking');
Route::post('/rbookcancel','UserController@rbookcancel');
Route::post('/vbookcancel','UserController@vbookcancel');
Route::post('/pbookcancel','UserController@pbookcancel');
Route::post('/roomrating','UserController@roomrating');
Route::post('/ratingpackage','UserController@ratingpackage');
Route::post('/ratingvehicle','UserController@ratingvehicle');
Route::post('/roomsearch','UserController@roomsearch');
Route::post('/upayment','UserController@payment');
Route::post('/uppayment','UserController@upayment');
Route::post('/rcapacity','UserController@rcapacity')->name('rcapacity');
Route::post('/vcapacity','UserController@vcapacity')->name('vcapacity');
Route::post('/pcapacity','UserController@pcapacity')->name('pcapacity');
