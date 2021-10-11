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
            'fio' => 'required|string|min:2|regex:/[А-Яа-яЁё]/u',
            'phone' => 'required|string'
        ];
    }
}
