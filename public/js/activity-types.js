
function newActivityType() {

    $('#activityTypeModalTitle').text(CARGA_DATOS_MENSAJES_TIPOLOGIA_EVENTOS.modal_titulo_nuevo)
    $('#activityTypesModalBtn').text(CARGA_DATOS_MENSAJES_TIPOLOGIA_EVENTOS.modal_boton_grabar)

    $('#myActivityTypeInput').val('');

    tipoEdicion = 1;

    $('#myModalActivityType').modal('show');
  
}
         
function editActivityType(myData) {
 

    $('#activityTypeModalTitle').text(CARGA_DATOS_MENSAJES_TIPOLOGIA_EVENTOS.modal_titulo_editar)
    $('#activityTypeModalBtn').text(CARGA_DATOS_MENSAJES_TIPOLOGIA_EVENTOS.modal_boton_actualizar)

    $('#myActivityTypeInput').val(myData['name']);
    
    tipoEdicion = 2;
    myActivityTypeId = myData['id'];

    $('#myModalActivityType').modal('show');
}

function closeActivityTypeModal() {
    $('#myModalActivityType').modal('hide');
}


function processActivityType() {

    if ($('#myActivityTypeInput').val().length < 1) {
        console.log($('#myActivityTypeInput').val().length)
        Swal.fire(
            'Error!',
            CARGA_DATOS__TIPOLOGIA_EVENTO__MENSAJES__VALIDACION_CAMPOS.nombre,
            'warning'
        )
        return;
    }

    if (tipoEdicion == 1) {
        // nuevo

        saveActivityType()
    }

    if (tipoEdicion == 2) {
        // nuevo
        updateActivityType()
    }


}

function updateActivityType() {

    var activityTypeName = $('#myActivityTypeInput').val();

    Swal.fire({
        title: CARGA_DATOS__TIPOLOGIA_EVENTOS__ALERT__DIALOGO__MODIFICAR.modificar_tipologia_evento_titulo,
        text: CARGA_DATOS__TIPOLOGIA_EVENTOS__ALERT__DIALOGO__MODIFICAR.modificar_tipologia_evento_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__TIPOLOGIA_EVENTOS__ALERT__DIALOGO__MODIFICAR.modificar_tipologia_evento_boton__confirmar,
        cancelButtonText: CARGA_DATOS__TIPOLOGIA_EVENTOS__ALERT__DIALOGO__MODIFICAR.modificar_tipologia_evento_boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/tipoactividadedit', {
                activityTypeId: myActivityTypeId,
                name: activityTypeName,
            })
                .then(response => {

                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__TIPOLOGIA_EVENTOS__ALERT__DIALOGO__MODIFICAR.todo_ok_tipologia_evento_texto;
                        Swal.fire(
                            CARGA_DATOS__TIPOLOGIA_EVENTOS__ALERT__DIALOGO__MODIFICAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#activitiesTypeTable').DataTable().ajax.reload();
                        closeActivityTypeModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__TIPOLOGIA_EVENTOS__ALERT__DIALOGO__MODIFICAR.error,
                            CARGA_DATOS__TIPOLOGIA_EVENTOS__ALERT__DIALOGO__MODIFICAR.ko,
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



function saveActivityType() {

    var activityTypeName = $('#myActivityTypeInput').val();
    var activityId = $('#activitiesList').val();

    Swal.fire({
        title: CARGA_DATOS__TIPOLOGIA_EVENTOS__ALERT__DIALOGO__GUARDAR.guardar_tipologia_evento_titulo,
        text: CARGA_DATOS__TIPOLOGIA_EVENTOS__ALERT__DIALOGO__GUARDAR.guardar_tipologia_evento_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__TIPOLOGIA_EVENTOS__ALERT__DIALOGO__GUARDAR.guardar_tipologia_evento_boton__confirmar,
        cancelButtonText: CARGA_DATOS__TIPOLOGIA_EVENTOS__ALERT__DIALOGO__GUARDAR.guardar_tipologia_evento_boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/tipoactividadstore', {
                name: activityTypeName,
                activityId: activityId
            })
                .then(response => {

                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__TIPOLOGIA_EVENTOS__ALERT__DIALOGO__GUARDAR.todo_ok_tipologia_evento_texto;
                        Swal.fire(
                            CARGA_DATOS__TIPOLOGIA_EVENTOS__ALERT__DIALOGO__GUARDAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#activitiesTypeTable').DataTable().ajax.reload();
                        closeActivityTypeModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__TIPOLOGIA_EVENTOS__ALERT__DIALOGO__GUARDAR.error,
                            CARGA_DATOS__TIPOLOGIA_EVENTOS__ALERT__DIALOGO__GUARDAR.ko,
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


function deleteActivityType(myData) {


    var
        myId = myData['id'];

    Swal.fire({
        title: CARGA_DATOS__TIPOLOGIA_EVENTOS__ALERT__DIALOGO__ELIMINAR.eliminar_tipologia_evento_titulo,
        text: CARGA_DATOS__TIPOLOGIA_EVENTOS__ALERT__DIALOGO__ELIMINAR.eliminar_tipologia_evento_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__TIPOLOGIA_EVENTOS__ALERT__DIALOGO__ELIMINAR.eliminar_tipologia_evento_boton__confirmar,
        cancelButtonText: CARGA_DATOS__TIPOLOGIA_EVENTOS__ALERT__DIALOGO__ELIMINAR.eliminar_tipologia_evento_boton__cancelar
    }).then((result) => {

        if (result.value) {

            axios.put('/eliminartipoactividad', {
                activityTypeId: myId,
            })
                .then(response => {

                    if (response.data.success) {
                        console.log(response.data.data)
                        Swal.fire(
                            CARGA_DATOS__TIPOLOGIA_EVENTOS__ALERT__DIALOGO__ELIMINAR.todo_ok,
                            CARGA_DATOS__TIPOLOGIA_EVENTOS__ALERT__DIALOGO__ELIMINAR.todo_ok_tipologia_evento_texto,
                            'success'
                        )
                        
                        closeActivityTypeModal()
                        $('#activitiesTypeTable').DataTable().ajax.reload();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__TIPOLOGIA_EVENTOS__ALERT__DIALOGO__ELIMINAR.error,
                            CARGA_DATOS__TIPOLOGIA_EVENTOS__ALERT__DIALOGO__ELIMINAR.ko,
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


function crearListaActividadesForTipologiaActividad() {

    axios.get('/getActividadsall')
            .then(response => {

            if (response.data.success) {
                    
                response.data.data.forEach(area => {
                    
                    $('<option>', {
                        value: area.id,
                        text:  area.name,
                    }).appendTo('#activitiesList');

                    
                });
            
                activitiesListForTipologiaActividadChange()

            } else {
            
            }

    })
    .catch( function (error) {

    });    

}

function activitiesListForTipologiaActividadChange() {
console.log ($('#activitiesList').val() )

var table = $('#activitiesTypeTable').DataTable();
    var myAreaValue = $('#activitiesList').val();

    var filteredData = table
        .column( 1 )
        .search("^" + myAreaValue + "$", true, false, true)
        .draw();


}

