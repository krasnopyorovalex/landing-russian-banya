<section class="about" id="about__section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title">О нас</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="slider__about-us-nav">
                    @foreach($abouts as $about)
                        <div class="btn{{ $loop->index == 0 ? ' active' : '' }}" data-target="{{ $loop->index + 1 }}">{{ $about->name }}</div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="slider__about-us owl-carousel owl-theme">
                    @foreach($abouts as $about)
                    <div>
                        {!! $about->text !!}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
