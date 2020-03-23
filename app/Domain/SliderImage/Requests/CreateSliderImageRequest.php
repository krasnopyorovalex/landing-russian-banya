<?php

namespace Domain\SliderImage\Requests;

use App\Http\Requests\Request;

/**
 * Class CreateSliderImageRequest
 * @package Domain\SliderImage\Requests
 */
class CreateSliderImageRequest extends Request
{
    public function rules()
    {
        return [
            'upload' => 'image',
            'slider_id' => 'integer'
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
            'slider_id.integer' => 'Поле «id слайдера» должно быть целым числом'
        ];
    }
}
