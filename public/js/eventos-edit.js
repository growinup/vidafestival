var listadoPlantillasParaEvento = new Map()
var listadoCompletoPlantillasMap = new Map()
var editadaYGrabadaEnSesion = false


// mostrar ventana modal de edicion del evento

function editEventShowModal() {

    try {
        startPreloader()

        // el evento actual se encuentra en myEventData

        if (emailTemplateEditorEditEventInitialized == 0) {
            // init editor de plantillas
            let EDITOREDICIONEVENTOS = CKEDITOR.replace('myeditor', {
                filebrowserUploadUrl: '/ckeditor/image_upload?type=Images&_token=' + myCSRFToken,
                filebrowserUploadMethod: 'form',
                // filebrowserImageBrowseUrl : '/uploads/',
                height: 500
            });

            CKEDITOR.config.language = APPCESS_APP_LANG;
            CKEDITOR.config.removePlugins = 'about';
            emailTemplateEditorEditEventInitialized = 1;
        }


        // valores para los selects de ubicacion, actividad y tipo evento
        myUbicacionValue = myEventData.ubicacion_id;
        myActivityValue = myEventData.activity_id;
        myTypeValue = myEventData.type_id;

        // checkbox de si la fecha esta confirmada o no
        myFechaNoConfirmadaValue = myEventData.not_confirmed_date;

        // que nivel de autorizacion tiene este evento
        nivelAutorizacion = myEventData.level;

        // modalidad del evento, cupo generico o cupo por departamento y zona
        modalidadCupo = myEventData.tipo_cupo;

        // crear la lista de ubicaciones, actividades y tipos de actividad o evento
        crearListaLocationsEdicionEventos()
        crearListaActividadesEdicionEventos()
        crearListaTiposActividadEdicionEventos()

        // evento para el click en fecha confirmada para activar desactivar el checkbox
        $('#myFechaNoConfirmadaEdicionEvento').on("click", function () {

            if ($('#myFechaNoConfirmadaEdicionEvento').is(":checked")) {
                $('#myFechaEventoEdicionEvento').prop("disabled", true);
            } else {
                $('#myFechaEventoEdicionEvento').prop("disabled", false);
            }

        });



        // asigna al select el tipo de nivel de autorizacion 0, 1, 2
        $("#myNivellCmbEdicionEvento").val(nivelAutorizacion);

        // guardamos el id del sector
        mySectorEntradasyCupos = $('#mySector').val();

        // inicializamos editor para hacer ediciones inline
        let editor1;

        editor1 = new $.fn.dataTable.Editor({
            table: "#cuposyentradas",
            idSrc: 'id',
            fields: [
                { name: "nombre" },

                {
                    name: "cupo",
                    attr: {
                        type: 'number'
                    }
                },
                {
                    name: "price",
                    attr: {
                        type: 'number'
                    }
                },
            ]
        });

        // Activate an inline edit on click of a table cell
        $('#cuposyentradas').on('click', 'tbody td:not(:first-child)', function (e) {
            editor1.inline(this);
        });

        // evento para controlar que se haya introducido un valor valido para cupo y precio
        editor1.on('preSubmit', function (e, o, action) {

            let validarCupo = this.field('cupo');
            let validarPrecio = this.field('price');


            let myNumber = validarCupo.val();
            let myPrice = validarPrecio.val();


            if (isNaN(myNumber) || (myNumber.length == 0)) {
                validarCupo.error('El número no es correcte');
            }

            if (isNaN(myPrice) || (myPrice.length == 0)) {
                validarPrecio.error('El número no es correcte');
            }

            if (this.inError()) {
                return false;
            }
        });

        // inicializacion de la tabla de cupos y entradas
        cuposYEntradasTable = $('#cuposyentradas').DataTable({
            "scrollX": true,
            "ajax": {
                "url": "/eventzone/" + myEventData.id,
                "type": "GET",
                "datatype": "json"
            },

            columns: [
                { data: "id", visible: false },
                { data: "sector_id", visible: false },
                { data: "nombre", "title": MODAL__EDICION_EVENTO__TABLA__ENTRADAS_Y_CUPOS__HEADERS.nombre },
                { data: "cupo", "title": MODAL__EDICION_EVENTO__TABLA__ENTRADAS_Y_CUPOS__HEADERS.cupo, "width": "10%" },
                {
                    data: "price", visible: false, "title": MODAL__EDICION_EVENTO__TABLA__ENTRADAS_Y_CUPOS__HEADERS.precio, "width": "10%",

                    render: $.fn.dataTable.render.number(',', '.', 0, '', ' €')
                },
            ],

            "language": tablesLang

        });


        // tabla cupo generico por departamento

        let editor2;

        editor2 = new $.fn.dataTable.Editor({
            table: "#cuposdepartamentosgenerico",
            idSrc: 'id',
            fields: [
                { name: "nombre" },

                {
                    name: "cupo",
                    attr: {
                        type: 'number'
                    }
                },

            ]
        });

        // Activate an inline edit on click of a table cell
        $('#cuposdepartamentosgenerico').on('click', 'tbody td:not(:first-child)', function (e) {
            editor2.inline(this);
        });

        editor2.on('preSubmit', function (e, o, action) {

            let validarCupo = this.field('cupo');
            let myNumber = validarCupo.val();

            if (isNaN(myNumber) || (myNumber.length == 0)) {
                validarCupo.error('El número no es correcte');
            }

            if (this.inError()) {
                return false;
            }
        });
        // inicializacion tabla cupos departamento generico
        myTableCuposDepartamentoGenerico = $('#cuposdepartamentosgenerico').DataTable({
            "scrollX": true,
            "ajax": {
                "url": "/eventdepartmentgeneric/" + myEventData.id,
                "type": "GET",
                "datatype": "json"
            },

            columns: [
                { data: "id", visible: false },
                { data: "area_id", visible: false },
                { data: "nombreDepartamento", "title": MODAL__EDICION_EVENTO__TABLA__CUPO_DEPARTAMENTO_GENERICO__HEADERS.departamento },
                { data: "cupo", "title": MODAL__EDICION_EVENTO__TABLA__CUPO_DEPARTAMENTO_GENERICO__HEADERS.cupo, "width": "10%" },

            ],

            "language": tablesLang

        });


        // crear lista de sectores
        crearListaSectores();

        // crear lista de setors cupos por departamento
        crearListaSectoresCuposDepartamento();

        // crear la lista de areas
        crearListaAreas();

        // inicializar cupos por zona y departamento
        initCupoZoneDepartment();

        // crear lista idiomas 
        crearListaIdiomas();

        // traer las plantillas del evento
        getEventTemplates();

        // cargar valores del evento seleccionado para las select de ubicacion y actividad
        setTimeout(function () {

            $('#myUbicacionEdicionEvento').val(myUbicacionValue);
            $('#myActivityEdicionEvento').val(myActivityValue);

            selectActividadChangeEdicionEventos(myActivityValue)

        }, 3000);

        // cargar valor para el select de tipo de evento
        setTimeout(function () {
            $('#myTypeEdicionEvento').val(myTypeValue);
            $('#myNombreEventoEdicionEvento').val(myEventData.nombre)

            $('#myFechaEventoEdicionEvento').val(moment(myEventData.fecha).format('DD/MM/YYYY'))
            $('#myHoraEventoEdicionEvento').val(moment(myEventData.hora, 'HH:mm:ss').format('HH:mm'))

            $('#myJornadaEventoEdicionEvento').val(myEventData.jornada)
            $("#myNivellCmbEdicionEvento").val(nivelAutorizacion);

            $("#myCupoType").val(myEventData.tipo_cupo);
            seleccionModalidadCupo()


            selectTipoActividadChangeEdicionEventos()
        }, 5000);

        // si fecha esta no confirmada, no dejar usar el campo de fecha del evento
        let activeCheckboxFechaNoConfirmada;

        if (myFechaNoConfirmadaValue == 0) {
            activeCheckboxFechaNoConfirmada = false
        } else {
            activeCheckboxFechaNoConfirmada = true;
        }
        $('myFechaNoConfirmadaEdicionEvento').attr('checked', activeCheckboxFechaNoConfirmada);

        if ($('myFechaNoConfirmadaEdicionEvento').is(":checked")) {
            $('#myFechaEventoEdicionEvento').prop("disabled", true);
        } else {
            $('#myFechaEventoEdicionEvento').prop("disabled", false);
        }
        // ajustes para mostrar tablas en funcion de la modalidad de cupo, generico o departamento y zona
        seleccionModalidadCupo();

        // formatemos el campo de fecha evento
        $('#myFechaEventoEdicionEvento').mask('99/99/9999');
        $('#myHoraEventoEdicionEvento').mask('99:99');

        // reajustamos tablas cuando cargamos el modal
        $(document).on('show.bs.modal', '#myEditEventModal', function () {
            $('#cuposyentradas').DataTable().ajax.reload();
            $('#cuposdepartamentosgenerico').DataTable().ajax.reload();
        })

        // mostramos el modal de edicion de evento
        setTimeout(() => {
            $('#myEditEventModal').modal('show');
            stopPreloader()
        }, 3000);

    } catch (error) {

    } finally {

    }

}

