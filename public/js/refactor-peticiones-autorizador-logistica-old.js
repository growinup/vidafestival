

function inicializarCKEditorParaLogistica() {
    
    let EDITORLOGISTICA = CKEDITOR.replace('myeditor', {
        filebrowserUploadUrl: myBrowserUploadUrl,
        filebrowserUploadMethod: 'form',  
        height: 500
    });
    
    CKEDITOR.config.language = 'ca';
    CKEDITOR.config.removePlugins = 'about';

}


// let myTableEventSelectedTable = "myEventSelectTable";
// let table;
// let data;

let myPeticionID;

// let dateEvent;
// let datePeticio;
// let eventName;
// let eventID;

// let quantitatInvitacions;
// let zonaPeticio;

// let enNomDe;

// let myFinalidadID;
// let myFinalidad;
// let myTipoInvitacionID;
// let myTipoInvitacion;
// let email_secundario_peticion;
// let listadoAsistentes = [];
let nacionalidades = [];
// let editPurposes = [];
// let peticionActual = {};
// let zoneList = [];

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



function initDocReadyAutorizadorLogistica() {
    
    if (isAutorizador) {
        table = $('#myEventSelectTable').DataTable({

            "order": [[1, "asc"]],
            "scrollX": true,
            "ajax": {
                "url": "/invitationsautorizador",
                "type": "GET",
                "datatype": "json"
            },

            "columns": [

                { "defaultContent": " <a href='#' class='btn btn-success btn-sm feather icon-check' id='select'> </a>   <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEditar'>      </a>   <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectCancelar'></a>" },
                {
                    "data": "estado", title: 'Estat',

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
                { "data": "codigo", "searchable": true },
                {
                    "data": "fecha_peticion", title: 'Data petició',

                    "render": function (data, type, row, meta) {
                        data = moment(data).format('DD/MM/YYYY')
                        return data
                    }
                },
                { "data": "activity_id", title: 'Activitat', },
                { "data": "nombre_evento", title: 'Esdeveniment', "searchable": true },

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

                { "data": "hora_evento", title: 'Hora', },
                { "data": "cantidad", title: 'Num', },
                {
                    "data": "price", visible:false, title: 'Preu',

                    "render": function (data, type, row, meta) {
                        return data + ' €';
                    }

                },
                { "data": "zona", title: 'Zona', },
                { "data": "user_dep", title: 'Departament', },
                { "data": "user_name", title: 'Peticionari', },
                { "data": "en_nombre_de", title: 'En nom de', },


            ],

            "language": tablesLang

        });


        $('#' + myTableEventSelectedTable).on('click', '#select', function (e) {
            e.preventDefault();

            let currentRow = $(this).closest("tr");

            let data = $('#myEventSelectTable').DataTable().row(currentRow).data();

            autorizarPeticion(data['id']);

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

        table = $('#myEventSelectTable').DataTable({

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
                    "data": "estado", title: 'Estat',

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
                { "data": "codigo", "searchable": true },
                {
                    "data": "fecha_peticion", title: 'Data petició',

                    "render": function (data, type, row, meta) {
                        data = moment(data).format('DD/MM/YYYY')
                        return data
                    }
                },
                { "data": "activity_id", title: 'Activitat' },
                { "data": "nombre_evento", "searchable": true },
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

                { "data": "hora_evento", title: 'Hora' },
                { "data": "cantidad", title: 'Num' },
                {
                    "data": "price", visible: false, title: 'Preu',

                    "render": function (data, type, row, meta) {
                        return data + ' €';
                    }

                },
                { "data": "zona", title: 'Zona' },
                { "data": "user_dep", title: 'Departament' },
                { "data": "user_name", title: 'Peticionari' },
                { "data": "en_nombre_de", title: 'En nom de' },


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

    updateCounters();

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

    //  CKEDITOR.instances['myeditor'].setData( '<h1> hello moto</h1> <hr> <p>This is the editor data.</p>' );
    //  let contenido = CKEDITOR.instances['myeditor'].getData();


    // replace template

    // peticionActual.datosPeticion.fecha_evento

    let myEventDate;
    if (peticionActual.datosPeticion.not_confirmed_date == 1) {
        myEventDate = 'Data no confirmada';
    } else {
        myEventDate = peticionActual.datosPeticion.fecha_evento;
    }


    let nombrePrincipalHeader;
    let emailPrincipalHeader;
    let esAsistentePrincipalHeader = false;
    listadoAsistentes.forEach(element => {

        if (element.pivot.es_principal == 1 && !esAsistentePrincipalHeader) {
            nombrePrincipalHeader = element.nombre + ' ' + element.apellidos;
            emailPrincipalHeader = element.email;
            esAsistentePrincipalHeader = true;
        }

    });





    if (esAsistentePrincipalHeader) {
        $('#myEmailPeticionHeader').text(emailPrincipalHeader);
        $('#myNamePeticionHeader').text(nombrePrincipalHeader);

        let tempStr = templateEmailTest.replace('{{NOMBRE_PARTIDO}}', peticionActual.datosPeticion.nombre_evento)
            .replace('{{FECHA_PARTIDO}}', myEventDate)
            .replace('{{HORA_PARTIDO}}', peticionActual.datosPeticion.hora_evento)
            .replace('{{NUMERO_ENTRADAS_PETICION}}', peticionActual.data.cantidad)
            .replace('{{NOMBRE_ZONA_PETICION}}', peticionActual.datosPeticion.zona)
            .replace('{{NOMBRE_PETICIONARIO}}', nombrePrincipalHeader);


    } else {
        $('#myEmailPeticionHeader').text(peticionActual.user.email);
        $('#myNamePeticionHeader').text(peticionActual.user.name);

        let tempStr = templateEmailTest.replace('{{NOMBRE_PARTIDO}}', peticionActual.datosPeticion.nombre_evento)
            .replace('{{FECHA_PARTIDO}}', myEventDate)
            .replace('{{HORA_PARTIDO}}', peticionActual.datosPeticion.hora_evento)
            .replace('{{NUMERO_ENTRADAS_PETICION}}', peticionActual.data.cantidad)
            .replace('{{NOMBRE_ZONA_PETICION}}', peticionActual.datosPeticion.zona)
            .replace('{{NOMBRE_PETICIONARIO}}', peticionActual.user.name);

    }



    templateEmailTest = tempStr;

    // CKEDITOR.instances['myeditor'].setData( '<h1> hello moto</h1> <hr> <p>This is the editor data.</p>' );
    CKEDITOR.instances['myeditor'].setData(templateEmailTest);


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

    peticionActual.details[0].boca = $('#myBocaLogistica').val();
    peticionActual.details[0].fila = $('#myFilaLogistica').val();
    peticionActual.details[0].asiento = $('#myAsientosLogistica').val();
    peticionActual.details[0].descripcion = $('#myDescripcionLogistica').val();
    peticionActual.details[0].zona_id = $('#myZonaPeticionLogistica').val();

    let contenido = CKEDITOR.instances['myeditor'].getData();
    let asuntoEmail = $('#templateSubject').val();

    // enviando peticion

    Swal.fire({
        title: 'Enviar petició',
        text: "¿Segur que vols enviar aquesta petició?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, enviar petició!',
        cancelButtonText: 'Cancel.lar'
    }).then((result) => {

        if (result.value) {

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
                emailsecundario: peticionActual.emailpeticion
            })
                .then(response => {

                    if (response.data.success) {

                        
                        myConfirmMessage = 'Petició ' + peticionActual.data.codigo + ' guardada i enviada correctament.';
                        Swal.fire(
                            'Tot correcte!',
                            myConfirmMessage,
                            'success'
                        )

                    } else {
                        Swal.fire(
                            'Error!',
                            'No ha sigut possible enviar o guardar la petició',
                            'error'
                        )
                    }
                    $('#myEventSelectTable').DataTable().ajax.reload();
                    closeAllModalsAutorizador();

                })
                .catch(function (error) {
                    console.log(error)
                });
        }
    })
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
            //----------------------------------------------------

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
                                    text: zona.nombre + " " + zona.price + " €",
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
                'Error!',
                'No ha sigut possible editar la petició',
                'error'
            )
        }

    })
        .catch(function (error) {
            console.log(error)
        });
}


