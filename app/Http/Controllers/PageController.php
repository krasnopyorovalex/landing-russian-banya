<?php

namespace App\Http\Controllers;

use App\Domain\Page\Queries\GetPageByAliasQuery;
use App\Services\CanonicalService;
use App\Services\TextParserService;
use Exception;
use Illuminate\View\View;

/**
 * Class PageController
 * @package App\Http\Controllers
 */
class PageController extends Controller
{
    /**
     * @var TextParserService
     */
    protected $parserService;

    /**
     * @var CanonicalService
     */
    private $canonicalService;

    /**
     * PageController constructor.
     * @param TextParserService $parserService
     * @param CanonicalService $canonicalService
     */
    public function __construct(TextParserService $parserService, CanonicalService $canonicalService)
    {
        $this->parserService = $parserService;
        $this->canonicalService = $canonicalService;
    }

    /**
     * @param string $alias
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function show(string $alias = 'index')
    {
        $page = $this->dispatch(new GetPageByAliasQuery($alias));

        try {
            $page->text = $this->parserService->parse($page);
            $page = $this->canonicalService->check($page);
        } catch (Exception $exception) {
            $page->text = $exception->getMessage();
        }

        return view($page->template, ['page' => $page]);
    }
}
