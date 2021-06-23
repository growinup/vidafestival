@extends('layouts.appcess_main_layout')

@section('breadcrumbs')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
                <div class="col-md-12">
                <div class="page-header-title">
                    <h3>ESDEVENIMENTS</h3>
                </div>
                          <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{Session::get('myhome') }}">
                            <i class="feather icon-home"></i>
                        </a>
                    </li>
                    
                    <li class="breadcrumb-item"><a href="/events/show">LLISTAT ESDEVENIMENTS</a></li>
                    <li class="breadcrumb-item"><a href="#">EDITAR ESDEVENIMENT</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
    
@endsection

@section('content')

    <script>
        
        var firstTime = true;
        var nivelAutorizacion;

        myEventID =  '{{$event->id}}';
             
        myUbicacionValue =  '{{$event->ubicacion_id}}';
        myActivityValue =  '{{$event->activity_id}}';
        myTypeValue =  '{{$event->type_id}}';
        myFechaNoConfirmadaValue = '{{$event->not_confirmed_date}}';

        nivelAutorizacion = '{{$event->level}}'; 
    
        modalidadCupo = '{{$event->tipo_cupo}}';
        var initModalidadCupo = '{{$event->tipo_cupo}}';
       
    </script>
    @include('events.partials.template-editor')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-3">
                        <div class="col-4">
                            <h6>UBICACIÓ</h6>
                            <select name="myUbicacion" class="form-control" id="myUbicacion" onchange="myLocationSelectChange()">
                                <option value="1">Camp Nou</option>
                            </select>
                        </div>

                        <div class="col-md-4 col-12">
                            <h6>ACTIVITAT</h6>
                            <select name="myActivity" class="form-control" id="myActivity" onchange="selectActividadChange()">
                            
                            </select>
                        </div>

                        <div class="col-md-4 col-12">
                            <h6>TIPOLOGIA ESDEVENIMENT</h6>
                            <select name="myType"  class="form-control" id="myType" onchange="selectTipoActividadChange()">
 
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
                <h4>DADES DE L'ESDEVENIMENT </h4>
                <hr>
                <div class="row">
                    <div class="col-6">

                        <div class="form-group row">
                            <label for="myNombreEvento" class="control-label col-sm-12 col-md-12 col-lg-4">Nombre evento</label>
                            <div class="col-sm-12 col-lg-8">
                                <input type="text" class="form-control" id="myNombreEvento" name="myNombreEvento" placeholder="" value="{{$event->nombre}}">
                            </div>                                           
                        </div>                        

                    </div>

                    <div class="col-6">
    
                        <div class="form-group row">
                            <label for="myFechaEvento" class="control-label col-sm-6 col-md-3">Data</label>
                            <div class="col-sm-6 col-md-3">
                            <input type="text" class="form-control" id="myFechaEvento" name="myFechaEvento" placeholder="" value="{{$event->fecha}}">
                            </div>                                           
       
                            <label for="myHoraEvento" class="control-label col-sm-6  col-md-3">Hora</label>
                            <div class="col-sm-6  col-md-3">
                                <input type="text" class="form-control" id="myHoraEvento" name="myHoraEvento" placeholder="" value="{{$event->hora}}">
                            </div>            
                        </div>            
                        
                        <div class="row" >
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="myFechaNoConfirmada">
                                <label class="custom-control-label" for="myFechaNoConfirmada">Data no confirmada</label>
                            </div>
                        </div>

                    </div>
                </div>
                
                  
                <div class="row">
                    <div class="col-5">

                        <div class="form-group row">
                            <label for="myJornadaEvento" class="control-label col-sm-3">Jornada</label>
                            <div class="col-sm-3">
                            <input type="text" class="form-control" id="myJornadaEvento" name="myJornadaEvento" placeholder="" value="{{$event->jornada}}">
                            </div>         
                            
                            <div class="d-none">

                                <label for="myAforoEvento" class="control-label col-sm-3">Aforo</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="myAforoEvento" myAforoEvento="myAforoEvento" placeholder="" value="{{$event->id_aforo}}">
                                </div>        
                                
                            </div>

                        </div>                        
                    </div>


                    <div class="col-5">

                        <div class="form-group row">
        
                            <label for="myNivelAforo" class="col-sm-4 col-md-3">Nivell</label>
                            <div class="col-sm-4 col-md-5 " >
                                <select name="myNivellCmb"   class="form-control" id="myNivellCmb">
                                    <option value="0" >Sense autorització</option>
                                    <option value="1" selected >Autorització</option>
                                    <option value="2" >Doble autorització</option>
                                </select>
                            </div>
                      
                        </div>                        
                    </div>                    

                </div>
                <div class="row">
                    <div class="col-12">
                   
                        <div class="form-group row">

                                <select data-placeholder="Afegir tipus d'invitació..." name="myTipoInvitacion" multiple   id="myTipoInvitacion">
                                    <option value=""></option>>
                                    <option value="1" >Invitación</option>
                                    <option value="2" >Compra</option>
                                    <option value="3" >Passis</option>
                                </select>

                        </div>
                      
                    </div>                        
                    
                </div>
               
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>ENTRADES I CUPOS </h4>
                <hr>

                <div class="row mb-3">
                    <div class="col-4">
                        <h6>SECTOR</h6>
                        <select name="mySector" onchange="filterZoneSector()"  class="form-control" id="mySector">
                            <option value="0" disabled>Selección de sector</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table id="cuposyentradas" class="table table-striped table-bordered nowrap" style="width:100%">
                            <thead></thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary float-right">
                            Actualitzar
                        </button>
                    </div>
                </div>
            </div>
        </div>        


        <div class="card">
            <div class="card-header">
                <h4>CUPO PER DEPARTAMENT </h4>
                <hr>

                <div class="row mb-3">
                    <div class="col-4">

                        <h6>SELECCIÓ DE MODALITAT</h6>
                        <select name="myCupoType" onchange="seleccionModalidadCupo()"  class="form-control" id="myCupoType">
                            <option value="1">Cupo genéric</option>
                            <option value="2">Cupo per departament i zona</option>                            
                        </select>
        
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">

                        <h6>ÁREA</h6>
                        <select name="myArea" onchange="filterDepartmentZones()" class="form-control" id="myArea">
                        </select>
                    </div>

                    <div class="col-4" id="mySector2Div">
                        <h6>SECTOR</h6>
                        <select name="mySector2"  onchange="filterDepartmentZones()" class="form-control" id="mySector2">
                        </select>
                    </div>                    
                </div>



                
                <div class="row" id="testTablaCuposGenerico">
                    <div class="col">
                        <table id="cuposdepartamentosgenerico" class="table table-striped table-bordered nowrap" style="width:100%">
                            <thead>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

                     
                <div class="row" id="testTablaCupos" >
                    <div class="col">
                        <table id="cuposdepartamentos" class="table table-striped table-bordered nowrap" style="width:100%">
                            <thead></thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>          
                
                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary float-right">
                            Actualitzar
                        </button>
                    </div>
                </div>

            </div>
     
        </div>        

        <div class="card">
            <div class="card-header">
                <h4>PLANTILLA </h4>
             
            </div>

            <div class="card-body">

                <!-- selector idioma -->
                <div class="row">
                    <div class="col-5">
                        <label for="myIdiomaPlantilla">Idioma de les plantilles</label>
                        <select name="myIdiomaPlantilla" class="form-control" id="myIdiomaPlantilla" onchange="cambioSelectIdiomas()">
                                <option value="1">Castellà</option>
                                <option value="2">Català</option>
                        </select>
                    </div>
                </div>
                    <hr>
                <!-- selector por cada tipo de invitacion -->

                <div class="row">
                    <div class="col-4">
                    <label for="myPlantillaInvitacion">Plantilles d'invitació</label>
                        <select name="myPlantillaInvitacion" class="form-control" id="myPlantillaInvitacion" onchange="myPlantillaInvitacionChange()">
                                <option value="0">Sense plantilla</option>  
                        </select>
                        <hr>
                        <div class="text-center">
                            <button class="btn btn-primary" onclick="showTemplateEditor(1)">Editar plantilla</button>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="myPlantillaCompra">Plantilles compra</label>
                        <select name="myPlantillaCompra" class="form-control" id="myPlantillaCompra" onchange="myPlantillaCompraChange()">
                                <option value="0">Sense plantilla</option>
                        </select>
                        <hr>
                        <div class="text-center">
                            <button class="btn btn-primary"  onclick="showTemplateEditor(2)">Editar plantilla</button>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="myPlantillaPases">Plantilles passis</label>
                        <select name="myPlantillaPases" class="form-control" id="myPlantillaPases" onchange="myPlantillaPasesChange()">
                                <option value="0">Sense plantilla</option>
                        </select>
                        <hr>
                        <div class="text-center">
                            <button class="btn btn-primary"  onclick="showTemplateEditor(3)">Editar plantilla</button>
                        </div>
                    </div>                                        
                </div>

            </div>
        </div>        


        <div class="card d-none">
            <div class="card-header">
                <h4>GESTIÓ USUARIS </h4>
             
            </div>

            <div class="card-body">

                <hr>
                <div class="row">
                    <div class="col-3">
                        <button type="button" class="btn btn-primary waves-effect m-b-10 float-left mt-3">Peticionaris</button>                                                            
                    </div>

                    <div class="col-3">
                        <button type="button" class="btn btn-primary waves-effect m-b-10 float-left mt-3">Autoritzadors</button>                                                            
                    </div>

                </div>
          
            </div>
        </div>        

        <div class="card">
            <div class="card-header">
                
                <button type="button" onclick="window.location.href='/events/show'" class="btn btn-primary waves-effect m-b-10 float-left">Tornar al llistat</button>                                                            
                <button type="button" onclick="actualizarEvento()" class="btn btn-success waves-effect m-b-10 float-right">Actualitzar esdeveniment</button>                                                            
            </div>
        </div>        

    </div>
    </div>    