// cierre de la ventana modal de edicion de evento

function closeAllEditEventModals() {
    $('#myCreateEventModal').modal('hide');
    $('#myEditEventModal').modal('hide');
    $('#myModalTemplateEditor').modal('hide');
}

// funcion para crear la lista de ubicaciones
function crearListaLocationsEdicionEventos() {

    axios.get('/getLocationsall')
        .then(response => {

            if (response.data.success) {


                $("#myUbicacionEdicionEvento").find('option')
                    .remove()
                    .end();

                response.data.data.forEach(location => {

                    $('<option>', {
                        value: location.id,
                        text: location.nombre,
                    }).appendTo('#myUbicacionEdicionEvento');


                });
                myLocationSelectChangeEdicionEventos()
            } else {

            }

        })
        .catch(function (error) {

        });

}


// funcion para crear la lista de actividades
function crearListaActividadesEdicionEventos(locationId) {


    axios.get('/getActividadsall')
        .then(response => {

            if (response.data.success) {


                $("#myActivityEdicionEvento").find('option')
                    .remove()
                    .end();

                response.data.data.forEach(actividad => {

                    if (actividad.location_id == locationId) {

                        $('<option>', {
                            value: actividad.id,
                            text: actividad.name,
                        }).appendTo('#myActivityEdicionEvento');

                    }

                });

            } else {

            }

        })
        .catch(function (error) {

        });

}

