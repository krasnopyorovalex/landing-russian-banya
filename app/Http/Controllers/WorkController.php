<?php

namespace App\Http\Controllers;

use App\Domain\Work\Queries\GetWorkByIdQuery;

/**
 * Class WorkController
 * @package App\Http\Controllers
 */
class WorkController extends Controller
{
    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id)
    {
        $work = $this->dispatch(new GetWorkByIdQuery($id));

        return view('work.index', [
            'work' => $work
        ]);
    }
}
