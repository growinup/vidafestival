var myTableEventSelectedTable = "myEventSelectTable";
let table;
var data;
var variableMolona;
var eventName;
var eurosSign = false;


var dateEvent;
var datePeticio;
var eventName;
var eventID;

var quantitatInvitacions;
var zonaPeticio;
var myZonaId;

var enNomDe;

var myStock = 0;
var myPending = 0;
var myTotalInvitationPrice = 0;

var myPrice = 0;

var myFinalidadID;
var myFinalidad;
var myTipoInvitacionID;
var myTipoInvitacion;
var email_secundario_peticion;
var listadoAsistentes = [];    
var priceList = [];

var IDPeticion;



    function editarPeticion2 (myId,data) {

        if (data['estado'] == 7) {
       
            Swal.fire(
                'Error!',
                'Una petició enviada no es pot editar',
                'error'
                )
            return null;
            
        }

        axios.put('/editarpeticionpeticionario' ,{
                IDPeticion: myId,
        }).then(response => {
        
        if (response.data.success) {
    
            // prapare data
                 
            myPeticionID = response.data.data.id;
     
            showModal2(data,response.data);
            
        } else {
            Swal.fire(
                'Error!',
                'No ha sigut possible editar la petició',
                'error'
                )
        }

    })
    .catch( function (error) {
                console.log (error)
    });
}



function activarTimer() {
    setInterval(updateCounters, 30000);
}


function updateCounters() {

            axios.get('/checkinvitationscounter' )
                .then(response => {
                    
                    if (response.data.success) {
            
                    $('#numPeticionsPendents').text(response.data.num1);
                    $('#numPeticionsAutoritzades').text(response.data.num2);
                    $('#numPeticionsCancelades').text(response.data.num3);
                    $('#numPeticionsTotals').text(response.data.num4);    
                    // $('#numPeticionsTotalsDepartament').text(response.data.num_dept);    
                    
                    } else {
                    }
            
                })
                .catch( function (error) {
                            console.log (error)
                });

                $('#myEventSelectTable').DataTable().ajax.reload();
    
}

function initUpdateCounters() {
    $('#numPeticionsPendents').text('1');
    $('#numPeticionsAutoritzades').text('1');
    $('#numPeticionsCancelades').text('1');
    $('#numPeticionsTotals').text('1');
}


// edicion peticiones


function limpiarTabla () {
    table.clear().draw();
}

