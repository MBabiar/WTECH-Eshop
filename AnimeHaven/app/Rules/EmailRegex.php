<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EmailRegex implements ValidationRule
{
    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/^[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]{2,}$/', $value)) {
            $fail('Email must be in the format of John@example.com');
        }
    }
}