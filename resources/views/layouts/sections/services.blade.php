<section class="default" id="services__section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title">Услуги</div>
            </div>
        </div>
        <div class="row">
            <div class="row col-12">
                <div class="col-12 owl-carousel owl-theme default__slider">
                    @foreach($services as $service)
                    <div>
                        @if ($service->image)
                            <div class="rooms__slider-img">
                                <img src="{{ $service->image->path }}" alt="{{ $service->image->alt }}" title="{{ $service->image->title }}">
                            </div>
                        @endif
                        <div class="caption">
                            <div class="caption__name">
                                <div>{{ $service->name }}</div>
                            </div>
                            <div class="caption__text">
                                {!! $service->preview !!}
                            </div>
                            <div class="caption__btn">
                                <div data-link="{{ route('service.show', $service) }}" class="btn view__detail-link">Детали</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12">
                <div class="text">
                    {!! $textBlocks->get('services_text') !!}
                </div>
            </div>
        </div>
    </div>
</section>
