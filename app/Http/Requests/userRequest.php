<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class userRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

 
    public function rules(Request $request): array
    {
        if(in_array($this->method(),['PUT','PATCH'])){
            return [
                'name'=>'required',
                'email'=>'required|unique:users,email,'.$request->user.',id|email',
                'password'=>'nullable|min:6|confirmed',
            ];
        }else{
            return [
                'name'=>'required',
                'email'=>'required|unique:users,email|email',
                'password'=>'required|min:6|confirmed',
            ];
        }
    }
}