@endsection 


@section('scripts')

<script src="{{asset('ckeditor/ckeditor.js')}}"></script>

<script>



var EDITOR = CKEDITOR.replace( 'myeditor', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
        // filebrowserImageBrowseUrl : '/uploads/',
        height: 500
    });
    
    CKEDITOR.config.language = 'ca';  
    CKEDITOR.config.removePlugins = 'about';
  var runFirstTime = true;
  var myEventID;
  var myTypeValue;
  var myUbicacionValue;
  var myActivityValue;
  var myTypeValue;
  var myFechaNoConfirmadaValue;

  var mySectorEntradasyCupos=2;
  var arr = [];
  var cuposYEntradasTable;
  var myTableCuposZonas;
  var myTableCuposDepartamentoGenerico;

  var myZonas;
  var zoneList = [];
  var zoneBySector = [];

  var myDepartments;
  var modalidadCupo;

  var listaIdiomas = [];

  var plantillaObj = {};

  var listadoCompletoPlantillas = [];
  var detallePlantilla = {}

  var listadoPlantillas = [];
  var plantillaEdicion;

var dataSetDepartamentos = [];

var idiomaPlantillaActualizar;
var contenidoPlantillaActualizar;
var asuntoPlantillaActualizar;
var tipoPlantillaActualizar;
var idPlantillaActualizar;


    $(document).ready(function() {

        crearListaLocations() 
        crearListaActividades() 
        crearListaTiposActividad()

        $('#myFechaNoConfirmada').on("click", function () {

        if ($('#myFechaNoConfirmada').is(":checked")) {
            $('#myFechaEvento').prop("disabled", true);
       } else {
        $('#myFechaEvento').prop("disabled", false);
       }

    });

    var str_array = [];

    str_array.push(1);
    str_array.push(2);
    str_array.push(3);

    $("#myTipoInvitacion").val(str_array).trigger("chosen:updated");


    $("#myNivellCmb").val(nivelAutorizacion);
    

    mySectorEntradasyCupos = $('#mySector').val();

        var editor1; 

        editor1 = new $.fn.dataTable.Editor( {
        table: "#cuposyentradas",
        idSrc:  'id',
        fields: [
            { name: "nombre" },
            
            { name: "cupo", 
                attr: {
                    type: 'number'
                }},
            { name: "price",
                attr: {
                    type: 'number'
                } },
        ]
        } );

        // Activate an inline edit on click of a table cell
        $('#cuposyentradas').on( 'click', 'tbody td:not(:first-child)', function (e) {
            editor1.inline( this );
        } );

        editor1.on( 'preSubmit', function ( e, o, action ) {
     
            var validarCupo = this.field( 'cupo' );
            var validarPrecio = this.field( 'price' );

    
            var myNumber = validarCupo.val() ;
            var myPrice = validarPrecio.val() ;
           
            
            if ( isNaN(myNumber) || (myNumber.length == 0) ) {
                validarCupo.error( 'El número no es correcte' );
            }

            if ( isNaN(myPrice) || (myPrice.length == 0) ) {
                validarPrecio.error( 'El número no es correcte' );
            }

                if ( this.inError() ) {
                return false;
            }
    } );


    cuposYEntradasTable = $('#cuposyentradas').DataTable( {
        "scrollX": true,
        "ajax": {
            "url": "/eventzone/" + myEventID ,
            "type": "GET",
            "datatype": "json"
        },

        columns: [
            { data: "id" ,visible: false },
            { data: "sector_id" ,visible: false },
            { data: "nombre" , "title" : "Nom" },
            { data: "cupo"   , "title" : "Cupo" , "width":"10%"},
            { data: "price"  , visible:false, "title" : "Preu" , "width":"10%" ,
        
            render: $.fn.dataTable.render.number( ',', '.', 0, '',' €' ) },
        ],

        "language": tablesLang

    } );


    // tabla cupo generico por departamento

    var editor2; 

    editor2 = new $.fn.dataTable.Editor( {
    table: "#cuposdepartamentosgenerico",
    idSrc:  'id',
    fields: [
        { name: "nombre" },
        
        { name: "cupo", 
            attr: {
                type: 'number'
            }},
    
    ]
    } );

    // Activate an inline edit on click of a table cell
    $('#cuposdepartamentosgenerico').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor2.inline( this );
    } );

    editor2.on( 'preSubmit', function ( e, o, action ) {

        var validarCupo = this.field( 'cupo' );
        var myNumber = validarCupo.val() ;
        
        if ( isNaN(myNumber) || (myNumber.length == 0) ) {
            validarCupo.error( 'El número no es correcte' );
        }

            if ( this.inError() ) {
            return false;
        }
    } );    

     myTableCuposDepartamentoGenerico = $('#cuposdepartamentosgenerico').DataTable( {
        "scrollX": true,
        "ajax": {
            "url": "/eventdepartmentgeneric/" + myEventID ,
            "type": "GET",
            "datatype": "json"
        },
  
        columns: [
            { data: "id" ,visible: false },
            { data: "area_id" ,visible: false },
            { data: "nombreDepartamento" , "title" : "Departament" },
            { data: "cupo"   , "title" : "Cupo" , "width":"10%"},
         
        ],

        "language": tablesLang

    } );


    
 
    crearListaSectores();    
    crearListaSectoresCuposDepartamento();
 
    crearListaAreas();
      
    initCupoZoneDepartment();


    crearListaIdiomas();
    

    setTimeout( function () {

        $('#myUbicacion').val( myUbicacionValue );
        $('#myActivity').val( myActivityValue );
        //$('#myType').val( myTypeValue );
        
        selectActividadChange(myActivityValue)
        
    },2000);

    setTimeout( function () {
        $('#myType').val( myTypeValue );
        selectTipoActividadChange()
    },3000);    

    
    var activeCheckboxFechaNoConfirmada;
    if (myFechaNoConfirmadaValue == 0) {
        activeCheckboxFechaNoConfirmada = false
    } else {
        activeCheckboxFechaNoConfirmada = true;
    }
    $('#myFechaNoConfirmada').attr('checked', activeCheckboxFechaNoConfirmada);
    
       if ($('#myFechaNoConfirmada').is(":checked")) {
            $('#myFechaEvento').prop("disabled", true);
       } else {
        $('#myFechaEvento').prop("disabled", false);
       }

   seleccionModalidadCupo();
  
    $('#myFechaEvento').mask('99/99/9999');

    // end document ready
} );





