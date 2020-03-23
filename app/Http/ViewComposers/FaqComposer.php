<?php

namespace App\Http\ViewComposers;

use App\Domain\Faq\Queries\GetAllFaqsQuery;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class FaqComposer
 * @package App\Http\ViewComposers
 */
class FaqComposer
{
    use DispatchesJobs;

    private static $faqs;

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        if (! self::$faqs) {
            self::$faqs = $this->dispatch(new GetAllFaqsQuery());
        }

        $view->with('faqs', self::$faqs);
    }
}
