var tipoEdicion = 0;
var myPurposeId = 0;

function newInvitationType() {

    $('#invitationTypeModalTitle').text(CARGA_DATOS_MENSAJES_TIPOS_INVITACION.modal_titulo_nuevo)
    $('#invitationTypesModalBtn').text(CARGA_DATOS_MENSAJES_TIPOS_INVITACION.modal_boton_grabar)

    $('#myInvitationTypeInput').val('');

    tipoEdicion = 1;

    $('#myModalInvitationType').modal('show');
}
         
function editInvitationType(myData) {
 

    $('#invitationTypeModalTitle').text(CARGA_DATOS_MENSAJES_TIPOS_INVITACION.modal_titulo_editar)
    $('#invitationTypeModalBtn').text(CARGA_DATOS_MENSAJES_TIPOS_INVITACION.modal_titulo_editar)

    $('#myInvitationTypeInput').val(myData['nombre']);

    tipoEdicion = 2;
    myInvitationTypeId = myData['id'];

    $('#myModalInvitationType').modal('show');
}

function closeInvitationTypeModal() {
    $('#myModalInvitationType').modal('hide');
}


function processInvitationType() {

    if ($('#myInvitationTypeInput').val().length < 1) {
                

        Swal.fire(
            'Error!',
            CARGA_DATOS__TIPOS_INVITACION__MENSAJES__VALIDACION_CAMPOS.nombre,
            'warning'
        )
        return;
    }

    if (tipoEdicion == 1) {
        // nuevo

        saveInvitationType()
    }

    if (tipoEdicion == 2) {
        // nuevo
        updateInvitationType()
    }


}

function updateInvitationType() {


    var invitationTypeName = $('#myInvitationTypeInput').val();

    Swal.fire({
        title: CARGA_DATOS__TIPOS_INVITACION__ALERT__DIALOGO__MODIFICAR.modificar_tipos_invitacion_titulo,
        text: CARGA_DATOS__TIPOS_INVITACION__ALERT__DIALOGO__MODIFICAR.modificar_tipos_invitacion_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__TIPOS_INVITACION__ALERT__DIALOGO__MODIFICAR.modificar_tipos_invitacion_boton__confirmar,
        cancelButtonText: CARGA_DATOS__TIPOS_INVITACION__ALERT__DIALOGO__MODIFICAR.modificar_tipos_invitacion_boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/invitationtypeedit', {
                invitationTypeId: myInvitationTypeId,
                name: invitationTypeName,
            })
                .then(response => {

                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__TIPOS_INVITACION__ALERT__DIALOGO__MODIFICAR.todo_ok_tipos_invitacion_texto;
                        Swal.fire(
                            CARGA_DATOS__TIPOS_INVITACION__ALERT__DIALOGO__MODIFICAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#invitationsTypeTable').DataTable().ajax.reload();
                        closeInvitationTypeModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__TIPOS_INVITACION__ALERT__DIALOGO__MODIFICAR.error,
                            CARGA_DATOS__TIPOS_INVITACION__ALERT__DIALOGO__MODIFICAR.ko,
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



function saveInvitationType() {

    var invitationTypeName = $('#myInvitationTypeInput').val();

    Swal.fire({
        title: CARGA_DATOS__TIPOS_INVITACION__ALERT__DIALOGO__GUARDAR.guardar_tipos_invitacion_titulo,
        text: CARGA_DATOS__TIPOS_INVITACION__ALERT__DIALOGO__GUARDAR.guardar_tipos_invitacion_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__TIPOS_INVITACION__ALERT__DIALOGO__GUARDAR.guardar_tipos_invitacion_boton__confirmar,
        cancelButtonText: CARGA_DATOS__TIPOS_INVITACION__ALERT__DIALOGO__GUARDAR.guardar_tipos_invitacion_boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/invitationtypestore', {
                name: invitationTypeName,
                tipo_ubicacion_id: 1
            })
                .then(response => {

                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__TIPOS_INVITACION__ALERT__DIALOGO__GUARDAR.todo_ok_tipos_invitacion_texto;
                        Swal.fire(
                            CARGA_DATOS__TIPOS_INVITACION__ALERT__DIALOGO__GUARDAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#invitationsTypeTable').DataTable().ajax.reload();
                        closeInvitationTypeModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__TIPOS_INVITACION__ALERT__DIALOGO__GUARDAR.error,
                            CARGA_DATOS__TIPOS_INVITACION__ALERT__DIALOGO__GUARDAR.ko,
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


function deleteInvitationType(myData) {


    var
        myId = myData['id'];

    Swal.fire({
        title: CARGA_DATOS__TIPOS_INVITACION__ALERT__DIALOGO__ELIMINAR.eliminar_tipos_invitacion_titulo,
        text: CARGA_DATOS__TIPOS_INVITACION__ALERT__DIALOGO__ELIMINAR.eliminar_tipos_invitacion_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__TIPOS_INVITACION__ALERT__DIALOGO__ELIMINAR.eliminar_tipos_invitacion_boton__confirmar,
        cancelButtonText: CARGA_DATOS__TIPOS_INVITACION__ALERT__DIALOGO__ELIMINAR.eliminar_tipos_invitacion_boton__cancelar
    }).then((result) => {

        if (result.value) {

            axios.put('/eliminarinvitationtype', {
                invitationTypeId: myId,
            })
                .then(response => {

                    if (response.data.success) {
                        
                        Swal.fire(
                            CARGA_DATOS__TIPOS_INVITACION__ALERT__DIALOGO__ELIMINAR.todo_ok,
                            CARGA_DATOS__TIPOS_INVITACION__ALERT__DIALOGO__ELIMINAR.todo_ok_tipos_invitacion_texto,
                            'success'
                        )
                        
                        closeInvitationTypeModal()
                        $('#invitationsTypeTable').DataTable().ajax.reload();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__TIPOS_INVITACION__ALERT__DIALOGO__ELIMINAR.error,
                            CARGA_DATOS__TIPOS_INVITACION__ALERT__DIALOGO__ELIMINAR.ko,
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