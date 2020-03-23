<?php

namespace App\Domain\Action\Queries;

use App\Action;

/**
 * Class GetAllActionsQuery
 * @package App\Domain\Action\Queries
 */
class GetAllActionsQuery
{
    /**
     * Execute the job.
     */
    public function handle()
    {
        return Action::orderBy('published_at', 'desc')->get();
    }
}
