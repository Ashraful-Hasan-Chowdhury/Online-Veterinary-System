<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Cure;
use App\Diseas;
use Illuminate\Http\Request;

class CureController extends Controller
{
    public function index(){
    	$animals = Animal::all();
    	$diseases = Diseas::all();
    	return view('admin.cure.create',compact('animals','diseases'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'cures' => 'required',
        ]);
        
        $cure = new Cure;
        $cure->symptoms = $request->symptoms;
        $cure->cures = $request->cures;
        $cure->save();
        $cure->animals()->sync($request->animals);
        $cure->diseases()->sync($request->diseases);
        $notification = array(
            'message' => 'Cure Posted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function view(){
        $cures = Cure::all();
        return view('admin.cure.show',compact('cures'));
    }

    public function destroy($id){
        $cure = Cure::findorfail($id);

        $cure->delete();

        $notification = array(
            'message' => 'Cure Deleted!',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }

    public function edit($id){
    	$animals = Animal::all();
    	$diseases = Diseas::all();
        $cure = Cure::findorfail($id);
        return view('admin.cure.edit',compact('cure','animals','diseases'));
    }

    public function update(Request $request,$id){
        $cure = Cure::findorfail($id);
        $cure->symptoms = $request->symptoms;
        $cure->cures = $request->cures;
        $cure->animals()->detach();
        $cure->diseases()->detach();
        $cure->save();
        $cure->animals()->sync($request->animals);
        $cure->diseases()->sync($request->diseases);
        $notification = array(
            'message' => 'Cure Posted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification,$cure);
    }
    // User Side
    public function viewAll(){
        $cures = Cure::paginate(5);
        $animals = Animal::all();
        $diseases = Diseas::all();
        $status = null;
        return view('user.cure.cure',compact('cures','animals','diseases','status'));
    }
    public function find($id){
        $animal = Animal::findorfail($id);
        $cure = Cure::with('animals','diseases')->get();
        $diseases  = array();
        foreach ($cure as $key => $c) {
            foreach ($c->animals as $key => $animal) {
                if ($animal->id == $id) {
                    foreach ($c->diseases as $key => $d) {
                        if (($key = array_search($d->name, $diseases)) != true) {
                            $diseases[]= $d->name;
                        }
                    }
                }
            }
        }

        return response()->json($diseases);
    }

    public function findCure(Request $request){
        $sanimal=Animal::findorfail($request->animal);
        $sdisease=Diseas::where('name', '=',$request->disease)->firstOrFail();
        $cures = Cure::all();
        $animals = Animal::all();
        $status = 'search';
        return view('user.cure.cure',compact('cures','animals','sdisease','sanimal','status'));
    }

    public function read($id){
        $cure = Cure::findorfail($id);
        return view('user.cure.view',compact('cure'));
    }
}