// --------------------- inicio funciones

function crearListaLocations() {

axios.get('/getLocationsall')
        .then(response => {

        if (response.data.success) {
                
                $("#myUbicacion").find('option')
                .remove()
                .end();

            response.data.data.forEach(location => {
                
                $('<option>', {
                    value: location.id,
                    text:  location.nombre,
                }).appendTo('#myUbicacion');

                
            });       
            myLocationSelectChange()
        } else {
        
        }

})
.catch( function (error) {

});    

}    



function crearListaActividades(locationId) {


    axios.get('/getActividadsall')
            .then(response => {

                
            if (response.data.success) {


                $("#myActivity").find('option')
                        .remove()
                        .end();
                    
                response.data.data.forEach(actividad => {
                    
                    if (actividad.location_id == locationId) {

                        $('<option>', {
                            value: actividad.id,
                            text:  actividad.name,
                        }).appendTo('#myActivity');

                    }
                    
                });       

            } else {
          
            }

        })
        .catch( function (error) {

        });    

}


function crearListaTiposActividad(myactivityId) {

axios.get('/getTipoActividadsall')
        .then(response => {

        if (response.data.success) {
                                
                $("#myType").find('option')
                .remove()
                .end();

          

            response.data.data.forEach(activitytype => {
                


                if (activitytype.activity_id == myactivityId) {

                    $('<option>', {
                        value: activitytype.id,
                        text:  activitytype.name,
                     }).appendTo('#myType');

                }                        
                
            });       
         
        } else {
        
        }

})
.catch( function (error) {

});    

}    






