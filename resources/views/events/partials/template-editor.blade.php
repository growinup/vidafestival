<!-- Custom template editor modal start -->
<div class="row">
    <div class="col">

        <div class="modal fade" id="myModalTemplateEditor">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" tkey="MODAL__EDITAR_EVENTO__EDITOR_PLANTILLAS__HEADER">Plantilla</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
           
                    
                    <div class="modal-body">
                        <div class="mb-3">
                            <a href="#" onclick="resetPlantillaOriginal()" class="btn btn-warning btn-sm" tkey="MODAL__EDITAR_EVENTO__EDITOR_PLANTILLAS__BOTON__RESET">Reset Original</a>
                            
                        </div>
            
                        <form action="#">
                            <div class="form-group">
                                <label for="templatename" tkey="MODAL__EDITAR_EVENTO__EDITOR_PLANTILLAS__INPUT_ASUNTO">Assumpte</label>
                                <input type="text" name="templatesubject" id="templatesubject" class="form-control">
                            </div>
                            
                            <textarea class="form-control" rows="20" name="myeditor" id="myeditor" ></textarea>
                        </form>
                                
                    </div>

                    <div class="modal-footer">
                       <a href="#" onclick="saveSelectedTemplate()" class="btn btn-primary" tkey="MODAL__EDITAR_EVENTO__EDITOR_PLANTILLAS__BOTON__GUARDAR">Guardar plantilla</a>
                       <a href="#" onclick="closeAllModals()" class="btn btn-warning" tkey="MODAL__EDITAR_EVENTO__EDITOR_PLANTILLAS__BOTON__CERRAR">Tancar</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
    <!-- Custom modal end -->    