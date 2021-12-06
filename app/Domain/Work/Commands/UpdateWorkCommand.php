<?php

namespace App\Domain\Work\Commands;

use App\Domain\Image\Commands\DeleteImageCommand;
use App\Domain\Image\Commands\UploadImageCommand;
use App\Domain\Work\Queries\GetWorkByIdQuery;
use App\Http\Requests\Request;
use App\Services\UploadImagesService;
use App\Work;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateWorkCommand
 * @package App\Domain\Work\Commands
 */
class UpdateWorkCommand
{

    use DispatchesJobs;

    private $request;
    private $id;
    private UploadImagesService $imagesService;

    /**
     * UpdateWorkCommand constructor.
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
        $work = $this->dispatch(new GetWorkByIdQuery($this->id));

        if ($this->request->has('image')) {
            if ($work->image) {
                $this->dispatch(new DeleteImageCommand($work->image));
            }
            $this->dispatch(new UploadImageCommand($this->request, $work->id, Work::class));
            $work->refresh();
            $this->imagesService->createDesktopImage($work->image->path, 274, 274);
        }

        return $work->update($this->request->validated());
    }

}