function myLocationSelectChange() {
        var myLocationToFilter =$("#myUbicacion").val()
        crearListaActividades(myLocationToFilter) 
}



function saveSelectedTemplate() {
    
    var content = CKEDITOR.instances['myeditor'].getData();
    var asuntomail = $('#templatesubject').val();

    var pos = listadoCompletoPlantillas.map(function(e) { return e.id; }).indexOf(plantillaEdicion.id);

    listadoCompletoPlantillas[pos].content = content;
    listadoCompletoPlantillas[pos].subject = asuntomail;

    closeAllModals();
}

function showTemplateEditor(templateType)
{
    // preguntar si queremos cargar el contenido Custom o el contenido de Catalogo


    let tipoTemplateToEdit = 2;
    
    let myEventTemplateCustom;
    let myEventSubjectCustom;
    let hasCustomTemplate = false;

    if (templateType == 1) {
        myEventTemplateCustom = $('#myPlantillaInvitacion').val() 
    }

    if (templateType == 2) {
        myEventTemplateCustom = $('#myPlantillaCompra').val() 
    }
    
    if (templateType == 3) {
        myEventTemplateCustom = $('#myPlantillaPases').val() 
    }



    axios.get('/geteventtemplatebyid/' + myEventID + '/' + myEventTemplateCustom)
        .then(response => {
            if (response.data.success) {
            
             myEventTemplateCustom = response.data.template[0]['content'];
             myEventSubjectCustom = response.data.template[0]['subject'];

             hasCustomTemplate = true;
                
            } else {
                
            }

        })
        .catch( function (error) {

        });    
    

        setTimeout(function () {

            // traer plantilla seleccionada
                
            if (templateType == 1) {
                    
                    let myValueSelected = $('#myPlantillaInvitacion').prop('selectedIndex');

                    let myLanguageSelected = $('#myIdiomaPlantilla').val();

                    if (myValueSelected > 0) {

                        let myValueSelected = ($('#myPlantillaInvitacion').val() );
                        
                        var myContent = listadoCompletoPlantillas.find(element => element.id == myValueSelected )
                        plantillaEdicion = myContent;
                        
                        if ( (tipoTemplateToEdit == 1) || (!hasCustomTemplate) ) {
                            $('#templatesubject').val(myContent.subject);
                            CKEDITOR.instances['myeditor'].setData( myContent.content );
                        } else {
                            $('#templatesubject').val(myEventSubjectCustom);
                            CKEDITOR.instances['myeditor'].setData( myEventTemplateCustom );
                        }
                        

                        $('#myModalTemplateEditor').modal('show'); 
                    }

                }
                
                if (templateType == 2) {
                    
                    let myValueSelected = $('#myPlantillaCompra').prop('selectedIndex');
                    let myLanguageSelected = $('#myIdiomaPlantilla').val();

                    if (myValueSelected > 0) {

                        let myValueSelected = ($('#myPlantillaCompra').val() );

                        var myContent = listadoCompletoPlantillas.find(element => element.id == myValueSelected )
                        plantillaEdicion = myContent;

                        if ( (tipoTemplateToEdit == 1) || (!hasCustomTemplate) ) {
                            $('#templatesubject').val(myContent.subject);
                            CKEDITOR.instances['myeditor'].setData( myContent.content );
                        } else {
                            $('#templatesubject').val(myEventSubjectCustom);
                            CKEDITOR.instances['myeditor'].setData( myEventTemplateCustom );
                        }

                        $('#myModalTemplateEditor').modal('show'); 
                    }

                }

                if (templateType == 3) {
                    
                    let myValueSelected = $('#myPlantillaPases').prop('selectedIndex');
                    let myLanguageSelected = $('#myIdiomaPlantilla').val();

                if (myValueSelected > 0) {

                    let myValueSelected = ($('#myPlantillaPases').val() );

                    var myContent = listadoCompletoPlantillas.find(element => element.id == myValueSelected )
                    plantillaEdicion = myContent;  
                        
                    if ( (tipoTemplateToEdit == 1) || (!hasCustomTemplate) ) {
                            $('#templatesubject').val(myContent.subject);
                            CKEDITOR.instances['myeditor'].setData( myContent.content );
                        } else {
                            $('#templatesubject').val(myEventSubjectCustom);
                            CKEDITOR.instances['myeditor'].setData( myEventTemplateCustom );
                        }

                        $('#myModalTemplateEditor').modal('show'); 
                    }

                }

        },700)
   
}

