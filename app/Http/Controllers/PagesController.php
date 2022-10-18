<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Slider;
use App\brand;  

class PagesController extends Controller
{  public function index(){

	$sliders = Slider::orderBy('priority', 'asc')->get();
	$products=product::orderBy('id','desc')->where('status',1)->paginate(9);
return view('pages.index',compact('products','sliders'));
}



public function about(){
	return view('pages.about');
	}
	public function aboutus(){
		return view('partials.about.about');
		}
		public function leadership(){
			return view('partials.about.leadership');
			}
			
/*public function sidebar(){
		return view('partials.sidebar');
		}*/	

	
	

  public function search(Request $request)
  {
	$search = $request->search;

	  $products = Product::Where([['title','like',"%$search%"],['status',1]])->orWhere('description', 'like', '%'.$search.'%')
	  ->orWhere('slug', 'like', '%'.$search.'%')
	  ->orWhere('price', 'like', '%'.$search.'%')->paginate(9);
	  //dd($products);
	  

	  return view('pages.product.index', compact('search', 'products'));
  }


  public function show($id)
  {
	  $brand=brand::find($id);
	  if (!is_null($brand)) {
	   return view('pages.brand.show',compact('brand'));  
	  }
	  else{
		 return redirect('/')->with('error','sorry there is no brand for this id');
	  }
  }

				
}
