<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify' => true]);

// User Auth
Route::get('/logout','HomeController@LogOut')->name('logout.user');
Route::post('/userLogin', 'Auth\LoginController@login')->name('user.login');

//Frontend
Route::get('/', 'PublicController@index')->name('frontent.home');

Route::get('/home', 'HomeController@index')->name('home');

// Admin Routes
Route::get('/admin/dashboard', 'Admin\AdminController@index')->name('admin.dashboard');
Route::get('/admin/dashboard/logout', 'Admin\AdminController@adminLogOut')->name('admin.logout');
Route::get('/admin', 'Admin\LoginController@ShowLoginForm')->name('admin.login');
Route::post('/admin', 'Admin\LoginController@login');
Route::get('/admin/change/password', 'Admin\AdminController@ChangePassword')->name('admin.change.password');
Route::put('/admin/change/password', 'Admin\AdminController@UpdatePassword')->name('admin.update.password');


// Backend Routes
Route::middleware('auth:admin')->namespace('Admin\Category')->group(function (){
    // Category
    Route::get('/admin/categories', 'CategoryController@index')->name('admin.categories');
    Route::post('/admin/categories', 'CategoryController@store')->name('admin.category.store');
    Route::get('/admin/delete/category/{id}', 'CategoryController@destroy')->name('admin.delete.category');
    Route::get('/admin/edit/category/{id}', 'CategoryController@edit')->name('admin.edit.category');
    Route::put('/admin/edit/category/{id}', 'CategoryController@update')->name('admin.category.update');

    // Sub Category
    Route::get('/admin/category/sub-category', 'SubCategoryController@index')->name('subcategory.list');
    Route::post('/admin/category/sub-category', 'SubCategoryController@store')->name('subcategory.store');
    Route::get('/admin/category/edit/sub-category/{id}', 'SubCategoryController@edit')->name('subcategory.edit');
    Route::put('/admin/category/update/sub-category/{id}', 'SubCategoryController@update')->name('subcategory.update');
    Route::get('/admin/category/delete/sub-category/{id}', 'SubCategoryController@destroy')->name('subcategory.delete');


    // Brands
    Route::get('/admin/brands', 'BrandController@index')->name('brands');
    Route::post('/admin/brands', 'BrandController@store')->name('brands.store');
    Route::get('/admin/delete/brand/{id}', 'BrandController@destroy')->name('delete.brand');
    Route::get('/admin/edit/brand/{id}', 'BrandController@edit')->name('edit.brand');
    Route::put('/admin/edit/brand/{id}', 'BrandController@update')->name('update.brand');

    // Coupons
    Route::get('/admin/coupons', 'CouponController@index')->name('coupons.list');
    Route::post('/admin/coupons', 'CouponController@store')->name('coupons.store');
    Route::get('/admin/coupons/edit/{id}', 'CouponController@edit')->name('coupons.edit');
    Route::put('/admin/coupons/edit/{id}', 'CouponController@update')->name('coupons.update');
    Route::get('/admin/delete/coupon/{id}', 'CouponController@destroy')->name('coupons.destroy');

});

Route::middleware('auth:admin')->namespace('Admin')->group(function (){

    // Newsletters
    Route::get('/admin/newsletters/', 'NewletterController@index')->name('admin.newsletter');
    Route::get('/admin/newsletters/{id}', 'NewletterController@destroy')->name('admin.newsletter.delete');

});

// Backend All Products Routes
Route::middleware('auth:admin')->namespace('Admin\Product')->group(function (){

    Route::get('/admin/product/all', 'ProductController@index')->name('admin.product.all');
    Route::get('/admin/product/new', 'ProductController@create')->name('admin.create.product');
    Route::post('/admin/product/store', 'ProductController@store')->name('admin.product.store');
    Route::get('/admin/product/view/{id}', 'ProductController@show')->name('admin.product.show');
    Route::get('/admin/product/edit/{id}', 'ProductController@edit')->name('admin.product.edit');
    Route::put('/admin/product/edit/{id}', 'ProductController@update')->name('admin.product.update');
    Route::get('/admin/product/delete/{id}', 'ProductController@destroy')->name('admin.product.destroy');

    // Product Active Button
    Route::get('/admin/product/active/{id}', 'ProductController@active_product')->name('product.active');
    // Product Inactive Button
    Route::get('/admin/product/inactive/{id}', 'ProductController@inactive_product')->name('product.inactive');
    // Get Subcategory AJAX
    Route::get('/admin/get/subcategory/{category_id}', 'ProductController@getSubcategory')->name('get.subcategories');

});

// Backend Post & Post Category
Route::middleware('auth:admin')->namespace('Admin')->group(function (){

    // Post
    Route::get('/admin/blog/all', 'PostController@index')->name('admin.blog.list');
    Route::get('/admin/blog/post/add', 'PostController@create')->name('admin.post.create');
    Route::post('/admin/blog/post/store', 'PostController@store')->name('admin.post.store');
    Route::get('/admin/blog/post/edit/{id}', 'PostController@edit')->name('admin.post.edit');
    Route::put('/admin/blog/post/edit/{id}', 'PostController@update')->name('admin.post.update');
    Route::get('/admin/blog/post/delete/{id}', 'PostController@destroy')->name('admin.post.destroy');

    // Category
    Route::get('/admin/blog/category/all', 'PostCategoryController@index')->name('admin.blog.category.list');
    Route::post('/admin/blog/category/store', 'PostCategoryController@store')->name('admin.blog.category.store');
    Route::get('/admin/blog/category/edit/{id}', 'PostCategoryController@edit')->name('admin.blog.category.edit');
    Route::put('/admin/blog/category/edit/{id}', 'PostCategoryController@update')->name('admin.blog.category.update');
    Route::get('/admin/blog/category/delete/{id}', 'PostCategoryController@destroy')->name('admin.blog.category.destroy');

});


// ALL FRONTEND ROUTES
Route::namespace('Frontend')->group(function (){

    Route::post('/subcriber', 'NewsletterController@Store')->name('subscriber.store');

});
