<?php

namespace Domain\Work\Requests;

use App\Http\Requests\Request;

/**
 * Class UpdateWorkRequest
 * @package Domain\Page\Requests
 */
class UpdateWorkRequest extends Request
{
    public function rules()
    {
        return [
            'name' => 'bail|required|max:512',
            'text' => 'nullable|string',
            'preview' => 'nullable|string',
//            'image' => 'image',
            'imageAlt' => 'string|max:255',
            'imageTitle' => 'string|max:255'
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
