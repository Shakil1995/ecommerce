<?php

namespace App\Http\Controllers\Admin;
use App\Models\admin\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Image;
use File;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function index()
    {
   
    	$data=json_decode(Categories::orderBy('id','desc')->get());
    	return view('admin.categories.category.index',compact('data'));
        // return response()->json($data);
    	
    }

    public function store(Request $request){
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:55',
            // 'category_icon' => 'required'        
        ]);
  $slug=Str::slug($request->category_name, '-');
  $photo=$request->category_icon;
  $photoname=$slug.'.'.$photo->getClientOriginalExtension();
  Image::make($photo)->resize(32,32)->save('public/files/category/'.$photoname);  //image intervention
    //Eloquent ORM
    Categories::insert([
        'category_name'=> $request->category_name,
        'category_slug'=> $slug,
        'home_page'=> $request->home_page,
     'category_icon'=> 'public/files/category/'.$photoname,
    ]);

$notification=array('messege' => 'Category Inserted!', 'alert-type' => 'success');
return redirect()->back()->with($notification);
}


 //delete category method
 public function destroy($id)

 {
     $category=Categories::find($id);
     $category->delete();

     $notification=array('messege' => 'Category Deleted!', 'alert-type' => 'success');
     return redirect()->back()->with($notification);
 }
 
}
