<!-- Custom modal start -->
<div class="row">
    <div class="col">

        <div class="modal fade" id="myModalGuest">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="guestModalTitle">Nou assistent</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    
                    <div class="container"></div>
                    <div class="modal-body">


                        <form action="#">
                
                            <div class="form-group  row">
                                <label for="myGestionAssistenteNacionalitat" class="control-label col-sm-4" tkey="PANEL__CARGA_DATOS__ASISTENTES__MODAL__NACIONALIDAD">Nacionalitat:</label>
                                <div class="col-sm-8">
                                    <select name="myGestionAssistenteNacionalitat" onchange="" id="myGestionAssistenteNacionalitat" class="custom-select">
                                    </select>
                                </div>                                   
                            </div>

                            <div class="form-group row">
                                <label for="myGuestInputName" class="control-label col-sm-4" tkey="PANEL__CARGA_DATOS__ASISTENTES__MODAL__NOMBRE">Nom</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="myGuestInputName" name="myGuestInputName" placeholder="">
                                </div>
                            </div>             
                                  
                            <div class="form-group row">
                                <label for="myGuestInputLastName" class="control-label col-sm-4" tkey="PANEL__CARGA_DATOS__ASISTENTES__MODAL__APELLIDOS">Cognom</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="myGuestInputLastName" name="myGuestInputLastName" placeholder="">
                                </div>
                            </div>           

                            <div class="form-group row">
                                <label for="myGuestInputDni" class="control-label col-sm-4" tkey="PANEL__CARGA_DATOS__ASISTENTES__MODAL__DNI">Dni</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="myGuestInputDni" name="myGuestInputDni" placeholder="">
                                </div>
                                <div class="col-3">
                                    <input type="checkbox" class="custom-control-input" id="esMenorGestionAsistentes">
                                    <label class="custom-control-label ml-2" for="esMenorGestionAsistentes" tkey="PANEL__CARGA_DATOS__ASISTENTES__MODAL__ES_MENOR">Es menor</label>
                                </div>
                            </div>           

                            <div class="form-group row">
                                <label for="myGuestInputEmail" class="control-label col-sm-4" tkey="PANEL__CARGA_DATOS__ASISTENTES__MODAL__EMAIL">Email</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="myGuestInputEmail" name="myGuestInputEmail" placeholder="">
                                </div>
                            </div>           

                            <div class="form-group row">
                                <label for="myGuestInputDate" class="control-label col-sm-4" tkey="PANEL__CARGA_DATOS__ASISTENTES__MODAL__FECHA_NACIMEINTO">Data naixament</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="myGuestInputDate" name="myGuestInputDate" placeholder="">
                                </div>
                            </div>           




                        </form>
                                
                    </div>
                    <div class="modal-footer">
                        <a href="#" onclick="processGuest()" class="btn btn-success" id="departmentModalBtn" tkey="PANEL__CARGA_DATOS__ASISTENTES__MODAL__BOTON__GUARDAR">Guardar</a>
                        <a href="#" onclick="closeGuestModal()" class="btn btn-warning" tkey="PANEL__CARGA_DATOS__ASISTENTES__MODAL__BOTON__CERRAR">Tancar</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
    <!-- Custom modal end -->    