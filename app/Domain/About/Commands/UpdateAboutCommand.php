<?php

namespace App\Domain\About\Commands;

use App\Domain\About\Queries\GetAboutByIdQuery;
use App\Http\Requests\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateAboutCommand
 * @package App\Domain\About\Commands
 */
class UpdateAboutCommand
{

    use DispatchesJobs;

    private $request;
    private $id;

    /**
     * UpdateAboutCommand constructor.
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
        $page = $this->dispatch(new GetAboutByIdQuery($this->id));

        return $page->update($this->request->all());
    }

}
