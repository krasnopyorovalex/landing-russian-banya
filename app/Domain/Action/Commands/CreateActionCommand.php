<?php

namespace App\Domain\Action\Commands;

use App\Action;
use App\Domain\Image\Commands\UploadImageCommand;
use App\Http\Requests\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CreateActionCommand
 * @package App\Domain\Action\Commands
 */
class CreateActionCommand
{
    use DispatchesJobs;

    private $request;

    /**
     * CreateActionCommand constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        $action = new Action();
        $action->fill($this->request->all());
        $action->published_at = date('Y-m-d');
        $action->save();

        if ($this->request->has('image')) {
            return $this->dispatch(new UploadImageCommand($this->request, $action->id, Action::class));
        }

        return true;
    }

}
