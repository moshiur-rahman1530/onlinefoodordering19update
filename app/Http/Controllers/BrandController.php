<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\brand;
use Auth;
use Image;
use File;

class BrandController extends Controller
{
    public function index(){
        $brands=brand::orderBy('id','desc')->get();
        return view('admin.pages.brands.index',compact('brands'));
        }
        public function __construct()
        {
            $this->middleware('auth:admin');
        }

        public function create(){
            
            return view('admin.pages.brands.create');
            }   

            public function store(Request $request){
             
                $this->validate($request,[
                    'name' => 'required|min:4|string',
                    'description' => 'required|min:4|string',
                    'image'=>'nullable|image',              
               ],
            [
                'name.required'=>'please provide valid name',
                'description.required'=>'please provide valid description',
                'image.image'=>'please provide valid image',
            ]);
            $brand= new brand();
            $brand->name=$request->name;
            $brand->description=$request->description;
           

            if ($request->image) {
                 $image=$request->file('image');
                        $img=time().'.'.$image->getClientOriginalExtension();
                        $location=public_path('images/brands/'.$img);
                        Image::make($image)->save($location);
                        $brand->image=$img;
                      
             }

            $brand->save();

            return redirect()->route('admin.brands')->with('success','New brand Add Successfully');
            
}
public function edit($id){
    
    $brand=brand::find($id);
    if (!is_null($brand)) {
        return view('admin.pages.brands.edit',compact('brand'));
         }
         else{
            return redirect()->route('admin.brands'); 
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
    $brand= brand::find($id);
    $brand->name=$request->name;
    $brand->description=$request->description;
    

    if (($request->image) > 0) {
        if (File::exists('images/brands/'.$brand->image)) {
           File::delete('images/brands/'.$brand->image);
        }
         $image=$request->file('image');
                $img=time().'.'.$image->getClientOriginalExtension();
                $location=public_path('images/brands/'.$img);
                Image::make($image)->save($location);
                $brand->image=$img;
              
     }

    $brand->save();

    return redirect()->route('admin.brands')->with('buccess','New brand update Successfully');
    
}


public function delete($id){
 
    $brand=brand::find($id);
    if (!is_null($brand)) {
        if ($brand->parent_id==null)

        if (File::exists('images/brands/'.$brand->image)) {
            File::delete('images/brands/'.$brand->image);
         }
   $brand->delete();
    }
   
      
    
    return back();
  }

 
}