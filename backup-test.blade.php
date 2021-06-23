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
                            <h4>UBICACIÓ</h4>
                            <select name="myUbicacion" class="form-control" id="myUbicacion">
                                <option value="1">Camp Nou</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-12">
                            <h6>ACTIVITAT</h6>
                            <select name="myActivity" class="form-control" id="myActivity" onchange="selectActividadChange()">
                                <option value="1">Futbol</option>
                                <option value="2">Desplaçament</option>
                                <option value="3">CNE</option>                                   
                            </select>
                        </div>

                        <div class="col-md-4 col-12">
                            <h6>TIPUS</h6>
                            <select name="myType"  class="form-control" id="myType" onchange="selectTipoActividadChange()">
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
                            
                            <label for="myAforoEvento" class="control-label col-sm-3">Aforo</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="myAforoEvento" myAforoEvento="myAforoEvento" placeholder="" value="{{$event->id_aforo}}">
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
                    <div class="col">
                        <div class="form-group row">

                            <div class="col-4">
                                <select data-placeholder="Afegir tipus d'invitació..." name="myTipoInvitacion" multiple  class="chosen-select" id="myTipoInvitacion">
                                    <option value=""></option>>
                                    <option value="1" >Invitació</option>
                                    <option value="2" >Compra</option>
                                    <option value="3" >Passis</option>
                                </select>
                            </div>
                      
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


var templateEmailTest = `
  <div style="background-color: rgb(10, 10, 36);">
  <p>&nbsp;</p>

  
  <table  align="center" cellpadding="0" cellspacing="0" style="width:550px; margin: 0 auto 0 auto;  background-color:white; height: 300px;">
      <tbody>
          <tr>
              <td>

              </td>
          </tr>
          <tr>
              <td style="text-align:center;" >
                  <img src="https://ainafcb.growinupsystems.com/files/assets/templates/logo-plantilla-peticiones-fcb.png" alt="" width="100" style="padding: 20px;">
              </td>
          </tr>
          <tr>
              <td>
                  <img src="https://ainafcb.growinupsystems.com/files/assets/templates/peticiones-fcb-header-1.png" alt="" width="650px">
              </td>
          </tr>
         
          <tr>
              <td style="text-align:center;" >
                  <br>
                  <h2><strong>NOMBRE_PARTIDO</strong></h2>
                  <h2><strong>FECHA_PARTIDO - HORA_PARTIDO</strong></h2>          
              </td>
          </tr>
          <tr style="align:right">
              <td style="text-align:center;">
                  <br>
                  <h3><strong>ENTRADES</strong> &nbsp; NUMERO_ENTRADAS_PETICION </h3>
                  <h3><strong>ZONA:</strong>:&nbsp; NOMBRE_ZONA_PETICION </h3>
              </td>               
          </tr>
          <tr style="align:center;">
              <td  style=" color: red; text-align:center;"> 
                  <br>
                  <hr>
                  <br>
                  <h1>Recull les teves entrades</h1>
                  <h2>Taquilles a nom de: &nbsp; <h2>
                  <h3>NOMBRE_PETICIONARIO</h3>
              </td>
          </tr>
          <tr>
              <td>
             
                  <br>
                  <br>
                  <hr />
              </td>
          </tr>
          
          <tr>
              <td style="text-align:center">
                  
                  <p><strong style="font-size: 11px;">Textes legals</strong></p>
              <p  style="font-size: 10px">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit quasi doloremque magni ipsum expedita facere nesciunt, voluptates impedit blanditiis repudiandae, ex sint commodi perspiciatis a natus ullam quibusdam, ipsa adipisci?
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint, magnam? Saepe ea, ut incidunt repudiandae non perspiciatis, veritatis accusantium exercitationem quod eaque, praesentium ex vero odit. Voluptates voluptatem natus ea.
              </p>
              <br>
              </td>
          </tr>
          <tr>
              <td>
                  <img src="https://ainafcb.growinupsystems.com/files/assets/templates/peticiones-fcb-footer.png" alt="" width="650px">
              </td>
          </tr>
      </tbody>
  </table>
  
  <p>&nbsp;</p>
</div>
  `;

