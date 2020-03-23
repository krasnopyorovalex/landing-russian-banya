<?php

namespace App\Domain\ServiceImage\Commands;

use App\ServiceImage;
use App\Services\UploadImagesService;

/**
 * Class CreateServiceImageCommand
 * @package App\Domain\ServiceImage\Commands
 */
class CreateServiceImageCommand
{

    private $uploadImage;

    /**
     * CreateServiceImageCommand constructor.
     * @param UploadImagesService $uploadImage
     */
    public function __construct(UploadImagesService $uploadImage)
    {
        $this->uploadImage = $uploadImage;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        $serviceImage = new ServiceImage();
        $serviceImage->basename = $this->uploadImage->getImageHashName();
        $serviceImage->ext = $this->uploadImage->getExt();
        $serviceImage->service_id = $this->uploadImage->getEntityId();

        return $serviceImage->save();
    }

}
