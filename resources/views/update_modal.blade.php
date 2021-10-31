<script>
    $(document).ready(function() {
        // create menu modal
        modal_update= $("#dialog-update").dialog({
            autoOpen: false,
            height: 400,
            width: 350,
            modal: true,
            buttons: {

                Cancel: function() {
                    modal_update.dialog("close");
                }
            },
            close: function() {
                $('#update-input-name').val('');
            }
        });

        $('.update-btn').click(function() {
             editing_menu_item_id = $(this).data('id');
            //console.log($(this).parent().parent().children()[0] );
            let name = $(this).data('name');
            let parent = $(this).data('parent');
            $('#update-input-name').val(name);
            $('#update-select-id').val(parent);
            modal_update.dialog("open");
        })
        // ajax create
        $('#update-btn').click(function() {
            let name = $('#update-input-name').val();
            let parent_id = $('#update-select-id').val();
            
            //let parent = $('#update-select-id option[value=' + id + ']').html();
            $.ajax({
                'url': '{{ route('update') }}',
                method: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'name': name,
                    'parent_id': parent_id,
                    'id' : editing_menu_item_id
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
{{-- dialog --}}
<div id="dialog-update" title="اضافه کردن منو">
    <fieldset>
        <label for="name">نام منو</label>
        <input type="text" id="update-input-name" class="form-control" >
        <label for="password">والد</label>
        <select id="update-select-id" class="form-control">
            <option value="0">منو اصلی</option>
            @foreach ($all as $menu)
                <option value="{{ $menu->id }}">
                    {{ $menu->name }}
                </option>
            @endforeach

        </select></br>
        <button id="update-btn" class="btn btn-success form-control">update</button>
    </fieldset>

</div>
