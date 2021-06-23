const APPCESS_APP_LANG = "es"

// definicion de idiomas para las tablas datatables
var tablesLang;

if (APPCESS_APP_LANG == "es") {
    tablesLang = {
        "info": "_TOTAL_ Registros",
        "search": "Buscar",
        "paginate": {
            "next": "Siguiente",
            "previous": "Anterior"
        },
        "lengthMenu": 'Ver <select>' +
            '<option value = "10">10</option>' +
            '<option value = "25">25</option>' +
            '<option value = "-1">Todos</option>' +
            '</select> registros',

        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "emptyTable": "No hay datos",
        "infoEmpty": "",
        "infoFiltered": "",
        "zeroRecords": "No hay datos"
    }


}

if (APPCESS_APP_LANG == "ca") {
    tablesLang = {
        "info": "_TOTAL_ Registres",
        "search": "Cercar",
        "paginate": {
            "next": "Següent",
            "previous": "Anterior"
        },
        "lengthMenu": 'Veure <select>' +
            '<option value = "10">10</option>' +
            '<option value = "25">25</option>' +
            '<option value = "-1">Tots</option>' +
            '</select> registres',

        "loadingRecords": "Carregant...",
        "processing": "Processant...",
        "emptyTable": "No hi ha dades",
        "infoEmpty": "",
        "infoFiltered": "",
        "zeroRecords": "No hi ha dades"
    }

}

// estados peticiones para tablas (pastillas informativas en columna de estado)
const ESTADOS_PETICIONES = {
    "pendiente": "Pendiente",
    "en_proceso": "En proceso",
    "modifiicada": "Modificada",
    "cancelada": "Cancelada",
    "autorizada": "Autorizada",
    "pendiente_asignar": "Pendiente asignar",
    "pendiente_envio": "Pendiente envio",
    "enviada": "Enviada",
    "pendiente_doble_auth": "Pendiente doble autorización",
}

// cabeceras tabla dashboard gestor 
const DASHBOARD_GESTOR__TABLA__HEADERS = {
    "estado": "Estado",
    "fecha_peticion": "Fecha Petición",
    "competicion": "Competición",
    "evento": "Evento",
    "fecha_evento": "Fecha",
    "hora_evento": "Hora",
    "cantidad": "Num",
    "precio": "Precio",
    "zona": "Zona",
    "departamento": "Departamento",
    "peticionario": "Peticionario",
    "en_nombre_de": "En nombre de"
}

// cabeceras tabla dashboard autorizador 
const DASHBOARD_AUTORIZADOR__TABLA__HEADERS = {
    "estado": "Estado",
    "fecha_peticion": "Fecha Petición",
    "competicion": "Competición",
    "actividad": "Actividad",
    "evento": "Evento",
    "fecha_evento": "Fecha",
    "hora_evento": "Hora",
    "cantidad": "Num",
    "precio": "Precio",
    "zona": "Zona",
    "departamento": "Departamento",
    "peticionario": "Peticionario",
    "en_nombre_de": "En nombre de"
}


// cabeceras tabla dashboard logistica 
const DASHBOARD_LOGISTICA__TABLA__HEADERS = {
    "estado": "Estado",
    "fecha_peticion": "Fecha Petición",
    "competicion": "Competición",
    "actividad": "Actividad",
    "evento": "Evento",
    "fecha_evento": "Fecha",
    "hora_evento": "Hora",
    "cantidad": "Num",
    "precio": "Precio",
    "zona": "Zona",
    "departamento": "Departamento",
    "peticionario": "Peticionario",
    "en_nombre_de": "En nombre de"
}

const PANEL_UBICACIONES__TABLA__HEADERS = {
    "nombre": "Nombre",
}

const PANEL_ACTIVIDADES__TABLA__HEADERS = {
    "nombre": "Nombre",
}

const PANEL_SECTOR__TABLA__HEADERS = {
    "nombre": "Nombre",
}

const PANEL_ZONAS__TABLA__HEADERS = {
    "nombre": "Nombre",
}

const PANEL_TIPO_ACTIVIDAD__TABLA__HEADERS = {
    "nombre": "Nombre",
}

const PANEL_TIPO_INVITACION__TABLA__HEADERS = {
    "nombre": "Nombre",
}

const PANEL_MOTIVOS__TABLA__HEADERS = {
    "nombre": "Nombre",
}

const PANEL_FINALIDADES__TABLA__HEADERS = {
    "nombre": "Nombre",
}

const PANEL_AREAS__TABLA__HEADERS = {
    "nombre": "Nombre",
}

const PANEL_DEPARTAMENTOS__TABLA__HEADERS = {
    "nombre": "Nombre",
}

const PANEL_ASISTENTES__TABLA__HEADERS = {
    "nombre": "Nombre",
    "apellidos": "Apellidos",
    "dni": "Dni",
    "email": "Email",
    "fecha_nacimiento": "Fecha Nacimiento",
    "nacionalidad": "Nacionalidad",
}

const PANEL_PROHIBIDOS__TABLA__HEADERS = {
    "ejercicio": "Nombre",
    "expediente": "Apellidos",
    "fecha_resolucion": "Dni",
    "delegacion": "Email",
    "identificacion": "Identificación",
    "nombre": "Nombre",
    "fecha_inicio": "Fecha Inicio",
    "fecha_fin": "Fecha Fin",
}

const PANEL_IDIOMAS__TABLA__HEADERS = {
    "nombre": "Nombre",
}

const PANEL_NACIONALIDADES__TABLA__HEADERS = {
    "nombre": "Nombre",
}

const PANEL_PLANTILLAS__TABLA__HEADERS = {
    "nombre": "Nombre",
    "tipo_actividad": "Competición",
    "tipo_actividad_liga": "Liga",
    "tipo_actividad_champions": "Champions",
    "tipo_actividad_no_definido": "No definido",
    "asunto": "Asunto",
}


const PANEL_EVENTOS__TABLA__HEADERS = {
    "id_partido": "Código",
    "nombre": "Nombre",
    "jornada": "Jornada",
    "tipo_actividad": "Competición",
    "tipo_actividad_liga": "Liga",
    "tipo_actividad_champions": "Champions",
    "tipo_actividad_no_definido": "No definido",
    "fecha": "Fecha",
    "fecha_no_confirmada": "Fecha no confirmada",
    "hora": "Hora",
    "ubicacion_id": "Ubicación",
    "id_aforo": "Aforo",
}


const PANEL_USUARIOS_SISTEMA__TABLA__HEADERS = {
    "nombre": "Nombre",
    "email": "Email",
    "nombre_rol": "Rol",
}



const PANEL_SOLICITUD_PETICIONES_EVENTOS__TABLA__HEADERS = {
    "codigo":"Código",
    "hacer_peticion_boton":"Hacer petición",
    "id_partido": "Código",
    "nombre": "Evento",
    "jornada": "Jornada",
    "tipo_actividad": "Competición",
    "tipo_actividad_liga": "Liga",
    "tipo_actividad_champions": "Champions",
    "tipo_actividad_no_definido": "No definido",
    "fecha_evento": "Fecha",
    "fecha_no_confirmada": "Fecha no confirmada",
    "hora_evento": "Hora",
    "ubicacion_id": "Ubicación",
    "id_aforo": "Aforo",
}



