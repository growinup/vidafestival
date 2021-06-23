@extends('layouts.appcess_main_layout')


@section('breadcrumbs')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    
                    <h3>AUTORIZAR PETICIONES</h3>
                    {{-- <h5 class="m-b-10">Dashboard</h5> --}}
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

    <!-- web statustic card start -->
    <div class="col-xl-2 col-md-6">
        <div class="card o-hidden bg-c-yellow web-num-card">
            <div class="card-block text-white text-center">
                <h5 class="m-t-15">Pendents</h5>
                <h3 class="m-b-15"> <span id="numPeticionsPendents"></span> </h3>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6">
        <div class="card o-hidden bg-c-blue web-num-card">
            <div class="card-block text-white text-center">
                <h5 class="m-t-15">Autoritzades</h5>
                <h3 class="m-b-15"><span id="numPeticionsAutoritzades"></span></h3>
            </div>
        </div>
    </div>

    <div class="col-xl-2 col-md-6">
        <div class="card o-hidden bg-c-red web-num-card">
            <div class="card-block text-white text-center">
                <h5 class="m-t-15">Cancel.lades</h5>
                <h3 class="m-b-15"><span id="numPeticionsCancelades"></span></h3>
            </div>
        </div>
    </div>

    <div class="col-xl-2 col-md-6">
        <div class="card  o-hidden bg-viber web-num-card">
            <div class="card-block text-white text-center">
                <h5 class="m-t-15">Modificades</h5>
                <h3 class="m-b-15"><span id="numPeticionsModificades">0</span></h3>
            </div>
        </div>
    </div>                                


    <div class="col-xl-2 col-md-6">
        <div class="card  o-hidden bg-dashboard-btn-blue web-num-card">
            <div class="card-block text-white text-center">
                <h5 class="m-t-15">Total Àrea</h5>
                <h3 class="m-b-15"><span id="numPeticionsTotalArea">0</span></h3>
            </div>
        </div>
    </div>     


    </div>

    

    @include('invitation.partials.order-modal-peticion-ver-autorizador')
    @include('invitation.partials.order-modal-autorizador-modificar')
    @include('invitation.partials.order-modal-autorizador-cancelar')

    @include('invitation.partials.order-modal-logistica-asignar')
    @include('invitation.partials.order-modal-logistica-asignar-enviar')
   
    <hr>
    <div class="row">
        <div class="col">
            <button class="btn btn-primary">Filtre avançat</button>
        </div>
    </div>
    <hr>

<div class="row">
    <div class="col">
        
        <table id="myEventSelectTable" class="table table-striped table-bordered  nowrap" style="width:100%">
            <thead>
                {{-- <tr>
                    <th width="10px;" style="font-size:12px">Estat</th>
                    <th width="10px;" style="font-size:12px">Codi</th>
                    <th width="10px;" style="font-size:12px">Data petició</th>
                    <th width="10px;" style="font-size:12px">Activitat</th>
                    <th width="10px;" style="font-size:12px">Nombre evento</th>
                    <th width="10px;" style="font-size:12px">Data</th>
                    <th width="10px;" style="font-size:12px">Hora</th>
                    <th width="10px;" style="font-size:12px">Quant</th>
                    <th width="10px;" style="font-size:12px">Preu</th>
                    <th width="10px;" style="font-size:12px">Zona</th>
                    <th width="10px;" style="font-size:12px">Departament</th>
                    <th width="10px;" style="font-size:12px">Peticionari</th>
                    <th width="10px;" style="font-size:12px">En nom de</th>
                    <th width="10px;" style="font-size:12px">&nbsp;</th>

                </tr> --}}
            </thead>
    
            <tbody></tbody>
    
                                                                
        </table>           

    </div>
</div>

@endsection




@section('scripts')


<script>   
    
    var isAutorizador = true;
    var isLogistica = false;
    var myBrowserUploadUrl = "{{route('upload', ['_token' => csrf_token() ])}}";

    userID =  {{Auth::user()->id}};
    userName = '{{Auth::user()->name}}';

</script>    

<script src="{{asset('ckeditor/ckeditor.js')}}"></script>

<script src="{{asset("js/peticiones-autorizador-logistica.js")}} " ></script>
    
@endsection