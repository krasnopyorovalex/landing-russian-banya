<?php

namespace App\Domain\WorkImage\Commands;

use App\Domain\WorkImage\Queries\GetWorkImageByIdQuery;
use App\Http\Requests\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateWorkImageCommand
 * @package App\Domain\WorkImage\Commands
 */
class UpdateWorkImageCommand
{

    use DispatchesJobs;

    private $request;
    private $id;

    /**
     * UpdateWorkImageCommand constructor.
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
        $image = $this->dispatch(new GetWorkImageByIdQuery($this->id));

        return $image->update($this->request->all());
    }

}
