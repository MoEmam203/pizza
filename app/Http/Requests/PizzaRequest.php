<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PizzaRequest extends FormRequest
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
        switch(request()->method){
            case 'POST':
                return [
                    'name' => 'required|string|min:3|max:40',
                    'description' => "required|min:3|max:500",
                    'small_pizza_price' => "required|numeric",
                    'medium_pizza_price' => "required|numeric",
                    'large_pizza_price' => "required|numeric",
                    'category' => 'required|string',
                    'image' => 'required|mimes:png,jpg'
                ];
            case 'PUT':
            case 'PATCH':
                return [
                    'name' => 'required|string|min:3|max:40',
                    'description' => "required|min:3|max:500",
                    'small_pizza_price' => "required|numeric",
                    'medium_pizza_price' => "required|numeric",
                    'large_pizza_price' => "required|numeric",
                    'category' => 'required|string',
                    'image' => 'mimes:png,jpg'
                ];
        }
    }
}
