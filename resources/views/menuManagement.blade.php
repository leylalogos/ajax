@extends('layout')
@section('content')
    <script>
        $(document).ready(function() {
            $('#create-btn').click(function() {
                let name = $('#create-input-name').val();
                let id = $('#create-select-id').val();
                let parent = $('#create-select-id option[value=' + id + ']').html();
                $.ajax({
                    'url': '{{ route('store') }}',
                    method: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'name': name,
                        'id': id,
                    },
                    success: function(data) {
                        $('.table tbody').append(`  
                                           <tr>
                                             <td>${name}</td>
                                             <td>${parent}</td>
                                             <td>
                                                <i class="fas fa-trash-alt" style="color:red"></i>
                                                <i class="fas fa-edit" style="color:orange"></i>
                                            </td>                           
                                           </tr>`);
                    }

                });
            });
        });
    </script>



    
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
                        <i class="fas fa-edit" style="color:orange"></i>

                    </td>
                </tr>

            @endforeach
        </tbody>

    </table>
    {{ $menus->links() }}
    <div>
        <input type="text" id="create-input-name">
        <select id="create-select-id">
            <option value="0">main menu</option>
            @foreach ($menus as $menu)
                <option value="{{ $menu->id }}">
                    {{ $menu->name }}
                </option>
            @endforeach

        </select>

        <button id="create-btn">send</button>
    </div>
@stop
