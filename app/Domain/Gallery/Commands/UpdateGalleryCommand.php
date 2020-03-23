<?php

namespace App\Domain\Gallery\Commands;

use App\Domain\Gallery\Queries\GetGalleryByIdQuery;
use App\Http\Requests\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateGalleryCommand
 * @package App\Domain\Gallery\Commands
 */
class UpdateGalleryCommand
{

    use DispatchesJobs;

    private $request;
    private $id;

    /**
     * UpdateGalleryCommand constructor.
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
        $gallery = $this->dispatch(new GetGalleryByIdQuery($this->id));

        return $gallery->update($this->request->all());
    }

}