// funcion para crear la lista de tipos de actividad o tipos de evento
function crearListaTiposActividadEdicionEventos(myactivityId) {

    axios.get('/getTipoActividadsall')
        .then(response => {

            if (response.data.success) {

                $("#myTypeEdicionEvento").find('option')
                    .remove()
                    .end();

                // $('<option>', {
                //     value: 0,
                //     text:  'Tots',
                // }).appendTo('#myTypeEdicionEvento');    

                response.data.data.forEach(activitytype => {



                    if (activitytype.activity_id == myactivityId) {

                        $('<option>', {
                            value: activitytype.id,
                            text: activitytype.name,
                        }).appendTo('#myTypeEdicionEvento');

                    }

                });

            } else {

            }

        })
        .catch(function (error) {

        });

}

// funcion para gestionar el cambio de select de ubicacion
function myLocationSelectChangeEdicionEventos() {
    let myLocationToFilter = $("#myUbicacionEdicionEvento").val()
    crearListaActividadesEdicionEventos(myLocationToFilter)
}


// grabar la plantilla seleccionada
function saveSelectedTemplate() {

    let content = CKEDITOR.instances['myeditor'].getData();
    let asuntomail = $('#templatesubject').val();

    // let pos = listadoCompletoPlantillas.map(function (e) { return e.id; }).indexOf(plantillaEdicion.id);
    // listadoCompletoPlantillas[pos].content = content;
    // listadoCompletoPlantillas[pos].subject = asuntomail;

    editadaYGrabadaEnSesion = true

    listadoPlantillasParaEvento.forEach(function (valor, clave, listadoPlantillasParaEvento) {

        valor.forEach(function (valorObjetoPlantilla, clave, valor) {

            if (valorObjetoPlantilla.id == plantillaEdicion.id) {
                valorObjetoPlantilla.content = content;
                valorObjetoPlantilla.subject = asuntomail;
            }

        })

    })

    closeAllModals()

}

function resetPlantillaOriginal() {

    let pos = listadoCompletoPlantillas.map(function (e) { return e.id; }).indexOf(plantillaEdicion.id);

    let myEventSubjectOriginal = listadoCompletoPlantillas[pos].subject;
    let myEventTemplateOriginal = listadoCompletoPlantillas[pos].content;

    $('#templatesubject').val(myEventSubjectOriginal);
    CKEDITOR.instances['myeditor'].setData(myEventTemplateOriginal);

}

// mostrar el editor de plantillas
function showTemplateEditor(templateType) {

    // preguntar si queremos cargar el contenido Custom o el contenido de Catalogo

    let tipoTemplateToEdit = 2;

    let myEventTemplateCustom;
    let myEventSubjectCustom;
    let hasCustomTemplate = false;



    if (templateType == 1) {
        myEventTemplateCustom = $('#myEditarEventoPlantillaSelect').val()
    }


    axios.get('/geteventtemplatebyid/' + myEventData.id + '/' + myEventTemplateCustom)
        .then(response => {
            if (response.data.success) {

                myEventTemplateCustom = response.data.template[0]['content'];
                myEventSubjectCustom = response.data.template[0]['subject'];

                hasCustomTemplate = true;

            } else {

            }

        })
        .catch(function (error) {

        });


    setTimeout(function () {

        // traer plantilla seleccionada

        if (templateType == 1) {

            let myValueSelected = $('#myEditarEventoPlantillaSelect').prop('selectedIndex');

            let myLanguageSelected = $('#myIdiomaPlantillaEdicionEvento').val();

            if (myValueSelected > 0) {

                let myValueSelected = ($('#myEditarEventoPlantillaSelect').val());

                let myContent = listadoCompletoPlantillas.find(element => element.id == myValueSelected)
                plantillaEdicion = myContent;

                if ((tipoTemplateToEdit == 1) || (!hasCustomTemplate)) {
                    $('#templatesubject').val(myContent.subject);
                    CKEDITOR.instances['myeditor'].setData(myContent.content);
                } else {
                    $('#templatesubject').val(myEventSubjectCustom);
                    CKEDITOR.instances['myeditor'].setData(myEventTemplateCustom);

                    // if (!editadaYGrabadaEnSesion) {

                    // } 
                    // else {

                    //    listadoPlantillasParaEvento.forEach(function(valor, clave, listadoPlantillasParaEvento) {

                    //         valor.forEach(function(valorObjetoPlantilla, clave, valor) {

                    //             if (valorObjetoPlantilla.id == plantillaEdicion.id) {
                    //                 console.log ('panti',valorObjetoPlantilla)

                    //                 $('#templatesubject').val( valorObjetoPlantilla.subject);
                    //                 CKEDITOR.instances['myeditor'].setData(valorObjetoPlantilla.content);

                    //             }

                    //         })

                    //     })



                    // }



                }



                editadaYGrabadaEnSesion = false
                $('#myModalTemplateEditor').modal('show');
            }

        }

    }, 900)

}

// cerrar todas las ventanas modales de edicion de evento
function closeAllModals() {
    $('#myModalTemplateEditor').modal('hide');
}

