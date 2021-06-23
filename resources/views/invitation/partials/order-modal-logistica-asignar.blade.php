<!-- Custom modal start -->
<div class="row">
    <div class="col">

        <div class="modal fade" id="myModalLogisticaPeticionDetalles">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" tkey="modal__resumen_peticion__asignar__header">Assignar petició</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="container"></div>
                    <div class="modal-body">
                        <h6 tkey="modal__resumen_peticion__asignar__cantidad_asignar">Quantitat a assignar:  <span id="cantidadAsignarLogistica"></span>   </h6>
                        
                        <hr>


                        <form action="#">
               
                            <div class="form-group row">
                                <label for="myZonaPeticionLogistica" class="control-label col-sm-3" tkey="modal__resumen_peticion__asignar__zona">Zona:</label>
                                <div class="col-sm-9">
                                    <select name="myZonaPeticionLogistica" id="myZonaPeticionLogistica" class="custom-select">
                                        <option value="1">TRIBUNA 2a Grad. Central Inferior</option>
                                        
                                    </select>
                                </div>
                            </div>
               
                            <div class="form-group row">
                                <label for="myBocaLogistica" class="control-label col-sm-3"  tkey="modal__resumen_peticion__asignar__boca">Boca:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="myBocaLogistica" id="myBocaLogistica">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="myFilaLogistica" class="control-label col-sm-3" tkey="modal__resumen_peticion__asignar__fila">Fila:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="myFilaLogistica" name="myFilaLogistica">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="myAsientosLogistica" class="control-label col-sm-3" tkey="modal__resumen_peticion__asignar__asientos">Seients:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="myAsientosLogistica" name="myAsientosLogistica">
                                </div>
                            </div>                            

                            <div class="form-group row">
                                <label for="myDescripcionLogistica" class="control-label col-sm-3" tkey="modal__resumen_peticion__asignar__descripcion">Descripció</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="myDescripcionLogistica" name="myDescripcionLogistica" placeholder="">
                                </div>
                            </div>             
                        </form>
                                
                    </div>
                    <div class="modal-footer">
                        <a href="#" onclick="saveInvitationLogistica()" class="btn btn-success" tkey="modal__resumen_peticion__asignar__boton__grabar_peticion">Gravar Petició</a>
                        <a href="#" onclick="asignarPeticionLogisticaParaEnvio()" class="btn btn-primary"  tkey="modal__resumen_peticion__asignar__boton__siguiente">Següent </a>
                        <a href="#" onclick="closeAssignDetailsModal()" class="btn btn-warning"  tkey="modal__resumen_peticion__asignar__boton__cerrar">Tancar</a>                        
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>
    <!-- Custom modal end -->    