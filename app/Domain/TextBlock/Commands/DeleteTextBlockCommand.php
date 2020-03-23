<?php

namespace App\Domain\TextBlock\Commands;

use App\Domain\TextBlock\Queries\GetTextBlockByIdQuery;
use App\Domain\Image\Commands\DeleteImageCommand;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class DeleteTextBlockCommand
 * @package App\Domain\TextBlock\Commands
 */
class DeleteTextBlockCommand
{

    use DispatchesJobs;

    /**
     * @var int
     */
    private $id;

    /**
     * DeleteTextBlockCommand constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle(): bool
    {
        $textBlock = $this->dispatch(new GetTextBlockByIdQuery($this->id));

        return $textBlock->delete();
    }

}