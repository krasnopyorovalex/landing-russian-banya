<?php

namespace App\Http\ViewComposers;

use App\Domain\TextBlock\Queries\GetAllTextBlocksQuery;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class TextBlockComposer
 * @package App\Http\ViewComposers
 */
class TextBlockComposer
{
    use DispatchesJobs;

    private static $textBlocks;

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        if (! self::$textBlocks) {
            /** @var Collection $collection */
            self::$textBlocks = $this->dispatchNow(new GetAllTextBlocksQuery());
        }

        $reindexed = self::$textBlocks->mapWithKeys(function ($item) {
            return [$item->sys_name => $item->text];
        });

        $view->with('textBlocks', $reindexed);
    }
}
