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
                            <a href="{{ $service->image->path }}" data-lightbox="service-img-{{ $service->id }}" data-title="{{ $service->name }}">
                                <img src="{{ $service->image->path }}" alt="{{ $service->image->alt }}" title="{{ $service->image->title }}">
                            </a>
                            @if($service->images)
                                @foreach($service->images as $sImg)
                                    <a href="{{ $sImg->getPath() }}" class="hidden" data-lightbox="service-img-{{ $service->id }}" data-title="{{ $sImg->name }}">&nbsp;</a>
                                @endforeach
                            @endif
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
        </div>
    </div>
</section>
