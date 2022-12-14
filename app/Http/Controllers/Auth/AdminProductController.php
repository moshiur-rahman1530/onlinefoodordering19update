<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\product;
use App\ProductImage;
use Image;

class AdminProductController extends Controller
{
  public function index(){
    $products=product::orderBy('id','desc')->get();
    return view('admin.pages.product.index')->with('products',$products);
    } 
 
    
        public function create(){
            return view('admin.pages.product.create');
            } 
            
                public function edit($id){
                    $product=product::find($id);
                    return view('admin.pages.product.edit')->with('product',$product);
                    } 

            public function store(Request $request){
             
                $request->validate([
                    'title' => 'required|max:100',
                    'description' => 'required',
                    'price' => 'required|numeric',
                    'size' => 'nullable|string',
                ]);

             $product=new product;
             $product->title=$request->title;
             $product->description=$request->description;  
             $product->price=$request->price; 
             $product->size=$request->size; 
             $product->slug= Str::slug($request->title);
             $product->category_id=1;  
             $product->brand_id=1;  
             $product->admin_id=1;  
             $product->save();


             /*if ($request->hasFile('product_image')) {
               $image=$request->file('product_image');
               $img=time().'.'.$image->getClientOriginalExtension();
               $location=public_path('images/food/'.$img);
               Image::make($image)->save($location);

             $product_image=new ProductImage;
             $product_image->product_id=$product->id;
             $product_image->image=$img;
             $product_image->save();
             }*/
             
             if (count($request->product_image) > 0) {
                
                foreach ($request->product_image as $image) {
                   // if ($request->hasFile('product_image')) {
                      //  $image=$request->file('product_image');
                        $img=time().'.'.$image->getClientOriginalExtension();
                        $location=public_path('images/food/'.$img);
                        Image::make($image)->save($location);
         
                      $product_image=new ProductImage;
                      $product_image->product_id=$product->id;
                      $product_image->image=$img;
                      $product_image->save();
                      
                }
             }

             return redirect()->route('admin.product.create');


            }


public function update(Request $request, $id){
             
    $request->validate([
        'title' => 'required|max:100',
        'description' => 'required',
        'price' => 'required|numeric',
    ]);

 $product= product::find($id);
 $product->title=$request->title;
 $product->description=$request->description;  
 $product->price=$request->price;  
 $product->size=$request->size; 
 $product->save();


 /*if ($request->hasFile('product_image')) {
   $image=$request->file('product_image');
   $img=time().'.'.$image->getClientOriginalExtension();
   $location=public_path('images/food/'.$img);
   Image::make($image)->save($location);

 $product_image=new ProductImage;
 $product_image->product_id=$product->id;
 $product_image->image=$img;
 $product_image->save();
 }*/
 
 

 return redirect()->route('admin.products');


}
}
