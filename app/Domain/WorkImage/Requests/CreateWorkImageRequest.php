<?php

namespace Domain\WorkImage\Requests;

use App\Http\Requests\Request;

/**
 * Class CreateWorkImageRequest
 * @package Domain\WorkImage\Requests
 */
class CreateWorkImageRequest extends Request
{
    public function rules()
    {
        return [
            'upload' => 'image',
            'gallery_id' => 'integer'
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
            'upload.image' => 'Разрешено загружать только изображения',
            'gallery_id.integer' => 'Поле «id галереи» должно быть целым числом'
        ];
    }
}
