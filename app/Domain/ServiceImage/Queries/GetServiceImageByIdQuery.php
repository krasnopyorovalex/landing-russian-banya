<?php

namespace App\Domain\ServiceImage\Queries;

use App\ServiceImage;

/**
 * Class GetServiceImageByIdQuery
 * @package App\Domain\ServiceImage\Queries
 */
class GetServiceImageByIdQuery
{
    /**
     * @var int
     */
    private $id;

    /**
     * GetServiceImageByIdQuery constructor.
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
        return ServiceImage::findOrFail($this->id);
    }
}
