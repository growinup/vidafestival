
function newGuest() {

    $('#guestModalTitle').text(CARGA_DATOS_MENSAJES_ASISTENTES.modal_titulo_nuevo)
    $('#guestsModalBtn').text(CARGA_DATOS_MENSAJES_ASISTENTES.modal_boton_grabar)

    $('#myGuestInputName').val('');
    $('#myGuestInputLastName').val('');
    $('#myGuestInputDni').val('');
    $('#myGuestInputEmail').val('');
    $('#myGuestInputDate').val('');

    $('#esMenorGestionAsistentes').prop('checked', false);

    $("#myGestionAssistenteNacionalitat").val(1);

    tipoEdicion = 1;

    $('#myGuestInputDate').mask('99/99/9999');

    $('#myModalGuest').modal('show');


}

function editGuest(myData) {

    $('#myGuestInputDate').mask('99/99/9999');

    $('#guestModalTitle').text(CARGA_DATOS_MENSAJES_ASISTENTES.modal_titulo_editar)
    $('#guestModalBtn').text(CARGA_DATOS_MENSAJES_ASISTENTES.modal_boton_actualizar)

    $('#myGuestInputName').val(myData['nombre']);
    $('#myGuestInputLastName').val(myData['apellidos']);
    $('#myGuestInputDni').val(myData['dni']);
    $('#myGuestInputEmail').val(myData['email']);
    
    
    let myDate =  moment(myData['fecha_nacimiento']).format('DD/MM/YYYY')
    
    if (myDate == 'Invalid date') {
        myDate = ''
    }
    $('#myGuestInputDate').val(myDate );


    $("#myGestionAssistenteNacionalitat").val(myData['nationality_id'])

    if (myData['es_menor'] == true) {
        $('#esMenorGestionAsistentes').prop('checked', true);
    } else {
        $('#esMenorGestionAsistentes').prop('checked', false);
    }

    tipoEdicion = 2;
    myGuestId = myData['id'];

    $('#myModalGuest').modal('show');
}

function closeGuestModal() {
    $('#myModalGuest').modal('hide');
}


function processGuest() {


    // validar campos añadir asistente

    if (($('#myGuestInputName').val().trim().length) < 1) {
        Swal.fire(
            'Error!',
            CARGA_DATOS__ASISTENTES__MENSAJES__VALIDACION_CAMPOS.nombre,
            'error'
        )
        return;
    }

    if (($('#myGuestInputLastName').val().trim().length) < 1) {
        Swal.fire(
            'Error!',
            CARGA_DATOS__ASISTENTES__MENSAJES__VALIDACION_CAMPOS.apellidos,
            'error'
        )
        return;
    }

    if ((($('#myGuestInputDni').val().trim().length) < 1) && (!$('#esMenorGestionAsistentes').is(":checked"))) {
        Swal.fire(
            'Error!',
            CARGA_DATOS__ASISTENTES__MENSAJES__VALIDACION_CAMPOS.dni,
            'error'
        )
        return;
    }


    if ((($('#myGuestInputEmail').val().trim().length) > 0) &&  (!validateEmail($('#myGuestInputEmail').val() ))   ) {
        Swal.fire(
            'Error!',
            CARGA_DATOS__ASISTENTES__MENSAJES__VALIDACION_CAMPOS.email_incorrecto,
            'error'
        )
        return;
    }





    if (tipoEdicion == 1) {
        // nuevo

        saveGuest()
    }

    if (tipoEdicion == 2) {
        // nuevo
        updateGuest()
    }


}

