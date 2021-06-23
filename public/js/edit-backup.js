
//   var EDITOREDICIONEVENTOS = CKEDITOR.replace( 'myeditor', {
//           filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
//           filebrowserUploadMethod: 'form',
//           // filebrowserImageBrowseUrl : '/uploads/',
//           height: 500
//       });
      
//       CKEDITOR.config.language = 'ca';  
//       CKEDITOR.config.removePlugins = 'about';
var runFirstTime = true;
var myEventID;
var myTypeValue;
var myUbicacionValue;
var myActivityValue;
var myTypeValue;
var myFechaNoConfirmadaValue;
var myEventID = 4

var firstTime = true;
var nivelAutorizacion;
    
myUbicacionValue =  '{{$event->ubicacion_id}}';
myActivityValue =  '{{$event->activity_id}}';
myTypeValue =  '{{$event->type_id}}';
myFechaNoConfirmadaValue = '{{$event->not_confirmed_date}}';

nivelAutorizacion = '{{$event->level}}'; 

modalidadCupo = '{{$event->tipo_cupo}}';
var initModalidadCupo = '{{$event->tipo_cupo}}';

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

        
    // init "doc ready"

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

// fin "doc ready"

setTimeout(() => {
  $('#myEditEventModal').modal('show');          
}, 3000);