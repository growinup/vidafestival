function newArea() {

    $('#areaModalTitle').text(CARGA_DATOS_MENSAJES_AREAS.modal_titulo_nuevo)
    $('#areasModalBtn').text(CARGA_DATOS_MENSAJES_AREAS.modal_boton_grabar)

    $('#myAreaInput').val('');

    tipoEdicion = 1;

    $('#myModalArea').modal('show');

  
}
         
function editArea(myData) {
 

    $('#areaModalTitle').text(CARGA_DATOS_MENSAJES_AREAS.modal_titulo_editar)
    $('#areaModalBtn').text(CARGA_DATOS_MENSAJES_AREAS.modal_boton_actualizar)

    $('#myAreaInput').val(myData['nombre']);

    tipoEdicion = 2;
    myAreaId = myData['id'];

    $('#myModalArea').modal('show');
}

function closeAreaModal() {
    $('#myModalArea').modal('hide');
}


function processArea() {

    if ($('#myAreaInput').val().length < 1) {
        
        Swal.fire(
            'Error!',
            CARGA_DATOS__AREAS__MENSAJES__VALIDACION_CAMPOS.nombre,
            'warning'
        )
        return;
    }

    if (tipoEdicion == 1) {
        // nuevo

        saveArea()
    }

    if (tipoEdicion == 2) {
        // nuevo
        updateArea()
    }


}

function updateArea() {


    var areaName = $('#myAreaInput').val();

    Swal.fire({
        title: CARGA_DATOS__AREAS__ALERT__DIALOGO__MODIFICAR.modificar_area_titulo,
        text: CARGA_DATOS__AREAS__ALERT__DIALOGO__MODIFICAR.modificar_area_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__AREAS__ALERT__DIALOGO__MODIFICAR.modificar_area_boton__confirmar,
        cancelButtonText: CARGA_DATOS__AREAS__ALERT__DIALOGO__MODIFICAR.modificar_area_boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/areaedit', {
                areaId: myAreaId,
                name: areaName,
            })
                .then(response => {

                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__AREAS__ALERT__DIALOGO__MODIFICAR.todo_ok_area_texto;
                        Swal.fire(
                            CARGA_DATOS__AREAS__ALERT__DIALOGO__MODIFICAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#areasTable').DataTable().ajax.reload();
                        closeAreaModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__AREAS__ALERT__DIALOGO__MODIFICAR.error,
                            CARGA_DATOS__AREAS__ALERT__DIALOGO__MODIFICAR.ko,
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



function saveArea() {

    var areaName = $('#myAreaInput').val();

    Swal.fire({
        title: CARGA_DATOS__AREAS__ALERT__DIALOGO__GUARDAR.guardar_area_titulo,
        text: CARGA_DATOS__AREAS__ALERT__DIALOGO__GUARDAR.guardar_area_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__AREAS__ALERT__DIALOGO__GUARDAR.guardar_area_boton__confirmar,
        cancelButtonText: CARGA_DATOS__AREAS__ALERT__DIALOGO__GUARDAR.guardar_area_boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/areastore', {
                name: areaName,
                tipo_ubicacion_id: 1
            })
                .then(response => {

                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__AREAS__ALERT__DIALOGO__GUARDAR.todo_ok_area_texto;
                        Swal.fire(
                            CARGA_DATOS__AREAS__ALERT__DIALOGO__GUARDAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#areasTable').DataTable().ajax.reload();
                        closeAreaModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__AREAS__ALERT__DIALOGO__GUARDAR.error,
                            CARGA_DATOS__AREAS__ALERT__DIALOGO__GUARDAR.ko,
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


function deleteArea(myData) {


    var
        myId = myData['id'];

    Swal.fire({
        title: CARGA_DATOS__AREAS__ALERT__DIALOGO__ELIMINAR.eliminar_area_titulo,
        text: CARGA_DATOS__AREAS__ALERT__DIALOGO__ELIMINAR.eliminar_area_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__AREAS__ALERT__DIALOGO__ELIMINAR.eliminar_area_boton__confirmar,
        cancelButtonText: CARGA_DATOS__AREAS__ALERT__DIALOGO__ELIMINAR.eliminar_area_boton__cancelar
    }).then((result) => {

        if (result.value) {

            axios.put('/eliminararea', {
                areaId: myId,
            })
                .then(response => {

                    if (response.data.success) {
                        
                        Swal.fire(
                            CARGA_DATOS__AREAS__ALERT__DIALOGO__ELIMINAR.todo_ok,
                            CARGA_DATOS__AREAS__ALERT__DIALOGO__ELIMINAR.todo_ok_area_texto,
                            'success'
                        )
                        
                        closeAreaModal()
                        $('#areasTable').DataTable().ajax.reload();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__AREAS__ALERT__DIALOGO__ELIMINAR.error,
                            CARGA_DATOS__AREAS__ALERT__DIALOGO__ELIMINAR.ko,
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


