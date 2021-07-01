
function inicializarCKEditorParaLogistica() {

    if (emailTemplateEditorLogisticaInitialized == 0) {

        var EDITORLOGISTICA = CKEDITOR.replace('editorLogisticaEnvioEmailFinal', {
            filebrowserUploadUrl: '/ckeditor/image_upload?type=Images&_token=' + myCSRFToken,
            filebrowserUploadMethod: 'form',
            height: 500
        });

        CKEDITOR.config.language = APPCESS_APP_LANG;
        CKEDITOR.config.removePlugins = 'about';
        
        emailTemplateEditorLogisticaInitialized = 1;
    }
}


var peticionActual

var myTableEventSelectedTable = "myEventSelectTable";

var myPeticionID;

var dateEvent;
var datePeticio;
var eventName;
var eventID;

var quantitatInvitacions;
var zonaPeticio;

var enNomDe;

var myFinalidadID;
var myFinalidad;
var myTipoInvitacionID;
var myTipoInvitacion;
var email_secundario_peticion;
var listadoAsistentesAutorizadorLogistica = [];
var nacionalidades = [];
var editPurposes = [];
var peticionActual = {};
var zoneList = [];



// let templateEmailSubject = '';
// let templateEmailTest = `
//   <div style="background-color: rgb(10, 10, 36);">
//   <p>&nbsp;</p>


//   <table  align="center" cellpadding="0" cellspacing="0" style="width:550px; margin: 0 auto 0 auto;  background-color:white; height: 300px;">
//       <tbody>
//           <tr>
//               <td>

//               </td>
//           </tr>
//           <tr>
//               <td style="text-align:center;" >
//                   <img src="https://ainafcb.growinupsystems.com/files/assets/templates/logo-plantilla-peticiones-fcb.png" alt="" width="100" style="padding: 20px;">
//               </td>
//           </tr>
//           <tr>
//               <td>
//                   <img src="https://ainafcb.growinupsystems.com/files/assets/templates/peticiones-fcb-header.png" alt="" width="650px">
//               </td>
//           </tr>

//           <tr>
//               <td style="text-align:center;" >
//                   <br>
//                   <h2><strong>{{NOMBRE_PARTIDO}}</strong></h2>
//                   <h2><strong>{{FECHA_PARTIDO}} - {{HORA_PARTIDO}}</strong></h2>          
//               </td>
//           </tr>
//           <tr style="align:right">
//               <td style="text-align:center;">
//                   <br>
//                   <h3><strong>ENTRADES</strong> &nbsp; {{NUMERO_ENTRADAS_PETICION}} </h3>
//                   <h3><strong>ZONA:</strong>:&nbsp; {{NOMBRE_ZONA_PETICION}} </h3>
//               </td>               
//           </tr>
//           <tr style="align:center;">
//               <td  style=" color: red; text-align:center;"> 
//                   <br>
//                   <hr>
//                   <br>
//                   <h1>Recull les teves entrades</h1>
//                   <h2>Taquilles a nom de: &nbsp; <h2>
//                   <h3>{{NOMBRE_PETICIONARIO}}</h3>
//               </td>
//           </tr>
//           <tr>
//               <td>

//                   <br>
//                   <br>
//                   <hr />
//               </td>
//           </tr>

//           <tr>
//               <td style="text-align:center">

//                   <p><strong style="font-size: 11px;">Textes legals</strong></p>
//               <p  style="font-size: 10px">
//                   Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit quasi doloremque magni ipsum expedita facere nesciunt, voluptates impedit blanditiis repudiandae, ex sint commodi perspiciatis a natus ullam quibusdam, ipsa adipisci?
//                   Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint, magnam? Saepe ea, ut incidunt repudiandae non perspiciatis, veritatis accusantium exercitationem quod eaque, praesentium ex vero odit. Voluptates voluptatem natus ea.
//               </p>
//               <br>
//               </td>
//           </tr>
//           <tr>
//               <td>
//                   <img src="https://ainafcb.growinupsystems.com/files/assets/templates/peticiones-fcb-footer.png" alt="" width="650px">
//               </td>
//           </tr>
//       </tbody>
//   </table>

//   <p>&nbsp;</p>
// </div>
//   `;