function closeAllModals() {
    $('#myModalTemplateEditor').modal('hide'); 
}

function filterZoneSector() {
    
    // filtrado tabla por departamento
    var table = $('#cuposyentradas').DataTable();
    var mySectorValue = $('#mySector').val();
 
    var filteredData = table
        .column( 1 )
        .search("^" + mySectorValue + "$", true, false, true)
        .draw();

}

function filterDepartmentZones() {

    if (modalidadCupo == 2) {

        // filtrado tabla por departamento
        var table = $('#cuposdepartamentos').DataTable();
        var myAreaValue = $('#myArea').val();
    
        var filteredData = table
            .column( 1 )
            .search("^" + myAreaValue + "$", true, false, true)
            .draw();
            

        // filtrado columnas zonas de cada sector    

        var mySectorValue = $('#mySector2').val();

        for (let i = 0; i < zoneBySector.length; i++) {
            var column = myTableCuposZonas.column( 3 + i);

            if (zoneBySector[i].sectorId == mySectorValue ) {
                column.visible( true );
            } else {
                column.visible( false );
            }
        }
    } else {
        // filtrado tabla por departamento
        var table = $('#cuposdepartamentosgenerico').DataTable();
        var myAreaValue = $('#myArea').val();
    
        var filteredData = table
            .column( 1 )
            .search("^" + myAreaValue + "$", true, false, true)
            .draw();
    }

}

function initCupoZoneDepartment() {
 
    axios.get('/eventdepartmentzone/' + myEventID)
            .then(response => {
                if (response.data) {
     
                        // cupos departamentos
                     
                        var len = response.data.data.length;
                         myZonas = response.data.zones;
                         myDepartments = response.data.departments;
                        
                        var myRow = {};
                        var myElement = {};
                        var myCountDept = 1;
                        var myCountZone = 1;
                        var zonaName = '';
                        
                        var myId = 1;

                        var initZones = 1;

                         response.data.data.forEach( function (element) {
                                  
                             if (initZones <= myZonas)
                             {
                                zoneList.push(element.nombreZona );

                                zoneBySector.push({
                                    sectorId: element.sector_id,

                                });
                             } 
                                 
                             myElement = {};
                             myElement.id = element.id;
                             myElement.area_id = element.area_id;
                             myElement.sector_id = element.sector_id;
                             myElement.cupo = element.cupo;
                             myElement.nombreZona = element.nombreZona;
                             myElement.nombreDepartamento = element.nombreDepartamento;
                             

                             zonaName = 'zona' + myCountZone;
                             myRow[zonaName] = myElement;

                             if (myCountZone == myZonas) {

                                myRow['myId'] = myId;
                                myRow['departamentoId'] = element.department_id;
                                myRow['areaId'] = element.area_id;
                                arr.push(myRow);

                                myRow ={};
                                myCountZone = 0;
                                myId++;
                             }
                 
                            myCountZone++;
                            initZones++;
                   
                        }
                        
                        );


                        var arrayColumns = [];

                        arrayColumns.push({ data: "zona1.id", visible:false },
                        );
                        arrayColumns.push({ data: "zona1.area_id", visible:false },
                        );

                        arrayColumns.push({
                            data: 'zona1.nombreDepartamento',title: 'Departament'
                        });

                        for (let i = 1; i <= myZonas; i++) {
                         
                            arrayColumns.push({
                                title: zoneList[i-1],
                                data: 'zona'+i+'.cupo'
                            });                            
                            
                        }

                        var myColumns = arrayColumns;

            var camposEdicion = [];
        
            for (let i = 1; i <= myZonas; i++) {
             camposEdicion.push(
                 {name: 'zona' + i + '.cupo' 
                }
                );
             }
            

         var editor; 

         editor = new $.fn.dataTable.Editor( {
         table: "#cuposdepartamentos",
         idSrc:  'myId',
         fields: camposEdicion
     } );
  
     // Activate an inline edit on click of a table cell
     $('#cuposdepartamentos').on( 'click', 'tbody td:not(:first-child)', function (e) {
         editor.inline( this );
     } );
         
     myTableCuposZonas  =  $('#cuposdepartamentos').DataTable( {
                          
                                data: arr,
                                columns: myColumns,

                                scrollX: true,

                                language: tablesLang

                            } );
                
                            filterDepartmentZones();

                            $('#myCupoType').val (initModalidadCupo);
       
                            seleccionModalidadCupo();
                } else {
                    
                }

            })
            .catch( function (error) {
    
            });    
}



function sectorEntradasyCuposChange() {
  
     filterZoneSector();
 
}

