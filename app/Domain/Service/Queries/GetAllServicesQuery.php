<?php

namespace App\Domain\Service\Queries;

use App\Service;

/**
 * Class GetAllServicesQuery
 * @package App\Domain\Service\Queries
 */
class GetAllServicesQuery
{
    /**
     * Execute the job.
     */
    public function handle()
    {
        return Service::with(['images'])->orderBy('pos')->get();
    }
}
