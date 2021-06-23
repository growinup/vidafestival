@extends('layouts.appcess_main_layout')

@section('breadcrumbs')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h3>PLANTILLES</h3>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/home">
                            <i class="feather icon-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">LLISTAT DE PLANTILLES</a></li>
                </ul>
            </div>
        </div>
        
        <hr>
  

    </div>
</div>
    
@endsection


@section('content')



<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="row mb-3">
                    <div class="col-4">
                        <h4>LLISTAT DE PLANTILLES</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <form action="{{route('crearplantilla')}}">
                            <button class="btn btn-primary">Nova plantilla</button>
                        </form>
                    </div>
                </div>
                <hr>

                <div class="row">
             
                    <div class="col">
                        <table id="emailTemplatesTable" class="table table-striped table-bordered nowrap" style="width:100%">
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

<script src="{{asset("js/email-templates.js")}} " ></script>
<script src="{{asset("js/appcess-defs.js")}} " ></script>

<script>

    $(document).ready(function() { 
        

        cuposYEntradasTable = $('#emailTemplatesTable').DataTable( {
        "scrollX": true,
        "ajax": {
            "url": "/getalltemplates",
            "type": "GET",
            "datatype": "json"
        },

        columns: [
            { data: "id" ,visible: false },
 
            { data: "name" , "title" : "Nom" },
            { data: "activity_type_id" , "title" : "Competició"  , 
                render: function ( data, type, row, meta ) {
                            if (data==1) return 'Lliga';
                            if (data==3) return 'Champions';

                            return 'No definit ';
                    }       
            },
            { data: "subject"   , "title" : "Assumpte"},
            { "defaultContent": "<a href='#' class='btn btn-primary btn-sm feather icon-copy' id='selectClone'></a>       <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'></a>     <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectDelete'>      </a>  ", "title" : "" , "width":"10%"}  ,              
        ],

        "language": tablesLang

    } );        


        $('#emailTemplatesTable').on('click', '#selectClone', function (e) {

            e.preventDefault();  
            var currentRow = $(this).closest("tr");
            var data = $('#emailTemplatesTable').DataTable().row(currentRow).data();
       

            window.location='/templatesclone/'+ data['id'];

        });         


        $('#emailTemplatesTable').on('click', '#selectEdit', function (e) {

            e.preventDefault();  
            var currentRow = $(this).closest("tr");
            var data = $('#emailTemplatesTable').DataTable().row(currentRow).data();
  
           
            window.location='/templatesedit/'+ data['id'];

        });    

        $('#emailTemplatesTable').on('click', '#selectDelete', function (e) {

            e.preventDefault();  
            var currentRow = $(this).closest("tr");
            var data = $('#emailTemplatesTable').DataTable().row(currentRow).data();
            deleteTemplate( data )

        });            


    });
    



</script>    

@endsection