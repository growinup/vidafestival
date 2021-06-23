
function newNationality() {

    $('#nationalityModalTitle').text(CARGA_DATOS_MENSAJES_NACIONALIDADES.modal_titulo_nuevo)
    $('#nationalitiesModalBtn').text(CARGA_DATOS_MENSAJES_NACIONALIDADES.modal_boton_grabar)

    $('#myNationalityInput').val('');

    tipoEdicion = 1;

    $('#myModalNationality').modal('show');
}
         
function editNationality(myData) {
 

    $('#nationalityModalTitle').text(CARGA_DATOS_MENSAJES_NACIONALIDADES.modal_titulo_editar)
    $('#nationalityModalBtn').text(CARGA_DATOS_MENSAJES_NACIONALIDADES.modal_boton_actualizar)

    $('#myNationalityInput').val(myData['name']);

    tipoEdicion = 2;
    myNationalityId = myData['id'];

    $('#myModalNationality').modal('show');
}

function closeNationalityModal() {
    $('#myModalNationality').modal('hide');
}


function processNationality() {

    if ($('#myNationalityInput').val().length < 1) {
        
        Swal.fire(
            'Error!',
            CARGA_DATOS__NACIONALIDAD__MENSAJES__VALIDACION_CAMPOS.nombre,
            'warning'
        )
        return;
    }

    if (tipoEdicion == 1) {
        // nuevo

        saveNationality()
    }

    if (tipoEdicion == 2) {
        // nuevo
        updateNationality()
    }


}

function updateNationality() {


    var nationalityName = $('#myNationalityInput').val();

    Swal.fire({
        title: CARGA_DATOS__NACIONALIDADES__ALERT__DIALOGO__MODIFICAR.modificar_nacionalidad_titulo,
        text: CARGA_DATOS__NACIONALIDADES__ALERT__DIALOGO__MODIFICAR.modificar_nacionalidad_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__NACIONALIDADES__ALERT__DIALOGO__MODIFICAR.modificar_nacionalidad_boton__confirmar,
        cancelButtonText: CARGA_DATOS__NACIONALIDADES__ALERT__DIALOGO__MODIFICAR.modificar_nacionalidad_boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/nationalityedit', {
                nationalityId: myNationalityId,
                name: nationalityName,
            })
                .then(response => {

                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__NACIONALIDADES__ALERT__DIALOGO__MODIFICAR.todo_ok_nacionalidad_texto;
                        Swal.fire(
                            CARGA_DATOS__NACIONALIDADES__ALERT__DIALOGO__MODIFICAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#nationalitiesTable').DataTable().ajax.reload();
                        closeNationalityModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__NACIONALIDADES__ALERT__DIALOGO__MODIFICAR.error,
                            CARGA_DATOS__NACIONALIDADES__ALERT__DIALOGO__MODIFICAR.ko,
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



function saveNationality() {

    var nationalityName = $('#myNationalityInput').val();

    Swal.fire({
        title: CARGA_DATOS__NACIONALIDADES__ALERT__DIALOGO__GUARDAR.guardar_nacionalidad_titulo,
        text: CARGA_DATOS__NACIONALIDADES__ALERT__DIALOGO__GUARDAR.guardar_nacionalidad_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__NACIONALIDADES__ALERT__DIALOGO__GUARDAR.guardar_nacionalidad_boton__confirmar,
        cancelButtonText: CARGA_DATOS__NACIONALIDADES__ALERT__DIALOGO__GUARDAR.guardar_nacionalidad_boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/nationalitystore', {
                name: nationalityName,
            })
                .then(response => {

                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__NACIONALIDADES__ALERT__DIALOGO__GUARDAR.todo_ok_nacionalidad_texto;
                        Swal.fire(
                            CARGA_DATOS__NACIONALIDADES__ALERT__DIALOGO__GUARDAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#nationalitiesTable').DataTable().ajax.reload();
                        closeNationalityModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__NACIONALIDADES__ALERT__DIALOGO__GUARDAR.error,
                            CARGA_DATOS__NACIONALIDADES__ALERT__DIALOGO__GUARDAR.ko,
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


function deleteNationality(myData) {


    var
        myId = myData['id'];

    Swal.fire({
        title: CARGA_DATOS__NACIONALIDADES__ALERT__DIALOGO__ELIMINAR.eliminar_nacionalidad_titulo,
        text: CARGA_DATOS__NACIONALIDADES__ALERT__DIALOGO__ELIMINAR.eliminar_nacionalidad_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__NACIONALIDADES__ALERT__DIALOGO__ELIMINAR.eliminar_nacionalidad_boton__confirmar,
        cancelButtonText: CARGA_DATOS__NACIONALIDADES__ALERT__DIALOGO__ELIMINAR.eliminar_nacionalidad_boton__cancelar
    }).then((result) => {

        if (result.value) {

            axios.put('/eliminarnationality', {
                nationalityId: myId,
            })
                .then(response => {

                    if (response.data.success) {
                        
                        Swal.fire(
                            CARGA_DATOS__NACIONALIDADES__ALERT__DIALOGO__ELIMINAR.todo_ok,
                            CARGA_DATOS__NACIONALIDADES__ALERT__DIALOGO__ELIMINAR.todo_ok_nacionalidad_texto,
                            'success'
                        )

                        $('#nationalitiesTable').DataTable().ajax.reload();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__NACIONALIDADES__ALERT__DIALOGO__ELIMINAR.error,
                            CARGA_DATOS__NACIONALIDADES__ALERT__DIALOGO__ELIMINAR.ko,
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