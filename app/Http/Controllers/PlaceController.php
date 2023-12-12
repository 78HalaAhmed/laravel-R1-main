<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Place;
use App\Traits\Common;

class PlaceController extends Controller
{ use Common;
    
    // private $columns = ['title','image','priceFrom','priceTo','description'];
    
    /**
     * Display a listing of the resource.
     */
    public function index()
     {
        $places = Place::get();
        return view('placeslist', compact('places'));
     }
    public function limit(){
        $places = Place::orderBy('created_at','desc')->take(6)->get();
        return view('place', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addplace');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   $message=['title.required'=>'Title is required',
        'description.required'=> 'should be text','image.required'=>'image required','priceFrom.required'=>'priceFrom required','priceTo.required'=>'priceTo required'];
        $data=$request->validate([
            'title'=>'required|string',
            'description'=>'required|string|max:100',
            'priceFrom'=>'required|numeric',
            'priceTo'=>'required|numeric',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ],$message); 
        $fileName = $this->uploadFile($request->image, 'assets/images');
        $data['image']= $fileName;
        Place::create($data);        
        // return redirect('cars');
        return dd($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $places = Place::findOrFail($id);
        return view('placedetail', compact('places'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Place::where('id', $id)->delete();        
        return redirect('placeslist');
    }
}
