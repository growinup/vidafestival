
function newPurpose() {
    

    $('#purposeModalTitle').text(CARGA_DATOS_MENSAJES_FINALIDADES.modal_titulo_nuevo)
    $('#purposeModalBtn').text(CARGA_DATOS_MENSAJES_FINALIDADES.modal_boton_grabar)

    $('#myPurposeInput').val('');

    tipoEdicion = 1;

    $('#myModalPurpose').modal('show');
}

function editPurpose(myData) {

    $('#purposeModalTitle').text(CARGA_DATOS_MENSAJES_FINALIDADES.modal_titulo_editar)
    $('#purposeModalBtn').text(CARGA_DATOS_MENSAJES_FINALIDADES.modal_boton_actualizar)

    $('#myPurposeInput').val(myData['name']);

    tipoEdicion = 2;
    myPurposeId = myData['id'];

    $('#myModalPurpose').modal('show');
}

function closePurposeModal() {
    $('#myModalPurpose').modal('hide');
}


function processPurpose() {

    if ($('#myPurposeInput').val().length < 1) {
        
        Swal.fire(
            'Error!',
            CARGA_DATOS__FINALIDADES__MENSAJES__VALIDACION_CAMPOS.nombre,
            'warning'
        )
        return;
    }

    if (tipoEdicion == 1) {
        // nuevo

        savePurpose()
    }

    if (tipoEdicion == 2) {
        // nuevo
        updatePurpose()
    }


}

function updatePurpose() {


    var purposeName = $('#myPurposeInput').val();

    Swal.fire({
        title: CARGA_DATOS__FINALIDADES__ALERT__DIALOGO__MODIFICAR.modificar_finalidad_titulo,
        text: CARGA_DATOS__FINALIDADES__ALERT__DIALOGO__MODIFICAR.modificar_finalidad_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__FINALIDADES__ALERT__DIALOGO__MODIFICAR.modificar_finalidad_boton__confirmar,
        cancelButtonText: CARGA_DATOS__FINALIDADES__ALERT__DIALOGO__MODIFICAR.modificar_finalidad_boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/purposeedit', {
                purposeId: myPurposeId,
                name: purposeName,
            })
                .then(response => {

                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__FINALIDADES__ALERT__DIALOGO__MODIFICAR.todo_ok_finalidad_texto;
                        Swal.fire(
                            CARGA_DATOS__FINALIDADES__ALERT__DIALOGO__MODIFICAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#purposesTable').DataTable().ajax.reload();
                        closePurposeModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__FINALIDADES__ALERT__DIALOGO__MODIFICAR.error,
                            CARGA_DATOS__FINALIDADES__ALERT__DIALOGO__MODIFICAR.ko,
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



function savePurpose() {

    var purposeName = $('#myPurposeInput').val();

    Swal.fire({
        title: CARGA_DATOS__FINALIDADES__ALERT__DIALOGO__GUARDAR.guardar_finalidad_titulo,
        text: CARGA_DATOS__FINALIDADES__ALERT__DIALOGO__GUARDAR.guardar_finalidad_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__FINALIDADES__ALERT__DIALOGO__GUARDAR.guardar_finalidad_boton__confirmar,
        cancelButtonText: CARGA_DATOS__FINALIDADES__ALERT__DIALOGO__GUARDAR.guardar_finalidad_boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/purposestore', {
                name: purposeName,
            })
                .then(response => {

                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__FINALIDADES__ALERT__DIALOGO__GUARDAR.todo_ok_finalidad_texto;
                        Swal.fire(
                            CARGA_DATOS__FINALIDADES__ALERT__DIALOGO__GUARDAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#purposesTable').DataTable().ajax.reload();
                        closePurposeModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__FINALIDADES__ALERT__DIALOGO__GUARDAR.error,
                            CARGA_DATOS__FINALIDADES__ALERT__DIALOGO__GUARDAR.ko,
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


function deletePurpose(myData) {

    
    var
        myId = myData['id'];

    Swal.fire({
        title: CARGA_DATOS__FINALIDADES__ALERT__DIALOGO__ELIMINAR.eliminar_finalidad_titulo,
        text: CARGA_DATOS__FINALIDADES__ALERT__DIALOGO__ELIMINAR.eliminar_finalidad_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__FINALIDADES__ALERT__DIALOGO__ELIMINAR.eliminar_finalidad_boton__confirmar,
        cancelButtonText: CARGA_DATOS__FINALIDADES__ALERT__DIALOGO__ELIMINAR.eliminar_finalidad_boton__cancelar
    }).then((result) => {

        if (result.value) {

            axios.put('/eliminarpurpose', {
                IDPurpose: myId,
            })
                .then(response => {

                    if (response.data.success) {
                        
                        Swal.fire(
                            CARGA_DATOS__FINALIDADES__ALERT__DIALOGO__ELIMINAR.todo_ok,
                            CARGA_DATOS__FINALIDADES__ALERT__DIALOGO__ELIMINAR.todo_ok_finalidad_texto,
                            'success'
                        )

                        $('#purposesTable').DataTable().ajax.reload();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__FINALIDADES__ALERT__DIALOGO__ELIMINAR.error,
                            CARGA_DATOS__FINALIDADES__ALERT__DIALOGO__ELIMINAR.ko,
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