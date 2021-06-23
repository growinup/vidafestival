
function newDepartment() {

    $('#departmentModalTitle').text(CARGA_DATOS_MENSAJES_DEPARTAMENTOS.modal_titulo_nuevo)
    $('#departmentsModalBtn').text(CARGA_DATOS_MENSAJES_DEPARTAMENTOS.modal_boton_grabar)

    $('#myDepartmentInput').val('');

    tipoEdicion = 1;

    $('#myModalDepartment').modal('show');

  
}
         
function editDepartment(myData) {
 

    $('#departmentModalTitle').text(CARGA_DATOS_MENSAJES_DEPARTAMENTOS.modal_titulo_editar)
    $('#departmentModalBtn').text(CARGA_DATOS_MENSAJES_DEPARTAMENTOS.modal_boton_actualizar)

    $('#myDepartmentInput').val(myData['nombre']);

    tipoEdicion = 2;
    myDepartmentId = myData['id'];

    $('#myModalDepartment').modal('show');
}

function closeDepartmentModal() {
    $('#myModalDepartment').modal('hide');
}


function processDepartment() {

    if ($('#myDepartmentInput').val().length < 1) {
        
        Swal.fire(
            'Error!',
            CARGA_DATOS__DEPARTAMENTO__MENSAJES__VALIDACION_CAMPOS.nombre,
            'warning'
        )
        return;
    }

    if (tipoEdicion == 1) {
        // nuevo

        saveDepartment()
    }

    if (tipoEdicion == 2) {
        // nuevo
        updateDepartment()
    }


}

function updateDepartment() {


    var departmentName = $('#myDepartmentInput').val();

    Swal.fire({
        title: CARGA_DATOS__DEPARTAMENTOS__ALERT__DIALOGO__MODIFICAR.modificar_departamento_titulo,
        text: CARGA_DATOS__DEPARTAMENTOS__ALERT__DIALOGO__MODIFICAR.modificar_departamento_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__DEPARTAMENTOS__ALERT__DIALOGO__MODIFICAR.modificar_departamento_boton__confirmar,
        cancelButtonText: CARGA_DATOS__DEPARTAMENTOS__ALERT__DIALOGO__MODIFICAR.modificar_departamento_boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/departmentedit', {
                departmentId: myDepartmentId,
                name: departmentName,
            })
                .then(response => {

                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__DEPARTAMENTOS__ALERT__DIALOGO__MODIFICAR.todo_ok_departamento_texto;
                        Swal.fire(
                            CARGA_DATOS__DEPARTAMENTOS__ALERT__DIALOGO__MODIFICAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#departmentTable').DataTable().ajax.reload();
                        closeDepartmentModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__DEPARTAMENTOS__ALERT__DIALOGO__MODIFICAR.error,
                            CARGA_DATOS__DEPARTAMENTOS__ALERT__DIALOGO__MODIFICAR.ko,
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



function saveDepartment() {

    var departmentName = $('#myDepartmentInput').val();
    var departmentId = $('#areaslist').val();

    Swal.fire({
        title: CARGA_DATOS__DEPARTAMENTOS__ALERT__DIALOGO__GUARDAR.guardar_departamento_titulo,
        text: CARGA_DATOS__DEPARTAMENTOS__ALERT__DIALOGO__GUARDAR.guardar_departamento_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__DEPARTAMENTOS__ALERT__DIALOGO__GUARDAR.guardar_departamento_boton__confirmar,
        cancelButtonText: CARGA_DATOS__DEPARTAMENTOS__ALERT__DIALOGO__GUARDAR.guardar_departamento_boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/departmentstore', {
                name: departmentName,
                areaId: departmentId
            })
                .then(response => {

                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__DEPARTAMENTOS__ALERT__DIALOGO__GUARDAR.todo_ok_departamento_texto;
                        Swal.fire(
                            CARGA_DATOS__DEPARTAMENTOS__ALERT__DIALOGO__GUARDAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#departmentTable').DataTable().ajax.reload();
                        closeDepartmentModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__DEPARTAMENTOS__ALERT__DIALOGO__GUARDAR.error,
                            CARGA_DATOS__DEPARTAMENTOS__ALERT__DIALOGO__GUARDAR.ko,
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


function deleteDepartment(myData) {


    var
        myId = myData['id'];

    Swal.fire({
        title: CARGA_DATOS__DEPARTAMENTOS__ALERT__DIALOGO__ELIMINAR.eliminar_departamento_titulo,
        text: CARGA_DATOS__DEPARTAMENTOS__ALERT__DIALOGO__ELIMINAR.eliminar_departamento_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__DEPARTAMENTOS__ALERT__DIALOGO__ELIMINAR.eliminar_departamento_boton__confirmar,
        cancelButtonText: CARGA_DATOS__DEPARTAMENTOS__ALERT__DIALOGO__ELIMINAR.eliminar_departamento_boton__cancelar
    }).then((result) => {

        if (result.value) {

            axios.put('/eliminardepartment', {
                departmentId: myId,
            })
                .then(response => {

                    if (response.data.success) {
                        
                        Swal.fire(
                            CARGA_DATOS__DEPARTAMENTOS__ALERT__DIALOGO__ELIMINAR.todo_ok,
                            CARGA_DATOS__DEPARTAMENTOS__ALERT__DIALOGO__ELIMINAR.todo_ok_departamento_texto,
                            'success'
                        )
                        
                        closeDepartmentModal()
                        $('#departmentTable').DataTable().ajax.reload();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__DEPARTAMENTOS__ALERT__DIALOGO__ELIMINAR.error,
                            CARGA_DATOS__DEPARTAMENTOS__ALERT__DIALOGO__ELIMINAR.ko,
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

function crearListaAreasParaDepartamentosPanel() {

    axios.get('/areas')
            .then(response => {

            if (response.data.success) {
                    
                response.data.data.forEach(area => {
                    
                    $('<option>', {
                        value: area.id,
                        text:  area.nombre,
                    }).appendTo('#areaslist');

                    
                });
            
                areasListChange()

            } else {
            
            }

    })
    .catch( function (error) {

    });    

}

function areasListChange() {

var table = $('#departmentTable').DataTable();
    var myAreaValue = $('#areaslist').val();

    var filteredData = table
        .column( 1 )
        .search("^" + myAreaValue + "$", true, false, true)
        .draw();


}