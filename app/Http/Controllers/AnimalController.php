<?php

namespace App\Http\Controllers;

use App\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index(){
    	return view('admin.animal.create');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:animals|max:255',
        ]);
        $animal = new Animal;

        $animal->name = $request->name;
       
        $animal->save();

        $notification = array(
        	'message' => 'Animal Added Successfully!',
        	'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    } 
    public function view(){
        $animals = Animal::all();
        return view('admin.animal.show',compact('animals'));
    }
    public function destroy($id){
        $animal = Animal::findorfail($id);
        $animal->delete();

        $notification = array(
            'message' => 'Animal Deleted!',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }

     public function edit($id){
        $animal = Animal::findorfail($id);
        return view('admin.animal.edit',compact('animal'));
    }

    public function update(Request $request,$id){
        $animal=Animal::findorfail($id);
        
        $animal->name = $request->name;
        
        $animal->save();
        
        $notification = array(
            'message' => 'Animal Updated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification,$animal);
    }
}