function initDocReadyGestor() {
    // ready de gestor

    if (isLogistica) {

        tableAutorizadorLogistica = $('#myEventSelectTable').DataTable({

            "order": [[1, "asc"]],
            "scrollX": true,
            "ajax": {
                "url": "/invitationsgestor",
                "type": "GET",
                "datatype": "json"
            },

            "columns": [
                { "defaultContent": "<a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEditar'></a> " },
                {
                    "data": "estado", title: DASHBOARD_GESTOR__TABLA__HEADERS.estado,

                    "render": function (data, type, row, meta) {
                        if (data == 1) return '<b class="badge badge-pendiente text-white">' + ESTADOS_PETICIONES.pendiente + '</b>';
                        if (data == 2) return '<b class="badge badge-en-proceso text-white">' + ESTADOS_PETICIONES.en_proceso + '</b>';
                        if (data == 3) return '<b class="badge badge-modificada text-white">' + ESTADOS_PETICIONES.modifiicada + '</b>';
                        if (data == 4) return '<b class="badge badge-cancelada text-white">' + ESTADOS_PETICIONES.cancelada + '</b>';
                        if (data == 5) return '<b class="badge badge-autorizada text-white">' + ESTADOS_PETICIONES.autorizada + '</b>';
                        if (data == 6) return '<b class="badge badge-pendiente-envio text-white">' + ESTADOS_PETICIONES.pendiente_envio+ '</b>';
                        if (data == 7) return '<b class="badge badge-enviada text-white">' + ESTADOS_PETICIONES.enviada + '</b>';
                        if (data == 10) return '<b class="badge badge-autorizada text-white">' + ESTADOS_PETICIONES.pendiente_doble_auth + '</b>';
                    }

                },
                { "data": "codigo", "searchable": true },
                {
                    "data": "fecha_peticion", title: DASHBOARD_GESTOR__TABLA__HEADERS.fecha_peticion,

                    "render": function (data, type, row, meta) {
                        data = moment(data).format('DD/MM/YYYY')
                        return data
                    }
                },
                { "data": "activity_id", visible:false, title: DASHBOARD_GESTOR__TABLA__HEADERS.competicion },
                { "data": "nombre_evento", title: DASHBOARD_GESTOR__TABLA__HEADERS.evento,  "searchable": true },
                {
                    data: "not_confirmed_date", visible: false,

                    render: function (data, type, row, meta) {
                        fechaNoConfirmada = data;
                        return data;
                    }
                },
                {
                    "data": "fecha_evento", title: DASHBOARD_GESTOR__TABLA__HEADERS.fecha_evento,

                    render: function (data, type, row, meta) {

                        if (fechaNoConfirmada == 1) return "No confirmada";
                          let myData =  moment(data).format('DD/MM/YYYY')
                          data = myData
            
                        return data;
                    }

                },

                { "data": "hora_evento", title: DASHBOARD_GESTOR__TABLA__HEADERS.hora_evento,
                "render": function (data, type, row, meta) {
                    let myData =  moment(data,"H:m").format('hh:mm')
                     data = myData
                     return data
                 }
           
                },
                { "data": "cantidad", title: DASHBOARD_GESTOR__TABLA__HEADERS.cantidad },
                {
                    "data": "price", visible:false, title: DASHBOARD_GESTOR__TABLA__HEADERS.precio,

                    "render": function (data, type, row, meta) {
                        return data + ' €';
                    }

                },
                { "data": "zona", title: DASHBOARD_GESTOR__TABLA__HEADERS.zona },
                { "data": "user_dep", title: DASHBOARD_GESTOR__TABLA__HEADERS.departamento },
                { "data": "user_name", title: DASHBOARD_GESTOR__TABLA__HEADERS.peticionario },
                { "data": "en_nombre_de", title: DASHBOARD_GESTOR__TABLA__HEADERS.en_nombre_de},


            ],

            "language": tablesLang

        });


        $('#' + myTableEventSelectedTable).on('click', '#selectEditar', function (e) {
            e.preventDefault();

            let currentRow = $(this).closest("tr");

            let data = $('#myEventSelectTable').DataTable().row(currentRow).data();

            editarPeticion(data['id'], data);

        });


    }

    if (isAutorizador) {
        $("#asignarPeticionButton").addClass('d-none');
        $("#autorizarPeticionButton").removeClass('d-none');
    }

    if (isLogistica) {
        $("#autorizarPeticionButton").addClass('d-none');
        $("#asignarPeticionButton").removeClass('d-none');

    }

    updateCountersAutorizador();
    updateTranslations()

}


