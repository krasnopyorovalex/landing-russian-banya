<?php

namespace App\Http\ViewComposers;

use App\Domain\About\Queries\GetAllAboutsQuery;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class AboutComposer
 * @package App\Http\ViewComposers
 */
class AboutComposer
{
    use DispatchesJobs;

    private static $abouts;

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        if (! self::$abouts) {
            self::$abouts = $this->dispatch(new GetAllAboutsQuery());
        }

        $view->with('abouts', self::$abouts);
    }
}
