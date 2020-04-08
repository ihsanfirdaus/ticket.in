$(document).ready(function() {
    $(".clockpicker").clockpicker({
        placement: "bottom",
        autoclose: true,
        default: "now"
    });

    $(".clockpicker").mask("00:00");

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

    function windowreload() {
        window.location.reload();
    }

    // SHOW DATA
    $("#list-jurusan").DataTable({
        processing: true,
        language: {
            processing: '<div class="lds-dual-ring"></div>'
        },
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
            { data: "keberangkatan", name: "keberangkatan" },
            { data: "bandara_k", name: "bandara_k"},
            { data: "tujuan", name: "tujuan"},
            { data: "bandara_t", name: "bandara_t"},
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
    $("#form-create").on("submit", function(event) {
        event.preventDefault();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });

        $.ajax({
            type: "POST",
            url: "jurusan/save",
            dataType: "JSON",
            data: {
                bandara_k : $("#form-create input[name=bandara_k]").val(),
                keberangkatan: $("#form-create input[name=keberangkatan]").val(),
                kode_penerbangan_k: $("#form-create input[name=kode_penerbangan_k]").val(),
                waktu_k: $("#form-create input[name=waktu_k]").val(),
                bandara_t : $("#form-create input[name=bandara_t]").val(),
                tujuan: $("#form-create input[name=tujuan]").val(),
                kode_penerbangan_t: $("#form-create input[name=kode_penerbangan_t]").val(),
                waktu_t: $("#form-create input[name=waktu_t]").val()
            },
            beforeSend: function() {
                Swal.fire({
                    title: "Tunggu Sebentar",
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
                var keberangkatan = $("#keberangkatan").val();
                var tujuan = $("#tujuan").val();
                var waktu = $("#waktu").val();

                if (keberangkatan == "" || tujuan == "" || waktu == "") {
                    Swal.fire({
                        position: "top-center",
                        type: "error",
                        title: "Ada kolom yang belum di isi",
                        showConfirmButton: false,
                        timerProgressBar: true
                    });
                } else {
                    Swal.fire({
                        position: "top-center",
                        type: "success",
                        title: "Data Berhasil ditambahkan",
                        showConfirmButton: false,
                        timerProgressBar: true
                    });
                    window.location.reload();
                }
            }
        });
    });
    // DELETE
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
