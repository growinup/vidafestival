@extends('layouts.appcess_main_layout')

@section('breadcrumbs')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h3>TIPOLOGIA D'ESDEVENIMENTS</h3>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/home">
                            <i class="feather icon-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">LLISTAT TIPOLOGIA D'ESDEVENIMENTS</a></li>
                </ul>
            </div>
        </div>
        
        <hr>
  

    </div>
</div>
    
@endsection


@section('content')

@include ('activity-type.partials.activity-types-modal')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="row mb-3">
                    <div class="col-6">
                        <h4>ACTIVITATS</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col">                            
                            <select class="form-control col-5" name="activitiesList" id="activitiesList" onchange="activitiesListChange()">                                
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
                        <h4>LLISTAT TIPOLOGIA D'ESDEVENIMENTS</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                            <button class="btn btn-primary" onclick="newActivityType()">Nova Tipologia d'esdeveniment</button>
                    </div>
                </div>
                <hr>

                <div class="row">
             
                    <div class="col">
                        <table id="activitiesTypeTable" class="table table-striped table-bordered nowrap" style="width:100%">
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

<script src="{{asset("js/activity-types.js")}} " ></script>
<script src="{{asset("js/appcess-defs.js")}} " ></script>

<script>

    $(document).ready(function() { 
        

        cuposYEntradasTable = $('#activitiesTypeTable').DataTable( {
        "scrollX": true,
        "ajax": {
            "url": "/getTipoActividadsall",
            "type": "GET",
            "datatype": "json"
        },

        columns: [
            { data: "id" ,visible: false },
            { data: "activity_id" ,visible: false },
            { data: "name" , "title" : "Nom" },
           
            { "defaultContent": "  <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'></a>     <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectDelete'>      </a>  ", "title" : "" , "width":"10%"}  ,              
        ],

        "language": tablesLang

    } );        


   


        $('#activitiesTypeTable').on('click', '#selectEdit', function (e) {

            e.preventDefault();  
            var currentRow = $(this).closest("tr");
            var data = $('#activitiesTypeTable').DataTable().row(currentRow).data();
   
            editActivityType(data)

        });    

        $('#activitiesTypeTable').on('click', '#selectDelete', function (e) {

            e.preventDefault();  
            var currentRow = $(this).closest("tr");
            var data = $('#activitiesTypeTable').DataTable().row(currentRow).data();

            deleteActivityType( data )

        });            

        crearListaActividades();

    });


function crearListaActividades() {

        axios.get('/getActividadsall')
                .then(response => {
   
                if (response.data.success) {
                        
                    response.data.data.forEach(area => {
                        
                        $('<option>', {
                            value: area.id,
                            text:  area.name,
                        }).appendTo('#activitiesList');

                        
                    });
                
                    activitiesListChange()

                } else {
                
                }

        })
        .catch( function (error) {

        });    

}

function activitiesListChange() {
    
    var table = $('#activitiesTypeTable').DataTable();
        var myAreaValue = $('#activitiesList').val();
    
        var filteredData = table
            .column( 1 )
            .search("^" + myAreaValue + "$", true, false, true)
            .draw();


}



</script>    

@endsection