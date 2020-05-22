<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\validateResult;
use App\Result;


class ResultsController extends Controller
{
    
    public function index()
    {
        return view('results.index')->with('results', Result::all());
    }

    
    public function create()
    {
      return view('results.create');   
    }

    
    public function store(validateResult $request)
    {
        Result::create([
            'name' =>$request->name,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'city'=>$request->city,
            'state'=>$request->state,
            'zip'=>$request->zip
        ]);
        return redirect()->route('results.index');   
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit(Result $result)
    {
        return view('results.create')->with('result', $result);
    }

   
    public function update(Request $request, Result $result)
    {
        $result->update([
            'name' =>$request->name,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'city'=>$request->city,
            'state'=>$request->state,
            'zip'=>$request->zip
        ]);
        return redirect()->route('results.index');
    }

    
    public function destroy(Result $result)
    {
       $result->delete(); 
       return redirect()->route('results.index');
    }
}