function initDocReadyAutorizadorLogistica() {

    var myUserIdAutorizador = myUserID;

    if (isAutorizador) {
        tableAutorizadorLogistica = $('#myEventSelectTable').DataTable({

            "order": [[1, "asc"]],
            "scrollX": true,
            "ajax": {
                "url": "/invitationsautorizador/" + myUserIdAutorizador ,
                "type": "GET",
                "datatype": "json"
            },

            "columns": [

                { "defaultContent": " <a href='#' class='btn btn-success btn-sm feather icon-check' id='select'> </a>   <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEditar'>      </a>   <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectCancelar'></a>" },
                {
                    "data": "estado", title: DASHBOARD_AUTORIZADOR__TABLA__HEADERS.estado,

                    "render": function (data, type, row, meta) {
                        if (data == 1) return '<b class="badge badge-pendiente text-white">' + ESTADOS_PETICIONES.pendiente + '</b>';
                        if (data == 2) return '<b class="badge badge-en-proceso text-white">'+  ESTADOS_PETICIONES.en_proceso + '</b>';
                        if (data == 3) return '<b class="badge badge-modificada text-white">' + ESTADOS_PETICIONES.modifiicada + '</b>';
                        if (data == 4) return '<b class="badge badge-cancelada text-white">' + ESTADOS_PETICIONES.cancelada+ '</b>';
                        if (data == 5) return '<b class="badge badge-autorizada text-white">' + ESTADOS_PETICIONES.autorizada + '</b>';
                        if (data == 6) return '<b class="badge badge-pendiente-envio text-white">' + ESTADOS_PETICIONES.pendiente_envio + '</b>';
                        if (data == 7) return '<b class="badge badge-enviada text-white">' + ESTADOS_PETICIONES.enviada + '</b>';
                        if (data == 10) return '<b class="badge badge-autorizada text-white">' + ESTADOS_PETICIONES.pendiente_doble_auth + '</b>';
                    }

                },
                { "data": "codigo", "searchable": true },
                {
                    "data": "fecha_peticion", title: DASHBOARD_AUTORIZADOR__TABLA__HEADERS.fecha_peticion,

                    "render": function (data, type, row, meta) {
                        data = moment(data).format('DD/MM/YYYY')
                        return data
                    }
                },
                { "data": "activity_id", visible: false, title: DASHBOARD_AUTORIZADOR__TABLA__HEADERS.actividad, },
                { "data": "nombre_evento", title: DASHBOARD_AUTORIZADOR__TABLA__HEADERS.evento, "searchable": true },

                {
                    data: "not_confirmed_date", visible: false,

                    render: function (data, type, row, meta) {
                        fechaNoConfirmada = data;
                        return data;
                    }

                },

                {
                    "data": "fecha_evento", title: DASHBOARD_AUTORIZADOR__TABLA__HEADERS.fecha_evento,

                    render: function (data, type, row, meta) {

                        if (fechaNoConfirmada == 1) return "No confirmada";

                         let myData =  moment(data).format('DD/MM/YYYY')
                         data = myData
               
                        return data;
                    }

                },

                { "data": "hora_evento", title: DASHBOARD_AUTORIZADOR__TABLA__HEADERS.hora_evento, 
                "render": function (data, type, row, meta) {
                    let myData =  moment(data,'H:m').format('hh:mm')
                     data = myData
                     return data
                 }
                },

                { "data": "cantidad", title: DASHBOARD_AUTORIZADOR__TABLA__HEADERS.cantidad, },
                {
                    "data": "price", visible:false, title: DASHBOARD_AUTORIZADOR__TABLA__HEADERS.precio,

                    "render": function (data, type, row, meta) {
                        return data + ' €';
                    }

                },
                { "data": "zona", title: DASHBOARD_AUTORIZADOR__TABLA__HEADERS.zona, },
                { "data": "user_dep", title: DASHBOARD_AUTORIZADOR__TABLA__HEADERS.departamento, },
                { "data": "user_name", title: DASHBOARD_AUTORIZADOR__TABLA__HEADERS.peticionario, },
                { "data": "en_nombre_de", title: DASHBOARD_AUTORIZADOR__TABLA__HEADERS.en_nombre_de, },


            ],

            "language": tablesLang

        });


        $('#' + myTableEventSelectedTable).on('click', '#select', function (e) {
            e.preventDefault();

            let currentRow = $(this).closest("tr");

            let data = $('#myEventSelectTable').DataTable().row(currentRow).data();

            autorizarPeticion(data['id'], data['level']);

        });

        $('#' + myTableEventSelectedTable).on('click', '#selectEditar', function (e) {
            e.preventDefault();

            let currentRow = $(this).closest("tr");

            let data = $('#myEventSelectTable').DataTable().row(currentRow).data();


            editarPeticion(data['id'], data);

        });


        $('#' + myTableEventSelectedTable).on('click', '#selectCancelar', function (e) {
            e.preventDefault();

            let currentRow = $(this).closest("tr");

            let data = $('#myEventSelectTable').DataTable().row(currentRow).data();
            
            editarPeticion(data['id'], data);

        });

    }

    // ready de logistica

    if (isLogistica) {

        tableAutorizadorLogistica = $('#myEventSelectTable').DataTable({

            "order": [[1, "asc"]],
            "scrollX": true,
            "ajax": {
                "url": "/invitationslogistica",
                "type": "GET",
                "datatype": "json"
            },

            "columns": [
                { "defaultContent": "<a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEditar'></a> " },
                {
                    "data": "estado", title: DASHBOARD_LOGISTICA__TABLA__HEADERS.estado,

                    "render": function (data, type, row, meta) {
                        if (data == 1) return '<b class="badge badge-pendiente text-white">' + ESTADOS_PETICIONES.pendiente + '</b>';                        
                        if (data == 2) return '<b class="badge badge-en-proceso text-white">' + ESTADOS_PETICIONES.en_proceso + '</b>';
                        if (data == 3) return '<b class="badge badge-modificada text-white">' + ESTADOS_PETICIONES.modifiicada + '</b>';
                        if (data == 4) return '<b class="badge badge-cancelada text-white">' + ESTADOS_PETICIONES.cancelada + '</b>';
                        if (data == 5) return '<b class="badge badge-autorizada text-white">' + ESTADOS_PETICIONES.pendiente_asignar + '</b>';
                        if (data == 6) return '<b class="badge badge-pendiente-envio text-white">' + ESTADOS_PETICIONES.pendiente_envio + '</b>';
                        if (data == 7) return '<b class="badge badge-enviada text-white">' + ESTADOS_PETICIONES.enviada + '</b>';
                    }

                },
                { "data": "codigo", "searchable": true },
                {
                    "data": "fecha_peticion", title: DASHBOARD_LOGISTICA__TABLA__HEADERS.fecha_peticion,

                    "render": function (data, type, row, meta) {
                        data = moment(data).format('DD/MM/YYYY')
                        return data
                    }
                },
                { "data": "activity_id", visible:false, title: DASHBOARD_LOGISTICA__TABLA__HEADERS.actividad },
                { "data": "nombre_evento",title:DASHBOARD_LOGISTICA__TABLA__HEADERS.evento, "searchable": true },
                {
                    data: "not_confirmed_date", visible: false,

                    render: function (data, type, row, meta) {
                        fechaNoConfirmada = data;
                        return data;
                    }
                },
                {
                    "data": "fecha_evento", title: DASHBOARD_LOGISTICA__TABLA__HEADERS.fecha_evento,

                    render: function (data, type, row, meta) {

                        if (fechaNoConfirmada == 1) return "No confirmada";
               
                            let myData =  moment(data).format('DD/MM/YYYY')
                             data = myData
               
                        return data;
                    }

                },

                { "data": "hora_evento", title: DASHBOARD_LOGISTICA__TABLA__HEADERS.hora_evento,
                "render": function (data, type, row, meta) {
                    let myData =  moment(data,"H:m").format('hh:mm')
                     data = myData
                     return data
                 }
                },
                { "data": "cantidad", title: DASHBOARD_LOGISTICA__TABLA__HEADERS.cantidad },
                {
                    "data": "price",visible:false,title: DASHBOARD_LOGISTICA__TABLA__HEADERS.precio,

                    "render": function (data, type, row, meta) {
                        return data + ' €';
                    }

                },
                { "data": "zona", title: DASHBOARD_LOGISTICA__TABLA__HEADERS.zona },
                { "data": "user_dep", title: DASHBOARD_LOGISTICA__TABLA__HEADERS.departamento },
                { "data": "user_name", title: DASHBOARD_LOGISTICA__TABLA__HEADERS.peticionario },
                { "data": "en_nombre_de", title: DASHBOARD_LOGISTICA__TABLA__HEADERS.en_nombre_de },


            ],

            "language": tablesLang

        });


        $('#' + myTableEventSelectedTable).on('click', '#selectEditar', function (e) {
            e.preventDefault();

            let currentRow = $(this).closest("tr");

            let data = $('#myEventSelectTable').DataTable().row(currentRow).data();

            editarPeticion(data['id'], data);

        });


    }

    if (isAutorizador) {
        $("#asignarPeticionButton").addClass('d-none');
        $("#autorizarPeticionButton").removeClass('d-none');
    }

    if (isLogistica) {
        $("#autorizarPeticionButton").addClass('d-none');
        $("#asignarPeticionButton").removeClass('d-none');

    }

    updateCountersAutorizador();

    updateTranslations()

}

