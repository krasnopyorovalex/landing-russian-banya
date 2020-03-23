<?php

namespace Domain\Action\Requests;

use App\Http\Requests\Request;

/**
 * Class CreateActionRequest
 * @package Domain\Action\Requests
 */
class CreateActionRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => 'bail|required|max:512',
            'text' => 'required|string',
            'preview' => 'required|string',
            'is_published' => 'digits_between:0,1',
            'image' => 'image',
            'published_at' => 'date'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Поле «Название» обязательно для заполнения',
            'text.required'  => 'Поле «Текст» обязательно для заполнения',
            'preview.required'  => 'Поле «Превью» обязательно для заполнения'
        ];
    }
}