// filtrar las zonas en funcion del sector seleccionado
function filterZoneSector() {

    // filtrado tabla por departamento
    let table = $('#cuposyentradas').DataTable();
    let mySectorValue = $('#mySector').val();

    let filteredData = table
        .column(1)
        .search("^" + mySectorValue + "$", true, false, true)
        .draw();

}

// filstrar departamentos 
function filterDepartmentZones() {

    if (modalidadCupo == 2) {
        try {

            // filtrado tabla por departamento
            let table = $('#cuposdepartamentos').DataTable();
            let myAreaValue = $('#myArea').val();
            console.log ('area id' , myAreaValue)

            let filteredData = table
                .column(1)
                .search("^" + myAreaValue + "$", true, false, true)
                .draw();


            // filtrado columnas zonas de cada sector    

            let mySectorValue = $('#mySector2').val();

            for (let i = 0; i < zoneBySector.length; i++) {
                let column = myTableCuposZonas.column(3 + i);

                if (zoneBySector[i].sectorId == mySectorValue) {
                    column.visible(true);
                } else {
                    column.visible(false);
                }
            }
        } catch (error) {

        }
    } else {
        // filtrado tabla por departamento
        let table = $('#cuposdepartamentosgenerico').DataTable();
        let myAreaValue = $('#myArea').val();

        let filteredData = table
            .column(1)
            .search("^" + myAreaValue + "$", true, false, true)
            .draw();
    }

}

// inicializar cupos por departamento y zona
function initCupoZoneDepartment() {

    axios.get('/eventdepartmentzone/' + myEventData.id)
        .then(response => {
            if (response.data) {
                console.log ('data evento' , response.data)
                // cupos departamentos

                arr = []
                let len = response.data.data.length;
                myZonas = response.data.zones;
                myDepartments = response.data.departments;

                let myRow = {};
                let myElement = {};
                let myCountDept = 1;
                let myCountZone = 1;
                let zonaName = '';

                let myId = 1;

                let initZones = 1;

                response.data.data.forEach(function (element) {
                    console.log ('registro')
                    if (initZones <= myZonas) {
                        zoneList.push(element.nombreZona);

                        zoneBySector.push({
                            sectorId: element.sector_id,

                        });
                    }

                    myElement = {};
                    myElement.id = element.id;
                    myElement.area_id = element.area_id;
                    myElement.sector_id = element.sector_id;
                    myElement.cupo = element.cupo;
                    myElement.nombreZona = element.nombreZona;
                    myElement.nombreDepartamento = element.nombreDepartamento;


                    zonaName = 'zona' + myCountZone;
                    myRow[zonaName] = myElement;

                    if (myCountZone == myZonas) {

                        myRow['myId'] = myId;
                        myRow['departamentoId'] = element.department_id;
                        myRow['areaId'] = element.area_id;
                        arr.push(myRow);

                        myRow = {};
                        myCountZone = 0;
                        myId++;
                    }

                    myCountZone++;
                    initZones++;

                }

                );


                let arrayColumns = [];

                arrayColumns.push({ data: "zona1.id", visible: false }, );
                arrayColumns.push({ data: "zona1.area_id", visible: false }, );

                arrayColumns.push({
                    data: 'zona1.nombreDepartamento', title: MODAL__EDICION_EVENTO__TABLA__CUPO_DEPARTAMENTO_ZONA__HEADERS.departamento
                });

                for (let i = 1; i <= myZonas; i++) {

                    arrayColumns.push({
                        title: zoneList[i - 1],
                        data: 'zona' + i + '.cupo'
                    });

                }

                let myColumns = arrayColumns;

                console.log ('columns' , myColumns)
                console.log ('zonex',myZonas)
                console.log ('arr',arr)

                let camposEdicion = [];

                for (let i = 1; i <= myZonas; i++) {
                    camposEdicion.push(
                        {
                            name: 'zona' + i + '.cupo'
                        }
                    );
                }


                let editor;

                editor = new $.fn.dataTable.Editor({
                    table: "#cuposdepartamentos",
                    idSrc: 'myId',
                    fields: camposEdicion
                });

                // Activate an inline edit on click of a table cell
                $('#cuposdepartamentos').on('click', 'tbody td:not(:first-child)', function (e) {
                    editor.inline(this);
                });

                myTableCuposZonas = $('#cuposdepartamentos').DataTable({

                    data: arr,
                    columns: myColumns,

                    scrollX: true,

                    language: tablesLang

                });

                filterDepartmentZones();

                $('#myCupoType').val(initModalidadCupo);
                seleccionModalidadCupo();
            } else {

            }

        })
        .catch(function (error) {

        });
}

// funcion que se ejecuta cuando hay un cambio en el sector, filtra zonas
function sectorEntradasyCuposChange() {
    filterZoneSector();
}

// seleccion de la modalidad de cupos
function seleccionModalidadCupo() {

    modalidadCupo = $('#myCupoType').val();

    if (modalidadCupo == 2) {
        $('#mySector2Div').removeClass("d-none");
        $('#testTablaCupos').removeClass("d-none");
        $('#testTablaCuposGenerico').addClass("d-none");
    } else {
        $('#mySector2Div').addClass("d-none");
        $('#testTablaCupos').addClass("d-none");
        $('#testTablaCuposGenerico').removeClass("d-none");
    }
     filterDepartmentZones();
}

