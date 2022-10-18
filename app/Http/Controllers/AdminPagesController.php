<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\ProductImage;
use Image;
use App\User;
use File;
use App\order;
use App\category;
use App\division;
use Illuminate\Support\Str;


class AdminPagesController extends Controller
{
    public function index(){
       $orders=Order::all();
       $divisions=division::orderBy('priority','asc')->get();
         $categories=category::orderBy('id','desc')->get();
       $users=User::all();
        $new_products=Product::where('status',0)->get();
        $products=Product::where('status',1)->get();
        return view('admin.pages.index',compact('orders','new_products','products','users','categories','divisions'));
        }

        public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
     

        public function create(){
          
            return view('admin.pages.product.create');
            } 
            public function manage_products(){

                $products=product::orderBy('id','desc')->get();
                return view('admin.pages.product.index')->with('products',$products);
                } 
                public function product_edit($id){
                    $product=product::find($id);
                    return view('admin.pages.product.edit')->with('product',$product);
                    } 
                    

                   

            public function store(Request $request){
             
                $request->validate([
                    'title' => 'required|max:100|min:3|string',
                    'description' => 'required',
                    'price' => 'required|numeric|gt:0|lt:5000',
                    'size' => 'nullable|string',
                    'image'=>'nullable|image',
                    'category_id' => 'required|numeric',
                    'brand_id' => 'nullable|numeric', 
                ]);

             $product=new product;
             $product->title=$request->title;
             $product->description=$request->description;  
             $product->price=$request->price; 
             $product->size=$request->size;
             
             $product->slug=Str::slug($request->title);
             $product->category_id=$request->category_id;  
             $product->brand_id=$request->brand_id;  
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
                $i=0;
                foreach ($request->product_image as $image) {
                   // if ($request->hasFile('product_image')) {
                      //  $image=$request->file('product_image');
                        $img=time().$i.'.'.$image->getClientOriginalExtension();
                        $location='images/food/'.$img;
                        Image::make($image)->save($location);
         
                      $product_image=new ProductImage;
                      $product_image->product_id=$product->id;
                      $product_image->image=$img;
                      $product_image->save();
                      $i++;
                      
                }
             }

             return redirect()->route('admin.product.create')->with('success','New Product Add Successfully!!!');


            }
           
           

public function product_update(Request $request, $id){
             
    $request->validate([
        'title' => 'required|max:100',
        'description' => 'required',
        'price' => 'required|numeric',
        'size' => 'nullable|string',
        'category_id' => 'required|numeric',
         'brand_id' => 'nullable|numeric', 
    ]);

 $product= product::find($id);
 $product->title=$request->title;
 $product->description=$request->description;  
 $product->price=$request->price; 
 $product->size=$request->size; 
 $product->category_id=$request->category_id;  
 $product->brand_id=$request->brand_id;  
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
 
 

 return redirect()->route('admin.products')->with('success','Product Update sucessfully!!');


}


public function delete($id){
 
$product=product::find($id);
  if (!is_null($product)) {
 $product->delete();
  }
  foreach ($product->images as $img){
    $file_name=$img->image;
    if (file_exists("images/food/".$file_name)) {
      unlink("images/food/".$file_name);
    }
$img->delete();
  }
  return back()->with('success','item has deleted');
}


public function status($id){
  $product=Product::find($id);
  if ($product->status) {
     $product->status=0;
     $product->save();
   return back()->with('error','Product is now not available!!!');
  }
  else {
      $product->status=1;
      $product->save();
      return back()->with('success','Product is available now!!!');
   }
   
  }


      public function active_product(){
      $products=product::all()->where('status',1);
      return view('admin.pages.product.active',compact('products'));
        }

        public function inactive_product(){
        $products=product::all()->where('status',0);
        return view('admin.pages.product.inactive',compact('products'));
                }
  
  
}


