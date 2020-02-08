$(document).ready(function(){
     
function loadData(){
    $('#list-booking').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: +'/admin/booking',
        },
        columns: [
          {
             data: 'id',
             name: 'id'
          },
          {
            data: 'no_booking',
            name: 'no_booking'
          },
          {
            data: 'jadwal.tanggal_berangkat',
            name: 'tanggal_berangkat',
          },
          {
             data: 'user.name',
             name: 'name',
          },
          {
             data: 'jumlah_penumpang',
             name: 'jumlah_penumpang'
          },
          {
             data: 'harga_total',
             name: 'harga_total'
           },
           {
             data: 'tanggal_booking',
             name: 'tanggal_booking'
           },
          {
            data: 'action',
            name: 'action',
            orderable: false
          }
        ]
      });   
    }
    loadData();  
    
    // $('#load-data').click(function(){
    //     loadData(0);
    // })
   
});