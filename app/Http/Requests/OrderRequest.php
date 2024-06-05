<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
        if (request()->isMethod('POST')) {
            return [
                'total' => 'required',
                'status' => 'nullable',
                'registerby' => 'nullable',
            ];
        } elseif (request()->isMethod('PUT')) {
            return [
                'total' => 'required',
                'status' => 'nullable',
                'registerby' => 'nullable',
            ];
        }
    }

    public function attributes()
    {
        return [
			'order_id' => 'orden',
			
			
        ];
    }
}
