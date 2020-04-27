<section id="faq__section" class="faq__section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title">Часто задаваемые вопросы</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul class="faq">
                    @foreach($faqs as $faq)
                        <li>
                            <div class="q">{{ $faq->question }}</div>
                            <div class="a">
                                {!! $faq->answer !!}
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
