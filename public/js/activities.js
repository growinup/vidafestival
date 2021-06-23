var tipoEdicion = 0;
var myPurposeId = 0;

function newActivity() {

    $('#activityModalTitle').text(CARGA_DATOS_MENSAJES_ACTIVIDADES.modal_titulo_nuevo)
    $('#activitysModalBtn').text(CARGA_DATOS_MENSAJES_ACTIVIDADES.modal_boton_grabar)

    $('#myActivityInput').val('');

    tipoEdicion = 1;

    $('#myModalActivity').modal('show');


}

function editActivity(myData) {


    $('#activityModalTitle').text(CARGA_DATOS_MENSAJES_ACTIVIDADES.modal_titulo_editar)
    $('#activityModalBtn').text(CARGA_DATOS_MENSAJES_ACTIVIDADES.modal_boton_actualizar)

    $('#myActivityInput').val(myData['name']);

    tipoEdicion = 2;
    myActivityId = myData['id'];

    $('#myModalActivity').modal('show');
}

function closeActivityModal() {
    $('#myModalActivity').modal('hide');
}


function processActivity() {

    if ($('#myActivityInput').val().length < 1) {
        console.log($('#myActivityInput').val().length)
        Swal.fire(
            'Error!',
            CARGA_DATOS__TIPOLOGIA_ACTIVIDAD__MENSAJES__VALIDACION_CAMPOS.nombre,
            'warning'
        )
        return;
    }

    if (tipoEdicion == 1) {
        // nuevo

        saveActivity()
    }

    if (tipoEdicion == 2) {
        // nuevo
        updateActivity()
    }


}

function updateActivity() {

    var activityName = $('#myActivityInput').val();

    Swal.fire({
        title: CARGA_DATOS__ACTIVIDADES__ALERT__DIALOGO__MODIFICAR.modificar_actividad_titulo,
        text: CARGA_DATOS__ACTIVIDADES__ALERT__DIALOGO__MODIFICAR.modificar_actividad_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__ACTIVIDADES__ALERT__DIALOGO__MODIFICAR.modificar_actividad_boton__confirmar,
        cancelButtonText: CARGA_DATOS__ACTIVIDADES__ALERT__DIALOGO__MODIFICAR.modificar_actividad_boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/actividadedit', {
                activityId: myActivityId,
                name: activityName,
            })
                .then(response => {

                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__ACTIVIDADES__ALERT__DIALOGO__MODIFICAR.todo_ok_actividad_texto;
                        Swal.fire(
                            CARGA_DATOS__ACTIVIDADES__ALERT__DIALOGO__MODIFICAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#activitiesTable').DataTable().ajax.reload();
                        closeActivityModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__ACTIVIDADES__ALERT__DIALOGO__MODIFICAR.error,
                            CARGA_DATOS__ACTIVIDADES__ALERT__DIALOGO__MODIFICAR.ko,
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



function saveActivity() {

    var activityName = $('#myActivityInput').val();
    var locationId = $('#locationsList').val();

    Swal.fire({
        title: CARGA_DATOS__ACTIVIDADES__ALERT__DIALOGO__GUARDAR.guardar_actividad_titulo,
        text: CARGA_DATOS__ACTIVIDADES__ALERT__DIALOGO__GUARDAR.guardar_actividad_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__ACTIVIDADES__ALERT__DIALOGO__GUARDAR.guardar_actividad_boton__confirmar,
        cancelButtonText: CARGA_DATOS__ACTIVIDADES__ALERT__DIALOGO__GUARDAR.guardar_actividad_boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/actividadstore', {
                name: activityName,
                locationId: locationId
            })
                .then(response => {

                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__ACTIVIDADES__ALERT__DIALOGO__GUARDAR.todo_ok_actividad_texto;
                        Swal.fire(
                            CARGA_DATOS__ACTIVIDADES__ALERT__DIALOGO__GUARDAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#activitiesTable').DataTable().ajax.reload();
                        closeActivityModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__ACTIVIDADES__ALERT__DIALOGO__GUARDAR.error,
                            CARGA_DATOS__ACTIVIDADES__ALERT__DIALOGO__GUARDAR,ko,
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


function deleteActivity(myData) {


    var
        myId = myData['id'];

    Swal.fire({
        title: CARGA_DATOS__ACTIVIDADES__ALERT__DIALOGO__ELIMINAR.eliminar_actividad_titulo,
        text: CARGA_DATOS__ACTIVIDADES__ALERT__DIALOGO__ELIMINAR.eliminar_actividad_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__ACTIVIDADES__ALERT__DIALOGO__ELIMINAR.eliminar_actividad_boton__confirmar,
        cancelButtonText: CARGA_DATOS__ACTIVIDADES__ALERT__DIALOGO__ELIMINAR.eliminar_actividad_boton__cancelar
    }).then((result) => {

        if (result.value) {

            axios.put('/eliminaractividad', {
                activityId: myId,
            })
                .then(response => {

                    if (response.data.success) {
                        console.log(response.data.data)
                        Swal.fire(
                            CARGA_DATOS__ACTIVIDADES__ALERT__DIALOGO__ELIMINAR.todo_ok,
                            CARGA_DATOS__ACTIVIDADES__ALERT__DIALOGO__ELIMINAR.todo_ok_actividad_texto,
                            'success'
                        )

                        closeActivityModal()
                        $('#activitiesTable').DataTable().ajax.reload();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__ACTIVIDADES__ALERT__DIALOGO__ELIMINAR.error,
                            CARGA_DATOS__ACTIVIDADES__ALERT__DIALOGO__ELIMINAR.ko,
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



function crearListaUbicaciones() {

    axios.get('/getLocationsall')
        .then(response => {

            if (response.data.success) {

                response.data.data.forEach(area => {

                    $('<option>', {
                        value: area.id,
                        text: area.nombre,
                    }).appendTo('#locationsList');


                });

                locationsListChange()

            } else {

            }

        })
        .catch(function (error) {

        });

}

function locationsListChange() {
    console.log($('#locationsList').val())

    var table = $('#activitiesTable').DataTable();
    var myAreaValue = $('#locationsList').val();

    var filteredData = table
        .column(1)
        .search("^" + myAreaValue + "$", true, false, true)
        .draw();


}


function filtrarDepartamentos() {

    // filtrado tabla por departamento
    var table = $('#cuposdepartamentosgenerico').DataTable();
    var myAreaValue = $('#myArea').val();

    var filteredData = table
        .column(1)
        .search("^" + myAreaValue + "$", true, false, true)
        .draw();

}