var EDITOR = CKEDITOR.replace( 'myeditor', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
        // filebrowserImageBrowseUrl : '/uploads/',
        height: 500
    });
    
    CKEDITOR.config.language = 'ca';  
    CKEDITOR.config.removePlugins = 'about';

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

  var listadoPlantillas = [];
  var listaIdiomas = [];

  var plantillaObj = {};

  var contenidoPlantillas = [];
  var detallePlantilla = {}
  


var dataSetDepartamentos = [];

var idiomaPlantillaActualizar;
var contenidoPlantillaActualizar;
var asuntoPlantillaActualizar;
var tipoPlantillaActualizar;
var idPlantillaActualizar;


    $(document).ready(function() {

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
            { data: "price"  , visible:false,  "title" : "Preu" , "width":"10%" ,
        
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
    
    $('#myUbicacion').val( myUbicacionValue );
    $('#myActivity').val( myActivityValue );
    $('#myType').val( myTypeValue );

    crearSelectsPlantillas()
    
    
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

function saveSelectedTemplate() {
    
    var content = CKEDITOR.instances['myeditor'].getData();
    var asuntomail = $('#templatesubject').val();
    
    var pos = contenidoPlantillas.map(function(e) { return e.id; }).indexOf(1);

    closeAllModals();
}

function showTemplateEditor(templateType)
{
    
    // traer plantilla seleccionada

    if (templateType == 1) {
        
        let myValueSelected = $('#myPlantillaInvitacion').prop('selectedIndex');

        let myLanguageSelected = $('#myIdiomaPlantilla').val();

        if (myValueSelected > 0) {

            let myValueSelected = ($('#myPlantillaInvitacion').val() );

            var myContent = contenidoPlantillas.find(element => element.id == myValueSelected )

            // $('#templatesubject').val(myContent.subject);
            $('#templatesubject').val('Les seves entrades');
            

            //  idiomaPlantillaActualizar = myLanguageSelected;
            //  contenidoPlantillaActualizar = myContent;
            //  asuntoPlantillaActualizar = myContent.subject;
            //  tipoPlantillaActualizar = 1;
            //  idPlantillaActualizar = myValueSelected;
             
            CKEDITOR.instances['myeditor'].setData( templateEmailTest );
            // CKEDITOR.instances['myeditor'].setData( myContent.content );
            $('#myModalTemplateEditor').modal('show'); 
        }

    }
    
    if (templateType == 2) {
        
        let myValueSelected = $('#myPlantillaCompra').prop('selectedIndex');
        let myLanguageSelected = $('#myIdiomaPlantilla').val();

        if (myValueSelected > 0) {

            let myValueSelected = ($('#myPlantillaCompra').val() );

            var myContent = contenidoPlantillas.find(element => element.id == myValueSelected )

            $('#templatesubject').val(myContent.subject);
            
            CKEDITOR.instances['myeditor'].setData( myContent.content );
            $('#myModalTemplateEditor').modal('show'); 
        }

    }

    if (templateType == 3) {
        
        let myValueSelected = $('#myPlantillaPases').prop('selectedIndex');
        let myLanguageSelected = $('#myIdiomaPlantilla').val();

    if (myValueSelected > 0) {

        let myValueSelected = ($('#myPlantillaPases').val() );

        var myContent = contenidoPlantillas.find(element => element.id == myValueSelected )

            $('#templatesubject').val(myContent.subject);
            
            CKEDITOR.instances['myeditor'].setData( myContent.content );
            $('#myModalTemplateEditor').modal('show'); 
        }

    }


   
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



function initCupoDepartment() {
    // incializacion de la tabla de cupo generico por departamento
    

}

// --------------


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

function crearListaZonas() {


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

function crearListaDepartamentos() {

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

            } else {
                
            }

        })
        .catch( function (error) {

        });    

}

function cambioSelectIdiomas() {
    let myLanguageSelected = $('#myIdiomaPlantilla').val();
    // let myValueSelected = $('#myPlantillaCompra').prop('selectedIndex');
    
    crearSelectsPlantillas() 

    // listadoPlantillas[myLanguageSelected][1].value = myValueSelected;

  
}

function setTemplateSelects() {

    let myLanguageSelected = $('#myIdiomaPlantilla').prop('selectedIndex');

    $("#myPlantillaInvitacion").prop('selectedIndex', listadoPlantillas[myLanguageSelected][0].value);

    $("#myPlantillaCompra").prop('selectedIndex', listadoPlantillas[myLanguageSelected][1].value);

    $("#myPlantillaPases").prop('selectedIndex', listadoPlantillas[myLanguageSelected][2].value);

}

function selectTipoActividadChange() {
    crearSelectsPlantillas()
}

function selectActividadChange() {
    crearSelectsPlantillas()
}

// -----------------

function myPlantillaInvitacionChange() {
    
    let myLanguageSelected = $('#myIdiomaPlantilla').prop('selectedIndex');
    let myValueSelected = $('#myPlantillaInvitacion').prop('selectedIndex');
    listadoPlantillas[myLanguageSelected][0].value = myValueSelected;

}

function myPlantillaCompraChange() {

    let myLanguageSelected = $('#myIdiomaPlantilla').prop('selectedIndex');
    let myValueSelected = $('#myPlantillaCompra').prop('selectedIndex');

    listadoPlantillas[myLanguageSelected][1].value = myValueSelected;

}

function myPlantillaPasesChange() {

    let myLanguageSelected = $('#myIdiomaPlantilla').prop('selectedIndex');
    let myValueSelected = $('#myPlantillaPases').prop('selectedIndex');
    listadoPlantillas[myLanguageSelected][2].value = myValueSelected;


}

// -----------------------

function crearSelectsPlantillas() {
  
    let myActivityId = $('#myActivity').val();
    let myActivityTypeId = $('#myType').val();
    let myLanguageId = $('#myIdiomaPlantilla').val();

    axios.get('/gettemplates/'+ myActivityId +'/' + myActivityTypeId +'/' + myLanguageId )

    .then(response => {
        if (response.data) {
        

            contenidoPlantillas = [];
            
            
        // creando select invitacion

        $("#myPlantillaInvitacion").find('option')
                    .remove()
                    .end();

        $('<option>', {
            value: 0,
            text:  'Sense plantilla',
        }).appendTo('#myPlantillaInvitacion');

        response.data.plantillasinvitacion.forEach(plantillainvitacion => {
            
            detallePlantilla = {};
            
            $('<option>', {
                value: plantillainvitacion.id,
                text:  plantillainvitacion.name,
            }).appendTo('#myPlantillaInvitacion');

            detallePlantilla.id = plantillainvitacion.id;
            detallePlantilla.content = plantillainvitacion.content;
            detallePlantilla.subject = plantillainvitacion.subject;
            detallePlantilla.invitation_type_id = 1;
            
            
            contenidoPlantillas.push(detallePlantilla);

        });

        // creando select compra
        $("#myPlantillaCompra").find('option')
                    .remove()
                    .end();

        $('<option>', {
            value: 0,
            text:  'Sense plantilla',
        }).appendTo('#myPlantillaCompra');

        response.data.plantillascompra.forEach(plantillacompra => {

            detallePlantilla = {};

            $('<option>', {
                value: plantillacompra.id,
                text:  plantillacompra.name,
            }).appendTo('#myPlantillaCompra');

            detallePlantilla.id = plantillacompra.id;
            detallePlantilla.content = plantillacompra.content;
            detallePlantilla.subject = plantillacompra.subject;
            detallePlantilla.invitation_type_id = 2;
            
            contenidoPlantillas.push(detallePlantilla);

        });

       // creando select pases
       $("#myPlantillaPases").find('option')
                    .remove()
                    .end();

        $('<option>', {
            value: 0,
            text:  'Sense plantilla',
        }).appendTo('#myPlantillaPases');

        response.data.plantillaspases.forEach(plantillapases => {

            detallePlantilla = {};

            $('<option>', {
                value: plantillapases.id,
                text:  plantillapases.name,
            }).appendTo('#myPlantillaPases');

            detallePlantilla.id = plantillapases.id;
            detallePlantilla.content = plantillapases.content;
            detallePlantilla.subject = plantillapases.subject;
            detallePlantilla.invitation_type_id = 3;
            
            contenidoPlantillas.push(detallePlantilla);            

        });        

        setTemplateSelects();

        } else {
            
        }

    })
    .catch( function (error) {

    });    
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

                        contenidoPlantillas : contenidoPlantillas,
                        language_id : myLanguageSelected
            
                        
                })
                    .then(response => {
                       
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