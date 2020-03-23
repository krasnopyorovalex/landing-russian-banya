<?php

namespace App\Domain\Work\Commands;

use App\Domain\Image\Commands\DeleteImageCommand;
use App\Domain\Work\Queries\GetWorkByIdQuery;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Storage;

/**
 * Class DeleteWorkCommand
 * @package App\Domain\Work\Commands
 */
class DeleteWorkCommand
{

    use DispatchesJobs;

    private $id;

    /**
     * DeleteWorkCommand constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle(): bool
    {
        $Work = $this->dispatch(new GetWorkByIdQuery($this->id));

        if($Work->image) {
            $this->dispatch(new DeleteImageCommand($Work->image));
        }

        Storage::deleteDirectory('public/Work/' . $this->id);

        return $Work->delete();
    }

}