const MODAL__PETICIONES__ASISTENTES__TABLA__HEADERS = {    
    "nombre": "Nombre",
    "apellidos": "Apellidos",
    "dni": "Dni",
    "fecha_nacimiento": "Fecha nacimiento",
    "nacionalidad": "Nacionalidad",
    "email": "Email",
    "es_menor": "Es menor",
    "principal": "Principal",
    "enviar_email": "Enviar email",
   
}



const MODAL__PETICIONES__ASISTENTES__RESUMEN__TABLA__HEADERS = {    
    "nombre": "Nombre",
    "apellidos": "Apellidos",
    "dni": "Dni",
    "fecha_nacimiento": "Fecha nacimiento",
    "nacionalidad": "Nacionalidad",
    "email": "Email",
    "es_menor": "Es menor",
    "principal": "Principal",
    "enviar_email": "Enviar email",
   
}

// tablas ventana modal eventos 


const MODAL__EDICION_EVENTO__TABLA__ENTRADAS_Y_CUPOS__HEADERS = {    
    "nombre": "Nombre",
    "cupo": "Cupo",
    "precio": "Precio",   
}

const MODAL__EDICION_EVENTO__TABLA__CUPO_DEPARTAMENTO_GENERICO__HEADERS = {    
    "departamento": "Departamento",
    "cupo": "Cupo",
}

const MODAL__EDICION_EVENTO__TABLA__CUPO_DEPARTAMENTO_ZONA__HEADERS = {    
    "departamento": "Departamento",
}

const PANEL__PLANTILLAS__SELECT__PLACEHOLDER = {
    "placeholder" : "Selección de ubicación"
}




// CARGA DE DATOS 

// *****************************

// PETICIONES

// tabla peticiones peticionario 



// cabeceras tabla dashboard gestor 
const PETICIONARIO_PETICIONES__TABLA__HEADERS = {
    "estado": "Estado",
    "codigo": "codigo",
    "fecha_peticion": "Fecha Petición",
    "competicion": "Competición",
    "evento": "Evento",
    "fecha_evento": "Fecha",
    "fecha_evento_no_confirmada": "no confirmada",

    "hora_evento": "Hora",
    "cantidad": "Num",
    "precio": "Precio",
    "zona": "Zona",
    "departamento": "Departamento",
    "peticionario": "Peticionario",
    "en_nombre_de": "En nombre de"
}

// peticionario peticiones mensajes dialogos 
const PETICIONARIO_PETICIONES__DIALOGO_ELIMINAR= {

    "eliminar_peticion__titulo": "Eliminar petición",
    "eliminar_peticion__texto": "¿Seguro que quieres eliminar esta petición?",
    "eliminar_peticion__boton__confirmar": "Si, eliminar petición",
    "eliminar_peticion__boton__eliminar": "eliminar",

    "todo_ok_peticion__texto": "Petición eliminada correctamente",

    "todo_ok": "Todo correcto",
    "error": "Error!",
    "ko": "No ha sido posible eliminar la petición",
}


// dialogo de grabar peticion modificada

const PETICIONARIO_PETICIONES__DIALOGO__EDITAR__GUARDAR_PETICION= {

    "editar_guardar_peticion__titulo": "Modificar petición",
    "editar_guardar_peticion__texto": "¿Seguro que quieres modificar esta petición para finalizarla en otro momento?",
    "editar_guardar_peticion__boton__confirmar": "Si, guardar petición",
    "editar_guardar_peticion__boton__cancelar": "Cancelar",

    "peticion":"Petición ",
    "todo_ok_peticion__texto": "  guardada correctamente",

    "todo_ok": "Todo correcto",

    "error": "Error!",
    "ko": "No ha sido posible guardar la petición",
}

// dialogo de guardar peticion

const PETICIONARIO_PETICIONES__DIALOGO__GUARDAR_PETICION= {

    "guardar_peticion__titulo": "Guardar petición",
    "guardar_peticion__texto": "La petición quedará en proceso. Para finalizarla es necesario añadir asistentes",
    "guardar_peticion__boton__confirmar": "Si, guardar petición",
    "guardar_peticion__boton__cancelar": "Cancelar",

    "peticion":"Petición ",
    "todo_ok_peticion__texto": "  guardada correctamente. Recuerda que para finalizarla es necesario añadir asistentes",

    "todo_ok": "Petición en proceso",

    "error": "Error!",
    "ko": "No ha sido posible guardar la petición",
}
// dialogo de grabar peticion actualizar

const PETICIONARIO_PETICIONES__DIALOGO__EDITAR__ACTUALIZAR = {

    "editar_guardar_peticion__titulo": "Actualizar petición",
    "editar_guardar_peticion__texto": "¿Seguro que quieres actualizar esta petición?",
    "editar_guardar_peticion__boton__confirmar": "Si, actualizar petición",
    "editar_guardar_peticion__boton__cancelar": "Cancelar",

    "peticion":"Petición ",
    "todo_ok_peticion__texto": "  actualizada correctamente",

    "todo_ok": "Todo correcto",

    "error": "Error!",
    "ko": "No ha sido posible actualizar la petición",
}



// dialogo de grabar peticion 

const PETICIONARIO_PETICIONES__DIALOGO__REALIZAR_PETICION= {

    "realizar_peticion__titulo": "Realizar petición",
    "realizar_peticion__texto": "¿Seguro que quieres realizar esta petición?",
    "realizar_peticion__boton__confirmar": "OK",
    "realizar_peticion__boton__cancelar": "Cancelar",

    "peticion":"La petición ",
    "todo_ok_peticion__texto": "  se ha enviado correctamente",
    "todo_ok_peticion__texto_nivel_auth": "  se ha enviado correctamente. Queda pendiente de autorización y asignación",
    "todo_ok_peticion__texto_nivel_auth_pendiente": "Petición pendiente",

    "todo_ok": "Petición enviada",

    "error": "Error!",
    "ko": "No ha sido posible realizar la petición",
}


// peticionario peticiones no hay plantilla asignada  
const PETICIONARIO_PETICIONES__NO_PLANTILLA_NIVEL_CERO = {
    "error": "Error!",
    "ko": "No hay ninguna plantilla asignada",
}

// dialogo de guardar peticion

const PETICIONARIO_PETICIONES__DIALOGO__ENVIAR_PETICION= {

    "enviar_peticion__titulo": "Enviar petición",
    "enviar_peticion__texto": "¿Segur que quieres enviar esta petición?",
    "enviar_peticion__boton__confirmar": "Si, enviar petición",
    "enviar_peticion__boton__cancelar": "Cancelar",

    "peticion":"Petición ",
    "todo_ok_peticion__texto": "  guardada y enviada correctamente",

    "todo_ok": "Todo Ok",

    "error": "Error!",
    "ko": "No ha sido posible enviar la petición",
}

// dialogo peticiones de check si asistente existe

const PETICIONARIO_PETICIONES__DIALOGO__CHECK_EXISTE_ASISTENTE_PROHIBIDO= {
    "error": "Error!",
    "ko": "Este DNI consta actualmente como prohibido",
}


