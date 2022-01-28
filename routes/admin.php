<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

// Route::get('add',function(){
// echo "admin route";
// });
Route::get('/admin-login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');


// Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->middleware(('is_admin'));

Route::group(['namespace'=>'App\Http\Controllers\Admin','middleware'=>'is_admin'],function(){
    Route::get('/admin/home', 'AdminController@admin')->name('admin.home');
    Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');
});

	//category routes
    // Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
	Route::group(['prefix'=>'category'], function(){
	  Route::get('/',[CategoryController::class, 'index'])->name('category.index');
	  Route::post('/store',[CategoryController::class, 'store'])->name('category.store');
	  Route::get('/delete/{id}',[CategoryController::class, 'destroy'])->name('category.delete');

 });