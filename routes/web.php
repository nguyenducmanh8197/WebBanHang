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


Route::group(['middleware' => ['auth']], function () {
    Route::post('checkout-cart', 'HomeController@checkoutCart')->name('front_end.checkout');
});

Route::get('', 'HomeController@index')->name('home');
Route::post('registration', 'HomeController@registration')->name('front_end.registration');
Route::get('/sign_up', 'HomeController@sign_up')->name('front_end.sign_up');

Route::post('/postSign_in', 'HomeController@postSign_in')->name('front_end.postSign_in');
Route::get('{id}/my-account', 'HomeController@myAccount')->name('front_end.my-account');
Route::post('{id}/updateAccount', 'HomeController@updateAccount')->name('front_end.updateAccount');
Route::get('{id}/acc-detail', 'HomeController@order_detail')->name('front_end.order_detail');

//Route::get('/admin', function () {
//    return view('admin.layout.master');
//});

// ajax thêm sp vào cart session
Route::post('add_to_cart','HomeController@add_to_cart')->name('add_to_cart');
// lay cart khi vao trang
Route::get('ready_cart','HomeController@ready_cart')->name('ready_cart');

Route::group(['prefix'=>'order'],function (){
    Route::get('','OrderController@index')->name('order.index');
    //update quantity vào cart
    Route::post('update_order_plus','OrderController@update_order_plus')->name('update_order_plus');
    Route::post('update_order_mimus','OrderController@update_order_mimus')->name('update_order_mimus');
    Route::delete('remove_product','OrderController@remove_product')->name('remove_product');

});
Route::group(['prefix'=>'product'],function (){
    Route::get('','FrontendProductController@index')->name('frontend_product.index');
    Route::get('{id}/detail','FrontendProductController@show')->name('frontend_product_detail.show');

});
Route::group(['prefix'=>'about'],function (){
    Route::get('','FrontendAboutController@index')->name('frontend_about.index');
});
Route::group(['prefix'=>'contact'],function (){
    Route::get('','FrontendContactController@index')->name('frontend_contact.index');
});



