<?php

namespace App\Domain\WorkImage\Commands;

use App\Domain\WorkImage\Queries\GetWorkImageByIdQuery;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Storage;

/**
 * Class DeleteWorkImageCommand
 * @package App\Domain\WorkImage\Commands
 */
class DeleteWorkImageCommand
{

    use DispatchesJobs;

    private $id;

    /**
     * DeleteWorkImageCommand constructor.
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
        $image = $this->dispatch(new GetWorkImageByIdQuery($this->id));

        Storage::delete([
            'public/work/' . $image->work_id . '/' . $image->basename . '.' . $image->ext,
            'public/work/' . $image->work_id . '/' . $image->basename . '_thumb.' . $image->ext
        ]);

        return $image->delete();
    }

}
