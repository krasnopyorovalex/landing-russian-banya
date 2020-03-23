<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Work\Commands\CreateWorkCommand;
use App\Domain\Work\Commands\DeleteWorkCommand;
use App\Domain\Work\Commands\UpdateWorkCommand;
use App\Domain\Work\Queries\GetAllWorksQuery;
use App\Domain\Work\Queries\GetWorkByIdQuery;
use App\Http\Controllers\Controller;
use Domain\Work\Requests\CreateWorkRequest;
use Domain\Work\Requests\UpdateWorkRequest;

/**
 * Class WorkController
 * @package App\Http\Controllers\Admin
 */
class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = $this->dispatch(new GetAllWorksQuery);

        return view('admin.works.index', [
            'works' => $works
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.works.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateWorkRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateWorkRequest $request)
    {
        $this->dispatch(new CreateWorkCommand($request));

        return redirect(route('admin.works.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $work = $this->dispatch(new GetWorkByIdQuery($id));

        return view('admin.works.edit', [
            'work' => $work
        ]);
    }

    /**
     * @param $id
     * @param UpdateWorkRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, UpdateWorkRequest $request)
    {
        $this->dispatch(new UpdateWorkCommand($id, $request));

        return redirect(route('admin.works.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->dispatch(new DeleteWorkCommand($id));

        return redirect(route('admin.works.index'));
    }
}