const PETICIONARIO_PETICIONES__DIALOGO__CAMPOS_OBLIGATORIOS =  {
    "error": "Error!",
    "nombre": "El campo nombre es obligatorio",
    "apellidos": "El campo apellidos es obligatorio",
    "dni": "El campo DNI es obligatorio",

    "email_incorrecto": "El campo email es incorrecto",
    "en_nombre_de": "El campo en nombre de es incorrecto",

    "invitaciones_cero": "El número de invitaciones no puede ser 0",
    "invitaciones_insuficientes": "No tienes invitaciones suficientes para continuar",

    "faltan_asistentes": "No has añadido todos los asistentes para poder hacer esta petición",
    "cerrar":"Cerrar",
    "cerrar_sin_grabar": "¿Seguro que quieres cerrar sin grabar los cambios?. La información se perderá si no grabas",
    "si_cerrar": "Si, cerrar",
    "boton_cancelar" : "Cancelar",
    "no_mas_asistentes" : "No puedes añadir mas asistentes a la petición",
    "asistente_ya_existe_en_peticion" : "El asistente ya existe en la peticion",
    "dni_ya_existe_en_peticion" : "El dni ya existe en la peticion",
    "stock":"Stock",
    "no_tienes_invitaciones_para_continuar":"No tienes invitaciones suficientes para hacer esta petición",
    "email": "El campo email es obligatorio",
}


// --------------
const MENSAJES_PETICIONARIO__PETICIONES = {

    "modificar_guardar_peticion__titulo": "Guardar petición",
    "modificar_guardar_peticion__texto": "La petición no esta finalizada, quedara en proceso",
    "modificar_guardar_peticion__boton__confirmar": "Si, guardar petición",
    "modificar_guardar_peticion__boton__cancelar": "Cancelar",

    "todo_ok_peticion__texto": "Petición cancelada correctamente",

    "todo_ok": "Todo correcto",
    "todo_ok__peticion": "Petición ",
    "todo_ok__peticion__texto": " guardada correctamente ",
    "error": "Error!",
    "ko": "No ha sido posible modificar_guardar la petición",
}



// AUTORIZADOR  LOGISTICA  GESTOR
const MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO = {
    "error": "Error!",
    "plantilla_no_asignada": "No hay ninguna plantilla asignada",
    "fecha_no_confirmada": "Data no confirmada",
}

const MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_ENVIAR_PETICION = {
    "enviar_peticion__titulo": "Enviar petición",
    "enviar_peticion__texto": "¿Seguro que quieres enviar esta petición?",
    "enviar_peticion__boton__confirmar": "Si, enviar petición",
    "enviar_peticion__boton__cancelar": "Cancelar",

    "todo_ok_peticion": "Petición ",
    "todo_ok_peticion__texto": " guardada y enviada correctamente",

    "todo_ok": "Todo correcto",
    "ko": "No ha sido posible enviar o guardar la petición",

}

const MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_AUTORIZAR_PETICION = {
    "autorizar_peticion__titulo": "autorizar petición",
    "autorizar_peticion__texto": "¿Seguro que quieres autorizar esta petición?",
    "autorizar_peticion__boton__confirmar": "Si, autorizar petición",
    "autorizar_peticion__boton__cancelar": "Cancelar",

    "todo_ok_peticion__texto": "Petición autorizada correctamente",

    "todo_ok": "Todo correcto",
    "error": "Error!",
    "ko": "No ha sido posible autorizar o guardar la petición",
}

const MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_EDITAR_PETICION = {
    "error": "Error!",
    "editar_peticion__texto": "No ha sido posible editar la petición",
    "editar_peticion__boton__confirmar": "Si, editar petición",
    "editar_peticion__boton__cancelar": "Cancelar",

    "todo_ok_peticion": "Petición ",
    "todo_ok_peticion__texto": " guardada y enviada correctamente",

    "todo_ok": "Todo correcto",
    "ko": "No ha sido posible editar o guardar la petición",
}


const MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_MODIFICAR_PETICION = {

    "modificar_peticion__titulo": "Modificar petición",
    "modificar_peticion__texto": "¿Seguro que quieres modificar esta petición?",
    "modificar_peticion__boton__confirmar": "Si, modificar petición",
    "modificar_peticion__boton__cancelar": "Cancelar",

    "todo_ok_peticion__texto": "Petición modificada correctamente",

    "todo_ok": "Todo correcto",
    "error": "Error!",
    "ko": "No ha sido posible modificar la petición",
}


const MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_CANCELAR_PETICION = {

    "cancelar_peticion__titulo": "Cancelar petición",
    "cancelar_peticion__texto": "¿Seguro que quieres cancelar esta petición?",
    "cancelar_peticion__boton__confirmar": "Si, cancelar petición",
    "cancelar_peticion__boton__cancelar": "Cancelar",

    "todo_ok_peticion__texto": "Petición cancelada correctamente",

    "todo_ok": "Todo correcto",
    "error": "Error!",
    "ko": "No ha sido posible cancelar la petición",
}



const MENSAJES_AUTORIZADOR_LOGISTICA__DIALOGO_MODIFICAR__GUARDAR_PETICION = {

    "modificar_guardar_peticion__titulo": "Guardar petición",
    "modificar_guardar_peticion__texto": "La petición no esta finalizada, quedara en proceso",
    "modificar_guardar_peticion__boton__confirmar": "Si, guardar petición",
    "modificar_guardar_peticion__boton__cancelar": "Cancelar",

    "todo_ok_peticion__texto": "Petición cancelada correctamente",

    "todo_ok": "Todo correcto",
    "todo_ok__peticion": "Petición ",
    "todo_ok__peticion__texto": " guardada correctamente ",
    "error": "Error!",
    "ko": "No ha sido posible modificar_guardar la petición",
}

const MODAL__SOLICITUD_PETICIONES__MODAL_1 = {

    titulo_modal__nueva : "Nueva petición",
    titulo_modal__modificar : "Modificar petición"

}

const MODAL__SOLICITUD_PETICIONES__MODAL_2 = {

    label_asistente : "Asistente",
    

}


// EVENTOS 
const MODAL__CREAR_EVENTO = {
    SELECT__ACTIVIDAD_PLACEHOLDER :"Selección actividad",
    SELECT__TIPOLOGIA_EVENTO_PLACEHOLDER :"Selección tipología evento",
}

const PANEL__EVENTOS__SELECTS = {    
    SELECT__TIPOLOGIA_EVENTO_PLACEHOLDER :"Todos",
}

const MODAL__EDITAR_EVENTO__PLANTILLAS_SELECT_PLANTILLAS_DISPONIBLES__LISTA = {
    "sin_plantilla" :"Sin plantilla"
}


// dialogo de  GUARDAR PLANTILLA

const GESTION__PLANTILLAS__DIALOGO__GUARDAR = {

    "guardar_plantilla__titulo": "guardar plantilla",
    "guardar_plantilla__texto": "¿Seguro que quieres guardar esta plantilla?",
    "guardar_plantilla__boton__confirmar": "Si, guardar plantilla!",
    "guardar_plantilla__boton__cancelar": "Cancelar",

    
    "todo_ok": "Todo correcto",
    "todo_ok_plantilla__texto": "Plantilla guardada correctamente",

    "error": "Error!",
    "ko": "No ha sido posible guardar la plantilla",
}

// dialogo de  MODIFICAR PLANTILLA

