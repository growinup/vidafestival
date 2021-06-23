@extends('layouts.appcess_main_layout')

@section('breadcrumbs')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h3>ZONES</h3>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/home">
                            <i class="feather icon-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">LLISTAT ZONES</a></li>
                </ul>
            </div>
        </div>
        
        <hr>
  

    </div>
</div>
    
@endsection


@section('content')

@include ('zones.partials.zones-modal')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="row mb-3">
                    <div class="col-6">
                        <h4>SECTORS</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                            {{-- <button class="btn btn-primary" onclick="newArea()">Nou departament</button> --}}
                            <select class="form-control col-5" name="sectoresList" id="sectoresList" onchange="sectoresListChange()">
                                
                            </select>
                    </div>
                </div>
          

          
            </div>

            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="row mb-3">
                    <div class="col-6">
                        <h4>LLISTAT ZONES</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                            <button class="btn btn-primary" onclick="newZona()">Nova zona</button>
                    </div>
                </div>
                <hr>

                <div class="row">
             
                    <div class="col">
                        <table id="zonesTable" class="table table-striped table-bordered nowrap" style="width:100%">
                            <thead></thead>
                            <tbody></tbody>
                        </table>                        
                    </div>
             
                </div>
            </div>

            </div>
        </div>
    </div>
</div>

@endsection




@section('scripts')

<script src="{{asset("js/zones.js")}} " ></script>
<script src="{{asset("js/appcess-defs.js")}} " ></script>

<script>

    $(document).ready(function() { 
        

        cuposYEntradasTable = $('#zonesTable').DataTable( {
        "scrollX": true,
        "ajax": {
            "url": "/getZonassall",
            "type": "GET",
            "datatype": "json"
        },

        columns: [
            { data: "id" ,visible: false },
            { data: "sector_id" ,visible: false },
            { data: "nombre" , "title" : "Nom" },
           
            { "defaultContent": "  <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'></a>     <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectDelete'>      </a>  ", "title" : "" , "width":"10%"}  ,              
        ],

        "language": tablesLang

    } );        


   


        $('#zonesTable').on('click', '#selectEdit', function (e) {

            e.preventDefault();  
            var currentRow = $(this).closest("tr");
            var data = $('#zonesTable').DataTable().row(currentRow).data();
   
            editZona(data)

        });    

        $('#zonesTable').on('click', '#selectDelete', function (e) {

            e.preventDefault();  
            var currentRow = $(this).closest("tr");
            var data = $('#zonesTable').DataTable().row(currentRow).data();

            deleteZona( data )

        });            

        crearListaSectores();

    });


function crearListaSectores() {

        axios.get('/getSectorssall')
                .then(response => {
   
                if (response.data.success) {
                        
                    response.data.data.forEach(area => {
                        
                        $('<option>', {
                            value: area.id,
                            text:  area.nombre,
                        }).appendTo('#sectoresList');

                        
                    });
                
                    sectoresListChange()

                } else {
                
                }

        })
        .catch( function (error) {

        });    

}

function sectoresListChange() {
    
    var table = $('#zonesTable').DataTable();
        var myAreaValue = $('#sectoresList').val();
    
        var filteredData = table
            .column( 1 )
            .search("^" + myAreaValue + "$", true, false, true)
            .draw();


}


// function filtrarDepartamentos() {

       
//         var table = $('#cuposdepartamentosgenerico').DataTable();
//         var myAreaValue = $('#myArea').val();
    
//         var filteredData = table
//             .column( 1 )
//             .search("^" + myAreaValue + "$", true, false, true)
//             .draw();

// }

</script>    

@endsection