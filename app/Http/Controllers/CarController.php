<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;
use App\Traits\Common;

class CarController extends Controller
{
    use Common;
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
        $categories = Category::select('id', 'categoryName')->get();
        return view('addCar', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    { 
        $messages=$this->messages();
        $data = $request->validate([
            'carTitle'=>'required|string',
            'description'=>'required|string|max:100',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required'
        ], $messages);  
        $fileName = $this->uploadFile($request->image, 'assets/images');
        $data['image'] = $fileName;
        // $data['published'] = isset($request['published'])? true : false;
        $data['published'] = isset($request['published']); // anthor way
        Car::create($data);        
        return redirect('cars');
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
        $messages = $this->messages();
            
        $data = $request->validate([
            'carTitle'=>'required|string',
            'description'=>'required|string|max:100',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required'
        ], $messages);
        
        // Update image if new file selected
        if ($request->hasFile('image')) {
            $fileName = $this->uploadFile($request->image, 'assets/images');
            $data['image'] = $fileName;
        }
        // $data = $request->only($this->columns);
        $data['published'] = isset($request['published'])? true : false;
        Car::where('id', $id)->update($data);        
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

    public function messages()
    {
        return [
            'carTitle.required' => __('messages.carTitleValidate'),
            'description.required' => __('messages.descriptionValidate'),
            'image.required' => __('messages.imageValidate'),
            'image.mimes' => __('messages.imageExtentionValidate'),
            'category_id.required' => __('messages.categoryValidate')
        ];
    }
}