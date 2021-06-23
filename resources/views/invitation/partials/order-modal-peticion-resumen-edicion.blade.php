{{-- Modal añadir asistentes --}}
<!-- Custom modal start -->
<div class="row">
    <div class="col">
    <ul>
        <li>
            <!-- Modal -->
            <div class="modal fade" id="myModalPeticionesResumen">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            
                            <div class="row" style="margin: 0 auto;">
                                <div class="col">
                                    <h5 class="modal-title"><span id="myAssistentsTitleResumen"></span> </h5> 
                                    
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
                            <h4 tkey="MODAL__SOLICITUD_PETICIONES__MODAL_3_ASISTENTES__header">Resum de la petició</h4>
                            <div  style="background-color:#E6F6FE;color:black; padding:10px;">
                            <div class="row">
                                <div class="col-6">
                                    <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__info__codigo">Codi petició:</strong> <span style="font-weight:bolder;" id="CodiDataPeticioResumen"></span>  <br>
                                    <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__info__fecha_peticion">Data petició:</strong> <span  style="font-weight:bolder;" id="dataPeticioResumen"></span> <br>
                                    <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__info__evento">Esdeveniment:</strong> <span  style="font-weight:bolder;" id="myEsdevenimentResumen"></span> <br>
                                    <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__info__fecha_evento">Data:</strong> <span  style="font-weight:bolder;" id="myDataEsdevenimentResumen"></span> <br>
                                    <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__info__peticionario">Peticionari:</strong> <span  style="font-weight:bolder;">{{ Auth::user()->name }} </span> <br>
                                    <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__info__departamento">Departament:</strong> <span  style="font-weight:bolder;">{{ Auth::user()->dep }} </span> <br>
                                </div>

                                    <div class="col-6">
                                    <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__info__en_nombre_de">En nom de:</strong> <span  style="font-weight:bolder;" id="myEnNomDeResumen"></span> <br>
                                    <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__info__finalidad">Finalitat:</strong > <span  style="font-weight:bolder;" id="myFinalitatResumen"></span>   <br>
                                    <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__info__tipo">Tipus:</strong> <span  style="font-weight:bolder;" id="myTipusResumen"></span>  <br>
                                    <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__info__zona">Zona:</strong> <span  style="font-weight:bolder;" id="myZonaResumen"></span>  <br>
                                    <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__info__cantidad">Quantitat:</strong> <span   style="font-weight:bolder;" id="myQuantitatResumen"></span> <br>
                                    <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__info__restante">Restant:</strong> <span  style="font-weight:bolder;" id="myPendingResumen"></span> <br>
                                    {{-- <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__info__importe">Preu total:</strong> <span  style="font-weight:bolder;" id="myTotalInvitationPriceAssistentsResumen"></span>   --}}
                                </div>                                                                                            
                            </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <hr>
                                </div>
                            </div>

                         

                            <div class="row">
                                <div class="col">
                                    <p tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__label__invitados">Convidats: <span id="myNumerGuestsResumen"></span> </p>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col">
                                    <div class="div">
                                        <div class="col">
                                            <table id="myAssistentsTableResumen" class="table table-striped table-bordered nowrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th tkey="MODAL__SOLICITUD_PETICIONES__MODAL_3_ASISTENTES__tabla__headers__nombre">Nom</th>
                                                        <th tkey="MODAL__SOLICITUD_PETICIONES__MODAL_3_ASISTENTES__tabla__headers__apellidos">Cognoms</th>
                                                        <th tkey="MODAL__SOLICITUD_PETICIONES__MODAL_3_ASISTENTES__tabla__headers__dni">Dni</th>
                                                        <th tkey="MODAL__SOLICITUD_PETICIONES__MODAL_3_ASISTENTES__tabla__headers__fecna_nacimiento">Data naixement</th>
                                                        <th tkey=MODAL__SOLICITUD_PETICIONES__MODAL_3_ASISTENTES__tabla__headers__nacionalidad>Nacionalitat</th>
                                                        <th tkey="MODAL__SOLICITUD_PETICIONES__MODAL_3_ASISTENTES__tabla__headers__email">Email</th>
                                                        <th tkey="MODAL__SOLICITUD_PETICIONES__MODAL_3_ASISTENTES__tabla__headers__principal">Principal</th>
                                                    </tr>
                                                </thead>
                                                <tbody> 
        
                                 
                                                </tbody>
                                            </table>                                                                                                                       
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>
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
                        <div class="modal-footer">

                            {{-- <a href="#" onclick="realitzarPeticio()" class="btn btn-primary">Guardar</a> --}}
                 

                            <button onclick="saveInvitation()" class="btn btn-primary d-none" tkey="MODAL__SOLICITUD_PETICIONES__MODAL_2_ASISTENTES__boton__guardar">Guardar</button>
                            <button onclick="realitzarPeticio()" class="btn btn-success" tkey="MODAL__SOLICITUD_PETICIONES__MODAL_3_ASISTENTES__boton__enviar" >Enviar</button>
                            <button onclick="closeResumenPeticion()" class="btn btn-warning" tkey="MODAL__SOLICITUD_PETICIONES__MODAL_3_ASISTENTES__boton__cerrar" >Tornar</button>
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


{{-- fin modal añadir asistentes  --}}