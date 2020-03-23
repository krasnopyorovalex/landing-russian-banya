<section id="action__section" class="action__section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title">Акции и спецпредложения</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel owl-theme default__slider">
                    @foreach($actions as $action)
                    <div>
                        @if ($action->image)
                        <div class="rooms__slider-img">
                            <img src="{{ $action->image->path }}" alt="{{ $action->image->alt }}" title="{{ $action->image->title }}">
                        </div>
                        @endif
                        <div class="caption">
                            <div class="caption__name">
                                <div>{{ $action->name }}</div>
                            </div>
                            <div class="caption__text">
                                {!! $action->preview !!}
                            </div>
                            <div class="caption__btn">
                                <div data-link="{{ route('action.show', $action) }}" class="btn view__detail-link">Детали</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
