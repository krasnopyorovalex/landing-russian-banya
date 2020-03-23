<?php

namespace App\Http\Controllers;

use App\Domain\Service\Queries\GetServiceByIdQuery;

/**
 * Class ServiceController
 * @package App\Http\Controllers
 */
class ServiceController extends Controller
{
    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id)
    {
        $service = $this->dispatch(new GetServiceByIdQuery($id));

        return view('service.index', [
            'service' => $service
        ]);
    }
}