function showModalDetallePeticionAutorizador(myData, datosPeticion) {


    listadoAsistentes = [];

    $('#myAssistentsTableResumen tr:gt(0)').remove()

    quantitatInvitacions = myData.data.cantidad;
    enNomDe = myData.data.en_nombre_de;

    $('#codigoPeticionEdicionAutorizador').text(datosPeticion.codigo);

    $('#myDataEsdevenimentResumen').text(datosPeticion.fecha_evento);
    $('#myEsdevenimentResumen').text(datosPeticion.nombre_evento);
    $('#dataPeticioResumen').text(moment(myData.data.fecha_peticion).format('DD/MM/YYYY'));
    $('#myQuantitatResumen').text(myData.data.cantidad);

    $('#myEnNomDeResumen').text(enNomDe);

    $('#myAssistentsTitleResumen').text(datosPeticion.nombre_evento + ' ' + datosPeticion.fecha_evento)
    $('#myFinalitatResumen').text(datosPeticion.finalidad);
    $('#myZonaResumen').text(datosPeticion.zona);
    $('#myTipusResumen').text(datosPeticion.tipo_invitacion);

    $('#myTotalInvitationPriceAssistentsResumen').text(datosPeticion.price + ' €');

    $('#emailSecundarioPeticion').text(datosPeticion.email_secundario_peticion);

    $('#myPeticionarioNombreResumen').text(datosPeticion.user_name);
    $('#myPeticionarioDepartamentoResumen').text(datosPeticion.user_dep);

    listadoAsistentes = myData.guests;

    myAddTableRowResumen();

    // si esta editada o modificada mostrar alerta

    //-----------------------------------

    if (datosPeticion['tipo_edicion'] == 0) {
        $('#peticionModificadaDiv').addClass('d-none');
        $('#peticionCanceladaDiv').addClass('d-none');
    }

    if (datosPeticion['tipo_edicion'] == 1) {

        $('#peticionModificadaDiv').removeClass('d-none');
        $('#peticionCanceladaDiv').addClass('d-none');

        let myEditPurpose = editPurposes.find(element => element.id == datosPeticion.motivo_edicion_id).name;

        $('#motivoModificacion').text(myEditPurpose);
        $('#descripcionMotivoModificacion').text(datosPeticion.motivo_edicion_descripcion);
        $('#autorModificacion').text(myData.user_edicion_name);

        let myUserRol = '';
        if (datosPeticion.user_edicion_rol == 1) {
            myUserRol = 'Autoritzador';
        }

        if (datosPeticion.user_edicion_rol == 2) {
            myUserRol = 'Logística';
        }

        $('#departamentoAutorModificacion').text(myUserRol);
    }

    if (datosPeticion['tipo_edicion'] == 2) {

        $('#peticionModificadaDiv').addClass('d-none');
        $('#peticionCanceladaDiv').removeClass('d-none');

        let myEditPurpose = editPurposes.find(element => element.id == datosPeticion.motivo_edicion_id).name;

        $('#motivoCancelacion').text(myEditPurpose);
        $('#descripcionMotivoCancelacion').text(datosPeticion.motivo_edicion_descripcion);
        $('#autorCancelacion').text(myData.user_edicion_name);

        let myUserRol = '';
        if (datosPeticion.user_edicion_rol == 1) {
            myUserRol = 'Autoritzador';
        }

        if (datosPeticion.user_edicion_rol == 2) {
            myUserRol = 'Logística';
        }

        $('#departamentoAutorCancelacion').text(myUserRol);
    }

    if (datosPeticion['tipo_edicion'] == 2) {
        $('#peticionModificadaDiv').addClass('d-none');
    }

    //-----------------------------------

    // traer plantilla


    // activity_id
    // activity_type_id
    // invitation_type_id
    // lang_id
    // event_id

    let myactivity_id = datosPeticion['activity_id'];
    let mytype_id = datosPeticion['type_id'];
    let mytipo_invitacion_id = datosPeticion['tipo_invitacion_id'];
    let mylanguage_id = datosPeticion['language_id'];
    let myevent_id = datosPeticion['event_id'];

   
    axios.get('/geteventtemplate/' + myactivity_id + '/' + mytype_id + '/' + mytipo_invitacion_id + '/' + mylanguage_id + '/' + myevent_id)
        .then(response => {

            if (response.data) {                

                templateEmailTest = response.data['template'][0].content;
                templateEmailSubject = response.data['template'][0].subject;

            } else {
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



function myAddTableRowResumen() {

    let myTable = document.getElementById("myAssistentsTableResumen");

    listadoAsistentes.forEach(asistente => {

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


function autorizarPeticion(myId) {

    Swal.fire({
        title: 'Autoritzar petició',
        text: "¿Segur que vols autoritzar aquesta petició?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, autoritzar petició!',
        cancelButtonText: 'Cancel.lar'
    }).then((result) => {

        if (result.value) {

            axios.put('/autorizarpeticion', {
                IDPeticion: myId,
            })
                .then(response => {

                    if (response.data.success) {
                        Swal.fire(
                            'Tot correcte!',
                            'Petició Autoritzada correctament',
                            'success'
                        )
                        $('#myEventSelectTable').DataTable().ajax.reload();

                        closeAllModalsAutorizador();
                        updateCounters();

                    } else {
                        Swal.fire(
                            'Error!',
                            'No ha sigut possible autoritzar la petició',
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


function cancelarPeticion(myId) {

    Swal.fire({
        title: 'Cancel-lar petició',
        text: "Indica el motiu de la cancel.lació",
        icon: 'error',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, cancel.lar petició!',
        cancelButtonText: 'No Cancel.lar'
    }).then((result) => {

        if (result.value) {

            axios.put('/cancelarpeticion', {
                IDPeticion: myId,
            })
                .then(response => {

                    if (response.data.success) {
                        Swal.fire(
                            'Tot correcte!',
                            'Petició Cancel.lada correctament',
                            'success'
                        )
                        $('#myEventSelectTable').DataTable().ajax.reload();



                    } else {
                        Swal.fire(
                            'Error!',
                            'No ha sigut possible cancel.lar la petició',
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

    Swal.fire({
        title: 'Modificar petició',
        text: "¿Segur que vols modificar aquesta petició?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, modificar petició!',
        cancelButtonText: 'Cancel.lar'
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
                            'Tot correcte!',
                            'Petició modificada correctament',
                            'success'
                        )
                        $('#myEventSelectTable').DataTable().ajax.reload();
                        closeAllModalsAutorizador();
                        updateCounters();

                    } else {
                        Swal.fire(
                            'Error!',
                            'No ha sigut possible modificar la petició',
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

    Swal.fire({
        title: 'Cancel.lar petició',
        text: "¿Segur que vols cancel.lar aquesta petició?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, cancel.lar petició!',
        cancelButtonText: 'Cancel.lar'
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
                            'Tot correcte!',
                            'Petició cancel.lada correctament',
                            'success'
                        )
                        $('#myEventSelectTable').DataTable().ajax.reload();
                        closeAllModalsAutorizador();
                        updateCounters();

                    } else {
                        Swal.fire(
                            'Error!',
                            'No ha sigut possible modificar la petició',
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
        title: 'Modificar petició',
        text: "La petició no està finalitzada, quedarà en procés. ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, guardar petició!',
        cancelButtonText: 'Cancel.lar'
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
                        myConfirmMessage = 'Petició ' + peticionActual.data.codigo + ' guardada correctament.';
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
                    $('#myEventSelectTable').DataTable().ajax.reload();
                    closeAllModalsAutorizador();
                })
                .catch(function (error) {
                    console.log(error)
                });

        }

    })


}



function updateCounters() {

    if (isAutorizador) {

        axios.get('/checkinvitationscounterautorizador/' + userID)
            .then(response => {

                if (response.data.success) {


                    $('#numPeticionsPendents').text(response.data.pendientes);
                    $('#numPeticionsAutoritzades').text(response.data.autorizadas);
                    $('#numPeticionsCancelades').text(response.data.canceladas);
                    $('#numPeticionsModificades').text(response.data.modificadas);
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

function initUpdateCounters() {
    $('#numPeticionsPendents').text('');
    $('#numPeticionsAutoritzades').text('');
    $('#numPeticionsCancelades').text('');
    $('#numPeticionsTotals').text('');
}





