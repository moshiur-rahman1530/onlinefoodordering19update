<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\district;
use App\division;


class DistrictController extends Controller
{
//     public function index(){
//         $districts=district::orderBy('name','asc')->get();
//         return view('admin.pages.districts.index',compact('districts'));
//         }

//         public function __construct()
//         {
//             $this->middleware('auth:admin');
//         }

//         public function create(){
//             $divisions=division::orderBy('priority','asc')->get();
//             return view('admin.pages.districts.create',compact('divisions'));
//             }    

//             public function store(Request $request){
             
//                 $this->validate($request,[
//                     'name' => 'required',
//                     'division_id' => 'required',             
//                ],
//             [
//                 'name.required'=>'please provide valid name',
//                 'division_id.required'=>'please provide valid division_id',
//             ]);
//             $district= new district();
//             $district->name=$request->name;
//             $district->division_id=$request->division_id;
//             $district->save();

//             return redirect()->route('admin.districts')->with('success','New district Add Successfully');
            
// }
// public function edit($id){
//     $divisions=division::orderBy('priority','asc')->get();
//     $district=district::find($id);
//     if (!is_null($district)) {
//         return view('admin.pages.districts.edit',compact('district','divisions'));
//          }
//          else{
//             return redirect()->route('admin.districts'); 
//          } 
//     }



//     public function update(Request $request, $id){
             
//         $this->validate($request,[
//             'name' => 'required',
//             'division_id' => 'required',             
//        ],
//     [
//         'name.required'=>'please provide valid name',
//         'division_id.required'=>'please provide valid division_id',
//     ]);
//     $district= district::find($id);
//     $district->name=$request->name;
//     $district->division_id=$request->division_id;
//     $district->save();

//     return redirect()->route('admin.districts')->with('success','New district update Successfully');
    
// }


// public function delete($id){
 
//     $district=district::find($id);
//     if (!is_null($district)) {
//    $district->delete();
//     }
   

//     return back()->with('success','district Delete Successfully');
//   }
}