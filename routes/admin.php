<?php
Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'Admin'],function() {
        Route::get('','DashboardController@index')->name('inc.content');
        Route::group(['prefix' => 'user'], function () {
            Route::get('', 'UserController@index')->name('user.index');
            Route::post('', 'UserController@store')->name('user.store');
            Route::get('create', 'UserController@create')->name('user.create');
            Route::get('{id}/edit', 'UserController@edit')->name('user.edit');
            Route::post('{id}/update', 'UserController@update')->name('user.update');
            Route::post('delete', 'UserController@destroy')->name('user.destroy');
            Route::post('update_active', 'UserController@update_status')->name('user.update_status');
        });
        Route::group(['prefix' => 'slide'], function () {
            Route::get('', 'SlideController@index')->name('slide.index');
            Route::post('', 'SlideController@store')->name('slide.store');
            Route::get('create', 'SlideController@create')->name('slide.create');
            Route::get('{id}/edit', 'SlideController@edit')->name('slide.edit');
            Route::post('{id}/update', 'SlideController@update')->name('slide.update');
            Route::post('delete', 'SlideController@destroy')->name('slide.destroy');
            Route::post('update_status', 'SlideController@update_status')->name('slide.update_status');
        });
        Route::group(['prefix' => 'product-category'], function () {
            Route::get('', 'ProductCategoryController@index')->name('productCategory.index');
            Route::post('', 'ProductCategoryController@store')->name('productCategory.store');
            Route::get('create', 'ProductCategoryController@create')->name('productCategory.create');
            Route::get('{id}/edit', 'ProductCategoryController@edit')->name('productCategory.edit');
            Route::post('{id}/update', 'ProductCategoryController@update')->name('productCategory.update');
            Route::post('delete', 'ProductCategoryController@destroy')->name('productCategory.destroy');
            Route::post('update_status', 'ProductCategoryController@update_status')->name('productCategory.update_status');
        });
        Route::group(['prefix' => 'product'], function () {
            Route::get('', 'ProductController@index')->name('product.index');
            Route::post('', 'ProductController@store')->name('product.store');
            Route::get('create', 'ProductController@create')->name('product.create');
            Route::post('create_size', 'ProductController@create_size')->name('product.create_size');
            Route::get('{id}/edit', 'ProductController@edit')->name('product.edit');
            Route::post('{id}/update', 'ProductController@update')->name('product.update');
            Route::post('delete', 'ProductController@destroy')->name('product.destroy');
            Route::post('delete_size', 'ProductController@delete_size')->name('product.delete_size');
            Route::post('update_status', 'ProductController@update_status')->name('product.update_status');
            Route::get('readyDetailProduct', 'ProductController@readyDetailProduct')->name('product.readyDetailProduct');

        });
        Route::group(['prefix' => 'product_size'], function () {
            Route::get('', 'ProductSizeController@index')->name('productSize.index');
            Route::post('', 'ProductSizeController@store')->name('productSize.store');
            Route::get('create', 'ProductSizeController@create')->name('productSize.create');
            Route::get('{id}/edit', 'ProductSizeController@edit')->name('productSize.edit');
            Route::post('{id}/update', 'ProductSizeController@update')->name('productSize.update');
            Route::post('delete', 'ProductSizeController@destroy')->name('productSize.destroy');
            Route::post('update_status', 'ProductSizeController@update_status')->name('productSize.update_status');
        });
        Route::group(['prefix' => 'about'], function () {
            Route::get('', 'AboutController@index')->name('about.index');
            Route::post('', 'AboutController@store')->name('about.store');
            Route::get('create', 'AboutController@create')->name('about.create');
            Route::get('{id}/edit', 'AboutController@edit')->name('about.edit');
            Route::post('{id}/update', 'AboutController@update')->name('about.update');
            Route::post('delete', 'AboutController@destroy')->name('about.destroy');
            Route::post('update_status', 'AboutController@update_status')->name('about.update_status');
        });
        Route::group(['prefix' => 'order_admin'], function () {
            Route::get('', 'AdminOrderController@index')->name('order_admin.index');
            Route::post('', 'AdminOrderController@store')->name('order_admin.store');
            Route::get('create', 'AdminOrderController@create')->name('order_admin.create');
            Route::get('{id}/detail', 'AdminOrderController@show')->name('order_admin.detail');
            Route::post('update', 'AdminOrderController@update')->name('order_admin.update');
            Route::post('delete', 'AdminOrderController@destroy')->name('order_admin.destroy');
            Route::post('update_status', 'AdminOrderController@update_status')->name('order_admin.update_status');
        });
        Route::group(['prefix' => 'statistical'], function () {
            Route::get('/product-sale', 'StatisticalController@index')->name('statistical.product_sale');
            Route::get('/product_new', 'StatisticalController@product_new')->name('statistical.product_new');
//            Route::get('create', 'StatisticalController@create')->name('order_admin.create');
//            Route::get('{id}/detail', 'StatisticalController@show')->name('order_admin.detail');
//            Route::post('update', 'StatisticalController@update')->name('order_admin.update');
//            Route::post('delete', 'StatisticalController@destroy')->name('order_admin.destroy');
//            Route::post('update_status', 'StatisticalController@update_status')->name('order_admin.update_status');
        });
        Route::group(['prefix' => 'contact_admin'], function () {
            Route::get('detail', 'AdminContactController@index')->name('contact-admin.detail');
            Route::post('{id}/update', 'AdminContactController@update')->name('contact-admin.update');
        });
        Route::group(['prefix' => 'feedback'], function () {
            Route::get('', 'AdminFeedbackController@index')->name('feedback.index');
            Route::post('', 'AdminFeedbackController@store')->name('feedback.store');
            Route::get('create', 'AdminFeedbackController@create')->name('feedback.create');
            Route::get('{id}/detail', 'AdminFeedbackController@show')->name('feedback.detail');
            Route::post('update', 'AdminFeedbackController@update')->name('feedback.update');
            Route::post('delete', 'AdminFeedbackController@destroy')->name('feedback.destroy');
            Route::post('update_status', 'AdminFeedbackController@update_status')->name('feedback.update_status');
        });
    });
});