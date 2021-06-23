<!-- Custom modal start -->
<div class="row">
    <div class="col">

        <div class="modal fade" id="myModalUser">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="userModalTitle">Nou Usuari</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="container"></div>
                    <div class="modal-body">


                        <form action="#">
                
                            <div class="form-group row">
                                <div class="col-6">
                                    <h6 tkey="PANEL__CARGA_DATOS__USUARIOS__MODAL__AREA">ÀREA</h6>
                                    <div class="row">
                                       
                                        <select class="form-control " name="areaslistModalParaUsuariosSistema" id="areaslistModalParaUsuariosSistema" onchange="areasListChangePanelPrincipalUsuariosSistemaModal()">                                
                                        </select>
                                      
                                    </div>
                                </div>

                                <div class="col-6">
                                    <h6 tkey="PANEL__CARGA_DATOS__USUARIOS__MODAL__DEPARTAMENTO">DEPARTAMENT</h6>

                                        <select class="form-control " name="departmentlistModalParaUsuariosSistema" id="departmentlistModalParaUsuariosSistema" >                                
                                        </select>
                 
                                </div>
                            </div>
                            
                            <hr>
                            <div class="form-group row">
                                <label for="myUserRolForSystemUserModal" class="control-label col-sm-4" tkey="PANEL__CARGA_DATOS__USUARIOS__MODAL__ROL">Rol usuari</label>                                 
                                <select class="form-control col-4 " name="myUserRolForSystemUserModal" id="myUserRolForSystemUserModal" onchange="selectRoleChange()">
                                    {{-- <option value="1">Admin</option> --}}
                                    <option value="2" tkey="PANEL__CARGA_DATOS__USUARIOS__MODAL__ROL_GESTOR">Gestor</option>
                                    <option value="3" tkey="PANEL__CARGA_DATOS__USUARIOS__MODAL__ROL_PETICIONARIO">Peticionari</option>
                                    <option value="4" tkey="PANEL__CARGA_DATOS__USUARIOS__MODAL__ROL_AUTORIZADOR">Autoritzador</option>
                                    <option value="5" tkey="PANEL__CARGA_DATOS__USUARIOS__MODAL__ROL_LOGISTICA">Logistica</option>
                                </select>

                                <div class="col-4 d-none mt-2"  id="panelEsAutorizadorDoble">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="esAutorizadorNivel2">
                                        <label class="custom-control-label" for="esAutorizadorNivel2" tkey="PANEL__CARGA_DATOS__USUARIOS__MODAL__ROL_AUTORIZADOR_SEGUNDO_NIVEL">És autoritzador de segon nivell</label>
                                    </div>
                                </div>
                            </div>    
                            
                            <div class="form-group row">
                                <div class="col  mt-2"  id="panelSeleccionZonasAutorizar">

                                    <label for="admin-chosen-select" class="control-label" tkey="PANEL__CARGA_DATOS__USUARIOS__MODAL__ROL_AUTORIZADOR_ZONAS_AUTORIZAR">Zones que pot autoritzar</label>                                 
                                    <select class="form-control col  chzn-select"  multiple name="admin-chosen-select" id="admin-chosen-select"  style="width: 200px;">

                                    </select>
                                    </div>
                            </div>


                            <div class="form-group row">
                                <label for="myUserInput" class="control-label col-sm-4" tkey="PANEL__CARGA_DATOS__USUARIOS__MODAL__NOMBRE">Nom i cognoms</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="myUserInput" name="myUserInput" placeholder="">
                                </div>
                            </div>          

                            <div class="form-group row">
                                <label for="myUserEmailInput" class="control-label col-sm-4" tkey="PANEL__CARGA_DATOS__USUARIOS__MODAL__EMAIL">Email (usuari)</label>                                
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" id="myUserEmailInput" name="myUserEmailInput" placeholder="">
                                </div>
                            </div>         
                            
                            <hr>
                            <div class="form-group row">
                                <label for="myUserPassword1" class="control-label col-sm-4" tkey="PANEL__CARGA_DATOS__USUARIOS__MODAL__PASSWORD1">Contrasenya</label>                                
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="myUserPassword1" name="myUserPassword1" placeholder="">
                                </div>      
                            </div>                                 

                            <div class="form-group row">
                                <label for="myUserPassword2" class="control-label col-sm-4" tkey="PANEL__CARGA_DATOS__USUARIOS__MODAL__PASSWORD2">Repetir Contrasenya</label>                                
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="myUserPassword2" name="myUserPassword2" placeholder="">
                                </div>       
                            </div>                                                             
                         
                                  
                        </form>
                                
                    </div>
                    <div class="modal-footer">
                        <a href="#" onclick="processUser()" class="btn btn-success" id="userModalBtn" tkey="PANEL__CARGA_DATOS__USUARIOS__MODAL__BOTON__GUARDAR">Guardar</a>
                        <a href="#" onclick="closeUserModal()" class="btn btn-warning" tkey="PANEL__CARGA_DATOS__USUARIOS__MODAL__BOTON__CERRAR">Tancar</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
    <!-- Custom modal end -->    