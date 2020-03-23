<?php

namespace App\Domain\Action\Queries;

use App\Action;

/**
 * Class GetActionByIdQuery
 * @package App\Domain\Action\Queries
 */
class GetActionByIdQuery
{
    /**
     * @var int
     */
    private $id;

    /**
     * GetActionByIdQuery constructor.
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
        return Action::with(['image'])->findOrFail($this->id);
    }
}
