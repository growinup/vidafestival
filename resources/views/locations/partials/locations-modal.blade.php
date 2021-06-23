<!-- Custom modal start -->
<div class="row">
    <div class="col">

        <div class="modal fade" id="myModalLocation">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="locationModalTitle" >Nova Ubicació</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="container"></div>
                    <div class="modal-body">


                        <form action="#">
                
                            <div class="form-group row">
                                <label for="myLocationInput" class="control-label col-sm-4" tkey="PANEL__CARGA_DATOS__UBICACIONES__MODAL__NOMBRE_UBICACION">Nom ubicació</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="myLocationInput" name="myLocationInput" placeholder="">
                                </div>
                            </div>             
                                  
                        </form>
                                
                    </div>
                    <div class="modal-footer">
                        <a href="#" onclick="processLocation()" class="btn btn-success" id="locationModalBtn" tkey="PANEL__CARGA_DATOS__UBICACIONES__MODAL__BOTON__GUARDAR">Guardar</a>
                        <a href="#" onclick="closeLocationModal()" class="btn btn-warning" tkey="PANEL__CARGA_DATOS__UBICACIONES__MODAL__BOTON__CERRAR">Tancar</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
    <!-- Custom modal end -->    