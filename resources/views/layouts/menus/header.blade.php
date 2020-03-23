<ul class="navbar-nav sf-menu" data-type="navbar">
    @foreach($menu->get('menu_header') as $item)
        <li{!! add_css_class($item) !!}>
            <a itemprop="url" href="{{ $item->link }}">{{ $item->name }}</a>
            @if (count($item->menuItems))
                <ul class="dropdown-menu">
                    @foreach($item->menuItems as $subItem)
                        <li><a href="{{ $subItem->link }}">{{ $subItem->name }}</a></li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>
