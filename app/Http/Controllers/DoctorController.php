<?php

namespace App\Http\Controllers;

use App\Day;
use App\Doctor;
use App\Time;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(){
        $days = Day::all();
        $times = Time::all();
    	return view('doctoradmin.doctor.create',compact('days','times'));
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:doctors|max:255',
        ]);
        $doctor = new Doctor;
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
        $doctor->name = $request->name;
        $doctor->chamber = $request->chamber;
        $doctor->lat = $request->lat;
        $doctor->lng = $request->lng;
        $doctor->direction = $request->direction;
        $doctor->desciption = $request->desciption;
        $doctor->phone = $request->phone;
        $doctor->image = $image_url;
        $doctor->save();
        $doctor->times()->sync($request->times);
        $doctor->days()->sync($request->days);
        $doctor->doctoradmins()->sync(auth('doctoradmin')->id());

        $notification = array(
        	'message' => 'Doctor Added Successfully!',
        	'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    } 
    public function view(){
        $days = Day::all();
        $times = Time::all();
        $doctors = Doctor::all();
        return view('doctoradmin.doctor.show',compact('doctors','days','times'));
    }
    public function destroy($id){
        $doctor = Doctor::findorfail($id);
        $image = $doctor->pImage;
        if($image != null){  
            unlink($image);
        }
        $doctor->delete();

        $notification = array(
            'message' => 'Doctor Deleted!',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }

     public function edit($id){
        $days = Day::all();
        $times = Time::all();
        $doctor = Doctor::findorfail($id);
        return view('doctoradmin.doctor.edit',compact('doctor','days','times'));
    }

    public function update(Request $request,$id){
        $doctor=Doctor::findorfail($id);
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
        $doctor->name = $request->name;
        $doctor->chamber = $request->chamber;
        $doctor->lat = $request->lat;
        $doctor->lng = $request->lng;
        $doctor->direction = $request->direction;
        $doctor->desciption = $request->desciption;
        $doctor->phone = $request->phone;
        $doctor->image = $image_url;
        $doctor->times()->detach();
        $doctor->days()->detach();
        $doctor->save();
        $doctor->times()->sync($request->times);
        $doctor->days()->sync($request->days);

        $notification = array(
            'message' => 'Doctor Updated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification,$doctor);
    }

    // user side
    public function viewAll(){
        return view('user.doctor.doctor');
    }
    public function show(Request $request){
        $lat=$request->lat;
        $lng=$request->lng;
        $doctors=Doctor::whereBetween('lat',[$lat-0.2,$lat+0.2])->whereBetween('lng',[$lng-0.2,$lng+0.2])->paginate(4);
        return response()->json($doctors);
    }
    public function placeDetailsAjax($id){
        return ['redirect' => route('doctor.details',$id)];
        
    } 
    public function placeDetailsLaravel($id){
        $doctor=Doctor::findorfail($id);
        return view('user.doctor.view',compact('doctor'));
    }
}
