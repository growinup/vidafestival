@extends('layouts.appcess_main_layout')

@include('events.partials.create-event')

@section('breadcrumbs')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h3>ESDEVENIMENTS</h3>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{Session::get('myhome') }}">
                            <i class="feather icon-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">LLISTAT ESDEVENIMENTS</a></li>
                    {{-- <li class="breadcrumb-item"><a href="#">NOVA PETICIÓ</a></li>                     --}}
                </ul>
            </div>
        </div>
    </div>
</div>
    
@endsection

@section('content')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                        <div class="row">

                            <div class="col-md-4 col-12">
                                <h6>UBICACIÓ</h6>
                                <select name="myLocation" class="form-control" id="myLocation" onchange="myLocationSelectChange()">
                                         
                                </select>
                            </div>
                            
                            
                            <div class="col-md-4 col-12">
                                <h6>ACTIVITAT</h6>
                                <select name="myActivity" class="form-control" id="myActivity" onchange="myActivitySelectChange()">
                                         
                                </select>
                            </div>

                     
                            <div class="col-md-4 col-12">
                                <h6>TIPUS</h6>
                                <select name="myType"  class="form-control" id="myType"  onchange="myActivityTypeSelectChange()">
                                    <option value="0">Tots</option>
                                    <option value="1">Lliga</option>
                                    <option value="3">Champions</option>
                                </select>
                            </div>                  

                        </div>

                        </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
    <div class="col">
        
        <div class="card">
            <div class="card-header">
                <h4>LLISTAT DESDEVENIMENTS</h4>


                <hr>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary">Filtre avançat</button>
                    </div>
                </div>
                
                <hr>
                <button class="btn btn-primary" onclick="showModalCrearEvento()">
                    Crear esdeveniment
                </button>
            </div>
         
            <div class="card-body">
                <table id="myEventSelectTable" class="table table-striped table-bordered nowrap" style="width:100%">
                 
                    <thead></thead>
                    <tbody></tbody>

                </table>                    
            </div>

        </div>
    </div>
    </div>    

    


@endsection 


@section('scripts')

