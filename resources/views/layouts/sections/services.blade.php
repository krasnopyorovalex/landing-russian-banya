<section class="default" id="typical_services">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title decoration">Типовые решения</div>
            </div>
        </div>
        <div class="row">
            @foreach($services as $service)
                <div class="col-3">
                    @if ($service->image)
                        <div class="rooms__slider-img">
                            <img src="{{ $service->image->path }}" alt="{{ $service->image->alt }}" title="{{ $service->image->title }}">
                        </div>
                    @else
                        <div class="rooms__slider-img">
                            <img src="{{ asset('images/test.jpeg') }}" />
                        </div>
                    @endif
                    <div class="caption">
                        <div class="caption__name">
                            <div>{{ $service->name }}</div>
                        </div>
                        {{--                            <div class="caption__text">--}}
                        {{--                                {!! $service->preview !!}--}}
                        {{--                            </div>--}}

                    </div>
                </div>
            @endforeach
            <div class="col-12">
                <div class="text">
                    <div data-link="#" class="btn call__popup" data-target="popup__consultation">
                        Заказать бесплатную консультацию
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
