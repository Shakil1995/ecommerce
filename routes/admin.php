<?php

use Illuminate\Support\Facades\Route;

// Route::get('add',function(){
// echo "admin route";
// });

Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->middleware(('is_admin'));