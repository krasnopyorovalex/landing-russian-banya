<?php

namespace App\Domain\Service\Commands;

use App\Action;
use App\Domain\Image\Commands\UploadImageCommand;
use App\Http\Requests\Request;
use App\Service;
use App\Services\UploadImagesService;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CreateServiceCommand
 * @package App\Domain\Service\Commands
 */
class CreateServiceCommand
{

    use DispatchesJobs;

    private $request;
    private UploadImagesService $imagesService;

    /**
     * CreateServiceCommand constructor.
     * @param $request
     */
    public function __construct(Request $request, UploadImagesService $imagesService)
    {
        $this->request = $request;
        $this->imagesService = $imagesService;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        $service = new Service();
        $service->fill($this->request->all());

        $service->save();

        if ($this->request->has('image')) {
            $this->dispatch(new UploadImageCommand($this->request, $service->id, Service::class));
            $this->imagesService->createDesktopImage($service->image->path, 274, 274);
        }

        return true;
    }

}
