$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    // SHOW DATA

    $("#list-user").DataTable({
        processing: true,
        language: {
            processing: '<div class="lds-dual-ring"></div>'
        },
        serverSide: true,
        ajax: {
            url: +"admin/user"
        },
        order: ["0", "desc"],
        columns: [
            { data: "name", name: "name" },
            { data: "email", name: "email" },
            { data: "phone_number", name: "phone_number"},
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false
            }
        ]
    });
    //  DELETE
    $("body").on("click", ".deleteUser", function() {
        var user_id = $(this).data("id");

        const swalWithBootstrapButtons = Swal.mixin({
            buttonsStyling: true,
            confirmButtonColor: "#4e73df",
            cancelButtonColor: "#e74a3b"
        });

        swalWithBootstrapButtons
            .fire({
                title: "Hapus data ini ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
                reverseButtons: true
            })
            .then(result => {
                if (result.value) {
                    $.ajax({
                        type: "GET",
                        url: "user/delete" + "/" + user_id,
                        beforeSend: function() {
                            Swal.fire({
                                title: "Tunggu Sebentar ",
                                timerProgressBar: true,
                                onBeforeOpen: () => {
                                    Swal.showLoading();
                                },
                                onClose: () => {
                                    clearInterval();
                                }
                            });
                        },
                        success: function() {
                            swalWithBootstrapButtons.fire(
                                "",
                                "Data berhasil di hapus.",
                                "success"
                            );
                            $("#list-user")
                                .DataTable()
                                .ajax.reload();
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire(
                        "",
                        "Data batal dihapus",
                        "error"
                    );
                }
            });
    });
    // LOAD DATA WITHOUT RELOAD PAGE
    $("#load-data").click(function() {
        $("#list-user")
            .DataTable()
            .ajax.reload();
    });
});
