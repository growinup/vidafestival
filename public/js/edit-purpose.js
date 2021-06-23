
function newEditPurpose() {
    
    $('#purposeEditModalTitle').text(CARGA_DATOS_MENSAJES_MOTIVOS_EDICION_PETICION.modal_titulo_nuevo)
    $('#purposeModalBtn').text(CARGA_DATOS_MENSAJES_MOTIVOS_EDICION_PETICION.modal_boton_grabar)

    $('#myEditPurposeInput').val('');

    tipoEdicion = 1;

    $('#myModalEditPurpose').modal('show');
}

function editEditPurpose(myData) {

    $('#purposeEditModalTitle').text(CARGA_DATOS_MENSAJES_MOTIVOS_EDICION_PETICION.modal_titulo_editar)
    $('#purposeModalBtn').text(CARGA_DATOS_MENSAJES_MOTIVOS_EDICION_PETICION.modal_boton_actualizar)

    $('#myEditPurposeInput').val(myData['name']);

    tipoEdicion = 2;
    myPurposeId = myData['id'];

    $('#myModalEditPurpose').modal('show');
}

function closeEditPurposeModal() {
    $('#myModalEditPurpose').modal('hide');
}


function processEditPurpose() {

    if ($('#myEditPurposeInput').val().length < 1) {
        
        Swal.fire(
            'Error!',
            CARGA_DATOS__MOTIVOS__MENSAJES__VALIDACION_CAMPOS.nombre,
            'warning'
        )
        return;
    }

    if (tipoEdicion == 1) {
        // nuevo

        saveEditPurpose()
    }

    if (tipoEdicion == 2) {
        // nuevo
        updateEditPurpose()
    }


}

function updateEditPurpose() {


    var purposeName = $('#myEditPurposeInput').val();

    Swal.fire({
        title: CARGA_DATOS__MOTIVOS__ALERT__DIALOGO__MODIFICAR.modificar_motivos_titulo,
        text: CARGA_DATOS__MOTIVOS__ALERT__DIALOGO__MODIFICAR.modificar_motivos_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__MOTIVOS__ALERT__DIALOGO__MODIFICAR.modificar_motivos_boton__confirmar,
        cancelButtonText: CARGA_DATOS__MOTIVOS__ALERT__DIALOGO__MODIFICAR.modificar_motivos_boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/editpurposeedit', {
                purposeId: myPurposeId,
                name: purposeName,
            })
                .then(response => {

                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__MOTIVOS__ALERT__DIALOGO__MODIFICAR.todo_ok_motivos_texto;
                        Swal.fire(
                            CARGA_DATOS__MOTIVOS__ALERT__DIALOGO__MODIFICAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#editPurposesTable').DataTable().ajax.reload();
                        closeEditPurposeModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__MOTIVOS__ALERT__DIALOGO__MODIFICAR.error,
                            CARGA_DATOS__MOTIVOS__ALERT__DIALOGO__MODIFICAR.ko,
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



function saveEditPurpose() {

    var purposeName = $('#myEditPurposeInput').val();

    Swal.fire({
        title: CARGA_DATOS__MOTIVOS__ALERT__DIALOGO__GUARDAR.guardar_motivos_titulo,
        text: CARGA_DATOS__MOTIVOS__ALERT__DIALOGO__GUARDAR.guardar_motivos_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__MOTIVOS__ALERT__DIALOGO__GUARDAR.guardar_motivos_boton__confirmar,
        cancelButtonText: CARGA_DATOS__MOTIVOS__ALERT__DIALOGO__GUARDAR.guardar_motivos_boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/editpurposestore', {
                name: purposeName,
            })
                .then(response => {

                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__MOTIVOS__ALERT__DIALOGO__GUARDAR.todo_ok_motivos_texto;
                        Swal.fire(
                            CARGA_DATOS__MOTIVOS__ALERT__DIALOGO__GUARDAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#editPurposesTable').DataTable().ajax.reload();
                        closeEditPurposeModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__MOTIVOS__ALERT__DIALOGO__GUARDAR.error,
                            CARGA_DATOS__MOTIVOS__ALERT__DIALOGO__GUARDAR.ko,
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


function deleteEditPurpose(myData) {

    
    var
        myId = myData['id'];

    Swal.fire({
        title: CARGA_DATOS__MOTIVOS__ALERT__DIALOGO__ELIMINAR.eliminar_motivos_titulo,
        text: CARGA_DATOS__MOTIVOS__ALERT__DIALOGO__ELIMINAR.eliminar_motivos_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__MOTIVOS__ALERT__DIALOGO__ELIMINAR.eliminar_motivos_boton__confirmar,
        cancelButtonText: CARGA_DATOS__MOTIVOS__ALERT__DIALOGO__ELIMINAR.eliminar_motivos_boton__cancelar
    }).then((result) => {

        if (result.value) {

            axios.put('/eliminareditpurpose', {
                IDPurpose: myId,
            })
                .then(response => {

                    if (response.data.success) {

                        Swal.fire(
                            CARGA_DATOS__MOTIVOS__ALERT__DIALOGO__ELIMINAR.todo_ok,
                            CARGA_DATOS__MOTIVOS__ALERT__DIALOGO__ELIMINAR.todo_ok_motivos_texto,
                            'success'
                        )

                        $('#editPurposesTable').DataTable().ajax.reload();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__MOTIVOS__ALERT__DIALOGO__ELIMINAR.error,
                            CARGA_DATOS__MOTIVOS__ALERT__DIALOGO__ELIMINAR.ko,
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