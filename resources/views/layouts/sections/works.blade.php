<section class="default white__bg" id="our__works-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title">Наши работы</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel owl-theme default__slider">
                    @foreach($works as $work)
                        <div>
                            @if ($work->image)
                                <div class="rooms__slider-img">
                                    <img src="{{ $work->image->path }}" alt="{{ $work->image->alt }}" title="{{ $work->image->title }}">
                                </div>
                            @endif
                            <div class="caption">
                                <div class="caption__name">
                                    <div>{{ $work->name }}</div>
                                </div>
                                <div class="caption__text">
                                    {!! $work->preview !!}
                                </div>
                                <div class="caption__btn">
                                    <div data-link="{{ route('work.show', $work) }}" class="btn view__detail-link">Детали</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
