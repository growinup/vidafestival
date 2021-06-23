<!-- Custom modal start -->
<div class="row">
    <div class="col">

        <div class="modal fade" id="myModalPurpose">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="purposeModalTitle">Nova finalitat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="container"></div>
                    <div class="modal-body">


                        <form action="#">
                
                            <div class="form-group row">
                                <label for="myPurposeInput" class="control-label col-sm-3" tkey="PANEL__CARGA_DATOS__FINALIDADES__MODAL__DESCRIPCION_FINALIDAD">Nom finalitat</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="myPurposeInput" name="myPurposeInput" placeholder="">
                                </div>
                            </div>             
                                  
                        </form>
                                
                    </div>
                    <div class="modal-footer">
                        <a href="#" onclick="processPurpose()" class="btn btn-success" id="purposeModalBtn" tkey="PANEL__CARGA_DATOS__FINALIDADES__MODAL__BOTON__GUARDAR">Guardar</a>
                        <a href="#" onclick="closePurposeModal()" class="btn btn-warning" tkey="PANEL__CARGA_DATOS__FINALIDADES__MODAL__BOTON__CERRAR">Tancar</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
    <!-- Custom modal end -->    