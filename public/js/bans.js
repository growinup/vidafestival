var tipoEdicion = 0;
var myPurposeId = 0;

var listaNacionalidades = [];

function newBan() {


    $('#banModalTitle').text(CARGA_DATOS_MENSAJES_PROHIBIDOS.modal_titulo_nuevo)
    $('#bansModalBtn').text(CARGA_DATOS_MENSAJES_PROHIBIDOS.modal_boton_grabar)

    $('#myBanInputExercici').val('');
    $('#myBanInputExpedient').val('');
    $('#myBanInputDateResolution').val('');
    $('#myBanInputDelegacio').val('');
    $('#myBanInputName').val('');
    $('#myBanInputDni').val('');
    $('#myBanInputDateStart').val('');
    $('#myBanInputDateEnd').val('');

    tipoEdicion = 1;

    $('#myBanInputDateResolution').mask('99/99/9999');
    $('#myBanInputDateStart').mask('99/99/9999');
    $('#myBanInputDateEnd').mask('99/99/9999');

    $('#myModalBan').modal('show');

}

function editBan(myData) {

    $('#myBanInputDate').mask('99/99/9999');

    $('#banModalTitle').text(CARGA_DATOS_MENSAJES_PROHIBIDOS.modal_titulo_editar)
    $('#banModalBtn').text(CARGA_DATOS_MENSAJES_PROHIBIDOS.modal_boton_actualizar)

    $('#myBanInputName').val(myData['nombre']);
    $('#myBanInputDni').val(myData['identificacion']);

    $('#myBanInputExercici').val(myData['ejercicio']);
    $('#myBanInputExpedient').val(myData['expediente']);
    $('#myBanInputDelegacio').val(myData['delegacion']);
    $('#myBanInputName').val(myData['nombre']);
    



    //$('#myBanInputDateResolution').val(myData['fecha_resolucion']);
    // $('#myBanInputDateStart').val(myData['fecha_inicio']);
    // $('#myBanInputDateEnd').val(myData['fecha_fin']);

   
    
    
    let myDate1 =  moment(myData['fecha_nacimiento']).format('DD/MM/YYYY')
    
    if (myDate1 == 'Invalid date') {
        myDate1 = ''
    }
    $('#myBanInputDateResolution').val(myDate1 );

    let myDate2 =  moment(myData['fecha_inicio']).format('DD/MM/YYYY')
    
    if (myDate2 == 'Invalid date') {
        myDate2 = ''
    }
    $('#myBanInputDateStart').val(myDate2 );

    let myDate3 =  moment(myData['fecha_fin']).format('DD/MM/YYYY')
    
    if (myDate3 == 'Invalid date') {
        myDate3 = ''
    }
    $('#myBanInputDateEnd').val(myDate3 );

    tipoEdicion = 2;
    myBanId = myData['id'];

    $('#myModalBan').modal('show');
}

function closeBanModal() {
    $('#myModalBan').modal('hide');
}


