var myTableEventSelectedTable = "myEventSelectTable";
var table;

var codigoPeticion;
var data;

var dateEvent;
var datePeticio;
var eventName;
var eventID;

var quantitatInvitacions;
var zonaPeticio;
var zona_id;
var myInitZona_id;

var enNomDe;

var myStock = 0;
var myPending = 0;
var myTotalInvitationPrice = 0;

var myPrice = 0;

var myFinalidadID;
var myFinalidad;
var myTipoInvitacionID;
var myTipoInvitacion;
var email_secundario_peticion;
var listadoAsistentes = [];
var priceList = [];
var priceObj = {};
var fechaNoConfirmada;
var idiomaPeticion;
var registroAEditar;
var rowNumber;
//var listaNacionalidades = [];
var tipoCupo;
var cuposList = [];
var zoneListPeticiones = [];
var IDPeticion = 0;

var editPurposes = [];
var myCurrentState;

function inicializarTablaEventosParaHacerPeticiones() {


    table = $('#myEventSelectTable').DataTable({

        "scrollX": true,
        "ajax": {
            "url": "/events",
            "type": "GET",
            "datatype": "json"
        },

        "columns": [
            { "data": "activity_id", visible: false },
            { "defaultContent": " <a href='#' class='btn btn-primary btn-sm' id='select' style='width:100px;'>" + PANEL_SOLICITUD_PETICIONES_EVENTOS__TABLA__HEADERS.hacer_peticion_boton +"</a>" },
            { "data": "id_partido", title: PANEL_SOLICITUD_PETICIONES_EVENTOS__TABLA__HEADERS.codigo },
            { "data": "nombre", title: PANEL_SOLICITUD_PETICIONES_EVENTOS__TABLA__HEADERS.nombre },
            { "data": "type_id", visible: false },
            { "data": "jornada", visible:false, visible:false, title: PANEL_SOLICITUD_PETICIONES_EVENTOS__TABLA__HEADERS.jornada },
            {
                "data": "type_id",  visible:false, title: PANEL_SOLICITUD_PETICIONES_EVENTOS__TABLA__HEADERS.tipo_actividad,

                "render": function (data, type, row, meta) {

                    if (data == 1) return PANEL_SOLICITUD_PETICIONES_EVENTOS__TABLA__HEADERS.tipo_actividad_liga;
                    if (data == 3) return PANEL_SOLICITUD_PETICIONES_EVENTOS__TABLA__HEADERS.tipo_actividad_champions;
                    return PANEL_SOLICITUD_PETICIONES_EVENTOS__TABLA__HEADERS.tipo_actividad_no_definido;

                }

            },

            {
                data: "not_confirmed_date", visible: false,

                render: function (data, type, row, meta) {
                    fechaNoConfirmada = data;
                    return data;
                }

            },

            {
                "data": "fecha", title: PANEL_SOLICITUD_PETICIONES_EVENTOS__TABLA__HEADERS.fecha_evento,

                render: function (data, type, row, meta) {

                    if (fechaNoConfirmada == 1) return PANEL_SOLICITUD_PETICIONES_EVENTOS__TABLA__HEADERS.fecha_no_confirmada   ;
                    // return data;
                    return moment( data,'YYYY/MM/DD' ).format('DD/MM/YYYY') ;
                }

            },

            { "data": "hora", title: PANEL_SOLICITUD_PETICIONES_EVENTOS__TABLA__HEADERS.hora_evento },
            { "data": "ubicacion_id", visible:false ,  title: PANEL_SOLICITUD_PETICIONES_EVENTOS__TABLA__HEADERS.ubicacion_id },
        ],


        "language": tablesLang
    });


    $('#' + myTableEventSelectedTable).on('click', '#select', function (e) {
        e.preventDefault();

        let currentRow = $(this).closest("tr");

        let data = $('#myEventSelectTable').DataTable().row(currentRow).data();

        
        isEdit = false
        showModal(data);

    });
}

function inicializarTablaParaGestionPeticiones() {


    table = $('#myEventSelectTable').DataTable({
        "scrollX": true,
        "ajax": {
            "url": "/invitations/" + myUserID,
            "type": "GET",
            "datatype": "json"
        },

        "columns": [
            { "defaultContent": "  <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'>      </a>   <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectCancelar'></a>" },
            {
                "data": "estado", title: PETICIONARIO_PETICIONES__TABLA__HEADERS.estado,

                "render": function (data, type, row, meta) {
                    if (data == 1) return '<b class="badge badge-pendiente text-white">' + ESTADOS_PETICIONES.pendiente + '</b>';
                    if (data == 2) return '<b class="badge badge-en-proceso text-white">' + ESTADOS_PETICIONES.en_proceso + '</b>';
                    if (data == 3) return '<b class="badge badge-modificada text-white">' + ESTADOS_PETICIONES.modifiicada + '</b>';
                    if (data == 4) return '<b class="badge badge-cancelada text-white">' + ESTADOS_PETICIONES.cancelada + '</b>';
                    if (data == 5) return '<b class="badge badge-autorizada text-white">' + ESTADOS_PETICIONES.autorizada + '</b>';
                    if (data == 6) return '<b class="badge badge-pendiente-envio text-white">' + ESTADOS_PETICIONES.pendiente_asignar + '</b>';
                    if (data == 7) return '<b class="badge badge-enviada text-white">' + ESTADOS_PETICIONES.enviada + '</b>';
                    if (data == 10) return '<b class="badge badge-autorizada text-white">' + ESTADOS_PETICIONES.pendiente_doble_auth + '</b>';
                }

            },
            { "data": "codigo", title: PETICIONARIO_PETICIONES__TABLA__HEADERS.codigo },
            {
                "data": "fecha_peticion", title: PETICIONARIO_PETICIONES__TABLA__HEADERS.fecha_peticion,
                "render": function (data, type, row, meta) {
                    data = moment(data).format('DD/MM/YYYY')
                    return data
                }

            },
            { "data": "activity_id", visible:false, title: PETICIONARIO_PETICIONES__TABLA__HEADERS.competicion },
            { "data": "nombre_evento", title: PETICIONARIO_PETICIONES__TABLA__HEADERS.evento },
            {
                data: "not_confirmed_date", visible: false,

                render: function (data, type, row, meta) {
                    fechaNoConfirmada = data;
                    return data;
                }

            },

            {
                "data": "fecha_evento", title: PETICIONARIO_PETICIONES__TABLA__HEADERS.fecha_evento,

                render: function (data, type, row, meta) {

                    if (fechaNoConfirmada == 1) return PETICIONARIO_PETICIONES__TABLA__HEADERS.fecha_evento_no_confirmada;
                    return data;
                }

            },

            { "data": "hora_evento", title: PETICIONARIO_PETICIONES__TABLA__HEADERS.hora_evento },
            { "data": "cantidad", title: PETICIONARIO_PETICIONES__TABLA__HEADERS.cantidad },
            {
                "data": "price", visible:false, title: PETICIONARIO_PETICIONES__TABLA__HEADERS.precio,

                "render": function (data, type, row, meta) {
                    return data + ' €';
                }
            },
            { "data": "zona", title: PETICIONARIO_PETICIONES__TABLA__HEADERS.zona },
            { "data": "en_nombre_de", title: PETICIONARIO_PETICIONES__TABLA__HEADERS.en_nombre_de },

        ],

        "rowCallback": function (row, data, index) {
            let cellValue = data["estado"];
            let myEuros;
        },

        "language": tablesLang
    });


    // editar peticion
    $('#' + myTableEventSelectedTable).on('click', '#selectEdit', function (e) {
        e.preventDefault();
        let currentRow = $(this).closest("tr");
        let data = $('#myEventSelectTable').DataTable().row(currentRow).data();


        isEdit = true
        // funcion para procesar datos y mostrar ventana modal de edicion de peticion
        showModal(data);

    });


    // eliminar peticion
    $('#' + myTableEventSelectedTable).on('click', '#selectCancelar', function (e) {
        e.preventDefault();
        let currentRow = $(this).closest("tr");
        let data = $('#myEventSelectTable').DataTable().row(currentRow).data();
        cancelarPeticion(data);
    });

    updateCountersPeticionario();

}

