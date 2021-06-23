@extends('layouts.appcess_main_layout')

@section('breadcrumbs')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h3>USUARIS</h3>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/home">
                            <i class="feather icon-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">LLISTAT USUARIS</a></li>
                </ul>
            </div>
        </div>
        
        <hr>
  

    </div>
</div>
    
@endsection


@section('content')

@include ('users.partials.users-modal')



<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="row mb-3">
                    <div class="col-6">
                        <h4>ÀREES</h4>
                        <div class="row">
                            <div class="col">
                                    <select class="form-control col-6" name="areaslist" id="areaslist" onchange="areasListChange()">                                
                                    </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <h4>DEPARTAMENTS</h4>
                        <div class="row">
                            <div class="col">
                                    <select class="form-control col-6" name="areaslist" id="departmentslist" onchange="departmentsListChange()">                                
                                    </select>
                            </div>
                        </div>
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
                        <h4>LLISTAT USUARIS</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                            <button class="btn btn-primary" onclick="newUser()">Nou usuari</button>
                    </div>
                </div>
                <hr>

                <div class="row">
             
                    <div class="col">
                        <table id="usersTable" class="table table-striped table-bordered nowrap" style="width:100%">
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

<script src="{{asset("js/users.js")}} " ></script>
<script src="{{asset("js/appcess-defs.js")}} " ></script>

<script>

    $(document).ready(function() { 
        

        cuposYEntradasTable = $('#usersTable').DataTable( {
        "scrollX": true,
        "ajax": {
            "url": "/getDepartmentssall",
            "type": "GET",
            "datatype": "json"
        },

        columns: [
            { data: "id" ,visible: false },
            { data: "area_id" ,visible: false },
            { data: "nombre" , "title" : "Nom" },
           
            { "defaultContent": "  <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'></a>     <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectDelete'>      </a>  ", "title" : "" , "width":"10%"}  ,              
        ],

        "language": tablesLang

    } );        


   


        $('#usersTable').on('click', '#selectEdit', function (e) {

            e.preventDefault();  
            var currentRow = $(this).closest("tr");
            var data = $('#usersTable').DataTable().row(currentRow).data();
   
            editUser(data)

        });    

        $('#usersTable').on('click', '#selectDelete', function (e) {

            e.preventDefault();  
            var currentRow = $(this).closest("tr");
            var data = $('#usersTable').DataTable().row(currentRow).data();

            deleteDepartment( data )

        });            

        crearListaAreas();
        crearListaDepartamentos(0)


    });





function crearListaAreas() {

        axios.get('/areas')
                .then(response => {
   
                if (response.data.success) {
                        
                    response.data.data.forEach(area => {
                        
                        $('<option>', {
                            value: area.id,
                            text:  area.nombre,
                        }).appendTo('#areaslist');

                        $('<option>', {
                            value: area.id,
                            text:  area.nombre,
                        }).appendTo('#areaslistModal');
                        
                    });
                
                    areasListChange()

                } else {
                
                }

        })
        .catch( function (error) {

        });    

}


function crearListaDepartamentos(id) {


axios.get('/departments/'+id)
        .then(response => {
     
             
        if (response.data.data) {
            
            $("#departmentslist").find('option')
                .remove()
                .end();

            $("#departmentlistModal").find('option')
                .remove()
                .end();       
                
                $('<option>', {
                    value: 0,
                    text:  "Selecció de departament",
                }).appendTo('#departmentlistModal');

            response.data.data.forEach(department => {
                
                $('<option>', {
                    value: department.id,
                    text:  department.nombre,
                }).appendTo('#departmentslist');

                $('<option>', {
                    value: department.id,
                    text:  department.nombre,
                }).appendTo('#departmentlistModal');
                
            });
        
            areasListChange()

        } else {
        
        }

})
.catch( function (error) {

});    

}


function areasListChange() {
    
    var table = $('#usersTable').DataTable();
        var myAreaValue = $('#areaslist').val();
    
        var filteredData = table
            .column( 1 )
            .search("^" + myAreaValue + "$", true, false, true)
            .draw();


}


function filtrarDepartamentos() {

            // filtrado tabla por departamento
        var table = $('#usersTableUsuariosSistema').DataTable();
        var myAreaValue = $('#myArea').val();
    
        var filteredData = table
            .column( 1 )
            .search("^" + myAreaValue + "$", true, false, true)
            .draw();

}

</script>    

@endsection