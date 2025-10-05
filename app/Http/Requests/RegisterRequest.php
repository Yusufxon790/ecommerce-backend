<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'=>'required',
            'last_name'=>'nullable',
            'email'=>'required|email:rfc,dns|unique:users,email',
            'phone'=>'required|unique:users,phone',
            'password'=>'required|min:8',
            'password_confirmation'=>'required|same:password',
            'photo'=>'nullable|mimes:jpg,bmp,png,jpeg|file|max:2000'
        ];
    }
}
