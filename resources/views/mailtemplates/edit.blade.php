@extends('layouts.appcess_main_layout')


@section('breadcrumbs')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
                <div class="col-md-12">
                <div class="page-header-title">
                    <h3 id="headerTitle">EDICIÓ PLANTILLA</h3>
                </div>
                          <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{Session::get('myhome') }}">
                            <i class="feather icon-home"></i>
                        </a>
                    </li>
                    
                <li class="breadcrumb-item"><a href="{{route('listadoplantillas')}}">LLISTAT PLANTILLES</a></li>
                    <li class="breadcrumb-item" id="breadcrumbTitle"><a href="#">EDITAR PLANTILLA</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
    
@endsection



@section('content')

<script>
        
    myPlantillaId =  '{{$template->id ?? '' }}'
    tipoEdicion  =  '{{$edicion ?? ''}}'


</script>



<div class="card">
    <div class="card-header">
        <h4>PLANTILLA </h4>
     
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-3">
                <select class="form-control" name="myLanguageSelect" id="myLanguageSelect">
                    <option value="1">Castellà</option>
                </select>
            </div>

            <div class="col-3">
                <select class="form-control" name="mySelectActivity" id="mySelectActivity">
                    <option value="1">Futbol</option>
                </select>
            </div>
            <div class="col-3">
                <select class="form-control" name="mySelectActivityType" id="mySelectActivityType">
                    <option value="1">Lliga</option>
                    <option value="3">Champions</option>
                </select>
            </div>

            <div class="col-3">
                <select class="form-control" name="mySelectInvitationType" id="mySelectInvitationType">
                    <option value="1">Invitació</option>
                    <option value="2">Compra</option>
                    <option value="3">Passis</option>
                </select>
            </div>

        </div>
        <br>
        <div class="form-group">
            <label for="templatename">Nom de la plantilla</label>
            <input type="text" name="templatename" id="templatename" class="form-control">
        </div>

        <div class="form-group">
            <label for="templatename">Assumpte</label>
            <input type="text" name="templatesubject" id="templatesubject" class="form-control">
        </div>


        <textarea class="form-control" rows="20" name="myeditor" id="myeditor" ></textarea>

        <br>

        <div class="row">

            <div class="col">

                <form action="{{route('listadoplantillas')}}">
                    <button  class="btn btn-primary float-left">Tornar al llistat</button>
                </form>

                <button onclick="saveTemplate()" class="btn btn-primary float-right">Guardar plantilla</button>
            </div>
        </div>

    </div>
</div>
    



@endsection




@section('scripts')

<script src="{{asset("js/email-templates.js")}} " ></script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>

<script>

    var listaIdiomas;

    var EDITOR = CKEDITOR.replace( 'myeditor', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
        height: 500
    });
    
    CKEDITOR.config.language = 'ca';  
    CKEDITOR.config.removePlugins = 'about';

    $(document).ready(function() { 
        
        crearListaIdiomas()

        getTemplate()

        if (tipoEdicion == '') {
            $('#headerTitle').text('NOVA PLANTILLA')
            $('#breadcrumbTitle').text('NOVA PLANTILLA')

        }

        if (tipoEdicion == 1) {
            $('#headerTitle').text('NOVA PLANTILLA')
            $('#breadcrumbTitle').text('NOVA PLANTILLA')
        }        

        if (tipoEdicion == 2) {
            $('#headerTitle').text('EDICIÓ PLANTILLA')
            $('#breadcrumbTitle').text('EDITAR PLANTILLA')
        }        

    });
    

     function getTemplate() {

        axios.get('/gettemplatebyid/' + myPlantillaId)

        .then(response => {
            if (response.data) {

                
                // $('#templatesubject').val(myContent.subject);
                let myContent = response.data.template[0].content;
                let myName = response.data.template[0].name;
                let mySubject = response.data.template[0].subject;

                let myLangId = response.data.template[0].language_id;
                let myActivityId = response.data.template[0].activity_id;
                let myActivityTypeId = response.data.template[0].activity_type_id;
                let myInvitationTypeId  = response.data.template[0].invitation_type_id; 

                setTimeout( function () {
                    CKEDITOR.instances['myeditor'].setData( myContent );
                
                },500);
            

                
                 if (tipoEdicion == 1) {
                    
                    $('#templatename').val (myName);
                    $('#templatesubject').val (mySubject);

                    
                    $('#myLanguageSelect').val (myLangId);
                    $('#mySelectActivity').val (myActivityId);
                    $('#mySelectActivityType').val (myActivityTypeId);
                    $('#mySelectInvitationType').val (myInvitationTypeId);
                    
                 }

                 if (tipoEdicion == 2) {
                     
                     $('#templatename').val (myName);
                     $('#templatesubject').val (mySubject);
     
                     $('#myLanguageSelect').val (myLangId);
                     $('#mySelectActivity').val (myActivityId);
                     $('#mySelectActivityType').val (myActivityTypeId);
                     $('#mySelectInvitationType').val (myInvitationTypeId);                     
     

                 }

            } else {

            }

        })
        .catch(function (error) {

        });
    }


</script>    

@endsection