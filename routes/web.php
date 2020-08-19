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

Auth::routes();

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

Route::middleware('auth:admin')->namespace('Admin\Category')->group(function (){
    //Category
    Route::get('/admin/categories', 'CategoryController@index')->name('admin.categories');
    Route::post('/admin/categories', 'CategoryController@store')->name('admin.category.store');
    Route::get('/admin/delete/category/{id}', 'CategoryController@destroy')->name('admin.delete.category');
    Route::get('/admin/edit/category/{id}', 'CategoryController@edit')->name('admin.edit.category');
    Route::put('/admin/edit/category/{id}', 'CategoryController@update')->name('admin.category.update');

    // Brands
    Route::get('/admin/brands', 'BrandController@index')->name('brands');
    Route::post('/admin/brands', 'BrandController@store')->name('brands.store');
    Route::get('/admin/delete/brand/{id}', 'BrandController@destroy')->name('delete.brand');
});
