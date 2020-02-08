$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // SHOW DATA 
    $('#list-user').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: +'admin/user',
        },
        order: ['0', 'desc'],
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false
            }
        ]
    });
    //  DELETE
    $('body').on('click', '.deleteUser', function () {

        var user_id = $(this).data('id');

        $.ajax({
            type: "GET",
            url: 'user/delete' + '/' + user_id,
            success: function (data) {
                console.log('Success', data)
                $('#list-user').DataTable().ajax.reload();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    // LOAD DATA WITHOUT RELOAD PAGE
    $("#load-data").click(function () {
        $('#list-user').DataTable().ajax.reload();
    });

});
