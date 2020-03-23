<?php

namespace App\Domain\WorkImage\Commands;

use App\WorkImage;
use App\Services\UploadImagesService;

/**
 * Class CreateWorkImageCommand
 * @package App\Domain\WorkImage\Commands
 */
class CreateWorkImageCommand
{

    private $uploadImage;

    /**
     * CreateWorkImageCommand constructor.
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
        $workImage = new WorkImage();
        $workImage->basename = $this->uploadImage->getImageHashName();
        $workImage->ext = $this->uploadImage->getExt();
        $workImage->work_id = $this->uploadImage->getEntityId();

        return $workImage->save();
    }

}
