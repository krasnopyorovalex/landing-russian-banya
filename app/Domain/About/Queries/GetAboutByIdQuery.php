<?php

namespace App\Domain\About\Queries;

use App\About;

/**
 * Class GetAboutByIdQuery
 * @package App\Domain\Page\Queries
 */
class GetAboutByIdQuery
{
    /**
     * @var int
     */
    private $id;

    /**
     * GetAboutByIdQuery constructor.
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
        return About::findOrFail($this->id);
    }
}
