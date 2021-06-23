@extends('layouts.appcess_main_layout')

@section('breadcrumbs')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h3>UBICACIONS</h3>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/home">
                            <i class="feather icon-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">LLISTAT UBICACIONS</a></li>
                </ul>
            </div>
        </div>
        
        <hr>
  

    </div>
</div>
    
@endsection


@section('content')

@include ('locations.partials.locations-modal')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="row mb-3">
                    <div class="col-6">
                        <h4>LLISTAT UBICACIONS</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                            <button class="btn btn-primary" onclick="newLocation()">Nova ubicacio</button>
                    </div>
                </div>
                <hr>

                <div class="row">
             
                    <div class="col">
                        <table id="locationsTable" class="table table-striped table-bordered nowrap" style="width:100%">
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

<script src="{{asset("js/locations.js")}} " ></script>
<script src="{{asset("js/appcess-defs.js")}} " ></script>

<script>

    $(document).ready(function() { 
        

        cuposYEntradasTable = $('#locationsTable').DataTable( {
        "scrollX": true,
        "ajax": {
            "url": "/getLocationsall",
            "type": "GET",
            "datatype": "json"
        },

        columns: [
            { data: "id" ,visible: false },
            { data: "nombre" , "title" : "Nom" },
           
            { "defaultContent": "  <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'></a>     <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectDelete'>      </a>  ", "title" : "" , "width":"10%"}  ,              
        ],

        "language": tablesLang

    } );        


   


        $('#locationsTable').on('click', '#selectEdit', function (e) {

            e.preventDefault();  
            var currentRow = $(this).closest("tr");
            var data = $('#locationsTable').DataTable().row(currentRow).data();
   
            editLocation(data)

        });    

        $('#locationsTable').on('click', '#selectDelete', function (e) {

            e.preventDefault();  
            var currentRow = $(this).closest("tr");
            var data = $('#locationsTable').DataTable().row(currentRow).data();

            deleteLocation( data )

        });            

    });

</script>    

@endsection