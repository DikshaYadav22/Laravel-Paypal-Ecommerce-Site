<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CategoryValidate;

class CategoriesController extends Controller
{
    
    public function index()
    {
        return view('categories.index')->with('categories', Category::all());
    }

    
    public function create()
    {
        return view('categories.create');
    }

    
    public function store(CategoryValidate $request)
    {
        $image = $request->image->store('category');
        Category::create([
                'name'=>$request->name,
                'image'=>$image
        ]);   
        return redirect()->route('categories.index');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }
}