<script>
    var myTableEventSelectedTable = "myEventSelectTablePanel";
    let table;
    
    var variableMolona;
    var data;
    
    var dateEvent;
    var datePeticio;
    var eventName;
    var eventID;

    var quantitatInvitacions;
    var zonaPeticio;

    var enNomDe;

    const myStock = 25;
    var myPending = 25;
    var myTotalInvitationPrice;

    var myPrice = 150;

    var myFinalidadID;
    var myFinalidad;
    var  myTipoInvitacionID;
    var myTipoInvitacion;
    var email_secundario_peticion;
    var listadoAsistentes = [];

    var fechaNoConfirmada;


    $(document).ready(function() {

        crearListaLocations()
        crearListaActividades()
        crearListaTiposActividad()


       table = $('#myEventSelectTable').DataTable({

     
        "scrollX": true,
        "ajax": {
            "url": "/events",
            "type": "GET",
            "datatype": "json"
        },

         "columns": [

            { "defaultContent": "  <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'>      </a>  "}  ,              
             { data: "activity_id" , visible:false },
             { data: "id_partido" , title: "Codi"},
             { data: "nombre" , title: "Esdeveniment" },
             { data: "jornada" , title: "Jornada" , visible:false},
             { data: "type_id" , visible:false },
             { data: "type_id" , visible:false, title: "Competició" ,
                    render: function ( data, type, row, meta ) {
                        if (data==1) return 'Lliga';
                        if (data==3) return 'Champions';

                        return 'No definit ';
                   }                
                 },
                
                 { data: "not_confirmed_date",visible:false , 
                
                    render: function ( data, type, row, meta ) {
                            fechaNoConfirmada = data;
                            return data;
                    }   
                 
                },      
               
                { "data": "fecha" , title: "Data" , 
                 
                render: function ( data, type, row, meta ) {
                      
                      if (fechaNoConfirmada == 1) return "No confirmada";
                    //   return data;
                    return moment( data,'YYYY/MM/DD' ).format('DD/MM/YYYY') ;
              }                

                },
                { "data": "hora" ,title: "Hora"},
                { "data": "ubicacion_id",title: "Ubicació" , visible:false},
                { "data": "id_aforo", title: "aforo", visible:false },
                

                 ],         
    

            "language": tablesLang
        });

         $('#'+myTableEventSelectedTable).on('click', '#selectEdit', function (e) {
            e.preventDefault();  

            var currentRow = $(this).closest("tr");

            var data = $('#myEventSelectTable').DataTable().row(currentRow).data();
     
            // ir a edicion evento
            window.location='/events/'+ data['id'];

        });         

          

    } );



    function crearListaLocations() {

        axios.get('/getLocationsall')
                .then(response => {

                if (response.data.success) {
                        

                    response.data.data.forEach(location => {
                        
                        $('<option>', {
                            value: location.id,
                            text:  location.nombre,
                        }).appendTo('#myLocation');

                        
                    });       
                    myLocationSelectChange()
                } else {
                
                }

        })
        .catch( function (error) {

        });    

    }    


    function crearListaActividades(locationId) {
    axios.get('/getActividadsall').then(response => {

            if (response.data.success) {

                
                $("#myActivity").find('option')
                        .remove()
                        .end();
                    
                response.data.data.forEach(actividad => {
                    
                    if (actividad.location_id == locationId) {

                        $('<option>', {
                            value: actividad.id,
                            text:  actividad.name,
                        }).appendTo('#myActivity');

                    }

                    
                });       

            } else {            
            }

    })
    .catch( function (error) {

    });    

    }


    function crearListaTiposActividad(myactivityId) {

        axios.get('/getTipoActividadsall')
                .then(response => {

                if (response.data.success) {
                                                
                        $("#myType").find('option')
                        .remove()
                        .end();

                        $('<option>', {
                            value: 0,
                            text:  'Tots',
                        }).appendTo('#myType');    

                    response.data.data.forEach(activitytype => {
                        


                        if (activitytype.activity_id == myactivityId) {

                            $('<option>', {
                                value: activitytype.id,
                                text:  activitytype.name,
                             }).appendTo('#myType');

                        }                        
                        
                    });       
                 
                } else {
                
                }

        })
        .catch( function (error) {

        });    

    }    

    function myLocationSelectChange() {
        var myLocationToFilter =$("#myLocation").val()
        crearListaActividades(myLocationToFilter) 
        filterEvents();
    }

    function myActivitySelectChange() {
        var myActivityToFilter =$("#myActivity").val()
        crearListaTiposActividad(myActivityToFilter) 
        filterEvents();
    }

    function myActivityTypeSelectChange() {
        filterEvents();
    }

    function filterEvents() {


            // filtrado tabla 
            var table = $('#myEventSelectTable').DataTable();
            
            var myActivitySearch = $('#myActivity').val();
            var myActivitTypeSearch = $('#myType').val();
        
                if (myActivitTypeSearch == 0) {
                        myActivitTypeSearch = '';
                }

            var filteredData = table
            .column( 1 )
            .search("^" + myActivitySearch + "$", true, false, true)
            .column( 5 )
            .search( myActivitTypeSearch , true, false, true)
            .column( 10 )
            .search( myActivitTypeSearch , true, false, true)
            .draw();
     
      
    }





    function limpiarTabla () {
        table.clear().draw();
    }

    function showModal(data) {
        variableMolona = ''
        
        listadoAsistentes = [];
        
        $('#codiPeticio').text(variableMolona);

        var myDate = new Date();
        var dd = String(myDate.getDate()).padStart(2, '0');
        var mm = String(myDate.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = myDate.getFullYear();

        myDate = dd + '/' + mm + '/' + yyyy;

        $('#dataPeticio').text(myDate);
        
        variableMolona = data['nombre'];
        
        eventName = data['nombre'];
        eventID = data['id'];

        $('#myEsdeveniment').text(eventName);

        $('#myDataEsdeveniment').text(data['fecha']);


        dateEvent = data['fecha'];
        datePeticio = myDate;
        eventName = data['nombre'];
        // quantitat;
        // zonaPeticio;

        // show modal ----------

        $('#myStock').text(myStock);
        $('#myPending').text(myPending);

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


        myFinalitat2  = $('#myFinalitatSelect option:selected').text();
        myTipus2 = $('#myTipus option:selected').text();
        myZona2 = $('#myZona option:selected').text();


        myFinalidadID = $('#myFinalitatSelect').val();
        myTipoInvitacionID = $('#myTipus').val();

        // show modal ----------

        $('#myModalAsistentes').modal('show'); 
        
    }    



    function closeResumenPeticion() {
        $('#myModalPeticionesResumen').modal('hide'); 
    }


    function showModalResumen() {
     
        quantitatInvitacions = $('#myQuantitat').val();
        enNomDe = $('#myEnNomDe').val();

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


    function selectPrice() {

        var myValue = $('#myZona').val();
        if (myValue == 1) myPrice = 150;
        if (myValue == 2) myPrice = 360;

            
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

       

        listadoAsistentes.push(
            {
                nombre: cell1.innerHTML,
                apellidos: cell2.innerHTML,
                dni: cell3.innerHTML,
                fecha_nacimiento: cell4.innerHTML,
                nacionalidad: cell5.innerHTML,
                email: cell6.innerHTML,
                es_menor:  $('#esMenor').is(":checked"),
                asistente_principal: $('#AssistentPrincipal').is(":checked"),
                enviar_entradas: $('#enviarEntradasMail').is(":checked"),
                   
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


    function myAddTableRowResumen() {
        
        var myTable = document.getElementById("myAssistentsTableResumen");

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

            if (asistente.asistente_principal)
            {
                cell7.innerHTML = "✓";
            }
            else {
                cell7.innerHTML = "";
            }            

        });


    }



    function myChangeNumberOfTickets() {
  
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

        myFinalitat2  = $('#myFinalitatSelect option:selected').text();
        myTipus2 = $('#myTipus option:selected').text();

        email_secundario_peticion = $('#emailSecundarioPeticion').val();

        myFinalidadID = $('#myFinalitatSelect').val();
        myTipoInvitacionID = $('#myTipus').val();

        Swal.fire({
        title: 'Guardar petició',
        text: "¿Segur que vols guardar aquesta petició per finalitzar-la en un altre moment?",
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

                     axios.post('/invitations'  ,{
                        datos: "prueba",
                        estado:2,
                        dateEvent:dateEvent,
                        datePeticio:datePeticio,
                        eventName:eventName,
                        quantitatInvitacions:quantitatInvitacions,
                        zonaPeticio: myZona2,
                        enNomDe:enNomDe,
                        user_id: {{Auth::user()->id}} ,
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
                        
                         
                        } else {
                            Swal.fire(
                                'Error!',
                                'No ha sigut possible guardar la petició',
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


    function realitzarPeticio() {
        
        var myConfirmMessage = '';

        myFinalitat2  = $('#myFinalitatSelect option:selected').text();
        myTipus2 = $('#myTipus option:selected').text();

        email_secundario_peticion = $('#emailSecundarioPeticion').val();

        myFinalidadID = $('#myFinalitatSelect').val();
        myTipoInvitacionID = $('#myTipus').val();



        email_secundario_peticion = $('#emailSecundarioPeticion').val();

        Swal.fire({
        title: 'Realitzar petició',
        text: "¿Segur que vols realitzar aquesta petició?",
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

                     axios.post('/invitations'  ,{
                        estado: 1,
                        datos: "prueba",
                        dateEvent:dateEvent,
                        datePeticio:datePeticio,
                        eventName:eventName,
                        quantitatInvitacions:quantitatInvitacions,
                        zonaPeticio: myZona2,
                        enNomDe:enNomDe,
                        user_id: {{Auth::user()->id}} ,
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
                        myConfirmMessage = 'Petició ' + response.data.codigopeticion + ' realitzada correctament.';
                        if (response.data.success) {
                            Swal.fire(
                                'Tot correcte!',
                                myConfirmMessage,
                                'success'
                            )                            
                         
                        } else {
                            Swal.fire(
                                'Error!',
                                'No ha sigut possible realitzar la petició',
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
        

    // crear nuevo evento

    function showModalCrearEvento()  {
        // $('#myCreateEventModal').modal('show'); 
   
        window.location.href = ("<?php echo route('creareventoformshow'); ?> ");
    }

    function closeModalCrearEvento()  {
        $('#myCreateEventModal').modal('hide'); 
    }
          
    function crearEvento() {
        
    }

</script>    
    
@endsection