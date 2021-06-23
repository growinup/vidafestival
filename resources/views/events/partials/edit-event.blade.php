<!-- Custom modal start -->
<div class="row">
    <div class="col">

        <div class="modal fade" id="myEditEventModal">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Crear nou esdeveniment</h5>
                        {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> --}}
                    </div>
                    <div class="container"></div>
                    <div class="modal-body">
                    
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row mb-3">
                                            <div class="col-4">
                                                <h6>UBICACIÓ</h6>
                                                <select name="myUbicacion" class="form-control" id="myUbicacion" onchange="myLocationSelectChange()">
                                                    <option value="1">Camp Nou</option>
                                                </select>
                                            </div>
                    
                                            <div class="col-md-4 col-12">
                                                <h6>ACTIVITAT</h6>
                                                <select name="myActivity" class="form-control" id="myActivity" onchange="selectActividadChange()">
                                                
                                                </select>
                                            </div>
                    
                                            <div class="col-md-4 col-12">
                                                <h6>TIPOLOGIA ESDEVENIMENT</h6>
                                                <select name="myType"  class="form-control" id="myType" onchange="selectTipoActividadChange()">
                     
                                                </select>
                                            </div>             
                    
                                        </div>
                    
                                 
                                    </div>
                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                          <div class="col">
                    
                            <div class="card">
                                <div class="card-header">
                                    <h4>DADES DE L'ESDEVENIMENT </h4>
                                    {{-- <hr> --}}
                                    <div class="row">
                                        <div class="col-6">
                    
                                            <div class="form-group row">
                                                <label for="myNombreEvento" class="control-label col-sm-12 col-md-12 col-lg-4">Nombre evento</label>
                                                <div class="col-sm-12 col-lg-8">
                                                    <input type="text" class="form-control" id="myNombreEvento" name="myNombreEvento" placeholder="" value="">
                                                </div>                                           
                                            </div>                        
                    
                                        </div>
                    
                                        <div class="col-6">
                        
                                            <div class="form-group row">
                                                <label for="myFechaEvento" class="control-label col-sm-6 col-md-3">Data</label>
                                                <div class="col-sm-6 col-md-3">
                                                <input type="text" class="form-control" id="myFechaEvento" name="myFechaEvento" placeholder="" value="">
                                                </div>                                           
                           
                                                <label for="myHoraEvento" class="control-label col-sm-6  col-md-3">Hora</label>
                                                <div class="col-sm-6  col-md-3">
                                                    <input type="text" class="form-control" id="myHoraEvento" name="myHoraEvento" placeholder="" value="">
                                                </div>            
                                            </div>            
                                            
                                            <div class="row" >
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="myFechaNoConfirmada">
                                                    <label class="custom-control-label" for="myFechaNoConfirmada">Data no confirmada</label>
                                                </div>
                                            </div>
                    
                                        </div>
                                    </div>
                                    
                                      
                                    <div class="row">
                                        <div class="col-5 d-none">
                    
                                            <div class="form-group row">
                                                <label for="myJornadaEvento" class="control-label col-sm-3">Jornada</label>
                                                <div class="col-sm-3">
                                                <input type="text" class="form-control" id="myJornadaEvento" name="myJornadaEvento" placeholder="" value="">
                                                </div>         
                                                
                                                <div class="d-none">
                    
                                                    <label for="myAforoEvento" class="control-label col-sm-3">Aforo</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="myAforoEvento" myAforoEvento="myAforoEvento" placeholder="" value="">
                                                    </div>        
                                                    
                                                </div>
                    
                                            </div>                        
                                        </div>
                    
                    
                                        <div class="col-5">
                    
                                            <div class="form-group row">
                            
                                                <label for="myNivelAforo" class="col-sm-4 col-md-3">Nivell</label>
                                                <div class="col-sm-4 col-md-5 " >
                                                    <select name="myNivellCmb"   class="form-control" id="myNivellCmb">
                                                        <option value="0" >Sense autorització</option>
                                                        <option value="1" selected >Autorització</option>
                                                        <option value="2" >Doble autorització</option>
                                                    </select>
                                                </div>
                                          
                                            </div>                        
                                        </div>                    
                    
                                    </div>


                                        <div class="form-group row">
                
                                            <div class="col-3">
                                                <select  name="myTipoInvitacion" multiple class="form-control" id="myTipoInvitacion">                                               
                                                    <option value="1" >Invitació</option>
                                                    <option value="2" >Compra</option>
                                                    <option value="3" >Passis</option>
                                                </select>

                                                {{-- <select name="myActivity"  id="myActivity" onchange="selectActividadChange()">
                                                
                                                </select> --}}
                                            </div>
                                        
                                        </div>                        
                                  
                         
                                   
                                </div>
                            </div>
                    
                            <div class="card">
                                <div class="card-header">
                                    <h4>ENTRADES I CUPOS </h4>
                                    <hr>
                    
                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <h6>SECTOR</h6>
                                            <select name="mySector" onchange="filterZoneSector()"  class="form-control" id="mySector">
                                                <option value="0" disabled>Selección de sector</option>
                                            </select>
                                        </div>
                                    </div>
                    
                                    <div class="row">
                                        <div class="col">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <table id="cuposyentradas" class="table table-striped table-bordered nowrap" style="width:100%">
                                                <thead></thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col">
                                            <button class="btn btn-primary float-right">
                                                Actualitzar
                                            </button>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>        
                    
                    
                            <div class="card">
                                <div class="card-header">
                                    <h4>CUPO PER DEPARTAMENT </h4>
                                    <hr>
                    
                                    <div class="row mb-3">
                                        <div class="col-4">
                    
                                            <h6>SELECCIÓ DE MODALITAT</h6>
                                            <select name="myCupoType" onchange="seleccionModalidadCupo()"  class="form-control" id="myCupoType">
                                                <option value="1">Cupo genéric</option>
                                                <option value="2">Cupo per departament i zona</option>                            
                                            </select>
                            
                                        </div>
                                    </div>
                    
                                    <div class="row mb-3">
                                        <div class="col-4">
                    
                                            <h6>ÁREA</h6>
                                            <select name="myArea" onchange="filterDepartmentZones()" class="form-control" id="myArea">
                                            </select>
                                        </div>
                    
                                        <div class="col-4" id="mySector2Div">
                                            <h6>SECTOR</h6>
                                            <select name="mySector2"  onchange="filterDepartmentZones()" class="form-control" id="mySector2">
                                            </select>
                                        </div>                    
                                    </div>
                    
                    
                    
                                    
                                    <div class="row" id="testTablaCuposGenerico">
                                        <div class="col">
                                            <table id="cuposdepartamentosgenerico" class="table table-striped table-bordered nowrap" style="width:100%">
                                                <thead>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                    
                                         
                                    <div class="row" id="testTablaCupos" >
                                        <div class="col">
                                            <table id="cuposdepartamentos" class="table table-striped table-bordered nowrap" style="width:100%">
                                                <thead></thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>          
                                    
                                    {{-- <div class="row">
                                        <div class="col">
                                            <button class="btn btn-primary float-right">
                                                Actualitzar
                                            </button>
                                        </div>
                                    </div> --}}
                    
                                </div>
                         
                            </div>        
                    
                            <div class="card">
                                <div class="card-header">
                                    <h4>PLANTILLA </h4>
                                 
                                </div>
                    
                                <div class="card-body">
                    
                                    <!-- selector idioma -->
                                    <div class="row">
                                        <div class="col-5">
                                            <label for="myIdiomaPlantilla">Idioma de les plantilles</label>
                                            <select name="myIdiomaPlantilla" class="form-control" id="myIdiomaPlantilla" onchange="cambioSelectIdiomas()">
                                                    <option value="1">Castellà</option>
                                                    <option value="2">Català</option>
                                            </select>
                                        </div>
                                    </div>
                                        <hr>
                                    <!-- selector por cada tipo de invitacion -->
                    
                                    <div class="row">
                                        <div class="col-4">
                                        <label for="myPlantillaInvitacion">Plantilles d'invitació</label>
                                            <select name="myPlantillaInvitacion" class="form-control" id="myPlantillaInvitacion" onchange="myPlantillaInvitacionChange()">
                                                    <option value="0">Sense plantilla</option>  
                                            </select>
                                            <hr>
                                            <div class="text-center">
                                                <button class="btn btn-primary" onclick="showTemplateEditor(1)">Editar plantilla</button>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="myPlantillaCompra">Plantilles compra</label>
                                            <select name="myPlantillaCompra" class="form-control" id="myPlantillaCompra" onchange="myPlantillaCompraChange()">
                                                    <option value="0">Sense plantilla</option>
                                            </select>
                                            <hr>
                                            <div class="text-center">
                                                <button class="btn btn-primary"  onclick="showTemplateEditor(2)">Editar plantilla</button>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="myPlantillaPases">Plantilles passis</label>
                                            <select name="myPlantillaPases" class="form-control" id="myPlantillaPases" onchange="myPlantillaPasesChange()">
                                                    <option value="0">Sense plantilla</option>
                                            </select>
                                            <hr>
                                            <div class="text-center">
                                                <button class="btn btn-primary"  onclick="showTemplateEditor(3)">Editar plantilla</button>
                                            </div>
                                        </div>                                        
                                    </div>
                    
                                </div>
                            </div>        
                    
                    
                            <div class="card d-none">
                                <div class="card-header">
                                    <h4>GESTIÓ USUARIS </h4>
                                 
                                </div>
                    
                                <div class="card-body">
                    
                                    <hr>
                                    <div class="row">
                                        <div class="col-3">
                                            <button type="button" class="btn btn-primary waves-effect m-b-10 float-left mt-3">Peticionaris</button>                                                            
                                        </div>
                    
                                        <div class="col-3">
                                            <button type="button" class="btn btn-primary waves-effect m-b-10 float-left mt-3">Autoritzadors</button>                                                            
                                        </div>
                    
                                    </div>
                              
                                </div>
                            </div>        
                    
                            <div class="card">
                                <div class="card-header">
                                    
                                    {{-- <button type="button" onclick="window.location.href='/events/show'" class="btn btn-primary waves-effect m-b-10 float-left">Tornar al llistat</button>                                                             --}}
                                    <button type="button" onclick="actualizarEvento()" class="btn btn-success waves-effect m-b-10 float-right">Actualitzar esdeveniment</button>                                                            
                                </div>
                            </div>        
                    
                        </div>
                        </div>                            

                         {{-- fin modal body --}}
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
    <!-- Custom modal end -->    