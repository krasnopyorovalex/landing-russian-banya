<section class="guest" id="guest__section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title">Отзывы</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel owl-theme default__slider">
                    @foreach($guestbook as $item)
                    <div>
                        <div class="guest__text">
                            <p>{!! strip_tags($item->text) !!}</p>
                        </div>
                        <div class="guest__footer">
                            <div class="guest__footer-name">{{ $item->name }}</div>
                            <div class="guest__footer-date">{{ $item->published_at->formatLocalized('%d %b %Y') }} г.</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