const GESTION__PLANTILLAS__DIALOGO__MODIFICAR = {

    "modificar_plantilla__titulo": "Modificar plantilla",
    "modificar_plantilla__texto": "¿Seguro que quieres modificar esta plantilla?",
    "modificar_plantilla__boton__confirmar": "Si, modificar plantilla!",
    "modificar_plantilla__boton__cancelar": "Cancelar",

    
    "todo_ok": "Todo correcto",
    "todo_ok_plantilla__texto": "Plantilla guardada correctamente",

    "error": "Error!",
    "ko": "No ha sido posible modificar la plantilla",
}

// dialogo de  ELIMINAR PLANTILLA

const GESTION__PLANTILLAS__DIALOGO__ELIMINAR = {

    "eliminar_plantilla__titulo": "Eliminar plantilla",
    "eliminar_plantilla__texto": "¿Seguro que quieres eliminar esta plantilla?",
    "eliminar_plantilla__boton__confirmar": "Si, eliminar plantilla!",
    "eliminar_plantilla__boton__cancelar": "Cancelar",

    
    "todo_ok": "Todo correcto",
    "todo_ok_plantilla__texto": "Plantilla eliminada correctamente",

    "error": "Error!",
    "ko": "No ha sido posible eliminar la plantilla",
}

const PANEL__PLANTILLAS__MODAL__SELECT_PLACEHOLDERS = {
    "ubicacion" :"Selección ubicación",
    "actividad" :"Selección actividad",
    "tipo_invitacion" :"Selección tipo invitación",
    "tipologia_evento" :"Selección tipo evento",
    "idioma" :"Selección idioma"
}

// alertas eventos

// dialogo de  CREAR_EVENTO evento

const MODALE_EVENTOS__DIALOGO__CREAR_EVENTO = {

    "crear_evento__titulo": "Crear evento",
    "crear_evento__texto": "¿Seguro que quieres crear esta evento?",
    "crear_evento__boton__confirmar": "Si, crear evento!",
    "crear_evento__boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_evento__texto": "evento creado correctamente",

    "error": "Error!",
    "ko": "No ha sido posible crear el evento",
}


// dialogo de  MODIFICAR evento

const MODALE_EVENTOS__DIALOGO__MODIFICAR = {

    "modificar_elento__titulo": "Modificar evento",
    "modificar_elento__texto": "¿Seguro que quieres modificar este evento?",
    "modificar_elento__boton__confirmar": "Si, modificar el evento!",
    "modificar_elento__boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_evento__texto": "evento modificado correctamente",

    "error": "Error!",
    "ko": "No ha sido posible guardar este evento",
}


// dialogo de  ELIMINAR evento

const MODALE_EVENTOS__DIALOGO__ELIMINAR = {

    "eliminar_evento__titulo": "Eliminar evento",
    "eliminar_evento__texto": "¿Seguro que quieres eliminar este evento?",
    "eliminar_evento__boton__confirmar": "Si, eliminar evento!",
    "eliminar_evento__boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_evento__texto": "evento eliminado correctamente",

    "error": "Error!",
    "ko": "No ha sido posible eliminar el evento",
}


// mensajes campos obligatorios eventos

const MODALE_EVENTOS__MENSAJES__CAMPOS__OBLIGATORIOS = {

    "nombre": "El campo nombre es obligatorio",
    "ubicacion": "No ha seleccionado una ubicacion",    
    "actividad": "No ha seleccionado una actividad",
    "tipo_actividad": "No ha seleccionado un tipo de actividad",
   
}

// TRADUCCION ES DE CARGA DE DATOS

const CARGA_DATOS_MENSAJES_UBICACIONES = {
    "modal_titulo_nuevo":"Nueva ubicación",
    "modal_titulo_editar":"Editar ubicación", 
    "modal_boton_grabar":"Grabar", 
    "modal_boton_actualizar":"Actualizar", 
}
const CARGA_DATOS_MENSAJES_ACTIVIDADES = {
    "modal_titulo_nuevo":"Nueva actividad",
    "modal_titulo_editar":"Editar actividad", 
    "modal_boton_grabar":"Grabar", 
    "modal_boton_actualizar":"Actualizar", 
}

const CARGA_DATOS_MENSAJES_SECTORES = {
    "modal_titulo_nuevo":"Nuevo sector",
    "modal_titulo_editar":"Editar sector", 
    "modal_boton_grabar":"Grabar", 
    "modal_boton_actualizar":"Actualizar", 
}

const CARGA_DATOS_MENSAJES_ZONAS = {
    "modal_titulo_nuevo":"Nueva zona",
    "modal_titulo_editar":"Editar zona", 
    "modal_boton_grabar":"Grabar", 
    "modal_boton_actualizar":"Actualizar", 
}

const CARGA_DATOS_MENSAJES_TIPOLOGIA_EVENTOS = {
    "modal_titulo_nuevo":"Nueva tipología evento",
    "modal_titulo_editar":"Editar tipología evento", 
    "modal_boton_grabar":"Grabar", 
    "modal_boton_actualizar":"Actualizar", 
}

const CARGA_DATOS_MENSAJES_TIPOS_INVITACION = {
    "modal_titulo_nuevo":"Nuevo tipo invitacion",
    "modal_titulo_editar":"Editar tipo invitacion", 
    "modal_boton_grabar":"Grabar", 
    "modal_boton_actualizar":"Actualizar", 
}

const CARGA_DATOS_MENSAJES_MOTIVOS_EDICION_PETICION = {
    "modal_titulo_nuevo":"Nuevo motivo",
    "modal_titulo_editar":"Editar motivo", 
    "modal_boton_grabar":"Grabar", 
    "modal_boton_actualizar":"Actualizar", 
}

const CARGA_DATOS_MENSAJES_FINALIDADES = {
    "modal_titulo_nuevo":"Nueva finalidad",
    "modal_titulo_editar":"Editar finalidad", 
    "modal_boton_grabar":"Grabar", 
    "modal_boton_actualizar":"Actualizar", 
}

const CARGA_DATOS_MENSAJES_IDIOMAS = {
    "modal_titulo_nuevo":"Nuevo idioma",
    "modal_titulo_editar":"Editar idioma", 
    "modal_boton_grabar":"Grabar", 
    "modal_boton_actualizar":"Actualizar", 
}

const CARGA_DATOS_MENSAJES_NACIONALIDADES= {
    "modal_titulo_nuevo":"Nueva nacionalidad",
    "modal_titulo_editar":"Editar nacionalidad", 
    "modal_boton_grabar":"Grabar", 
    "modal_boton_actualizar":"Actualizar", 
}

const CARGA_DATOS_MENSAJES_AREAS = {
    "modal_titulo_nuevo":"Nueva area",
    "modal_titulo_editar":"Editar area", 
    "modal_boton_grabar":"Grabar", 
    "modal_boton_actualizar":"Actualizar", 
}

const CARGA_DATOS_MENSAJES_DEPARTAMENTOS = {
    "modal_titulo_nuevo":"Nuevo departamento",
    "modal_titulo_editar":"Editar departamento", 
    "modal_boton_grabar":"Grabar", 
    "modal_boton_actualizar":"Actualizar", 
}

