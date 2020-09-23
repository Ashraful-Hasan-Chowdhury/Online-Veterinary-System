<?php

namespace App\Http\Controllers;

use App\Appoinment;
use Illuminate\Http\Request;

class AppoinmentController extends Controller
{
    public function index(){
        $appoinments = Appoinment::all();
        return view('user.appoinment.appoinment',compact('appoinments'));
    }
    public function show(){
        $appoinments = Appoinment::all();
        return view('doctoradmin.appoinment.show',compact('appoinments'));
    }
    public function accept($id){
        $appoinment = Appoinment::findorfail($id);
        $appoinment->status = 'accepted';
        $appoinment->save();
        $notification = array(
            'message' => 'Serial Accepted!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function reject($id){
        $appoinment = Appoinment::findorfail($id);
        $appoinment->status = 'rejected';
        $appoinment->save();
        $notification = array(
            'message' => 'Serial Rejected!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function store(Request $request){
    	$validatedData = $request->validate([
            'date' => 'required',
        ]);
    	$date = date("d-m-Y", strtotime($request->date));
 
        $appoinment = new Appoinment;
        $appoinment->date = $date;
        $appoinment->trxid = $request->trxid;
        $appoinment->status = 'pending';
        $appoinment->save();
        $appoinment->days()->sync($request->day);
        $appoinment->times()->sync($request->time);
        $appoinment->doctors()->sync($request->doctorid);
        $appoinment->users()->sync(auth()->id());
        $notification = array(
            'message' => 'আপনার সিরিয়াল দেয়া হয়েছে!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
