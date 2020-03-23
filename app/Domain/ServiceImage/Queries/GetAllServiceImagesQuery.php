<?php

namespace App\Domain\Gallery\Queries;

use App\Gallery;

/**
 * Class GetAllServiceImagesQuery
 * @package App\Domain\Gallery\Queries
 */
class GetAllServiceImagesQuery
{
    /**
     * Execute the job.
     */
    public function handle()
    {
        return Gallery::all();
    }
}
