@extends('layouts.appcess_main_layout')

@section('breadcrumbs')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h3>CONFIG DATA</h3>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/home">
                            <i class="feather icon-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">IMPORTAR DATOS</a></li>
                 
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
             
                            <h3>Pruebas</h3>
             
                        <form action="{{route('users.import.excel')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            

                            @if(Session::has('message'))
                                <p>{{Session::get('message')}}</p>
                            @endif
                            <br>

                            <input type="file" name="file">
                            <button class="btn btn-primary">Importar bans</button>
                        </form>
                        </div>
                </div>
            </div>
        </div>
    </div>

   


@endsection 


@section('scripts')

<script>
  
</script>    
    
@endsection