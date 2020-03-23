<?php

namespace App\Domain\ServiceImage\Commands;

use App\Domain\ServiceImage\Queries\GetServiceImageByIdQuery;
use App\Http\Requests\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateServiceImageCommand
 * @package App\Domain\ServiceImage\Commands
 */
class UpdateServiceImageCommand
{

    use DispatchesJobs;

    private $request;
    private $id;

    /**
     * UpdateServiceImageCommand constructor.
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
        $image = $this->dispatch(new GetServiceImageByIdQuery($this->id));

        return $image->update($this->request->all());
    }

}
