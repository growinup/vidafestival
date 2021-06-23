function crearListaUbicacionesForTemplatesPanel() {


    axios.get('/getLocationsall')

        .then(response => {
            if (response.data) {

                $("#locationsListForEmailTemplatesPanel").find('option')
                    .remove()
                    .end();

                listaUbicaciones = [];

                $('<option>', {
                    value: -1,
                    text: PANEL__PLANTILLAS__SELECT__PLACEHOLDER.placeholder,
                }).appendTo('#locationsListForEmailTemplatesPanel');

                response.data.data.forEach(location => {

                    $('<option>', {
                        value: location.id,
                        text: location.nombre,
                    }).appendTo('#locationsListForEmailTemplatesPanel');

                    listaUbicaciones.push(location.id);
                });

                let myLocationToFilter = $('#locationsListForEmailTemplatesPanel').val()
                filtrarEmailTamplatesPanel()
                crearListaActividadesForTemplatesPanel(myLocationToFilter)

            } else {

            }

        })
        .catch(function (error) {

        });

}

function crearListaActividadesForTemplatesPanel(myLocationId) {

    locationId = myLocationId

    axios.get('/getActividadsall')
        .then(response => {

            if (response.data.success) {


                $("#activityListForEmailTemplatesPanel").find('option')
                    .remove()
                    .end();

                response.data.data.forEach(actividad => {

                    if (actividad.location_id == locationId) {

                        $('<option>', {
                            value: actividad.id,
                            text: actividad.name,
                        }).appendTo('#activityListForEmailTemplatesPanel');

                    }
                });
                let myActivityToFilter = $('#activityListForEmailTemplatesPanel').val()

                crearListaTiposActividadForTemplatesPanel(myActivityToFilter)
            } else {

            }

        })
        .catch(function (error) {

        });
}

function crearListaTiposActividadForTemplatesPanel(myactivityId) {

    axios.get('/getTipoActividadsall')
        .then(response => {

            if (response.data.success) {

                $("#tipoEventoListForEmailTemplatesPanel").find('option')
                    .remove()
                    .end();

                // $('<option>', {
                //     value: 0,
                //     text:  'Tots',
                // }).appendTo('#tipoEventoListForEmailTemplatesPanel');    

                response.data.data.forEach(activitytype => {



                    if (activitytype.activity_id == myactivityId) {

                        $('<option>', {
                            value: activitytype.id,
                            text: activitytype.name,
                        }).appendTo('#tipoEventoListForEmailTemplatesPanel');

                    }

                });
                filtrarEmailTamplatesPanel()
                
            } else {

            }

        })
        .catch(function (error) {

        });

}


// funcion para gestionar el cambio de select de ubicacion
function myLocationSelectChangeEmailTemplatesPanel() {
    let myLocationToFilter = $("#locationsListForEmailTemplatesPanel").val()
    crearListaActividadesForTemplatesPanel(myLocationToFilter)
}


// funcion para gestionar el cambio de select de actividad
function myActivitySelectChangeEmailTemplatesPanel() {
    let myActivityToFilter = $("#activityListForEmailTemplatesPanel").val()
    crearListaTiposActividadForTemplatesPanel(myActivityToFilter)
}

function filtrarEmailTamplatesPanel() {
      // filtrado tabla 
      var table = $('#emailTemplatesTableMainPanel').DataTable();

      var myLocationSearch = $('#locationsListForEmailTemplatesPanel').val();
      var myActivitySearch = $('#activityListForEmailTemplatesPanel').val();
      var myTipologiaSearch = $('#tipoEventoListForEmailTemplatesPanel').val();
  

      var filteredData = table
           .column( 2 )
           .search(myLocationSearch, true, false, true)
           .draw()
           .column( 3 )
           .search(myActivitySearch, true, false, true)
           .draw()
          .column( 4 )
          .search(myTipologiaSearch, true, false, true)
          .draw();
  
}


// ----------------------------------------------------------------------


function crearListaIdiomasEmailTemplateModal() {

    axios.get('/getlanguages')

        .then(response => {
            if (response.data) {

                // creando select idiomas

                $("#myLanguageSelectEmailTemplateModal").find('option')
                    .remove()
                    .end();

                listaIdiomas = [];

                response.data.languages.forEach(language => {
                    

                    $('<option>', {
                        value: language.id,
                        text: language.name,
                    }).appendTo('#myLanguageSelectEmailTemplateModal');

                    listaIdiomas.push(language.id);
                });

            } else {

            }

        })
        .catch(function (error) {

        });

}



