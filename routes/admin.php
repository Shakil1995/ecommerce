<?php

use App\Http\Controllers\Admin\AdminController;
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