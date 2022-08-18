<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminMenuRequest extends FormRequest
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
            "nameMenu"=>"required|string|max:255",
            "routeMenu"=>"required|string|max:255",
            "orderMenu"=>"required|numeric|min:1",
            "priorityMenu"=>"required|numeric|min:0|max:3"
        ];
    }
}
