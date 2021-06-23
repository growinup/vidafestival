<!-- Custom modal start -->
<div class="row">
    <div class="col">

        <div class="modal fade" id="myModalEditPurpose">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="purposeEditModalTitle">Nou motiu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="container"></div>
                    <div class="modal-body">


                        <form action="#">
                
                            <div class="form-group row">
                                <label for="myEditPurposeInput" class="control-label col-sm-4" tkey="PANEL__CARGA_DATOS__MOTIVOS__MODAL__DESCRIPCION_MOVITO">Descripció motiu</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="myEditPurposeInput" name="myEditPurposeInput" placeholder="">
                                </div>
                            </div>             
                                  
                        </form>
                                
                    </div>
                    <div class="modal-footer">
                        <a href="#" onclick="processEditPurpose()" class="btn btn-success" id="purposeModalBtn" tkey="PANEL__CARGA_DATOS__MOTIVOS__MODAL__BOTON__GUARDAR">Guardar</a>
                        <a href="#" onclick="closeEditPurposeModal()" class="btn btn-warning" tkey="PANEL__CARGA_DATOS__MOTIVOS__MODAL__BOTON__CERRAR">Tancar</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
    <!-- Custom modal end -->    