<!-- Custom modal start -->
<div class="row">
    <div class="col">

        <div class="modal fade" id="myCreateEventModal">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" tkey="MODAL__CREAR_EVENTO__HEADER">Crear nou esdeveniment</h5>
                        {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> --}}
                    </div>
                    <div class="container"></div>
                    <div class="modal-body">

                        <div class="row mb-3">
                            <div class="col-4">
                                <h6 tkey="MODAL__CREAR_EVENTO__SELECT_UBICACION">UBICACIÓ</h6>
                                <select name="myUbicacionCrearEventsModal" class="form-control" id="myUbicacionCrearEventsModal" onchange="myLocationSelectChangeForCreateEventsModal()" >
                                    <option value="1">Camp Nou</option>
                                </select>
                            </div>

                            <div class="col-4">
                                <h6 tkey="MODAL__CREAR_EVENTO__SELECT_ACTIVIDAD">ACTIVITAT</h6>
                                <select name="myActivityCrearEventosModal" class="form-control" id="myActivityCrearEventosModal" onchange="myActivitySelectChangeForCreateEventsModal()">
                                    <option value="1">Futbol</option>
                                </select>
                            </div>

                            <div class="col-4">
                                <h6 tkey="MODAL__CREAR_EVENTO__SELECT_TIPOLOGIA_ACTIVIDAD">TIPOLOGIA D'ESDEVENIMENT</h6>
                                <select name="myActivityTypeCrearEventosModal" class="form-control" id="myActivityTypeCrearEventosModal">
                                    <option value="1">Lliga</option>
                                    <option value="3">Champions</option>
                                </select>
                            </div>                            
                        </div>


                        <div class="row">
                            <div class="col-7">
        
                                <div class="form-group row">
                                    <label for="myNombreEventoCrearEventoModal" class="control-label col-sm-12 col-md-12 col-lg-4" tkey="MODAL__CREAR_EVENTO__INPUT_NOMBRE">Nombre evento</label>
                                    <div class="col-sm-12 col-lg-8">
                                        <input type="text" class="form-control" id="myNombreEventoCrearEventoModal" name="myNombreEventoCrearEventoModal" placeholder="">
                                    </div>                                           
                                </div>                        
        
                            </div>
        
                            <div class="col-5">
            
                                <div class="form-group row">
                                    <label for="myFechaEventoCrearEventoModal" class="control-label col-sm-6 col-md-3" tkey="MODAL__CREAR_EVENTO__INPUT_FECHA">Data</label>
                                    <div class="col-sm-6 col-md-3">
                                    <input type="text" class="form-control" id="myFechaEventoCrearEventoModal" name="myFechaEventoCrearEventoModal" placeholder="" >
                                    </div>                                           
               
                                    <label for="myHoraEventoCrearEventoModal" class="control-label col-sm-6  col-md-3" tkey="MODAL__CREAR_EVENTO__INPUT_HORA">Hora</label>
                                    <div class="col-sm-6  col-md-3">
                                        <input type="text" class="form-control" id="myHoraEventoCrearEventoModal" name="myHoraEventoCrearEventoModal" placeholder="" >
                                    </div>            
                                </div>            
                                
                                <div class="row" >
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="myFechaNoConfirmadaCrearEventoModal">
                                        <label class="custom-control-label" for="myFechaNoConfirmadaCrearEventoModal" tkey="MODAL__CREAR_EVENTO__CHECKBOX_FECHA_NO_CONFIRMADA">Data no confirmada</label>
                                    </div>
                                </div>
        
                            </div>
                        </div>

                        
                        <br>

    
                        <div class="row float-right">
                            <div class="col">
                                
                                <button class="btn btn-success" onclick="createNewEvent()" tkey="MODAL__CREAR_EVENTO__BOTON__CREAR_EVENTO">Crear esdeveniment</button>
                                <a href="#" onclick="closeModalCrearEvento()" class="btn btn-warning" tkey="MODAL__CREAR_EVENTO__BOTON__CERRAR">Tancar</a>                            
                            </div>
                        </div>    
                                                  
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
    <!-- Custom modal end -->    