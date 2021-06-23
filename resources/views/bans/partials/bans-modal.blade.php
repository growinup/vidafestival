<!-- Custom modal start -->
<div class="row">
    <div class="col">

        <div class="modal fade" id="myModalBan">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="banModalTitle">Nou expedient</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    
                    <div class="container"></div>
                    <div class="modal-body">


                        <form action="#">
                
                            <div class="form-group row">
                                <label for="myBanInputExercici" class="control-label col-sm-4" tkey="PANEL__CARGA_DATOS__PROHIBIDOS__MODAL__EJERCICIO">Exercici</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="myBanInputExercici" name="myBanInputExercici" placeholder="">
                                </div>
                            </div>    
                            
                            <div class="form-group row">
                                <label for="myBanInputExpedient" class="control-label col-sm-4" tkey="PANEL__CARGA_DATOS__PROHIBIDOS__MODAL__EXPEDIENTE">Expedient</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="myBanInputExpedient" name="myBanInputExpedient" placeholder="">
                                </div>
                            </div>                                 



                            <div class="form-group row">
                                <label for="myBanInputDateResolution" class="control-label col-sm-4" tkey="PANEL__CARGA_DATOS__PROHIBIDOS__MODAL__FECHA_RESOLUCION">Data Resolució</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="myBanInputDateResolution" name="myBanInputDateResolution" placeholder="">
                                </div>
                            </div>     


                            <div class="form-group row">
                                <label for="myBanInputDelegacio" class="control-label col-sm-4" tkey="PANEL__CARGA_DATOS__PROHIBIDOS__MODAL__DELEGACION">Delegació</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="myBanInputDelegacio" name="myBanInputDelegacio" placeholder="">
                                </div>
                            </div>      


                            <div class="form-group row">
                                <label for="myBanInputDni" class="control-label col-sm-4" tkey="PANEL__CARGA_DATOS__PROHIBIDOS__MODAL__IDENTIFICACION">Identificació</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="myBanInputDni" name="myBanInputDni" placeholder="">
                                </div>
                            </div>           


                            <div class="form-group row">
                                <label for="myBanInputName" class="control-label col-sm-4" tkey="PANEL__CARGA_DATOS__PROHIBIDOS__MODAL__NOMBRE">Nom</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="myBanInputName" name="myBanInputName" placeholder="">
                                </div>
                            </div>             
                              
                            <div class="form-group row">
                                <label for="myBanInputDateStart" class="control-label col-sm-4" tkey="PANEL__CARGA_DATOS__PROHIBIDOS__MODAL__FECHA_INICIO">Data Inici</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="myBanInputDateStart" name="myBanInputDateStart" placeholder="">
                                </div>
                            </div>     

                            <div class="form-group row">
                                <label for="myBanInputDateEnd" class="control-label col-sm-4" tkey="PANEL__CARGA_DATOS__PROHIBIDOS__MODAL__FECHA_FIN">Data Fi</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="myBanInputDateEnd" name="myBanInputDateEnd" placeholder="">
                                </div>
                            </div>     


                        </form>
                                
                    </div>
                    <div class="modal-footer">
                        <a href="#" onclick="processBan()" class="btn btn-success" id="departmentModalBtn" tkey="PANEL__CARGA_DATOS__PROHIBIDOS__MODAL__BOTON__GUARDAR">Guardar</a>
                        <a href="#" onclick="closeBanModal()" class="btn btn-warning" tkey="PANEL__CARGA_DATOS__PROHIBIDOS__MODAL__BOTON__CERRAR">Tancar</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
    <!-- Custom modal end -->    