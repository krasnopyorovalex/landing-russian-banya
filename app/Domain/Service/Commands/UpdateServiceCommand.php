<?php

namespace App\Domain\Service\Commands;

use App\Domain\Image\Commands\DeleteImageCommand;
use App\Domain\Image\Commands\UploadImageCommand;
use App\Domain\Service\Queries\GetServiceByIdQuery;
use App\Http\Requests\Request;
use App\Service;
use App\Services\UploadImagesService;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateServiceCommand
 * @package App\Domain\Service\Commands
 */
class UpdateServiceCommand
{

    use DispatchesJobs;

    private $request;
    private $id;
    private UploadImagesService $imagesService;

    /**
     * UpdateServiceCommand constructor.
     * @param int $id
     * @param Request $request
     */
    public function __construct(int $id, Request $request, UploadImagesService $imagesService)
    {
        $this->id = $id;
        $this->request = $request;
        $this->imagesService = $imagesService;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        $service = $this->dispatch(new GetServiceByIdQuery($this->id));

        if ($this->request->has('image')) {
            if ($service->image) {
                $this->dispatch(new DeleteImageCommand($service->image));
            }
            $this->dispatch(new UploadImageCommand($this->request, $service->id, Service::class));
            $service->refresh();
            $this->imagesService->createDesktopImage($service->image->path, 274, 366);
        }

        return $service->update($this->request->validated());
    }

}
