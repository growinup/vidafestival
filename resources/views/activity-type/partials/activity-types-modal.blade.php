<!-- Custom modal start -->
<div class="row">
    <div class="col">

        <div class="modal fade" id="myModalActivityType">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="activityTypeModalTitle">Nova Tipologia d'esdeveniment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="container"></div>
                    <div class="modal-body">


                        <form action="#">
                
                            <div class="form-group row">
                                <label for="myActivityTypeInput" class="control-label col-sm-4" tkey="PANEL__CARGA_DATOS__TIPOLOGIA_ACTIVIDAD__MODAL__NOMBRE_TIPOLOGIA_EVENTO">Nom Tipologia d'esdeveniment</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="myActivityTypeInput" name="myActivityTypeInput" placeholder="">
                                </div>
                            </div>             
                                  
                        </form>
                                
                    </div>
                    <div class="modal-footer">
                        <a href="#" onclick="processActivityType()" class="btn btn-success" id="activityTypeModalBtn">Guardar</a>
                        <a href="#" onclick="closeActivityTypeModal()" class="btn btn-warning">Tancar</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
    <!-- Custom modal end -->    