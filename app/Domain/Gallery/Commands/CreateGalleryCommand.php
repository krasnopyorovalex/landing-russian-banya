<?php

namespace App\Domain\Gallery\Commands;

use App\Gallery;
use App\Http\Requests\Request;

/**
 * Class CreateGalleryCommand
 * @package App\Domain\Gallery\Commands
 */
class CreateGalleryCommand
{

    private $request;

    /**
     * CreateGalleryCommand constructor.
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
        $gallery = new Gallery();
        $gallery->fill($this->request->all());

        return $gallery->save();
    }

}
