<?php

namespace App\Http\Controllers\Admin;

use App\Domain\TextBlock\Commands\CreateTextBlockCommand;
use App\Domain\TextBlock\Commands\DeleteTextBlockCommand;
use App\Domain\TextBlock\Commands\UpdateTextBlockCommand;
use App\Domain\TextBlock\Queries\GetAllTextBlocksQuery;
use App\Domain\TextBlock\Queries\GetTextBlockByIdQuery;
use App\Http\Controllers\Controller;
use Domain\TextBlock\Requests\CreateTextBlockRequest;
use Domain\TextBlock\Requests\UpdateTextBlockRequest;

/**
 * Class TextBlockController
 * @package App\Http\Controllers\Admin
 */
class TextBlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $textBlocks = $this->dispatch(new GetAllTextBlocksQuery());

        return view('admin.text_blocks.index', [
            'textBlocks' => $textBlocks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.text_blocks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateTextBlockRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateTextBlockRequest $request)
    {
        $this->dispatch(new CreateTextBlockCommand($request));

        return redirect(route('admin.text_blocks.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $textBlock = $this->dispatch(new GetTextBlockByIdQuery($id));

        return view('admin.text_blocks.edit', [
            'textBlock' => $textBlock
        ]);
    }

    /**
     * @param $id
     * @param UpdateTextBlockRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, UpdateTextBlockRequest $request)
    {
        $this->dispatch(new UpdateTextBlockCommand($id, $request));

        return redirect(route('admin.text_blocks.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->dispatch(new DeleteTextBlockCommand($id));

        return redirect(route('admin.text_blocks.index'));
    }
}
