@extends('layouts.appcess_main_layout')

@section('breadcrumbs')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h3 tkey="dashboard__peticiones__header">PETICIONS</h3>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{Session::get('myhome') }}">
                            <i class="feather icon-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#"  tkey="dashboard__peticiones__bc">LLISTAT PETICIONS</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
    
@endsection
    
@section('content')

<div class="row">

    <div class="col-xl-2 col-md-4">
        <div class="card  o-hidden bg-c-yellow web-num-card">
            <div class="card-block text-white text-center">
                <h5 class="m-t-15">Pendents</h5>
                <h3 class="m-b-15"> <span id="numPeticionsPendents">0</span> </h3>
            </div>
        </div>
    </div>

    <div class="col-xl-2 col-md-4">
        <div class="card  o-hidden bg-c-blue web-num-card">
            <div class="card-block text-white text-center">
                <h5 class="m-t-15">Autoritzades</h5>
                <h3 class="m-b-15"> <span id="numPeticionsAutoritzades">0</span> </h3>
            </div>
        </div>
    </div>


    <div class="col-xl-2 col-md-4">
        <div class="card  o-hidden bg-c-red web-num-card">
            <div class="card-block text-white text-center">
                <h5 class="m-t-15">Cancel.lades</h5>
                <h3 class="m-b-15"><span id="numPeticionsCancelades">0</span></h3>
            </div>
        </div>
    </div>

    <div class="col-xl-2 col-md-4">
        <div class="card  o-hidden bg-viber web-num-card">
            <div class="card-block text-white text-center">
                <h5 class="m-t-15">Modificades</h5>
                <h3 class="m-b-15"><span id="numPeticionsModificades">0</span></h3>
            </div>
        </div>
    </div>

    <div class="col-xl-2 col-md-4">
        <div class="card   o-hidden bg-c-green web-num-card">
            <div class="card-block text-white text-center">
                <h5 class="m-t-15">Enviades</h5>
                <h3 class="m-b-15"><span id="numPeticionsTotals">0</span></h3>
            </div>
        </div>
    </div>                         
    
    <div class="col-xl-2 col-md-4">
        <div class="card  bg-dashboard-btn-blue  o-hidden bg-c-green web-num-card">
            <div class="card-block text-white text-center">
                <h5 class="m-t-15"> Total departament </h5>
                <h3 class="m-b-15"><span id="numPeticionsTotalsDepartament"> &nbsp; 0</span></h3>
            </div>
        </div>
    </div>                   
    </div>

    <hr>
    <div class="row">
        <div class="col">
            <button class="btn btn-primary">Filtre avançat</button>
        </div>
    </div>
    <hr>

<div class="row">
    <div class="col">
        <a href="{{route('newinvitation')}}" class="btn btn-primary mb-3" >Nova petició</a>
        
    </div>                            
</div>
<div class="row">
    <div class="col">
        
        <table id="myEventSelectTable" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                {{-- <tr>
                    <th width="10px;">Estat</th>
                    <th width="10px;">Codi</th>
                    <th width="10px;">Data petició</th>
                    <th width="10px;">Competició</th>
                    <th>Nombre evento</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th width="10px;">Num</th>
                    <th width="10px;">Preu</th>
                    <th>Zona</th>
                    <th>En nom de</th>
                    <th width="10px;">&nbsp;</th>
                </tr> --}}
            </thead>
            <tbody></tbody>
        </table>           
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
        var isEdit = true;
        var oldValueCantidad = 0;
        
        userDepartmentID = {{ Auth::user()->department_id }};
        userDepartmentName = '{{Auth::user()->dep}}';

        userID =  {{Auth::user()->id}};
        userName = '{{Auth::user()->name}}';


    
    myUserID =  {{ Auth::user()->id }};

    departamentonuevo = {{Auth::user()->department->id}}

    var home_peticiones = true;
</script>    

<script src="{{asset("js/peticiones-old.js")}} " ></script>
    
@endsection