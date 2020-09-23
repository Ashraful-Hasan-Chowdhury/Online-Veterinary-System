<?php

namespace App\Http\Controllers;

use App\Pharmacy;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    public function index(){
    	return view('admin.pharmacy.create');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:pharmacies|max:255',
        ]);
        $pharmacy = new Pharmacy;
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
        $pharmacy->name = $request->name;
        $pharmacy->lat = $request->lat;
        $pharmacy->lng = $request->lng;
        $pharmacy->direction = $request->direction;
        $pharmacy->desciption = $request->desciption;
        $pharmacy->image = $image_url;
        $pharmacy->save();

        $notification = array(
        	'message' => 'Pharmacy Added Successfully!',
        	'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    } 
    public function view(){
        $pharmacies = Pharmacy::all();
        return view('admin.pharmacy.show',compact('pharmacies'));
    }
    public function destroy($id){
        $pharmacy = Pharmacy::findorfail($id);
        $image = $pharmacy->pImage;
        if($image != null){  
            unlink($image);
        }
        $pharmacy->delete();

        $notification = array(
            'message' => 'Pharmacy Deleted!',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }

     public function edit($id){
        $pharmacy = Pharmacy::findorfail($id);
        return view('admin.pharmacy.edit',compact('pharmacy'));
    }

    public function update(Request $request,$id){
        $pharmacy=Pharmacy::findorfail($id);
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
        $pharmacy->name = $request->name;
        $pharmacy->lat = $request->lat;
        $pharmacy->lng = $request->lng;
        $pharmacy->direction = $request->direction;
        $pharmacy->desciption = $request->desciption;
        $pharmacy->image = $image_url;
        $pharmacy->save();
        
        $notification = array(
            'message' => 'Pharmacy Updated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification,$pharmacy);
    }
    // user side
    public function viewAll(){
        return view('user.pharmacy.pharmacy');
    }
    public function show(Request $request){
        $lat=$request->lat;
        $lng=$request->lng;
        $pharmacies=Pharmacy::whereBetween('lat',[$lat-0.2,$lat+0.2])->whereBetween('lng',[$lng-0.2,$lng+0.2])->paginate(4);
        return response()->json($pharmacies);
    }
    public function placeDetailsAjax($id){
        return ['redirect' => route('pharmacy.details',$id)];
        
    } 
    public function placeDetailsLaravel($id){
        $pharmacy=Pharmacy::findorfail($id);
        return view('user.pharmacy.view',compact('pharmacy'));
    }
}
