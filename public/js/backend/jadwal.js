$(document).ready(function() {
    $("input:radio").click(function() {
        if ($(this).attr("id") == "sekali_jalan") {
            $("#tanggal_pulang").prop("disabled", true);
        } else {
            $("#tanggal_pulang").prop("disabled", false);
        }
    });

    $("#load-data").click(function() {
        $("#list-jadwal")
            .DataTable()
            .ajax.reload();
    });

    var today = new Date(
        new Date().getFullYear(),
        new Date().getMonth(),
        new Date().getDate()
    );

    $(".startdatepicker").datepicker({
        uiLibrary: "bootstrap4",
        iconsLibrary: "fontawesome",
        format: "yyyy-mm-dd",
        minDate: today,
        maxDate: function() {
            return $(".enddatepicker").val();
        }
    });
    $(".enddatepicker").datepicker({
        format: "yyyy-mm-dd",
        uiLibrary: "bootstrap4",
        iconsLibrary: "fontawesome",
        minDate: function() {
            return $(".startdatepicker").val();
        }
    });

    $(".rupiah").mask("000.000.000", { reverse: true });
    // $(".datepicker").mask("00/00/0000");
    // GLOBAL FUNCTION
    $("#btn_add").click(function() {
        $("#card_add").show();
        $("#table_jadwal").hide();
        $("#btn_cancel").show();
        $("#btn_add").hide();
        $("#load-data").hide();
    });

    $("#btn_cancel").click(function() {
        $("#card_add").hide();
        $("#table_jadwal").show();
        $("#btn_cancel").hide();
        $("#btn_add").show();
        $("#load-data").show();
    });

    const element1 = document.querySelector("#list-jadwal");
    element1.classList.add("animated", "fadeIn");

    const element2 = document.querySelector("#form-create");
    element2.classList.add("animated", "fadeIn");

    $("#list-jadwal").DataTable({
        processing: true,
        language: {
            processing: '<div class="lds-dual-ring"></div>'
        },
        serverSide: true,
        lengthMenu: [
            [5, 10, 25, 50],
            [5, 10, 25, 50, "All"] //Set Menu Page Length
        ],
        ajax: {
            url: +"admin/jadwal"
        },
        columns: [
            { data: "tanggal_berangkat", name: "tanggal_berangkat" },
            { data: "tanggal_pulang", name: "tanggal_pulang" },
            { data: "jurusan", name: "jurusan" },
            { data: "harga_tiket", name: "harga_tiket" },
            { data: "tipe_tiket", name: "tipe_tiket" },
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
            url: "jadwal/save",
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            data: new FormData(this),
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
                var tanggal_berangkat = $("#tanggal_berangkat").val();
                var tipe_tiket = $("#tipe_tiket").val();
                var id_kategori = $("#id_kategori").val();
                var id_kendaraan = $("#id_kendaraan").val();
                var id_jurusan = $("#id_jurusan").val();
                var harga_tiket = $("#harga_tiket").val();

                if (
                    tanggal_berangkat == "" ||
                    tipe_tiket == "" ||
                    id_kategori == "" ||
                    id_kendaraan == "" ||
                    id_jurusan == "" ||
                    harga_tiket == ""
                ) {
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
    $("body").on("click", ".deleteJadwal", function() {
        var jadwal_id = $(this).data("id");

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
                        url: "jadwal/delete" + "/" + jadwal_id,
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
                            $("#list-jadwal")
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
