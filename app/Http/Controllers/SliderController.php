<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Image;
use File;

class SliderController extends Controller
{
    public function __construct()
  {
    $this->middleware('auth:admin');
  }
  
  public function index()
  {
    $sliders = Slider::orderBy('priority', 'asc')->get();
    return view('admin.pages.sliders.index', compact('sliders'));
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'title'  => 'required',
      'image'  => 'required|image',
      
      'button_link'  => 'nullable|url'
    ],
    [
      'title.required'  => 'Please provide slider title',
    
      'image.required'  => 'Please provide slider image',
      'image.image'  => 'Please provide a valid slider image',
      'button_link.url'  => 'Please provide a valid slider button link'
    ]);

    $slider = new Slider();
    $slider->title = $request->title;
    $slider->button_text = $request->button_text;
    $slider->button_link = $request->button_link;


    if ($request->image) {
        $image = $request->file('image');
        $img = time() . '.'. $image->getClientOriginalExtension();
        $location = 'images/sliders/' .$img;
        Image::make($image)->save($location);
        $slider->image = $img;
    }
    $slider->save();
    return redirect()->route('admin.sliders')->with('success', 'A new slider has added successfully !!');

  }

    public function update(Request $request, $id)
    {
          $this->validate($request, [
          'title'  => 'required',
          'image'  => 'nullable|image',
          
          'button_link'  => 'nullable|url'
        ],
        [
          'title.required'  => 'Please provide slider title',
         
          'image.image'  => 'Please provide a valid slider image',
          'button_link.url'  => 'Please provide a valid slider button link'
        ]);

        $slider = Slider::find($id);
        $slider->title = $request->title;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;


        if ($request->image) {
            // Delete the old Slider
            if (File::exists('images/sliders/'.$slider->image)) {
                File::delete('images/sliders/'.$slider->image);
              }

            $image = $request->file('image');
            $img = time() . '.'. $image->getClientOriginalExtension();
            $location = 'images/sliders/' .$img;
            Image::make($image)->save($location);
            $slider->image = $img;
        }
        $slider->save();
        return redirect()->route('admin.sliders')->with('success', 'Slider has updated successfully !!');

    }

    public function delete($id)
    {
      $slider = Slider::find($id);
      if (!is_null($slider)) {
        //Delete Image
        if (File::exists('images/sliders/'.$slider->image)) {
            File::delete('images/sliders/'.$slider->image);
          }
        $slider->delete();
      }
      return back()->with('success', 'Slider has deleted successfully !!');

    }
}
