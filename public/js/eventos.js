
function crearListaLocationsForEventsPanel() {

    axios.get('/getLocationsall')
        .then(response => {

            if (response.data.success) {

                $("#myLocationEventsPanel").find('option')
                    .remove()
                    .end();

                response.data.data.forEach(location => {

                    $('<option>', {
                        value: location.id,
                        text: location.nombre,
                    }).appendTo('#myLocationEventsPanel');


                });

                myLocationSelectChangeForEventsPanel()

            } else {

            }

        })
        .catch(function (error) {

        });

}

function crearListaActividadesForEventsPanel(locationId) {

    axios.get('/getActividadsall').then(response => {

        if (response.data.success) {


            $("#myActivityEventsPanel").find('option')
                .remove()
                .end();

            response.data.data.forEach(actividad => {

                if (actividad.location_id == locationId) {

                    $('<option>', {
                        value: actividad.id,
                        text: actividad.name,
                    }).appendTo('#myActivityEventsPanel');

                }

            });
            
            myActivitySelectChangeForEventsPanel()

        } else {
        }

    })
        .catch(function (error) {

        });

}

function crearListaTiposActividadForEventsPanel(myactivityId) {

    axios.get('/getTipoActividadsall')
        .then(response => {

            if (response.data.success) {

                $("#myTipologiaEventoPanel").find('option')
                    .remove()
                    .end();

                $('<option>', {
                    value: 0,
                    text: PANEL__EVENTOS__SELECTS.SELECT__TIPOLOGIA_EVENTO_PLACEHOLDER,
                }).appendTo('#myTipologiaEventoPanel');

                response.data.data.forEach(activitytype => {



                    if (activitytype.activity_id == myactivityId) {

                        $('<option>', {
                            value: activitytype.id,
                            text: activitytype.name,
                        }).appendTo('#myTipologiaEventoPanel');

                    }

                });      

        
            myActivityTypeSelectChangeForEventsPanel()

            } else {

            }

        })
        .catch(function (error) {

        });

}

function myLocationSelectChangeForEventsPanel() {
    let myLocationToFilter = $("#myLocationEventsPanel").val()
    crearListaActividadesForEventsPanel(myLocationToFilter)
    filterEventsForEventsPanel();
}

function myActivitySelectChangeForEventsPanel() {
    let myActivityToFilter = $("#myActivityEventsPanel").val()
    crearListaTiposActividadForEventsPanel(myActivityToFilter)
    filterEventsForEventsPanel();
}

function myActivityTypeSelectChangeForEventsPanel() {
    filterEventsForEventsPanel();
}

function filterEventsForEventsPanel() {

    // filtrado tabla 

    let table = $('#myEventSelectTablePanel').DataTable();

    let myActivitySearch = $('#myActivityEventsPanel').val();
    let myActivitTypeSearch = $('#myTipologiaEventoPanel').val();

    if (myActivitTypeSearch == 0) {
        myActivitTypeSearch = '';
    }

    let filteredData = table
        .column(1)
        .search("^" + myActivitySearch + "$", true, false, true)
        .column(5)
        .search(myActivitTypeSearch, true, false, true)
        // .column(10)
        // .search(myActivitTypeSearch, true, false, true)
        .draw();

}


function showModalCrearEvento() {

    $('#myNombreEventoCrearEventoModal').val('');
    $('#myFechaEventoCrearEventoModal').val('');
    $('#myHoraEventoCrearEventoModal').val('');

    $('#myCreateEventModal').modal('show');

}

function closeModalCrearEvento() {
    $('#myCreateEventModal').modal('hide');
}


// inicio funciones para desplegables de la modal de creacion de eventos

function crearListaLocationsForCreateEventsModal() {

    axios.get('/getLocationsall')
        .then(response => {

            if (response.data.success) {

                $("#myUbicacionCrearEventsModal").find('option')
                    .remove()
                    .end();

                response.data.data.forEach(location => {

                    $('<option>', {
                        value: location.id,
                        text: location.nombre,
                    }).appendTo('#myUbicacionCrearEventsModal');

                });

        //        myLocationSelectChangeForCreateEventsModal()

            let myLocationToFilter = $("#myUbicacionCrearEventsModal").val()
            crearListaActividadesForCreateEventsModal(myLocationToFilter)

            } else {

            }

        })
        .catch(function (error) {

        });

}

function crearListaActividadesForCreateEventsModal(locationId) {
    
    

    axios.get('/getActividadsall').then(response => {

        if (response.data.success) {


            $("#myActivityCrearEventosModal").find('option')
                .remove()
                .end();

            $('<option>', {
                value: -1,
                text: MODAL__CREAR_EVENTO.SELECT__ACTIVIDAD_PLACEHOLDER
            }).appendTo('#myActivityCrearEventosModal');

            response.data.data.forEach(actividad => {

                if (actividad.location_id == locationId) {

                    $('<option>', {
                        value: actividad.id,
                        text: actividad.name,
                    }).appendTo('#myActivityCrearEventosModal');

                }

            });

// myActivitySelectChangeForCreateEventsModal()

        } else {
        }

    })
        .catch(function (error) {

        });

}

