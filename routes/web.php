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

//   Auth::routes();

 Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'IndexController@index')->name('index');

//category listing page
Route::get('/tour/{CategoryName}','TourpackagesController@tour');

//tour detail page
Route::get('/tours/{id}','TourpackagesController@tours');


//add to cart
Route::match(['get','post'],'/add-cart', 'TourpackagesController@addtocart')->name('add-cart');

//cart page
// Route::post('/cart', 'TourpackagesController@cart');


//delete otur from cart
Route::get('/cart/delete-tourpackage/{id}', 'TourpackagesController@deleteCartPackage');

Route::get('/get-tourpackage-Price','TourpackagesController@getTourpackagePrice');
Route::get('/get-transport-Cost','TourpackagesController@getTransportCost');

//Apply Coupon
Route::post('/cart/apply-coupon', 'TourpackagesController@applyCoupon');




Route::get('/login', 'UsersController@ShowLoginForm')->middleware('guest');
Route::post('/login', 'UsersController@login')->name('login');
Route::get('/logout', 'UsersController@logout');


Route::get('/register', 'UsersController@showRegistrationForm')->name('register');
Route::post('/register', 'UsersController@register');




Route::get('admin/login', 'AdminLoginController@ShowLoginForm')->middleware('guest');
Route::post('admin/login', 'AdminLoginController@login');


Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {

    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/settings', 'AdminController@settings')->name('admin.settings');
    Route::get('/check-pwd', 'AdminController@chkPassword');
    Route::match(['get','post'],'/update-pwd', 'AdminController@updatePassword');
    Route::get('logout', 'AdminLoginController@logout');

    //category route
    Route::match(['get','post'],'/add-category', 'TourpackagecategoryController@addCategory')->name('admin.add-category');
    Route::get('/view-categories', 'TourpackagecategoryController@viewCategories');
    Route::match(['get','post'],'/edit-category/{id}', 'TourpackagecategoryController@editCategory')->name('admin.edit-category');
    Route::match(['get','post'],'/delete-category/{id}', 'TourpackagecategoryController@deleteCategory');
    Route::get('/delete-category-image/{id}', 'TourpackagecategoryController@deleteCategoryImage');

    //tour route
    Route::match(['get','post'],'/add-tour', 'TourpackagesController@addtour')->name('admin.add-tour');
    Route::get('/view_tourpackages', 'TourpackagesController@viewTour');
    Route::match(['get','post'],'/edit-tour/{id}', 'TourpackagesController@editTour')->name('admin.edit-tour');
    Route::get('/delete-tour/{id}', 'TourpackagesController@deleteTourpackage');
    Route::get('/delete-tour-image/{id}', 'TourpackagesController@deleteTourImage');

    Route::match(['get','post'],'/add-location/{id}', 'TourpackagesController@location')->name('admin.add-location');

    //tourtype
    Route::match(['get','post'],'/add-tourtype/{id}', 'TourpackagesController@tourtype')->name('admin.add-tourtype');
    Route::match(['get','post'],'/edit-tourtype/{id}', 'TourpackagesController@edittourtype')->name('admin.edit-tourtype');
    Route::get('/delete-tourtype/{id}', 'TourpackagesController@deleteTourtype');
    // Alternative Image
    Route::match(['get','post'],'/add-image/{id}', 'TourpackagesController@image')->name('admin.add-image');
    Route::get('/delete-alt-image/{id}', 'TourpackagesController@deleteAltimage');

    //tour-include
    Route::match(['get','post'],'/add-include/{id}', 'TourpackagesController@tourinclude')->name('admin.add-include');
    Route::get('/delete-tourinclude/{id}', 'TourpackagesController@deleteTourinclude');

    //tour transport
    Route::match(['get','post'],'/add-tourtransportation/{id}', 'TourpackagesController@transport')->name('admin.add-tourtransportation');
    Route::match(['get','post'],'/edit-tourtransportation/{id}', 'TourpackagesController@edittransport')->name('admin.edit-tourtransportation');
    Route::get('/delete-transport/{id}', 'TourpackagesController@deleteTransport');

    //tour accommodation
    Route::match(['get','post'],'/add-accommodation/{id}', 'TourpackagesController@accommodation')->name('admin.add-accommodation');
    Route::get('/delete-accommodation/{id}', 'TourpackagesController@deleteAccommodation');

    //coupon forms
    Route::match(['get','post'],'/add-coupon', 'CouponsController@addCoupon')->name('admin.add-coupon');
    Route::match(['get','post'],'/edit-coupon/{id}', 'CouponsController@editCoupon')->name('admin.edit-coupon');
    Route::get('/view-coupons','CouponsController@viewCoupons');
    Route::get('/delete-coupon/{id}', 'CouponsController@deleteCoupon');
});




//Route::get('/register', 'UserController@createrUser');

Route::middleware(['auth', 'user'])->group(function () {
    Route::match(['get','post'],'/account', 'UsersController@account');
    Route::post('/check-user-pwd', 'UsersController@chkUserPassword');
    Route::post('/update-user-pwd', 'UsersController@updatePassword');
    Route::get('cart', 'TourpackagesController@cart');
    //checkout page
    Route::match(['get','post'],'billing', 'TourpackagesController@billing');

});



