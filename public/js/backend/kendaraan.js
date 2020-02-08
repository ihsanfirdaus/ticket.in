$(document).ready(function() {
    //START

    // GLOBAL FUNCTION

    function swalDelete() {}
    // sweetalert2();

    $("#btn_add").click(function() {
        $("#card_add").show();
        $("#table_kendaraan").hide();
        $("#btn_cancel").show();
        $("#btn_add").hide();
        $("#load-data").hide();
    });

    $("#btn_cancel").click(function() {
        $("#card_add").hide();
        $("#table_kendaraan").show();
        $("#btn_cancel").hide();
        $("#btn_add").show();
        $("#load-data").show();
    });

    const element1 = document.querySelector("#list-kendaraan");
    element1.classList.add("animated", "fadeIn");

    const element2 = document.querySelector("#form-create");
    element2.classList.add("animated", "fadeIn");

    // LOAD DATA WITHOUT RELOAD THE PAGE
    $("#load-data").click(function() {
        $("#list-kendaraan")
            .DataTable()
            .ajax.reload();
    });
    // SHOW DATA
    $("#list-kendaraan").DataTable({
        processing: true,
        serverSide: true,
        lengthMenu: [
            [5, 10, 25, 50],
            [5, 10, 25, 50, "All"] //Set Menu Page Length
        ],
        order: ["0", "desc"], //Order data with Descending
        ajax: {
            url: +"admin/kendaraan"
        },
        columns: [
            { data: "id", name: "id" },
            { data: "jenis_k.jenis_kendaraan", name: "id_jenis" },
            { data: "nama_kendaraan", name: "nama_kendaraan" },
            { data: "gambar_kendaraan", name: "gambar_kendaraan" },
            { data: "jumlah_kursi", name: "jumlah_kursi" },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false
            }
        ]
    });

    // UPLOAD WITH PREVIEW IMAGE
    $(document).on("change", ".btn-file :file", function() {
        var input = $(this),
            label = input
                .val()
                .replace(/\\/g, "/")
                .replace(/.*\//, "");
        input.trigger("fileselect", [label]);
    });

    $(".btn-file :file").on("fileselect", function(event, label) {
        var input = $(this)
                .parents(".input-group")
                .find(":hidden"),
            log = label;

        if (input.length) {
            input.val(log);
        } else {
            if (log) alert(log);
        }
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $("#img-upload").attr("src", e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".imgInp").change(function() {
        readURL(this);
    });

    // ADD
    $("#form-create").on("click", "#btn_save", function() {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });

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
                        url: "kendaraan/save", // URL save
                        dataType: "JSON",
                        data: {
                            jenis_k: $(
                                "#form-create select[name=jenis_k]"
                            ).val(),
                            nama_kendaraan: $(
                                "#form-create input[name=nama_kendaraan]"
                            ).val(),
                            jumlah_kursi: $(
                                "#form-create input[name=jumlah_kursi]"
                            ).val(),
                            gambar_kendaraan: $(
                                "#form-create input[name=gambar_kendaraan]"
                            ).val()
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
                                "...",
                                "Data berhasil di hapus.",
                                "success"
                            );
                            $("#form-create").trigger("reset");
                            $("#img-upload").hide();
                            window.location.reload();
                        }
                    });
                }
            });
    });
    // DELETE
    $("body").on("click", ".deleteKendaraan", function() {
        var kendaraan_id = $(this).data("id");

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
                        url: "kendaraan/delete" + "/" + kendaraan_id,
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
                                "...",
                                "Data berhasil di hapus.",
                                "success"
                            );
                            $("#list-kendaraan")
                                .DataTable()
                                .ajax.reload();
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire(
                        "...",
                        "Data batal dihapus",
                        "error"
                    );
                }
            });
    });
}); // END
