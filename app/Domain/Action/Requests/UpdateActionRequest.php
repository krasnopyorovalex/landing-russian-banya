<?php

namespace Domain\Action\Requests;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class UpdateActionRequest
 * @package Domain\Action\Requests
 */
class UpdateActionRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => 'bail|required|max:512',
            'text' => 'required|string',
            'preview' => 'required|string',
            'published_at' => 'date',
            'image' => 'image',
            'imageAlt' => 'string|max:255',
            'imageTitle' => 'string|max:255'
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
            'text.required' => 'Поле «Текст» обязательно для заполнения',
            'preview.required'  => 'Поле «Превью» обязательно для заполнения'
        ];
    }
}
