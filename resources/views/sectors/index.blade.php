@extends('layouts.appcess_main_layout')

@section('breadcrumbs')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h3>SECTORES</h3>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/home">
                            <i class="feather icon-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">LISTADO SECTORES</a></li>
                </ul>
            </div>
        </div>
        
        <hr>
  

    </div>
</div>
    
@endsection


@section('content')

@include ('sectors.partials.sectors-modal')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="row mb-3">
                    <div class="col-6">
                        <h4>UBICACIONS</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                            {{-- <button class="btn btn-primary" onclick="newArea()">Nou departament</button> --}}
                            <select class="form-control col-5" name="locationsList" id="locationsList" onchange="locationsListChange()">
                                
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
                        <h4>LLISTAT SECTORS</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                            <button class="btn btn-primary" onclick="newSector()">Nou sector</button>
                    </div>
                </div>
                <hr>

                <div class="row">
             
                    <div class="col">
                        <table id="sectorsTable" class="table table-striped table-bordered nowrap" style="width:100%">
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

<script src="{{asset("js/sectors.js")}} " ></script>
<script src="{{asset("js/appcess-defs.js")}} " ></script>

<script>

    $(document).ready(function() { 
        

        cuposYEntradasTable = $('#sectorsTable').DataTable( {
        "scrollX": true,
        "ajax": {
            "url": "/getSectorssall",
            "type": "GET",
            "datatype": "json"
        },

        columns: [
            { data: "id" ,visible: false },
            { data: "location_id" ,visible: false },
            { data: "nombre" , "title" : "Nom" },
           
            { "defaultContent": "  <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'></a>     <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectDelete'>      </a>  ", "title" : "" , "width":"10%"}  ,              
        ],

        "language": tablesLang

    } );        


   


        $('#sectorsTable').on('click', '#selectEdit', function (e) {

            e.preventDefault();  
            var currentRow = $(this).closest("tr");
            var data = $('#sectorsTable').DataTable().row(currentRow).data();
   
            editSector(data)

        });    

        $('#sectorsTable').on('click', '#selectDelete', function (e) {

            e.preventDefault();  
            var currentRow = $(this).closest("tr");
            var data = $('#sectorsTable').DataTable().row(currentRow).data();

            deleteSector( data )

        });            

        crearListaUbicaciones();

    });


function crearListaUbicaciones() {

        axios.get('/getLocationsall')
                .then(response => {
   
                if (response.data.success) {
                        
                    response.data.data.forEach(area => {
                        
                        $('<option>', {
                            value: area.id,
                            text:  area.nombre,
                        }).appendTo('#locationsList');

                        
                    });
                
                    locationsListChange()

                } else {
                
                }

        })
        .catch( function (error) {

        });    

}

function locationsListChange() {
    
    var table = $('#sectorsTable').DataTable();
        var myAreaValue = $('#locationsList').val();
    
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