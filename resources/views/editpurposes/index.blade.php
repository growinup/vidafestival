@extends('layouts.appcess_main_layout')

@section('breadcrumbs')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h3>MOTIUS MODIFICACIÃ“ PETICIONS</h3>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/home">
                            <i class="feather icon-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">LLISTAT DE MOTIUS</a></li>
                </ul>
            </div>
        </div>
        
        <hr>
  

    </div>
</div>
    
@endsection


@section('content')

@include ('editpurposes.partials.edit-purposes-modal')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="row mb-3">
                    <div class="col-4">
                        <h4>LLISTAT DE MOTIUS</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                            <button class="btn btn-primary" onclick="newEditPurpose()">Nova motiu</button>
                    </div>
                </div>
                <hr>

                <div class="row">
             
                    <div class="col">
                        <table id="editPurposesTable" class="table table-striped table-bordered nowrap" style="width:100%">
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

<script src="{{asset("js/edit-purpose.js")}} " ></script>
<script src="{{asset("js/appcess-defs.js")}} " ></script>

<script>

    $(document).ready(function() { 
        

        cuposYEntradasTable = $('#editPurposesTable').DataTable( {
        "scrollX": true,
        "ajax": {
            "url": "/geteditpurposesall",
            "type": "GET",
            "datatype": "json"
        },

        columns: [
            { data: "id" ,visible: false },
            { data: "name" , "title" : "Nom" },
           
            { "defaultContent": "  <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'></a>     <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectDelete'>      </a>  ", "title" : "" , "width":"10%"}  ,              
        ],

        "language": tablesLang

    } );        


   


        $('#editPurposesTable').on('click', '#selectEdit', function (e) {

            e.preventDefault();  
            var currentRow = $(this).closest("tr");
            var data = $('#editPurposesTable').DataTable().row(currentRow).data();
  
             editEditPurpose(data)

        });    

        $('#editPurposesTable').on('click', '#selectDelete', function (e) {

            e.preventDefault();  
            var currentRow = $(this).closest("tr");
            var data = $('#editPurposesTable').DataTable().row(currentRow).data();

            deleteEditPurpose( data )

        });            


    });
    



</script>    

@endsection