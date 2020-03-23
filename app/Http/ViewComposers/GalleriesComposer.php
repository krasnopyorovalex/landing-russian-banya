<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Domain\Gallery\Queries\GetAllGalleriesQuery;

/**
 * Class GalleriesComposer
 * @package App\Http\ViewComposers
 */
class GalleriesComposer
{
    use DispatchesJobs;

    private static $galleries;

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        if (! self::$galleries) {
            self::$galleries = $this->dispatch(new GetAllGalleriesQuery());
        }

        $view->with('galleries', self::$galleries);
    }
}
