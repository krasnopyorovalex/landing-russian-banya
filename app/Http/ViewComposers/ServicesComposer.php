<?php

namespace App\Http\ViewComposers;

use App\Domain\Service\Queries\GetAllServicesQuery;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class ServicesComposer
 * @package App\Http\ViewComposers
 */
class ServicesComposer
{
    use DispatchesJobs;

    private static $services;

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        if (! self::$services) {
            self::$services = $this->dispatch(new GetAllServicesQuery());
        }

        $view->with('services', self::$services);
    }
}
