<?php

namespace App\Domain\Gallery\Queries;

use App\Gallery;

/**
 * Class GetAllWorkImagesQuery
 * @package App\Domain\Gallery\Queries
 */
class GetAllWorkImagesQuery
{
    /**
     * Execute the job.
     */
    public function handle()
    {
        return Gallery::all();
    }
}
