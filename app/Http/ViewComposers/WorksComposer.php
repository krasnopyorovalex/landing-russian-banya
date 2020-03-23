<?php

namespace App\Http\ViewComposers;

use App\Domain\Work\Queries\GetAllWorksQuery;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class WorksComposer
 * @package App\Http\ViewComposers
 */
class WorksComposer
{
    use DispatchesJobs;

    private static $works;

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        if (! self::$works) {
            self::$works = $this->dispatch(new GetAllWorksQuery());
        }

        $view->with('works', self::$works);
    }
}
