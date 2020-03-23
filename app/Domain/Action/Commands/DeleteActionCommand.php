<?php

namespace App\Domain\Action\Commands;

use App\Domain\Action\Queries\GetActionByIdQuery;
use App\Domain\Image\Commands\DeleteImageCommand;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class DeleteActionCommand
 * @package App\Domain\Action\Commands
 */
class DeleteActionCommand
{

    use DispatchesJobs;

    /**
     * @var int
     */
    private $id;

    /**
     * DeleteActionCommand constructor.
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
        $action = $this->dispatch(new GetActionByIdQuery($this->id));

        if($action->image) {
            $this->dispatch(new DeleteImageCommand($action->image));
        }

        return $action->delete();
    }

}
