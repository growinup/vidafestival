@extends('layouts.appcess_main_layout')

@section('breadcrumbs')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h3>BBDD</h3>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/home">
                            <i class="feather icon-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">ASSISTENTS</a></li>
    
                </ul>
            </div>
        </div>
    </div>
</div>
    
@endsection

@section('content')

@include ('guests.partials.guests-modal')
  
    <div class="row">
      <div class="col">       
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">

                        <h4>Assistents </h4>
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                            <button class="btn btn-primary" onclick="newGuest()">Nou assistent</button>
                    </div>
                </div>
                <hr>

            </div>
         
    

            <div class="card-body">
                <table id="myGuestsTable" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead> </thead>
                    <tbody></tbody>                                                                        
                </table>                    
            </div>

        </div>
    </div>
    </div>    

    


@endsection 


@section('scripts')

<script src="{{asset("js/guests.js")}} " ></script>
<script src="{{asset("js/appcess-defs.js")}} " ></script>

<script>

cargaSelectsGuests();

$(document).ready(function() {

    $('#myGuestsTable').DataTable( {
     
        "scrollX": true,
        "ajax": {
            "url": "/guests",
            "type": "GET",
            "datatype": "json"
        },
        "columns": [
            {"data":"nombre", title:"Nom"},
            {"data":"apellidos", title:"Cognoms"},
            {"data":"dni", title:"DNI"},
            {"data":"email", title:"Email"},
            {"data":"fecha_nacimiento", title:"Data naixament",
            "render": function (data, type, row, meta) {
                        let myData =  moment(data).format('DD/MM/YYYY')

                        if (myData != 'Invalid date') {
                            data = myData
                        } else {
                            data = ''
                        }
                        
                        return data
                    }
        
            },
                     
            {"data":"nationality_id", title:"Nacionalitat",
            render: function (data, type, row, meta) {
                    return listaNacionalidades[data - 1];
                    
                }
        
            },
            { "defaultContent": "  <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'></a>     <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectDelete'>      </a>  ", "title" : "" , "width":"10%"}  ,              
        ],

        "language": tablesLang

    } );



        $('#myGuestsTable').on('click', '#selectEdit', function (e) {

            e.preventDefault();  
            var currentRow = $(this).closest("tr");
            var data = $('#myGuestsTable').DataTable().row(currentRow).data();

            editGuest(data)

        });    

        $('#myGuestsTable').on('click', '#selectDelete', function (e) {

            e.preventDefault();  
            var currentRow = $(this).closest("tr");
            var data = $('#myGuestsTable').DataTable().row(currentRow).data();

            deleteGuest( data )

        });                
 
      // end document ready

      $('#myGuestInputDni').on("keyup", function () {

        if ($('#myGuestInputDni').val().length > 8) {
            let searching = true;
            let myUserDniToCheck = $('#myGuestInputDni').val();
            // check database

            if (searching) {
                axios.get('/newguestcheck/' + myUserDniToCheck)
                    .then(response => {
                                    
                        // esta en la base de datos
                        if (response.data.data > 0 ) {
             
                            Swal.fire(
                                'Error!',
                                "Aquest DNI ja existeix a la base de dades",
                                'error'
                            )
                            $('#myGuestInputDni').val('')
                            return;

                        } 

                        searching = false;

                    })
                    .catch(function (error) {
                        console.log(error)
                    });
            }

        } 
        });
      




    
} );

          



function cambiarDataset() {

    // recorrer table
    var myTable = $('#myGuestsTable').DataTable();
    var form_data  = myTable.rows().data();
    $.each( form_data, function( key, value ) {
            
            });

}

</script>    


    
@endsection