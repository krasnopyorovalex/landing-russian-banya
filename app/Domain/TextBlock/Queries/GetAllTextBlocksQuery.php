<?php

namespace App\Domain\TextBlock\Queries;

use App\TextBlock;

/**
 * Class GetAllTextBlocksQuery
 * @package App\Domain\TextBlock\Queries
 */
class GetAllTextBlocksQuery
{
    /**
     * Execute the job.
     */
    public function handle()
    {
        return TextBlock::all();
    }
}