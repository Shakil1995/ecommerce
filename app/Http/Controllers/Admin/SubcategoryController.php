<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Subcategories;
use App\Models\admin\Categories;
use Illuminate\Support\Str;
use Image;
use File;

use DB;

class SubcategoryController extends Controller
{
    public function index()
    {
                     $data=Subcategories::all();
                     $category=Categories::all();  
                      return view('admin.categories.subcategory.index',compact('data','category'));     
    }
}