function processBan() {


   // validar campos añadir asistente

   if (($('#myBanInputExercici').val().trim().length) < 1) {
        Swal.fire(
            'Error!',
            CARGA_DATOS__PROHIBIDOS__MENSAJES__VALIDACION_CAMPOS.ejercicio,
            'error'
        )
        return;
    }

    if (($('#myBanInputExercici').val().trim().length) > 4) {
        Swal.fire(
            'Error!',
            CARGA_DATOS__PROHIBIDOS__MENSAJES__VALIDACION_CAMPOS.ejercicio_longitud,
            'error'
        )
        return;
    }

    if (($('#myBanInputExpedient').val().trim().length) < 1) {
        Swal.fire(
            'Error!',
            CARGA_DATOS__PROHIBIDOS__MENSAJES__VALIDACION_CAMPOS.expediente,
            'error'
        )
        return;
    }


    if (($('#myBanInputDateResolution').val().trim().length) < 1) {
        Swal.fire(
            'Error!',
            CARGA_DATOS__PROHIBIDOS__MENSAJES__VALIDACION_CAMPOS.fecha_de_resolucion,
            'error'
        )
        return;
    }

    if (($('#myBanInputDelegacio').val().trim().length) < 1) {
        Swal.fire(
            'Error!',
            CARGA_DATOS__PROHIBIDOS__MENSAJES__VALIDACION_CAMPOS.delegacion,
            'error'
        )
        return;
    }

    if (($('#myBanInputDni').val().trim().length) < 1) {
        Swal.fire(
            'Error!',
            CARGA_DATOS__PROHIBIDOS__MENSAJES__VALIDACION_CAMPOS.dni,
            'error'
        )
        return;
    }    

    if (($('#myBanInputName').val().trim().length) < 1) {
        Swal.fire(
            'Error!',
            CARGA_DATOS__PROHIBIDOS__MENSAJES__VALIDACION_CAMPOS.nombre,
            'error'
        )
        return;
    }        

    if (($('#myBanInputDateStart').val().trim().length) < 1) {
        Swal.fire(
            'Error!',
            CARGA_DATOS__PROHIBIDOS__MENSAJES__VALIDACION_CAMPOS.fecha_inicio,
            'error'
        )
        return;
    }          

    if (($('#myBanInputDateEnd').val().trim().length) < 1) {
        Swal.fire(
            'Error!',
            CARGA_DATOS__PROHIBIDOS__MENSAJES__VALIDACION_CAMPOS.fecha_fin,
            'error'
        )
        return;
    }            

    let myDateInitExpediente = moment($('#myBanInputDateStart').val()).format("DD/MM/YYYY")
    let myDateEndExpediente = moment($('#myBanInputDateEnd').val()).format("DD/MM/YYYY")

    if (myDateInitExpediente <= myDateEndExpediente) {
    // date is past
    } else {
 
            Swal.fire(
                'Error!',
                CARGA_DATOS__PROHIBIDOS__MENSAJES__VALIDACION_CAMPOS.fecha_fin_anterior,
                'error'
            )
            return;
 
    }

//----





    if (tipoEdicion == 1) {
        // nuevo

        saveBan()
    }

    if (tipoEdicion == 2) {
        // nuevo
        updateBan()
    }


}

