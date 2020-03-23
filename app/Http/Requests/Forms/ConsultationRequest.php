<?php

namespace App\Http\Requests\Forms;

use App\Http\Requests\Request;

/**
 * Class ConsultationRequest
 * @package App\Http\Requests\Forms
 */
class ConsultationRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:2',
            'phone' => 'required|string',
            'email' => 'required|email'
        ];
    }
}
