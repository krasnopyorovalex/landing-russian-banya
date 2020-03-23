<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="view__detail">
                <div class="close__box" title="Закрыть форму">
                    <div class="close"></div>
                </div>
                <div class="title">{{ $work->name }}</div>
                @if(count($work->images))
                <div class="owl-carousel owl-theme view__detail-carousel">
                    @foreach($work->images as $image)
                    <div>
                        <img src="{{ asset($image->getPath()) }}" alt="{{ $image->alt }}" title="{{ $image->title }}">
                    </div>
                    @endforeach
                </div>
                @endif
                <div class="view__detail-caption">
                    {!! $work->text !!}
                </div>
            </div>
        </div>
    </div>
</div>
