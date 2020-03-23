<?php

namespace App\Domain\About\Commands;

use App\Domain\About\Queries\GetAboutByIdQuery;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class DeleteAboutCommand
 * @package App\Domain\About\Commands
 */
class DeleteAboutCommand
{

    use DispatchesJobs;

    private $id;

    /**
     * DeleteAboutCommand constructor.
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
        $about = $this->dispatch(new GetAboutByIdQuery($this->id));

        return $about->delete();
    }

}
