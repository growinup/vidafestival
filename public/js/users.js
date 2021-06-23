var tipoEdicion = 0;
var myPurposeId = 0;
var selectedAuthAreas

function newUser() {

    $('#userModalTitle').text(CARGA_DATOS_MENSAJES_USUARIOS.modal_titulo_nuevo)
    $('#usersModalBtn').text(CARGA_DATOS_MENSAJES_USUARIOS.modal_boton_grabar)

    $('#myUserInput').val('');

    $('#myUserEmailInput').val('');
    $('#myUserPassword1').val('');
    $('#myUserPassword2').val('');

    // $('#areaslistModalParaUsuariosSistema').val(1);
    // $('#departmentlistModalParaUsuariosSistema').val(1);
    $('#myUserRolForSystemUserModal').val(3);
    selectRoleChange()
    
    $('#esAutorizadorNivel2').attr('checked', false);

    tipoEdicion = 1;

    $("#admin-chosen-select").chosen({placeholder_text_multiple: CARGA_DATOS_MENSAJES_USUARIOS.zonas_autorizar_placeholder ,width: "100%"}); 
    
    $("#admin-chosen-select").val( [] ).trigger("chosen:updated");


    $('#myModalUser').modal('show');

  
}
         
function editUserPanelUsuariosSistema(myData) {
 
    if (myData['role_id'] == 1) {
        Swal.fire(
            'Error!',
            CARGA_DATOS__USUARIOS__MENSAJES__VALIDACION_CAMPOS.editar_superadmin,
            'warning'
        )
        return;
    }
    console.log (myData)

    $("#admin-chosen-select").chosen({placeholder_text_multiple: CARGA_DATOS_MENSAJES_USUARIOS.zonas_autorizar_placeholder ,width: "100%"}); 


    axios.post('/getSystemUserAreas', {
        userId: myData['id'],      
    })
        .then(response => {

            if (response.data) {

                console.log (response.data.userareas)



                var str_array =  [];
                response.data.userareas.forEach(element => {
                    str_array.push (element.id)
                });

                
                $("#admin-chosen-select").val(str_array).trigger("chosen:updated");
                

            } else {
              
            }
        })



    $('#userModalTitle').text(CARGA_DATOS_MENSAJES_USUARIOS.modal_titulo_editar)
    $('#userModalBtn').text(CARGA_DATOS_MENSAJES_USUARIOS.modal_boton_actualizar)

    $('#myUserInput').val(myData['name']);

    $('#myUserEmailInput').val(myData['email']);
    
    $('#myUserPassword1').val('');
    $('#myUserPassword2').val('');

    $('#areaslistModalParaUsuariosSistema').val(myData['area_id']);
    let myAreaValue = $('#areaslistModalParaUsuariosSistema').val();       
    crearListaDepartamentosUsuariosSistemaModal(myAreaValue)

    $('#myUserRolForSystemUserModal').val(myData['role_id']-1 );
    selectRoleChange()

    // $('#esAutorizadorNivel2').attr('checked', myData['authleveltwo']);
    
    $('#esAutorizadorNivel2').prop('checked', myData['authleveltwo']);
    
    setTimeout(() => {
        $('#departmentlistModalParaUsuariosSistema').val(myData['department_id']);        
    }, 800);

    tipoEdicion = 2;
    myUserId = myData['id'];


    $('#myModalUser').modal('show');
}

function closeUserModal() {
    $('#myModalUser').modal('hide');
}