function crearListaUbicacionesEmailTemplateModal() {

    axios.get('/getLocationsall')

        .then(response => {
            if (response.data) {

                $("#myLocationSelectEmailTemplateModal").find('option')
                    .remove()
                    .end();

                listaUbicaciones = [];

                $('<option>', {
                    value: -1,
                    text: PANEL__PLANTILLAS__MODAL__SELECT_PLACEHOLDERS.ubicacion,
                }).appendTo('#myLocationSelectEmailTemplateModal');

                response.data.data.forEach(location => {

                    $('<option>', {
                        value: location.id,
                        text: location.nombre,
                    }).appendTo('#myLocationSelectEmailTemplateModal');

                    listaUbicaciones.push(location.id);
                });

            } else {

            }

        })
        .catch(function (error) {

        });

}


function crearListaTiposInvitacionEmailTemplateModal() {

    // $("#myInvitationTypeSelectEmailTemplateModal").find('option')
    // .remove()
    // .end();

    // $('<option>', {
    //     value: -1,
    //     text: 'Sense resultats',
    // }).appendTo('#myInvitationTypeSelectEmailTemplateModal');   

    axios.get('/getInvitationTypesall')

        .then(response => {
            if (response.data) {

                $("#myInvitationTypeSelectEmailTemplateModal").find('option')
                    .remove()
                    .end();

                $('<option>', {
                    value: -1,
                    text: PANEL__PLANTILLAS__MODAL__SELECT_PLACEHOLDERS.tipo_invitacion,
                }).appendTo('#myInvitationTypeSelectEmailTemplateModal');

                listaTiposInvitacion = [];


                response.data.data.forEach(tipoInvitacion => {

                    $('<option>', {
                        value: tipoInvitacion.id,
                        text: tipoInvitacion.nombre,
                    }).appendTo('#myInvitationTypeSelectEmailTemplateModal');

                    listaTiposInvitacion.push(tipoInvitacion.id);
                });

            } else {

            }

        })
        .catch(function (error) {

        });

}



function crearListaActividadesEmailTemplateModal(ubicacionID) {

    var urlConsulta = ''

    if (ubicacionID == 0) {
        urlConsulta = '/getActividadsall'
    } else {
        urlConsulta = '/getActividad/' + ubicacionID
    }

    axios.get(urlConsulta)

        .then(response => {
            if (response.data) {

                $("#myActivitySelectEmailTemplateModal").find('option')
                    .remove()
                    .end();

                $('<option>', {
                    value: -1,
                    text: PANEL__PLANTILLAS__MODAL__SELECT_PLACEHOLDERS.actividad,
                }).appendTo('#myActivitySelectEmailTemplateModal');

                listaUActividades = [];

                response.data.data.forEach(activity => {

                    $('<option>', {
                        value: activity.id,
                        text: activity.name,
                    }).appendTo('#myActivitySelectEmailTemplateModal');

                    listaUActividades.push(activity.id);
                });

            } else {

            }

        })
        .catch(function (error) {

        });

}




function crearListaTipologiaEventoSelectEmailTemplateModal(activityID) {

    var urlConsulta = ''

    if (activityID == 0) {
        urlConsulta = '/getTipoActividadsall'
    } else {
        urlConsulta = '/getTipoActividad/' + activityID
    }


    axios.get(urlConsulta)

        .then(response => {
            if (response.data) {

                $("#myTipologiaEventoSelectEmailTemplateModal").find('option')
                    .remove()
                    .end();

                $('<option>', {
                    value: -1,
                    text: PANEL__PLANTILLAS__MODAL__SELECT_PLACEHOLDERS.tipologia_evento,
                }).appendTo('#myTipologiaEventoSelectEmailTemplateModal');

                listaUTipologiaEvento = [];

                response.data.data.forEach(tipologiaEvento => {

                    $('<option>', {
                        value: tipologiaEvento.id,
                        text: tipologiaEvento.name,
                    }).appendTo('#myTipologiaEventoSelectEmailTemplateModal');

                    listaUTipologiaEvento.push(tipologiaEvento.id);
                });

            } else {

            }

        })
        .catch(function (error) {

        });

}



function locationSelectEmailTemplateModalChange() {

    var myLocationIDToFilter = $('#myLocationSelectEmailTemplateModal').val()

    crearListaActividadesEmailTemplateModal(myLocationIDToFilter)
    crearListaTipologiaEventoSelectEmailTemplateModal(-1)
}

