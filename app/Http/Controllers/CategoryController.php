<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use Auth;
use Image;
use File;

class CategoryController extends Controller
{
    public function index(){
        
        $categories=category::orderBy('id','desc')->get();
        return view('admin.pages.categories.index',compact('categories'));
        }
        public function __construct()
        {
            $this->middleware('auth:admin');
        }

        public function create(){
            $main_categories=category::orderBy('name','desc')->where('parent_id',null)->get();
            return view('admin.pages.categories.create',compact('main_categories'));
            }   

            public function store(Request $request){
             
                $this->validate($request,[
                    'name' => 'required|alpha|min:4',
                    'description' => 'required|string|min:4',
                    'image'=>'nullable|image',              
               ],
            [
                'name.required'=>'please provide valid name',
                'description.required'=>'please provide valid description',
                'image.image'=>'please provide valid image',
            ]);
            $category= new category();
            $category->name=$request->name;
            $category->description=$request->description;
            $category->parent_id=$request->parent_id;

            if ($request->image) {
                 $image=$request->file('image');
                        $img=time().'.'.$image->getClientOriginalExtension();
                        $location='images/categories/'.$img;
                        Image::make($image)->save($location);
                        $category->image=$img;
                      
             }

            $category->save();

            return redirect()->route('admin.categories')->with('success','New Category Add Successfully');
            
}
public function edit($id){
    $main_categories=category::orderBy('name','desc')->where('parent_id',null)->get();
    $category=Category::find($id);
    if (!is_null($category)) {
        return view('admin.pages.categories.edit',compact('category' ,'main_categories'));
         }
         else{
            return redirect()->route('admin.categories'); 
         } 
    }



    public function update(Request $request, $id){
             
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'image'=>'nullable|image',              
       ],
    [
        'name.required'=>'please provide valid name',
        'description.required'=>'please provide valid description',
        'image.image'=>'please provide valid image',
    ]);
    $category= category::find($id);
    $category->name=$request->name;
    $category->description=$request->description;
    $category->parent_id=$request->parent_id;

    if (($request->image) > 0) {
        if (File::exists('images/categories/'.$category->image)) {
           File::delete('images/categories/'.$category->image);
        }
         $image=$request->file('image');
                $img=time().'.'.$image->getClientOriginalExtension();
                $location='images/categories/'.$img;
                Image::make($image)->save($location);
                $category->image=$img;
              
     }

    $category->save();
    return redirect()->route('admin.categories')->with('success','New Category update Successfully');
    
}


public function delete($id){
 
    $category=category::find($id);
    if (!is_null($category)) {
        if ($category->parent_id==null) {
            $sub_categories=category::orderBy('name','desc')->where('parent_id',$category->id)->get();

            foreach ($sub_categories as $sub) {
                if (File::exists('images/categories/'.$sub->image)) {
                    File::delete('images/categories/'.$sub->image);
                 }
                 $sub->delete();
            }
            
        }

        if (File::exists('images/categories/'.$category->image)) {
            File::delete('images/categories/'.$category->image);
         }
   $category->delete();
    }
   
      
    
    return back()->with('success','successfully category delete');
  }
}