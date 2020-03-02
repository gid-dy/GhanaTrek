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

 Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'UserController@index')->name('index');

//category listing page
Route::get('/tour/{CategoryName}','TourpackagesController@tour');

//tour detail page
Route::get('/tours/{PackageId}','TourpackagesController@tours');


Route::get('/get-tourpackage-Price','TourpackagesController@getTourpackagePrice');
Route::get('/get-tourport-Cost','TourpackagesController@getTransportCost');

//  Route::middleware(['auth'])->group(function(){
    //Route::match(['get','post'],'/login', 'UserController@login')->name('login');
    //Route::match(['get','post'],'/register', 'UserRegisterController@register')->name('user.register.submit');
    Route::prefix('user')->group(function() {
    Route::get('/login', 'UserLoginController@ShowLoginForm')->name('user.login');
    Route::post('/login', 'UserLoginController@login')->name('user.login.submit');

    Route::match(['get','post'],'/register', 'UserRegisterController@showRegistrationForm')->name('user.register');
    Route::match(['get','post'],'/register', 'UserRegisterController@register')->name('user.register.submit');

    
    Route::get('/under_cat', 'UserController@under_cat');
    Route::get('/details', 'UserController@details');
    Route::get('/about_us', 'UserController@about_us');
    Route::get('/cart', 'UserController@cart');
    Route::get('/contact', 'UserController@contact');
    Route::get('/help', 'UserController@help');
    Route::get('/privacy_policy', 'UserController@privacy_policy');
    Route::get('/settings', 'UserController@settings');
    Route::get('/wishlist', 'UserController@wishlist');
    Route::get('/payment', 'UserController@payment');
    Route::get('/billing', 'UserController@billing');
  });


Route::prefix('admin')->group(function() {
    Route::get('/login', 'AdminLoginController@ShowLoginForm')->name('admin.login');
    Route::post('/login', 'AdminLoginController@login')->name('admin.login.submit');
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/settings', 'AdminController@settings')->name('admin.settings');
    Route::get('/check-pwd', 'AdminController@chkPassword');
    Route::match(['get','post'],'/update-pwd', 'AdminController@updatePassword');

    //category route
    Route::match(['get','post'],'/add-category', 'TourpackagecategoryController@addCategory')->name('admin.add-category');
    Route::get('/view-categories', 'TourpackagecategoryController@viewCategories');
    Route::match(['get','post'],'/edit-category/{categoryId}', 'TourpackagecategoryController@editCategory')->name('admin.edit-category');
    Route::match(['get','post'],'/delete-category/{categoryId}', 'TourpackagecategoryController@deleteCategory');
    Route::get('/delete-category-image/{categoryId}', 'TourpackagecategoryController@deleteCategoryImage');

    //tour route
    Route::match(['get','post'],'/add-tour', 'TourpackagesController@addtour')->name('admin.add-tour');
    Route::get('/view_tourpackages', 'TourpackagesController@viewTour');
    Route::match(['get','post'],'/edit-tour/{PackageId}', 'TourpackagesController@editTour')->name('admin.edit-tour');
    Route::get('/delete-tour/{PackageId}', 'TourpackagesController@deleteTourpackage');
    Route::get('/delete-tour-image/{PackageId}', 'TourpackagesController@deleteTourImage');

    Route::match(['get','post'],'/add-location/{PackageId}', 'TourpackagesController@location')->name('admin.add-location');

    //tourtype
    Route::match(['get','post'],'/add-tourtype/{PackageId}', 'TourpackagesController@tourtype')->name('admin.add-tourtype');
    Route::get('/delete-tourtype/{TourTypeID}', 'TourpackagesController@deleteTourtype');
    // Alternative Image
    Route::match(['get','post'],'/add-image/{PackageId}', 'TourpackagesController@image')->name('admin.add-image');

    //tour-include
    Route::match(['get','post'],'/add-include/{PackageId}', 'TourpackagesController@tourinclude')->name('admin.add-include');
    Route::get('/delete-tourinclude/{TourIncludeID}', 'TourpackagesController@deleteTourinclude');

    //tour transport
    Route::match(['get','post'],'/add-tourtransportation/{PackageId}', 'TourpackagesController@transport')->name('admin.add-tourtransportation');
    Route::get('/delete-transport/{TourTransportationID}', 'TourpackagesController@deleteTransport');

    //tour accommodation
    Route::match(['get','post'],'/add-accommodation/{PackageId}', 'TourpackagesController@accommodation')->name('admin.add-accommodation');
    Route::get('/delete-accommodation/{AccommodationID}', 'TourpackagesController@deleteAccommodation');
});

// Route::get('/register', 'UserController@createrUser');