function inicializarAsistentesPeticionesTemporal() {

    if (!tablaAsistentesPeticionInicializada) {

        tableAsistentesPeticion = $('#myAssistentsTable').DataTable({

            "scrollX": true,
            // scrollX: "100%",

            data: listadoAsistentes,

            "columns": [
                { data: listadoAsistentes.nombre, title: MODAL__PETICIONES__ASISTENTES__TABLA__HEADERS.nombre, className: 'text-center' },
                { data: listadoAsistentes.apellidos, title: MODAL__PETICIONES__ASISTENTES__TABLA__HEADERS.apellidos, className: 'text-center' },
                { data: listadoAsistentes.dni, title: MODAL__PETICIONES__ASISTENTES__TABLA__HEADERS.dni, className: 'text-center' },
                { data: listadoAsistentes.fecha_nacimiento, title: MODAL__PETICIONES__ASISTENTES__TABLA__HEADERS.fecha_nacimiento, className: 'text-center' },
                {
                    data: listadoAsistentes.nationality_id, title: MODAL__PETICIONES__ASISTENTES__TABLA__HEADERS.nacionalidad, className: 'text-center',

                    render: function (data, type, row, meta) {
                        return listaNacionalidades[data - 1];
                    }

                },
                { data: listadoAsistentes.email, title: MODAL__PETICIONES__ASISTENTES__TABLA__HEADERS.email, className: 'text-center' },
                {
                    data: listadoAsistentes.es_menor, title: MODAL__PETICIONES__ASISTENTES__TABLA__HEADERS.es_menor, className: 'text-center',

                    render: function (data, type, row, meta) {

                        if (data == true) {
                            return 'Si';
                        } else {
                            return 'No';
                        }

                    }

                },
                {
                    // data: listadoAsistentes.asistente_principal, title: MODAL__PETICIONES__ASISTENTES__TABLA__HEADERS.principal, className: 'text-center',
                    data: listadoAsistentes.asistenteTelefono, title: 'Teléfono', className: 'text-center',

                    // render: function (data, type, row, meta) {

                    //     if (data == true) {
                    //         return 'Si';
                    //     } else {
                    //         return 'No';
                    //     }
                    // }

                },
                {
                    data: listadoAsistentes.send_email, title: MODAL__PETICIONES__ASISTENTES__TABLA__HEADERS.enviar_email, visible: false,
                    render: function (data, type, row, meta) {

                        if (data == true) {
                            return 'Si';
                        } else {
                            return 'No';
                        }
                    }
                },
                { defaultContent: "<a href='#' class='btn btn-warning btn-sm feather icon-edit' id='selectEditar'></a>    <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectEliminar'></a>", className: 'text-center' }
            ],


            "language": tablesLang

        });
        tablaAsistentesPeticionInicializada = true
    }

    $('#myModalAsistentes').on('shown.bs.modal', function (e) {
        $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
    });


    // eliminar asistente
    $('#myAssistentsTable').on('click', '#selectEliminar', function (e) {

        let rowCount = $('#myAssistentsTable tr').length - 1;
        let currentGuest;
        currentGuest = rowCount;


        let myIndexToDelete = $(this).closest('tr').index()

        listadoAsistentes.splice(myIndexToDelete, 1)

        tableAsistentesPeticion
            .row($(this).parents('tr'))
            .remove()
            .draw();


        $('#remainingGuests').text('Assistent ' + currentGuest + ' de ' + quantitatInvitacions);

    });


    $('#myAssistentsTable').on('click', '#selectEditar', function (e) {

        $('#modoedicion').removeClass('d-none');
        $('#addasistente').addClass('d-none');
        $('#footerModalSolicitudInvitacion').addClass('d-none');


        rowNumber = tableAsistentesPeticion.row($(this).closest('tr')).index();
        registroAEditar = tableAsistentesPeticion.row($(this).closest('tr')).data();

        $('#myAssistentNom').val(registroAEditar[0]);
        $('#myAssistentCognoms').val(registroAEditar[1]);
        $('#myAssistentDni').val(registroAEditar[2]);
        $('#myAssistentDataNaixement').val(registroAEditar[3]);
        $('#myAssistentNacionalitat').val(registroAEditar[4]);
        $('#myAssistentEmail').val(registroAEditar[5]);

        if (registroAEditar[6] == true) {
            $('#esMenor').prop('checked', true);
        } else {
            $('#esMenor').prop('checked', false);
            $('#myAsistentePrincipalDiv').removeClass('d-none');
        }

        $('#myGuestPhone').val(registroAEditar[7]);

        // if (registroAEditar[7] == true) {
        //     $('#AssistentPrincipal').prop('checked', true);
        // } else {
        //     $('#AssistentPrincipal').prop('checked', false);
        // }

        // if (registroAEditar[8] == true) {
        //     $('#enviarEntradasMail').prop('checked', true);
        // } else {
        //     $('#enviarEntradasMail').prop('checked', false);
        // }

    });


    $('#esMenor').on("click", function () {

        if ($('#esMenor').is(":checked")) {
            $('#AssistentPrincipal').prop("checked", false);
            $('#myAsistentePrincipalDiv').addClass("d-none");
        } else {
            $('#myAsistentePrincipalDiv').removeClass("d-none");
        }

    });

    $('#myAssistentDataNaixement').mask('99/99/9999');

    $('#myAssistentDni').on("keyup", function () {

        if ($('#myAssistentDni').val().length > 8) {
            let searching = true;
            let myUserDniToCheck = $('#myAssistentDni').val();
            // check database

            if (searching) {
                axios.get('/guestcheck/' + myUserDniToCheck)
                    .then(response => {

                        // esta en prohibidos
                        if (response.data.forbbiden > 0 && response.data.acceso_prohibido) {

                            Swal.fire(
                                PETICIONARIO_PETICIONES__DIALOGO__CHECK_EXISTE_ASISTENTE_PROHIBIDO.error,
                                PETICIONARIO_PETICIONES__DIALOGO__CHECK_EXISTE_ASISTENTE_PROHIBIDO.ko,
                                'error'
                            )
                            $('#myAssistentDni').val('')
                            return;

                        } else {

                            if (response.data.mydata > 0) {

                                let myDate = moment(response.data.data[0].fecha_nacimiento).format('DD/MM/YYYY');

                                $('#myAssistentNom').val(response.data.data[0].nombre);
                                $('#myAssistentCognoms').val(response.data.data[0].apellidos);
                                $('#myAssistentDataNaixement').val(myDate);
                                $('#esMenor').prop('checked', response.data.data[0].es_menor == 1);
                                $('#myAssistentEmail').val(response.data.data[0].email);
                                $('#myAssistentNacionalitat').val(response.data.data[0].nationality_id);
                                $('#myGuestPhone').val(response.data.data[0].phone);

                            } else {
                            }
                        }

                        searching = false;

                    })
                    .catch(function (error) {
                        console.log(error)
                    });
            }

        } else {

            if ($('#myAssistentDni').val().length == 0) {

                $('#myAssistentNom').val('');
                $('#myAssistentCognoms').val('');
                $('#myAssistentDataNaixement').val('');
                $('#esMenor').prop('checked', 0);
                $('#myAssistentEmail').val('');
                $('#myAssistentNacionalitat').val(1);
                $('#myGuestPhone').val('');
            }
        }
    });

}



// editar registro asistente

function editarRegistro() {

    // validar campos añadir asistente

    if (($('#myAssistentNom').val().trim().length) < 1) {
        Swal.fire(
            PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.error,
            PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.nombre,
            'error'
        )
        return;
    }

    if (($('#myAssistentCognoms').val().trim().length) < 1) {
        Swal.fire(
            PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.error,
            PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.apellidos,
            'error'
        )
        return;
    }

    // if ((($('#myAssistentDni').val().trim().length) < 1) && (!$('#esMenor').is(":checked"))) {
    //     Swal.fire(
    //         PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.error,
    //         PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.dni,
    //         'error'
    //     )
    //     return;
    // }

    
    if ((($('#myAssistentEmail').val().trim().length) < 1)    ) {
        Swal.fire(
            PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.error,
            PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.email,
            'error'
        )
        return;
    }    
    
    if ((($('#myAssistentEmail').val().trim().length) > 0) &&  (!validateEmail($('#myAssistentEmail').val() ))   ) {
        Swal.fire(
            PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.error,
            PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.email_incorrecto,
            'error'
        )
        return;
    }

    // if (!validarFecha($('#myAssistentDataNaixement').val())) {
    //     Swal.fire(
    //         'Error!',
    //         "La data de naixament no es correcte",
    //         'error'
    //     )
    //     return;
    // }


    myNewDataEdited = [
        $('#myAssistentNom').val(),
        $('#myAssistentCognoms').val(),
        $('#myAssistentDni').val(),
        $('#myAssistentDataNaixement').val(),
        $('#myAssistentNacionalitat').val(),
        $('#myAssistentEmail').val(),
        $('#esMenor').is(":checked"),
        // $('#AssistentPrincipal').is(":checked"),
        $('#myGuestPhone').val(),        
        // $('#enviarEntradasMail').is(":checked")
    ];


    tableAsistentesPeticion
        .row(rowNumber)
        .data(
            myNewDataEdited
        )
        .draw();


    $('#myAssistentNom').val(''),
        $('#myAssistentCognoms').val(''),
        $('#myAssistentDni').val(''),
        $('#myAssistentDataNaixement').val(''),
        $('#myAssistentNacionalitat').val(1),
        $('#myAssistentEmail').val(''),
        $('#esMenor').is(":checked"),
        $('#AssistentPrincipal').prop('checked', false);
        $('#myGuestPhone').val(''),
        
    // $('#enviarEntradasMail').prop('checked', false);


    $('#modoedicion').addClass('d-none');
    $('#addasistente').removeClass('d-none');
    $('#footerModalSolicitudInvitacion').removeClass('d-none');

}

// cancelar edicion de resitro de asistente
function cancelarEdicion() {

    $('#myAssistentNom').val(''),
        $('#myAssistentCognoms').val(''),
        $('#myAssistentDni').val(''),
        $('#myAssistentDataNaixement').val(''),
        $('#myAssistentNacionalitat').val(1),
        $('#myAssistentEmail').val(''),
        $('#esMenor').is(":checked"),
        $('#AssistentPrincipal').prop('checked', false);
        $('#myGuestPhone').val(''),
        
    $('#enviarEntradasMail').prop('checked', false);

    $('#modoedicion').addClass('d-none');
    $('#addasistente').removeClass('d-none');
    $('#footerModalSolicitudInvitacion').removeClass('d-none');
}

// mostrar ventana modal