// funcion para crear la lista de sectores para la pantalla de edicion de evento
function crearListaSectores() {

    axios.get('/sectors')

        .then(response => {
            if (response.data.success) {

                // creando select

                response.data.data.forEach(sector => {
                    $('<option>', {
                        value: sector.id,
                        text: sector.nombre,
                    }).appendTo('#mySector');
                });

                sectorEntradasyCuposChange();

            } else {

            }

        })
        .catch(function (error) {

        });

}

// funcion para crear la lista de sectores para cupos por departamento
function crearListaSectoresCuposDepartamento() {

    axios.get('/sectors')
        .then(response => {
            if (response.data.success) {

                // creando select
                response.data.data.forEach(sector => {
                    $('<option>', {
                        value: sector.id,
                        text: sector.nombre,
                    }).appendTo('#mySector2');
                });

            } else {

            }

        })
        .catch(function (error) {

        });

}

// crear lista de areas
function crearListaAreas() {

    axios.get('/areas')
        .then(response => {

            if (response.data.success) {

                response.data.data.forEach(area => {
                    $('<option>', {
                        value: area.id,
                        text: area.nombre,
                    }).appendTo('#myArea');
                });

            } else {

            }

        })
        .catch(function (error) {

        });

}

// crear lista idiomas
function crearListaIdiomas() {

    listadoPlantillasParaEvento.clear()

    axios.get('/getlanguages')

        .then(response => {
            if (response.data) {

                $("#myIdiomaPlantillaEdicionEvento").find('option')
                    .remove()
                    .end();

                response.data.languages.forEach(language => {
                    $('<option>', {
                        value: language.id,
                        text: language.name,
                    }).appendTo('#myIdiomaPlantillaEdicionEvento');

                    listaIdiomas.push(language.id);
                    listaIdiomasNames.push(language.name);


                    listadoPlantillasParaEvento.set(Number(language.id), new Map())
                });

                // inicializar mapa con los 3 tipos de invitacion por defecto, para cada idioma
                listaIdiomas.forEach(idioma => {
                    let idiomatmp = listadoPlantillasParaEvento.get(idioma)
                    idiomatmp.set(1, { porDefecto: true, referencia: 'ref1' })
                    idiomatmp.set(2, { porDefecto: true, referencia: 'ref2' })
                    idiomatmp.set(3, { porDefecto: true, referencia: 'ref3' })
                });

                // montar lista de objetos

                listaIdiomas.forEach(lang => {
                    let myRow = []
                    for (let index = 1; index <= 3; index++) {
                        plantillaObj = {}
                        plantillaObj.value = 0
                        myRow.push(plantillaObj);
                    }
                    listadoPlantillas.push(myRow);
                });

                crearGaleriaTemplates();


            } else {

            }

        })
        .catch(function (error) {

        });

}

// en funcion del idioma, crear selects de plantillas
function cambioSelectIdiomas() {
    let myLanguageSelected = $('#myIdiomaPlantillaEdicionEvento').val();

    crearSelectPlantillas()
}


// funcion para el cambio del tipo de actividad, en funcion del tipo de actividad crea galeria de plantillas
function selectTipoActividadChangeEdicionEventos() {

    crearGaleriaTemplates();
}

// funcion para el cambio de seleccion de actividad
function selectActividadChangeEdicionEventos() {

    let myActivityToFilter = $("#myActivityEdicionEvento").val()
    crearListaTiposActividadEdicionEventos(myActivityToFilter)

    crearGaleriaTemplates();
}

// funcion para el cambio del select de plantilla de invitacion
function myEditarEventoTipoInvitacionChange() {

    let myLanguageSelected = $('#myIdiomaPlantillaEdicionEvento').prop('selectedIndex');
    let myValueSelected = $('#myPlantillaInvitacion').prop('selectedIndex');
    let myTemplateIdSelected = $('#myPlantillaInvitacion').val();

    listadoPlantillas[myLanguageSelected][0].value = myValueSelected;
    listadoPlantillas[myLanguageSelected][0].templateId = myTemplateIdSelected;

    crearSelectPlantillas()

}

// funcion para el cambio del select de plantilla de compra
function myPlantillaCompraChange() {

    let myLanguageSelected = $('#myIdiomaPlantillaEdicionEvento').prop('selectedIndex');
    let myValueSelected = $('#myPlantillaCompra').prop('selectedIndex');
    let myTemplateIdSelected = $('#myPlantillaCompra').val();

    listadoPlantillas[myLanguageSelected][1].value = myValueSelected;
    listadoPlantillas[myLanguageSelected][1].templateId = myTemplateIdSelected;

}

// funcion para el cambio del select de plantilla de pases
function myPlantillaPasesChange() {

    let myLanguageSelected = $('#myIdiomaPlantillaEdicionEvento').prop('selectedIndex');
    let myValueSelected = $('#myPlantillaPases').prop('selectedIndex');
    let myTemplateIdSelected = $('#myPlantillaPases').val();

    listadoPlantillas[myLanguageSelected][2].value = myValueSelected;
    listadoPlantillas[myLanguageSelected][2].templateId = myTemplateIdSelected;
}

