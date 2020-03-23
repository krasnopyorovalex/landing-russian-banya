<?php

namespace App\Domain\About\Commands;

use App\About;

/**
 * Class CreateAboutCommand
 * @package App\Domain\About\Commands
 */
class CreateAboutCommand
{

    private $request;

    /**
     * CreateAboutCommand constructor.
     * @param $request
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        $about = new About();
        $about->fill($this->request->all());

        return $about->save();
    }

}
