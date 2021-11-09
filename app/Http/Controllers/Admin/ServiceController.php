<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Service\Commands\CreateServiceCommand;
use App\Domain\Service\Commands\DeleteServiceCommand;
use App\Domain\Service\Commands\UpdateServiceCommand;
use App\Domain\Service\Queries\GetAllServicesQuery;
use App\Domain\Service\Queries\GetServiceByIdQuery;
use App\Http\Controllers\Controller;
use App\Services\UploadImagesService;
use Domain\Service\Requests\CreateServiceRequest;
use Domain\Service\Requests\UpdateServiceRequest;

/**
 * Class ServiceController
 * @package App\Http\Controllers\Admin
 */
class ServiceController extends Controller
{
    /**
     * @var UploadImagesService
     */
    private $imagesService;

    public function __construct(UploadImagesService $imagesService)
    {
        $this->imagesService = $imagesService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = $this->dispatch(new GetAllServicesQuery);

        return view('admin.services.index', [
            'services' => $services
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateServiceRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateServiceRequest $request)
    {
        $this->dispatch(new CreateServiceCommand($request, $this->imagesService));

        return redirect(route('admin.services.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = $this->dispatch(new GetServiceByIdQuery($id));

        return view('admin.services.edit', [
            'service' => $service
        ]);
    }

    /**
     * @param $id
     * @param UpdateServiceRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, UpdateServiceRequest $request)
    {
        $this->dispatch(new UpdateServiceCommand($id, $request, $this->imagesService));

        return redirect(route('admin.services.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->dispatch(new DeleteServiceCommand($id));

        return redirect(route('admin.services.index'));
    }
}
