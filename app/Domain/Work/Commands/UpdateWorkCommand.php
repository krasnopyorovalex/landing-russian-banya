<?php

namespace App\Domain\Work\Commands;

use App\Domain\Image\Commands\DeleteImageCommand;
use App\Domain\Image\Commands\UploadImageCommand;
use App\Domain\Work\Queries\GetWorkByIdQuery;
use App\Http\Requests\Request;
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

    /**
     * UpdateWorkCommand constructor.
     * @param int $id
     * @param Request $request
     */
    public function __construct(int $id, Request $request)
    {
        $this->id = $id;
        $this->request = $request;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        $Work = $this->dispatch(new GetWorkByIdQuery($this->id));

        if ($this->request->has('image')) {
            if ($Work->image) {
                $this->dispatch(new DeleteImageCommand($Work->image));
            }
            $this->dispatch(new UploadImageCommand($this->request, $Work->id, Work::class));
        }

        return $Work->update($this->request->all());
    }

}
