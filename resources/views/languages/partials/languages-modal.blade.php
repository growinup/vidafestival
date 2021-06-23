<!-- Custom modal start -->
<div class="row">
    <div class="col">

        <div class="modal fade" id="myModalLanguage">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="languageModalTitle">Nou idioma</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="container"></div>
                    <div class="modal-body">


                        <form action="#">
                
                            <div class="form-group row">
                                <label for="myLanguageInput" class="control-label col-sm-3 " tkey="PANEL__CARGA_DATOS__IDIOMAS__MODAL__IDIOMA">Nom idioma</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="myLanguageInput" name="myLanguageInput" placeholder="">
                                </div>
                            </div>             
                                  
                        </form>
                                
                    </div>
                    <div class="modal-footer">
                        <a href="#" onclick="processLanguage()" class="btn btn-success" id="languageModalBtn" tkey="PANEL__CARGA_DATOS__IDIOMAS__MODAL__BOTON__GUARDAR">Guardar</a>
                        <a href="#" onclick="closeLanguageModal()" class="btn btn-warning" tkey="PANEL__CARGA_DATOS__IDIOMAS__MODAL__BOTON__CERRAR">Tancar</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
    <!-- Custom modal end -->    