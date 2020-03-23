<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Work\Queries\GetWorkByIdQuery;
use App\Domain\WorkImage\Commands\DeleteWorkImageCommand;
use App\Domain\WorkImage\Commands\UpdateWorkImageCommand;
use App\Domain\WorkImage\Commands\UpdatePositionsWorkImageCommand;
use App\Domain\WorkImage\Queries\GetWorkImageByIdQuery;
use App\Domain\WorkImage\Commands\CreateWorkImageCommand;
use App\Http\Controllers\Controller;
use App\Services\UploadImagesService;
use Domain\WorkImage\Requests\CreateWorkImageRequest;
use Domain\WorkImage\Requests\UpdateWorkImageRequest;
use Illuminate\Http\Request;

/**
 * Class WorkImageController
 * @package App\Http\Controllers\Admin
 */
class WorkImageController extends Controller
{
    /**
     * @var UploadImagesService
     */
    private $uploadWorkImagesService;

    /**
     * WorkImageController constructor.
     * @param UploadImagesService $uploadWorkImagesService
     */
    public function __construct(UploadImagesService $uploadWorkImagesService)
    {
        $this->uploadWorkImagesService = $uploadWorkImagesService;
    }

    /**
     * @param int $work
     * @return array
     * @throws \Throwable
     */
    public function index(int $work)
    {
        $work = $this->dispatch(new GetWorkByIdQuery($work));

        return [
            'images' => view('admin.works._images_box', [
                'work' => $work
            ])->render()
        ];
    }

    /**
     * @param CreateWorkImageRequest $request
     * @param $work
     * @return array
     */
    public function store(CreateWorkImageRequest $request, $work)
    {
        $image = $this->uploadWorkImagesService->setWidthThumb(294)->setHeightThumb(198)->upload($request, 'work', $work);
        $this->dispatch(new CreateWorkImageCommand($image));

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
        $image = $this->dispatch(new GetWorkImageByIdQuery($id));

        return view('admin.works._image_popup', [
            'image' => $image
        ])->render();
    }

    /**
     * @param $id
     * @param UpdateWorkImageRequest $request
     * @return array
     * @throws \Throwable
     */
    public function update($id, UpdateWorkImageRequest $request)
    {
        $this->dispatch(new UpdateWorkImageCommand($id, $request));

        $image = $this->dispatch(new GetWorkImageByIdQuery($id));
        $work = $this->dispatch(new GetWorkByIdQuery($image->work_id));

        return [
            'images' => view('admin.works._images_box', [
                'work' => $work
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
        $this->dispatch(new DeleteWorkImageCommand($id));

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
        $this->dispatch(new UpdatePositionsWorkImageCommand($request));

        return [
            'message' => 'Порядок изображений сохранён успешно'
        ];
    }
}
