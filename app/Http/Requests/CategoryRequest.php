<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|unique:categories',
            'image'=>'image|mimes:png,jpg,svg,web,png|max:5000'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=>'ماينفعش تسيبها فاضية',
            'image.required'=>'ماينفعش تسيبها فاضية',
            'image.max'=>'حجم الصورة كبير',
            'image.image'=>'لازم يكون صورة',
        ];
    }
}
