@extends('layouts.appcess_main_layout')

@section('breadcrumbs')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h3  tkey="dashboard__peticiones__header">PETICIONS</h3>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href=" {{Session::get('myhome') }} ">
                            <i class="feather icon-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{Session::get('myhome') }}" tkey="dashboard__peticiones__bc">LLISTAT PETICIONS</a></li>
                    <li class="breadcrumb-item"><a href="#">NUEVA PETICIÓN</a></li>                    
                </ul>
            </div>
        </div>
    </div>
</div>
    
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <h6>ACTIVITAT</h6>
                                <select name="myActivity"  class="form-control" id="myActivity" onchange="myActivitySelectChange()">
                            
                                </select>
                            </div>
                     
                            <div class="col-md-4 col-12">
                                <h6>TIPOLOGIA D'ESDEVENIMENT</h6>
                                <select name="myType"  class="form-control" id="myType" onchange="myActivityTypeSelectChange()">
                                    <option value="0">Tots</option>
                                    <option value="1">Lliga</option>
                                    <option value="3">Champions</option>
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
                <h4>LLISTAT DESDEVENIMENTS</h4>
                <hr>
                <div class="row">
                    <div class="col">
                        <a href="{{ Session::get('myhome')  }}" class="btn btn-primary mb-3" >Veure peticions</a>
                    </div>                            
                </div>                
            </div>
            
            <div class="card-body">
                <table id="myEventSelectTable" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead></thead>
            
                    <tbody></tbody>
                </table>                    
            </div>
        </div>
    </div>
</div>    

@include('invitation.partials.order-modal')
@include('invitation.partials.order-modal-asistentes')
@include('invitation.partials.order-modal-peticion-resumen')

@endsection 

@section('scripts')

    <script>
        var userDepartmentID;
        var userID;
        var userName;
        var userDepartmentName;
        var isEdit = false;
        var oldValueCantidad = 0;
        
        userDepartmentID = {{ Auth::user()->department_id }};
        userDepartmentName = '{{Auth::user()->dep}}';

        userID =  {{Auth::user()->id}};
        userName = '{{Auth::user()->name}}';
        
        var home_peticiones = false;

        crearListaActividades() 
     




        function myActivitySelectChange() {
              filterEvents();
         }

         function myActivityTypeSelectChange() {
              filterEvents();
    }         

         function filterEvents() {

        // filtrado tabla 
        var table = $('#myEventSelectTable').DataTable();

        var myActivitySearch = $('#myActivity').val();
        var myActivitTypeSearch = $('#myType').val();

            if (myActivitTypeSearch == 0) {
                    myActivitTypeSearch = '';
            }

                var filteredData = table
                .column( 0 )
                .search("^" + myActivitySearch + "$", true, false, true)
                .column( 4 )
                .search( myActivitTypeSearch , true, false, true)
                .draw();
        
        
        }



        function crearListaActividades() {

        axios.get('/getActividadsall')
                .then(response => {

                if (response.data.success) {
                        
                    response.data.data.forEach(actividad => {
                        
                        $('<option>', {
                            value: actividad.id,
                            text:  actividad.name,
                        }).appendTo('#myActivity');

                        
                    });       

                    myActivitySelectChange()

                } else {
                
                }

        })
        .catch( function (error) {

        });    

        }




    </script>

    <script src="{{asset('js/peticiones-old.js')}}" ></script>
    
@endsection