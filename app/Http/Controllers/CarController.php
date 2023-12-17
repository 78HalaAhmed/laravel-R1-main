<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Car;
use App\Models\Category;
use App\Traits\Common;
use Illuminate\Support\Facades\Redirect;
use Spatie\Backtrace\File;

class CarController extends Controller
{ use Common;
    private $columns = ['carTitle', 'description','published'];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();
        return view('cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {  
        $categories=Category::select('id','categoryName')->get();
        return view('addCar',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    { 
        $message=['carTitle.required'=>'CarTitle is required',
        'description.required'=> 'should be text','image.required'=>'image required','price.required'=>'price required'];
        $data=$request->validate([
            'carTitle'=>'required|string',
            'description'=>'required|string|max:100',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required',
        ],$message);  
        $fileName = $this->uploadFile($request->image, 'assets/images');
        $data['image']= $fileName;
        $data['published'] = isset($request['published']);
        Car::create($data);        
        // return redirect('cars');
        return dd($data);
        // $cars = new Car;
        // $cars->carTitle = $request->carTitle;
        // $cars->description = $request->description;
        // if(isset($request->remember)){
        //     $cars->published = true;
        // }else{
        //     $cars->published = false;
        // }
        // $cars->save();
        // return "Car Data Added Successfully";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        return view('carDetail', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        $categories = Category::select('id', 'categoryName')->get();
        return view('updateCar', compact('car', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $data = $request->only($this->columns);
        $data['published'] = isset($data['published'])? true : false;
        Car::where('id', $id)->update($data);        
        
    $message=['carTitle.required'=>'CarTitle is required',
        'description.required'=> 'should be text','image.required'=>'image required','price.required'=>'price required' ];
    $data=$request->validate([
        'carTitle'=>'required|string',
            'description'=>'required|string|max:100',
            'image' => 'required|mimes:png,jpg,jpeg|max:5000',
            'category_id' => 'required',
    ],$message);
    $cars = Car::find($id);
    $cars->carTitle = $request->get('carTitle');
    $cars->description = $request->get('description');
    $cars->category_id = $request->get('category_id');
    if ($request->hasFile('image')) {
        
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('assets/images'), $imageName);
        $cars->image = $imageName;
    }
    $cars->save();
    return redirect('cars');
     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Car::where('id', $id)->delete();        
        return redirect('cars');
    }

    public function trashed()
    {
        $cars = Car::onlyTrashed()->get();        
        return view('trashed', compact('cars'));
    }

    public function restore(string $id): RedirectResponse
    {
        Car::where('id', $id)->restore();        
        return redirect('cars');
    }

    public function delete(string $id): RedirectResponse
    {
        Car::where('id', $id)->forceDelete();
        return redirect('cars');
    }
}
