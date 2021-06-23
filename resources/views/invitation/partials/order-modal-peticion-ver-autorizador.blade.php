<!-- Custom modal start -->
<div class="row">
    <div class="col">
    <ul>
        <li>
            <!-- Modal -->
            <div class="modal fade" id="myModalPeticionesVerAutorizador">
                <div class="modal-dialog modal-dialog-centered modal-xl">
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

                          
                                 @include('invitation.partials.alerts-logistica')                                 
                                
                            <br>
                           <div class="row">
                               <div class="col-3">
                                   <h4 tkey="modal__resumen_peticion__ver__header">Resum de la petició</h4> 
                               </div>
                               <div class="col-2 mt-1">
                                  <h6 tkey="modal__resumen_peticion__ver__estado_peticion">Estat de la petició:</h6> 
                               </div>
                               <div class="col-2 mt-1 mb-0">
                                   <span class="badge" id="estadoPeticionTitulo">
                                         Autoritzada 
                                   </span>   
                                </div>
                           </div>


                            <div  style="background-color:#E6F6FE;color:black; padding:10px;">
                            <div class="row">
                                <div class="col-6">
                                    <strong tkey="modal__resumen_peticion__ver__info__codigo_peticion">Codi petició: </strong>  <span  style="font-weight:bolder;" id="codigoPeticionEdicionAutorizador"></span><br>
                                    <strong tkey="modal__resumen_peticion__ver__info__fecha_peticion">Data petició:</strong> <span  style="font-weight:bolder;" id="fechaPeticionResumenAutorizadorLogistica"></span> <br>
                                    <strong tkey="modal__resumen_peticion__ver__info__evento">Esdeveniment:</strong> <span  style="font-weight:bolder;" id="nombreEventoResumenAutorizadorLogististica"></span> <br>
                                    <strong tkey="modal__resumen_peticion__ver__info__fecha_evento">Data:</strong> <span  style="font-weight:bolder;" id="fechaEventoResumenAutorizadorLogistica"></span> <br>
                                    <strong tkey="modal__resumen_peticion__ver__info__peticionario">Peticionari:</strong> <span  style="font-weight:bolder;" id="myPeticionarioNombreResumen"> </span> <br>
                                    <strong tkey="modal__resumen_peticion__ver__info__departamento">Departament:</strong> <span  style="font-weight:bolder;" id="myPeticionarioDepartamentoResumen"> </span> <br>
                                </div>

                                    <div class="col-6">
                                    <strong  tkey="modal__resumen_peticion__ver__info__en_nombre_de" >En nom de:</strong> <span  style="font-weight:bolder;" id="enNombreDeResumenAutorizadorLogistica"></span> <br>
                                    <strong  tkey="modal__resumen_peticion__ver__info__finalidad">Finalitat:</strong > <span  style="font-weight:bolder;" id="finalidadResumenAutorizadorLogistica"></span>   <br>
                                    <strong  tkey="modal__resumen_peticion__ver__info__tipo">Tipus:</strong> <span  style="font-weight:bolder;" id="tipoInvitacionResumenAutorizadorLogistica"></span>  <br>
                                    <strong  tkey="modal__resumen_peticion__ver__info__zona">Zona:</strong> <span  style="font-weight:bolder;" id="zonaResumenAutorizadorLogistica"></span>  <br>
                                    <strong  tkey="modal__resumen_peticion__ver__info__cantidad">Quantitat:</strong> <span   style="font-weight:bolder;" id="cantidadResumenAutorizadorLogistica"></span> <br>
                                    {{-- <strong  tkey="modal__resumen_peticion__ver__info__Precio_total">Preu total:</strong> <span  style="font-weight:bolder;" id="precioTotalResumenAutorizadorLogistica"></span>   --}}
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
                                    <p tkey="modal__resumen_peticion__ver__info__invitados">Convidats: <span id="numeroInvitadosResumenAutorizadorLogistica"></span> </p>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col">
                                    <div class="div">
                                        <div class="col">
                                            <table id="myAssistentsTableResumenAutorizadorLogistica" class="table table-striped table-bordered nowrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th tkey="modal__resumen_peticion__ver__tabla__nombre">Nom</th>
                                                        <th tkey="modal__resumen_peticion__ver__tabla__apellidos">Cognoms</th>
                                                        <th tkey="modal__resumen_peticion__ver__tabla__dni">Dni</th>
                                                        <th tkey="modal__resumen_peticion__ver__tabla__fecha_nacimiento">Data naixement</th>
                                                        <th tkey="modal__resumen_peticion__ver__tabla__nacionalidad">Nacionalitat</th>
                                                        <th tkey="modal__resumen_peticion__ver__tabla__email">Email</th>
                                                        <th tkey="modal__resumen_peticion__ver__tabla__principal">Principal</th>
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

                            <div  style="background-color:#E6F6FE;color:black; padding:10px;">

                                <span  tkey="modal__resumen_peticion__ver__footer_boca">Boca:</span>         <span style="font-weight:bolder;" id="myIdBocaResumen"></span>      <br>
                                <span  tkey="modal__resumen_peticion__ver__footer_fila">Fila:</span>         <span style="font-weight:bolder;" id="myIdFilaResumen"></span>     <br>
                                <span  tkey="modal__resumen_peticion__ver__footer_asiento">Seient:</span>       <span style="font-weight:bolder;" id="myIdAsientoResumen"></span>    <br>
                                <span  tkey="modal__resumen_peticion__ver__footer_descripcion">Descripció:</span>   <span style="font-weight:bolder;" id="myIdDescripcionResumen"></span>

                            </div>


                            {{-- <hr>
                            <div class="row form-group">
                                <div class="col">
                                    <form action="#">
                                        <h6  tkey="modal__resumen_peticion__ver__footer_segundo_mail">Enviar petició complerta a un altre email </h6>
                                        
                                        <div class="col-sm-5">
                                            <span id="emailSecundarioPeticionAutorizadorLogistica">
                                                No
                                            </span>

                                        </div>
                           
                                    </form>
                                </div>
                            </div> --}}

                        <div class="row text-center">
                            <div class="col">
                                                     {{-- <a href="#" onclick="realitzarPeticio()" class="btn btn-primary">Guardar</a> --}}

                                <button onclick="editarPeticionModal()" class="btn btn-warning"  tkey="modal__resumen_peticion__ver__boton__modificar" >Modificar</button>
                                <button onclick="cancelarPeticionModal()" class="btn btn-danger "  tkey="modal__resumen_peticion__ver__boton__cancelar" >C<span class="lowercase">ancel.lar</span> </button>
                                <button id="autorizarPeticionButton" onclick="autorizarPeticion(myPeticionID)" class="btn btn-success"  tkey="modal__resumen_peticion__ver__boton__autorizar" >Autoritzar</button>
                                <button id="asignarPeticionButton" onclick="asignarPeticionDetalles()" class="btn btn-success"  tkey="modal__resumen_peticion__ver__boton__asignar" >Assignar</button>
                                
                                {{-- <button onclick="closeModalPreviewYEnvio()" class="btn btn-warning">Tancar </button> --}}

                            </div>
                        </div>

                        </div>
                       
                        <div class="modal-footer">

                     
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
