<?php

namespace App\Domain\WorkImage\Queries;

use App\WorkImage;

/**
 * Class GetWorkImageByIdQuery
 * @package App\Domain\WorkImage\Queries
 */
class GetWorkImageByIdQuery
{
    /**
     * @var int
     */
    private $id;

    /**
     * GetWorkImageByIdQuery constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return WorkImage::findOrFail($this->id);
    }
}