function crearListaTiposActividadForCreateEventsModal(myactivityId) {

    axios.get('/getTipoActividadsall')
        .then(response => {

            if (response.data.success) {


                $("#myActivityTypeCrearEventosModal").find('option')
                    .remove()
                    .end();

                $('<option>', {
                    value: -1,
                    text: MODAL__CREAR_EVENTO.SELECT__TIPOLOGIA_EVENTO_PLACEHOLDER
                }).appendTo('#myActivityTypeCrearEventosModal');

                response.data.data.forEach(activitytype => {



                    if (activitytype.activity_id == myactivityId) {

                        $('<option>', {
                            value: activitytype.id,
                            text: activitytype.name,
                        }).appendTo('#myActivityTypeCrearEventosModal');

                    }

                });

            } else {

            }

        })
        .catch(function (error) {

        });

}

function myLocationSelectChangeForCreateEventsModal() {
    
    let myLocationToFilter = $("#myUbicacionCrearEventsModal").val()
    crearListaActividadesForCreateEventsModal(myLocationToFilter)
}

function myActivitySelectChangeForCreateEventsModal() {
    let myActivityToFilter = $("#myActivityCrearEventosModal").val()
    crearListaTiposActividadForCreateEventsModal(myActivityToFilter)
}

// fin funciones para desplegables de la modal de creacion de eventos



function createNewEvent() {


    if (($('#myNombreEventoCrearEventoModal').val().trim().length) < 1) {
        Swal.fire(
            'Error!',
            MODALE_EVENTOS__MENSAJES__CAMPOS__OBLIGATORIOS.nombre,
            'error'
        )
        return;
    }

    if (($('#myUbicacionCrearEventsModal').val() < 1) ) {
        Swal.fire(
            'Error!',
            MODALE_EVENTOS__MENSAJES__CAMPOS__OBLIGATORIOS.ubicacion,
            'error'
        )
        return;
    }

    if (($('#myActivityCrearEventosModal').val() < 1) ) {
        Swal.fire(
            'Error!',
            MODALE_EVENTOS__MENSAJES__CAMPOS__OBLIGATORIOS.actividad,
            'error'
        )
        return;
    }    

    if (($('#myActivityTypeCrearEventosModal').val() < 1) ) {
        Swal.fire(
            'Error!',
            MODALE_EVENTOS__MENSAJES__CAMPOS__OBLIGATORIOS.tipo_actividad,
            'error'
        )
        return;
    }        


    try {
        startPreloader()

    let myEventName = $('#myNombreEventoCrearEventoModal').val();

    let myEventConfirmedDate = $('#myFechaNoConfirmadaCrearEventoModal').is(":checked");

    let myEventDate = $('#myFechaEventoCrearEventoModal').val();
    let myEventTime = $('#myHoraEventoCrearEventoModal').val();

    let myEventLocation = $('#myUbicacionCrearEventsModal').val();
    let myActivity = $('#myActivityCrearEventosModal').val();
    let myActivityType = $('#myActivityTypeCrearEventosModal').val();

    axios.post('/createnewevent', {
        nombre: myEventName,
        fecha_confirmada: myEventConfirmedDate,
        fechaevento: myEventDate,
        horaevento: myEventTime,
        ubicacion: myEventLocation,
        actividad: myActivity,
        tipoActividad: myActivityType
    })
        .then(response => {

            if (response.data.success) {


                Swal.fire(
                    MODALE_EVENTOS__DIALOGO__CREAR_EVENTO.todo_ok,
                    MODALE_EVENTOS__DIALOGO__CREAR_EVENTO.todo_ok_evento__texto,
                    'success'
                ).then((value) => {
                    $('#myCreateEventModal').modal('hide');

                    $('#myEventSelectTablePanel').DataTable().ajax.reload();

                    myEventData = response.data.eventData

                    myEventData.fecha = response.data.fecha
                    myEventData.hora = response.data.hora


                    $("#editModalContent").load("./partialhtml/eventos/eventos-modal.html", function () {
                        editEventShowModal()
                        updateTranslations()
                    });

                });

            } else {
                Swal.fire(
                    MODALE_EVENTOS__DIALOGO__CREAR_EVENTO.error,
                    MODALE_EVENTOS__DIALOGO__CREAR_EVENTO.ko,
                    'error'
                )
            }
            stopPreloader()
        })
        .catch(function (error) {
            console.log(error)
            stopPreloader()
        });

    } catch (error) {
        
    } finally {
       // stopPreloader()
    }


}



function deleteEvent(myData) {
    

    // Swal.fire(
    //     'Error!',
    //     'No ha sigut possible eliminar aquest esdeveniment',
    //     'error'
    // )

    // return

    var  myId = myData['id'];

    
    Swal.fire({
        title: MODALE_EVENTOS__DIALOGO__ELIMINAR.eliminar_evento__titulo,
        text: MODALE_EVENTOS__DIALOGO__ELIMINAR.eliminar_evento__texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: MODALE_EVENTOS__DIALOGO__ELIMINAR.eliminar_evento__boton__confirmar,
        cancelButtonText: MODALE_EVENTOS__DIALOGO__ELIMINAR.eliminar_evento__boton__cancelar
    }).then((result) => {

        if (result.value) {

            axios.put('/eliminarevento', {
                eventId: myId,
            })
                .then(response => {

                    if (response.data.success) {
                        
                        Swal.fire(
                            MODALE_EVENTOS__DIALOGO__ELIMINAR.todo_ok,
                            MODALE_EVENTOS__DIALOGO__ELIMINAR.todo_ok_evento__texto,
                            'success'
                        )
               
                        $('#myEventSelectTablePanel').DataTable().ajax.reload();

                    } else {
                        Swal.fire(
                            MODALE_EVENTOS__DIALOGO__ELIMINAR.error,
                            MODALE_EVENTOS__DIALOGO__ELIMINAR.ko,
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