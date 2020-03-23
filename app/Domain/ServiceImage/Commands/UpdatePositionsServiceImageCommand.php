<?php

namespace App\Domain\ServiceImage\Commands;

use App\Domain\ServiceImage\Queries\GetServiceImageByIdQuery;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;

/**
 * Class UpdatePositionsServiceImageCommand
 * @package App\Domain\ServiceImage\Commands
 */
class UpdatePositionsServiceImageCommand
{

    use DispatchesJobs;

    private $request;

    /**
     * UpdatePositionsServiceImageCommand constructor.
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
                $image = $this->dispatch(new GetServiceImageByIdQuery($imageId));
                $image->pos = $position;
                $image->update();
            }
        }
    }
}
