<!-- Custom modal start -->
<div class="row">
    <div class="col">

        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalPeticionHeader"></h5>
                        {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> --}}
                    </div>
                    <div class="container"></div>
                    <div class="modal-body">

                        @include('invitation.partials.alerts')
                                
                        <br>

                        <div class="row">
                            <div class="col-12">
                                <div style="background-color:#E6F6FE;color:black; padding:10px;">
                                
                                <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_1__info__codigo">Codi petició:</strong> <span   style="font-weight:bolder;" id="codiPeticio"></span><br>
                                <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_1__info__fecha_peticion">Data petició: </strong> <span  style="font-weight:bolder;" id="dataPeticio"></span> <br>
                                <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_1__info__evento">Esdeveniment:</strong> <span  style="font-weight:bolder;" id="myEsdeveniment"></span><br>
                                <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_1__info__fecha_evento">Data:</strong> <span  style="font-weight:bolder;" id="myDataEsdeveniment"></span> <br>
                                <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_1__info__peticionario">Peticionari:</strong> <span  style="font-weight:bolder;"> {{ Auth::user()->name }} </span>  <br>
                                <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_1__info__departamento">Departament:</strong> <span  style="font-weight:bolder;">{{ Auth::user()->dep }}  </span>  <br>
                                </div>
 
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">
                                <hr>
                            </div>
                        </div>

                        <form action="#">
                            <div class="form-group row">
                                <label for="myEnNomDe" class="control-label col-sm-2" tkey="MODAL__SOLICITUD_PETICIONES__MODAL_1__label__en_nombre_de">* En nom de:</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="myEnNomDe" name="myEnNomDe" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="myFinalitatSelect" class="control-label col-sm-2" tkey="MODAL__SOLICITUD_PETICIONES__MODAL_1__label__finalidad">Finalitat:</label>
                                <div class="col-sm-10">
                                    <select name="myFinalitatSelect" id="myFinalitatSelect" class="custom-select">
                                        <option value="1">Compromís departament</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="myTipus" class="control-label col-sm-2" tkey="MODAL__SOLICITUD_PETICIONES__MODAL_1__label__tipo">Tipus:</label>
                                <div class="col-sm-10">
                                    <select name="myTipus" id="myTipus" class="custom-select">
                                        <option value="1">Compra</option>                    
                                    </select>
                                </div>
                            </div>                                                                          

                            <div class="form-group row">
                                <label for="myIdiomaPeticion" class="control-label col-sm-2" tkey="MODAL__SOLICITUD_PETICIONES__MODAL_1__label__idioma">Idioma petició:</label>
                                <div class="col-sm-10">
                                    <select name="myIdiomaPeticion" id="myIdiomaPeticion" class="custom-select">
                                        <option value="1">Català</option>
                                    </select>
                                </div>
                            </div>       

                            <div class="form-group row">
                                <label for="myZona" class="control-label col-sm-2" tkey="MODAL__SOLICITUD_PETICIONES__MODAL_1__label__zona">Zona:</label>
                                <div class="col-sm-10">
                                    <select name="myZona" onchange="selectPrice()" id="myZona" class="custom-select">

                                    </select>
                                </div>
                            </div>    
 
                            <div class="form-group row">
                                <label for="myQuantitat" class="control-label col-sm-2 " tkey="MODAL__SOLICITUD_PETICIONES__MODAL_1__label__cantidad">* Quantitat:</label>
                                <div class="col-sm-2">
                                <input type="number" min="0"   onkeyup ="myChangeNumberOfTickets()" onchange ="myChangeNumberOfTickets()"   class="form-control" id="myQuantitat"  name="myQuantitat"  placeholder="">
                                </div>

                                <div class="col-2">
                                    <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_1__label__stock">Stock:</strong> <span id="myStock"></span> 
                                </div>
                                <div class="col-2">
                                    <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_1__label__restante">Restant:</strong>  <span id="myPending"></span>
                                </div>

                                {{-- <div class="col-2">
                                    <strong tkey="MODAL__SOLICITUD_PETICIONES__MODAL_1__label__importe">Import:</strong>  <span id="myTotalPrice"></span>
                                </div> --}}
                            </div>             
                        </form>
                                
                    </div>
                    <div class="modal-footer">
                        <a href="#" id="orderModalSaveButton"  onclick="saveInvitation()" class="btn btn-success d-none" tkey="MODAL__SOLICITUD_PETICIONES__MODAL_1__boton__grabar">Gravar</a>
                        <a href="#" onclick="showModalAsistentes()" class="btn btn-primary" tkey="MODAL__SOLICITUD_PETICIONES__MODAL_1__boton__siguiente">Següent</a>
                        <a href="#" onclick="closeMainModal()" class="btn btn-warning" tkey="MODAL__SOLICITUD_PETICIONES__MODAL_1__boton__cerrar">Tancar</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
    <!-- Custom modal end -->    