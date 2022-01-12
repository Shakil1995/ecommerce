<?php

namespace App\Http\Controllers\Admin;
use App\Models\admin\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
    	// $data=DB::table('categories')->get();  //query builder
    	// $data=Categories::all();	//eloquent ORM
    	return view('admin.categories.category.index');
    	
    }
}
