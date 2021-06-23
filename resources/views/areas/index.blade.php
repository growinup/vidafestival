@extends('layouts.appcess_main_layout')

@section('breadcrumbs')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h3>ÁREES</h3>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/home">
                            <i class="feather icon-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">LLISTAT ÀREES</a></li>
                </ul>
            </div>
        </div>
        
        <hr>
  

    </div>
</div>
    
@endsection


@section('content')

@include ('areas.partials.areas-modal')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="row mb-3">
                    <div class="col-6">
                        <h4>LLISTAT ÀREES</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                            <button class="btn btn-primary" onclick="newArea()">Nova àrea</button>
                    </div>
                </div>
                <hr>

                <div class="row">
             
                    <div class="col">
                        <table id="areasTable" class="table table-striped table-bordered nowrap" style="width:100%">
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

<script src="{{asset("js/areas.js")}} " ></script>
<script src="{{asset("js/appcess-defs.js")}} " ></script>

<script>

    $(document).ready(function() { 
        

        cuposYEntradasTable = $('#areasTable').DataTable( {
        "scrollX": true,
        "ajax": {
            "url": "/getAreassall",
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


   


        $('#areasTable').on('click', '#selectEdit', function (e) {

            e.preventDefault();  
            var currentRow = $(this).closest("tr");
            var data = $('#areasTable').DataTable().row(currentRow).data();
   
            editArea(data)

        });    

        $('#areasTable').on('click', '#selectDelete', function (e) {

            e.preventDefault();  
            var currentRow = $(this).closest("tr");
            var data = $('#areasTable').DataTable().row(currentRow).data();

            deleteArea( data )

        });            

    });

</script>    

@endsection