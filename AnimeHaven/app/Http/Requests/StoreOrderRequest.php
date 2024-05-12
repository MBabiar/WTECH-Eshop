<?php

namespace App\Http\Requests;

use App\Rules\EmailRegex;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
        return [
            'user_name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]*$/', 'min:2'],
            'user_email' => ['required', 'string', 'email', 'max:255', new EmailRegex],
            'user_phone' => ['required', 'string', 'max:255', 'regex:/^[0-9]{3}\s[0-9]{3}\s[0-9]{3}$/'],
            'user_country' => ['required', 'string', 'max:255', 'in:Slovakia,Czech Republic'],
            'user_city' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]*$/', 'min:2'],
            'user_zip' => ['required', 'string', 'max:255', 'regex:/^[0-9]{5}$/'],
            'user_street' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]*$/', 'min:2'],
            'user_house_number' => ['required', 'integer', 'min:1'],
        ];
    }
}
