<?php

namespace Domain\About\Requests;

use App\Http\Requests\Request;

/**
 * Class UpdateAboutRequest
 * @package Domain\Page\Requests
 */
class UpdateAboutRequest extends Request
{
    public function rules()
    {
        return [
            'name' => 'bail|required|max:512',
            'text' => 'required|string',
            'pos' => 'integer|min:0|max:255'
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
            'text.required' => 'Поле «Текст» обязательно для заполнения'
        ];
    }
}
