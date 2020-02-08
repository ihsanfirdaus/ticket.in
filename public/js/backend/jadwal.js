$(document).ready(function(){
           
    $('#list-jadwal').DataTable();
    
    $('#load-data').click(function(){
     
    });

    $(".datepicker").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    });

    //    $('#list-jadwal').DataTable({
    //    processing: true,
    //    serverSide: true,
    //    ajax: {
    //      url: +'',
    //    },
    //    columns: [
    //      {
    //         data: 'id',
    //         name: 'id'
    //      },
    //      {
    //        data: 'tanggal_berangkat',
    //        name: 'tanggal_berangkat'
    //      },
    //      {
    //        data: 'kendaraan.jenis_kendaraan',
    //        name: 'jenis_kendaraan',
    //      },
    //      {
    //        data: 'kendaraan.jumlah_kursi',
    //        name: 'jumlah_kursi'
    //      },
    //      {
    //         data: 'jurusan.keberangkatan',
    //         name: 'jurusan',
    //       },
    //       {
    //         data: 'sopir.nama',
    //         name: 'sopir'
    //       },
    //       {
    //         data: 'harga_tiket',
    //         name: 'harga_tiket'
    //       },
    //      {
    //        data: 'action',
    //        name: 'action',
    //        orderable: false
    //      }
    //    ]
    //  });
    
 });