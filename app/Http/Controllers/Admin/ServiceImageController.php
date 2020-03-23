<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Service\Queries\GetServiceByIdQuery;
use App\Domain\ServiceImage\Commands\DeleteServiceImageCommand;
use App\Domain\ServiceImage\Commands\UpdateServiceImageCommand;
use App\Domain\ServiceImage\Commands\UpdatePositionsServiceImageCommand;
use App\Domain\ServiceImage\Queries\GetServiceImageByIdQuery;
use App\Domain\ServiceImage\Commands\CreateServiceImageCommand;
use App\Http\Controllers\Controller;
use App\Services\UploadImagesService;
use Domain\ServiceImage\Requests\CreateServiceImageRequest;
use Domain\ServiceImage\Requests\UpdateServiceImageRequest;
use Illuminate\Http\Request;

/**
 * Class ServiceImageController
 * @package App\Http\Controllers\Admin
 */
class ServiceImageController extends Controller
{
    /**
     * @var UploadImagesService
     */
    private $uploadServiceImagesService;

    /**
     * ServiceImageController constructor.
     * @param UploadImagesService $uploadServiceImagesService
     */
    public function __construct(UploadImagesService $uploadServiceImagesService)
    {
        $this->uploadServiceImagesService = $uploadServiceImagesService;
    }

    /**
     * @param int $service
     * @return array
     * @throws \Throwable
     */
    public function index(int $service)
    {
        $service = $this->dispatch(new GetServiceByIdQuery($service));

        return [
            'images' => view('admin.services._images_box', [
                'service' => $service
            ])->render()
        ];
    }

    /**
     * @param CreateServiceImageRequest $request
     * @param $service
     * @return array
     */
    public function store(CreateServiceImageRequest $request, $service)
    {
        $image = $this->uploadServiceImagesService->setWidthThumb(294)->setHeightThumb(198)->upload($request, 'service', $service);
        $this->dispatch(new CreateServiceImageCommand($image));

        return [
            'message' => 'Данные сохранены успешно'
        ];
    }

    /**
     * @param $id
     * @return string
     * @throws \Throwable
     */
    public function edit($id)
    {
        $image = $this->dispatch(new GetServiceImageByIdQuery($id));

        return view('admin.services._image_popup', [
            'image' => $image
        ])->render();
    }

    /**
     * @param $id
     * @param UpdateServiceImageRequest $request
     * @return array
     * @throws \Throwable
     */
    public function update($id, UpdateServiceImageRequest $request)
    {
        $this->dispatch(new UpdateServiceImageCommand($id, $request));

        $image = $this->dispatch(new GetServiceImageByIdQuery($id));
        $service = $this->dispatch(new GetServiceByIdQuery($image->service_id));

        return [
            'images' => view('admin.services._images_box', [
                'service' => $service
            ])->render(),
            'message' => 'Данные сохранены успешно'
        ];
    }

    /**
     * @param $id
     * @return array
     */
    public function destroy($id)
    {
        $this->dispatch(new DeleteServiceImageCommand($id));

        return [
            'message' => 'Изображение удалено успешно'
        ];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function updatePositions(Request $request)
    {
        $this->dispatch(new UpdatePositionsServiceImageCommand($request));

        return [
            'message' => 'Порядок изображений сохранён успешно'
        ];
    }
}