function showModalrefactor(data,responsedata) {
    variableMolona = ''
    
    listadoAsistentes = [];
    $('#codiPeticio').text(data['id']);
    $('#dataPeticio').text(data['fecha_peticion']);
    
    variableMolona = data['nombre_evento'];
    var myDepartmentId = data['department_id']

    myZonaId = data['zona_id']

    listadoAsistentes = responsedata.guests;

    for (var i=0; i < listadoAsistentes.length; i++) {
        
        listadoAsistentes[i].es_principal = listadoAsistentes[i]['pivot'].es_principal;
        listadoAsistentes[i].send_email = listadoAsistentes[i]['pivot'].send_email;

    }

    eventName = data['nombre_evento'];
    eventID = 1;

    // carga de zonas
    axios.get('/eventzone/' + eventID + '/0' )
            .then(response => {
                
                if (response.data) {
                 
                    priceList = [];
      
                    $("#myZona").find('option')
                    .remove()
                    .end();

                    response.data.data.forEach(zona => {
                    $('<option>', {
                        value: zona.id,
                        text:  zona.nombre + " " + zona.price + " €",
                    }).appendTo('#myZona');
                    priceList.push(zona.price);

                });
      
                $('#myZona').val(myZonaId);

                
            
                } else {
                }
        
            })
            .catch( function (error) {
                console.log (error)
            });

        
            // comprobar stock del departamento

            axios.get('/eventdepartmentgeneric/' + eventID + '/' + myDepartmentId )
            .then(response => {
                
                if (response.data.success) {
                 
                    if (response.data.data.length > 0) {
                        myStock = response.data.data[0]['cupo'];
                        $('#myStock').text(myStock);
                    } else {
                        myStock = 0;
                        $('#myStock').text(myStock);                            
                    }

                } else {
                    myStock = 0;
                    $('#myStock').text(myStock);
                }
                
                $('#myStock').text(myStock);
                $('#myPending').text(myPending);
                selectPrice();
            })
            .catch( function (error) {
                        console.log (error)
            });                


    $('#myEsdeveniment').text(eventName);

    $('#myDataEsdeveniment').text(data['fecha_evento']);

    dateEvent = data['fecha_evento'];
    datePeticio = data['fecha_peticion'];
    eventName = data['nombre_evento'];

    $('#myFinalitatSelect').val(data['finalidad_id']);

    $('#myTipus').val(data['tipo_invitacion_id']);

    $('#myQuantitat').val(data['cantidad']);

    $('#myEnNomDe').val(data['en_nombre_de']);

    IDPeticion = data['id'];
 
    $("#panelModificacionPeticion").addClass('d-none'); 
    $("#panelCancelacionPeticion").addClass('d-none'); 

    if (data['tipo_edicion'] == 0) {

        $("#panelModificacionPeticion").addClass('d-none'); 
        $("#panelCancelacionPeticion").addClass('d-none'); 

    }

    if (data['tipo_edicion'] == 1) {
        $("#panelModificacionPeticion").removeClass('d-none');            
        $("#motivoEdicionPeticion").text(data['motivo_modificacion']);
        $("#motivoPersonalizadoEdicionPeticion").text(data['motivo_modificacion_descripcion']);
    }
            
    if (data['tipo_edicion'] == 2) {
        $("#panelCancelacionPeticion").removeClass('d-none'); 

        $("#motivoEdicionCancelarPeticion").text(data['motivo_cancelacion']);
        $("#motivoPersonalizadoEdicionCancelarPeticion").text(data['motivo_cancelacion_descripcion']);
    }

    $('#myModal').modal('show'); 
    
}



function showModalAsistentes() {

    quantitatInvitacions = $('#myQuantitat').val();
    enNomDe = $('#myEnNomDe').val();

    $('#myDataEsdeveniment2').text(dateEvent);
    $('#myEsdeveniment2').text(eventName);
    $('#dataPeticio2').text(datePeticio);
    $('#myQuantitat2').text(quantitatInvitacions);

    $('#myEnNomDe2').text(enNomDe);
    
    $('#myAssistentsTitle').text(eventName + ' ' + dateEvent )
        

    $('#myTipus2').text(enNomDe);

    myFinalitat2  = $('#myFinalitatSelect option:selected').text();
    myTipus2 = $('#myTipus option:selected').text();
    myZona2 = $('#myZona option:selected').text();

    $('#myFinalitat2').text(myFinalitat2);
    $('#myTipus2').text(myTipus2);
    $('#myZona2').text(myZona2);

    $('#myPending2').text(myPending);            

    $('#myTotalInvitationPriceAssistents').text(myTotalInvitationPrice + ' €');            
    $('#myCodigoPeticionAsistentesEdicion').text(  $('#codiPeticio').text() );     

    myFinalitat2  = $('#myFinalitatSelect option:selected').text();
    myTipus2 = $('#myTipus option:selected').text();
    myZona2 = $('#myZona option:selected').text();

    myFinalidadID = $('#myFinalitatSelect').val();
    myTipoInvitacionID = $('#myTipus').val();

    // show modal ----------
    
    myAddTableRowInitAsistentes();
    
    $('#myModalAsistentes').modal('show'); 
    
}    



function closeResumenPeticion() {
    $('#myModalPeticionesResumen').modal('hide'); 
}