function processUser() {

    if ($('#myUserInput').val().length < 1) {
                
        Swal.fire(
            'Error!',
            CARGA_DATOS__USUARIOS__MENSAJES__VALIDACION_CAMPOS.nombre,
            'warning'
        )
        return;
    }

    if ($('#myUserEmailInput').val().length < 1) {
               
        Swal.fire(
            'Error!',
            CARGA_DATOS__USUARIOS__MENSAJES__VALIDACION_CAMPOS.email,
            'warning'
        )
        return;
    }

    
    if ((($('#myUserEmailInput').val().trim().length) > 0) &&  (!validateEmail($('#myUserEmailInput').val() ))   ) {
        Swal.fire(
            'Error!',
            CARGA_DATOS__USUARIOS__MENSAJES__VALIDACION_CAMPOS.email_incorrecto,
            'error'
        )
        return;
    }


    if (tipoEdicion == 1) {
            if ($('#myUserPassword1').val().length < 1) {

               
                Swal.fire(
                    'Error!',
                    CARGA_DATOS__USUARIOS__MENSAJES__VALIDACION_CAMPOS.password,
                    'warning'
                )
                return;
            }

            let myPassToCheck1 = $('#myUserPassword1').val()
            let myPassToCheck2 = $('#myUserPassword2').val()

            if (myPassToCheck1 != myPassToCheck2) {        
                Swal.fire(
                    'Error!',
                    CARGA_DATOS__USUARIOS__MENSAJES__VALIDACION_CAMPOS.password_incorrecto,
                    'warning'
                )
                return;
            }
    }
    

    console.log ($("#admin-chosen-select").val() ) ;

     selectedAuthAreas = $("#admin-chosen-select").val()

    if (tipoEdicion == 1) {
        // nuevo

        saveUser()
    }

    if (tipoEdicion == 2) {
        // edicion
        updateUser()
    }


}