function showModal(data) {
    isAutorizador = false
    isLogistica = false     

    peticionActual.nombre_evento = data.nombre 
    peticionActual.fecha_evento = moment(data.fecha).format('DD/MMYYYY')
    peticionActual.hora_evento =  moment( data.hora,'HH:mm' ).format('HH:mm')
    peticionActual.not_confirmed_date = data['not_confirmed_date']
    peticionActual.userName = userName
    peticionActual.userEmail = userEmail
    peticionActual.phone = data.phone

   

    myEventLevelForInvitation = data['level']
    
    
    myactivity_id_nivel_cero = data['activity_id'];
    mytype_id_nivel_cero = data['type_id'];
    myevent_id_nivel_cero = data['id'];

    myCurrentState = data['estado'];
    // traer asistentes
    myInitZona_id = data['zona_id'];

    console.log ('isedit' , isEdit)

    if (isEdit) {
        axios.put('/editarpeticionpeticionario', {
            IDPeticion: data['id'],
        }).then(response => {

            if (response.data.success) {

                

                peticionActual.nombre_evento = response.data.nombre
              
                let myDateFromEvent = response.data.fecha
                 peticionActual.fecha_evento = moment(myDateFromEvent).format('DD/MMYYYY')

                let myTimeFromEvent = response.data.hora
                 peticionActual.hora_evento =  moment( myTimeFromEvent,'HH:mm' ).format('HH:mm')
              
                peticionActual.not_confirmed_date = response.data.not_confirmed_date

                

                listadoAsistentes = [];
                listadoAsistentes = response.data.guests;
                for (let i = 0; i < listadoAsistentes.length; i++) {
                    listadoAsistentes[i].asistente_principal = listadoAsistentes[i]['pivot'].es_principal;
                    listadoAsistentes[i].send_email = listadoAsistentes[i]['pivot'].send_email;
                }

                editPurposes = [];
                editPurposes = response.data.editpurposes;

                
                myEventLevelForInvitation = response.data.level   

                myactivity_id_nivel_cero = response.data['activity_id'];
                mytype_id_nivel_cero = response.data['type_id'];
                myevent_id_nivel_cero = response.data['event_id'];


                

                if (isEdit) {

                    // si esta editada o modificada mostrar alerta

                    if (data['tipo_edicion'] == 0) {
                        $('#peticionModificadaDiv').addClass('d-none');
                        $('#peticionCanceladaDiv').addClass('d-none');

                        $('#orderModalSaveButton').removeClass('d-none');

                        $('#orderAsistentesSaveButton').removeClass('d-none');

                        $('#orderAsistentesSaveAndSendButton').removeClass('d-none');

                        $('#addGuestPanelDiv').removeClass('d-none');

                    }

                    if ((data['tipo_edicion'] == 1)) {

                        $('#peticionModificadaDiv').removeClass('d-none');
                        $('#peticionCanceladaDiv').addClass('d-none');

                        $('#orderModalSaveButton').removeClass('d-none');

                        $('#orderAsistentesSaveButton').removeClass('d-none');
                        $('#orderAsistentesSaveAndSendButton').removeClass('d-none');

                        $('#addGuestPanelDiv').removeClass('d-none');

                        let myEditPurpose = editPurposes.find(element => element.id == data.motivo_edicion_id).name;

                        $('#motivoModificacion').text(myEditPurpose);

                        $('#descripcionMotivoModificacion').text(data.motivo_edicion_descripcion);
                        $('#autorModificacion').text(response.data.user_edicion_name);

                        let myUserRol = '';
                        if (data.user_edicion_rol == 1) {
                            myUserRol = 'Autoritzador';
                        }

                        if (data.user_edicion_rol == 2) {
                            myUserRol = 'Logística';
                        }

                        if (data.user_edicion_rol == 3) {
                            myUserRol = 'Gestor';
                        }

                        $('#departamentoAutorModificacion').text(myUserRol);
                    }

                    if (data['tipo_edicion'] == 2) {

                        $('#peticionModificadaDiv').addClass('d-none');
                        $('#peticionCanceladaDiv').removeClass('d-none');

                        $('#orderModalSaveButton').addClass('d-none');

                        $('#orderAsistentesSaveButton').addClass('d-none');
                        $('#orderAsistentesSaveAndSendButton').addClass('d-none');

                        $('#addGuestPanelDiv').addClass('d-none');

                        let myEditPurpose = editPurposes.find(element => element.id == data.motivo_edicion_id).name;

                        $('#motivoCancelacion').text(myEditPurpose);

                        $('#descripcionMotivoCancelacion').text(data.motivo_edicion_descripcion);
                        $('#autorCancelacion').text(response.data.user_edicion_name);

                        let myUserRol = '';
                        if (data.user_edicion_rol == 1) {
                            myUserRol = 'Autoritzador';
                        }

                        if (data.user_edicion_rol == 2) {
                            myUserRol = 'Logística';
                        }

                        $('#departamentoAutorCancelacion').text(myUserRol);
                    }


                    if (data['tipo_edicion'] == 2) {
                        $('#peticionModificadaDiv').addClass('d-none');
                    }

                    if ((data['estado'] == 5) || (data['estado'] == 6) || (data['estado'] == 7)) {

                        $('#orderModalSaveButton').addClass('d-none');
                        $('#orderAsistentesSaveButton').addClass('d-none');
                        $('#orderAsistentesSaveAndSendButton').addClass('d-none');
                        $('#peticionModificadaDiv').addClass('d-none');
                        $('#addGuestPanelDiv').addClass('d-none');
                    }
                }

            } else {
            }

        })
            .catch(function (error) {
                console.log(error)
            });
    }

    // cantidad de entradas antes de editar
    if (isEdit) {
        oldValueCantidad = data['cantidad'];
    } else {
        oldValueCantidad = 0;
    }

    // tipo de cupo , generico o por departamento zona
    tipoCupo = Number(data['tipo_cupo']);

    if (isEdit) {
        codigoPeticion = data['codigo']
        IDPeticion = data['id']
    } else {
        codigoPeticion = '';
        IDPeticion = 0;
    }

    eventName = data['nombre'];
    if (isEdit) eventName = data['nombre_evento'];

    eventID = data['id'];
    if (isEdit) eventID = data['event_id'];

    enNomDe = data['en_nombre_de'];

    if (isEdit) {
        myFinalidadID = data['finalidad_id'];
        myTipoInvitacionID = data['tipo_invitacion_id'];
        idiomaPeticion = data['language_id'];
        zona_id = data['zona_id'];
        email_secundario_peticion = data['email_secundario_peticion'];
    }

    // tipo cupo generico

    if (tipoCupo == 1) {

        // carga de zonas

        axios.get('/eventzone/' + eventID)
            .then(response => {

                if (response.data) {

                    priceList = [];
                    zoneListPeticiones = [];

                    $("#myZona").find('option')
                        .remove()
                        .end();

                    response.data.data.forEach(zona => {
                        $('<option>', {
                            value: zona.zone_id,
                            // text: zona.nombre + " " + zona.price + " €",
                            text: zona.nombre,
                        }).appendTo('#myZona');
                        priceList.push(zona.price);
                        zoneListPeticiones.push(zona.zone_id);
                    });


                } else {
                }


                // comprobar stock del departamento

                axios.get('/eventdepartmentgeneric/' + eventID + '/' + userDepartmentID)
                    .then(response => {

                        if (response.data.success) {

                            if (response.data.data.length > 0) {
                                myStock = response.data.data[0]['cupo'];
                                $('#myStock').text(myStock);

                            } else {
                                myStock = 0;
                                $('#myStock').text(myStock);
                            }



                            // carga de selects finalidad, motivo, idioma, nacionalidad
                            cargaSelectsPeticion()

                            // selectPrice();
                            // myChangeNumberOfTickets();

                        } else {
                            myStock = 0;
                            $('#myStock').text(myStock);
                        }



                    })
                    .catch(function (error) {
                        console.log(error)
                    });

            })
            .catch(function (error) {
                console.log(error)
            });


    }


    // tipo cupo por zona y departamento

    if (tipoCupo == 2) {
        // filtrar zonas con cupos disponibles que no sean 0
        // carga de zonas

        axios.get('/eventdepartmentzone/' + eventID + '/' + userDepartmentID)
            .then(response => {

                if (response.data) {

                    priceList = [];
                    cuposList = [];
                    zoneListPeticiones = [];

                    $("#myZona").find('option')
                        .remove()
                        .end();


                    response.data.prices.forEach((price, index) => {

                        if (response.data.zones[index].cupo > 0) {
                            priceList.push(price.price);
                        }

                    })

                    var myTempIndex = 0;

                    response.data.zones.forEach((zona, index) => {
                        if (zona.cupo > 0) {
                            $('<option>', {
                                value: zona.zone_id,
                                // text: zona.nombre + " " + priceList[myTempIndex] + " €",
                                text: zona.nombre
                            }).appendTo('#myZona');

                            myTempIndex++;
                            cuposList.push(zona.cupo);
                            zoneListPeticiones.push(zona.zone_id);
                        }
                    });

                    // carga de selects finalidad, motivo, idioma, nacionalidad
                    cargaSelectsPeticion()

                } else {
                }

            })
            .catch(function (error) {
                console.log(error)
            });

    }


    if (!isEdit) {
        listadoAsistentes = [];
    }


    $('#codiPeticio').text(codigoPeticion);

    var myDate = new Date();
    var dd = String(myDate.getDate()).padStart(2, '0');
    var mm = String(myDate.getMonth() + 1).padStart(2, '0');
    var yyyy = myDate.getFullYear();

    myDate = dd + '/' + mm + '/' + yyyy;

    if (data['not_confirmed_date'] == 0) {
        if (isEdit) {
            dateEvent = data['fecha_evento']
        } else {
            dateEvent = data['fecha']
        }
        $('#myDataEsdeveniment').text(dateEvent);
    } else {
        dateEvent = 'Sense confirmar';
        $('#myDataEsdeveniment').text('Sense confirmar');
    }

    if (!isEdit) {
        datePeticio = myDate;
        $('#dataPeticio').text(datePeticio);
    } else {
        datePeticio = data['fecha_peticion'];
        $('#dataPeticio').text(moment(datePeticio).format('DD/MM/YYYY'));
    }

    $('#myEsdeveniment').text(eventName);


    if (!isEdit) {
        $('#peticionModificadaDiv').addClass('d-none');
        $('#peticionCanceladaDiv').addClass('d-none');
    }

    // show modal ----------

    $('#myStock').text(myStock);
    $('#myPending').text(myPending);

    // init ventana asistentes , clean fields

    $('#myAssistentNom').val('');
    $('#myAssistentCognoms').val('');
    $('#myAssistentDni').val('');
    $('#myAssistentDataNaixement').val('');

    $('#myAssistentEmail').val('');
    $('#esMenor').prop('checked', false);
    $('#AssistentPrincipal').prop('checked', false);
    $('#enviarEntradasMail').prop('checked', false);

    if (!isEdit) {
        $('#AssistentPrincipal').prop('checked', false);
        $('#AssistentPrincipal').prop("checked", false);
        $('#myAsistentePrincipalDiv').removeClass("d-none");
    }

    setTimeout(function () {

        if (isEdit) {
            zona_id = data['zona_id'];
            $('#myZona').val(zona_id)
        }
    }, 500);


    $('#myModal').modal('show');
    // ----------------------------------

    if (emailPeticionNivelCeroEditortInitialized == 0) {
        initCKEditorEmailPeticionNivelCero()
    }

}


function initCKEditorEmailPeticionNivelCero() {

    var EDITOR = CKEDITOR.replace('editorPeticionNivelCeroEnvioEmailFinal', {
        filebrowserUploadUrl: '/ckeditor/image_upload?type=Images&_token=' + myCSRFToken,
        filebrowserUploadMethod: 'form',
        height: 500
    });

    CKEDITOR.config.language = APPCESS_APP_LANG;
    CKEDITOR.config.removePlugins = 'about';

    emailPeticionNivelCeroEditortInitialized = 1
}

