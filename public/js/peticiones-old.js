var myTableEventSelectedTable = "myEventSelectTable";
let table;

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
var listaNacionalidades = [];
var tipoCupo;
var cuposList = [];
var zoneList = [];
var IDPeticion = 0;

var editPurposes = [];
var myCurrentState;

$(document).ready(function () {

    tableAsistentesPeticion = $('#myAssistentsTable').DataTable({

        "scrollX": true,
        // scrollX: "100%",

        data: listadoAsistentes,

        "columns": [
            { data: listadoAsistentes.nombre, title: 'Nom', className: 'text-center' },
            { data: listadoAsistentes.apellidos, title: 'Cognoms' ,className: 'text-center'},
            { data: listadoAsistentes.dni, title: 'Dni' ,className: 'text-center'},
            { data: listadoAsistentes.fecha_nacimiento, title: 'Data Naixament' ,className: 'text-center' },
            {
                data: listadoAsistentes.nationality_id, title: 'Nacionalitat', className: 'text-center',

                render: function (data, type, row, meta) {
                    return listaNacionalidades[data - 1];
                }

            },
            { data: listadoAsistentes.email, title: 'Email'  ,className: 'text-center'},
            {
                data: listadoAsistentes.es_menor, title: 'Menor', className: 'text-center',

                render: function (data, type, row, meta) {

                    if (data == true) {
                        return 'Si';
                    } else {
                        return 'No';
                    }

                }

            },
            {
                data: listadoAsistentes.asistente_principal, title: 'Principal', className: 'text-center',

                render: function (data, type, row, meta) {

                    if (data == true) {
                        return 'Si';
                    } else {
                        return 'No';
                    }
                }

            },
            {
                data: listadoAsistentes.send_email, title: 'Enviar email', visible:false,
                render: function (data, type, row, meta) {

                    if (data == true) {
                        return 'Si';
                    } else {
                        return 'No';
                    }
                }
            },
            { defaultContent: "<a href='#' class='btn btn-warning btn-sm feather icon-edit' id='selectEditar'></a>    <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectEliminar'></a>"  ,className: 'text-center'}
        ],


        "language": tablesLang

    });

    $('#myModalAsistentes').on('shown.bs.modal', function (e) {
        $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
    });


    // eliminar asistente
    $('#myAssistentsTable').on('click', '#selectEliminar', function (e) {

        var rowCount = $('#myAssistentsTable tr').length - 1;
        var currentGuest;
        currentGuest = rowCount;
       
        var myIndexToDelete = $(this).closest('tr').index()
   
        listadoAsistentes.splice(myIndexToDelete,1)        

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



        if (registroAEditar[7] == true) {
            $('#AssistentPrincipal').prop('checked', true);
        } else {
            $('#AssistentPrincipal').prop('checked', false);
        }

        if (registroAEditar[8] == true) {
            $('#enviarEntradasMail').prop('checked', true);
        } else {
            $('#enviarEntradasMail').prop('checked', false);
        }

    });


    if (!home_peticiones) {

        table = $('#myEventSelectTable').DataTable({

            "scrollX": true,
            "ajax": {
                "url": "/events",
                "type": "GET",
                "datatype": "json"
            },

            "columns": [
                { "data": "activity_id",visible: true   },
                { "defaultContent": " <a href='#' class='btn btn-primary btn-sm' id='select'>Fer petició</a>  " },
                { "data": "id_partido", title: 'Codi' },
                { "data": "nombre", title: 'Esdeveniment' },
                { "data": "type_id",visible: true   },
                { "data": "jornada", visible:false, title: 'Jornada' },
                {
                    "data": "type_id", visible:false, title: 'Tipus',

                    "render": function (data, type, row, meta) {

                        if (data == 1) return 'Lliga';
                        if (data == 3) return 'Champions';
                        return "no definit";

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
                    "data": "fecha", title: 'Data',

                    render: function (data, type, row, meta) {

                        if (fechaNoConfirmada == 1) return "No confirmada";
                        // return data;
                        return moment( data,'YYYY/MM/DD' ).format('DD/MM/YYYY') ;
                    }

                },

                { "data": "hora", title: 'Hora' },
                { "data": "ubicacion_id", title: 'Ubicació' },
            ],


            "language": tablesLang
        });


        $('#' + myTableEventSelectedTable).on('click', '#select', function (e) {
            e.preventDefault();

            var currentRow = $(this).closest("tr");

            var data = $('#myEventSelectTable').DataTable().row(currentRow).data();


            showModal(data);

        });
    }
    //--------- fin inicializacion de NOT home peticiones


    // codigo js HOME peticiones

    if (home_peticiones) {

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
                    "data": "estado", title: "Estat",

                    "render": function (data, type, row, meta) {
                        if (data == 1) return '<b class="badge badge-pendiente text-white">Pendent</b>';
                        if (data == 2) return '<b class="badge badge-en-proceso text-white">En procés</b>';
                        if (data == 3) return '<b class="badge badge-modificada text-white">Modificada</b>';
                        if (data == 4) return '<b class="badge badge-cancelada text-white">Cancel.lada</b>';
                        if (data == 5) return '<b class="badge badge-autorizada text-white">Autoritzada</b>';
                        if (data == 6) return '<b class="badge badge-pendiente-envio text-white">Pendent enviament</b>';
                        if (data == 7) return '<b class="badge badge-enviada text-white">Enviada</b>';
                    }

                },
                { "data": "codigo", title: "Codi" },
                {
                    "data": "fecha_peticion", title: "Data Petició",
                    "render": function (data, type, row, meta) {
                        data = moment(data).format('DD/MM/YYYY')
                        return data
                    }

                },
                { "data": "activity_id", title: "Activitat" },
                { "data": "nombre_evento", title: "Esdeveniment" },
                {
                    data: "not_confirmed_date", visible: false,

                    render: function (data, type, row, meta) {
                        fechaNoConfirmada = data;
                        return data;
                    }

                },

                {
                    "data": "fecha_evento", title: 'Data',

                    render: function (data, type, row, meta) {

                        if (fechaNoConfirmada == 1) return "No confirmada";
                        return data;
                    }

                },

                { "data": "hora_evento", title: "Hora" },
                { "data": "cantidad", title: "Num" },
                {
                    "data": "price", visible:false, title: "Preu",

                    "render": function (data, type, row, meta) {
                        return data + ' €';
                    }
                },
                { "data": "zona", title: "Zona" },
                { "data": "en_nombre_de", title: "En nom" },
               
            ],

            "rowCallback": function (row, data, index) {
                var cellValue = data["estado"];
                var myEuros;
            },

            "language": tablesLang
        });


        $('#' + myTableEventSelectedTable).on('click', '#selectEdit', function (e) {
            e.preventDefault();
            var currentRow = $(this).closest("tr");
            var data = $('#myEventSelectTable').DataTable().row(currentRow).data();

            showModal(data);

        });


        // eliminar peticion
        $('#' + myTableEventSelectedTable).on('click', '#selectCancelar', function (e) {
            e.preventDefault();
            var currentRow = $(this).closest("tr");
            var data = $('#myEventSelectTable').DataTable().row(currentRow).data();
            cancelarPeticion(data);
        });

    }
    //--------- fin inicializacion de HOME peticiones


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
                                'Error!',
                                "Aquest DNI consta actualment com a prohibit",
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
                $('#myAssistentEmail').val( '');
                $('#myAssistentNacionalitat').val(1);

            }


        }
    });

    updateCountersPeticionario();
});



