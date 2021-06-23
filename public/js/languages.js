
function newLanguage() {

    $('#languageModalTitle').text(CARGA_DATOS_MENSAJES_IDIOMAS.modal_titulo_nuevo)
    $('#languageModalBtn').text(CARGA_DATOS_MENSAJES_IDIOMAS.modal_boton_grabar)

    $('#myLanguageInput').val('');

    tipoEdicion = 1;

    $('#myModalLanguage').modal('show');
}
         
function editLanguage(myData) {
 

    $('#languageModalTitle').text(CARGA_DATOS_MENSAJES_IDIOMAS.modal_titulo_editar)
    $('#LanguageModalBtn').text(CARGA_DATOS_MENSAJES_IDIOMAS.modal_boton_actualizar)

    $('#myLanguageInput').val(myData['name']);

    tipoEdicion = 2;
    myLanguageId = myData['id'];

    $('#myModalLanguage').modal('show');
}

function closeLanguageModal() {
    $('#myModalLanguage').modal('hide');
}


function processLanguage() {

    if ($('#myLanguageInput').val().length < 1) {
        
        Swal.fire(
            'Error!',
            CARGA_DATOS__IDIOMA__MENSAJES__VALIDACION_CAMPOS.nombre,
            'warning'
        )
        return;
    }

    if (tipoEdicion == 1) {
        // nuevo

        saveLanguage()
    }

    if (tipoEdicion == 2) {
        // nuevo
        updateLanguage()
    }


}

function updateLanguage() {


    var LanguageName = $('#myLanguageInput').val();

    Swal.fire({
        title: CARGA_DATOS__IDIOMAS__ALERT__DIALOGO__MODIFICAR.modificar_idioma_titulo,
        text: CARGA_DATOS__IDIOMAS__ALERT__DIALOGO__MODIFICAR.modificar_idioma_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__IDIOMAS__ALERT__DIALOGO__MODIFICAR.modificar_idioma_boton__confirmar,
        cancelButtonText: CARGA_DATOS__IDIOMAS__ALERT__DIALOGO__MODIFICAR.modificar_idioma_boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/languageedit', {
                languageId: myLanguageId,
                name: LanguageName,
            })
                .then(response => {

                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__IDIOMAS__ALERT__DIALOGO__MODIFICAR.todo_ok_idioma_texto;
                        Swal.fire(
                            CARGA_DATOS__IDIOMAS__ALERT__DIALOGO__MODIFICAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#languagesTable').DataTable().ajax.reload();
                        closeLanguageModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__IDIOMAS__ALERT__DIALOGO__MODIFICAR.error,
                            CARGA_DATOS__IDIOMAS__ALERT__DIALOGO__MODIFICAR.ko,
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



function saveLanguage() {

    var LanguageName = $('#myLanguageInput').val();

    Swal.fire({
        title: CARGA_DATOS__IDIOMAS__ALERT__DIALOGO__GUARDAR.guardar_idioma_titulo,
        text: CARGA_DATOS__IDIOMAS__ALERT__DIALOGO__GUARDAR.guardar_idioma_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__IDIOMAS__ALERT__DIALOGO__GUARDAR.guardar_idioma_boton__confirmar,
        cancelButtonText: CARGA_DATOS__IDIOMAS__ALERT__DIALOGO__GUARDAR.guardar_idioma_boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/languagesstore', {
                name: LanguageName,
            })
                .then(response => {

                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__IDIOMAS__ALERT__DIALOGO__GUARDAR.todo_ok_idioma_texto;
                        Swal.fire(
                            CARGA_DATOS__IDIOMAS__ALERT__DIALOGO__GUARDAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#languagesTable').DataTable().ajax.reload();
                        closeLanguageModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__IDIOMAS__ALERT__DIALOGO__GUARDAR.error,
                            CARGA_DATOS__IDIOMAS__ALERT__DIALOGO__GUARDAR.ko,
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


function deleteLanguage(myData) {
    

    var
        myId = myData['id'];

    Swal.fire({
        title: CARGA_DATOS__IDIOMAS__ALERT__DIALOGO__ELIMINAR.eliminar_idioma_titulo,
        text: CARGA_DATOS__IDIOMAS__ALERT__DIALOGO__ELIMINAR.eliminar_idioma_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__IDIOMAS__ALERT__DIALOGO__ELIMINAR.eliminar_idioma_boton__confirmar,
        cancelButtonText: CARGA_DATOS__IDIOMAS__ALERT__DIALOGO__ELIMINAR.eliminar_idioma_boton__cancelar
    }).then((result) => {

        if (result.value) {

            axios.put('/eliminarlanguage', {
                languageId: myId,
            })
                .then(response => {

                    if (response.data.success) {
                        
                        Swal.fire(
                            CARGA_DATOS__IDIOMAS__ALERT__DIALOGO__ELIMINAR.todo_ok,
                            CARGA_DATOS__IDIOMAS__ALERT__DIALOGO__ELIMINAR.todo_ok_idioma_texto,
                            'success'
                        )

                        $('#languagesTable').DataTable().ajax.reload();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__IDIOMAS__ALERT__DIALOGO__ELIMINAR.error,
                            CARGA_DATOS__IDIOMAS__ALERT__DIALOGO__ELIMINAR.ko,
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