function activitySelectEmailTemplateModalChange() {

    var myActivityIDToFilter = $('#myActivitySelectEmailTemplateModal').val()

    crearListaTipologiaEventoSelectEmailTemplateModal(myActivityIDToFilter)

}





function getText() {

    var content = CKEDITOR.instances['myeditor'].getData();
    var asuntomail = $('#templatesubject').val();

    axios.post('/sendemail', {

        data: 'enviando',
        content: content,
        asunto: asuntomail,

    })
        .then(response => {

            if (response.data.success) {

                myConfirmMessage = 'Email enviado';
                Swal.fire(
                    GESTION__PLANTILLAS__DIALOGO__GUARDAR.todo_ok,
                    myConfirmMessage,
                    'success'
                )

            } else {
                Swal.fire(
                    'Error!',
                    "No ha sigut possible enviar el mail",
                    'error'
                )
            }
        })
        .catch(function (error) {
            console.log(error)
        });
}



function saveEmailTemplateModal() {


    var templateName = $('#emailTemplateNameModal').val();
    var asuntomail = $('#emailTemplateSubjectModal').val();
    var content = CKEDITOR.instances['editorEmailTemplateModal'].getData();
    var location_id = $('#myLocationSelectEmailTemplateModal').val();
    var lang_id = $('#myLanguageSelectEmailTemplateModal').val();
    var activity_id = $('#myActivitySelectEmailTemplateModal').val();
    var type_id = $('#myTipologiaEventoSelectEmailTemplateModal').val();
    var invitationTypeId = $('#myInvitationTypeSelectEmailTemplateModal').val();


    // comprobar campos 

    if (($('#emailTemplateNameModal').val().trim().length) < 1) {
        Swal.fire(
            'Error!',
            CARGA_DATOS__PLANTILLAS__MENSAJES__VALIDACION_CAMPOS.nombre,
            'error'
        )
        return;
    }

    if (($('#emailTemplateSubjectModal').val().trim().length) < 1) {
        Swal.fire(
            'Error!',
            CARGA_DATOS__PLANTILLAS__MENSAJES__VALIDACION_CAMPOS.asunto,
            'error'
        )
        return;
    } 

    if (( $('#myLocationSelectEmailTemplateModal').val() ) < 1) {
        Swal.fire(
            'Error!',
            CARGA_DATOS__PLANTILLAS__MENSAJES__VALIDACION_CAMPOS.ubicacion,
            'error'
        )
        return;
    } 

    if (( $('#myLanguageSelectEmailTemplateModal').val() ) < 1) {
        Swal.fire(
            'Error!',
            CARGA_DATOS__PLANTILLAS__MENSAJES__VALIDACION_CAMPOS.idioma,
            'error'
        )
        return;
    } 

    if (( $('#myActivitySelectEmailTemplateModal').val() ) < 1) {
        Swal.fire(
            'Error!',
            CARGA_DATOS__PLANTILLAS__MENSAJES__VALIDACION_CAMPOS.actividad,
            'error'
        )
        return;
    } 

    if (( $('#myTipologiaEventoSelectEmailTemplateModal').val() ) < 1) {
        Swal.fire(
            'Error!',
            CARGA_DATOS__PLANTILLAS__MENSAJES__VALIDACION_CAMPOS.tipologia_evento,
            'error'
        )
        return;
    } 

    if (( $('#myInvitationTypeSelectEmailTemplateModal').val() ) < 1) {
        Swal.fire(
            'Error!',
            CARGA_DATOS__PLANTILLAS__MENSAJES__VALIDACION_CAMPOS.tipo_invitacion,
            'error'
        )
        return;
    } 

    if (( !content) ) {
        Swal.fire(
            'Error!',
            CARGA_DATOS__PLANTILLAS__MENSAJES__VALIDACION_CAMPOS.contenido,
            'error'
        )
        return;
    } 

    

    if (tipoEdicion == 2) {
        Swal.fire({
            title: GESTION__PLANTILLAS__DIALOGO__MODIFICAR.modificar_plantilla__titulo,
            text: GESTION__PLANTILLAS__DIALOGO__MODIFICAR.modificar_plantilla__texto,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#129443',
            cancelButtonColor: '#d33',
            confirmButtonText: GESTION__PLANTILLAS__DIALOGO__MODIFICAR.modificar_plantilla__boton__confirmar,
            cancelButtonText: GESTION__PLANTILLAS__DIALOGO__MODIFICAR.modificar_plantilla__boton__cancelar
        }).then((result) => {

            if (result.value) {
                axios.post('/templateedit', {
                    templateId: myEmailTemplateId,
                    content: content,
                    asunto: asuntomail,
                    location_id: location_id,
                    lang_id: lang_id,
                    activity_id: activity_id,
                    type_id: type_id,
                    templateName: templateName,
                    invitationTypeId: invitationTypeId,
                })
                    .then(response => {

                        if (response.data.success) {

                            myConfirmMessage = GESTION__PLANTILLAS__DIALOGO__MODIFICAR.todo_ok_plantilla__texto;
                            Swal.fire(
                                GESTION__PLANTILLAS__DIALOGO__MODIFICAR.todo_ok,
                                myConfirmMessage,
                                'success'
                            )

                            $('#emailTemplatesTableMainPanel').DataTable().ajax.reload();

                            closeEmailTemplateModal();
                        } else {
                            Swal.fire(
                                GESTION__PLANTILLAS__DIALOGO__MODIFICAR.error,
                                GESTION__PLANTILLAS__DIALOGO__MODIFICAR.ko,
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
    else {
        Swal.fire({
            title: GESTION__PLANTILLAS__DIALOGO__GUARDAR.guardar_plantilla__titulo,
            text: GESTION__PLANTILLAS__DIALOGO__GUARDAR.guardar_plantilla__texto,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#129443',
            cancelButtonColor: '#d33',
            confirmButtonText: GESTION__PLANTILLAS__DIALOGO__GUARDAR.guardar_plantilla__boton__confirmar,
            cancelButtonText: GESTION__PLANTILLAS__DIALOGO__GUARDAR.guardar_plantilla__boton__cancelar
        }).then((result) => {

            if (result.value) {
                axios.post('/templatestore', {
                    content: content,
                    asunto: asuntomail,
                    location_id: location_id,
                    lang_id: lang_id,
                    activity_id: activity_id,
                    type_id: type_id,
                    templateName: templateName,
                    invitationTypeId: invitationTypeId,
                })
                    .then(response => {

                        if (response.data.success) {

                            myConfirmMessage = GESTION__PLANTILLAS__DIALOGO__GUARDAR.todo_ok_plantilla__texto;
                            Swal.fire(
                                GESTION__PLANTILLAS__DIALOGO__GUARDAR.todo_ok,
                                myConfirmMessage,
                                'success'
                            )

                            $('#emailTemplatesTableMainPanel').DataTable().ajax.reload();
                            closeEmailTemplateModal();

                        } else {
                            Swal.fire(
                                GESTION__PLANTILLAS__DIALOGO__GUARDAR.error,
                                GESTION__PLANTILLAS__DIALOGO__GUARDAR.ko,
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


function editTemplate(myData) {
    

}

function cloneTemplate(myData) {

}

function deleteTemplate(myData) {

    var
        myId = myData['id'];

    Swal.fire({
        title: GESTION__PLANTILLAS__DIALOGO__ELIMINAR.eliminar_plantilla__titulo,
        text: GESTION__PLANTILLAS__DIALOGO__ELIMINAR.eliminar_plantilla__texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: GESTION__PLANTILLAS__DIALOGO__ELIMINAR.eliminar_plantilla__boton__confirmar,
        cancelButtonText: GESTION__PLANTILLAS__DIALOGO__ELIMINAR.eliminar_plantilla__boton__cancelar
    }).then((result) => {

        if (result.value) {

            axios.put('/eliminarplantilla', {
                IDPlantilla: myId,
            })
                .then(response => {

                    if (response.data.success) {

                        Swal.fire(
                            GESTION__PLANTILLAS__DIALOGO__ELIMINAR.todo_ok,
                            GESTION__PLANTILLAS__DIALOGO__ELIMINAR.todo_ok_plantilla__texto,
                            'success'
                        )

                        $('#emailTemplatesTableMainPanel').DataTable().ajax.reload();

                    } else {
                        Swal.fire(
                            GESTION__PLANTILLAS__DIALOGO__ELIMINAR.error,
                            GESTION__PLANTILLAS__DIALOGO__ELIMINAR.ko,
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


function initCKEditor() {

    var EDITOR = CKEDITOR.replace('editorEmailTemplateModal', {
        filebrowserUploadUrl: '/ckeditor/image_upload?type=Images&_token=' + myCSRFToken,
        filebrowserUploadMethod: 'form',
        height: 500
    });

    CKEDITOR.config.language = APPCESS_APP_LANG;
    CKEDITOR.config.removePlugins = 'about';

    emailTemplateEditorPanelModalInitialized = 1
}

function newEmailTemplate() {

    if (emailTemplateEditorPanelModalInitialized == 0) {
        initCKEditor()
    }

    $('#emailTemplateModalTitle').text('Nueva plantilla')
    $('#EmailTemplatesModalBtn').text('Guardar')

    $('#emailTemplateNameModal').val('');
    $('#emailTemplateSubjectModal').val('');

    $('#myLanguageSelectEmailTemplateModal').val(1);
    $('#myInvitationTypeSelectEmailTemplateModal').val(1);

    // $('#myLocationSelectEmailTemplateModal').val(1);
    // $('#myActivitySelectEmailTemplateModal').val(1);
    // $('#myTipologiaEventoSelectEmailTemplateModal').val(3);

    crearListaUbicacionesEmailTemplateModal()
    setTimeout(() => {
        crearListaActividadesEmailTemplateModal(-1)
    }, 400);

    setTimeout(() => {
        crearListaTipologiaEventoSelectEmailTemplateModal(-1)
    }, 800);

    CKEDITOR.instances['editorEmailTemplateModal'].setData('');

    tipoEdicion = 1;

    $('#myModalEmailTemplate').modal('show');

}

function editEmailTemplateModal(myData) {

    if (emailTemplateEditorPanelModalInitialized == 0) {
        initCKEditor()
    }

    $('#emailTemplateModalTitle').text('Editar plantilla')
    $('#EmailTemplateModalBtn').text('Actualizar')

    $('#emailTemplateNameModal').val(myData['name']);
    $('#emailTemplateSubjectModal').val(myData['subject']);

    crearListaUbicacionesEmailTemplateModal()
    setTimeout(() => {
        $('#myLocationSelectEmailTemplateModal').val(myData['location_id']);
        crearListaActividadesEmailTemplateModal(myData['location_id'])
    }, 600);

    setTimeout(() => {
        $('#myActivitySelectEmailTemplateModal').val(myData['activity_id']);
        crearListaTipologiaEventoSelectEmailTemplateModal(myData['activity_id'])
    }, 1500);

    setTimeout(() => {
        $('#myTipologiaEventoSelectEmailTemplateModal').val(myData['activity_type_id']);
    }, 2000);

    $('#myLanguageSelectEmailTemplateModal').val(myData['language_id']);
    $('#myInvitationTypeSelectEmailTemplateModal').val(myData['invitation_type_id']);


    CKEDITOR.instances['editorEmailTemplateModal'].setData(myData['content']);

    tipoEdicion = 2;
    myEmailTemplateId = myData['id'];

    $('#myModalEmailTemplate').modal('show');
}



function clonarEmailTemplateModal(myData) {

    if (emailTemplateEditorPanelModalInitialized == 0) {
        initCKEditor()
    }

    $('#emailTemplateModalTitle').text('Clonar plantilla')
    $('#EmailTemplateModalBtn').text('Guardar ')

    $('#emailTemplateNameModal').val(myData['name']);
    $('#emailTemplateSubjectModal').val(myData['subject']);

    crearListaUbicacionesEmailTemplateModal()
    setTimeout(() => {
        $('#myLocationSelectEmailTemplateModal').val(myData['location_id']);
        crearListaActividadesEmailTemplateModal(myData['location_id'])
    }, 600);

    setTimeout(() => {
        $('#myActivitySelectEmailTemplateModal').val(myData['activity_id']);
        crearListaTipologiaEventoSelectEmailTemplateModal(myData['activity_id'])
    }, 1500);

    setTimeout(() => {
        $('#myTipologiaEventoSelectEmailTemplateModal').val(myData['activity_type_id']);
    }, 2000);

    $('#myLanguageSelectEmailTemplateModal').val(myData['language_id']);
    $('#myInvitationTypeSelectEmailTemplateModal').val(myData['invitation_type_id']);


    CKEDITOR.instances['editorEmailTemplateModal'].setData(myData['content']);

    tipoEdicion = 3;
    myEmailTemplateId = myData['id'];

    $('#myModalEmailTemplate').modal('show');
}



function closeEmailTemplateModal() {
    $('#myModalEmailTemplate').modal('hide');
}