function newLocation() {

    $('#locationModalTitle').text(CARGA_DATOS_MENSAJES_UBICACIONES.modal_titulo_nuevo)
    $('#locationsModalBtn').text(CARGA_DATOS_MENSAJES_UBICACIONES.modal_boton_grabar)

    $('#myLocationInput').val('');

    tipoEdicion = 1;

    $('#myModalLocation').modal('show');
}

function editLocation(myData) {


    $('#locationModalTitle').text(CARGA_DATOS_MENSAJES_UBICACIONES.modal_titulo_editar)
    $('#locationModalBtn').text(CARGA_DATOS_MENSAJES_UBICACIONES.modal_boton_actualizar)

    $('#myLocationInput').val(myData['nombre']);

    tipoEdicion = 2;
    myLocationId = myData['id'];

    $('#myModalLocation').modal('show');
}

function closeLocationModal() {
    $('#myModalLocation').modal('hide');
}


function processLocation() {

    if ($('#myLocationInput').val().length < 1) {
        
        Swal.fire(
            'Error!',
            CARGA_DATOS__UBICACIONES__MENSAJES__VALIDACION_CAMPOS.nombre,
            'warning'
        )
        return;
    }

    if (tipoEdicion == 1) {
        // nuevo

        saveLocation()
    }

    if (tipoEdicion == 2) {
        // nuevo
        updateLocation()
    }


}

function updateLocation() {


    var locationName = $('#myLocationInput').val();

    Swal.fire({
        title: CARGA_DATOS__UBICACIONES__ALERT__DIALOGO__MODIFICAR.modificar_ubicacion__titulo,
        text: CARGA_DATOS__UBICACIONES__ALERT__DIALOGO__MODIFICAR.modificar_ubicacion__texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__UBICACIONES__ALERT__DIALOGO__MODIFICAR.modificar_ubicacion__boton__confirmar,
        cancelButtonText: CARGA_DATOS__UBICACIONES__ALERT__DIALOGO__MODIFICAR.modificar_ubicacion__boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/locationedit', {
                locationId: myLocationId,
                name: locationName,
            })
                .then(response => {

                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__UBICACIONES__ALERT__DIALOGO__MODIFICAR.todo_ok_ubicacion__texto;
                        Swal.fire(
                            CARGA_DATOS__UBICACIONES__ALERT__DIALOGO__MODIFICAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#locationsTable').DataTable().ajax.reload();
                        closeLocationModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__UBICACIONES__ALERT__DIALOGO__MODIFICAR.error,
                            CARGA_DATOS__UBICACIONES__ALERT__DIALOGO__MODIFICAR.ko,
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



function saveLocation() {

    var locationName = $('#myLocationInput').val();

    Swal.fire({
        title: CARGA_DATOS__UBICACIONES__ALERT__DIALOGO__GUARDAR.guardar_ubicacion__titulo,
        text: CARGA_DATOS__UBICACIONES__ALERT__DIALOGO__GUARDAR.guardar_ubicacion__texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__UBICACIONES__ALERT__DIALOGO__GUARDAR.guardar_ubicacion__boton__confirmar,
        cancelButtonText: CARGA_DATOS__UBICACIONES__ALERT__DIALOGO__GUARDAR.guardar_ubicacion__boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/locationstore', {
                name: locationName,
                tipo_ubicacion_id: 1
            })
                .then(response => {

                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__UBICACIONES__ALERT__DIALOGO__GUARDAR.todo_ok_ubicacion__texto;
                        Swal.fire(
                            CARGA_DATOS__UBICACIONES__ALERT__DIALOGO__GUARDAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#locationsTable').DataTable().ajax.reload();
                        closeLocationModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__UBICACIONES__ALERT__DIALOGO__GUARDAR.error,
                            CARGA_DATOS__UBICACIONES__ALERT__DIALOGO__GUARDAR.ko,
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


function deleteLocation(myData) {


    var
        myId = myData['id'];

    Swal.fire({
        title: CARGA_DATOS__UBICACIONES__ALERT__DIALOGO__ELIMINAR.eliminar_ubicacion__titulo,
        text: CARGA_DATOS__UBICACIONES__ALERT__DIALOGO__ELIMINAR.eliminar_ubicacion__texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__UBICACIONES__ALERT__DIALOGO__ELIMINAR.eliminar_ubicacion__boton__confirmar,
        cancelButtonText: CARGA_DATOS__UBICACIONES__ALERT__DIALOGO__ELIMINAR.eliminar_ubicacion__boton__cancelar
    }).then((result) => {

        if (result.value) {

            axios.put('/eliminarlocation', {
                locationId: myId,
            })
                .then(response => {

                    if (response.data.success) {
                        
                        Swal.fire(
                            CARGA_DATOS__UBICACIONES__ALERT__DIALOGO__ELIMINAR.todo_ok,
                            CARGA_DATOS__UBICACIONES__ALERT__DIALOGO__ELIMINAR.todo_ok_ubicacion__texto,
                            'success'
                        )

                        closeLocationModal()
                        $('#locationsTable').DataTable().ajax.reload();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__UBICACIONES__ALERT__DIALOGO__ELIMINAR.error,
                            CARGA_DATOS__UBICACIONES__ALERT__DIALOGO__ELIMINAR.ko,
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

