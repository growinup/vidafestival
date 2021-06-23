<!-- Custom modal start asistentes-->

<div class="row">
    <div class="col">
    <ul>
        <li>
            <!-- Modal -->
            <div class="modal fade" id="myModalAsistentes">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            
                            <div class="row" style="margin: 0 auto;">
                                <div class="col">
                                    <h5 class="modal-title"><span id="myAssistentsTitle"></span> </h5> 
                                    
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                            </div>

                        </div>
                        <div class="container"></div>
                        <div class="modal-body">

                            <div  style="background-color:#E6F6FE;color:black; padding:10px;">
                            <div class="row">
                                <div class="col-6">
                                    <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__info__codigo">Codi petició:</strong> <span  style="font-weight:bolder;" id="codigoPeticion"></span> <br>
                                    <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__info__fecha_peticion">Data petició:</strong> <span  style="font-weight:bolder;" id="dataPeticio2"></span> <br>
                                    <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__info__evento">Esdeveniment:</strong> <span  style="font-weight:bolder;" id="myEsdeveniment2"></span> <br>
                                    <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__info__fecha_evento">Data:</strong> <span  style="font-weight:bolder;" id="myDataEsdeveniment2"></span> <br>
                                    <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__info__peticionario">Peticionari:</strong> <span  style="font-weight:bolder;">{{ Auth::user()->name }} </span> <br>
                                    <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__info__departamento">Departament:</strong> <span  style="font-weight:bolder;">{{ Auth::user()->dep }} </span> <br>
                                </div>

                                    <div class="col-6">
                                    <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__info__en_nombre_de">En nom de:</strong> <span  style="font-weight:bolder;" id="myEnNomDe2"></span> <br>
                                    <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__info__finalidad">Finalitat:</strong > <span  style="font-weight:bolder;" id="myFinalitat2"></span>   <br>
                                    <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__info__tipo">Tipus:</strong> <span  style="font-weight:bolder;" id="myTipus2"></span>  <br>
                                    <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__info__zona">Zona:</strong> <span  style="font-weight:bolder;" id="myZona2"></span>  <br>
                                    <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__info__cantidad">Quantitat:</strong> <span   style="font-weight:bolder;" id="myQuantitat2"></span> <br>
                                    <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__info__restante">Restant:</strong> <span  style="font-weight:bolder;" id="myPending2"></span> <br>
                                    {{-- <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__info__importe">Preu total:</strong> <span  style="font-weight:bolder;" id="myTotalInvitationPriceAssistents"></span>   --}}
                                </div>                                                                                            
                            </div>
                            </div>

                        <div id="addGuestPanelDiv">

                            <div class="row">
                                <div class="col">
                                    <hr>
                                    <h6 id="remainingGuests"></h6>
                                    <hr>
                                </div>
                            </div>
                  
                            <form action="#">

                                <div class="form-group row">
                                    <div class="col-6">
                                        <div class="row">
                                            {{-- <label for="myAssistentDni" class="control-label col-sm-3">* DNI: </label> --}}
                                            <select class="custom-select col-sm-3" name="mySelectIdentificacion" id="mySelectIdentificacion">
                                                <option value="1" tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__select_id__dni">DNI</option>
                                                <option value="2" tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__select_id__pasaporte">Passaport</option>
                                                <option value="3" tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__select_id__nie">NIE</option>
                                            </select>


                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="myAssistentDni" name="myAssistentDni" placeholder=""  autocomplete="nope">
                                            </div>    

                                            <div class="custom-control custom-checkbox ml-4">
                                                <input type="checkbox" class="custom-control-input" id="esMenor">
                                                <label class="custom-control-label" for="esMenor">Es menor</label>
                                            </div>                                            
                                        </div>
                                    </div>

                                    <div class="col-6">                                                                                                                                                                                                                                                    
                                    <div class="row">
                                        <label for="myAssistentEmail" class="control-label col-sm-3" tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__input__email">Email: </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="myAssistentEmail" name="myAssistentEmail" placeholder=""  autocomplete="nope">
                                    </div>
                                    </div>
                                    </div>
                                </div>         

                                

                                <div class="form-group row">
 
                                    <div class="col-6">
                                        <div class="row">
                                            <label for="myAssistentNom" class="control-label col-sm-3" tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__input__nombre">* Nom: </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="myAssistentNom" name="myAssistentNom" placeholder="" autocomplete="nope">
                                            </div>    
                                        </div>
                                    </div>

                                    <div class="col-6">                                                                                                                                                                                                                                                    
                                    <div class="row">
                                        <label for="myAssistentCognoms" class="control-label col-sm-3" tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__input__apellidos">* Cognoms: </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="myAssistentCognoms" name="myAssistentCognoms" placeholder=""  autocomplete="nope">
                                    </div>
                                    </div>
                                    </div>
                                </div>

                                                                                                  
                
                                <div class="form-group row">
                                    <div class="col-6">
                                        <div class="row">
                                            <label for="myAssistentDataNaixement" class="control-label col-sm-5" tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__input__fecha_nacimiento">Data naixement: </label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="myAssistentDataNaixement" placeholder=""  autocomplete="nope">
                                            </div>    
                                        </div>
                                    </div>

                                    <div class="col-6">                                                                                                                                                                                                                                                    
                                    <div class="row">
                                        <label for="myAssistentNacionalitat" class="control-label col-sm-2" tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__input__nacionalidad">Nacionalitat:</label>
                                        <div class="col-sm-10">
                                            <select name="myAssistentNacionalitat" onchange="" id="myAssistentNacionalitat" class="custom-select">
                                            </select>
                                        </div>                                   
                                    </div>
                                    </div>
                                </div>                                                                                                    

                                <div class="form-group row">
                                    <div class="col-6">
                                        <div class="row">
                                            <label for="myGuestPhone" class="control-label col-sm-3">Teléfono: </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="myGuestPhone" name="myGuestPhone" placeholder="" autocomplete="nope">
                                            </div>      
                                            {{-- <div class="custom-control custom-checkbox ml-4" id="myAsistentePrincipalDiv">
                                                <input type="checkbox" class="custom-control-input" id="AssistentPrincipal">
                                                <label class="custom-control-label" for="AssistentPrincipal" tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__checkbox__principal">Assistent principal</label>
                                            </div> --}}

                                        </div>
                                    </div>

                                    <div class="col-6">                                                                                                                                                                                                                                                    
                                    <div class="row d-none">
                                        <div class="custom-control custom-checkbox ml-3">
                                            <input type="checkbox" class="custom-control-input" id="enviarEntradasMail">
                                            <label class="custom-control-label" for="enviarEntradasMail" tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__input__otro_mail">Vols enviar les entrades al seu email?</label>
                                        </div>
                                    </div>
                                    <br>
                                    </div>
                                </div>          
                            </form>
                        
                            <div class="row">
                                <div class="col">
                                    <div class="div">
                                        
                                        <div id="modoedicion" class="d-none">
                                            <button onclick="cancelarEdicion()" class="btn btn-danger float-right " style="text-transform: none;" >Cancel-lar </button>
                                            <button onclick="editarRegistro()" class="btn btn-primary float-right mr-3"  >Actualitzar</button>
                                        </div>
                                        
                                        <div id="addasistente">
                                            <button onclick ="myAddTableRow()" class="btn btn-primary float-right mb-3" tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__boton__add">Afegir</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                            <hr>

                            <div class="row">
                                <div class="col">
                                    <p tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__label__invitados">Convidats: <span id="myNumerGuests"></span> </p>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col">
                                    <div class="div">
                                        <div class="col">
                                            <table id="myAssistentsTable" class="table table-striped table-bordered nowrap" style="width:100%">
                                                <thead> </thead>
                                                <tbody> </tbody>
                                            </table>                                                                                                                       
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="row form-group">
                                <div class="col">
                                    <form action="#">
                                        <h6 tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__input__otro_mail">Vols enviar la petició complerta a un altre email? </h6>                                        
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="emailSecundarioPeticion" placeholder=""  autocomplete="nope">
                                        </div>                           
                                    </form>
                                </div>
                            </div> --}}

                        

                        </div>

                        <div class="modal-footer" id="footerModalSolicitudInvitacion">

                            <button id="orderAsistentesSaveButton"  onclick="saveInvitation()" class="btn btn-success d-none" tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__boton__grabar" >Gravar</button>
                            <button id="orderAsistentesSaveAndSendButton" onclick="showModalResumen()" class="btn btn-primary" tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__boton__siguiente">Continuar</button>
                            <button onclick="closeAsistentesModal()" class="btn btn-warning" tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__boton__cerrar">Tornar</button>
                
                        </div>

                    </div>
                </div>
            </div>

            <!--Multi Model End-->
        </li>
    </ul>
    </div>
</div>
<!-- Custom modal end -->
