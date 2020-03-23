<?php

namespace App\Domain\WorkImage\Commands;

use App\Domain\WorkImage\Queries\GetWorkImageByIdQuery;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;

/**
 * Class UpdatePositionsWorkImageCommand
 * @package App\Domain\WorkImage\Commands
 */
class UpdatePositionsWorkImageCommand
{

    use DispatchesJobs;

    private $request;

    /**
     * UpdatePositionsWorkImageCommand constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle(): void
    {
        $data = $this->request->post()['data'];

        if( is_array($data)) {
            foreach ($data as $position => $imageId) {
                $image = $this->dispatch(new GetWorkImageByIdQuery($imageId));
                $image->pos = $position;
                $image->update();
            }
        }
    }
}