function seleccionModalidadCupo() {
    
    modalidadCupo  = $('#myCupoType').val();
    
    if (modalidadCupo == 2) {
        $('#mySector2Div').removeClass("d-none");
        $('#testTablaCupos').removeClass("d-none");
        $('#testTablaCuposGenerico').addClass("d-none");
    } else {
        $('#mySector2Div').addClass("d-none");
        $('#testTablaCupos').addClass("d-none");
        $('#testTablaCuposGenerico').removeClass("d-none");
    }
    filterDepartmentZones();
}

function crearListaSectores() {

    axios.get('/sectors')

            .then(response => {
                if (response.data.success) {
                
                // creando select

                response.data.data.forEach(sector => {
                    $('<option>', {
                        value: sector.id,
                        text:  sector.nombre,
                    }).appendTo('#mySector');
                });

                   sectorEntradasyCuposChange();
                    
                } else {
                    
                }

            })
            .catch( function (error) {
    
            });    

}

function crearListaSectoresCuposDepartamento() {

axios.get('/sectors')
        .then(response => {
            if (response.data.success) {
            
            // creando select

          
            response.data.data.forEach(sector => {
                $('<option>', {
                    value: sector.id,
                    text:  sector.nombre,
                }).appendTo('#mySector2');
            });
                
            } else {
                
            }

        })
        .catch( function (error) {

        });    

}


function crearListaAreas() {

    axios.get('/areas')
            .then(response => {
       
                if (response.data.success) {
                        
                    response.data.data.forEach(area => {
                        $('<option>', {
                            value: area.id,
                            text:  area.nombre,
                        }).appendTo('#myArea');
                    });
                    
                } else {
                    
                }

            })
            .catch( function (error) {
    
            });    

}


 function crearListaIdiomas() {

axios.get('/getlanguages')

        .then(response => {
            if (response.data) {
            
            // creando select idiomas

            $("#myIdiomaPlantilla").find('option')
                        .remove()
                        .end();

            response.data.languages.forEach(language => {
                $('<option>', {
                    value: language.id,
                    text:  language.name,
                }).appendTo('#myIdiomaPlantilla');

                listaIdiomas.push(language.id);
            });
                // montar lista de objectos
                listaIdiomas.forEach(lang => {
                    let myRow = []
                    for (let index = 1; index <=3 ; index++) {
                        plantillaObj = {}
                        plantillaObj.value = 0
                        myRow.push(plantillaObj) ;
                    }
                    listadoPlantillas.push(myRow);                   
                });
                
                crearGaleriaTemplates();
              

            } else {
                
            }

        })
        .catch( function (error) {

        });    

}

function cambioSelectIdiomas() {
    let myLanguageSelected = $('#myIdiomaPlantilla').val();
    
    crearSelectsPlantillas() 
  
}

function setTemplateSelects() {

    $("#myPlantillaInvitacion").val(0);
    $("#myPlantillaCompra").val(0);
    $("#myPlantillaPases").val(0);


    let myLanguageSelected = $('#myIdiomaPlantilla').prop('selectedIndex');
    

    $("#myPlantillaInvitacion").val(listadoPlantillas[myLanguageSelected][0].templateId ?? 0)   ;

    $("#myPlantillaCompra").val(listadoPlantillas[myLanguageSelected][1].templateId  ?? 0) ;

    $("#myPlantillaPases").val(listadoPlantillas[myLanguageSelected][2].templateId  ?? 0);
    
    
}

function setInitTemplateSelects() {

    let myLanguageSelected = 0;

    $("#myPlantillaInvitacion").prop('selectedIndex', listadoPlantillas[myLanguageSelected][0].value);

    $("#myPlantillaCompra").prop('selectedIndex', listadoPlantillas[myLanguageSelected][1].value);

    $("#myPlantillaPases").prop('selectedIndex', listadoPlantillas[myLanguageSelected][2].value);


}

function selectTipoActividadChange() {
    crearGaleriaTemplates ();
}

function selectActividadChange() {

    var myActivityToFilter =$("#myActivity").val()
    crearListaTiposActividad(myActivityToFilter) 
    
    crearGaleriaTemplates ();
}












// -----------------

function myPlantillaInvitacionChange() {
    

    let myLanguageSelected = $('#myIdiomaPlantilla').prop('selectedIndex');
    let myValueSelected = $('#myPlantillaInvitacion').prop('selectedIndex');
    let myTemplateIdSelected = $('#myPlantillaInvitacion').val();

    listadoPlantillas[myLanguageSelected][0].value = myValueSelected;    
    listadoPlantillas[myLanguageSelected][0].templateId = myTemplateIdSelected;    

}

function myPlantillaCompraChange() {
    

    let myLanguageSelected = $('#myIdiomaPlantilla').prop('selectedIndex');
    let myValueSelected = $('#myPlantillaCompra').prop('selectedIndex');
    let myTemplateIdSelected = $('#myPlantillaCompra').val();
    
    listadoPlantillas[myLanguageSelected][1].value = myValueSelected;    
    listadoPlantillas[myLanguageSelected][1].templateId = myTemplateIdSelected;    

}

function myPlantillaPasesChange() {
    
    let myLanguageSelected = $('#myIdiomaPlantilla').prop('selectedIndex');
    let myValueSelected = $('#myPlantillaPases').prop('selectedIndex');
    let myTemplateIdSelected = $('#myPlantillaPases').val();
    
    listadoPlantillas[myLanguageSelected][2].value = myValueSelected;    
    listadoPlantillas[myLanguageSelected][2].templateId = myTemplateIdSelected;
}

// -----------------------

