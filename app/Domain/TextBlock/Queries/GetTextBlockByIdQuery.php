<?php

namespace App\Domain\TextBlock\Queries;

use App\TextBlock;

/**
 * Class GetTextBlockByIdQuery
 * @package App\Domain\TextBlock\Queries
 */
class GetTextBlockByIdQuery
{
    /**
     * @var int
     */
    private $id;

    /**
     * GetTextBlockByIdQuery constructor.
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
        return TextBlock::findOrFail($this->id);
    }
}