function updateGuest() {


    var guestName = $('#myGuestInputName').val();
    var guestLastName = $('#myGuestInputLastName').val();
    var guestDni = $('#myGuestInputDni').val();
    var guestEmail = $('#myGuestInputEmail').val();
    var guestDate = $('#myGuestInputDate').val();
    var guestNationality = $("#myGestionAssistenteNacionalitat").val();

    var esMenor = $('#esMenorGestionAsistentes').is(":checked");

    Swal.fire({
        title: CARGA_DATOS__ASISTENTES__ALERT__DIALOGO__MODIFICAR.modificar_asistente_titulo,
        text: CARGA_DATOS__ASISTENTES__ALERT__DIALOGO__MODIFICAR.modificar_asistente_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__ASISTENTES__ALERT__DIALOGO__MODIFICAR.modificar_asistente_boton__confirmar,
        cancelButtonText: CARGA_DATOS__ASISTENTES__ALERT__DIALOGO__MODIFICAR.modificar_asistente_boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/guestedit', {
                guestId: myGuestId,
                name: guestName,
                last_name: guestLastName,
                dni: guestDni,
                email: guestEmail,
                date: guestDate,
                es_menor: esMenor,
                nationality_id: guestNationality
            })
                .then(response => {

                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__ASISTENTES__ALERT__DIALOGO__MODIFICAR.todo_ok_asistente_texto;
                        Swal.fire(
                            CARGA_DATOS__ASISTENTES__ALERT__DIALOGO__MODIFICAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#myGuestsTable').DataTable().ajax.reload();
                        closeGuestModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__ASISTENTES__ALERT__DIALOGO__MODIFICAR.error,
                            CARGA_DATOS__ASISTENTES__ALERT__DIALOGO__MODIFICAR.ko,
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



function saveGuest() {

    var guestName = $('#myGuestInputName').val();
    var guestLastName = $('#myGuestInputLastName').val();
    var guestDni = $('#myGuestInputDni').val();
    var guestEmail = $('#myGuestInputEmail').val();
    var guestDate = $('#myGuestInputDate').val();

    var esMenor = $('#esMenorGestionAsistentes').is(":checked");
    var guestNationality = $("#myGestionAssistenteNacionalitat").val();

    Swal.fire({
        title: CARGA_DATOS__ASISTENTES__ALERT__DIALOGO__GUARDAR.guardar_asistente_titulo,
        text: CARGA_DATOS__ASISTENTES__ALERT__DIALOGO__GUARDAR.guardar_asistente_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__ASISTENTES__ALERT__DIALOGO__GUARDAR.guardar_asistente_boton__confirmar,
        cancelButtonText: CARGA_DATOS__ASISTENTES__ALERT__DIALOGO__GUARDAR.guardar_asistente_boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/gueststore', {
                name: guestName,
                last_name: guestLastName,
                dni: guestDni,
                email: guestEmail,
                date: guestDate,
                es_menor: esMenor,
                nationality_id: guestNationality
            })
                .then(response => {
                    
                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__ASISTENTES__ALERT__DIALOGO__GUARDAR.todo_ok_asistente_texto;
                        Swal.fire(
                            CARGA_DATOS__ASISTENTES__ALERT__DIALOGO__GUARDAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#myGuestsTable').DataTable().ajax.reload();
                        closeGuestModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__ASISTENTES__ALERT__DIALOGO__GUARDAR.error,
                            CARGA_DATOS__ASISTENTES__ALERT__DIALOGO__GUARDAR.ko,
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


function deleteGuest(myData) {

    var
        myId = myData['id'];

    Swal.fire({
        title: CARGA_DATOS__ASISTENTES__ALERT__DIALOGO__ELIMINAR.eliminar_asistente_titulo,
        text: CARGA_DATOS__ASISTENTES__ALERT__DIALOGO__ELIMINAR.eliminar_asistente_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__ASISTENTES__ALERT__DIALOGO__ELIMINAR.eliminar_asistente_boton__confirmar,
        cancelButtonText: CARGA_DATOS__ASISTENTES__ALERT__DIALOGO__ELIMINAR.eliminar_asistente_boton__cancelar
    }).then((result) => {

        if (result.value) {

            axios.put('/eliminarguest', {
                guestId: myId,
            })
                .then(response => {

                    if (response.data.success) {
                        
                        Swal.fire(
                            CARGA_DATOS__ASISTENTES__ALERT__DIALOGO__ELIMINAR.todo_ok,
                            CARGA_DATOS__ASISTENTES__ALERT__DIALOGO__ELIMINAR.todo_ok_asistente_texto,
                            'success'
                        )

                        closeGuestModal()
                        $('#myGuestsTable').DataTable().ajax.reload();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__ASISTENTES__ALERT__DIALOGO__ELIMINAR.error,
                            CARGA_DATOS__ASISTENTES__ALERT__DIALOGO__ELIMINAR.ko,
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


function cargaSelectsGuests() {
    axios.get('/purposes')
        .then(response => {

            if (response.data) {

                $("#myGestionAssistenteNacionalitat").find('option')
                    .remove()
                    .end();

                listaNacionalidades = [];

                response.data.nationalities.forEach(nationality => {
                    $('<option>', {
                        value: nationality.id,
                        text: nationality.name,
                    }).appendTo('#myGestionAssistenteNacionalitat');
                    listaNacionalidades.push(nationality.name)
                });

                $('#myGestionAssistenteNacionalitat').val(1);

               } else {
            }
        })
        .catch(function (error) {
            console.log(error)
        });

}