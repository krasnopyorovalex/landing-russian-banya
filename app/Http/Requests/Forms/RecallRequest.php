<?php

namespace App\Http\Requests\Forms;

use App\Http\Requests\Request;

/**
 * Class RecallRequest
 * @package App\Http\Requests\Forms
 */
class RecallRequest extends Request
{
    public function rules(): array
    {
        return [
            'fio' => 'required|string|min:2',
            'phone' => 'required|string'
        ];
    }
}
