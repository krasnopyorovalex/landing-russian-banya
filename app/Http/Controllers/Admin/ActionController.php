<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Action\Commands\CreateActionCommand;
use App\Domain\Action\Commands\DeleteActionCommand;
use App\Domain\Action\Commands\UpdateActionCommand;
use App\Domain\Action\Queries\GetAllActionsQuery;
use App\Domain\Action\Queries\GetActionByIdQuery;
use App\Http\Controllers\Controller;
use Domain\Action\Requests\CreateActionRequest;
use Domain\Action\Requests\UpdateActionRequest;

/**
 * Class ActionController
 * @package App\Http\Controllers\Admin
 */
class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actions = $this->dispatch(new GetAllActionsQuery());

        return view('admin.actions.index', [
            'actions' => $actions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.actions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateActionRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateActionRequest $request)
    {
        $this->dispatch(new CreateActionCommand($request));

        return redirect(route('admin.actions.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $action = $this->dispatch(new GetActionByIdQuery($id));

        return view('admin.actions.edit', [
            'action' => $action
        ]);
    }

    /**
     * @param $id
     * @param UpdateActionRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, UpdateActionRequest $request)
    {
        $this->dispatch(new UpdateActionCommand($id, $request));

        return redirect(route('admin.actions.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->dispatch(new DeleteActionCommand($id));

        return redirect(route('admin.actions.index'));
    }
}
