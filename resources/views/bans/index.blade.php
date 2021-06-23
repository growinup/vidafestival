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
                    <li class="breadcrumb-item"><a href="#">PROHIBICIONS</a></li>
    
                </ul>
            </div>
        </div>
    </div>
</div>
    
@endsection

@section('content')

@include ('bans.partials.bans-modal')
  
    <div class="row">
    <div class="col">
        
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h4>Prohibicions </h4>
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                            <button class="btn btn-primary" onclick="newBan()">Nou expedient</button>
                    </div>
                </div>
                <hr>


            </div>
         
  
            <div class="card-body">
                <table id="myBansTable" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead> </thead>
            
                    <tbody></tbody>
                </table>                    
            </div>

        </div>
    </div>
    </div>    

    


@endsection 


@section('scripts')

<script src="{{asset("js/bans.js")}} " ></script>
<script src="{{asset("js/appcess-defs.js")}} " ></script>

<script>

$(document).ready(function() {

    $('#myBansTable').DataTable( {
     
        "scrollX": true,
        "ajax": {
            "url": "/bans",
            "type": "GET",
            "datatype": "json"
        },
        "columns": [
            {"data":"ejercicio",title:"Exercici"},            
            {"data":"expediente",title:"Expedient"},
            {"data":"fecha_resolucion",title:"Data res"},
            {"data":"delegacion",title:"Delegació"},
            {"data":"identificacion",title:"Identificació"},
            {"data":"nombre",title:"Nom"},
            {"data":"fecha_inicio",title:"Data inici"},
            {"data":"fecha_fin",title:"Data fi"},
            { "defaultContent": "  <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'></a>     <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectDelete'>      </a>  ", "title" : "" , "width":"10%"}  ,              
        ],
     
        "language": tablesLang

    } );

 

    $('#myBansTable').on('click', '#selectEdit', function (e) {

        e.preventDefault();  
        var currentRow = $(this).closest("tr");
        var data = $('#myBansTable').DataTable().row(currentRow).data();

        editBan(data)

        });    

        $('#myBansTable').on('click', '#selectDelete', function (e) {

        e.preventDefault();  
        var currentRow = $(this).closest("tr");
        var data = $('#myBansTable').DataTable().row(currentRow).data();

        deleteBan( data )

        });               
      // end document ready
} );

          



function cambiarDataset() {

        // recorrer table
        var myTable = $('#myBansTable').DataTable();
        var form_data  = myTable.rows().data();
        $.each( form_data, function( key, value ) {
                

                
        });





}

</script>    


    
@endsection