<?php

namespace App\Domain\ServiceImage\Commands;

use App\Domain\ServiceImage\Queries\GetServiceImageByIdQuery;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Storage;

/**
 * Class DeleteServiceImageCommand
 * @package App\Domain\ServiceImage\Commands
 */
class DeleteServiceImageCommand
{

    use DispatchesJobs;

    private $id;

    /**
     * DeleteServiceImageCommand constructor.
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
        $image = $this->dispatch(new GetServiceImageByIdQuery($this->id));

        Storage::delete([
            'public/service/' . $image->service_id . '/' . $image->basename . '.' . $image->ext,
            'public/service/' . $image->service_id . '/' . $image->basename . '_thumb.' . $image->ext
        ]);

        return $image->delete();
    }

}
