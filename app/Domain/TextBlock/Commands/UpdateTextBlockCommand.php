<?php

namespace App\Domain\TextBlock\Commands;

use App\Domain\TextBlock\Queries\GetTextBlockByIdQuery;
use App\Http\Requests\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateTextBlockCommand
 * @package App\Domain\TextBlock\Commands
 */
class UpdateTextBlockCommand
{

    use DispatchesJobs;

    private $request;
    private $id;

    /**
     * UpdateTextBlockCommand constructor.
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
        $textBlock = $this->dispatch(new GetTextBlockByIdQuery($this->id));

        return $textBlock->update($this->request->all());
    }

}