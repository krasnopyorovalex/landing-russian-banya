<?php

namespace App\Domain\Work\Commands;

use App\Action;
use App\Domain\Image\Commands\UploadImageCommand;
use App\Http\Requests\Request;
use App\Work;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CreateWorkCommand
 * @package App\Domain\Work\Commands
 */
class CreateWorkCommand
{

    use DispatchesJobs;

    private $request;

    /**
     * CreateWorkCommand constructor.
     * @param $request
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
        $Work = new Work();
        $Work->fill($this->request->all());

        $Work->save();

        if ($this->request->has('image')) {
            return $this->dispatch(new UploadImageCommand($this->request, $Work->id, Work::class));
        }

        return true;
    }

}