function updateBan() {



    var ban_ejercicio = $('#myBanInputExercici').val();
    var ban_expediente = $('#myBanInputExpedient').val();
    var ban_fecha_resolucion = $('#myBanInputDateResolution').val();
    var ban_delegacion = $('#myBanInputDelegacio').val();
    var ban_nombre = $('#myBanInputName').val();
    var ban_identificacion = $('#myBanInputDni').val();
    var ban_fecha_inicio = $('#myBanInputDateStart').val();
    var ban_fecha_fin = $('#myBanInputDateEnd').val();

    
    Swal.fire({
        title: CARGA_DATOS__PROHIBIDOS__ALERT__DIALOGO__MODIFICAR.modificar_expediente_titulo,
        text: CARGA_DATOS__PROHIBIDOS__ALERT__DIALOGO__MODIFICAR.modificar_expediente_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__PROHIBIDOS__ALERT__DIALOGO__MODIFICAR.modificar_expediente_boton__confirmar,
        cancelButtonText: CARGA_DATOS__PROHIBIDOS__ALERT__DIALOGO__MODIFICAR.modificar_expediente_boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/banedit', {
                banId: myBanId,
                ban_ejercicio: ban_ejercicio,
                ban_expediente: ban_expediente,
                ban_fecha_resolucion: ban_fecha_resolucion,
                ban_delegacion: ban_delegacion,
                ban_nombre: ban_nombre,
                ban_identificacion: ban_identificacion,
                ban_fecha_inicio: ban_fecha_inicio,
                ban_fecha_fin: ban_fecha_fin,
            })
                .then(response => {

                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__PROHIBIDOS__ALERT__DIALOGO__MODIFICAR.todo_ok_expediente_texto;
                        Swal.fire(
                            CARGA_DATOS__PROHIBIDOS__ALERT__DIALOGO__MODIFICAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#myBansTable').DataTable().ajax.reload();
                        closeBanModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__PROHIBIDOS__ALERT__DIALOGO__MODIFICAR.error,
                            CARGA_DATOS__PROHIBIDOS__ALERT__DIALOGO__MODIFICAR.ko,
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



function saveBan() {

    var ban_ejercicio = $('#myBanInputExercici').val();
    var ban_expediente = $('#myBanInputExpedient').val();
    var ban_fecha_resolucion = $('#myBanInputDateResolution').val();
    var ban_delegacion = $('#myBanInputDelegacio').val();
    var ban_nombre = $('#myBanInputName').val();
    var ban_identificacion = $('#myBanInputDni').val();
    var ban_fecha_inicio = $('#myBanInputDateStart').val();
    var ban_fecha_fin = $('#myBanInputDateEnd').val();

    var ban_guest_id = 1;

    Swal.fire({
        title: CARGA_DATOS__PROHIBIDOS__ALERT__DIALOGO__GUARDAR.guardar_expediente_titulo,
        text: CARGA_DATOS__PROHIBIDOS__ALERT__DIALOGO__GUARDAR.guardar_expediente_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__PROHIBIDOS__ALERT__DIALOGO__GUARDAR.guardar_expediente_boton__confirmar,
        cancelButtonText: CARGA_DATOS__PROHIBIDOS__ALERT__DIALOGO__GUARDAR.guardar_expediente_boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/banstore', {
                ban_guest_id: ban_guest_id,
                ban_ejercicio: ban_ejercicio,
                ban_expediente: ban_expediente,
                ban_fecha_resolucion: ban_fecha_resolucion,
                ban_delegacion: ban_delegacion,
                ban_nombre: ban_nombre,
                ban_identificacion: ban_identificacion,
                ban_fecha_inicio: ban_fecha_inicio,
                ban_fecha_fin: ban_fecha_fin,
            })
                .then(response => {

                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__PROHIBIDOS__ALERT__DIALOGO__GUARDAR.todo_ok_expediente_texto;
                        Swal.fire(
                            CARGA_DATOS__PROHIBIDOS__ALERT__DIALOGO__GUARDAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#myBansTable').DataTable().ajax.reload();
                        closeBanModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__PROHIBIDOS__ALERT__DIALOGO__GUARDAR.error,
                            CARGA_DATOS__PROHIBIDOS__ALERT__DIALOGO__GUARDAR.ko,
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


function deleteBan(myData) {


    var
        myId = myData['id'];

    Swal.fire({
        title: CARGA_DATOS__PROHIBIDOS__ALERT__DIALOGO__ELIMINAR.eliminar_expediente_titulo,
        text: CARGA_DATOS__PROHIBIDOS__ALERT__DIALOGO__ELIMINAR.eliminar_expediente_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__PROHIBIDOS__ALERT__DIALOGO__ELIMINAR.eliminar_expediente_boton__confirmar,
        cancelButtonText: CARGA_DATOS__PROHIBIDOS__ALERT__DIALOGO__ELIMINAR.eliminar_expediente_boton__cancelar
    }).then((result) => {

        if (result.value) {

            axios.put('/eliminarban', {
                banId: myId,
            })
                .then(response => {

                    if (response.data.success) {

                        Swal.fire(
                            CARGA_DATOS__PROHIBIDOS__ALERT__DIALOGO__ELIMINAR.todo_ok,
                            CARGA_DATOS__PROHIBIDOS__ALERT__DIALOGO__ELIMINAR.todo_ok_expediente_texto,
                            'success'
                        )

                        closeBanModal()
                        $('#myBansTable').DataTable().ajax.reload();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__PROHIBIDOS__ALERT__DIALOGO__ELIMINAR.error,
                            CARGA_DATOS__PROHIBIDOS__ALERT__DIALOGO__ELIMINAR.ko,
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


function cargaSelectsBans() {
    axios.get('/purposes')
        .then(response => {

            if (response.data) {

                $("#myExpedientNacionalitat").find('option')
                    .remove()
                    .end();

                listaNacionalidades = [];

                response.data.nationalities.forEach(nationality => {
                    $('<option>', {
                        value: nationality.id,
                        text: nationality.name,
                    }).appendTo('#myExpedientNacionalitat');
                    listaNacionalidades.push(nationality.name)
                });

                $('#myExpedientNacionalitat').val(1);

               } else {
            }
        })
        .catch(function (error) {
            console.log(error)
        });

}