const CARGA_DATOS_MENSAJES_ASISTENTES= {
    "modal_titulo_nuevo":"Nuevo asistente",
    "modal_titulo_editar":"Editar asistente", 
    "modal_boton_grabar":"Grabar", 
    "modal_boton_actualizar":"Actualizar", 
}

const CARGA_DATOS_MENSAJES_PROHIBIDOS= {
    "modal_titulo_nuevo":"Nuevo expediente",
    "modal_titulo_editar":"Editar expediente", 
    "modal_boton_grabar":"Grabar", 
    "modal_boton_actualizar":"Actualizar", 
}

const CARGA_DATOS_MENSAJES_USUARIOS= {
    "modal_titulo_nuevo":"Nuevo usuario",
    "modal_titulo_editar":"Editar usuario", 
    "modal_boton_grabar":"Grabar", 
    "modal_boton_actualizar":"Actualizar", 
    "zonas_autorizar_placeholder": "Selección de las zonas que puede autorizar"
}

// traducciones de alertas y mensajes de CARGA DE DATOS 
    // ubicaciones

const CARGA_DATOS__UBICACIONES__ALERT__DIALOGO__GUARDAR= {

    "guardar_ubicacion__titulo": "Guardar ubicación",
    "guardar_ubicacion__texto": "¿Seguro que quieres guardar esta ubicación?",
    "guardar_ubicacion__boton__confirmar": "Si, guardar ubicación!",
    "guardar_ubicacion__boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_ubicacion__texto": "ubicación guardada correctamente",

    "error": "Error!",
    "ko": "No ha sido posible guardar la ubicación",
}


const CARGA_DATOS__UBICACIONES__ALERT__DIALOGO__MODIFICAR= {

    "modificar_ubicacion__titulo": "Modificar ubicación",
    "modificar_ubicacion__texto": "¿Seguro que quieres modificar esta ubicación?",
    "modificar_ubicacion__boton__confirmar": "Si, modificar ubicación!",
    "modificar_ubicacion__boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_ubicacion__texto": "ubicación guardada correctamente",

    "error": "Error!",
    "ko": "No ha sido posible modificar la ubicación",
}

const CARGA_DATOS__UBICACIONES__ALERT__DIALOGO__ELIMINAR= {

    "eliminar_ubicacion__titulo": "Eliminar ubicación",
    "eliminar_ubicacion__texto": "¿Seguro que quieres eliminar esta ubicación?",
    "eliminar_ubicacion__boton__confirmar": "Si, eliminar ubicación!",
    "eliminar_ubicacion__boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_ubicacion__texto": "ubicación guardada correctamente",

    "error": "Error!",
    "ko": "No ha sido posible eliminar la ubicación",
}


 // actividades

 const CARGA_DATOS__ACTIVIDADES__ALERT__DIALOGO__GUARDAR= {

    "guardar_actividad_titulo": "Guardar actividad",
    "guardar_actividad_texto": "¿Seguro que quieres guardar esta actividad?",
    "guardar_actividad_boton__confirmar": "Si, guardar actividad!",
    "guardar_actividad_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_actividad_texto": "actividad guardada correctamente",

    "error": "Error!",
    "ko": "No ha sido posible guardar la actividad",
}


const CARGA_DATOS__ACTIVIDADES__ALERT__DIALOGO__MODIFICAR= {

    "modificar_actividad_titulo": "Modificar actividad",
    "modificar_actividad_texto": "¿Seguro que quieres modificar esta actividad?",
    "modificar_actividad_boton__confirmar": "Si, modificar actividad!",
    "modificar_actividad_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_actividad_texto": "actividad modificada correctamente",

    "error": "Error!",
    "ko": "No ha sido posible modificar la actividad",
}

const CARGA_DATOS__ACTIVIDADES__ALERT__DIALOGO__ELIMINAR= {

    "eliminar_actividad_titulo": "Eliminar actividad",
    "eliminar_actividad_texto": "¿Seguro que quieres eliminar esta actividad?",
    "eliminar_actividad_boton__confirmar": "Si, eliminar actividad!",
    "eliminar_actividad_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_actividad_texto": "actividad eliminada correctamente",

    "error": "Error!",
    "ko": "No ha sido posible eliminar la actividad",
}



 // SECTORES

 const CARGA_DATOS__SECTORES__ALERT__DIALOGO__GUARDAR= {

    "guardar_sector_titulo": "Guardar sector",
    "guardar_sector_texto": "¿Seguro que quieres guardar este sector?",
    "guardar_sector_boton__confirmar": "Si, guardar sector!",
    "guardar_sector_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_sector_texto": "sector guardado correctamente",

    "error": "Error!",
    "ko": "No ha sido posible guardar el sector",
}



const CARGA_DATOS__SECTORES__ALERT__DIALOGO__MODIFICAR= {

    "modificar_sector_titulo": "Modificar sector",
    "modificar_sector_texto": "¿Seguro que quieres modificar este sector?",
    "modificar_sector_boton__confirmar": "Si, modificar sector!",
    "modificar_sector_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_sector_texto": "sector guardado correctamente",

    "error": "Error!",
    "ko": "No ha sido posible modificar el sector",
}

const CARGA_DATOS__SECTORES__ALERT__DIALOGO__ELIMINAR= {

    "eliminar_sector_titulo": "Eliminar sector",
    "eliminar_sector_texto": "¿Seguro que quieres eliminar este sector?",
    "eliminar_sector_boton__confirmar": "Si, eliminar sector!",
    "eliminar_sector_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_sector_texto": "sector eliminado correctamente",

    "error": "Error!",
    "ko": "No ha sido posible eliminar el sector",
}


 // ZONAS

 const CARGA_DATOS__ZONAS__ALERT__DIALOGO__GUARDAR= {

    "guardar_zona_titulo": "Guardar zona",
    "guardar_zona_texto": "¿Seguro que quieres guardar esta zona?",
    "guardar_zona_boton__confirmar": "Si, guardar zona!",
    "guardar_zona_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_zona_texto": "zona guardada correctamente",

    "error": "Error!",
    "ko": "No ha sido posible guardar la zona",
}


const CARGA_DATOS__ZONAS__ALERT__DIALOGO__MODIFICAR= {

    "modificar_zona_titulo": "Modificar zona",
    "modificar_zona_texto": "¿Seguro que quieres modificar esta zona?",
    "modificar_zona_boton__confirmar": "Si, modificar zona!",
    "modificar_zona_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_zona_texto": "zona modificada correctamente",

    "error": "Error!",
    "ko": "No ha sido posible modificar la zona",
}

const CARGA_DATOS__ZONAS__ALERT__DIALOGO__ELIMINAR= {

    "eliminar_zona_titulo": "Eliminar zona",
    "eliminar_zona_texto": "¿Seguro que quieres eliminar esta zona?",
    "eliminar_zona_boton__confirmar": "Si, eliminar zona!",
    "eliminar_zona_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_zona_texto": "zona eliminada correctamente",

    "error": "Error!",
    "ko": "No ha sido posible eliminar la zona",
}

// activity types, tipologia eventos 

