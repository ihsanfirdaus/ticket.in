$(document).ready(function(){
    $("#load-data").click(function() {
      $("#list-pemesanan")
          .DataTable()
          .ajax.reload();
    });

    $('#list-pemesanan').DataTable({
        processing: true,
        language: {
          processing: '<div class="lds-dual-ring"></div>'
        },
        serverSide: true,
        ajax: {
          url: +'admin/pemesanan',
        },
        lengthMenu: [
            [5, 10, 25, 50],
            [5, 10, 25, 50, "All"] //Set Menu Page Length
        ],
        order: ["0", "desc"], //Order data with Descending
        columns: [
          {data: 'no_pemesanan',name: 'no_pemesanan'},
          {data: 'nama_pemesan', name: 'nama_pemesan'},
          {data: 'jumlah_penumpang', name: 'jumlah_penumpang'},
          {data: 'harga_total', name: 'harga_total' },
          {data: 'tanggal_pemesanan', name: 'tanggal_pemesanan'},
          {data: 'status', name: 'status'},
          {data: 'action',name: 'action', orderable: false, searcable: false}
        ]
      });     
});