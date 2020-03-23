<?php

namespace Domain\Work\Requests;

use App\Http\Requests\Request;

/**
 * Class CreateWorkRequest
 * @package Domain\Work\Requests
 */
class CreateWorkRequest extends Request
{
    public function rules()
    {
        return [
            'name' => 'bail|required|max:512',
            'text' => 'required|string',
            'preview' => 'required|string',
            'image' => 'image',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Поле «Название» обязательно для заполнения',
            'text.required'  => 'Поле «Текст» обязательно для заполнения',
            'preview.required'  => 'Поле «Превью» обязательно для заполнения'
        ];
    }
}