function asignarPeticionDetalles() {

    $('#cantidadAsignarLogistica').text(peticionActual.data.cantidad);

    if (peticionActual.details[0].zona_id == 0 || peticionActual.details[0].zona_id == '') {
        $('#myZonaPeticionLogistica').val(zoneList[peticionActual.data.zona_id - 1]);

    } else {
        $('#myZonaPeticionLogistica').val(zoneList[peticionActual.details[0].zona_id - 1]);
    }

    $('#myBocaLogistica').val(peticionActual.details[0].boca);
    $('#myFilaLogistica').val(peticionActual.details[0].fila);
    $('#myAsientosLogistica').val(peticionActual.details[0].asiento);
    $('#myDescripcionLogistica').val(peticionActual.details[0].descripcion);

    $('#myModalLogisticaPeticionDetalles').modal('show');
}

function asignarPeticionLogisticaParaEnvio() {

    if (!templateAvailable) {
        Swal.fire(
            MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO.error,
            MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO.plantilla_no_asignada,
            'error'
        )
        return
    }

    let myEventDate;
    if (peticionActual.datosPeticion.not_confirmed_date == 1) {
        myEventDate = MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO.fecha_no_confirmada;
    } else {
        myEventDate = peticionActual.datosPeticion.fecha_evento;
    } data

    let nombrePrincipalHeader;
    let emailPrincipalHeader;
    let esAsistentePrincipalHeader = false;
    listadoAsistentesAutorizadorLogistica.forEach(element => {

        if (element.pivot.es_principal == 1 && !esAsistentePrincipalHeader) {
            nombrePrincipalHeader = element.nombre + ' ' + element.apellidos;
            emailPrincipalHeader = element.email;
            esAsistentePrincipalHeader = true;
        }

    });

    console.log ('datos peticion' , listadoAsistentesAutorizadorLogistica[0].pivot.guest_id)
    console.log ('sin valor editor')

    var myUserTestGuestId = listadoAsistentesAutorizadorLogistica[0].pivot.guest_id

        $('#myEmailPeticionHeader').text(peticionActual.user.email);
        $('#myNamePeticionHeader').text(peticionActual.user.name);

        var tempStr = templateEmailTest.replace('{{NOMBRE_EVENTO}}', peticionActual.datosPeticion.nombre_evento)
            .replace('{{FECHA_EVENTO}}', myEventDate)
            .replace('{{HORA_EVENTO}}', peticionActual.datosPeticion.hora_evento)
            .replace('{{NUMERO_ENTRADAS_PETICION}}', peticionActual.data.cantidad)
            .replace('{{NOMBRE_ZONA_PETICION}}', peticionActual.datosPeticion.zona)
            .replace('{{NOMBRE_PETICIONARIO}}', peticionActual.user.name)
         
            // .replace('{{NOMBRE_INVITADO}}', listadoAsistentesAutorizadorLogistica[0]['nombre'] )
            
            .replace('{{HEADER_USER_APP}}', 'Datos de acceso')
            .replace('{{LOGIN_USER_APP}}', listadoAsistentesAutorizadorLogistica[0]['email'])
            .replace('{{PASSWORD_USER_APP}}', 123456);


    templateEmailTest = tempStr;

    // CKEDITOR.instances['editorLogisticaEnvioEmailFinal'].setData( '<h1> hello moto</h1> <hr> <p>This is the editor data.</p>' );
    CKEDITOR.instances['editorLogisticaEnvioEmailFinal'].setData(templateEmailTest);


    if (peticionActual.data.email_secundario_peticion) {

        if (peticionActual.data.email_secundario_peticion.trim().length > 0) {
            if (validateEmail(peticionActual.data.email_secundario_peticion)) {

                peticionActual.emailpeticion = peticionActual.data.email_secundario_peticion
            } else {

                peticionActual.emailpeticion = '';
            }
        }

    } else {

        peticionActual.emailpeticion = '';
    }


    $('#templateSubject').val(templateEmailSubject)

    $('#myModalLogisticaAsignarParaEnvio').modal('show');
}

