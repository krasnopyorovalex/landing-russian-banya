<?php

namespace App\Domain\TextBlock\Commands;

use App\Http\Requests\Request;
use App\TextBlock;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CreateTextBlockCommand
 * @package App\Domain\TextBlock\Commands
 */
class CreateTextBlockCommand
{
    use DispatchesJobs;

    private $request;

    /**
     * CreateTextBlockCommand constructor.
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
        $textBlock = new TextBlock();
        $textBlock->fill($this->request->all());

        return $textBlock->save();
    }

}