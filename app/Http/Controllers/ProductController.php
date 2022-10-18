<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\User;
use App\order;
use Auth;
use PDF;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(9);
        return view('pages.product.index')->with('products', $products);
    }
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->where('status',1)->first();
        if (!is_null($product)) {
          return view('pages.product.show', compact('product'));
        }else {

          return redirect()->route('products')->with('errors', 'Sorry !! There is no product by this URL..');
        }
    }
    
    public function viewOrderInvoice($id){
                $order=order::find($id);
                        
                         return view('pages.users.orderinvoice', compact('order'));

    }


    public function downloadOrderInvoice($id){
                $order=order::find($id);
                         $pdf = PDF::loadView('pages.users.orderinvoice', compact('order'));
                         return $pdf->stream('orderinvoice.pdf');
                         return $pdf->download('orderinvoice.pdf');
                    
    }

   
}
