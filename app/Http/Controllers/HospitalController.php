<?php

namespace App\Http\Controllers;

use App\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index(){
    	return view('admin.hospital.create');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:hospitals|max:255',
        ]);
        $hospital = new Hospital;
        $image_url=' ';
    	$image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/place-image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        }
        $hospital->name = $request->name;
        $hospital->lat = $request->lat;
        $hospital->lng = $request->lng;
        $hospital->direction = $request->direction;
        $hospital->desciption = $request->desciption;
        $hospital->image = $image_url;
        $hospital->save();

        $notification = array(
        	'message' => 'Hospital Added Successfully!',
        	'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    } 
    public function view(){
        $hospitals = Hospital::all();
        return view('admin.hospital.show',compact('hospitals'));
    }
    public function destroy($id){
        $hospital = Hospital::findorfail($id);
        $image = $hospital->pImage;
        if($image != null){  
            unlink($image);
        }
        $hospital->delete();

        $notification = array(
            'message' => 'Hospital Deleted!',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }

     public function edit($id){
        $hospital = Hospital::findorfail($id);
        return view('admin.hospital.edit',compact('hospital'));
    }

    public function update(Request $request,$id){
        $hospital=Hospital::findorfail($id);
        $image_url=' ';
        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/place-image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        }
        else{
            $image_url=$request->old_photo;
        }
        $hospital->name = $request->name;
        $hospital->lat = $request->lat;
        $hospital->lng = $request->lng;
        $hospital->direction = $request->direction;
        $hospital->desciption = $request->desciption;
        $hospital->image = $image_url;
        $hospital->save();
        
        $notification = array(
            'message' => 'Hospital Updated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification,$hospital);
    }
    // user side
    public function viewAll(){
        return view('user.hospital.hospital');
    }
    public function show(Request $request){
        $lat=$request->lat;
        $lng=$request->lng;
        $hospitals=Hospital::whereBetween('lat',[$lat-0.2,$lat+0.2])->whereBetween('lng',[$lng-0.2,$lng+0.2])->paginate(4);
        return response()->json($hospitals);
    }
    public function placeDetailsAjax($id){
        return ['redirect' => route('hospital.details',$id)];
        
    } 
    public function placeDetailsLaravel($id){
        $hospital=Hospital::findorfail($id);
        return view('user.hospital.view',compact('hospital'));
    }
}
