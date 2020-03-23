<?php

namespace App\Http\Controllers\Admin;

use App\Domain\About\Commands\CreateAboutCommand;
use App\Domain\About\Commands\DeleteAboutCommand;
use App\Domain\About\Commands\UpdateAboutCommand;
use App\Domain\About\Queries\GetAllAboutsQuery;
use App\Domain\About\Queries\GetAboutByIdQuery;
use App\Http\Controllers\Controller;
use Domain\About\Requests\CreateAboutRequest;
use Domain\About\Requests\UpdateAboutRequest;

/**
 * Class AboutController
 * @package App\Http\Controllers\Admin
 */
class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = $this->dispatch(new GetAllAboutsQuery());

        return view('admin.abouts.index', [
            'abouts' => $abouts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateAboutRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateAboutRequest $request)
    {
        $this->dispatch(new CreateAboutCommand($request));

        return redirect(route('admin.abouts.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = $this->dispatch(new GetAboutByIdQuery($id));

        return view('admin.abouts.edit', [
            'about' => $about
        ]);
    }

    /**
     * @param $id
     * @param UpdateAboutRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, UpdateAboutRequest $request)
    {
        $this->dispatch(new UpdateAboutCommand($id, $request));

        return redirect(route('admin.abouts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->dispatch(new DeleteAboutCommand($id));

        return redirect(route('admin.abouts.index'));
    }
}
