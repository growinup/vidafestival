
function newZona() {

    $('#zonaModalTitle').text(CARGA_DATOS_MENSAJES_ZONAS.modal_titulo_nuevo)
    $('#zonasModalBtn').text(CARGA_DATOS_MENSAJES_ZONAS.modal_boton_grabar)

    $('#myZonaInput').val('');

    tipoEdicion = 1;

    $('#myModalZona').modal('show');


}

function editZona(myData) {


    $('#zonaModalTitle').text(CARGA_DATOS_MENSAJES_ZONAS.modal_titulo_editar)
    $('#zonaModalBtn').text(CARGA_DATOS_MENSAJES_ZONAS.modal_boton_actualizar)

    $('#myZonaInput').val(myData['nombre']);

    tipoEdicion = 2;
    myZonaId = myData['id'];

    $('#myModalZona').modal('show');
}

function closeZonaModal() {
    $('#myModalZona').modal('hide');
}


function processZona() {

    if ($('#myZonaInput').val().length < 1) {
        
        
        Swal.fire(
            'Error!',
            CARGA_DATOS__ZONAS__MENSAJES__VALIDACION_CAMPOS.nombre,
            'warning'
        )
        return;
    }

    if (tipoEdicion == 1) {
        // nuevo

        saveZona()
    }

    if (tipoEdicion == 2) {
        // nuevo
        updateZona()
    }


}

function updateZona() {

    var zonaName = $('#myZonaInput').val();

    Swal.fire({
        title: CARGA_DATOS__ZONAS__ALERT__DIALOGO__MODIFICAR.modificar_zona_titulo,
        text: CARGA_DATOS__ZONAS__ALERT__DIALOGO__MODIFICAR.modificar_zona_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__ZONAS__ALERT__DIALOGO__MODIFICAR.modificar_zona_boton__confirmar,
        cancelButtonText: CARGA_DATOS__ZONAS__ALERT__DIALOGO__MODIFICAR.modificar_zona_boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/zonaedit', {
                zonaId: myZonaId,
                name: zonaName,
            })
                .then(response => {

                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__ZONAS__ALERT__DIALOGO__MODIFICAR.todo_ok_zona_texto;
                        Swal.fire(
                            CARGA_DATOS__ZONAS__ALERT__DIALOGO__MODIFICAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#zonesTable').DataTable().ajax.reload();
                        closeZonaModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__ZONAS__ALERT__DIALOGO__MODIFICAR.error,
                            CARGA_DATOS__ZONAS__ALERT__DIALOGO__MODIFICAR.ko,
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



function saveZona() {

    var zonaName = $('#myZonaInput').val();
    var sectorId = $('#sectoresList').val();

    Swal.fire({
        title: CARGA_DATOS__ZONAS__ALERT__DIALOGO__GUARDAR.guardar_zona_titulo,
        text: CARGA_DATOS__ZONAS__ALERT__DIALOGO__GUARDAR.guardar_zona_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__ZONAS__ALERT__DIALOGO__GUARDAR.guardar_zona_boton__confirmar,
        cancelButtonText: CARGA_DATOS__ZONAS__ALERT__DIALOGO__GUARDAR.guardar_zona_boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/zonastore', {
                name: zonaName,
                sectorId: sectorId
            })
                .then(response => {

                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__ZONAS__ALERT__DIALOGO__GUARDAR.todo_ok_zona_texto;
                        Swal.fire(
                            CARGA_DATOS__ZONAS__ALERT__DIALOGO__GUARDAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#zonesTable').DataTable().ajax.reload();
                        closeZonaModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__ZONAS__ALERT__DIALOGO__GUARDAR.error,
                            CARGA_DATOS__ZONAS__ALERT__DIALOGO__GUARDAR.ko,
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


function deleteZona(myData) {


    var
        myId = myData['id'];

    Swal.fire({
        title: CARGA_DATOS__ZONAS__ALERT__DIALOGO__ELIMINAR.eliminar_zona_titulo,
        text: CARGA_DATOS__ZONAS__ALERT__DIALOGO__ELIMINAR.eliminar_zona_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__ZONAS__ALERT__DIALOGO__ELIMINAR.eliminar_zona_boton__confirmar,
        cancelButtonText: CARGA_DATOS__ZONAS__ALERT__DIALOGO__ELIMINAR.eliminar_zona_boton__cancelar
    }).then((result) => {

        if (result.value) {

            axios.put('/eliminarzona', {
                zonaId: myId,
            })
                .then(response => {

                    if (response.data.success) {
                        
                        
                        Swal.fire(
                            CARGA_DATOS__ZONAS__ALERT__DIALOGO__ELIMINAR.todo_ok,
                            CARGA_DATOS__ZONAS__ALERT__DIALOGO__ELIMINAR.todo_ok_zona_texto,
                            'success'
                        )

                        closeZonaModal()
                        $('#zonesTable').DataTable().ajax.reload();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__ZONAS__ALERT__DIALOGO__ELIMINAR.error,
                            CARGA_DATOS__ZONAS__ALERT__DIALOGO__ELIMINAR.ko,
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


function crearListaUbicacionesForZones() {

    axios.get('/getLocationsall')
            .then(response => {

            if (response.data.success) {
                    
                response.data.data.forEach(area => {
                    
                    $('<option>', {
                        value: area.id,
                        text:  area.nombre,
                    }).appendTo('#locationsListForZonePanel');

                    
                });
            
            
                // sectoresListForZonesChange(mySectorToCreate)
                crearListaSectoresForZones()

            } else {
            
            }

    })
    .catch( function (error) {

    });    

}


function crearListaSectoresForZones() {
    
    var mySectorToCreate = $('#locationsListForZonePanel').val()


    $("#sectoresList").find('option')
    .remove()
    .end();

    axios.get('/getSectorssall')
            .then(response => {

            if (response.data.success) {
                    
                response.data.data.forEach(sector => {
                    
                    if (sector.location_id == mySectorToCreate) {

                        $('<option>', {
                            value: sector.id,
                            text:  sector.nombre,
                        }).appendTo('#sectoresList');

                    }
                    
                });
            
                sectoresListForZonesChange()

            } else {
            
            }

    })
    .catch( function (error) {

    });    

}

function sectoresListForZonesChange(myUbicacion) {

    var table = $('#zonesTable').DataTable();
    var myLocationToFilterValue = $('#locationsListForZonePanel').val()
    var mySectorValue = $('#sectoresList').val();

    var filteredData = table
    .column( 1 )
    .search("^" + myLocationToFilterValue + "$", true, false, true)
    .column( 2 )
    .search("^" + mySectorValue + "$", true, false, true)
    .draw();

        

}