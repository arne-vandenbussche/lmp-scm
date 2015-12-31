$(document).ready( 
/* to do: deze functie wordt elke keer geladen, ook bij inloggen bijvoorbeeld,
 * terwijl hij enkel bij managePersons geladen moet worden en dan nog eigenlijk
 * als de parsing is gebeurd van de personen.
 * Ofwel laden we die op het juiste moment, en niet eerder
 * ofwel maken we dit hele scriptbestand specifiek voor managePersons.php en
 * niet in de algemene header.
 * Nu treedt er een javascript-error op die verder geen invloed heeft.
 *
 */
function () {
    var table = $('#tblPersonen').DataTable({
        data: personen,
        "order": [ 0, 'asc' ],
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
            ,
            columns: [
               { data: 'naam' },
               { data: 'voornaam' }
            ]
           }     
   );
  
    $('#tblPersonen tbody').on( 'click', 'tr', function () {
        var rijgegevens = ( table.row( this ).data() );
        //index geeft de werkelijke index in de array. Handig.
        var index = (table.row(this)).index();
        //$('#persoonDetail').text(index+": "+rijgegevens.naam +" "+rijgegevens.voornaam+" "+rijgegevens.email1);
        $('#editnaam').val(rijgegevens.naam);
        $('#editvoornaam').val(rijgegevens.voornaam);
        $('#editemail1').val(rijgegevens.email1);
    } );
    
    formNewPersonRestore();
    hideMessages();
    
    $('#buttonNewPerson').on('click', function() {
        $('#formnewperson').show();
        $('#buttonNewPerson').hide();
    });
    
    $('#newPersonCancel').on('click', function() {
        formNewPersonRestore();
    })
    
    $('#newPersonSave').on('click', function() {
        formNewPersonRestore();
        saveNewPerson();
    })
  
} );

function formNewPersonRestore() {
    $('#buttonNewPerson').show();
    $('#formnewperson').hide();
}

function showMessageSuccesSave(data, status){
    $('#messageBoxSucces').text(data);
    $('#messageBoxSucces').show().delay(15000).fadeOut();;
}

function saveNewPerson(){
    var naam = $('#newnaam').val();
    var voornaam = $('#newvoornaam').val();
    $.ajax({
        type:"post",
        url:"db/savePerson.php",
        data: {naam: naam, voornaam: voornaam},
        success: showMessageSuccesSave
    });
}

function hideMessages(){
    $('#messageBoxSucces').hide();
}
