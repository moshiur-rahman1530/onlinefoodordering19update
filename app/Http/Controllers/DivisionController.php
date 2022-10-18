<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\division;
//use App\district;


class DivisionController extends Controller
{
    public function index(){
        $divisions=division::orderBy('id','asc')->get();
        return view('admin.pages.divisions.index',compact('divisions'));
        }

        public function __construct()
        {
            $this->middleware('auth:admin');
        }

        public function create(){
        
        return view('admin.pages.divisions.create');
            }   

            public function store(Request $request){
             
                $this->validate($request,[
                    'name' => 'required|min:4|string',
                 
                    'delivery_charge'=>'required|numeric|gt:0'             
               ],
            [
                'name.required'=>'please provide valid name',
           
                 'delivery_charge.required'=>'please provide valid delivery_charge',
            ]);
            $division= new division();
            $division->name=$request->name;
        
            $division->delivery_charge=$request->delivery_charge;
            $division->save();
            return redirect()->route('admin.divisions')->with('success','New division Add Successfully');
            
}
public function edit($id){
  
    $division=division::find($id);
    if (!is_null($division)) {
        return view('admin.pages.divisions.edit',compact('division'));
         }
         else{
            return redirect()->route('admin.divisions'); 
         } 
    }



    public function update(Request $request, $id){
             
        $this->validate($request,[
            'name' => 'required|string|min:4',
         
             'delivery_charge'=>'required|numeric|gt:0'                
       ],
    [
        'name.required'=>'please provide valid name',
    
        'delivery_charge.required'=>'please provide valid delivery_charge',
    ]);
    $division= division::find($id);
    $division->name=$request->name;
 
    $division->delivery_charge=$request->delivery_charge;
    $division->save();

    return redirect()->route('admin.divisions')->with('success','New division update Successfully');
    
}


public function delete($id){
 
    $division=division::find($id);
    if (!is_null($division)) {
        // $districts=district::where('division_id',$division->id)->get();
        // foreach ($districts as $district) {
        //     $district->delete();
        // }
        
   $division->delete();
    }
  
    return back()->with('success','Division Delete Successfully');
  }
}