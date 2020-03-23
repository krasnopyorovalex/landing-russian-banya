<?php

namespace App\Domain\Service\Commands;

use App\Domain\Image\Commands\DeleteImageCommand;
use App\Domain\Service\Queries\GetServiceByIdQuery;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Storage;

/**
 * Class DeleteServiceCommand
 * @package App\Domain\Service\Commands
 */
class DeleteServiceCommand
{

    use DispatchesJobs;

    private $id;

    /**
     * DeleteServiceCommand constructor.
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
        $service = $this->dispatch(new GetServiceByIdQuery($this->id));

        if($service->image) {
            $this->dispatch(new DeleteImageCommand($service->image));
        }

        Storage::deleteDirectory('public/service/' . $this->id);

        return $service->delete();
    }

}
