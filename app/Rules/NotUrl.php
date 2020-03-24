<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NotUrl implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return !(strpos($value, 'http://') !== false || strpos($value, 'https://') !== false);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'The validation error message.';
    }
}
