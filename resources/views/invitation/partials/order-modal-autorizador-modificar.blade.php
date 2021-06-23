<!-- Custom modal start -->
<div class="row">
    <div class="col">

        <div class="modal fade" id="myModalAutorizadorModificar">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" tkey="modal__resumen_peticion__modificar__header">Modificar petició</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="container"></div>
                    <div class="modal-body">


                        <form action="#">
               
                            <div class="form-group row">
                                <label for="myMotivoSelectAutorizador" class="control-label col-sm-3" tkey="modal__resumen_peticion__modificar__motivo">Motiu:</label>
                                <div class="col-sm-9">
                                    <select name="myMotivoSelectAutorizador" id="myMotivoSelectAutorizador" class="custom-select">
                                        <option value="1">Petició duplicada</option>
                                    </select>
                                </div>
                            </div>
               
                            <div class="form-group row">
                                <label for="myDescripcionMotivoModificacion" class="control-label col-sm-3" tkey="modal__resumen_peticion__modificar__descripción_motivo">Descripció motiu</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="myDescripcionMotivoModificacion" name="myDescripcionMotivoModificacion" placeholder="">
                                </div>
                            </div>             
                                                
 
                      
                        </form>
                                
                    </div>
                    <div class="modal-footer">
                        <a href="#" onclick="modificarPeticionAutorizador(myPeticionID)" class="btn badge-modificada" tkey="modal__resumen_peticion__modificar__boton__notificar">Notificar</a>
                        <a href="#" onclick="cerrarModificarPeticionAutorizador()" class="btn btn-warning"  tkey="modal__resumen_peticion__modificar__boton__cerrar">Tancar</a>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>
    <!-- Custom modal end -->    