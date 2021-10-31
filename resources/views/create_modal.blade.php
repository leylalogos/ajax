<script>
    $(document).ready(function() {
        // create menu modal
        modal= $("#dialog-form").dialog({
            autoOpen: false,
            height: 400,
            width: 350,
            modal: true,
            buttons: {

                Cancel: function() {
                    modal.dialog("close");
                }
            },
            close: function() {
                $('#create-input-name').val('');
            }
        });

        $('#create_modal_open').click(function() {
            modal.dialog("open");
        })
        // ajax create
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
{{-- dialog --}}
<div id="dialog-form" title="اضافه کردن منو">
    <fieldset>
        <label for="name">نام منو</label>
        <input type="text" id="create-input-name" class="form-control">
        <label for="password">والد</label>
        <select id="create-select-id" class="form-control">
            <option value="0">منو اصلی</option>
            @foreach ($all as $menu)
                <option value="{{ $menu->id }}">
                    {{ $menu->name }}
                </option>
            @endforeach

        </select></br>
        <button id="create-btn" class="btn btn-success form-control">send</button>
    </fieldset>

</div>
