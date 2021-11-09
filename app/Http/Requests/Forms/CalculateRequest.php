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
            'name' => ['required', 'string', 'min:2', 'regex:/[А-Яа-яЁё]/u', new NotUrl()],
            'phone' => ['required', 'string']
        ];
    }
}