// funcion para recuperar todas las plantillas del evento seleccionado
function getEventTemplates() {

    // ejemplo plantillas     
    myArrayTemplates =
        [
            {
                languageID: 1,
                plantillas:
                    [
                        {
                            tipoinvitacion: 'invitracion',
                            plantillaid: 90,
                            contenido: 'test'
                        },
                        {
                            tipoinvitacion: 'compra',
                            plantillaid: 91,
                            contenido: 'test2'
                        },
                        {
                            tipoinvitacion: 'pase',
                            plantillaid: 92,
                            contenido: 'test3'
                        }
                    ]

            }
        ]


    axios.get('/geteventtemplatesall/' + myEventData.id)

        .then(response => {
            if (response.data) {


                // coger plantillas evento
                response.data.templates.forEach(function (plantillaEvento) {

                    var myInitPlantillaLanguageId = plantillaEvento.language_id

                    var myInitPlantillaInvitationTypeId = plantillaEvento.invitation_type_id

                    var myInitTemplateForEvent = listadoPlantillasParaEvento.get(Number(myInitPlantillaLanguageId))



                    var myStringToAddTemplatesList = listaIdiomasNames[myInitPlantillaLanguageId - 1] + ' > ' + listaTiposInvitacionNames[myInitPlantillaInvitationTypeId - 1] + ' > ' + plantillaEvento.name + '<br>'

                    myInitTemplateForEvent.set(Number(myInitPlantillaInvitationTypeId), plantillaEvento, plantillaEvento.default = true, plantillaEvento.referencia = myStringToAddTemplatesList)


                });


            } else { }

        })
        .catch(function (error) {

        });
}

// funcion para crear la galeria de plantillas
function crearGaleriaTemplates() {

    // crea galeria de tempaltes en funcion de la actividad y el tipo de actividad.
    let myActivityId = $('#myActivityEdicionEvento').val();
    let myActivityTypeId = $('#myTypeEdicionEvento').val();

    axios.get('/gettemplates/' + myActivityId + '/' + myActivityTypeId)

        .then(response => {
            if (response.data) {

                listadoCompletoPlantillas = [];
                listadoCompletoPlantillasMap.clear()

                // creando  invitacion

                response.data.plantillasinvitacion.forEach(plantillainvitacion => {

                    detallePlantilla = {};

                    detallePlantilla.id = plantillainvitacion.id;
                    detallePlantilla.language_id = plantillainvitacion.language_id;
                    detallePlantilla.name = plantillainvitacion.name;

                    detallePlantilla.content = plantillainvitacion.content;
                    detallePlantilla.subject = plantillainvitacion.subject;

                    detallePlantilla.invitation_type_id = 1;

                    listadoCompletoPlantillas.push(detallePlantilla);

                });

                // creando  compra

                response.data.plantillascompra.forEach(plantillacompra => {

                    detallePlantilla = {};

                    detallePlantilla.id = plantillacompra.id;
                    detallePlantilla.language_id = plantillacompra.language_id;
                    detallePlantilla.name = plantillacompra.name;

                    detallePlantilla.content = plantillacompra.content;
                    detallePlantilla.subject = plantillacompra.subject;
                    detallePlantilla.invitation_type_id = 2;

                    listadoCompletoPlantillas.push(detallePlantilla);

                });

                // creando  pases

                response.data.plantillaspases.forEach(plantillapases => {

                    detallePlantilla = {};

                    detallePlantilla.id = plantillapases.id;
                    detallePlantilla.language_id = plantillapases.language_id;
                    detallePlantilla.name = plantillapases.name;

                    detallePlantilla.content = plantillapases.content;
                    detallePlantilla.subject = plantillapases.subject;
                    detallePlantilla.invitation_type_id = 3;

                    listadoCompletoPlantillas.push(detallePlantilla);

                });


                // crear map con todas las plantillas

                listadoCompletoPlantillas.forEach(plantilla => {
                    listadoCompletoPlantillasMap.set(Number(plantilla.id), plantilla)
                });

                crearSelectPlantillas();
            } else {

            }

        })
        .catch(function (error) {

        });

}

// funcion para crear selects de plantillas
function crearSelectPlantillas() {

    let myLanguageSelected = listaIdiomas[$('#myIdiomaPlantillaEdicionEvento').prop('selectedIndex')];
    let myInvitationTypeSelect = $('#myEditarEventoTipoInvitacionSelectPlantilla').val();

    // creando select seleccion plantillas

    $("#myEditarEventoPlantillaSelect").find('option')
        .remove()
        .end();

    $('<option>', {
        value: 0,
        text: MODAL__EDITAR_EVENTO__PLANTILLAS_SELECT_PLANTILLAS_DISPONIBLES__LISTA.sin_plantilla,
    }).appendTo('#myEditarEventoPlantillaSelect');


    // filtrar plantillas  del tipo seleccionado

    let myInvitacionTemplates = listadoCompletoPlantillas.filter(function (plantilla) {
        if (plantilla.invitation_type_id == myInvitationTypeSelect && plantilla.language_id == myLanguageSelected) {
            return true;
        } else {
            return false;
        }
    });


    // una vez filtradas las del tipo de invitacion y del idioma, montar el select

    myInvitacionTemplates.forEach(plantillainvitacion => {

        $('<option>', {
            value: plantillainvitacion.id,
            text: plantillainvitacion.name,
        }).appendTo('#myEditarEventoPlantillaSelect');

    });

    // actualizar plantilla actual de cada idioma y tipo de invitacion

    // update de si hay alguna plantilla asignada a esa posición

    updateSelectedTemplate()

}

