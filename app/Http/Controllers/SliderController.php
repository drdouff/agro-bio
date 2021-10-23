<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class SliderController extends Controller
{
    //

    public function addslider(){
        return view('admin.add-slider');
    }

    public function sauverslider(Request $request){

        $this->validate($request, ['description1' => 'required',
                                   'description2' => 'required',
                                   'slider_image' => 'image|nullable|max:1999',
                                  ]);
        if($request->hasFile('slider_image')){
            //1 : get file name with ext
            $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();
            //2 : get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //3 : get just file extension
            $extension = $request->file('slider_image')->getClientOriginalExtension();
            //4 : file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //uploader image
            $path = $request->file('slider_image')->storeAs('public/slider_image', $fileNameToStore);

        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }

        $slider = new Slider();

        $slider->description1 = $request->input('description1');
        $slider->description2 = $request->input('description2');
        $slider->slider_image = $fileNameToStore;
        $slider->status = 1;

        $slider->save();

        return redirect('/addslider')->with('status', 'le slider a bien ete ajoute !');


    }

    public function slider(){
        $slider = Slider::get();
        return view('admin.sliders')->with('sliders', $slider);
    }

    public function edit_slider($id){
        $slider = Slider::find($id);

        return view('admin.editeslider')->with('slider', $slider);
    }

    public function modifierslider(Request $request){

        $this->validate($request, ['description1' => 'required',
            'description2' => 'required',
            'slider_image' => 'image|nullable|max:1999',]);

        $slider = Slider::find($request->input('id'));
        $slider->description1 = $request->input('description1');
        $slider->description2 = $request->input('description2');
        $slider->status = 1;

        if($request->hasFile('slider_image')){
            //1 : get file name with ext
            $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();
            //2 : get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //3 : get just file extension
            $extension = $request->file('slider_image')->getClientOriginalExtension();
            //4 : file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //uploader image
            $path = $request->file('slider_image')->storeAs('public/slider_image', $fileNameToStore);

        }

        if($slider->slider_image != 'noimage.jpg'){
            Storage::delete('public/slider_image/'.$slider->slider_image);
        }

        $slider->slider_image = $fileNameToStore;

        $slider->update();

        return redirect('/slider')->with('status', 'le slider a bien ete Modifiee !');
    }

    public function suprimerslider($id){

        $slider = Slider::find($id);

        if($slider->slider_image != 'noimage.jpg'){
            Storage::delete('public/product_image/'.$slider->slider_image);
        }

        $slider->delete();

        return redirect('/slider')->with('status', 'le slider  a ete supprimee avec succes');
    }

    public function active_slider($id){
        $slider = Slider::find($id);

        $slider-> status = 1;

        $slider->update();

        return redirect('/slider')->with('status', 'le slider  a ete Active  avec succes');
    }

    public function desactiver_slider($id){
        $slider = Slider::find($id);

        $slider-> status = 0;

        $slider->update();

        return redirect('/slider')->with('status', 'le slider  a ete Desactiver  avec succes');
    }
}
