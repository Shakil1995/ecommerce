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
     unlink($category->category_icon);
     $category->delete();
     $notification=array('messege' => 'Category Deleted!', 'alert-type' => 'success');
     return redirect()->back()->with($notification);
 }

//update method
public function update(Request $request,$id)
{
    // dd($request);
  //Query Builder update
    // $data=array();
    // $data['category_name']=$request->category_name;
    // $data['category_slug']=Str::slug($request->category_name, '-');
    // DB::table('categories')->where('id',$request->id)->update($data);

 

    $slug=Str::slug($request->category_name, '-');
    $data=array();
    $data['category_name']=$request->category_name;
    $data['category_slug']=$slug;
    $data['home_page']=$request->home_page;
    if ($request->category_icon) {
          if (File::exists($request->old_icon)) {
                 unlink($request->old_icon);
            }
          $photo=$request->category_icon;
          $photoname=$slug.'.'.$photo->getClientOriginalExtension();
          Image::make($photo)->resize(32,32)->save('public/files/category/'.$photoname); 
          $data['category_icon']='public/files/category/'.$photoname; 
    // dd($data);
          DB::table('categories')->where('id',$id)->update($data); 

     
    //     Categories::where('id','=',$request->id)->update([
    //         'category_name'=> $request->category_name,
    //         'category_slug'=> $slug,
    //         'home_page'=> $request->home_page,
    //   'category_icon'=> 'public/files/category/'.$photoname,
    //     ]);
          $notification=array('messege' => 'Category Update!', 'alert-type' => 'success');
          return redirect()->back()->with($notification);
    }else{
      $data['category_icon']=$request->old_icon;   
    //    dd($data);
      DB::table('categories')->where('id',$id)->update($data); 
      $notification=array('messege' => 'Category Update!', 'alert-type' => 'success');
      return redirect()->back()->with($notification);
    }
}











 
}
