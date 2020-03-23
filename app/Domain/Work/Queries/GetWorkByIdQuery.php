<?php

namespace App\Domain\Work\Queries;

use App\Work;

/**
 * Class GetWorkByIdQuery
 * @package App\Domain\Page\Queries
 */
class GetWorkByIdQuery
{
    /**
     * @var int
     */
    private $id;

    /**
     * GetWorkByIdQuery constructor.
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
        return Work::with(['images'])->findOrFail($this->id);
    }
}
