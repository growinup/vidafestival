<!-- Custom modal start -->
<div class="row">
    <div class="col">

        <div class="modal fade" id="myModalLogisticaAsignarParaEnvio">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" tkey="modal__resumen_peticion__enviar__header">Email petició <span id="myEmailPeticionHeader"></span>  </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="container"></div>
                    <div class="modal-body">

                        <div class="alert alert-primary">

                        <h6 tkey="modal__resumen_peticion__enviar__nombre_y_apellidos">Nom i cognoms: <span id="myNamePeticionHeader"></span>  </h6> 
                        {{-- <h6>Email principal: <span id="myEmailPrincipal"></span>  </h6>  --}}

                        </div>
                        <hr>

                        <div>
                            {{-- <img src="{{asset('files/assets/images/fcbplantilla.png')}}" width=350 alt="">   --}}

                            <form action="#">
                                <div class="form-group">
                                    <label for="templateSubject" tkey="modal__resumen_peticion__enviar__asunto">Assumpte</label>
                                    <input type="text" name="templateSubject" id="templateSubject" class="form-control">
                                </div>
                                
                                <textarea class="form-control" rows="20" name="editorLogisticaEnvioEmailFinal" id="editorLogisticaEnvioEmailFinal" ></textarea>
                            </form>

                        </div>
                                
                    </div>
                    <div class="modal-footer">
                        {{-- <a href="#" onclick="" class="btn btn-warning">Editar</a> --}}
                        <a href="#" onclick="enviarEmailPeticionLogistica()" class="btn btn-success" tkey="modal__resumen_peticion__enviar__boton__enviar">Enviar</a>
                        <a href="#" onclick="closeModalPreviewYEnvio()" class="btn btn-warning"  tkey="modal__resumen_peticion__enviar__boton__cerrar">Tancar</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
    <!-- Custom modal end -->    