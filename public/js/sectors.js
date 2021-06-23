
function newSector() {

    $('#sectorModalTitle').text(CARGA_DATOS_MENSAJES_SECTORES.modal_titulo_nuevo)
    $('#sectorsModalBtn').text(CARGA_DATOS_MENSAJES_SECTORES.modal_boton_grabar)

    $('#mySectorInput').val('');

    tipoEdicion = 1;

    $('#myModalSector').modal('show');


}

function editSector(myData) {


    $('#sectorModalTitle').text(CARGA_DATOS_MENSAJES_SECTORES.modal_titulo_editar)
    $('#sectorModalBtn').text(CARGA_DATOS_MENSAJES_SECTORES.modal_boton_actualizar)

    $('#mySectorInput').val(myData['nombre']);

    tipoEdicion = 2;
    mySectorId = myData['id'];

    $('#myModalSector').modal('show');
}

function closeSectorModal() {
    $('#myModalSector').modal('hide');
}


function processSector() {

    if ($('#mySectorInput').val().length < 1) {
        
        Swal.fire(
            'Error!',
            CARGA_DATOS__SECTORES__MENSAJES__VALIDACION_CAMPOS.nombre,
            'warning'
        )
        return;
    }

    if (tipoEdicion == 1) {
        // nuevo

        saveSector()
    }

    if (tipoEdicion == 2) {
        // nuevo
        updateSector()
    }


}

function updateSector() {

    var sectorName = $('#mySectorInput').val();

    Swal.fire({
        title: CARGA_DATOS__SECTORES__ALERT__DIALOGO__MODIFICAR.modificar_sector_titulo,
        text: CARGA_DATOS__SECTORES__ALERT__DIALOGO__MODIFICAR.modificar_sector_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__SECTORES__ALERT__DIALOGO__MODIFICAR.modificar_sector_boton__confirmar,
        cancelButtonText: CARGA_DATOS__SECTORES__ALERT__DIALOGO__MODIFICAR.modificar_sector_boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/sectoredit', {
                sectorId: mySectorId,
                name: sectorName,
            })
                .then(response => {

                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__SECTORES__ALERT__DIALOGO__MODIFICAR.todo_ok_sector_texto;
                        Swal.fire(
                            CARGA_DATOS__SECTORES__ALERT__DIALOGO__MODIFICAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#sectorsTable').DataTable().ajax.reload();
                        closeSectorModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__SECTORES__ALERT__DIALOGO__MODIFICAR.error,
                            CARGA_DATOS__SECTORES__ALERT__DIALOGO__MODIFICAR.ko,
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



function saveSector() {

    var sectorName = $('#mySectorInput').val();
    var locationId = $('#locationsList').val();

    Swal.fire({
        title: CARGA_DATOS__SECTORES__ALERT__DIALOGO__GUARDAR.guardar_sector_titulo,
        text: CARGA_DATOS__SECTORES__ALERT__DIALOGO__GUARDAR.guardar_sector_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__SECTORES__ALERT__DIALOGO__GUARDAR.guardar_sector_boton__confirmar,
        cancelButtonText: CARGA_DATOS__SECTORES__ALERT__DIALOGO__GUARDAR.guardar_sector_boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/sectorstore', {
                name: sectorName,
                locationId: locationId
            })
                .then(response => {

                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__SECTORES__ALERT__DIALOGO__GUARDAR.todo_ok_sector_texto;
                        Swal.fire(
                            CARGA_DATOS__SECTORES__ALERT__DIALOGO__GUARDAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#sectorsTable').DataTable().ajax.reload();
                        closeSectorModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__SECTORES__ALERT__DIALOGO__GUARDAR.error,
                            CARGA_DATOS__SECTORES__ALERT__DIALOGO__GUARDAR.ko,
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


function deleteSector(myData) {

    // Swal.fire(
    //     'Error!',
    //     'No ha sigut possible eliminar aquest sector',
    //     'error'
    // )

    // return

    var
        myId = myData['id'];

    Swal.fire({
        title: CARGA_DATOS__SECTORES__ALERT__DIALOGO__ELIMINAR.eliminar_sector_titulo,
        text: CARGA_DATOS__SECTORES__ALERT__DIALOGO__ELIMINAR.eliminar_sector_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__SECTORES__ALERT__DIALOGO__ELIMINAR.eliminar_sector_boton__confirmar,
        cancelButtonText: CARGA_DATOS__SECTORES__ALERT__DIALOGO__ELIMINAR.eliminar_sector_boton__cancelar
    }).then((result) => {

        if (result.value) {

            axios.put('/eliminarsector', {
                sectorId: myId,
            })
                .then(response => {

                    if (response.data.success) {
                        
                        Swal.fire(
                            CARGA_DATOS__SECTORES__ALERT__DIALOGO__ELIMINAR.todo_ok,
                            CARGA_DATOS__SECTORES__ALERT__DIALOGO__ELIMINAR.todo_ok_sector_texto,
                            'success'
                        )

                        closeSectorModal()
                        $('#sectorsTable').DataTable().ajax.reload();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__SECTORES__ALERT__DIALOGO__ELIMINAR.error,
                            CARGA_DATOS__SECTORES__ALERT__DIALOGO__ELIMINAR.ko,
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


function crearListaUbicacionesForSectors() {

    axios.get('/getLocationsall')
            .then(response => {

            if (response.data.success) {
                    
                response.data.data.forEach(area => {
                    
                    $('<option>', {
                        value: area.id,
                        text:  area.nombre,
                    }).appendTo('#locationsList');

                    
                });
            
                locationsListForSectorChange()

            } else {
            
            }

    })
    .catch( function (error) {

    });    

}

function locationsListForSectorChange() {

var table = $('#sectorsTable').DataTable();
    var myAreaValue = $('#locationsList').val();

    var filteredData = table
        .column( 1 )
        .search("^" + myAreaValue + "$", true, false, true)
        .draw();


}