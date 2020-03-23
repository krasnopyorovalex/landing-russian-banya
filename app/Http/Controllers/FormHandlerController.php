<?php

namespace App\Http\Controllers;

use App\Http\Requests\Forms\CallbackRequest;
use App\Http\Requests\Forms\ConsultationRequest;
use App\Mail\CallbackSent;
use App\Mail\ConsultationSent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class FormHandlerController
 * @package App\Http\Controllers
 */
class FormHandlerController extends Controller
{
    use DispatchesJobs;

    private $to = 'stilnyidom@list.ru';

    /**
     * @param CallbackRequest $request
     * @return array
     */
    public function callback(CallbackRequest $request): array
    {
        Mail::to([$this->to])->send(new CallbackSent($request->all()));

        return [
            'message' => 'Благодарим за Вашу заявку. Наш менеджер свяжется с Вами в ближайшее время',
            'status' => 200
        ];
    }

    /**
     * @param CallbackRequest $request
     * @return array
     */
    public function consultation(ConsultationRequest $request): array
    {
        Mail::to([$this->to])->send(new ConsultationSent($request->all()));

        return [
            'message' => 'Благодарим за Вашу заявку. Наш менеджер свяжется с Вами в ближайшее время',
            'status' => 200
        ];
    }
}
