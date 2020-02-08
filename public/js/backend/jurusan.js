$(document).ready(function() {
    $("#timepicker").timepicker({ timeFormat: "H:i:s" });

    // GLOBAL FUNCTION
    $("#btn_add").click(function() {
        $("#card_add").show();
        $("#table_jurusan").hide();
        $("#btn_cancel").show();
        $("#btn_add").hide();
        $("#load-data").hide();
    });

    $("#btn_cancel").click(function() {
        $("#card_add").hide();
        $("#table_jurusan").show();
        $("#btn_cancel").hide();
        $("#btn_add").show();
        $("#load-data").show();
    });

    const element1 = document.querySelector("#list-jurusan");
    element1.classList.add("animated", "fadeIn");

    const element2 = document.querySelector("#form-create");
    element2.classList.add("animated", "fadeIn");

    $("#load-data").click(function() {
        $("#list-jurusan")
            .DataTable()
            .ajax.reload();
    });

    // SHOW DATA
    $("#list-jurusan").DataTable({
        processing: true,
        serverSide: true,
        lengthMenu: [
            [5, 10, 25, 50],
            [5, 10, 25, 50, "All"] //Set Menu Page Length
        ],
        order: ["0", "desc"], //Order data with Descending
        ajax: {
            url: +"admin/jurusan"
        },
        columns: [
            { data: "id", name: "id" },
            { data: "keberangkatan", name: "keberangkatan" },
            { data: "tujuan", name: "tujuan" },
            { data: "waktu", name: "waktu" },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false
            }
        ]
    });

    // ADD
    $("#btn_save").click(function() {
        // $.ajaxSetup({
        //     headers: {
        //         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        //     }
        // });

        const swalWithBootstrapButtons = Swal.mixin({
            buttonsStyling: true,
            confirmButtonColor: "#4e73df",
            cancelButtonColor: "#858796"
        });

        swalWithBootstrapButtons
            .fire({
                title: "Tambah data ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
                reverseButtons: true
            })
            .then(result => {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: "jurusan/save",
                        dataType: "JSON",
                        data: {
                            keberangkatan: $(
                                "#form-create input[name=keberangkatan]"
                            ).val(),
                            tujuan: $("#form-create input[name=tujuan]").val(),
                            waktu: $("#form-create input[name=waktu]").val()
                        },
                        beforeSend: function() {
                            Swal.fire({
                                title: "Tunggu Sebentar",
                                timer: 2500,
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
                                "Data berhasil di tambahkan.",
                                "success"
                            );
                            $("#form-create").trigger("reset");
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire(
                        "",
                        "Data batal di tambahkan",
                        "error"
                    );
                }
            });
    });

    $("body").on("click", ".deleteJurusan", function() {
        var jurusan_id = $(this).data("id");

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
                        url: "jurusan/delete" + "/" + jurusan_id,
                        beforeSend: function() {
                            Swal.fire({
                                title: "Tunggu Sebentar ",
                                timer: 2500,
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
                            $("#list-jurusan")
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
});
