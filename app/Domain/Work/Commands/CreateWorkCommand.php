<?php

namespace App\Domain\Work\Commands;

use App\Action;
use App\Domain\Image\Commands\UploadImageCommand;
use App\Http\Requests\Request;
use App\Services\UploadImagesService;
use App\Work;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CreateWorkCommand
 * @package App\Domain\Work\Commands
 */
class CreateWorkCommand
{

    use DispatchesJobs;

    private $request;
    private UploadImagesService $imagesService;

    /**
     * CreateWorkCommand constructor.
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
        $work = new Work();
        $work->fill($this->request->validated());

        $work->save();

        if ($this->request->has('image')) {
            $this->dispatch(new UploadImageCommand($this->request, $work->id, Work::class));
            $this->imagesService->createDesktopImage($work->image->path, 274, 366);
        }

        return true;
    }

}