function inicializarValores() {


    if (!isEdit) {

        $('#modalPeticionHeader').text( MODAL__SOLICITUD_PETICIONES__MODAL_1.titulo_modal__nueva );

        $('#myEnNomDe').val('');

        $('#myFinalitatSelect').val(1);
        $('#myTipus').val(1);
        $('#myIdiomaPeticion').val(1);


        $('#myQuantitat').val(oldValueCantidad);

        $('#myZona').val(zoneListPeticiones[0]);


    } else {

        $('#modalPeticionHeader').text(MODAL__SOLICITUD_PETICIONES__MODAL_1.titulo_modal__modificar)

        $('#myEnNomDe').val(enNomDe);

        $('#myFinalitatSelect').val(myFinalidadID);
        $('#myTipus').val(myTipoInvitacionID);
        $('#myIdiomaPeticion').val(idiomaPeticion);

        $('#myQuantitat').val(oldValueCantidad);
        $('#myZona').val(zona_id);

    }

    selectPrice();
    myChangeNumberOfTickets();

}

// carga de los selects de la peticion y montaje de listas

function cargaSelectsPeticion() {
    axios.get('/purposes')
        .then(response => {

            if (response.data) {

                $("#myFinalitatSelect").find('option')
                    .remove()
                    .end();

                response.data.purposes.forEach(purpose => {
                    $('<option>', {
                        value: purpose.id,
                        text: purpose.name,
                    }).appendTo('#myFinalitatSelect');

                });


                $("#myTipus").find('option')
                    .remove()
                    .end();

                response.data.invitationtypes.forEach(invitationtype => {
                    $('<option>', {
                        value: invitationtype.id,
                        text: invitationtype.nombre,
                    }).appendTo('#myTipus');

                });

                $("#myIdiomaPeticion").find('option')
                    .remove()
                    .end();

                response.data.languages.forEach(language => {
                    $('<option>', {
                        value: language.id,
                        text: language.name,
                    }).appendTo('#myIdiomaPeticion');

                });

                $("#myAssistentNacionalitat").find('option')
                    .remove()
                    .end();

                listaNacionalidades = [];

                response.data.nationalities.forEach(nationality => {
                    $('<option>', {
                        value: nationality.id,
                        text: nationality.name,
                    }).appendTo('#myAssistentNacionalitat');
                    listaNacionalidades.push(nationality.name)
                });

                $('#myAssistentNacionalitat').val(1);

                // inicializar campos peticion o mostrar valores a editar

                inicializarValores();

            } else {
            }
        })
        .catch(function (error) {
            console.log(error)
        });

}

// mostrar ventana modal de asistentes

