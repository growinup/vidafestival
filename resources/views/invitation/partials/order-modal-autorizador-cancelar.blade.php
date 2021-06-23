<!-- Custom modal start -->
<div class="row">
    <div class="col">

        <div class="modal fade" id="myModalAutorizadorCancelar">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" tkey="modal__resumen_peticion__cancelar__header">Cancel.lar petició</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="container"></div>
                    <div class="modal-body">

                        <form action="#">
                            <div class="form-group row">
                                <label for="myMotivoCancelarSelectAutorizador" class="control-label col-sm-3" tkey="modal__resumen_peticion__cancelar__motivo">Motiu:</label>
                                <div class="col-sm-9">
                                    <select name="myMotivoCancelarSelectAutorizador" id="myMotivoCancelarSelectAutorizador" class="custom-select">
                                        <option value="1">Falta de stock</option>
                      
                                    </select>
                                </div>
                            </div>
               
                            <div class="form-group row">
                                <label for="myDescripcionMotivoCancelar" class="control-label col-sm-3" tkey="modal__resumen_peticion__cancelar__descripción_motivo">Descripció motiu cancel.lació</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="myDescripcionMotivoCancelar" name="myDescripcionMotivoCancelar" placeholder="">
                                </div>
                            </div>             
                        </form>
                                
                    </div>
                    <div class="modal-footer">
                        <a href="#" onclick="cancelarPeticionAutorizador(myPeticionID)" class="btn btn-danger" tkey="modal__resumen_peticion__cancelar__boton__notificar">Notificar</a>
                        <a href="#" onclick="closeCancelModal()" class="btn btn-warning" tkey="modal__resumen_peticion__cancelar__boton__cerrar">Tancar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Custom modal end -->    