const CARGA_DATOS__TIPOLOGIA_EVENTOS__ALERT__DIALOGO__GUARDAR= {

    "guardar_tipologia_evento_titulo": "Guardar tipología de evento",
    "guardar_tipologia_evento_texto": "¿Seguro que quieres guardar esta tipología de evento?",
    "guardar_tipologia_evento_boton__confirmar": "Si, guardar tipología de evento!",
    "guardar_tipologia_evento_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_tipologia_evento_texto": "Tipología de evento guardada correctamente",

    "error": "Error!",
    "ko": "No ha sido posible guardar la tipología de evento",
}


const CARGA_DATOS__TIPOLOGIA_EVENTOS__ALERT__DIALOGO__MODIFICAR = {

    "modificar_tipologia_evento_titulo": "Modificar tipología de evento",
    "modificar_tipologia_evento_texto": "¿Seguro que quieres modificar esta tipología de evento?",
    "modificar_tipologia_evento_boton__confirmar": "Si, modificar tipología de evento!",
    "modificar_tipologia_evento_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_tipologia_evento_texto": "Tipología de evento modificada correctamente",

    "error": "Error!",
    "ko": "No ha sido posible modificar la tipología de evento",
}

const CARGA_DATOS__TIPOLOGIA_EVENTOS__ALERT__DIALOGO__ELIMINAR = {

    "eliminar_tipologia_evento_titulo": "Eliminar tipología de evento",
    "eliminar_tipologia_evento_texto": "¿Seguro que quieres eliminar esta tipología de evento?",
    "eliminar_tipologia_evento_boton__confirmar": "Si, eliminar tipología de evento!",
    "eliminar_tipologia_evento_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_tipologia_evento_texto": "Tipología de evento eliminada correctamente",

    "error": "Error!",
    "ko": "No ha sido posible eliminar la tipología de evento",
}

// invitation types - tipos invitaciones

const CARGA_DATOS__TIPOS_INVITACION__ALERT__DIALOGO__GUARDAR= {

    "guardar_tipos_invitacion_titulo": "Guardar tipo de invitación",
    "guardar_tipos_invitacion_texto": "¿Seguro que quieres guardar este tipo de invitación?",
    "guardar_tipos_invitacion_boton__confirmar": "Si, guardar tipo de invitación!",
    "guardar_tipos_invitacion_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_tipos_invitacion_texto": "Tipo de invitación guardada correctamente",

    "error": "Error!",
    "ko": "No ha sido posible guardar el tipo de invitación",
}


const CARGA_DATOS__TIPOS_INVITACION__ALERT__DIALOGO__MODIFICAR = {

    "modificar_tipos_invitacion_titulo": "Modificar tipo de invitación",
    "modificar_tipos_invitacion_texto": "¿Seguro que quieres modificar este tipo de invitación?",
    "modificar_tipos_invitacion_boton__confirmar": "Si, modificar tipo de invitación!",
    "modificar_tipos_invitacion_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_tipos_invitacion_texto": "Tipo de invitación modificada correctamente",

    "error": "Error!",
    "ko": "No ha sido posible modificar el tipo de invitación",
}


const CARGA_DATOS__TIPOS_INVITACION__ALERT__DIALOGO__ELIMINAR= {

    "eliminar_tipos_invitacion_titulo": "Eliminar tipo de invitación",
    "eliminar_tipos_invitacion_texto": "¿Seguro que quieres eliminar este tipo de invitación?",
    "eliminar_tipos_invitacion_boton__confirmar": "Si, eliminar tipo de invitación!",
    "eliminar_tipos_invitacion_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_tipos_invitacion_texto": "Tipo de invitación eliminada correctamente",

    "error": "Error!",
    "ko": "No ha sido posible eliminar el tipo de invitación",
}


// motivos

const CARGA_DATOS__MOTIVOS__ALERT__DIALOGO__GUARDAR = {

    "guardar_motivos_titulo": "Guardar motivo",
    "guardar_motivos_texto": "¿Seguro que quieres guardar este motivo?",
    "guardar_motivos_boton__confirmar": "Si, guardar motivo!",
    "guardar_motivos_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_motivos_texto": "motivo guardado correctamente",

    "error": "Error!",
    "ko": "No ha sido posible guardar el motivo",
}

const CARGA_DATOS__MOTIVOS__ALERT__DIALOGO__MODIFICAR = {

    "modificar_motivos_titulo": "Modificar motivo",
    "modificar_motivos_texto": "¿Seguro que quieres modificar este motivo?",
    "modificar_motivos_boton__confirmar": "Si, modificar motivo!",
    "modificar_motivos_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_motivos_texto": "motivo guardado correctamente",

    "error": "Error!",
    "ko": "No ha sido posible modificar el motivo",
}

const CARGA_DATOS__MOTIVOS__ALERT__DIALOGO__ELIMINAR = {

    "eliminar_motivos_titulo": "Eliminar motivo",
    "eliminar_motivos_texto": "¿Seguro que quieres eliminar este motivo?",
    "eliminar_motivos_boton__confirmar": "Si, eliminar motivo!",
    "eliminar_motivos_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_motivos_texto": "motivo eliminado correctamente",

    "error": "Error!",
    "ko": "No ha sido posible eliminar el motivo",
}


// Finalidades

const CARGA_DATOS__FINALIDADES__ALERT__DIALOGO__GUARDAR = {

    "guardar_finalidad_titulo": "Guardar finalidad",
    "guardar_finalidad_texto": "¿Seguro que quieres guardar esta finalidad?",
    "guardar_finalidad_boton__confirmar": "Si, guardar finalidad!",
    "guardar_finalidad_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_finalidad_texto": "finalidad guardada correctamente",

    "error": "Error!",
    "ko": "No ha sido posible guardar la finalidad",
}


const CARGA_DATOS__FINALIDADES__ALERT__DIALOGO__MODIFICAR = {

    "modificar_finalidad_titulo": "Modificar finalidad",
    "modificar_finalidad_texto": "¿Seguro que quieres modificar esta finalidad?",
    "modificar_finalidad_boton__confirmar": "Si, modificar finalidad!",
    "modificar_finalidad_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_finalidad_texto": "finalidad guardada correctamente",

    "error": "Error!",
    "ko": "No ha sido posible modificar la finalidad",
}

const CARGA_DATOS__FINALIDADES__ALERT__DIALOGO__ELIMINAR = {

    "eliminar_finalidad_titulo": "Eliminar finalidad",
    "eliminar_finalidad_texto": "¿Seguro que quieres eliminar esta finalidad?",
    "eliminar_finalidad_boton__confirmar": "Si, eliminar finalidad!",
    "eliminar_finalidad_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_finalidad_texto": "finalidad guardada correctamente",

    "error": "Error!",
    "ko": "No ha sido posible eliminar la finalidad",
}

// Areas

const CARGA_DATOS__AREAS__ALERT__DIALOGO__GUARDAR = {

    "guardar_area_titulo": "Guardar area",
    "guardar_area_texto": "¿Seguro que quieres guardar esta area?",
    "guardar_area_boton__confirmar": "Si, guardar area!",
    "guardar_area_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_area_texto": "area guardada correctamente",

    "error": "Error!",
    "ko": "No ha sido posible guardar la area",
}


const CARGA_DATOS__AREAS__ALERT__DIALOGO__MODIFICAR = {

    "modificar_area_titulo": "Modificar area",
    "modificar_area_texto": "¿Seguro que quieres modificar esta area?",
    "modificar_area_boton__confirmar": "Si, modificar area!",
    "modificar_area_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_area_texto": "area guardada correctamente",

    "error": "Error!",
    "ko": "No ha sido posible modificar la area",
}

