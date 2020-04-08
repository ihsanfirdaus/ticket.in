$(document).ready(function() {
    //START
    // GLOBAL FUNCTION

    $("#btn_add").click(function() {
        $("#card_add").show();
        $("#table_maskapai").hide();
        $("#btn_cancel").show();
        $("#btn_add").hide();
        $("#load-data").hide();
    });

    $("#btn_cancel").click(function() {
        $("#card_add").hide();
        $("#table_maskapai").show();
        $("#btn_cancel").hide();
        $("#btn_add").show();
        $("#load-data").show();
    });

    const element1 = document.querySelector("#list-maskapai");
    element1.classList.add("animated", "fadeIn");

    const element2 = document.querySelector("#form-create");
    element2.classList.add("animated", "fadeIn");

    // LOAD DATA WITHOUT RELOAD THE PAGE
    $("#load-data").click(function() {
        $("#list-maskapai")
            .DataTable()
            .ajax.reload();
    });
    // SHOW DATA
    $("#list-maskapai").DataTable({
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
            url: +"admin/maskapai"
        },
        columns: [
            { data: "gambar_maskapai", name: "gambar_maskapai" },
            { data: "jenis_k.jenis_kendaraan", name: "id_jenis" },
            { data: "nama_maskapai", name: "nama_maskapai" },
            { data: "jumlah_kursi", name: "jumlah_kursi" },
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
            url: "maskapai/save", // URL
            method: "POST",
            dataType: "JSON",
            cache: false,
            contentType: false,
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
                var id_jenis = $("#id_jenis").val();
                var nama_maskapai = $("#nama_maskapai").val();
                var jumlah_kursi = $("#jumlah_kursi").val();
                var gambar_maskapai = $("#gambar_maskapai").val();

                if (
                    id_jenis == "" ||
                    nama_maskapai == "" ||
                    jumlah_kursi == "" ||
                    gambar_maskapai == ""
                ) {
                    Swal.fire({
                        position: "top-center",
                        type: "error",
                        title: "Ada kolom yang belum di isi",
                        showConfirmButton: false,
                        timerProgressBar: true
                    });
                } else {
                    $("#form-create")[0].reset();
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
    $("body").on("click", ".deleteMaskapai", function() {
        var maskapai_id = $(this).data("id");

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
                        url: "maskapai/delete" + "/" + maskapai_id,
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
                            $("#list-maskapai")
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
}); // END

var myUpload = new FileUploadWithPreview('myUploader', {
    showDeleteButtonOnImages: true,
    text: {
        chooseFile: 'Pilih Gambar ...',
        browse: 'Cari',
        selectedCount: 'files selected'
    },
    maxFileCount: 0,
    presetFiles: []
});