function updateUser() {

    var userName = $('#myUserInput').val();
    var emailUsuario = $('#myUserEmailInput').val();
    var passwordUsuario = $('#myUserPassword1').val();

    var areaID = $('#areaslistModalParaUsuariosSistema').val();
    var departmentID = $('#departmentlistModalParaUsuariosSistema').val();
    var roleID = $('#myUserRolForSystemUserModal').val();
    
    var userToUpdate = myUserId;

    var isAuthSecondLevel = $('#esAutorizadorNivel2').is(":checked")


    Swal.fire({
        title: CARGA_DATOS__USUARIOS__ALERT__DIALOGO__MODIFICAR.modificar_usuario_titulo,
        text: CARGA_DATOS__USUARIOS__ALERT__DIALOGO__MODIFICAR.modificar_usuario_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__USUARIOS__ALERT__DIALOGO__MODIFICAR.modificar_usuario_boton__confirmar,
        cancelButtonText: CARGA_DATOS__USUARIOS__ALERT__DIALOGO__MODIFICAR.modificar_usuario_boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/useredit', {
                userId: userToUpdate,
                userName : userName,
                emailUsuario : emailUsuario,
                passwordUsuario : passwordUsuario,
                areaID : areaID,
                departmentID : departmentID,
                roleID : roleID,
                isAuthSecondLevel: isAuthSecondLevel,
                selectedAuthAreas : selectedAuthAreas
            })
                .then(response => {

                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__USUARIOS__ALERT__DIALOGO__MODIFICAR.todo_ok_usuario_texto;
                        Swal.fire(
                            CARGA_DATOS__USUARIOS__ALERT__DIALOGO__MODIFICAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#usersTableUsuariosSistema').DataTable().ajax.reload();
                        closeUserModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__USUARIOS__ALERT__DIALOGO__MODIFICAR.error,
                            CARGA_DATOS__USUARIOS__ALERT__DIALOGO__MODIFICAR.ko,
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



function saveUser() {

    var userName = $('#myUserInput').val();
    var emailUsuario = $('#myUserEmailInput').val();
    var passwordUsuario = $('#myUserPassword1').val();

    var areaID = $('#areaslistModalParaUsuariosSistema').val();
    var departmentID = $('#departmentlistModalParaUsuariosSistema').val();
    var roleID = $('#myUserRolForSystemUserModal').val();
    
    var isAuthSecondLevel = $('#esAutorizadorNivel2').is(":checked")

    Swal.fire({
        title: CARGA_DATOS__USUARIOS__ALERT__DIALOGO__GUARDAR.guardar_usuario_titulo,
        text: CARGA_DATOS__USUARIOS__ALERT__DIALOGO__GUARDAR.guardar_usuario_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__USUARIOS__ALERT__DIALOGO__GUARDAR.guardar_usuario_boton__confirmar,
        cancelButtonText: CARGA_DATOS__USUARIOS__ALERT__DIALOGO__GUARDAR.guardar_usuario_boton__cancelar
    }).then((result) => {

        if (result.value) {
            axios.post('/userstore', {         
                userName : userName,
                emailUsuario : emailUsuario,
                passwordUsuario : passwordUsuario,
                areaID : areaID,
                departmentID : departmentID,
                roleID : roleID,
                isAuthSecondLevel: isAuthSecondLevel,
                selectedAuthAreas : selectedAuthAreas
            })
                .then(response => {

                    if (response.data.success) {

                        myConfirmMessage = CARGA_DATOS__USUARIOS__ALERT__DIALOGO__GUARDAR.todo_ok_usuario_texto;
                        Swal.fire(
                            CARGA_DATOS__USUARIOS__ALERT__DIALOGO__GUARDAR.todo_ok,
                            myConfirmMessage,
                            'success'
                        )

                        $('#usersTableUsuariosSistema').DataTable().ajax.reload();
                        closeUserModal();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__USUARIOS__ALERT__DIALOGO__GUARDAR.error,
                            CARGA_DATOS__USUARIOS__ALERT__DIALOGO__GUARDAR.ko,
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


function deleteUserPanelUsuariosSistema(myData) {


    let
        myId = myData['id'];

    Swal.fire({
        title: CARGA_DATOS__USUARIOS__ALERT__DIALOGO__ELIMINAR.eliminar_usuario_titulo,
        text: CARGA_DATOS__USUARIOS__ALERT__DIALOGO__ELIMINAR.eliminar_usuario_texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: CARGA_DATOS__USUARIOS__ALERT__DIALOGO__ELIMINAR.eliminar_usuario_boton__confirmar,
        cancelButtonText: CARGA_DATOS__USUARIOS__ALERT__DIALOGO__ELIMINAR.eliminar_usuario_boton__cancelar
    }).then((result) => {

        if (result.value) {

            axios.put('/eliminaruser', {
                userId: myId,
            })
                .then(response => {

                    if (response.data.success) {
                                                
                        
                        Swal.fire(
                            CARGA_DATOS__USUARIOS__ALERT__DIALOGO__ELIMINAR.todo_ok,
                            CARGA_DATOS__USUARIOS__ALERT__DIALOGO__ELIMINAR.todo_ok_usuario_texto,
                            'success'
                        )
                        
                        closeUserModal()
                        $('#usersTableUsuariosSistema').DataTable().ajax.reload();

                    } else {
                        Swal.fire(
                            CARGA_DATOS__USUARIOS__ALERT__DIALOGO__ELIMINAR.error,
                            CARGA_DATOS__USUARIOS__ALERT__DIALOGO__ELIMINAR.ko,
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



// funciones desplegables panel usuarios sistema home 



function crearListaAreasPanelUsuariosSistema() {

    axios.get('/areas')
            .then(response => {

            if (response.data.success) {

                $("#areaslistPanelPrincipalUsuariosSistema").find('option')
                .remove()
                .end();

                $("#admin-chosen-select").find('option')
                .remove()
                .end();
                

                    
                response.data.data.forEach(area => {
                    
                    $('<option>', {
                        value: area.id,
                        text:  area.nombre,
                    }).appendTo('#areaslistPanelPrincipalUsuariosSistema');


                    $('<option>', {
                        value: area.id,
                        text:  area.nombre,
                    }).appendTo('#admin-chosen-select');

                              
                });
                
                

                let myAreaValue = $('#areaslistPanelPrincipalUsuariosSistema').val();       
                crearListaDepartamentosUsuariosSistema(myAreaValue)

            } else {
            
            }

    })
    .catch( function (error) {

    });    

}


function crearListaDepartamentosUsuariosSistema(id) {

axios.get('/departments/'+id)
    .then(response => {
 
         
    if (response.data.data) {
        
        $("#departmentslistPanelPrincipalUsuariosSistema").find('option')
            .remove()
            .end();
            
            // $('<option>', {
            //     value: 0,
            //     text:  "Selecció de departament",
            // }).appendTo('#departmentlistModal');

        response.data.data.forEach(department => {
            
            $('<option>', {
                value: department.id,
                text:  department.nombre,
            }).appendTo('#departmentslistPanelPrincipalUsuariosSistema');
            
        });

        filtrarDepartamentosPanelPrincipalUsuariosSistema()

    } else {
    
    }

})
.catch( function (error) {

});    

}


function areasListChangePanelPrincipalUsuariosSistema() {

    
    // let table = $('#usersTableUsuariosSistema').DataTable();
    let myAreaValue = $('#areaslistPanelPrincipalUsuariosSistema').val();
    
    crearListaDepartamentosUsuariosSistema(myAreaValue)

    // let filteredData = table
    //     .column( 1 )
    //     .search("^" + myAreaValue + "$", true, false, true)
    //     .draw();


}


function filtrarDepartamentosPanelPrincipalUsuariosSistema() {

        // filtrado tabla por departamento
    var table = $('#usersTableUsuariosSistema').DataTable();
    var myDepartmentID = $('#departmentslistPanelPrincipalUsuariosSistema').val();

    var filteredData = table
        .column( 4 )
        .search("^" + myDepartmentID + "$", true, false, true)
        .draw();

}


// funciones de listas y filtrado para ventana modal


function crearListaAreasPanelUsuariosSistemaModal() {

    axios.get('/areas')
            .then(response => {

            if (response.data.success) {

                $("#areaslistModalParaUsuariosSistema").find('option')
                .remove()
                .end();

                    
                response.data.data.forEach(area => {
                    
                    $('<option>', {
                        value: area.id,
                        text:  area.nombre,
                    }).appendTo('#areaslistModalParaUsuariosSistema');
                              
                });
                
                

                let myAreaValue = $('#areaslistModalParaUsuariosSistema').val();       
                crearListaDepartamentosUsuariosSistemaModal(myAreaValue)

            } else {
            
            }

    })
    .catch( function (error) {

    });    

}


function crearListaDepartamentosUsuariosSistemaModal(id) {

axios.get('/departments/'+id)
    .then(response => {
 
         
    if (response.data.data) {
        
        $("#departmentlistModalParaUsuariosSistema").find('option')
            .remove()
            .end();
            
            // $('<option>', {
            //     value: 0,
            //     text:  "Selecció de departament",
            // }).appendTo('#departmentlistModalParaUsuariosSistema');

        response.data.data.forEach(department => {
            
            $('<option>', {
                value: department.id,
                text:  department.nombre,
            }).appendTo('#departmentlistModalParaUsuariosSistema');
            
        });


    } else {
    
    }

})
.catch( function (error) {

});    

}


function areasListChangePanelPrincipalUsuariosSistemaModal() {

    
    let myAreaValue = $('#areaslistModalParaUsuariosSistema').val();
    
    crearListaDepartamentosUsuariosSistemaModal(myAreaValue)

}

function selectRoleChange() {
    if ($('#myUserRolForSystemUserModal').val() == 4) {
        $('#panelEsAutorizadorDoble').removeClass('d-none')
        $('#panelSeleccionZonasAutorizar').removeClass('d-none')
        
    } else {
        $('#panelEsAutorizadorDoble').addClass('d-none')
        $('#panelSeleccionZonasAutorizar').addClass('d-none')
    }
}