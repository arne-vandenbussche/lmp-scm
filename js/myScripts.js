$(document).ready( 
function () {
   $('#tblPersonen').DataTable({
            "order": [ 1, 'asc' ],
          "language": {
                        "emptyTable": "Geen gegevens beschikbaar",
                        "info": "rij _START_ tot _END_ van _TOTAL_ rijen",
                        "infoEmpty": "rij 0 tot 0 van 0 rijen",
                        "infoFiltered": "(gefilterd van _MAX_ total rijen)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": " _MENU_ rijen",
                        "loadingRecords": "Aan het laden...",
                        "processing": "Aan het verwerken...",
                        "search": "Zoek:",
                        "zeroRecords": "Geen rijen gevonden",
                        "paginate": {
                            "first": "Eerste",
                            "last": "Laatste",
                            "next": "Volgende",
                            "previous": "Vorige"
                        },
                        "aria": {
                            "sortAscending": ": activeer sorteren in stijgende volgorde",
                            "sortDescending": ": activeer sorteren in dalende volgorde"
                        }
            } 
            
           }     
   );
  
} );