function getEventTemplates() {
    
        axios.get('/geteventtemplatesall/'+ myEventID )

            .then(response => {
                if (response.data) {

                    // filtrar plantillas  de invitacion

                    response.data.templates.forEach (function (plantillaEvento) {

                        listaIdiomas.forEach (function (myIdioma) {
                            let pos = -1;

                            let myInvitacionTemplates = response.data.templates.filter ( function (plantilla) {
                                if (plantilla.invitation_type_id == 1 && plantilla.language_id == myIdioma) {
                                    return true;
                                } else {
                                    return false;
                                }
                            });            

                            pos = myInvitacionTemplates.map(function(e) { return e.id; }).indexOf(plantillaEvento.id);
                            if (pos > -1 ) {
                                let posIdioma = listaIdiomas.indexOf (myIdioma);
                                listadoPlantillas[posIdioma][0].value = pos + 1
                                listadoPlantillas[posIdioma][0].templateId = plantillaEvento.id;
                            }
           
                           let myCompraTemplates = response.data.templates.filter ( function (plantilla) {
                                if (plantilla.invitation_type_id == 2 && plantilla.language_id == myIdioma) {
                                    return true;
                                } else {
                                    return false;
                                }
                            });      

                            pos = myCompraTemplates.map(function(e) { return e.id; }).indexOf(plantillaEvento.id);
                            if (pos > -1 ) {
                                let posIdioma = listaIdiomas.indexOf (myIdioma);
                                listadoPlantillas[posIdioma][1].value = pos + 1
                                listadoPlantillas[posIdioma][1].templateId = plantillaEvento.id;
                            }                            


                            let myPasesTemplates = response.data.templates.filter ( function (plantilla) {
                                if (plantilla.invitation_type_id == 3 && plantilla.language_id == myIdioma) {
                                    return true;
                                } else {
                                    return false;
                                }
                            });      

                            pos = myPasesTemplates.map(function(e) { return e.id; }).indexOf(plantillaEvento.id);
                            if (pos > -1 ) {
                                let posIdioma = listaIdiomas.indexOf (myIdioma);
                                listadoPlantillas[posIdioma][2].value = pos + 1
                                listadoPlantillas[posIdioma][2].templateId = plantillaEvento.id;
                            }              
                     });
                    });


                } else { }
                setInitTemplateSelects();
            })
            .catch( function (error) {

            });    
}

function crearGaleriaTemplates() {
    // crea galeria de tempaltes en funcion de la actividad y el tipo de actividad.
    let myActivityId = $('#myActivity').val();
    let myActivityTypeId = $('#myType').val();

    axios.get('/gettemplates/'+ myActivityId +'/' + myActivityTypeId )

    .then(response => {
        if (response.data) {
            
            listadoCompletoPlantillas = [];
           
            // creando  invitacion

            response.data.plantillasinvitacion.forEach(plantillainvitacion => {
                
                detallePlantilla = {};
                
                detallePlantilla.id = plantillainvitacion.id;
                detallePlantilla.language_id = plantillainvitacion.language_id;
                detallePlantilla.name = plantillainvitacion.name;

                detallePlantilla.content = plantillainvitacion.content;
                detallePlantilla.subject = plantillainvitacion.subject;
                detallePlantilla.invitation_type_id = 1;
                
                listadoCompletoPlantillas.push(detallePlantilla);

            });
   
            // creando  compra
        
            response.data.plantillascompra.forEach(plantillacompra => {

                detallePlantilla = {};

                detallePlantilla.id = plantillacompra.id;
                detallePlantilla.language_id = plantillacompra.language_id;
                detallePlantilla.name = plantillacompra.name;
                
                detallePlantilla.content = plantillacompra.content;
                detallePlantilla.subject = plantillacompra.subject;
                detallePlantilla.invitation_type_id = 2;
                
                listadoCompletoPlantillas.push(detallePlantilla);

            });

            // creando  pases

            response.data.plantillaspases.forEach(plantillapases => {

                detallePlantilla = {};

                detallePlantilla.id = plantillapases.id;
                detallePlantilla.language_id = plantillapases.language_id;
                detallePlantilla.name = plantillapases.name;
                
                detallePlantilla.content = plantillapases.content;
                detallePlantilla.subject = plantillapases.subject;
                detallePlantilla.invitation_type_id = 3;
                
                listadoCompletoPlantillas.push(detallePlantilla);            

            });        

        
           crearSelectsPlantillas();
        } else {
            
        }

    })
    .catch( function (error) {

    });    

}

