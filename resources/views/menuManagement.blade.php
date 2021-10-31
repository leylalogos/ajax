@extends('layout')
@section('content')
    @include('create_modal')
    @include('update_modal')

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>منو</th>
                <th>والد</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menus as $menu)
                <tr>
                    <td>
                        {{ $menu->name }}
                    </td>
                    <td>
                        {{ $menu->menu_id ? $menu->parent->name : 'منو اصلی' }}
                    </td>
                    <td>
                        <i class="fas fa-trash-alt" style="color:red"></i>
                        <i class="fas fa-edit update-btn" style="color:orange"
                         data-id="{{$menu->id}}" data-name="{{ $menu->name }}" data-parent="{{$menu->menu_id}}" >
                        </i>

                    </td>
                </tr>

            @endforeach
        </tbody>

    </table>
    {{ $menus->links() }}


@stop
