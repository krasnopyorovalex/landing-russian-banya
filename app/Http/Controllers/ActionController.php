<?php

namespace App\Http\Controllers;

use App\Domain\Action\Queries\GetActionByIdQuery;

/**
 * Class ActionController
 * @package App\Http\Controllers
 */
class ActionController extends Controller
{
    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id)
    {
        $action = $this->dispatch(new GetActionByIdQuery($id));

        return view('action.index', [
            'action' => $action
        ]);
    }
}