function enviarEmailPeticionLogistica() {
    console.log (listadoAsistentesAutorizadorLogistica)

    peticionActual.details[0].boca = $('#myBocaLogistica').val();
    peticionActual.details[0].fila = $('#myFilaLogistica').val();
    peticionActual.details[0].asiento = $('#myAsientosLogistica').val();
    peticionActual.details[0].descripcion = $('#myDescripcionLogistica').val();
    peticionActual.details[0].zona_id = $('#myZonaPeticionLogistica').val();

    var contenido = CKEDITOR.instances['editorLogisticaEnvioEmailFinal'].getData();
    var asuntoEmail = $('#templateSubject').val();

    // enviando peticion

    console.log ('listado asistentes', listadoAsistentesAutorizadorLogistica)

    var myTemplatesToSendCollection = []
    var myGuestSendDetails = {}
    var myTemplateToSend = '' 

    for (let i = 0; i < listadoAsistentesAutorizadorLogistica.length; i++) {

        myTemplateToSend = contenido.replace('{{NOMBRE_INVITADO}}', listadoAsistentesAutorizadorLogistica[i]['nombre'])
            .replace('{{HEADER_USER_APP}}',"Tus datos de acceso")                    
            .replace('{{LOGIN_USER_APP}}', listadoAsistentesAutorizadorLogistica[i]['email'])
            .replace('{{PASSWORD_USER_APP}}',"123456")
            .replace('{{FECHA_EVENTO}}', peticionActual.fecha_evento)
            .replace('{{NOMBRE_EVENTO}}', peticionActual.nombre_evento)
            .replace('{{HORA_EVENTO}}', peticionActual.hora_evento)
            .replace('{{NUMERO_ENTRADAS_PETICION}}', 1)
            .replace('{{NOMBRE_ZONA_PETICION}}', peticionActual.zona)
            .replace('{{NOMBRE_PETICIONARIO}}','')                   
            .replace('{{NOMBRE_ZONA_PETICION}}', peticionActual.zona) 

            myGuestSendDetails = {}
            
            myGuestSendDetails.nombre = listadoAsistentesAutorizadorLogistica[i]['nombre']
            myGuestSendDetails.email = listadoAsistentesAutorizadorLogistica[i]['email']

            myGuestSendDetails.content = myTemplateToSend
            myGuestSendDetails.app_user_id = listadoAsistentesAutorizadorLogistica[i]['app_user_id'] ?? ''

            myTemplatesToSendCollection.push(myGuestSendDetails)
        }
        console.log (myTemplatesToSendCollection)


    Swal.fire({
        title: MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_ENVIAR_PETICION.enviar_peticion__titulo,
        text: MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_ENVIAR_PETICION.enviar_peticion__texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_ENVIAR_PETICION.enviar_peticion__boton__confirmar,
        cancelButtonText: MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_ENVIAR_PETICION.enviar_peticion__boton__cancelar
    }).then((result) => {

        if (result.value) {
            
            startPreloader()
            
            axios.put('/enviarpeticionlogistica', {
                IDPeticion: peticionActual.data.id,
                boca: peticionActual.details[0].boca,
                fila: peticionActual.details[0].fila,
                asiento: peticionActual.details[0].asiento,
                descripcion: peticionActual.details[0].descripcion,
                zona_id: peticionActual.details[0].zona_id,
                estado: 7,
                asunto: asuntoEmail,
                body: contenido,
                userId: peticionActual.user.id,
                userName: peticionActual.user.name,
                email: peticionActual.user.email,
                emailsecundario: peticionActual.emailpeticion,
                guestId : listadoAsistentesAutorizadorLogistica[0].pivot.guest_id,

                tipo_cupo: tipoCupo,
                department_id: userDepartmentID,

                level: 0,

                dateEvent: dateEvent,
                datePeticio: datePeticio,
                eventName: eventName,
                quantitatInvitacions: quantitatInvitacions,
                zonaPeticio: myZona2,
                zona_id: zona_id,
                enNomDe: enNomDe,
                user_id: userID,
                user_name: userName,
                user_dep: userDepartmentName,

                tipo_invitacion_id: myTipoInvitacionID,
                tipo_invitacion: myTipus2,

                event_id: eventID,
                email_secundario_peticion: email_secundario_peticion,
                idioma_peticion: idiomaPeticion,
                nuevo_cupo: myPending,
                listadoAsistentes: listadoAsistentesAutorizadorLogistica,
                contenidoEnvio: myTemplatesToSendCollection

            })
                .then(response => {
                    
                    stopPreloader()

                    if (response.data.success) {
                        
                        myConfirmMessage = MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_ENVIAR_PETICION.todo_ok_peticion + peticionActual.data.codigo + MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_ENVIAR_PETICION.todo_ok_peticion__texto;
                        Swal.fire(
                            MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_ENVIAR_PETICION.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                    } else {
                        Swal.fire(
                            MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO.error,
                            MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO.ko,
                            'error'
                        )
                    }
                    $('#myEventSelectTable').DataTable().ajax.reload();
                    closeAllModalsAutorizador();

                    updateCountersAutorizador()

                })
                .catch(function (error) {
                    console.log(error)
                    stopPreloader()
                });
        }
    })

    stopPreloader()
}


function editarPeticion(myId, datosPeticion) {

    axios.put('/editarpeticionautorizador', {
        IDPeticion: myId,
    }).then(response => {

        if (response.data.success) {

            // prapare data


            // preparar array nacionalidades

            nacionalidades = [];
            nacionalidades = response.data.nationalities;

            // montar selects de motivos en cancelar y modificar

            //--------- cancelar modal
            $("#myMotivoCancelarSelectAutorizador").find('option')
                .remove()
                .end();

            response.data.editpurposes.forEach(purpose => {
                $('<option>', {
                    value: purpose.id,
                    text: purpose.name,
                }).appendTo('#myMotivoCancelarSelectAutorizador');

            });

            //--------- modificacion modal
            $("#myMotivoSelectAutorizador").find('option')
                .remove()
                .end();

            response.data.editpurposes.forEach(purpose => {
                $('<option>', {
                    value: purpose.id,
                    text: purpose.name,
                }).appendTo('#myMotivoSelectAutorizador');

            });

            editPurposes = [];
            editPurposes = response.data.editpurposes;

            myPeticionID = response.data.data.id;

            peticionActual = {};
            peticionActual.data = response.data.data;
            peticionActual.details = response.data.details;
            peticionActual.user = response.data.user;
            peticionActual.datosPeticion = datosPeticion;

            if (isLogistica) {

                // carga de zonas

                axios.get('/eventzone/' + peticionActual.data.event_id)
                    .then(response => {

                        if (response.data) {

                            zoneList = [];

                            $("#myZonaPeticionLogistica").find('option')
                                .remove()
                                .end();

                            response.data.data.forEach(zona => {
                                $('<option>', {
                                    value: zona.zone_id,
                                    // text: zona.nombre + " " + zona.price + " €",
                                    text: zona.nombre
                                }).appendTo('#myZonaPeticionLogistica');
                                zoneList.push(zona.zone_id);
                            });


                        } else {
                        }

                    })
                    .catch(function (error) {
                        console.log(error)
                    });

            }

            showModalDetallePeticionAutorizador(response.data, datosPeticion);

        } else {
            Swal.fire(
                MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_EDITAR_PETICION.error,
                MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_EDITAR_PETICION.editar_peticion__texto,
                'error'
            )
        }

    })
        .catch(function (error) {
            console.log(error)
        });
}


function showModalDetallePeticionAutorizador(myData, datosPeticion) {

    listadoAsistentesAutorizadorLogistica = [];

    $('#myAssistentsTableResumenAutorizadorLogistica tr:gt(0)').remove()

    quantitatInvitacions = myData.data.cantidad;
    enNomDe = myData.data.en_nombre_de;

    $('#codigoPeticionEdicionAutorizador').text(datosPeticion.codigo);

    $('#fechaPeticionResumenAutorizadorLogistica').text(moment(myData.data.fecha_peticion).format('DD/MM/YYYY'));
    $('#fechaEventoResumenAutorizadorLogistica').text(datosPeticion.fecha_evento);
    $('#nombreEventoResumenAutorizadorLogististica').text(datosPeticion.nombre_evento);
    
    $('#enNombreDeResumenAutorizadorLogistica').text(enNomDe);
    $('#cantidadResumenAutorizadorLogistica').text(myData.data.cantidad);


    $('#myAssistentsTitleResumen').text(datosPeticion.nombre_evento + ' ' + datosPeticion.fecha_evento)
    $('#finalidadResumenAutorizadorLogistica').text(datosPeticion.finalidad);
    $('#zonaResumenAutorizadorLogistica').text(datosPeticion.zona);
    $('#tipoInvitacionResumenAutorizadorLogistica').text(datosPeticion.tipo_invitacion);
    $('#precioTotalResumenAutorizadorLogistica').text(datosPeticion.price + ' €');

    $('#emailSecundarioPeticionAutorizadorLogistica').text(datosPeticion.email_secundario_peticion);
    
    $('#myPeticionarioNombreResumen').text(datosPeticion.user_name);
    $('#myPeticionarioDepartamentoResumen').text(datosPeticion.user_dep);

    listadoAsistentesAutorizadorLogistica = myData.guests;

    myAddTableRowResumenAutorizador();

    // si esta editada o modificada mostrar alerta

    //-----------------------------------
    
    if (datosPeticion['tipo_edicion'] == 0) {
        $('#peticionModificadaDivLogistica').addClass('d-none');
        $('#peticionCanceladaDivLogistica').addClass('d-none');
    }

    if (datosPeticion['tipo_edicion'] == 1) {

        $('#peticionModificadaDivLogistica').removeClass('d-none');
        $('#peticionCanceladaDivLogistica').addClass('d-none');

        var myEditPurpose = editPurposes.find(element => element.id == datosPeticion.motivo_edicion_id).name;

        $('#motivoModificacionLogistica').text(myEditPurpose);
        $('#descripcionMotivoModificacionLogistica').text(datosPeticion.motivo_edicion_descripcion);
        $('#autorModificacionLogistica').text(myData.user_edicion_name);

        var myUserRol = '';
        if (datosPeticion.user_edicion_rol == 1) {
            myUserRol = 'Autoritzador';
        }

        if (datosPeticion.user_edicion_rol == 2) {
            myUserRol = 'Logística';
        }

        if (datosPeticion.user_edicion_rol == 3) {
            myUserRol = 'Gestor';
        }

        $('#departamentoAutorModificacionLogistica').text(myUserRol);
    }

    if (datosPeticion['tipo_edicion'] == 2) {        

        $('#peticionModificadaDivLogistica').addClass('d-none');
        $('#peticionCanceladaDivLogistica').removeClass('d-none');

        var myEditPurpose = editPurposes.find(element => element.id == datosPeticion.motivo_edicion_id).name;

        $('#motivoCancelacionLogistica').text(myEditPurpose);
        $('#descripcionMotivoCancelacionLogistica').text(datosPeticion.motivo_edicion_descripcion);
        $('#autorCancelacionLogistica').text(myData.user_edicion_name);

        var myUserRol = '';
        if (datosPeticion.user_edicion_rol == 1) {
            myUserRol = 'Autoritzador';
        }

        if (datosPeticion.user_edicion_rol == 2) {
            myUserRol = 'Logística';
        }

        $('#departamentoAutorCancelacionLogistica').text(myUserRol);
    }

    if (datosPeticion['tipo_edicion'] == 2) {
        $('#peticionModificadaDivLogistica').addClass('d-none');
    }

    //-----------------------------------

    // traer plantilla


    // activity_id
    // activity_type_id
    // invitation_type_id
    // lang_id
    // event_id

    var myactivity_id = datosPeticion['activity_id'];
    var mytype_id = datosPeticion['type_id'];
    var mytipo_invitacion_id = datosPeticion['tipo_invitacion_id'];
    var mylanguage_id = datosPeticion['language_id'];
    var myevent_id = datosPeticion['event_id'];

    templateAvailable = false

    axios.get('/geteventtemplate/' + myactivity_id + '/' + mytype_id + '/' + mytipo_invitacion_id + '/' + mylanguage_id + '/' + myevent_id)
        .then(response => {

            console.log ( myactivity_id,mytype_id, mytipo_invitacion_id,mylanguage_id,              myevent_id)

            console.log (response.data)
            
            if (response.data.template.length == 0) {
                templateAvailable = false
            } else {
                templateAvailable = true
            }
            
            if (response.data && templateAvailable) {
                
                templateEmailTest = response.data['template'][0].content;
                templateEmailSubject = response.data['template'][0].subject;

            } else {
                templateEmailTest = null
                templateEmailSubject = null

            }
        })
        .catch(function (error) {
            console.log(error)
        });

        

    // show modal ----------


    $('#estadoPeticionTitulo').removeClass('badge-pendiente');
    $('#estadoPeticionTitulo').removeClass('badge-en-proceso');
    $('#estadoPeticionTitulo').removeClass('badge-modificada');
    $('#estadoPeticionTitulo').removeClass('badge-cancelada');
    $('#estadoPeticionTitulo').removeClass('badge-autorizada');
    $('#estadoPeticionTitulo').removeClass('badge-pendiente-envio');
    $('#estadoPeticionTitulo').removeClass('badge-enviada');



    if (datosPeticion['estado'] == 1) {
        $('#estadoPeticionTitulo').text('Pendent');
        $('#estadoPeticionTitulo').addClass('badge-pendiente');
    }

    if (datosPeticion['estado'] == 2) {
        $('#estadoPeticionTitulo').text('En proces');
        $('#estadoPeticionTitulo').addClass('badge-en-proceso');
    }

    if (datosPeticion['estado'] == 3) {
        $('#estadoPeticionTitulo').text('Modificada');
        $('#estadoPeticionTitulo').addClass('badge-modificada');
    }

    if (datosPeticion['estado'] == 4) {
        $('#estadoPeticionTitulo').text('Cancel.lada');
        $('#estadoPeticionTitulo').addClass('badge-cancelada');
    }

    if (datosPeticion['estado'] == 5) {
        $('#estadoPeticionTitulo').text('Autoritzada');
        $('#estadoPeticionTitulo').addClass('badge-autorizada');
    }

    if (datosPeticion['estado'] == 6) {
        $('#estadoPeticionTitulo').text('Pendent enviament');
        $('#estadoPeticionTitulo').addClass('badge-pendiente-envio');
    }

    if (datosPeticion['estado'] == 7) {
        $('#estadoPeticionTitulo').text('Enviada');
        $('#estadoPeticionTitulo').addClass('badge-enviada');
    }


    $('#myIdBocaResumen').text(peticionActual.details[0]['boca']);
    $('#myIdFilaResumen').text(peticionActual.details[0]['fila']);
    $('#myIdAsientoResumen').text(peticionActual.details[0]['asiento']);
    $('#myIdDescripcionResumen').text(peticionActual.details[0]['descripcion']);


    $('#myModalPeticionesVerAutorizador').modal('show');

}



function myAddTableRowResumenAutorizador() {

    let myTable = document.getElementById("myAssistentsTableResumenAutorizadorLogistica");

    listadoAsistentesAutorizadorLogistica.forEach(asistente => {

        let row = myTable.insertRow(-1);
        let cell1 = row.insertCell(0);
        let cell2 = row.insertCell(1);
        let cell3 = row.insertCell(2);
        let cell4 = row.insertCell(3);
        let cell5 = row.insertCell(4);
        let cell6 = row.insertCell(5);
        let cell7 = row.insertCell(6);

        cell1.innerHTML = asistente.nombre;
        cell2.innerHTML = asistente.apellidos;
        cell3.innerHTML = asistente.dni;
        cell4.innerHTML = moment(asistente.fecha_nacimiento).format('DD/MM/YYYY');
        cell5.innerHTML = nacionalidades.find(element => element.id == asistente.nationality_id).name;
        cell6.innerHTML = asistente.email;

        if (asistente.pivot.es_principal) {
            cell7.innerHTML = "✓";
        }
        else {
            cell7.innerHTML = "";
        }

    });

}


function autorizarPeticion(myId,mylevel) {

    Swal.fire({
        title: MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_AUTORIZAR_PETICION.autorizar_peticion__titulo,
        text: MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_AUTORIZAR_PETICION.autorizar_peticion__texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_AUTORIZAR_PETICION.autorizar_peticion__boton__confirmar,
        cancelButtonText: MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_AUTORIZAR_PETICION.autorizar_peticion__boton__cancelar
    }).then((result) => {

        if (result.value) {

            axios.put('/autorizarpeticion', {
                IDPeticion: myId,
                level: mylevel
            })
                .then(response => {

                    if (response.data.success) {
                        Swal.fire(
                            MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_AUTORIZAR_PETICION.todo_ok,
                            MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_AUTORIZAR_PETICION.todo_ok_peticion__texto,
                            'success'
                        )
                        $('#myEventSelectTable').DataTable().ajax.reload();

                        closeAllModalsAutorizador();
                        updateCountersAutorizador();

                    } else {
                        Swal.fire(
                            MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_AUTORIZAR_PETICION.error,
                            MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_AUTORIZAR_PETICION.ko,
                            'error'
                        )
                        closeAllModalsAutorizador();
                    }

                })
                .catch(function (error) {
                    console.log(error)
                });
        }
    })
}



// function cancelarPeticion(myId) {

//     Swal.fire({
//         title: 'Cancel-lar petició',
//         text: "Indica el motiu de la cancel.lació",
//         icon: 'error',
//         showCancelButton: true,
//         confirmButtonColor: '#129443',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Si, cancel.lar petició!',
//         cancelButtonText: 'No Cancel.lar'
//     }).then((result) => {

//         if (result.value) {

//             axios.put('/cancelarpeticion', {
//                 IDPeticion: myId,
//             })
//                 .then(response => {

//                     if (response.data.success) {
//                         Swal.fire(
//                             'Tot correcte!',
//                             'Petició Cancel.lada correctament',
//                             'success'
//                         )
//                         $('#myEventSelectTable').DataTable().ajax.reload();



//                     } else {
//                         Swal.fire(
//                             'Error!',
//                             'No ha sigut possible cancel.lar la petició',
//                             'error'
//                         )
//                     }

//                 })
//                 .catch(function (error) {
//                     console.log(error)
//                 });
//         }
//     })
// }

function modificarPeticionAutorizador(myId) {

    let myMotivo_edicion_id;
    let myMotivo_edicion_descripcion;

    myMotivo_edicion_id = $('#myMotivoSelectAutorizador').val();
    myMotivo_edicion_descripcion = $('#myDescripcionMotivoModificacion').val();

    let myRole = 0;

    if (isAutorizador) {
        myRole = 1;
    } else {
        myRole = 2;
    }

    if (isGestor) {
        myRole = 3;
    }
    
    Swal.fire({
        title: MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_MODIFICAR_PETICION.modificar_peticion__titulo,
        text: MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_MODIFICAR_PETICION.modificar_peticion__texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_MODIFICAR_PETICION.modificar_peticion__boton__confirmar,
        cancelButtonText: MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_MODIFICAR_PETICION.modificar_peticion__boton__cancelar
    }).then((result) => {

        if (result.value) {

            axios.put('/modificarpeticion', {
                IDPeticion: myId,
                userId: userID,
                role: myRole,
                motivo_edicion_id: myMotivo_edicion_id,
                motivo_edicion_descripcion: myMotivo_edicion_descripcion
            })
                .then(response => {

                    if (response.data.success) {
                        Swal.fire(
                            MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_MODIFICAR_PETICION.todo_ok,
                            MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_MODIFICAR_PETICION.todo_ok_peticion__texto,
                            'success'
                        )
                        $('#myEventSelectTable').DataTable().ajax.reload();
                        closeAllModalsAutorizador();
                        updateCountersAutorizador();

                    } else {
                        Swal.fire(
                            MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_MODIFICAR_PETICION.error,
                            MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_MODIFICAR_PETICION.ko,
                            'error'
                        )
                        closeAllModalsAutorizador();
                    }

                })
                .catch(function (error) {
                    console.log(error)
                });
        }
    })

}

function cancelarPeticionAutorizador(myId) {

    
    let myMotivo_edicion_id;
    let myMotivo_edicion_descripcion;

    myMotivo_edicion_id = $('#myMotivoCancelarSelectAutorizador').val();
    myMotivo_edicion_descripcion = $('#myDescripcionMotivoCancelar').val();

    let myRole = 0;

    if (isAutorizador) {
        myRole = 1;
    } else {
        myRole = 2;
    }

    if (isGestor) {
        myRole = 3;
    }

    Swal.fire({
        title: MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_CANCELAR_PETICION.cancelar_peticion__titulo,
        text: MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_CANCELAR_PETICION.cancelar_peticion__texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_CANCELAR_PETICION.cancelar_peticion__boton__confirmar,
        cancelButtonText: MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_CANCELAR_PETICION.cancelar_peticion__boton__cancelar
    }).then((result) => {

        if (result.value) {

            axios.put('/cancelarpeticionautorizador', {
                IDPeticion: myId,
                userId: userID,
                role: myRole,
                motivo_edicion_id: myMotivo_edicion_id,
                motivo_edicion_descripcion: myMotivo_edicion_descripcion
            })
                .then(response => {

                    if (response.data.success) {
                        Swal.fire(
                            MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_CANCELAR_PETICION.todo_ok,
                            MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_CANCELAR_PETICION.todo_ok_peticion__texto,
                            'success'
                        )
                        $('#myEventSelectTable').DataTable().ajax.reload();
                        closeAllModalsAutorizador();
                        updateCountersAutorizador();

                    } else {
                        Swal.fire(
                            MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_CANCELAR_PETICION.error,
                            MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_CANCELAR_PETICION.ko,
                            'error'
                        )

                    }

                })
                .catch(function (error) {
                    console.log(error)
                });
        }
    })
}

function closeAllModalsAutorizador() {
    $('#myModalPeticionesVerAutorizador').modal('hide');
    $('#myModalAutorizadorModificar').modal('hide');
    $('#myModalAutorizadorCancelar').modal('hide');
    $('#myModalLogisticaPeticionDetalles').modal('hide');
    $('#myModalLogisticaAsignarParaEnvio').modal('hide');

}
function closeModalPreviewYEnvio() {
    $('#myModalLogisticaAsignarParaEnvio').modal('hide');
}

function closeModifyModal() {
    $('#myModalAutorizadorModificar').modal('hide');
}

function closeCancelModal() {
    $('#myModalAutorizadorCancelar').modal('hide');
}

function closeAssignDetailsModal() {
    $('#myModalLogisticaPeticionDetalles').modal('hide');
}

function editarPeticionModal() {
    $('#myModalAutorizadorModificar').modal('show');
}

function cancelarPeticionModal() {
    $('#myModalAutorizadorCancelar').modal('show');
}



// guardar peticion sin realizarla, se graba para continuar despues
function saveInvitationLogistica() {

    peticionActual.details[0].boca = $('#myBocaLogistica').val();
    peticionActual.details[0].fila = $('#myFilaLogistica').val();
    peticionActual.details[0].asiento = $('#myAsientosLogistica').val();
    peticionActual.details[0].descripcion = $('#myDescripcionLogistica').val();
    peticionActual.details[0].zona_id = $('#myZonaPeticionLogistica').val();

    // editando peticion

    Swal.fire({
        title: MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_MODIFICAR__GUARDAR_PETICION.modificar_guardar_peticion__titulo,
        text: MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_MODIFICAR__GUARDAR_PETICION.modificar_guardar_peticion__texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_MODIFICAR__GUARDAR_PETICION.modificar_guardar_peticion__boton__confirmar,
        cancelButtonText: MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_MODIFICAR__GUARDAR_PETICION.modificar_guardar_peticion__boton__cancelar
    }).then((result) => {

        if (result.value) {

            axios.put('/savepeticionlogistica', {
                IDPeticion: peticionActual.data.id,
                boca: peticionActual.details[0].boca,
                fila: peticionActual.details[0].fila,
                asiento: peticionActual.details[0].asiento,
                descripcion: peticionActual.details[0].descripcion,
                zona_id: peticionActual.details[0].zona_id,
                estado: 6,
            })
                .then(response => {

                    if (response.data.success) {
                        myConfirmMessage = MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_MODIFICAR__GUARDAR_PETICION.todo_ok__peticion + peticionActual.data.codigo + MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_MODIFICAR__GUARDAR_PETICION.todo_ok__peticion__texto;
                        Swal.fire(
                            MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_MODIFICAR__GUARDAR_PETICION.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                    } else {
                        Swal.fire(
                            MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_MODIFICAR__GUARDAR_PETICION.error,
                            MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_MODIFICAR__GUARDAR_PETICION.ko,
                            'error'
                        )
                    }
                    $('#myEventSelectTable').DataTable().ajax.reload();
                    closeAllModalsAutorizador();

                    updateCountersAutorizador()
                })
                .catch(function (error) {
                    console.log(error)
                });

        }

    })


}



function updateCountersAutorizador() {

    if (isAutorizador) {

        axios.get('/checkinvitationscounterautorizador/' + userID)
            .then(response => {

                if (response.data.success) {

                    
                    $('#numPeticionsPendents').text(response.data.pendientes);
                    $('#numPeticionsAutoritzades').text(response.data.autorizadas);
                    $('#numPeticionsCancelades').text(response.data.canceladas);
                    $('#numPeticionsModificades').text(response.data.modificadas);
                    $('#numPeticionsEnviades').text(response.data.enviadas);
                    $('#numPeticionsTotalArea').text(response.data.num_area);


                } else {
                }

            })
            .catch(function (error) {
                console.log(error)
            });

    }


    if (isLogistica) {

        axios.get('/checkinvitationscountergestor')
            .then(response => {

                if (response.data.success) {

                    $('#numPeticionsPendents').text(response.data.pendientes);
                    $('#numPeticionsAutoritzades').text(response.data.autorizadas);
                    $('#numPeticionsCancelades').text(response.data.canceladas);
                    $('#numPeticionsModificades').text(response.data.modificadas);
                    $('#numPeticionsPendentsEnviar').text(response.data.pendientes_enviar);
                    $('#numPeticionsEnviades').text(response.data.total_enviadas);


                } else {
                }

            })
            .catch(function (error) {
                console.log(error)
            });

    }


    $('#myEventSelectTable').DataTable().ajax.reload();


}

function initUpdateCountersAutorizador() {
    $('#numPeticionsPendents').text('');
    $('#numPeticionsAutoritzades').text('');
    $('#numPeticionsCancelades').text('');
    $('#numPeticionsTotals').text('');
}





function cerrarModificarPeticionAutorizador() {
    $('#myModalAutorizadorModificar').modal('hide');
}