const CARGA_DATOS__AREAS__ALERT__DIALOGO__ELIMINAR = {

    "eliminar_area_titulo": "Eliminar area",
    "eliminar_area_texto": "¿Seguro que quieres eliminar esta area?",
    "eliminar_area_boton__confirmar": "Si, eliminar area!",
    "eliminar_area_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_area_texto": "area eliminada correctamente",

    "error": "Error!",
    "ko": "No ha sido posible eliminar la area",
}


// departamentos

const CARGA_DATOS__DEPARTAMENTOS__ALERT__DIALOGO__GUARDAR = {

    "guardar_departamento_titulo": "Guardar departamento",
    "guardar_departamento_texto": "¿Seguro que quieres guardar este departamento?",
    "guardar_departamento_boton__confirmar": "Si, guardar departamento!",
    "guardar_departamento_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_departamento_texto": "departamento guardado correctamente",

    "error": "Error!",
    "ko": "No ha sido posible guardar el departamento",
}


const CARGA_DATOS__DEPARTAMENTOS__ALERT__DIALOGO__MODIFICAR = {

    "modificar_departamento_titulo": "Modificar departamento",
    "modificar_departamento_texto": "¿Seguro que quieres modificar este departamento?",
    "modificar_departamento_boton__confirmar": "Si, modificar departamento!",
    "modificar_departamento_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_departamento_texto": "departamento guardado correctamente",

    "error": "Error!",
    "ko": "No ha sido posible modificar el departamento",
}

const CARGA_DATOS__DEPARTAMENTOS__ALERT__DIALOGO__ELIMINAR = {

    "eliminar_departamento_titulo": "Eliminar departamento",
    "eliminar_departamento_texto": "¿Seguro que quieres eliminar este departamento?",
    "eliminar_departamento_boton__confirmar": "Si, eliminar departamento!",
    "eliminar_departamento_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_departamento_texto": "departamento eliminado correctamente",

    "error": "Error!",
    "ko": "No ha sido posible eliminar el departamento",
}



// asistentes

const CARGA_DATOS__ASISTENTES__ALERT__DIALOGO__GUARDAR = {

    "guardar_asistente_titulo": "Guardar asistente",
    "guardar_asistente_texto": "¿Seguro que quieres guardar este asistente?",
    "guardar_asistente_boton__confirmar": "Si, guardar asistente!",
    "guardar_asistente_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_asistente_texto": "asistente guardado correctamente",

    "error": "Error!",
    "ko": "No ha sido posible guardar el asistente",
}


const CARGA_DATOS__ASISTENTES__ALERT__DIALOGO__MODIFICAR = {

    "modificar_asistente_titulo": "Modificar asistente",
    "modificar_asistente_texto": "¿Seguro que quieres modificar este asistente?",
    "modificar_asistente_boton__confirmar": "Si, modificar asistente!",
    "modificar_asistente_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_asistente_texto": "asistente guardado correctamente",

    "error": "Error!",
    "ko": "No ha sido posible modificar el asistente",
}

const CARGA_DATOS__ASISTENTES__ALERT__DIALOGO__ELIMINAR = {

    "eliminar_asistente_titulo": "Eliminar asistente",
    "eliminar_asistente_texto": "¿Seguro que quieres eliminar este asistente?",
    "eliminar_asistente_boton__confirmar": "Si, eliminar asistente!",
    "eliminar_asistente_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_asistente_texto": "asistente eliminado correctamente",

    "error": "Error!",
    "ko": "No ha sido posible eliminar el asistente",
}



// PROHIBIDOS

const CARGA_DATOS__PROHIBIDOS__ALERT__DIALOGO__GUARDAR = {

    "guardar_expediente_titulo": "Guardar expediente",
    "guardar_expediente_texto": "¿Seguro que quieres guardar este expediente?",
    "guardar_expediente_boton__confirmar": "Si, guardar expediente!",
    "guardar_expediente_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_expediente_texto": "expediente guardado correctamente",

    "error": "Error!",
    "ko": "No ha sido posible guardar el expediente",
}


const CARGA_DATOS__PROHIBIDOS__ALERT__DIALOGO__MODIFICAR = {

    "modificar_expediente_titulo": "Modificar expediente",
    "modificar_expediente_texto": "¿Seguro que quieres modificar este expediente?",
    "modificar_expediente_boton__confirmar": "Si, modificar expediente!",
    "modificar_expediente_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_expediente_texto": "expediente guardado correctamente",

    "error": "Error!",
    "ko": "No ha sido posible modificar el expediente",
}

const CARGA_DATOS__PROHIBIDOS__ALERT__DIALOGO__ELIMINAR = {

    "eliminar_expediente_titulo": "Eliminar expediente",
    "eliminar_expediente_texto": "¿Seguro que quieres eliminar este expediente?",
    "eliminar_expediente_boton__confirmar": "Si, eliminar expediente!",
    "eliminar_expediente_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_expediente_texto": "expediente eliminado correctamente",

    "error": "Error!",
    "ko": "No ha sido posible eliminar el expediente",
}


// USUARIOS SISTEMA

const CARGA_DATOS__USUARIOS__ALERT__DIALOGO__GUARDAR = {

    "guardar_usuario_titulo": "Guardar usuario",
    "guardar_usuario_texto": "¿Seguro que quieres guardar este usuario?",
    "guardar_usuario_boton__confirmar": "Si, guardar usuario!",
    "guardar_usuario_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_usuario_texto": "usuario guardado correctamente",

    "error": "Error!",
    "ko": "No ha sido posible guardar el usuario",
}


const CARGA_DATOS__USUARIOS__ALERT__DIALOGO__MODIFICAR = {

    "modificar_usuario_titulo": "Modificar usuario",
    "modificar_usuario_texto": "¿Seguro que quieres modificar este usuario?",
    "modificar_usuario_boton__confirmar": "Si, modificar usuario!",
    "modificar_usuario_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_usuario_texto": "usuario guardado correctamente",

    "error": "Error!",
    "ko": "No ha sido posible modificar el usuario",
}


const CARGA_DATOS__USUARIOS__ALERT__DIALOGO__ELIMINAR = {

    "eliminar_usuario_titulo": "Eliminar usuario",
    "eliminar_usuario_texto": "¿Seguro que quieres eliminar este usuario?",
    "eliminar_usuario_boton__confirmar": "Si, eliminar usuario!",
    "eliminar_usuario_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_usuario_texto": "usuario eliminado correctamente",

    "error": "Error!",
    "ko": "No ha sido posible eliminar el usuario",
}



// IDIOMAS

const CARGA_DATOS__IDIOMAS__ALERT__DIALOGO__GUARDAR = {

    "guardar_idioma_titulo": "Guardar idioma",
    "guardar_idioma_texto": "¿Seguro que quieres guardar este idioma?",
    "guardar_idioma_boton__confirmar": "Si, guardar idioma!",
    "guardar_idioma_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_idioma_texto": "idioma guardado correctamente",

    "error": "Error!",
    "ko": "No ha sido posible guardar el idioma",
}


