<?php

namespace App\Domain\Work\Queries;

use App\Work;

/**
 * Class GetAllWorksQuery
 * @package App\Domain\Work\Queries
 */
class GetAllWorksQuery
{
    /**
     * Execute the job.
     */
    public function handle()
    {
        return Work::with(['images'])->orderBy('pos')->get();
    }
}