function showModalResumen() {
 
    quantitatInvitacions = $('#myQuantitat').val();
    enNomDe = $('#myEnNomDe').val();

    $('#CodiDataPeticioResumen').text(IDPeticion);

    $('#myDataEsdevenimentResumen').text(dateEvent);
    $('#myEsdevenimentResumen').text(eventName);
    $('#dataPeticioResumen').text(datePeticio);
    $('#myQuantitatResumen').text(quantitatInvitacions);

    $('#myEnNomDeResumen').text(enNomDe);
    
    $('#myAssistentsTitleResumen').text(eventName + ' ' + dateEvent )
        
    $('#myTipusResumen').text(enNomDe);

    myFinalitat2  = $('#myFinalitatSelect option:selected').text();
    myTipus2 = $('#myTipus option:selected').text();
    myZona2 = $('#myZona option:selected').text();

    myFinalidadID = $('#myFinalitatSelect').val();
    myTipoInvitacionID = $('#myTipus').val();
   
    $('#myFinalitatResumen').text(myFinalitat2);
    $('#myTipusResumen').text(myTipus2);
    $('#myZonaResumen').text(myZona2);

    $('#myPendingResumen').text(myPending);            

    $('#myTotalInvitationPriceAssistentsResumen').text(myTotalInvitationPrice + ' €');            

    myAddTableRowResumen();

    // show modal ----------

    $('#myModalPeticionesResumen').modal('show'); 
    
}    


function selectPrice2() {

    var myValue = $('#myZona').val();

    myPrice = priceList[myValue-1];

    myChangeNumberOfTickets();

}

function closeAsistentesModal() {
    $('#myModalAsistentes').modal('hide'); 
}

function closeModals() {
    
    $('#myModal').modal('hide'); 
    $('#myModalAsistentes').modal('hide'); 
    $('#myModalPeticionesResumen').modal('hide'); 

}

function myAddTableRow() {
    
    var myObj = {};


    var myTable = document.getElementById("myAssistentsTable");
    
    var row = myTable.insertRow(-1);

    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    var cell7 = row.insertCell(6);
    var cell8 = row.insertCell(7);

    cell1.innerHTML = $('#myAssistentNom').val();
    cell2.innerHTML = $('#myAssistentCognoms').val();
    cell3.innerHTML = $('#myAssistentDni').val();      
    cell4.innerHTML = $('#myAssistentDataNaixement').val();
    cell5.innerHTML = $('#myAssistentNacionalitat').val();
    cell6.innerHTML = $('#myAssistentEmail').val();

    if ($('#AssistentPrincipal').is(":checked"))
    {
        cell7.innerHTML = "✓";
    }
    else {
        cell7.innerHTML = "";
    }
    cell8.innerHTML = "<a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'>      </a>   <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectCancelar'></a>"

    listadoAsistentes.push(
        {
            nombre: cell1.innerHTML,
            apellidos: cell2.innerHTML,
            dni: cell3.innerHTML,
            fecha_nacimiento: cell4.innerHTML,
            nacionalidad: cell5.innerHTML,
            email: cell6.innerHTML,
            es_menor:  $('#esMenor').is(":checked"),
            es_principal: $('#AssistentPrincipal').is(":checked"),
            send_email: $('#enviarEntradasMail').is(":checked"),
               
        }
    )

    // clear fields

$('#myAssistentNom').val('');
$('#myAssistentCognoms').val('');
$('#myAssistentDni').val('');
$('#myAssistentEmail').val('');
$('#myAssistentDataNaixement').val('');
$('#myAssistentNacionalitat').val('');

$('#EnviarEmailA').val('');

$('#AssistentPrincipal').prop( "checked", false );
$('#enviarEntradasMail').prop( "checked", false );
$('#esMenor').prop( "checked", false );


var rowCount = $('#myAssistentsTable tr').length -1;
$('#myNumerGuests').text(rowCount);

}


