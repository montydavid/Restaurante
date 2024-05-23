<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    
     public function rules(): array
    {
            if(request()->isMethod('post')){
                return[
                    'name' => 'required|string|max:255',
                    'description' => 'nullable',
                    'stock' => 'required|numeric',
                    'price' => 'required|min:0',
                    'image' => 'nullable|mimes:jpg,jpeg,png|max:3000',
                    'status' => 'nullable'
                ];  
            }elseif(request()->isMethod('put')){
                return[
                    'name' => 'required|string|max:255',
                    'description' => 'nullable',
                    'stock' => 'required|numeric',
                    'price' => 'required|min:0',
                    'image' => 'nullable|mimes:jpg,jpeg,png|max:3000',
                    'status' => 'nullable'
                ];   
            }
            
    }
    public function attributes()
    {
        return [
			'product_id' => 'producto',
			
			'image' => 'fotografía'
			
			
        ];
    }
}
