<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'category' => ['required', 'string', 'in:shirt,hoodie,hat'],
            'anime' => ['required', 'string', 'max:255', 'in:Naruto,Bleach,Death Note'],
            'color' => ['required', 'string', 'max:255', 'in:black,white,blue'],
            'image.*' => ['required', 'image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
            'S' => ['required', 'numeric'],
            'M' => ['required', 'numeric'],
            'L' => ['required', 'numeric'],
            'XL' => ['required', 'numeric'],
            'A' => ['required', 'numeric'],
        ];
    }
}