// editar registro asistente

function editarRegistro() {

    // validar campos añadir asistente

    if (($('#myAssistentNom').val().trim().length) < 1) {
        Swal.fire(
            'Error!',
            "El camp Nom es obligatori",
            'error'
        )
        return;
    }

    if (($('#myAssistentCognoms').val().trim().length) < 1) {
        Swal.fire(
            'Error!',
            "El camp Cognoms es obligatori",
            'error'
        )
        return;
    }

    if ((($('#myAssistentDni').val().trim().length) < 1) && (!$('#esMenor').is(":checked"))) {
        Swal.fire(
            'Error!',
            "El camp DNI es obligatori",
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
        $('#AssistentPrincipal').is(":checked"),
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
    // $('#enviarEntradasMail').prop('checked', false);


    $('#modoedicion').addClass('d-none');
    $('#addasistente').removeClass('d-none');
    $('#footerModalSolicitudInvitacion').removeClass('d-none');

}

function cancelarEdicion() {

    $('#myAssistentNom').val(''),
        $('#myAssistentCognoms').val(''),
        $('#myAssistentDni').val(''),
        $('#myAssistentDataNaixement').val(''),
        $('#myAssistentNacionalitat').val(1),
        $('#myAssistentEmail').val(''),
        $('#esMenor').is(":checked"),
        $('#AssistentPrincipal').prop('checked', false);
    $('#enviarEntradasMail').prop('checked', false);

    $('#modoedicion').addClass('d-none');
    $('#addasistente').removeClass('d-none');
    $('#footerModalSolicitudInvitacion').removeClass('d-none');
}



// mostrar ventana modal

function showModal(data) {

    myCurrentState = data['estado'];
    // traer asistentes
    myInitZona_id = data['zona_id'];

    if (isEdit) {
        axios.put('/editarpeticionpeticionario', {
            IDPeticion: data['id'],
        }).then(response => {

            if (response.data.success) {
                listadoAsistentes = [];
                listadoAsistentes = response.data.guests;
                for (var i = 0; i < listadoAsistentes.length; i++) {
                    listadoAsistentes[i].asistente_principal = listadoAsistentes[i]['pivot'].es_principal;
                    listadoAsistentes[i].send_email = listadoAsistentes[i]['pivot'].send_email;
                }

                editPurposes = [];
                editPurposes = response.data.editpurposes;

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

                    if ( (data['estado'] == 5) || (data['estado'] == 6) || (data['estado'] == 7)) {

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
                    zoneList = [];

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
                        zoneList.push(zona.zone_id);
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
                    zoneList = [];

                    $("#myZona").find('option')
                        .remove()
                        .end();


                        response.data.prices.forEach(  (price , index )  => {
                        
                            if (response.data.zones[index].cupo > 0)  {
                                priceList.push(price.price);
                            }

                        })              
                        
                        var myTempIndex = 0;

                        response.data.zones.forEach( (zona , index)  => {
                            if (zona.cupo > 0) {
                                $('<option>', {
                                    value: zona.zone_id,
                                    text: zona.nombre + " " + priceList[myTempIndex] +  " €",
                                }).appendTo('#myZona');
    
                                myTempIndex++;
                                cuposList.push(zona.cupo);
                                zoneList.push(zona.zone_id);
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



    // ----------------------------------
    
    setTimeout(function(){             
      
            if (isEdit) {
                zona_id = data['zona_id'];
                $('#myZona').val (zona_id)
            }
        }, 500);

        
        $('#myModal').modal('show');
    // ----------------------------------

}


function inicializarValores() {


    if (!isEdit) {

        $('#modalPeticionHeader').text('Nova petició');

        $('#myEnNomDe').val('');

        $('#myFinalitatSelect').val(1);
        $('#myTipus').val(1);
        $('#myIdiomaPeticion').val(1);


        $('#myQuantitat').val(oldValueCantidad);

        $('#myZona').val(zoneList[0]);


    } else {

        $('#modalPeticionHeader').text('Modificar petició')

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
            'Error!',
            "El camp En Nom de es obligatori",
            'error'
        )
        return false;
    }

    if (quantitatInvitacions < 1) {
        Swal.fire(
            'Error!',
            "El número d'invitacions no pot ser 0",
            'error'
        )
        return false;
    }

    if (quantitatInvitacions > myStock) {
        Swal.fire(
            'Error!',
            "No tens invitacions suficients per continuar",
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
        $('#dataPeticio2').text( moment(datePeticio).format('DD/MM/YYYY') );
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

    $('#remainingGuests').text('Assistent 1' + ' de ' + quantitatInvitacions);

    // si es edicion montar tabla asisentes

    
    listadoAsistentes.forEach(asistente => {

        let myGoodDate;
        
        if ( asistente.fecha_nacimiento != null) {
            
            // asistente.fecha_nacimiento = moment(asistente.fecha_nacimiento).format('DD/MM/YYYY');
            
            if ( moment(asistente.fecha_nacimiento, 'DD/MM/YYYY',true).isValid()  ) {

                myGoodDate = asistente.fecha_nacimiento
            } else {
                myGoodDate = moment(asistente.fecha_nacimiento).format('DD/MM/YYYY');

            }
            
            
        }  else  {
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
 

    if (!isEdit) {
        $('#dataPeticioResumen').text(datePeticio);

        if (quantitatInvitacions > listadoAsistentes.length)
        {

            Swal.fire({
                title: 'Error',
                text: "No has afegit tots els assistents per fer aquesta petició",
                icon: 'warning',
    
                confirmButtonColor: '#129443',
    
                confirmButtonText: 'Tancar!'
            });
            return;
        }

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

    zona_id = zoneList[myValue];


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

    $('#myEventSelectTable').DataTable().ajax.reload();

    updateCountersPeticionario();

}

function closeMainModal() {


if ( (myCurrentState == 4) ||  (myCurrentState == 5) || (myCurrentState == 6) || (myCurrentState == 7)) {
    $('#myModal').modal('hide');
    $('#myModalAsistentes').modal('hide');
    $('#myModalPeticionesResumen').modal('hide');
} else {

    Swal.fire({
        title: 'Tancar',
        html:  "Segur que vols tancar sense gravar els canvis?  " +  "<br> La informació es perdrà si no graves. ",
        
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, tancar',
        cancelButtonText: 'Cancel·lar '
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
            'Error!',
            "No pots afegir mes assistents a la petició",
            'error'
        )
        return;
    }


    // validar campos añadir asistente

    if (($('#myAssistentNom').val().trim().length) < 1) {
        Swal.fire(
            'Error!',
            "El camp Nom es obligatori",
            'error'
        )
        return;
    }

    if (($('#myAssistentCognoms').val().trim().length) < 1) {
        Swal.fire(
            'Error!',
            "El camp Cognoms es obligatori",
            'error'
        )
        return;
    }

    if ((($('#myAssistentDni').val().trim().length) < 1) && (!$('#esMenor').is(":checked"))) {
        Swal.fire(
            'Error!',
            "El camp DNI es obligatori",
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
    var asistentePrincipal;
    var myAsistentePrincipal = false;

    asistenteNombre = $('#myAssistentNom').val();
    asistenteApellido = $('#myAssistentCognoms').val();
    asistenteDni = $('#myAssistentDni').val();
    asistenteFechaNacimiento = $('#myAssistentDataNaixement').val();
    asistenteNacionalidad = $('#myAssistentNacionalitat').val();
    asistenteEmail = $('#myAssistentEmail').val();


    

    var emailYaExiste = false;
    listadoAsistentes.forEach(element => {
        if (element.email == asistenteEmail) {
            if ( $('#esMenor').is(":checked") == true) {
                emailYaExiste = false;
            } else {
                emailYaExiste = true;
            }
   
        }
    });

    if ( emailYaExiste ) {
        Swal.fire(
            'Error!',
            "Aquest assistent ja existeix a la petició",
            'error'
        )
        return;
    }


    var dniYaExiste = false;
    var dniYaExisteEsMenor = false;
    var valorEsMenorCheckBox =  $('#esMenor').is(":checked")
    console.log (valorEsMenorCheckBox)

    listadoAsistentes.forEach(element => {
 
            if ( == true) {
                dniYaExisteEsMenor = true;
            } 

            if ((!dniYaExisteEsMenor) && (element.dni == asistenteDni) )
            dniYaExiste = true;
            
 
    });

    if ( dniYaExiste ) {
        Swal.fire(
            'Error!',
            "Aquest DNI ja existeix a la petició",
            'error'
        )
        return;
    }


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
            $('#AssistentPrincipal').is(":checked") ? true : false,
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

}

// resumen de los asistentes

function myAddTableRowResumen() {

    var myTable = document.getElementById("myAssistentsTableResumen");

    $("#myAssistentsTableResumen tr").remove();
   listadoAsistentes = [];

    tableAsistentesPeticion.rows().every(function () {
        var d = this.data();
        var myGuest = {};

        var row = myTable.insertRow(-1);
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
            asistente_principal: d[7],
            send_email: false
        }

        listadoAsistentes.push(myGuest);

    });

    $('#myAssistentsTableResumen').prepend('<tr> <td>Nom</td><td>Cognoms</td><td>Dni</td> <td>Data naixament</td><td>Nacionalitat</td>  <td>Email</td>  <td>Menor</td> ');

}


// calculo del importe de la peticion

function myChangeNumberOfTickets() {



    var mySelectedTickets = $('#myQuantitat').val();

    if ((myStock - mySelectedTickets) < 0) {
        Swal.fire({
            title: 'Stock',
            text: "No tens invitacions suficients per fer aquesta petició",
            icon: 'warning',

            confirmButtonColor: '#129443',

            confirmButtonText: 'Tancar!'
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
            title: 'Guardar Petició',
            text: "La petició quedarà en procés. Per finalitzar-la és necessari afegir assistents. ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#129443',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, guardar petició!',
            cancelButtonText: 'Cancel-lar'
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
                            myConfirmMessage = 'Petició ' + response.data.codigopeticion + ' guardada correctament.' + "Recorda que Per finalitzar-la és necessari afegir assistents";
                            Swal.fire(
                                'Petició en procés. ',
                                myConfirmMessage,
                                'success'
                            )


                        } else {
                            Swal.fire(
                                'Error!',
                                'No ha sigut possible guardar la petició',
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
            title: 'Modificar petició',
            text: "¿Segur que vols modificar aquesta petició per finalitzar-la en un altre moment?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#129443',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, guardar petició!',
            cancelButtonText: 'Cancel.lar'
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
                            myConfirmMessage = 'Petició ' + response.data.codigopeticion + ' guardada correctament.';
                            Swal.fire(
                                'Tot correcte!',
                                myConfirmMessage,
                                'success'
                            )


                        } else {
                            Swal.fire(
                                'Error!',
                                'No ha sigut possible guardar la petició',
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


// realizar nueva peticion

function realitzarPeticio() {

    if (!isEdit) {

        var myConfirmMessage = '';

        myFinalitat2 = $('#myFinalitatSelect option:selected').text();
        myTipus2 = $('#myTipus option:selected').text();

        email_secundario_peticion = $('#emailSecundarioPeticion').val();

        myFinalidadID = $('#myFinalitatSelect').val();
        myTipoInvitacionID = $('#myTipus').val();

        Swal.fire({
            title: 'Realitzar petició',
            text: "¿Segur que vols realitzar aquesta petició?",
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#129443',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK',
            cancelButtonText: 'Cancel.lar'
        }).then((result) => {

            if (result.value) {
                myZona2 = $('#myZona option:selected').text();

                activity = 1;
                price = myTotalInvitationPrice;
                en_nombre_de = enNomDe;
                hora_evento = '21:45';

                axios.post('/invitations', {
                    estado: 1,
                    tipo_cupo: tipoCupo,
                    department_id: userDepartmentID,

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
                        myConfirmMessage = 'La petició ' + response.data.codigopeticion + ' s’ha enviat correctament. Queda pendent d’autorització i d’assignació';
                        if (response.data.success) {
                            Swal.fire(
                                'Petició pendent',
                                myConfirmMessage,
                                'success'
                            )

                        } else {
                            Swal.fire(
                                'Error!',
                                'No ha sigut possible realitzar la petició',
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
            title: 'Realitzar petició',
            text: "¿Segur que vols realitzar aquesta petició?",
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#129443',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK',
            cancelButtonText: 'Cancel.lar'
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

                    estado: 1,
                    tipo_cupo: tipoCupo,
                    department_id: userDepartmentID,

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
                            myConfirmMessage = 'Petició ' + response.data.codigopeticion + ' guardada correctament.';
                            Swal.fire(
                                'Tot correcte!',
                                myConfirmMessage,
                                'success'
                            )


                        } else {
                            Swal.fire(
                                'Error!',
                                'No ha sigut possible guardar la petició',
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
















// funcion para cancelar peticiones

function cancelarPeticion(myData) {
    var
        myId = myData['id'];

        
    if (myData['estado'] > 3) {
        Swal.fire(
            'Error!',
            'No es possible eliminar la petició',
            'error'
        )

    } else {
        Swal.fire({
            title: 'Eliminar petició',
            text: "¿Segur que vols eliminar aquesta petició?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#129443',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar petició!',
            cancelButtonText: 'Cancel.lar'
        }).then((result) => {
    
            if (result.value) {
    
                axios.put('/eliminarpeticion', {
                    IDPeticion: myId,
                })
                    .then(response => {
    
                        if (response.data.success) {
                            
                            Swal.fire(
                                'Tot correcte!',
                                'Petició eliminada correctament',
                                'success'
                            )
                            $('#myEventSelectTable').DataTable().ajax.reload();
                            updateCountersPeticionario()
    
                        } else {
                            Swal.fire(
                                'Error!',
                                'No ha sigut possible eliminar la petició',
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


