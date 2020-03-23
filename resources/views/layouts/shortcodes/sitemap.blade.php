<ul class="sitemap">
    @if(count($pages))
        @foreach($pages as $page)
            <li>
                <a href="{{ route('page.show', ['alias' => $page->alias]) }}">{{ $page->name }}</a>
                @if(strstr($page->text,'{projects}') && count($projects))
                    <ul>
                        @foreach($projects as $project)
                            <li>
                                <a href="{{ $project->url }}">{{ $project->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
                @if(strstr($page->text,'{articles}') && count($articles))
                    <ul>
                        @foreach($articles as $article)
                            <li>
                                <a href="{{ $article->url }}">{{ $article->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
                @if(strstr($page->text,'{news}') && count($news))
                    <ul>
                        @foreach($news as $new)
                            <li>
                                <a href="{{ $new->url }}">{{ $new->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    @endif
        @if(count($producers))
            @foreach($producers as $producer)
                <li>
                    <a href="{{ $producer->url }}">{{ $producer->name_little }}</a>
                </li>
            @endforeach
        @endif
</ul>
