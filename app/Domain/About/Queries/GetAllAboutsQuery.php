<?php

namespace App\Domain\About\Queries;

use App\About;

/**
 * Class GetAllAboutsQuery
 * @package App\Domain\About\Queries
 */
class GetAllAboutsQuery
{
    /**
     * Execute the job.
     */
    public function handle()
    {
        return About::orderBy('pos')->get();
    }
}
