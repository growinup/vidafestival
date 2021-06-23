<!-- Custom modal start -->
<div class="row">
    <div class="col">

        <div class="modal fade" id="myModalPeticionNivelCeroAsignarParaEnvio">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"  tkey="modal__resumen_peticion__enviar__header">Email petició <span id="myEmailPeticionNivelCeroHeader"></span>  </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="container"></div>
                    <div class="modal-body">

                        <div class="alert alert-primary">

                        <h6 tkey="modal__resumen_peticion__enviar__nombre_y_apellidos">Nom i cognoms: <span id="myNamePeticionNivelCeroHeader"></span>  </h6> 

                        </div>
                        <hr>

                        <div>

                            <form action="#">
                                <div class="form-group">
                                    <label for="templateSubjectPeticionNivelCero"  tkey="modal__resumen_peticion__enviar__asunto">Assumpte</label>
                                    <input type="text" name="templateSubjectPeticionNivelCero" id="templateSubjectPeticionNivelCero" class="form-control">
                                </div>
                                
                                <textarea class="form-control" rows="20" name="editorPeticionNivelCeroEnvioEmailFinal" id="editorPeticionNivelCeroEnvioEmailFinal" ></textarea>
                            </form>

                        </div>
                                
                    </div>
                    <div class="modal-footer">
                        <a href="#"  class="btn btn-success" onclick="realizarPeticionNivelCero()"  tkey="modal__resumen_peticion__enviar__boton__enviar">Enviar</a>
                        <a href="#"  class="btn btn-warning" onclick="closeEdiorPeticionNivelCero()"  tkey="modal__resumen_peticion__enviar__boton__cerrar">Tancar</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
    <!-- Custom modal end -->    