function showModalAsistentes() {

    quantitatInvitacions = $('#myQuantitat').val();
    enNomDe = $('#myEnNomDe').val();

    if (enNomDe.trim().length < 1) {
        Swal.fire(
            PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.error,
            PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.en_nombre_de,
            'error'
        )
        return false;
    }

    if (quantitatInvitacions < 1) {
        Swal.fire(
            PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.error,
            PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.invitaciones_cero,
            'error'
        )
        return false;
    }

    if (quantitatInvitacions > myStock) {
        Swal.fire(
            PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.error,
            PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.invitaciones_insuficientes,
            'error'
        )
        return false;
    }


    $('#codigoPeticion').text(codigoPeticion);

    $('#myDataEsdeveniment2').text(dateEvent);
    $('#myEsdeveniment2').text(eventName);

    if (!isEdit) {
        $('#dataPeticio2').text(datePeticio);
    } else {
        $('#dataPeticio2').text(moment(datePeticio).format('DD/MM/YYYY'));
    }


    $('#myQuantitat2').text(quantitatInvitacions);

    $('#myEnNomDe2').text(enNomDe);

    $('#myAssistentsTitle').text(eventName + ' ' + dateEvent)

    $('#myTipus2').text(enNomDe);

    myFinalitat2 = $('#myFinalitatSelect option:selected').text();
    myTipus2 = $('#myTipus option:selected').text();
    myZona2 = $('#myZona option:selected').text();

    $('#myFinalitat2').text(myFinalitat2);
    $('#myTipus2').text(myTipus2);
    $('#myZona2').text(myZona2);

    $('#myPending2').text(myPending);

    $('#myTotalInvitationPriceAssistents').text(myTotalInvitationPrice + ' €');

    myFinalitat2 = $('#myFinalitatSelect option:selected').text();
    myTipus2 = $('#myTipus option:selected').text();
    myZona2 = $('#myZona option:selected').text();

    myFinalidadID = $('#myFinalitatSelect').val();
    myTipoInvitacionID = $('#myTipus').val();

    tableAsistentesPeticion.clear().draw();
    idiomaPeticion = $('#myIdiomaPeticion').val();

    $('#remainingGuests').text(MODAL__SOLICITUD_PETICIONES__MODAL_2.label_asistente + ' de ' + quantitatInvitacions);

    // si es edicion montar tabla asisentes


    listadoAsistentes.forEach(asistente => {

        let myGoodDate;

        if (asistente.fecha_nacimiento != null) {

            // asistente.fecha_nacimiento = moment(asistente.fecha_nacimiento).format('DD/MM/YYYY');

            if (moment(asistente.fecha_nacimiento, 'DD/MM/YYYY', true).isValid()) {

                myGoodDate = asistente.fecha_nacimiento
            } else {
                myGoodDate = moment(asistente.fecha_nacimiento).format('DD/MM/YYYY');
            }

        } else {
            asistente.fecha_nacimiento = ''
            myGoodDate = "";
        }

        tableAsistentesPeticion.row.add(
            [
                asistente.nombre,
                asistente.apellidos,
                asistente.dni,
                myGoodDate,
                asistente.nationality_id,
                asistente.email,
                asistente.es_menor,
                asistente.asistente_principal,
                asistente.send_email,
            ]
        ).draw();

    });



    // show modal ----------

    if (isEdit) {

        $('#emailSecundarioPeticion').val(email_secundario_peticion);

    }

    // si es nivel 0 traer la plantilla
    if (myEventLevelForInvitation == 0) {
        

         mytipo_invitacion_id_nivel_cero = $('#myTipus').val();
         mylanguage_id_nivel_cero = $('#myIdiomaPeticion').val();

    
        templateAvailable = false
    
        axios.get('/geteventtemplate/' + myactivity_id_nivel_cero + '/' + mytype_id_nivel_cero + '/' + mytipo_invitacion_id_nivel_cero + '/' + mylanguage_id_nivel_cero + '/' + myevent_id_nivel_cero)
            .then(response => {
    
                
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
    }


    $('#myModalAsistentes').modal('show');

}

// cerrar resumen de la peticion

function closeResumenPeticion() {
    $('#myModalPeticionesResumen').modal('hide');
}

// mostrar ventana modal de resumen

function showModalResumen() {
    quantitatInvitacions = $('#myQuantitat').val();
    enNomDe = $('#myEnNomDe').val();

    $('#codigoPeticionResumen').text(codigoPeticion);

    $('#myDataEsdevenimentResumen').text(dateEvent);
    $('#myEsdevenimentResumen').text(eventName);


    if (quantitatInvitacions > listadoAsistentes.length) {

        Swal.fire({
            title: PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.error,
            text: PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.faltan_asistentes,
            icon: 'warning',

            confirmButtonColor: '#129443',

            confirmButtonText: PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.cerrar
        });
        return;
    }



    if (!isEdit) {
        $('#dataPeticioResumen').text(datePeticio);

  

    } else {
        $('#dataPeticioResumen').text(moment(datePeticio).format('DD/MM/YYYY'));

        $('#emailSecundarioPeticion').val(email_secundario_peticion);
    }

    $('#myQuantitatResumen').text(quantitatInvitacions);

    $('#myEnNomDeResumen').text(enNomDe);

    $('#myAssistentsTitleResumen').text(eventName + ' ' + dateEvent)

    $('#myTipusResumen').text(enNomDe);

    myFinalitat2 = $('#myFinalitatSelect option:selected').text();
    myTipus2 = $('#myTipus option:selected').text();
    myZona2 = $('#myZona option:selected').text();


    myFinalidadID = $('#myFinalitatSelect').val();
    myTipoInvitacionID = $('#myTipus').val();


    $('#myFinalitatResumen').text(myFinalitat2);
    $('#myTipusResumen').text(myTipus2);
    $('#myZonaResumen').text(myZona2);

    $('#myPendingResumen').text(myPending);

    $('#myTotalInvitationPriceAssistentsResumen').text(myTotalInvitationPrice + ' €');

    // $('#emailSecundarioPeticion').val(email_secundario_peticion);

    if (isEdit) {

        $('#emailSecundarioPeticion').val(email_secundario_peticion);

    }

    myAddTableRowResumen();

    // show modal ----------

    if (myEventLevelForInvitation == 0) {
        $('#botonEnviarAsignarPeticion').text('Enviar')

    } else {
        $('#botonEnviarAsignarPeticion').text('Enviar')
    }

    peticionActual.cantidad = quantitatInvitacions
    peticionActual.zona = $('#myZona option:selected').text()

    $('#myModalPeticionesResumen').modal('show');

}

// seleccion de precios en funcion del tipo de zona y tipo de cupo
function selectPrice() {

    var myValue = $('#myZona').prop('selectedIndex');


    if (tipoCupo == 2) {
        myStock = cuposList[myValue];
        $('#myStock').text(myStock);
    }

    myPrice = priceList[myValue];

    zona_id = zoneListPeticiones[myValue];

    myChangeNumberOfTickets();

}

// cerrar ventana modal asistentes

function closeAsistentesModal() {
    $('#myModalAsistentes').modal('hide');
}

// cerrar todas las ventanas modales

function closeModals() {

    $('#myModal').modal('hide');
    $('#myModalAsistentes').modal('hide');
    $('#myModalPeticionesResumen').modal('hide');
    $('#myModalPeticionNivelCeroAsignarParaEnvio').modal('hide');

    $('#myEventSelectTable').DataTable().ajax.reload();

    updateCountersPeticionario();

}

function closeEdiorPeticionNivelCero()
{
    $('#myModalPeticionNivelCeroAsignarParaEnvio').modal('hide');
}

function closeMainModal() {


    if ((myCurrentState == 4) || (myCurrentState == 5) || (myCurrentState == 6) || (myCurrentState == 7)) {
        $('#myModal').modal('hide');
        $('#myModalAsistentes').modal('hide');
        $('#myModalPeticionesResumen').modal('hide');
    } else {

        Swal.fire({
            title: PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.cerrar,
            html: PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.cerrar_sin_grabar,

            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#129443',
            cancelButtonColor: '#d33',
            confirmButtonText: PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.si_cerrar,
            cancelButtonText: PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.boton_cancelar
        }).then((result) => {

            if (result.value) {

                $('#myModal').modal('hide');
                $('#myModalAsistentes').modal('hide');
                $('#myModalPeticionesResumen').modal('hide');
                $('#myEventSelectTable').DataTable().ajax.reload();

            }

        })
    }
}

// añadir asistentes a tabla de asistentes

function myAddTableRow() {

    var myTotalRows = tableAsistentesPeticion.rows().count();

    if ((myTotalRows >= quantitatInvitacions)) {

        $('#remainingGuests').text('');

        Swal.fire(
            PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.error,
            PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.no_mas_asistentes,
            'error'
        )
        return;
    }


    // validar campos añadir asistente

    if (($('#myAssistentNom').val().trim().length) < 1) {
        Swal.fire(
            PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.error,
            PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.nombre,
            'error'
        )
        return;
    }

    if (($('#myAssistentCognoms').val().trim().length) < 1) {
        Swal.fire(
            PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.error,
            PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.apellidos,
            'error'
        )
        return;
    }

    // if ((($('#myAssistentDni').val().trim().length) < 1) && (!$('#esMenor').is(":checked"))) {
    //     Swal.fire(
    //         PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.error,
    //         PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.dni,
    //         'error'
    //     )
    //     return;
    // }

    if ((($('#myAssistentEmail').val().trim().length) < 1)    ) {
        Swal.fire(
            PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.error,
            PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.email,
            'error'
        )
        return;
    }    
    
    if ((($('#myAssistentEmail').val().trim().length) > 0) &&  (!validateEmail($('#myAssistentEmail').val() ))   ) {
        Swal.fire(
            PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.error,
            PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.email_incorrecto,
            'error'
        )
        return;
    }
    


    // if (!validarFecha($('#myAssistentDataNaixement').val())) {
    //     Swal.fire(
    //         'Error!',
    //         "La data de naixament no es correcte",
    //         'error'
    //     )
    //     return;
    // }

    var myObj = {};

    var asistenteNombre;
    var asistenteApellido;
    var asistenteDni;
    var asistenteFechaNacimiento;
    var asistenteNacionalidad;
    var asistenteEmail;
    var asistenteTelefono;
    var asistentePrincipal;
    var myAsistentePrincipal = false;

    asistenteNombre = $('#myAssistentNom').val();
    asistenteApellido = $('#myAssistentCognoms').val();
    asistenteDni = $('#myAssistentDni').val();
    asistenteFechaNacimiento = $('#myAssistentDataNaixement').val();
    asistenteNacionalidad = $('#myAssistentNacionalitat').val();
    asistenteEmail = $('#myAssistentEmail').val();
    asistenteTelefono = $('#myGuestPhone').val();


    var emailYaExiste = false;
    var valorEsMenorCheckBox = $('#esMenor').is(":checked")
   
    // comprobar email duplicado en peticion
    // listadoAsistentes.forEach(element => {
    //     if ((element.email == asistenteEmail)  && (!valorEsMenorCheckBox) ) {
    //         emailYaExiste = true;
    //     }
    // });

    listadoAsistentes.forEach(element => {
        if ( (element.email == asistenteEmail) ) {
            emailYaExiste = true;
        }
    });

    if (emailYaExiste) {
        
        Swal.fire(
            PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.error,
            PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.asistente_ya_existe_en_peticion,
            'error'
        )
        return;
    }


    // var dniYaExiste = false;
    // listadoAsistentes.forEach(element => {
    //     if ( (element.dni == asistenteDni)   && (!valorEsMenorCheckBox) ) {
    //         dniYaExiste = true;
    //     }
    // });

    // if (dniYaExiste) {
    //     Swal.fire(
    //         PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.error,
    //         PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.dni_ya_existe_en_peticion,
    //         'error'
    //     )
    //     return;
    // }


    if ($('#AssistentPrincipal').is(":checked")) {
        asistentePrincipal = "✓";
        myAsistentePrincipal = true;
    }
    else {
        asistentePrincipal = "";
        myAsistentePrincipal = false;
    }

    var myId = listadoAsistentes.length + 1;

    listadoAsistentes.push(
        {
            nombre: asistenteNombre,
            apellidos: asistenteApellido,
            dni: asistenteDni,
            fecha_nacimiento: asistenteFechaNacimiento,
            nationality_id: asistenteNacionalidad,
            email: asistenteEmail,
            es_menor: $('#esMenor').is(":checked") ? true : false,
            asistente_principal: myAsistentePrincipal,
            asistenteTelefono: asistenteTelefono,
            send_email: $('#enviarEntradasMail').is(":checked") ? true : false,
        }
    )

    tableAsistentesPeticion.row.add(
        [
            asistenteNombre,
            asistenteApellido,
            asistenteDni,
            asistenteFechaNacimiento,
            asistenteNacionalidad,
            asistenteEmail,
            $('#esMenor').is(":checked") ? true : false,
            // $('#AssistentPrincipal').is(":checked") ? true : false,
            asistenteTelefono,
            // $('#enviarEntradasMail').is(":checked") ? true : false,
        ]
    ).draw();

    // clear fields

    $('#myAssistentNom').val('');
    $('#myAssistentCognoms').val('');
    $('#myAssistentDni').val('');
    $('#myAssistentEmail').val('');
    $('#myAssistentDataNaixement').val('');
    $('#myAssistentNacionalitat').val(1);

    $('#EnviarEmailA').val('');

    $('#AssistentPrincipal').prop("checked", false);
    $('#enviarEntradasMail').prop("checked", false);
    $('#esMenor').prop("checked", false);

    var rowCount = $('#myAssistentsTable tr').length - 1;
    $('#myNumerGuests').text(rowCount);

    var currentGuest = rowCount + 1;

    if (currentGuest <= quantitatInvitacions) {
        $('#remainingGuests').text('Assistent ' + currentGuest + ' de ' + quantitatInvitacions);
    } else {
        $('#remainingGuests').text('');
    }
    $('#myGuestPhone').val('');
}

// resumen de los asistentes

function myAddTableRowResumen() {

    var myTableResumenAsistentes = document.getElementById("myAssistentsTableResumen");

    $("#myAssistentsTableResumen tr").remove();
    listadoAsistentes = [];

    tableAsistentesPeticion.rows().every(function () {
        var d = this.data();
        var myGuest = {};

        var row = myTableResumenAsistentes.insertRow(-1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        var cell7 = row.insertCell(6);


        cell1.innerHTML = d[0];
        cell2.innerHTML = d[1];
        cell3.innerHTML = d[2];
        cell4.innerHTML = d[3];
        cell5.innerHTML = listaNacionalidades[d[4] - 1];
        cell6.innerHTML = d[5];

        cell7.innerHTML = (d[6]) ? 'Si' : 'No';


        myGuest = {
            nombre: d[0],
            apellidos: d[1],
            dni: d[2],
            fecha_nacimiento: d[3],
            nationality_id: d[4],
            email: d[5],
            es_menor: d[6],
            // asistente_principal: d[7],
            asistente_principal: false,
            asistenteTelefono: d[7],
            send_email: false
        }

        listadoAsistentes.push(myGuest);

    });

    console.log (listadoAsistentes)
    $('#myAssistentsTableResumen').prepend('<tr> <td>' + MODAL__PETICIONES__ASISTENTES__RESUMEN__TABLA__HEADERS.nombre+'</td><td>' +MODAL__PETICIONES__ASISTENTES__RESUMEN__TABLA__HEADERS.apellidos+'</td><td>' +MODAL__PETICIONES__ASISTENTES__RESUMEN__TABLA__HEADERS.dni+' </td> <td>' + MODAL__PETICIONES__ASISTENTES__RESUMEN__TABLA__HEADERS.fecha_nacimiento+'</td><td>' +MODAL__PETICIONES__ASISTENTES__RESUMEN__TABLA__HEADERS.nacionalidad+'</td>  <td>' +MODAL__PETICIONES__ASISTENTES__RESUMEN__TABLA__HEADERS.email+'</td>  <td>' +MODAL__PETICIONES__ASISTENTES__RESUMEN__TABLA__HEADERS.es_menor+'</td> ');
}

// calculo del importe de la peticion

function myChangeNumberOfTickets() {



    var mySelectedTickets = $('#myQuantitat').val();

    if ((myStock - mySelectedTickets) < 0) {
        Swal.fire({
            title: PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.stock,
            text: PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.no_tienes_invitaciones_para_continuar,
            icon: 'warning',

            confirmButtonColor: '#129443',

            confirmButtonText: PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS.cerrar
        });
    } else {
        myPending = myStock - mySelectedTickets + oldValueCantidad;

        myTotalInvitationPrice = mySelectedTickets * myPrice;

        if (isNaN(myTotalInvitationPrice)) {
            myTotalInvitationPrice = 0;
        }

        $('#myStock').text(myStock);
        $('#myPending').text(myPending);
        // $('#myTotalPrice').text(myTotalInvitationPrice + ' €');
    }

}

// guardar peticion sin realizarla, se graba para continuar despues
function saveInvitation() {

    console.log ('en grabar')
    
    idiomaPeticion = $('#myIdiomaPeticion').val();

    if (!isEdit) {

        var myConfirmMessage = '';

        myFinalitat2 = $('#myFinalitatSelect option:selected').text();
        myTipus2 = $('#myTipus option:selected').text();

        email_secundario_peticion = $('#emailSecundarioPeticion').val();

        myFinalidadID = $('#myFinalitatSelect').val();
        myTipoInvitacionID = $('#myTipus').val();
        enNomDe = $('#myEnNomDe').val();

        Swal.fire({
            title: PETICIONARIO_PETICIONES__DIALOGO__GUARDAR_PETICION.guardar_peticion__titulo,
            text: PETICIONARIO_PETICIONES__DIALOGO__GUARDAR_PETICION.guardar_peticion__texto,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#129443',
            cancelButtonColor: '#d33',
            confirmButtonText: PETICIONARIO_PETICIONES__DIALOGO__GUARDAR_PETICION.guardar_peticion__boton__confirmar,
            cancelButtonText: PETICIONARIO_PETICIONES__DIALOGO__GUARDAR_PETICION.guardar_peticion__boton__cancelar
        }).then((result) => {

            if (result.value) {
                myAddTableRowResumen();

                myZona2 = $('#myZona option:selected').text();

                activity = 1;

                price = myTotalInvitationPrice;

                quantitatInvitacions = $('#myQuantitat').val();

                en_nombre_de = enNomDe;
                hora_evento = '21:45';

                axios.post('/invitations', {
                    estado: 2,
                    tipo_cupo: tipoCupo,
                    department_id: userDepartmentID,
                    level: myEventLevelForInvitation,
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

                    activity: activity,
                    price: price,
                    en_nombre_de: en_nombre_de,
                    hora_evento: hora_evento,

                    finalidad_id: myFinalidadID,
                    finalidad: myFinalitat2,

                    tipo_invitacion_id: myTipoInvitacionID,
                    tipo_invitacion: myTipus2,

                    event_id: eventID,
                    email_secundario_peticion: email_secundario_peticion,
                    idioma_peticion: idiomaPeticion,
                    nuevo_cupo: myPending,
                    listadoAsistentes: listadoAsistentes

                })
                    .then(response => {

                        if (response.data.success) {
                            myConfirmMessage = PETICIONARIO_PETICIONES__DIALOGO__GUARDAR_PETICION.peticion + response.data.codigopeticion + PETICIONARIO_PETICIONES__DIALOGO__GUARDAR_PETICION.todo_ok_peticion__texto;
                            Swal.fire(
                                PETICIONARIO_PETICIONES__DIALOGO__GUARDAR_PETICION.todo_ok,
                                myConfirmMessage,
                                'success'
                            )


                        } else {
                            Swal.fire(
                                PETICIONARIO_PETICIONES__DIALOGO__GUARDAR_PETICION.error,
                                PETICIONARIO_PETICIONES__DIALOGO__GUARDAR_PETICION.ko,
                                'error'
                            )
                        }
                        closeModals();
                    })
                    .catch(function (error) {
                        console.log(error)
                    });

            }

        })

    } else {

        // editando peticion

        var myConfirmMessage = '';

        myFinalitat2 = $('#myFinalitatSelect option:selected').text();
        myTipus2 = $('#myTipus option:selected').text();

        email_secundario_peticion = $('#emailSecundarioPeticion').val();

        myFinalidadID = $('#myFinalitatSelect').val();
        myTipoInvitacionID = $('#myTipus').val();

        enNomDe = $('#myEnNomDe').val();

        Swal.fire({
            title: PETICIONARIO_PETICIONES__DIALOGO__EDITAR__GUARDAR_PETICION.editar_guardar_peticion__titulo,
            text: PETICIONARIO_PETICIONES__DIALOGO__EDITAR__GUARDAR_PETICION.editar_guardar_peticion__texto,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#129443',
            cancelButtonColor: '#d33',
            confirmButtonText: PETICIONARIO_PETICIONES__DIALOGO__EDITAR__GUARDAR_PETICION.editar_guardar_peticion__boton__confirmar,
            cancelButtonText: PETICIONARIO_PETICIONES__DIALOGO__EDITAR__GUARDAR_PETICION.editar_guardar_peticion__boton__cancelar
        }).then((result) => {

            if (result.value) {
                myAddTableRowResumen();

                myZona2 = $('#myZona option:selected').text();

                activity = 1;

                price = myTotalInvitationPrice;

                quantitatInvitacions = $('#myQuantitat').val();

                en_nombre_de = enNomDe;
                hora_evento = '21:45';

                axios.post('/invitations/update', {
                    IDPeticion: IDPeticion,

                    estado: 2,
                    tipo_cupo: tipoCupo,
                    department_id: userDepartmentID,
                    level: myEventLevelForInvitation,
                    
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

                    activity: activity,
                    price: price,
                    en_nombre_de: en_nombre_de,
                    hora_evento: hora_evento,

                    finalidad_id: myFinalidadID,
                    finalidad: myFinalitat2,

                    tipo_invitacion_id: myTipoInvitacionID,
                    tipo_invitacion: myTipus2,

                    event_id: eventID,
                    email_secundario_peticion: email_secundario_peticion,
                    idioma_peticion: idiomaPeticion,
                    nuevo_cupo: myPending,
                    listadoAsistentes: listadoAsistentes

                })
                    .then(response => {

                        if (response.data.success) {
                            myConfirmMessage = PETICIONARIO_PETICIONES__DIALOGO__EDITAR__GUARDAR_PETICION.peticion + response.data.codigopeticion + PETICIONARIO_PETICIONES__DIALOGO__EDITAR__GUARDAR_PETICION.todo_ok_peticion__texto;
                            Swal.fire(
                                PETICIONARIO_PETICIONES__DIALOGO__EDITAR__GUARDAR_PETICION.todo_ok,
                                myConfirmMessage,
                                'success'
                            )


                        } else {
                            Swal.fire(
                                PETICIONARIO_PETICIONES__DIALOGO__EDITAR__GUARDAR_PETICION.error,
                                PETICIONARIO_PETICIONES__DIALOGO__EDITAR__GUARDAR_PETICION.ko,
                                'error'
                            )
                        }
                        closeModals();
                    })
                    .catch(function (error) {
                        console.log(error)
                    });

            }

        })



    }

}


function procesarRealizarPeticion() {
    if ( (myEventLevelForInvitation == 0) ) {

        editarHtmlParaEnviarPeticionNivelCero() 

    }

    if( (myEventLevelForInvitation == 1) || (myEventLevelForInvitation == 2) ){
        realitzarPeticio()
    }
}


// realizar nueva peticion niveles 1 y 2
function realitzarPeticio() {

    if (!isEdit) {

        var myConfirmMessage = '';

        myFinalitat2 = $('#myFinalitatSelect option:selected').text();
        myTipus2 = $('#myTipus option:selected').text();

        email_secundario_peticion = $('#emailSecundarioPeticion').val();

        myFinalidadID = $('#myFinalitatSelect').val();
        myTipoInvitacionID = $('#myTipus').val();

        Swal.fire({
            title: PETICIONARIO_PETICIONES__DIALOGO__REALIZAR_PETICION.realizar_peticion__titulo,
            text: PETICIONARIO_PETICIONES__DIALOGO__REALIZAR_PETICION.realizar_peticion__texto,
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#129443',
            cancelButtonColor: '#d33',
            confirmButtonText: PETICIONARIO_PETICIONES__DIALOGO__REALIZAR_PETICION.realizar_peticion__boton__confirmar,
            cancelButtonText: PETICIONARIO_PETICIONES__DIALOGO__REALIZAR_PETICION.realizar_peticion__boton__cancelar
        }).then((result) => {

            if (result.value) {
                myZona2 = $('#myZona option:selected').text();

                activity = 1;
                price = myTotalInvitationPrice;
                en_nombre_de = enNomDe;
                // hora_evento = '21:45';

                axios.post('/invitations', {
                    estado: 1,
                    tipo_cupo: tipoCupo,
                    department_id: userDepartmentID,
                    level: myEventLevelForInvitation,
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

                    activity: activity,
                    price: price,
                    en_nombre_de: en_nombre_de,
                    // hora_evento: hora_evento,

                    finalidad_id: myFinalidadID,
                    finalidad: myFinalitat2,

                    tipo_invitacion_id: myTipoInvitacionID,
                    tipo_invitacion: myTipus2,

                    event_id: eventID,
                    email_secundario_peticion: email_secundario_peticion,
                    idioma_peticion: idiomaPeticion,
                    nuevo_cupo: myPending,
                    listadoAsistentes: listadoAsistentes

                })
                    .then(response => {
                        myConfirmMessage = PETICIONARIO_PETICIONES__DIALOGO__REALIZAR_PETICION.peticion + response.data.codigopeticion + PETICIONARIO_PETICIONES__DIALOGO__REALIZAR_PETICION.todo_ok_peticion__texto_nivel_auth;
                        if (response.data.success) {
                            Swal.fire(
                                PETICIONARIO_PETICIONES__DIALOGO__REALIZAR_PETICION.todo_ok_peticion__texto_nivel_auth_pendiente,
                                myConfirmMessage,
                                'success'
                            )

                        } else {
                            Swal.fire(
                                PETICIONARIO_PETICIONES__DIALOGO__REALIZAR_PETICION.error,
                                PETICIONARIO_PETICIONES__DIALOGO__REALIZAR_PETICION.ko,
                                'error'
                            )
                        }
                        closeModals();
                    })
                    .catch(function (error) {
                        console.log(error)
                    });

            }

        })
    } else {
        var myConfirmMessage = '';

        myFinalitat2 = $('#myFinalitatSelect option:selected').text();
        myTipus2 = $('#myTipus option:selected').text();

        email_secundario_peticion = $('#emailSecundarioPeticion').val();

        myFinalidadID = $('#myFinalitatSelect').val();
        myTipoInvitacionID = $('#myTipus').val();

        enNomDe = $('#myEnNomDe').val();

        Swal.fire({
            title: PETICIONARIO_PETICIONES__DIALOGO__EDITAR__ACTUALIZAR.editar_guardar_peticion__titulo,
            text: PETICIONARIO_PETICIONES__DIALOGO__EDITAR__ACTUALIZAR.editar_guardar_peticion__texto,
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#129443',
            cancelButtonColor: '#d33',
            confirmButtonText: PETICIONARIO_PETICIONES__DIALOGO__EDITAR__ACTUALIZAR.editar_guardar_peticion__boton__confirmar,
            cancelButtonText: PETICIONARIO_PETICIONES__DIALOGO__EDITAR__ACTUALIZAR.editar_guardar_peticion__boton__cancelar
        }).then((result) => {

            if (result.value) {
                myAddTableRowResumen();

                myZona2 = $('#myZona option:selected').text();

                activity = 1;

                price = myTotalInvitationPrice;

                quantitatInvitacions = $('#myQuantitat').val();

                en_nombre_de = enNomDe;
                // hora_evento = '21:45';

                axios.post('/invitations/update', {
                    IDPeticion: IDPeticion,

                    estado: 1,
                    tipo_cupo: tipoCupo,
                    department_id: userDepartmentID,
                    level: myEventLevelForInvitation,
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

                    activity: activity,
                    price: price,
                    en_nombre_de: en_nombre_de,
                    // hora_evento: hora_evento,

                    finalidad_id: myFinalidadID,
                    finalidad: myFinalitat2,

                    tipo_invitacion_id: myTipoInvitacionID,
                    tipo_invitacion: myTipus2,

                    event_id: eventID,
                    email_secundario_peticion: email_secundario_peticion,
                    idioma_peticion: idiomaPeticion,
                    nuevo_cupo: myPending,
                    listadoAsistentes: listadoAsistentes

                })
                    .then(response => {

                        if (response.data.success) {
                            myConfirmMessage = PETICIONARIO_PETICIONES__DIALOGO__EDITAR__ACTUALIZAR.peticion + response.data.codigopeticion + PETICIONARIO_PETICIONES__DIALOGO__EDITAR__ACTUALIZAR.todo_ok_peticion__texto;
                            Swal.fire(
                                PETICIONARIO_PETICIONES__DIALOGO__EDITAR__ACTUALIZAR.todo_ok,
                                myConfirmMessage,
                                'success'
                            )


                        } else {
                            Swal.fire(
                                PETICIONARIO_PETICIONES__DIALOGO__EDITAR__ACTUALIZAR.error,
                                PETICIONARIO_PETICIONES__DIALOGO__EDITAR__ACTUALIZAR.ko,
                                'error'
                            )
                        }
                        closeModals();
                    })
                    .catch(function (error) {
                        console.log(error)
                    });

            }

        })

    }

  

}

//------------------------------------------


// realizar nueva peticion nivel 0
function realizarPeticionNivelCero() {


    var contenido = CKEDITOR.instances['editorPeticionNivelCeroEnvioEmailFinal'].getData();
    var asuntoEmail = $('#templateSubjectPeticionNivelCero').val();

    // ---------------


    console.log (listadoAsistentes)

    console.log ('peticion actual' , peticionActual)

           
            var myTemplatesToSendCollection = []
            var myGuestSendDetails = {}
            var myTemplateToSend = '' 

            for (let i = 0; i < listadoAsistentes.length; i++) {

                myTemplateToSend = contenido.replace('{{NOMBRE_INVITADO}}', listadoAsistentes[i]['nombre'])
                    .replace('{{HEADER_USER_APP}}',"Tus datos de acceso")                    
                    .replace('{{LOGIN_USER_APP}}', listadoAsistentes[i]['email'])
                    .replace('{{PASSWORD_USER_APP}}',"123456")
                    .replace('{{FECHA_EVENTO}}', peticionActual.fecha_evento)
                    .replace('{{NOMBRE_EVENTO}}', peticionActual.nombre_evento)
                    .replace('{{HORA_EVENTO}}', peticionActual.hora_evento)
                    .replace('{{NUMERO_ENTRADAS_PETICION}}', 1)
                    .replace('{{NOMBRE_ZONA_PETICION}}', peticionActual.zona)
                    .replace('{{NOMBRE_PETICIONARIO}}','')                   
                    .replace('{{NOMBRE_ZONA_PETICION}}', peticionActual.zona) 

                    myGuestSendDetails = {}
                    
                    myGuestSendDetails.nombre = listadoAsistentes[i]['nombre']
                    myGuestSendDetails.email = listadoAsistentes[i]['email']

                    myGuestSendDetails.content = myTemplateToSend
                    myGuestSendDetails.app_user_id = listadoAsistentes[i]['app_user_id'] ?? ''

                    myTemplatesToSendCollection.push(myGuestSendDetails)
                }
                console.log (myTemplatesToSendCollection)

    if (!isEdit) {

        var myConfirmMessage = '';

        myFinalitat2 = $('#myFinalitatSelect option:selected').text();
        myTipus2 = $('#myTipus option:selected').text();

        email_secundario_peticion = $('#emailSecundarioPeticion').val();

        myFinalidadID = $('#myFinalitatSelect').val();
        myTipoInvitacionID = $('#myTipus').val();

        Swal.fire({
            title: PETICIONARIO_PETICIONES__DIALOGO__REALIZAR_PETICION.realizar_peticion__titulo,
            text: PETICIONARIO_PETICIONES__DIALOGO__REALIZAR_PETICION.realizar_peticion__texto,
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#129443',
            cancelButtonColor: '#d33',
            confirmButtonText: PETICIONARIO_PETICIONES__DIALOGO__REALIZAR_PETICION.realizar_peticion__boton__confirmar,
            cancelButtonText: PETICIONARIO_PETICIONES__DIALOGO__REALIZAR_PETICION.realizar_peticion__boton__cancelar
        }).then((result) => {

            if (result.value) {

      
                startPreloader()

                myZona2 = $('#myZona option:selected').text();

                activity = 1;
                price = myTotalInvitationPrice;
                en_nombre_de = enNomDe;
                // hora_evento = '21:45';

                axios.post('/invitations', {       
                    level: 0,             
                    zona_id: peticionActual.zona_id,
                    estado: 7,
                    asunto: asuntoEmail,
                    body: contenido,
                    userId: peticionActual.userId,
                    userName: peticionActual.userName,
                    email: peticionActual.userEmail,
                    emailsecundario: peticionActual.emailpeticion,


                    tipo_cupo: tipoCupo,
                    department_id: userDepartmentID,

                    level: myEventLevelForInvitation,

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

                    activity: activity,
                    price: price,
                    en_nombre_de: en_nombre_de,

                    finalidad_id: myFinalidadID,
                    finalidad: myFinalitat2,

                    tipo_invitacion_id: myTipoInvitacionID,
                    tipo_invitacion: myTipus2,

                    event_id: eventID,
                    email_secundario_peticion: email_secundario_peticion,
                    idioma_peticion: idiomaPeticion,
                    nuevo_cupo: myPending,
                    listadoAsistentes: listadoAsistentes,
                    contenidoEnvio: myTemplatesToSendCollection

                })
                    .then(response => {
                        
                        stopPreloader()

                        myConfirmMessage = PETICIONARIO_PETICIONES__DIALOGO__REALIZAR_PETICION.peticion + response.data.codigopeticion + PETICIONARIO_PETICIONES__DIALOGO__REALIZAR_PETICION.todo_ok_peticion__texto;
                        if (response.data.success) {
                            Swal.fire(
                                PETICIONARIO_PETICIONES__DIALOGO__REALIZAR_PETICION.todo_ok,
                                myConfirmMessage,
                                'success'
                            )

                        } else {
                            Swal.fire(
                                PETICIONARIO_PETICIONES__DIALOGO__REALIZAR_PETICION.error,
                                PETICIONARIO_PETICIONES__DIALOGO__REALIZAR_PETICION.ko,
                                'error'
                            )
                        }
                        closeModals();
                    })
                    .catch(function (error) {
                        console.log(error)
                        stopPreloader()
                    });

            }
  

            
        })
    } else {
        var myConfirmMessage = '';

        myFinalitat2 = $('#myFinalitatSelect option:selected').text();
        myTipus2 = $('#myTipus option:selected').text();

        email_secundario_peticion = $('#emailSecundarioPeticion').val();

        myFinalidadID = $('#myFinalitatSelect').val();
        myTipoInvitacionID = $('#myTipus').val();

        enNomDe = $('#myEnNomDe').val();

        Swal.fire({
            title: PETICIONARIO_PETICIONES__DIALOGO__EDITAR__ACTUALIZAR.editar_guardar_peticion__titulo,
            text: PETICIONARIO_PETICIONES__DIALOGO__EDITAR__ACTUALIZAR.editar_guardar_peticion__texto,
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#129443',
            cancelButtonColor: '#d33',
            confirmButtonText: PETICIONARIO_PETICIONES__DIALOGO__EDITAR__ACTUALIZAR.editar_guardar_peticion__boton__confirmar,
            cancelButtonText: PETICIONARIO_PETICIONES__DIALOGO__EDITAR__ACTUALIZAR.editar_guardar_peticion__boton__cancelar
        }).then((result) => {

            if (result.value) {
                myAddTableRowResumen();

                myZona2 = $('#myZona option:selected').text();

                activity = 1;

                price = myTotalInvitationPrice;

                quantitatInvitacions = $('#myQuantitat').val();

                en_nombre_de = enNomDe;
                // hora_evento = '21:45';

                axios.post('/invitations/update', {
                    IDPeticion: IDPeticion,

                    estado: 1,
                    tipo_cupo: tipoCupo,
                    department_id: userDepartmentID,
                    
                    level: myEventLevelForInvitation,

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

                    activity: activity,
                    price: price,
                    en_nombre_de: en_nombre_de,
                    // hora_evento: hora_evento,

                    finalidad_id: myFinalidadID,
                    finalidad: myFinalitat2,

                    tipo_invitacion_id: myTipoInvitacionID,
                    tipo_invitacion: myTipus2,

                    event_id: eventID,
                    email_secundario_peticion: email_secundario_peticion,
                    idioma_peticion: idiomaPeticion,
                    nuevo_cupo: myPending,
                    listadoAsistentes: listadoAsistentes

                })
                    .then(response => {

                        if (response.data.success) {
                            myConfirmMessage = PETICIONARIO_PETICIONES__DIALOGO__EDITAR__ACTUALIZAR.peticion + response.data.codigopeticion + PETICIONARIO_PETICIONES__DIALOGO__EDITAR__ACTUALIZAR.todo_ok_peticion__texto;
                            Swal.fire(
                                PETICIONARIO_PETICIONES__DIALOGO__EDITAR__ACTUALIZAR.todo_ok,
                                myConfirmMessage,
                                'success'
                            )


                        } else {
                            Swal.fire(
                                PETICIONARIO_PETICIONES__DIALOGO__EDITAR__ACTUALIZAR.error,
                                PETICIONARIO_PETICIONES__DIALOGO__EDITAR__ACTUALIZAR.ko,
                                'error'
                            )
                        }
                        closeModals();
                    })
                    .catch(function (error) {
                        console.log(error)
                    });

            }

        })

    }

    stopPreloader()

}


//------------------------------------------

// funcion para cancelar peticiones

function cancelarPeticion(myData) {
    var
        myId = myData['id'];


    if (myData['estado'] > 2) {
        Swal.fire(
            PETICIONARIO_PETICIONES__DIALOGO_ELIMINAR.error,
            PETICIONARIO_PETICIONES__DIALOGO_ELIMINAR.ko,
            'error'
        )

    } else {
        Swal.fire({
            title: PETICIONARIO_PETICIONES__DIALOGO_ELIMINAR.eliminar_peticion__titulo,
            text: PETICIONARIO_PETICIONES__DIALOGO_ELIMINAR.eliminar_peticion__texto,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#129443',
            cancelButtonColor: '#d33',
            confirmButtonText: PETICIONARIO_PETICIONES__DIALOGO_ELIMINAR.eliminar_peticion__boton__confirmar,
            cancelButtonText: PETICIONARIO_PETICIONES__DIALOGO_ELIMINAR.eliminar_peticion__boton__eliminar
        }).then((result) => {

            if (result.value) {

                axios.put('/eliminarpeticion', {
                    IDPeticion: myId,
                })
                    .then(response => {

                        if (response.data.success) {

                            Swal.fire(
                                PETICIONARIO_PETICIONES__DIALOGO_ELIMINAR.todo_ok,
                                PETICIONARIO_PETICIONES__DIALOGO_ELIMINAR.todo_ok_peticion__texto,
                                'success'
                            )
                            $('#myEventSelectTable').DataTable().ajax.reload();
                            updateCountersPeticionario()

                        } else {
                            Swal.fire(
                                PETICIONARIO_PETICIONES__DIALOGO_ELIMINAR.error,
                                PETICIONARIO_PETICIONES__DIALOGO_ELIMINAR.ko,
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


}

function updateCountersPeticionario() {


    axios.get('/checkinvitationscounterpeticionario/' + userID)
        .then(response => {

            if (response.data.success) {

                $('#numPeticionsPendents').text(response.data.pendientes);
                $('#numPeticionsAutoritzades').text(response.data.autorizadas);
                $('#numPeticionsCancelades').text(response.data.canceladas);
                $('#numPeticionsModificades').text(response.data.modificadas);
                $('#numPeticionsTotals').text(response.data.enviadas);
                $('#numPeticionsTotalsDepartament').text(response.data.num_dept);

            } else {
            }

        })
        .catch(function (error) {
            console.log(error)
        });


    $('#myEventSelectTable').DataTable().ajax.reload();

}

function initUpdateCounters() {

    $('#numPeticionsPendents').text('');
    $('#numPeticionsAutoritzades').text('');
    $('#numPeticionsCancelades').text('');
    $('#numPeticionsModificades').text('');
    $('#numPeticionsTotals').text('');
    $('#numPeticionsTotalsDepartament').text('');

}


// funciones para panel de seleccion de eventos para peticion , solicitud de peticiones

function myActivitySelectChangePanelSeleccionPeticiones() {
    filterEventsPanelSeleccionPeticiones();
}

function myActivityTypeSelectChangePanelSeleccionPeticiones() {
    filterEventsPanelSeleccionPeticiones();
}

function filterEventsPanelSeleccionPeticiones() {

    // filtrado tabla 
    var table = $('#myEventSelectTable').DataTable();

    var myActivitySearch = $('#myActivity').val();
    var myActivitTypeSearch = $('#myType').val();

    if (myActivitTypeSearch == 0) {
        myActivitTypeSearch = '';
    }

    var filteredData = table
        .column(0)
        .search("^" + myActivitySearch + "$", true, false, true)
        .column(4)
        .search(myActivitTypeSearch, true, false, true)
        .draw();


}

function crearListaActividadesPanelSeleccionPeticiones() {

    axios.get('/getActividadsall')
        .then(response => {

            if (response.data.success) {

                response.data.data.forEach(actividad => {

                    $('<option>', {
                        value: actividad.id,
                        text: actividad.name,
                    }).appendTo('#myActivity');


                });

                myActivitySelectChangePanelSeleccionPeticiones()

            } else {

            }

        })
        .catch(function (error) {

        });

}


// funcion es para envio de nivel cero 


function editarHtmlParaEnviarPeticionNivelCero() {

    if (!templateAvailable) {
        Swal.fire(
            PETICIONARIO_PETICIONES__NO_PLANTILLA_NIVEL_CERO.error,
            PETICIONARIO_PETICIONES__NO_PLANTILLA_NIVEL_CERO.ko,
            'error'
        )
        return
    }

    // -------------------------------------------
  
    // preparar contenido de la plantilla y reemplazar cmapos

    let nombrePrincipalHeader;
    let emailPrincipalHeader;
    let esAsistentePrincipalHeader = false;

    console.log ('peticion actual', peticionActual)

    listadoAsistentes.forEach(element => {

        if (element.asistente_principal == 1 && !esAsistentePrincipalHeader) {
            nombrePrincipalHeader = element.nombre + ' ' + element.apellidos;
            emailPrincipalHeader = element.email;
            esAsistentePrincipalHeader = true;
        }

    });

    // if (esAsistentePrincipalHeader) {
    //     $('#myEmailPeticionNivelCeroHeader').text(emailPrincipalHeader);
    //     $('#myNamePeticionNivelCeroHeader').text(nombrePrincipalHeader);

    //     var tempStr = templateEmailTest.replace('{{NOMBRE_EVENTO}}', peticionActual.nombre_evento)
    //         .replace('{{FECHA_EVENTO}}', peticionActual.fecha_evento)
    //         .replace('{{HORA_EVENTO}}', peticionActual.hora_evento)
    //         .replace('{{NUMERO_ENTRADAS_PETICION}}', peticionActual.cantidad)
    //         .replace('{{NOMBRE_ZONA_PETICION}}', peticionActual.zona)
    //         .replace('{{NOMBRE_PETICIONARIO}}', nombrePrincipalHeader)
    //         .replace('{{NOMBRE_INVITADO}}', listadoAsistentes[0].nombre)

    //         .replace('{{HEADER_USER_APP}}', 'Datos de acceso')
    //         .replace('{{LOGIN_USER_APP}}', '')
    //         .replace('{{PASSWORD_USER_APP}}', '');

    // } else {
    //     $('#myEmailPeticionNivelCeroHeader').text(peticionActual.userEmail);
    //     $('#myNamePeticionNivelCeroHeader').text(peticionActual.userName);

    //     var tempStr = templateEmailTest.replace('{{NOMBRE_EVENTO}}', peticionActual.nombre_evento)
    //         .replace('{{FECHA_EVENTO}}', peticionActual.fecha_evento)
    //         .replace('{{HORA_EVENTO}}', peticionActual.hora_evento)
    //         .replace('{{NUMERO_ENTRADAS_PETICION}}', peticionActual.cantidad)
    //         .replace('{{NOMBRE_ZONA_PETICION}}', peticionActual.zona)
    //         .replace('{{NOMBRE_PETICIONARIO}}', peticionActual.userName)
    //         .replace('{{NOMBRE_INVITADO}}', listadoAsistentes[0].nombre)

    //         .replace('{{HEADER_USER_APP}}', 'Datos de acceso')
    //         .replace('{{LOGIN_USER_APP}}', '')
    //         .replace('{{PASSWORD_USER_APP}}', '');

    // }

    // templateEmailTest = tempStr;

    CKEDITOR.instances['editorPeticionNivelCeroEnvioEmailFinal'].setData(templateEmailTest);

    if (peticionActual.email_secundario_peticion) {

        if (peticionActual.email_secundario_peticion.trim().length > 0) {
            if (validateEmail(peticionActual.email_secundario_peticion)) {
                peticionActual.emailpeticion = peticionActual.email_secundario_peticion
            } else {
                peticionActual.emailpeticion = '';
            }
        }

    } else {

        peticionActual.emailpeticion = '';
    }


    $('#templateSubjectPeticionNivelCero').val(templateEmailSubject)
    
    $('#myModalPeticionNivelCeroAsignarParaEnvio').modal('show');
}

function enviarEmailPeticionLogisticaaaa() {

    peticionActual.details[0].zona_id = $('#myZonaPeticionLogistica').val();

    var contenido = CKEDITOR.instances['editorLogisticaEnvioEmailFinal'].getData();
    var asuntoEmail = $('#templateSubject').val();

    // enviando peticion

    Swal.fire({
        title: PETICIONARIO_PETICIONES__DIALOGO__ENVIAR_PETICION.enviar_peticion__titulo,
        text: PETICIONARIO_PETICIONES__DIALOGO__ENVIAR_PETICION.enviar_peticion__texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: PETICIONARIO_PETICIONES__DIALOGO__ENVIAR_PETICION.enviar_peticion__boton__confirmar,
        cancelButtonText: PETICIONARIO_PETICIONES__DIALOGO__ENVIAR_PETICION.enviar_peticion__boton__cancelar
    }).then((result) => {

        if (result.value) {

            axios.put('/enviarpeticionlogistica', {
                IDPeticion: peticionActual.data.id,              
                zona_id: peticionActual.details[0].zona_id,
                estado: 7,
                
                asunto: asuntoEmail,
                body: contenido,
                userId: peticionActual.user.id,
                userName: peticionActual.user.name,
                email: peticionActual.user.email,
                emailsecundario: peticionActual.emailpeticion
            })
                .then(response => {

                    if (response.data.success) {

                        
                        myConfirmMessage = PETICIONARIO_PETICIONES__DIALOGO__ENVIAR_PETICION.peticion + peticionActual.data.codigo + PETICIONARIO_PETICIONES__DIALOGO__ENVIAR_PETICION.todo_ok_peticion__texto;
                        Swal.fire(
                            PETICIONARIO_PETICIONES__DIALOGO__ENVIAR_PETICION.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                    } else {
                        Swal.fire(
                            PETICIONARIO_PETICIONES__DIALOGO__ENVIAR_PETICION.error,
                            PETICIONARIO_PETICIONES__DIALOGO__ENVIAR_PETICION.ko,
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