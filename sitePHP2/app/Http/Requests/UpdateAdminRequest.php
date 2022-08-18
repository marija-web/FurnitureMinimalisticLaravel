<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateAdminRequest extends FormRequest
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
            "firstName"=>"required|string|min:3|regex:/^[A-Z][a-z]{2,15}+$/",
            "lastName"=>"required|string|max:15|regex:/^[A-Z][a-z]{2,15}+$/",
            "email"=>"required|email|max:255|"
        ];
    }
}
