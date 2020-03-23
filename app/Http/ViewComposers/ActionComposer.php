<?php

namespace App\Http\ViewComposers;

use App\Domain\Action\Queries\GetAllActionsQuery;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class ActionComposer
 * @package App\Http\ViewComposers
 */
class ActionComposer
{
    use DispatchesJobs;

    private static $actions;

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        if (! self::$actions) {
            self::$actions = $this->dispatch(new GetAllActionsQuery());
        }

        $view->with('actions', self::$actions);
    }
}