// busca en el mapa de plantillas del evento si hay alguna para asignar al select de plantilla
function updateSelectedTemplate() {

    // seleccionamos el valor del idioma 
    var plantillaSeleccionadaIdiomaID = $('#myIdiomaPlantillaEdicionEvento').val()

    // seleccionamos el valor del tipo de invitacion
    var plantillaSeleccionadaTipoInvitacion = $('#myEditarEventoTipoInvitacionSelectPlantilla').val()

    // seleccionamos el objeto del tipo de plantilla
    var plantillaParaAsignarIdiomaTmp = listadoPlantillasParaEvento.get(Number(plantillaSeleccionadaIdiomaID))

    var plantillaPosicion = plantillaParaAsignarIdiomaTmp.get(Number(plantillaSeleccionadaTipoInvitacion))

    if (plantillaPosicion.id) {
        $('#myEditarEventoPlantillaSelect').val(plantillaPosicion.id)
    } else {
        $('#myEditarEventoPlantillaSelect').val(0)
    }

    //$('#plantillasEventoActual').html('')
    refreshTemplateInfoPanel()

}

// funcion para actualizar el panel de plantillas para el usuario
function refreshTemplateInfoPanel() {

    $('#plantillasEventoActual').html('')


    listadoPlantillasParaEvento.forEach(function (valor, clave, listadoPlantillasParaEvento) {

        valor.forEach(function (valorObjetoPlantilla, clave, valor) {

            if (valorObjetoPlantilla.id) {

                if (valorObjetoPlantilla.referencia) {
                    var referenceToPrint = valorObjetoPlantilla.referencia;
                    $('#plantillasEventoActual').append(referenceToPrint)
                }

            }

        })

    })

}


// funcion para actualizar el evento
function actualizarEvento() {

    if (($('#myNombreEventoEdicionEvento').val().trim().length) < 1) {
        Swal.fire(
            'Error!',
            MODALE_EVENTOS__MENSAJES__CAMPOS__OBLIGATORIOS.nombre,
            'error'
        )
        return;
    }

    // comfirmar datos

    // evniar peticion de actualización

    let form_data = myTableCuposZonas.rows().data().toArray();
    let form_data_departamentos_generico = myTableCuposDepartamentoGenerico.rows().data().toArray();
    let form_data_cuposyentradas = cuposYEntradasTable.rows().data().toArray();

    let myNombreEventoSave = $('#myNombreEventoEdicionEvento').val();
    let myFechaEventoSave = $('#myFechaEventoEdicionEvento').val();
    let myHoraEventoSave = $('#myHoraEventoEdicionEvento').val();
    let myJornadaEventoSave = $('#myJornadaEventoEdicionEvento').val();

    let myAforoEventoSave = $('#myAforoEvento').val();

    let myUbicacionSave = $('#myUbicacionEdicionEvento').val();
    let myActivitySave = $('#myActivityEdicionEvento').val();
    let myTypeSave = $('#myTypeEdicionEvento').val();
    let myNivellCmbSave = $('#myNivellCmbEdicionEvento').val();

    myFechaNoConfirmadaValue = $('#myFechaNoConfirmadaEdicionEvento').is(":checked");

    let myLanguageSelected = $('#myIdiomaPlantillaEdicionEvento').val();
    let contenidoPlantillas = [];

    let myTemplate = {};



    listadoPlantillasParaEvento.forEach(function (valor, clave, listadoPlantillasParaEvento) {

        valor.forEach(function (valorObjetoPlantilla, clave, valor) {

            if (valorObjetoPlantilla.id) {
                myTemplate = {};

                myTemplate.id = valorObjetoPlantilla.id;
                myTemplate.content = valorObjetoPlantilla.content;
                myTemplate.subject = valorObjetoPlantilla.subject;
                myTemplate.name = valorObjetoPlantilla.name;
                myTemplate.invitation_type_id = valorObjetoPlantilla.invitation_type_id;

                myTemplate.language_id = valorObjetoPlantilla.language_id;

                contenidoPlantillas.push(myTemplate);
            }

        })

    })

    Swal.fire({
        title: MODALE_EVENTOS__DIALOGO__MODIFICAR.modificar_elento__titulo,
        text: MODALE_EVENTOS__DIALOGO__MODIFICAR.modificar_elento__texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#129443',
        cancelButtonColor: '#d33',
        confirmButtonText: MODALE_EVENTOS__DIALOGO__MODIFICAR.modificar_elento__boton__confirmar,
        cancelButtonText: MODALE_EVENTOS__DIALOGO__MODIFICAR.modificar_elento__boton__cancelar
    }).then((result) => {

        if (result.value) {

            try {

                startPreloader()

                axios.post('/events/update', {
                    eventID: myEventData.id,
                    zonas: myZonas,
                    departamentos: myDepartments,

                    nombreevento: myNombreEventoSave,
                    fechanoconfirmada: myFechaNoConfirmadaValue,
                    fechaevento: myFechaEventoSave,
                    horaevento: myHoraEventoSave,
                    jornadaevento: myJornadaEventoSave,
                    aforoevento: myAforoEventoSave,

                    ubicacion: myUbicacionSave,
                    activity: myActivitySave,
                    type: myTypeSave,
                    nivellCmb: myNivellCmbSave,

                    modalidadcupo: modalidadCupo,

                    data: form_data,
                    datadepartamentogenerico: form_data_departamentos_generico,
                    datacuposyentradas: form_data_cuposyentradas,

                    listadoCompletoPlantillas: contenidoPlantillas,
                    // language_id : myLanguageSelected


                })
                    .then(response => {
                        // $(".loader").fadeOut("slow");    
                        stopPreloader()

                        if (response.data.success) {

                            myConfirmMessage = MODALE_EVENTOS__DIALOGO__MODIFICAR.todo_ok_evento__texto;

                            Swal.fire(
                                MODALE_EVENTOS__DIALOGO__MODIFICAR.todo_ok,
                                myConfirmMessage,
                                'success'
                            ).then((value) => {
                                // redireccion a listado eventos
                                // window.location.href = ("<?php echo route('gestorshowevents'); ?> ");

                                closeAllEditEventModals()
                                $('#myEventSelectTablePanel').DataTable().ajax.reload();
                            });

                        } else {
                            Swal.fire(
                                MODALE_EVENTOS__DIALOGO__MODIFICAR.error,
                                MODALE_EVENTOS__DIALOGO__MODIFICAR.ko,
                                'error'
                            )
                        }
                    })
                    .catch(function (error) {
                        console.log(error)
                    });

            } catch (error) {

            } finally {

            }


        }


    }
    )


}




