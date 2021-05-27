<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();


Route::prefix('admin')->namespace('Backend\Admin')->group(function () {
    Route::match(['get', 'post'], '/', 'AdminController@login')->name('admin.login');
    Route::match(['get','post'],'/my-account-recover/auth={auth}','AdminController@recoverAccount')->name('admin.account.recover');
    Route::post('/forgot-password', 'AdminController@forgotPassword')->name('admin.account.forgotPassword');
    
    Route::group(['middleware' => ['admin']], function () {
        Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
        Route::get('logout', 'AdminController@logout')->name('admin.logout');
        Route::prefix('users')->group(function () {
            Route::get('/view', 'AdminController@viewUser')->name('users.view');
            Route::get('/add', 'AdminController@addUser')->name('users.add');
            Route::post('/store', 'AdminController@storeUser')->name('users.store');
            Route::get('/edit/{id}', 'AdminController@editUser')->name('users.edit');
            Route::post('/update/{id}', 'AdminController@updateUser')->name('users.update');
            Route::post('/delete', 'AdminController@deleteUser')->name('users.delete');
            Route::match(['get','post'],'/check-user-email','AdminController@userEmailCheck');
        });
        Route::prefix('profile')->group(function () {
            Route::get('/view', 'ProfileController@viewProfile')->name('profile.view');
            Route::any('/check-user-password', 'ProfileController@passwordCheck')->name('profile.password.check');
            Route::post('/update-user-profile', 'ProfileController@updateProfile')->name('profile.update');
            Route::post('/update-user-profile-picture', 'ProfileController@updateProfilePicture')->name('profile.picture.update');
            Route::post('/update-user-password', 'ProfileController@updatePassword')->name('profile.password.update');
        });

        Route::prefix('category')->group(function () {


            Route::get('/view', 'CategoryController@view')->name('category.view');
            Route::get('/add', 'CategoryController@add')->name('category.add');
            Route::get('/edit/{id}', 'CategoryController@edit')->name('category.edit');
            Route::get('/delete/{id}', 'CategoryController@delete')->name('category.delete');
            Route::post('/update/{id}', 'CategoryController@update')->name('category.update');
            Route::post('/store', 'CategoryController@store')->name('category.store');
       });
        Route::prefix('product')->group(function () {


            Route::get('/view', 'ProductController@view')->name('product.view');
            Route::get('/add', 'ProductController@add')->name('product.add');
            Route::get('/edit/{id}', 'ProductController@edit')->name('product.edit');
            Route::get('/delete/{id}', 'ProductController@delete')->name('product.delete');
            Route::post('/update/{id}', 'ProductController@update')->name('product.update');
            Route::post('/store', 'ProductController@store')->name('product.store');
       });
        Route::prefix('order')->group(function () {


            Route::get('/view', 'OrderController@view')->name('order.view');
            Route::get('/edit/{id}', 'OrderController@edit')->name('order.edit');
            Route::get('/delete/{id}', 'OrderController@delete')->name('order.delete');
            Route::post('/update/{id}', 'OrderController@update')->name('order.update');
        
       });
    });
});


// Fornt site
Route::get('/', 'Frontend\HomeController@view')->name('mainpage');


//Route::prefix('home')->group(function () {

    //Customer Login Reg
    Route::get('/login_check', 'Frontend\CheckoutController@login_check')->name('login_check');
    Route::post('/customer_reg', 'Frontend\CheckoutController@customer_reg')->name('customer_reg');
    
    //Cart and product View
    Route::get('/details/{id}', 'Frontend\HomeController@productDetails')->name('product.details');
    Route::post('/add_to_cart', 'Frontend\CartController@add')->name('add_to_cart');
    Route::get('/show_cart', 'Frontend\CartController@show_cart')->name('show_cart');
    Route::get('/cart/item_remove{id}', 'Frontend\CartController@item_remove')->name('item_remove');
    Route::get('/checkout', 'Frontend\CartController@checkout')->name('checkout');                     
                        
    

    //Shiping Data
    Route::post('/save_shiping_details', 'Frontend\CheckoutController@save_shiping_details')->name('save_shiping_details');
    Route::get('/payment', 'Frontend\CheckoutController@payment')->name('payment');
    Route::post('/order_place', 'Frontend\CheckoutController@order_place')->name('order_place');
    // Route::get('/view', 'ProductController@view')->name('product.view');
    // Route::get('/add', 'ProductController@add')->name('product.add');
    // Route::get('/edit/{id}', 'ProductController@edit')->name('product.edit');
    // Route::get('/delete/{id}', 'ProductController@delete')->name('product.delete');
    // Route::post('/update/{id}', 'ProductController@update')->name('product.update');
    // Route::post('/store', 'ProductController@store')->name('product.store');
//});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/thanks', 'Frontend\CheckoutController@thanks')->name('thanks'); 