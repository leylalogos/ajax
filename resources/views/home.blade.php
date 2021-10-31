@extends('home_layout')
@section('content')
    <ul id="nav">
        @foreach ($menus as $menu)
            <li>
                <a href="#">{{ $menu->name }}</a>
                @if ($menu->children->count() > 0)
                    <ul>
                        @foreach ($menu->children as $submenu)
                            <li>
                                <a href="#">{{ $submenu->name }}</a>
                                @if ($submenu->children->count() > 0)
                                    <ul>
                                        @foreach ($submenu->children as $sub_submenu)
                                            <li>
                                                <a href="#">{{ $sub_submenu->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>

                @endif

            </li>

        @endforeach
    </ul>
@stop