function initCKEditorEditEvent() {
    emailTemplateEditorEditEventInitialized = 1
}

function seleccionPlantillaSegunTipoInvitacionEvento() {


    // coger el id de la plantilla seleccionada 
    var plantillaSeleccionadaID = $('#myEditarEventoPlantillaSelect').val()

    // convertir a numero
    plantillaSeleccionadaID = Number(plantillaSeleccionadaID)

    if (plantillaSeleccionadaID != 0) {

        // seleccionamos plantilla de la lista completa de plantillas
        var myobj = listadoCompletoPlantillasMap.get(plantillaSeleccionadaID)
        plantillaSeleccionadaTmp = { ...myobj }

        // seleccionamos el valor del idioma 
        var plantillaSeleccionadaIdiomaID = $('#myIdiomaPlantillaEdicionEvento').val()

        // seleccionamos el valor del tipo de invitacion
        var plantillaSeleccionadaTipoInvitacion = $('#myEditarEventoTipoInvitacionSelectPlantilla').val()

        // seleccionamos el objeto del tipo de plantilla
        var plantillaParaAsignarIdiomaTmp = listadoPlantillasParaEvento.get(Number(plantillaSeleccionadaIdiomaID))
        // seleccionamos el objeto de la plantilla con el idioma ya seleccionado
        var plantillaParaAsignarTipo = plantillaParaAsignarIdiomaTmp.get(Number(plantillaSeleccionadaTipoInvitacion))

        // referencia para añadir al panel y ver la ruta completa de idioma tipo y nombre plantilla para el usuario 
        myStringToAddTemplatesList = $('#myIdiomaPlantillaEdicionEvento  option:selected').text() + ' > ' + $('#myEditarEventoTipoInvitacionSelectPlantilla option:selected').text() + ' > ' + $('#myEditarEventoPlantillaSelect option:selected').text() + '<br>'

        // asignamos el objeto de la plantilla al map de plantillas del evento listadoPlantillasParaEvento
        plantillaParaAsignarIdiomaTmp.set(Number(plantillaSeleccionadaTipoInvitacion), plantillaSeleccionadaTmp, plantillaSeleccionadaTmp.default = true, plantillaSeleccionadaTmp.referencia = myStringToAddTemplatesList)


    } else {

        // SIN PLANTILLA

        // seleccionamos el valor del idioma 
        var plantillaSeleccionadaIdiomaID = $('#myIdiomaPlantillaEdicionEvento').val()

        // seleccionamos el valor del tipo de invitacion
        var plantillaSeleccionadaTipoInvitacion = $('#myEditarEventoTipoInvitacionSelectPlantilla').val()

        // seleccionamos el objeto del tipo de plantilla
        var plantillaParaAsignarIdiomaTmp = listadoPlantillasParaEvento.get(Number(plantillaSeleccionadaIdiomaID))

        // referencia para añadir al panel y ver la ruta completa de idioma tipo y nombre plantilla para el usuario 
        myStringToAddTemplatesList = ''

        // asignamos el objeto de la plantilla al map de plantillas del evento listadoPlantillasParaEvento
        plantillaParaAsignarIdiomaTmp.set(Number(plantillaSeleccionadaTipoInvitacion), { 'default': true, 'referencia': myStringToAddTemplatesList })


        // $('#plantillasEventoActual').append(plantillaParaAsignarIdiomaTmp.get(Number(plantillaSeleccionadaTipoInvitacion)).referencia);


    }

    //$('#plantillasEventoActual').html('')
    refreshTemplateInfoPanel()

}