function myAddTableRowInitAsistentes() {
    
    var myTable = document.getElementById("myAssistentsTable");
    $('#myAssistentsTable tr:gt(0)').remove()

    listadoAsistentes.forEach(asistente => {

        var row = myTable.insertRow(-1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        var cell7 = row.insertCell(6);
        var cell8 = row.insertCell(7);

        cell1.innerHTML = asistente.nombre;
        cell2.innerHTML = asistente.apellidos;
        cell3.innerHTML = asistente.dni;      
        cell4.innerHTML = asistente.fecha_nacimiento;
        cell5.innerHTML = asistente.nacionalidad;
        cell6.innerHTML = asistente.email;

        if (asistente.es_principal)
        {
            cell7.innerHTML = "✓";
        }
        else {
            cell7.innerHTML = "";
        }            

        cell8.innerHTML = "<a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'>      </a>   <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectCancelar'></a>"
    });

}


function myAddTableRowResumen2() {
    
    var myTable = document.getElementById("myAssistentsTableResumen");

    $('#myAssistentsTableResumen tr:gt(0)').remove()

    listadoAsistentes.forEach(asistente => {

        var row = myTable.insertRow(-1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        var cell7 = row.insertCell(6);

        cell1.innerHTML = asistente.nombre;
        cell2.innerHTML = asistente.apellidos;
        cell3.innerHTML = asistente.dni;      
        cell4.innerHTML = asistente.fecha_nacimiento;
        cell5.innerHTML = asistente.nacionalidad;
        cell6.innerHTML = asistente.email;

        if (asistente.es_principal)
        {
            cell7.innerHTML = "✓";
        }
        else {
            cell7.innerHTML = "";
        }            
    });

}


function myChangeNumberOfTickets2() {

    var mySelectedTickets = $('#myQuantitat').val();

    if ((myStock - mySelectedTickets) < 0) {
                Swal.fire({
                    title: 'Stock',
                    text: "No tens invitacions suficients per fer aquesta petició",
                    icon: 'warning',
          
                    confirmButtonColor: '#129443',
           
                    confirmButtonText: 'Tancar!'
                    });
     } else {
        myPending =  myStock - mySelectedTickets;

        myTotalInvitationPrice = mySelectedTickets * myPrice;

        $('#myStock').text(myStock);
        $('#myPending').text(myPending);
        // $('#myTotalPrice').text(myTotalInvitationPrice + ' €');
     }
    
}


function saveInvitation() {
    var myConfirmMessage = '';
    var zona_id;

    myFinalitat2  = $('#myFinalitatSelect option:selected').text();
    myTipus2 = $('#myTipus option:selected').text();

    email_secundario_peticion = $('#emailSecundarioPeticion').val();

    myFinalidadID = $('#myFinalitatSelect').val();
    myTipoInvitacionID = $('#myTipus').val();
    zona_id = $('#myZona').val();

    Swal.fire({
    title: 'Modificar petició',
    text: "¿Segur que vols modificar aquesta petició?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#129443',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, guardar petició!',
    cancelButtonText: 'Cancel.lar'
    }).then((result) => {

            if (result.value) {
              
                myZona2 = $('#myZona option:selected').text();

                    activity = 1;
                    
                    price = myTotalInvitationPrice;

                    quantitatInvitacions = $('#myQuantitat').val();
                    enNomDe = $('#myEnNomDe').val();
                    
                    hora_evento = '21:45';

                 axios.post('/invitations/update'  ,{
                    IDPeticion : IDPeticion,
                    datos: "prueba",
                    estado: 1,
                    dateEvent:dateEvent,
                    datePeticio:datePeticio,
                    eventName:eventName,
                    quantitatInvitacions:quantitatInvitacions,
                    zonaPeticio: myZona2,
                    zona_id: zona_id,
                    enNomDe:enNomDe,
                    user_id: "<?php echo '{{Auth::user()->id}}' ?> ",
                    user_name: '{{Auth::user()->name}}' ,
                    user_dep: '{{Auth::user()->dep}}' ,

                    activity:activity,
                    price:price,
                    en_nombre_de:enNomDe,
                    hora_evento:hora_evento,

                    finalidad_id: myFinalidadID,
                    finalidad:  myFinalitat2,

                    tipo_invitacion_id: myTipoInvitacionID,
                    tipo_invitacion: myTipus2,

                    event_id: eventID,
                    email_secundario_peticion: email_secundario_peticion,
                    listadoAsistentes: listadoAsistentes
                    
            })
                .then(response => {
                    
                    if (response.data.success) {
                        myConfirmMessage = 'Petició ' + response.data.codigopeticion + ' guardada correctament.';
                        Swal.fire(
                            'Tot correcte!',
                            myConfirmMessage,
                            'success'
                        )                            
                        $('#myEventSelectTable').DataTable().ajax.reload();
                     
                    } else {
                        Swal.fire(
                            'Error!',
                            'No ha sigut possible guardar la petició',
                            'error'
                  )
                        $('#myEventSelectTable').DataTable().ajax.reload();
                    }
                    closeModals();
                })
                .catch( function (error) {
                            console.log (error)
                });

            }
            
    })

}


function realitzarPeticio() {
    
    var myConfirmMessage = '';
    var zona_id = '';

    myFinalitat2  = $('#myFinalitatSelect option:selected').text();
    myTipus2 = $('#myTipus option:selected').text();

    email_secundario_peticion = $('#emailSecundarioPeticion').val();

    myFinalidadID = $('#myFinalitatSelect').val();
    myTipoInvitacionID = $('#myTipus').val();
    zona_id = $('#myZona').val();

    email_secundario_peticion = $('#emailSecundarioPeticion').val();

    Swal.fire({
    title: 'Modificar petició',
    text: "¿Segur que vols modificar aquesta petició?",
    icon: 'success',
    showCancelButton: true,
    confirmButtonColor: '#129443',
    cancelButtonColor: '#d33',
    confirmButtonText: 'OK',
    cancelButtonText: 'Cancel.lar'
    }).then((result) => {

            if (result.value) {
                myZona2 = $('#myZona option:selected').text();   
           
                activity = 1;
                price = myTotalInvitationPrice;
                en_nombre_de = enNomDe;
                hora_evento = '21:45';

                axios.post('/invitations/update'  ,{
                    IDPeticion : IDPeticion,
                    estado: 1,
                    datos: "prueba",
                    dateEvent:dateEvent,
                    datePeticio:datePeticio,
                    eventName:eventName,
                    quantitatInvitacions:quantitatInvitacions,
                    zonaPeticio: myZona2,
                    zona_id: zona_id,
                    enNomDe:enNomDe,
                    user_id: "<?php echo '{{Auth::user()->id}}' ?> ",   
                    user_name: '{{Auth::user()->name}}' ,
                    user_dep: '{{Auth::user()->dep}}' ,

                    activity:activity,
                    price:price,
                    en_nombre_de:en_nombre_de,
                    hora_evento:hora_evento,

                    finalidad_id: myFinalidadID,
                    finalidad:  myFinalitat2,

                    tipo_invitacion_id: myTipoInvitacionID,
                    tipo_invitacion: myTipus2,

                    event_id: eventID,
                    email_secundario_peticion: email_secundario_peticion,
                    listadoAsistentes: listadoAsistentes

            })
                .then(response => {
                    myConfirmMessage = 'Petició ' + response.data.codigopeticion + ' modificada correctament.';
                    if (response.data.success) {
                        Swal.fire(
                            'Tot correcte!',
                            myConfirmMessage,
                            'success'
                        )                            
                        
                        $('#myEventSelectTable').DataTable().ajax.reload();

                    } else {
                        Swal.fire(
                            'Error!',
                            'No ha sigut possible modificar la petició',
                            'error'
                  )
                    }
                    closeModals();
                })
                .catch( function (error) {
                            console.log (error)
                });

            }
            
    })
}
