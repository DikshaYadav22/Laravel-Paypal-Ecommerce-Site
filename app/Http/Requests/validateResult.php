<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateResult extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'name' => 'required',
            'phone'=>'required|unique:results',
            'address'=>'required'
        ];
    }
}
