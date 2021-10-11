<?php

namespace Domain\Service\Requests;

use App\Http\Requests\Request;

/**
 * Class CreateServiceRequest
 * @package Domain\Service\Requests
 */
class CreateServiceRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => 'bail|required|max:512',
            'text' => 'string|nullable',
            'preview' => 'string|nullable',
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
