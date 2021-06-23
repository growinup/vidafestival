@extends('layouts.appcess_main_layout')

@section('breadcrumbs')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h3 tkey="MODAL__CREAR_EVENTO__HEADER">NOU ESDEVENIMENT</h3>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{Session::get('myhome') }}">
                            <i class="feather icon-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#" tkey="MODAL__CREAR_EVENTO__BC">LLISTAT ESDEVENIMENTS</a></li>
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
                        {{-- <div class="row">
                            <div class="col-md-4 col-12">
                                <h6>ACTIVITAT</h6>
                                <select name="myActivity" class="form-control" id="myActivity" onchange="myActivitySelectChange()">
                                    <option value="1">Futbol</option>
                                    <option value="2">Desplaçament</option>
                                    <option value="3">CNE</option>                                   
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

                        </div> --}}

                        <div class="row mb-3">
                            <div class="col-4">
                                <h6>UBICACIÓ</h6>
                                <select name="myUbicacion" class="form-control" id="myUbicacion" onchange="myLocationSelectChange()" >
                                    <option value="1">Camp Nou</option>
                                </select>
                            </div>

                            <div class="col-4">
                                <h6>ACTIVITAT</h6>
                                <select name="myActivity" class="form-control" id="myActivity" onchange="myActivitySelectChange()">
                                    <option value="1">Futbol</option>
                                </select>
                            </div>

                            <div class="col-4">
                                <h6>TIPOLOGIA D'ESDEVENIMENT</h6>
                                <select name="myActivityType" class="form-control" id="myActivityType">
                                    <option value="1">Lliga</option>
                                    <option value="3">Champions</option>
                                </select>
                            </div>                            
                        </div>


                        <div class="row">
                            <div class="col-7">
        
                                <div class="form-group row">
                                    <label for="myNombreEvento" class="control-label col-sm-12 col-md-12 col-lg-4">Nombre evento</label>
                                    <div class="col-sm-12 col-lg-8">
                                        <input type="text" class="form-control" id="myNombreEvento" name="myNombreEvento" placeholder="">
                                    </div>                                           
                                </div>                        
        
                            </div>
        
                            <div class="col-5">
            
                                <div class="form-group row">
                                    <label for="myFechaEvento" class="control-label col-sm-6 col-md-3">Data</label>
                                    <div class="col-sm-6 col-md-3">
                                    <input type="text" class="form-control" id="myFechaEvento" name="myFechaEvento" placeholder="" >
                                    </div>                                           
               
                                    <label for="myHoraEvento" class="control-label col-sm-6  col-md-3">Hora</label>
                                    <div class="col-sm-6  col-md-3">
                                        <input type="text" class="form-control" id="myHoraEvento" name="myHoraEvento" placeholder="" >
                                    </div>            
                                </div>            
                                
                                <div class="row" >
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="myFechaNoConfirmada">
                                        <label class="custom-control-label" for="myFechaNoConfirmada">Data no confirmada</label>
                                    </div>
                                </div>
        
                            </div>
                        </div>

                        
                        <br>

    
                        <div class="row float-right">
                            <div class="col">
                                
                                <button class="btn btn-success" onclick="createNewEvent()">Crear esdeveniment</button>
                            
                            </div>
                        </div>    

                        </div>

                </div>
            </div>
        </div>
    </div>

  

    


@endsection 


@section('scripts')

<script>
    
    $(document).ready(function() {
   
        crearListaLocations()
        crearListaActividades()
        crearListaTiposActividad()

    });


    function crearListaLocations() {

        axios.get('/getLocationsall')
                .then(response => {

                if (response.data.success) {
                        
                        $("#myUbicacion").find('option')
                        .remove()
                        .end();

                    response.data.data.forEach(location => {
                        
                        $('<option>', {
                            value: location.id,
                            text:  location.nombre,
                        }).appendTo('#myUbicacion');

                        
                    });       
                    myLocationSelectChange()
                } else {
                
                }

        })
        .catch( function (error) {

        });    

}    


function crearListaActividades(locationId) {

        axios.get('/getActividadsall')
            .then(response => {
                

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
                                
                $("#myActivityType").find('option')
                .remove()
                .end();

            response.data.data.forEach(activitytype => {
                


                if (activitytype.activity_id == myactivityId) {

                    $('<option>', {
                        value: activitytype.id,
                        text:  activitytype.name,
                     }).appendTo('#myActivityType');

                }                        
                
            });       
         
        } else {
        
        }

})
.catch( function (error) {

});    

}    






  function myLocationSelectChange() {
        var myLocationToFilter =$("#myUbicacion").val()
        crearListaActividades(myLocationToFilter) 
    }

    function myActivitySelectChange() {
        var myActivityToFilter =$("#myActivity").val()
        crearListaTiposActividad(myActivityToFilter) 
  
    }

    function myActivityTypeSelectChange() {
  
    }

  





   
function createNewEvent() {


    let myEventName = $('#myNombreEvento').val();
    
    let myEventConfirmedDate = $('#myFechaNoConfirmada').is(":checked");

    let myEventDate = $('#myFechaEvento').val();
    let myEventTime = $('#myHoraEvento').val();
    
    let myEventLocation = $('#myUbicacion').val();
    let myActivity = $('#myActivity').val();
    let myActivityType = $('#myActivityType').val();

    axios.post('/createnewevent', {
                nombre: myEventName,
                fecha_confirmada: myEventConfirmedDate,
                fecha: myEventDate,
                hora: myEventTime,
                ubicacion: myEventLocation,
                actividad: myActivity,
                tipoActividad: myActivityType
            })
                .then(response => {

                    if (response.data.success) {

                         Swal.fire(
                            'Tot correcte!',
                            'Esdeveniment creat correctament',
                            'success'
                        )

                        // ir a edicion evento
                        window.location='/events/'+ response.data['event'];

                    } else {
                        Swal.fire(
                            'Error!',
                            "No ha sigut possible crar l'esdeveniment",
                            'error'
                        )
                    }

                })
                .catch(function (error) {
                    console.log(error)
                });

}


</script>    
    
@endsection