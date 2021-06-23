var peticionActual = {    
    codigo :0,
    fecha_peticion: null,
    nombre_evento: '',
    fecha_evento: null,
    hora_evento: null,
    not_confirmed_date: 0,
    peticionario: '',
    departamento: '',
    en_nombre_de: '',
    finalidad: '',
    tipo_invitacion: '',
    idioma_peticion_id: 0,
    idioma_peticion: '',
    zona: '',
    zona_id: 0,
    cantidad: 0,
    precio: '',
    listadoAsistentes: [],
    emailpeticion: '',
    template_id: 0,
    template_name: '',
    template_subject: '',
    template_content: '',
    userName: '',
    userEmail: ''

}

var usuarioActual = {
    userName: "",
    userID: "",
    departmentId: "",
    departmentName: "",
    rol: null,

}

var isAutorizador = false;
var isLogistica = true;
var isGestor = false;

var myCSRFToken = null;
var myBrowserUploadUrl = null;

var tipoEdicion = 0;
var myPurposeId = 0;

var listaNacionalidades = [];
var listaIdiomas = [];
var listaIdiomasNames = [];
var listaTiposInvitacionNames = []

    if (APPCESS_APP_LANG == 'ca') {
        listaTiposInvitacionNames =  ['Invitació','Compra', 'Passis'];
    }

    if (APPCESS_APP_LANG == 'es') {
        listaTiposInvitacionNames =  ['Invitación','Prensa', 'Acreditación'];
    }

var listaUbicaciones = [];
var listaUActividades = [];

var emailTemplateEditorPanelModalInitialized = 0;
var emailTemplateEditorEditEventInitialized = 0;
var emailTemplateEditorLogisticaInitialized = 0;
var emailPeticionNivelCeroEditortInitialized = 0;


var myEventData;
var tablaAsistentesPeticionInicializada = false

// varialbes peticion nivel 0
var myEventLevelForInvitation = -1;

var myactivity_id_nivel_cero = 0
var mytype_id_nivel_cero = 0
var myevent_id_nivel_cero = 0
var mytipo_invitacion_id_nivel_cero = 0
var mylanguage_id_nivel_cero = 0



// ----------- variables edit evento
var runFirstTime = true;
var myEventID;
var myTypeValue;
var myUbicacionValue;
var myActivityValue;
var myTypeValue;
var myFechaNoConfirmadaValue;

var firstTime = true;
var nivelAutorizacion;

var initModalidadCupo = 1;

var mySectorEntradasyCupos = 2;
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

var myStringToAddTemplatesList = '';
//----------------------------fin varialbes edit evento

// --- varialbes autorizador , logistica
 var templateAvailable = false

// ------- fin variables autorizador logistica













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





// FUNCIONES GENERICAS

// funcion para validar una fecha
function validarFecha(fecha) {

    try {
        var fecha = fecha.split("/");
        var dia = fecha[0];
        var mes = fecha[1];
        var ano = fecha[2];
        var estado = true;

        if ((dia.length == 2) && (mes.length == 2) && (ano.length == 4)) {
            switch (parseInt(mes)) {
                case 1: dmax = 31; break;
                case 2: if (ano % 4 == 0) dmax = 29; else dmax = 28;
                    break;
                case 3: dmax = 31; break;
                case 4: dmax = 30; break;
                case 5: dmax = 31; break;
                case 6: dmax = 30; break;
                case 7: dmax = 31; break;
                case 8: dmax = 31; break;
                case 9: dmax = 30; break;
                case 10: dmax = 31; break;
                case 11: dmax = 30; break;
                case 12: dmax = 31; break;
            }

            dmax != "" ? dmax : dmax = -1; if ((dia >= 1) && (dia <= dmax) && (mes >= 1) && (mes <= 12)) {
                for (var i = 0; i < fecha[0].length; i++) {
                    diaC = fecha[0].charAt(i).charCodeAt(0);
                    (!((diaC > 47) && (diaC < 58))) ? estado = false : '';
                    mesC = fecha[1].charAt(i).charCodeAt(0);
                    (!((mesC > 47) && (mesC < 58))) ? estado = false : '';
                }

            } for (var i = 0; i < fecha[2].length; i++) {

                anoC = fecha[2].charAt(i).charCodeAt(0);

                (!((anoC > 47) && (anoC < 58))) ? estado = false : '';
            }
        } else estado = false;
        return estado;

    } catch (err) {
        // alert("Error de data");
    }
}

// funciones para validar emails
function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}


function ValidateEmail2(mail) {
    if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(myForm.emailAddr.value)) {
        return (true)
    }
    alert("You have entered an invalid email address!")
    return (false)
}

// funcion para mostrar el dashboard correspondiente a cada perfil de usuario

function mostrarDashBoardHomeUsuario() {

    switch (usuarioActual.rol) {

        case 0:
        case 1:
        case 2:                
                mostrarPanelPrincipalDashboardGestor()
            break;

        case 3:            
            mostrarPanelPrincipalLogistica()
        break;

        case 4:        
            mostrarPanelPrincipalAutorizador()
        break;

        case 5:
            mostrarPanelPeticiones()
        break;

        default:
            break;
    }



}

function stopPreloader() {
    $('#status').fadeOut();
    $('#preloader').delay(200).fadeOut('slow');
    $('body').delay(200).css({
        'overflow': 'visible'
    });
}

function startPreloader() {

    $('#status').fadeIn();
    $('#preloader').delay(200).fadeIn('slow');
    $('body').delay(200).css({
        'overflow': 'hidden'
    });
    
}


var translate = function (jsdata)
{	
    $("[tkey]").each (function (index)
    {
        var strTr = jsdata [$(this).attr ('tkey')];
        $(this).text (strTr);
    });
}

function updateTranslations(){
    $.getJSON('/js/lang/appcess-es.json', translate);
}