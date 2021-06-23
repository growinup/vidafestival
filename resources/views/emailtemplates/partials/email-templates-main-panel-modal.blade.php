<!-- Custom modal start -->
<div class="row">
    <div class="col">

        <div class="modal fade" id="myModalEmailTemplate">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="emailTemplateModalTitle" tkey="PANEL__PLANTILLAS__MODAL__HEADER">Nova Plantilla</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="container"></div>
                    <div class="modal-body">

                        <div class="card">
                            {{-- <div class="card-header">
                                <h4>PLANTILLA </h4>                             
                            </div> --}}
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-3">       
                                        <span tkey="PANEL__PLANTILLAS__MODAL__SELECT__IDIOMA">Idioma</span>                                 
                                        <select class="form-control" name="myLanguageSelectEmailTemplateModal" id="myLanguageSelectEmailTemplateModal">
                                            <option value="1">Castellà</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-3">
                                        <span tkey="PANEL__PLANTILLAS__MODAL__SELECT__UBICACIONES">Ubicació</span>        
                                        <select class="form-control" name="myLocationSelectEmailTemplateModal" id="myLocationSelectEmailTemplateModal" onchange="locationSelectEmailTemplateModalChange()">
                                            <option value="1">Camp Nou</option>
                                        </select>
                                    </div>
                        
                                    <div class="col-3">
                                        <span tkey="PANEL__PLANTILLAS__MODAL__SELECT__ACTIVIDAD">Activitat</span>        
                                        <select class="form-control" name="myActivitySelectEmailTemplateModal" id="myActivitySelectEmailTemplateModal" onchange="activitySelectEmailTemplateModalChange()">
                                            <option value="1">Selecció Activitat</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <span tkey="PANEL__PLANTILLAS__MODAL__SELECT__TIPOLOGIA_EVENTO">Tipologia Esdeveniment</span>        
                                        <select class="form-control" name="myTipologiaEventoSelectEmailTemplateModal" id="myTipologiaEventoSelectEmailTemplateModal">
                                            <option value="1">Seleccio Tipus esdeveniment</option>
                                        </select>
                                    </div>
                        
                                    <div class="col-3">
                                        <span tkey="PANEL__PLANTILLAS__MODAL__SELECT__TIPO_INVITACION">Tipus Invitació</span>        
                                        <select class="form-control" name="myInvitationTypeSelectEmailTemplateModal" id="myInvitationTypeSelectEmailTemplateModal">
                                            <option value="1">Invitació</option>
                                        </select>
                                    </div>
                        
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="emailTemplateNameModal" tkey="PANEL__PLANTILLAS__MODAL__INPUT__NOMBRE">Nom de la plantilla</label>
                                    <input type="text" name="emailTemplateNameModal" id="emailTemplateNameModal" class="form-control">
                                </div>
                        
                                <div class="form-group">
                                    <label for="emailTemplateSubjectModal" tkey="PANEL__PLANTILLAS__MODAL__INPUT__ASUNTO">Assumpte</label>
                                    <input type="text" name="emailTemplateSubjectModal" id="emailTemplateSubjectModal" class="form-control">
                                </div>
                        
                        
                                <textarea class="form-control" rows="20" name="editorEmailTemplateModal" id="editorEmailTemplateModal" ></textarea>
                        
                                <br>
                        
                                {{-- <div class="row">                        
                                    <div class="col">
                                        <button onclick="saveEmailTemplateModal()" class="btn btn-primary float-right">Guardar plantilla</button>
                                    </div>
                                </div> --}}
                        
                            </div>
                        </div>
                        
                                
                    </div>
                    <div class="modal-footer">
                        <a href="#" onclick="saveEmailTemplateModal()" class="btn btn-success" id="EmailTemplateModalBtn" tkey=PANEL__PLANTILLAS__MODAL__BOTON__GUARDAR>Guardar</a>
                        <a href="#" onclick="closeEmailTemplateModal()" class="btn btn-warning" tkey="PANEL__PLANTILLAS__MODAL__BOTON__CERRAR">Tancar</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
    <!-- Custom modal end -->    