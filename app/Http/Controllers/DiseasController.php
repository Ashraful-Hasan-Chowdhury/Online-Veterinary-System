<?php

namespace App\Http\Controllers;

use App\Diseas;
use Illuminate\Http\Request;

class DiseasController extends Controller
{
    public function index(){
    	return view('admin.diseas.create');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:diseas|max:255',
        ]);
        $diseas = new Diseas;

        $diseas->name = $request->name;
       
        $diseas->save();

        $notification = array(
        	'message' => 'Disease Added Successfully!',
        	'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    } 
    public function view(){
        $diseases = Diseas::all();
        return view('admin.diseas.show',compact('diseases'));
    }
    public function destroy($id){
        $diseas = Diseas::findorfail($id);

        $diseas->delete();

        $notification = array(
            'message' => 'Disease Deleted!',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }

     public function edit($id){
        $diseas = Diseas::findorfail($id);
        return view('admin.diseas.edit',compact('diseas'));
    }

    public function update(Request $request,$id){
        $diseas=Diseas::findorfail($id);
        
        $diseas->name = $request->name;
        
        $diseas->save();
        
        $notification = array(
            'message' => 'Disease Updated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification,$diseas);
    }
}
