<?php

namespace App\Http\Requests\Forms;

use App\Http\Requests\Request;
use App\Rules\NotUrl;

/**
 * Class CalculateRequest
 * @package App\Http\Requests\Forms
 */
class CalculateRequest extends Request
{
    public function rules(): array
    {
        return [
            'estate-type' => ['required', 'string'],
            'address' => ['required', 'string', new NotUrl()],
            'square' => ['required', 'string', new NotUrl()],
            'cost' => ['required', 'string', new NotUrl()],
            'name' => ['required', 'string', 'min:2', new NotUrl()],
            'phone' => ['required', 'string']
        ];
    }
}
