<?php

namespace App\Domain\Action\Commands;

use App\Action;
use App\Domain\Action\Queries\GetActionByIdQuery;
use App\Domain\Image\Commands\DeleteImageCommand;
use App\Domain\Image\Commands\UploadImageCommand;
use App\Http\Requests\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateActionCommand
 * @package App\Domain\Page\Commands
 */
class UpdateActionCommand
{

    use DispatchesJobs;

    private $request;
    private $id;

    /**
     * UpdateActionCommand constructor.
     * @param int $id
     * @param Request $request
     */
    public function __construct(int $id, Request $request)
    {
        $this->id = $id;
        $this->request = $request;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        $action = $this->dispatch(new GetActionByIdQuery($this->id));

        if ($this->request->has('image')) {
            if ($action->image) {
                $this->dispatch(new DeleteImageCommand($action->image));
            }
            $this->dispatch(new UploadImageCommand($this->request, $action->id, Action::class));
        }

        return $action->update($this->request->all());
    }

}