const CARGA_DATOS__IDIOMAS__ALERT__DIALOGO__MODIFICAR = {

    "modificar_idioma_titulo": "Modificar idioma",
    "modificar_idioma_texto": "¿Seguro que quieres modificar este idioma?",
    "modificar_idioma_boton__confirmar": "Si, modificar idioma!",
    "modificar_idioma_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_idioma_texto": "idioma guardado correctamente",

    "error": "Error!",
    "ko": "No ha sido posible modificar el idioma",
}

const CARGA_DATOS__IDIOMAS__ALERT__DIALOGO__ELIMINAR = {

    "eliminar_idioma_titulo": "Eliminar idioma",
    "eliminar_idioma_texto": "¿Seguro que quieres eliminar este idioma?",
    "eliminar_idioma_boton__confirmar": "Si, eliminar idioma!",
    "eliminar_idioma_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_idioma_texto": "idioma guardado correctamente",

    "error": "Error!",
    "ko": "No ha sido posible eliminar el idioma",
}


// NACIONALIDADES

const CARGA_DATOS__NACIONALIDADES__ALERT__DIALOGO__GUARDAR = {

    "guardar_nacionalidad_titulo": "Guardar nacionalidad",
    "guardar_nacionalidad_texto": "¿Seguro que quieres guardar esta nacionalidad?",
    "guardar_nacionalidad_boton__confirmar": "Si, guardar nacionalidad!",
    "guardar_nacionalidad_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_nacionalidad_texto": "nacionalidad guardada correctamente",

    "error": "Error!",
    "ko": "No ha sido posible guardar la nacionalidad",
}


const CARGA_DATOS__NACIONALIDADES__ALERT__DIALOGO__MODIFICAR = {

    "modificar_nacionalidad_titulo": "modificar nacionalidad",
    "modificar_nacionalidad_texto": "¿Seguro que quieres modificar esta nacionalidad?",
    "modificar_nacionalidad_boton__confirmar": "Si, modificar nacionalidad!",
    "modificar_nacionalidad_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_nacionalidad_texto": "nacionalidad guardada correctamente",

    "error": "Error!",
    "ko": "No ha sido posible modificar la nacionalidad",
}

const CARGA_DATOS__NACIONALIDADES__ALERT__DIALOGO__ELIMINAR = {

    "eliminar_nacionalidad_titulo": "eliminar nacionalidad",
    "eliminar_nacionalidad_texto": "¿Seguro que quieres eliminar esta nacionalidad?",
    "eliminar_nacionalidad_boton__confirmar": "Si, eliminar nacionalidad!",
    "eliminar_nacionalidad_boton__cancelar": "Cancelar",
    
    "todo_ok": "Todo correcto",
    "todo_ok_nacionalidad_texto": "nacionalidad guardada correctamente",

    "error": "Error!",
    "ko": "No ha sido posible eliminar la nacionalidad",
}

// ALERTAS DE VALIDACION DE CAMPOS 

const CARGA_DATOS__UBICACIONES__MENSAJES__VALIDACION_CAMPOS = {
    "nombre":"El campo nombre de la ubicación es obligatorio"
}

const CARGA_DATOS__TIPOLOGIA_ACTIVIDAD__MENSAJES__VALIDACION_CAMPOS = {
    "nombre":"El campo nombre actividad es obligatorio"
}

const CARGA_DATOS__SECTORES__MENSAJES__VALIDACION_CAMPOS = {
    "nombre":"El campo nombre  es obligatorio"
}

const CARGA_DATOS__ZONAS__MENSAJES__VALIDACION_CAMPOS = {
    "nombre":"El campo nombre de zona es obligatorio"
}

const CARGA_DATOS__TIPOLOGIA_EVENTO__MENSAJES__VALIDACION_CAMPOS = {
    "nombre":"El campo nombre tipología evento es obligatorio"
}

const CARGA_DATOS__TIPOS_INVITACION__MENSAJES__VALIDACION_CAMPOS = {
    "nombre":"El campo nombre del tipo de invitación es obligatorio"
}

const CARGA_DATOS__MOTIVOS__MENSAJES__VALIDACION_CAMPOS = {
    "nombre":"El campo nombre del motivo es obligatorio"
}

const CARGA_DATOS__FINALIDADES__MENSAJES__VALIDACION_CAMPOS = {
    "nombre":"El campo nombre de la finalidad es obligatorio"
}

const CARGA_DATOS__AREAS__MENSAJES__VALIDACION_CAMPOS = {
    "nombre":"El campo nombre del area es obligatorio"
}

const CARGA_DATOS__DEPARTAMENTO__MENSAJES__VALIDACION_CAMPOS = {
    "nombre":"El campo nombre del departamento es obligatorio"
}

const CARGA_DATOS__ASISTENTES__MENSAJES__VALIDACION_CAMPOS = {
    "nombre" : "El campo nombre es obligatorio",
    "apellidos" : "El campo apellidos es obligatorio",
    "dni": "El campo dni es obligatorio",
    "email_incorrecto" : "El campo email es incorrecto"
}


const CARGA_DATOS__PROHIBIDOS__MENSAJES__VALIDACION_CAMPOS = {
    "ejercicio" : "El campo ejercicio es obligatorio",
    "ejercicio_longitud" : "El campo ejercicio tiene que tener 4 numeros",    
    "expediente" : "El campo expediente es obligatorio",
    "fecha_de_resolucion" : "El campo fecha de resolucion es obligatorio",
    "delegacion" : "El campo delegacion es obligatorio",    
    "dni": "El campo dni es obligatorio",
    "nombre": "El campo nombre es obligatorio",
    "fecha_inicio": "El campo fecha de inicio es obligatorio",
    "fecha_fin": "El campo fecha de fin es obligatorio",
    "fecha_fin_anterior": "El campo fecha de fin no puede ser anterior a la fecha de inicio",    
}

const CARGA_DATOS__USUARIOS__MENSAJES__VALIDACION_CAMPOS = {
    "editar_superadmin" : "No puedes editar un super administrador",
    "nombre" : "El campo nombre es obligatorio",
    "apellidos" : "El campo apellidos es obligatorio",
    "dni": "El campo dni es obligatorio",
    "email" : "El campo email es obligatorio",
    "email_incorrecto" : "El campo email es incorrecto",
    "password" : "El campo password es obligatorio",
    "password_incorrecto" : "El campo password es incorrecto, no coincide"
}

const CARGA_DATOS__IDIOMA__MENSAJES__VALIDACION_CAMPOS = {
    "nombre":"El campo nombre del idioma es obligatorio"
}

const CARGA_DATOS__NACIONALIDAD__MENSAJES__VALIDACION_CAMPOS = {
    "nombre":"El campo nombre de la nacionalidad es obligatorio"
}

const CARGA_DATOS__PLANTILLAS__MENSAJES__VALIDACION_CAMPOS = {
    "nombre":"El campo nombre es obligatorio",
    "asunto":"El campo asunto es obligatorio",
    "ubicacion":"Debe seleccionar una ubicación",
    "idioma":"Debe seleccionar un idioma",
    "actividad":"Debe seleccionar una actividad",
    "tipologia_evento":"Debe seleccionar una tipología de evento",
    "tipo_invitacion":"Debe seleccionar un tipo de invitación",
    "contenido":"No hay contenido en la plantilla",



}