function crearSelectsPlantillas() {
      
        let myLanguageSelected =  listaIdiomas[  $('#myIdiomaPlantilla').prop('selectedIndex') ];
      
        // creando select invitacion
      
        $("#myPlantillaInvitacion").find('option')
                    .remove()
                    .end();

        $('<option>', {
            value: 0,
            text:  'Sense plantilla',
        }).appendTo('#myPlantillaInvitacion');


        // filtrar plantillas  de invitacion

        let myInvitacionTemplates = listadoCompletoPlantillas.filter ( function (plantilla) {
            if (plantilla.invitation_type_id == 1 && plantilla.language_id == myLanguageSelected) {
                return true;
            } else {
                return false;
            }
        });                


        myInvitacionTemplates.forEach(plantillainvitacion => {
            
            detallePlantilla = {};
            
            $('<option>', {
                value: plantillainvitacion.id,
                text:  plantillainvitacion.name,
            }).appendTo('#myPlantillaInvitacion');
        
        });
   


        let myCompraTemplates = listadoCompletoPlantillas.filter ( function (plantilla) {
            if (plantilla.invitation_type_id == 2 && plantilla.language_id == myLanguageSelected) {
                return true;
            } else {
                return false;
            }
        });      

        // creando select compra
        $("#myPlantillaCompra").find('option')
                    .remove()
                    .end();

        $('<option>', {
            value: 0,
            text:  'Sense plantilla',
        }).appendTo('#myPlantillaCompra');

        myCompraTemplates.forEach(plantillacompra => {

            detallePlantilla = {};

            $('<option>', {
                value: plantillacompra.id,
                text:  plantillacompra.name,
            }).appendTo('#myPlantillaCompra');

        });


        let myPasesTemplates = listadoCompletoPlantillas.filter ( function (plantilla) {
            if (plantilla.invitation_type_id == 3 && plantilla.language_id == myLanguageSelected) {
                return true;
            } else {
                return false;
            }
        });      

       // creando select pases
       $("#myPlantillaPases").find('option')
                    .remove()
                    .end();

        $('<option>', {
            value: 0,
            text:  'Sense plantilla',
        }).appendTo('#myPlantillaPases');

        myPasesTemplates.forEach(plantillapases => {

            detallePlantilla = {};

            $('<option>', {
                value: plantillapases.id,
                text:  plantillapases.name,
            }).appendTo('#myPlantillaPases');


        });        

  
        if (!runFirstTime) {
            runFirstTime = false;
            setTemplateSelects();
        } else {

            getEventTemplates()

            setTimeout( function () {
                setTemplateSelects()

            },500);

            runFirstTime = false;

        }

   
}




function actualizarEvento() {
    

    // comfirmar datos

    // evniar petocion de actualización

    var form_data  =  myTableCuposZonas.rows().data().toArray() ;
    var form_data_departamentos_generico = myTableCuposDepartamentoGenerico.rows().data().toArray() ;
    var form_data_cuposyentradas = cuposYEntradasTable.rows().data().toArray() ;
    
    var myNombreEventoSave = $('#myNombreEvento').val();
    var myFechaEventoSave = $('#myFechaEvento').val();
    var myHoraEventoSave = $('#myHoraEvento').val();
    var myJornadaEventoSave = $('#myJornadaEvento').val();
    var myAforoEventoSave = $('#myAforoEvento').val();

    var myUbicacionSave = $('#myUbicacion').val();
    var myActivitySave = $('#myActivity').val();
    var myTypeSave = $('#myType').val();
    var myNivellCmbSave = $('#myNivellCmb').val();

    myFechaNoConfirmadaValue = $('#myFechaNoConfirmada').is(":checked");
       
    let myLanguageSelected = $('#myIdiomaPlantilla').val();
    let contenidoPlantillas = [];

    var myTemplate = {};


    listadoPlantillas.forEach ( function (myRow) {
        
        myRow.forEach (function (template) {

            myTemplate = {};
                if (template.templateId != 0 && template.templateId != undefined) {

                    var myContent = listadoCompletoPlantillas.find(element => element.id == template.templateId )
                    
                    myTemplate.id = template.templateId; 
                    myTemplate.content = myContent.content;
                    myTemplate.subject = myContent.subject;
                    myTemplate.invitation_type_id =  myContent.invitation_type_id;
                    
                    myTemplate.language_id =  myContent.language_id;

                    contenidoPlantillas.push (myTemplate);

                }
        });
      
    });

    Swal.fire({
        title: 'Modificar esdeveniment',
        text: "¿Segur que vols modificar aquest esdeveniment?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, modificar esdeveniment!',
        cancelButtonText: 'Cancel.lar'
        }).then((result) => {
            // $(".loader").removeClass("d-none");    
            // $(".loader").fadeIn("slow");    
                if (result.value) {

                        axios.post('/events/update'  ,{
                        eventID : myEventID,           
                        zonas: myZonas,
                        departamentos: myDepartments,
                        
                        nombreevento: myNombreEventoSave,
                        fechanoconfirmada: myFechaNoConfirmadaValue,
                        fechaevento: myFechaEventoSave,
                        horaevento : myHoraEventoSave,
                        jornadaevento : myJornadaEventoSave,
                        aforoevento : myAforoEventoSave,

                        ubicacion : myUbicacionSave,
                        activity : myActivitySave,
                        type : myTypeSave,
                        nivellCmb : myNivellCmbSave,
                        
                        modalidadcupo: modalidadCupo,
                        
                        data:  form_data ,
                        datadepartamentogenerico: form_data_departamentos_generico,
                        datacuposyentradas : form_data_cuposyentradas,

                        listadoCompletoPlantillas : contenidoPlantillas,
                        // language_id : myLanguageSelected
            
                        
                })
                    .then(response => {
                        // $(".loader").fadeOut("slow");    
                        if (response.data.success) {

                            myConfirmMessage ='Esdeveniment guardat correctament.';
                            
                            Swal.fire(
                                'Tot correcte!',
                                myConfirmMessage,
                                'success'
                            ).then((value) => {
                                // redireccion a listado eventos
                                
                                window.location.href = ("<?php echo route('gestorshowevents'); ?> ");
                            });

                        } else {
                            Swal.fire(
                                'Error!',
                                "No ha sigut possible guardar l'esdeveniment",
                                'error'
                            )
                        }
                    })
                    .catch( function (error) {
                                console.log (error)
                    });
               
                }
  
           
            }
        )        

}



</script>    
    
@endsection