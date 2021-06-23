<?php
        /* Setup CORS */
        // header('Access-Control-Allow-Origin: *');
        // header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
        // header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

    Route::get('/', function () {
        return view('auth.login');
    });

    Auth::routes();

    Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', 'HomeController@index2')->name('home');   

    // Dashboard inicial , home, para todos los usuarios
    // cambiaremos dinamicamente el contenido central en funcion del perfil de cada user
    Route::get('/dashboard', 'DashboardController@mainDashboard')->name('dashboard');


    // UBICACIONES 
    // listado de todas las UBICACIONES GET LIST
    Route::get('/getLocationsall', 'LocationController@getAllLocations')->name('getLocationsall');   
    // UBICACION store - 
    Route::post('/locationstore', 'LocationController@locationStore');
    // UBICACION edit
    Route::post('/locationedit', 'LocationController@locationEdit');
    // UBICACION delete
    Route::put('/eliminarlocation', 'LocationController@deleteLocation'); 


    // ACTIVIDADES

    // listado de todas las ACTIVIDAD  GET LIST
    Route::get('/getActividadsall', 'ActivityController@getAllActividad')->name('getActividadAll');
    // listado de las activiades de una ubicacion
    Route::get('/getActividad/{ubicvacionID}', 'ActivityController@getActividadesUbicacion');

    // ACTIVIDAD store
    Route::post('/actividadstore', 'ActivityController@actividadStore');
    // ACTIVIDAD edit
    Route::post('/actividadedit', 'ActivityController@actividadEdit');
    // ACTIVIDAD delete
    Route::put('/eliminaractividad', 'ActivityController@deleteActividad');    


    // SECTORES 

    // listado de todas las SECTORES  GET LIST
    Route::get('/getSectorssall', 'SectorController@getAllSectors')->name('getSectorsAll');
    // SECTORES store
    Route::post('/sectorstore', 'SectorController@sectorStore');
    // SECTORES edit
    Route::post('/sectoredit', 'SectorController@sectorEdit');
    // SECTORES delete
    Route::put('/eliminarsector', 'SectorController@deleteSector');    


    // ZONAS 

    // listado de todas las ZONAS  GET LIST
    Route::get('/getZonassall', 'ZoneController@getAllZonas')->name('getZonasAll');
    // listado de todos los ZONAS show LIST - DEVUELVE VISTA
    Route::get('/getZonasShowList', 'ZoneController@getZonasShowList')->name('getZonasShowList');
    // ZONAS store
    Route::post('/zonastore', 'ZoneController@zonaStore');
    // ZONAS edit
    Route::post('/zonaedit', 'ZoneController@zonaEdit');
    // ZONAS delete
    Route::put('/eliminarzona', 'ZoneController@deleteZona');    


    // TIPO ACTIVIDAD 

    // listado de todas las TIPO ACTIVIDAD  GET LIST
    Route::get('/getTipoActividadsall', 'ActivityTypeController@getAllTipoActividad')->name('getTipoActividadAll');
    // listado de de tipos de actividad filtrado por actividad
    Route::get('/getTipoActividad/{actividadID}', 'ActivityTypeController@getTipoActividad');    
    // TIPO ACTIVIDAD store
    Route::post('/tipoactividadstore', 'ActivityTypeController@tipoactividadStore');
    // TIPO ACTIVIDAD edit
    Route::post('/tipoactividadedit', 'ActivityTypeController@tipoactividadEdit');
    // TIPO ACTIVIDAD delete
    Route::put('/eliminartipoactividad', 'ActivityTypeController@deleteTipoActividad');       
        

    // TIPOS DE INVITACIONES 

    // listado de todas las TIPOS DE INVITACIONES  GET LIST
    Route::get('/getInvitationTypesall', 'InvitationTypeController@getAllInvitationTypes')->name('getInvitationTypesall');    
    // TIPOS DE INVITACIONES store
    Route::post('/invitationtypestore', 'InvitationTypeController@invitationTypeStore');
    // TIPOS DE INVITACIONES edit
    Route::post('/invitationtypeedit', 'InvitationTypeController@invitationTypeEdit');
    // TIPOS DE INVITACIONES delete
    Route::put('/eliminarinvitationtype', 'InvitationTypeController@deleteInvitationType');       

    
    // MOTIVOS MODIFICACION PETICIONES - CRUD MOTIVOS - editpurposes  (motivos)

    // listado editpurposes
    Route::get('/geteditpurposesall', 'EditPurposeController@geteditpurposesall');    
    // editpurpose store
    Route::post('/editpurposestore', 'EditPurposeController@editpurposeStore');
    // editpurpose edit
    Route::post('/editpurposeedit', 'EditPurposeController@editpurposeEdit');
    // editpurpose delete
    Route::put('/eliminareditpurpose', 'EditPurposeController@deleteeditpurpose');



    // PURPOSES - FINALITATS
    // purposes
    Route::get('/purposes', 'PurposeController@index');
    // listado purposes
    Route::get('/getpurposesall', 'PurposeController@getpurposesall');    
    // purpose store
    Route::post('/purposestore', 'PurposeController@purposeStore');
    // purpose edit
    Route::post('/purposeedit', 'PurposeController@purposeEdit');
    // purpose delete
    Route::put('/eliminarpurpose', 'PurposeController@deletePurpose');    


    // AREAS     
    // listado de todas las AREAS  GET LIST
    Route::get('/getAreassall', 'AreaController@getAllAreas')->name('getAreasAll');
    // AREAS store
    Route::post('/areastore', 'AreaController@areaStore');
    // AREAS edit
    Route::post('/areaedit', 'AreaController@areaEdit');
    // AREAS delete
    Route::put('/eliminararea', 'AreaController@deleteArea');   


    // DEPARTAMENTOS 

    // listado de todas las DEPARTAMENTOS  GET LIST
    Route::get('/getDepartmentssall', 'DepartmentController@getAllDepartments')->name('getDepartmentsAll');
    // DEPARTAMENTOS store
    Route::post('/departmentstore', 'DepartmentController@departmentStore');
    // DEPARTAMENTOS edit
    Route::post('/departmentedit', 'DepartmentController@departmentEdit');
    // DEPARTAMENTOS delete
    Route::put('/eliminardepartment', 'DepartmentController@deleteDepartment');       



   //ASISTENTES invitados - Guests
    // asistentes listado
    Route::get('/guests', 'GuestController@index');
    // asistentes store
    Route::post('/gueststore', 'GuestController@guestStore');
    // asistentes update
    Route::post('/guestedit', 'GuestController@guestEdit');  
    // asistentes delete
    Route::put('/eliminarguest', 'GuestController@deleteGuest');
    // check if Guest exists
    Route::get('/guestcheck/{guestId}', 'GuestController@checkIfGuestExists');
    // check if DNI Guest exists
    Route::get('/newguestcheck/{guestId}', 'GuestController@checkIfGuestDniExists');    


    //PROHIBIDOS
    // PROHIBIDOS LIST
    Route::get('/bans', 'BanController@index');
    // PROHIBIDOS STORE
    Route::post('/banstore', 'BanController@banStore');
    // PROHIBIDOS EDIT
    Route::post('/banedit', 'BanController@banEdit');
    // PROHIBIDOS DELETE
    Route::put('/eliminarban', 'BanController@deleteBan');


    // IDIOMAS
    // listado idiomas
    Route::get('/getlanguages', 'LanguageController@getLanguages')->name('getlanguages');
    // listado de todos los idiomas GET LIST
    Route::get('/getlanguagesall', 'LanguageController@getAllLanguages')->name('getalllanguages');
    // listado de todos los idiomas show LIST
    Route::get('/getlanguagesallshowlist', 'LanguageController@getLanguagesAllShowList')->name('getalllanguagesshowlist');
    // languagee store
    Route::post('/languagesstore', 'LanguageController@languageStore');
    // languagee edit
    Route::post('/languageedit', 'LanguageController@languageEdit');
    // languagee delete
    Route::put('/eliminarlanguage', 'LanguageController@deleteLanguage');        

    
    // NACIONALIDADES 
    // listado de todas las nacionalidades GET LIST
    Route::get('/getnationalitiesall', 'NationalityController@getAllNationalities')->name('getnationalitiesall');
    // nacionalidad store
    Route::post('/nationalitystore', 'NationalityController@nationalityStore');
    // nacionalidad edit
    Route::post('/nationalityedit', 'NationalityController@nationalityEdit');
    // nacionalidad delete
    Route::put('/eliminarnationality', 'NationalityController@deleteNationality');        

    // PLANTILLAS - EMAIL TEMPLATES

    // listado plantillas
    Route::get('/templates/list', 'TemplateController@index')->name('listadoplantillas');

    // mostrar plantilla
    Route::get('/templates/show', 'TemplateController@show')->name('crearplantilla');

    // editar plantilla
    Route::get('/templatesedit/{template}', 'TemplateController@edit')->name('editarplantilla');
    
    // clonar plantilla
    Route::get('/templatesclone/{template}', 'TemplateController@clone')->name('clonarplantilla');

    // template store
    Route::post('/templatestore', 'TemplateController@templatestore');

    // template edit
    Route::post('/templateedit', 'TemplateController@templateedit');

    Route::get('/gettemplatebyid/{id}', 'TemplateController@gettemplatebyid')->name('gettemplatebyid');

    // obtener listado plantillas
    
    Route::get('/getalltemplates', 'TemplateController@getAllTemplates');
    Route::get('/gettemplates/{activity_id}/{activity_type_id}', 'TemplateController@getTemplates');

    // eliminar plantilla
    Route::put('/eliminarplantilla', 'TemplateController@deleteTemplate');

    // obtener listado plantillas parametrizando actividad,tipo de actividad, tipo de invitacion , idioma, y evento
    Route::get('/geteventtemplate/{activity_id}/{activity_type_id}/{invitation_type_id}/{lang_id}/{event_id}', 'EventController@getEventTemplate');
    
    Route::get('/geteventtemplatesall/{event_id}', 'EventController@getEventTemplatesAll');
    Route::get('/geteventtemplatebyid/{event_id}/{template_id}', 'EventController@getEventTemplateById');
    

    // EVENTOS 

    // crear evento
    Route::post('/createnewevent','EventController@createEvent')->name('createnewevent');

    Route::put('eliminarevento','EventController@deleteEvent')->name('eliminarevento');
    


    
    // USUARIOS SISTEMA 

    // listado usuarios sistema
    Route::get('/getallusers', 'UserController@getAllUsers');
    Route::post('/getSystemUserAreas', 'UserController@getSystemUserAreas')->name('getSystemUserAreas');

    // crear usuario sistema
    Route::post('/userstore', 'UserController@crearUsuarioSistema');  

    // editar usuario sistema 
    Route::post('/useredit', 'UserController@editarUsuarioSistema');  
    
    
    // eliminar usuario de sistema
    Route::put('eliminaruser','UserController@deleteSystemUser')->name('eliminaruser');
    
   


    Route::get('/avisolegal', function () {
        return view ('textos.aviso-legal');
    });

    Route::get('/privacidad', function () {
        return view ('textos.privacidad');
    });

    // --------------------------------- Fin refactor rutas



    Route::get('/invitation/list', 'HomeController@index')->name('invitationlist');
    // events
    Route::get('/events', 'EventController@index');

    Route::get('/events/show', 'EventController@show')->name('gestorshowevents');
    Route::get('/events/{event}','EventController@edit')->name('gestoreditevents');
    Route::post('/events/update','EventController@gestorstoreevent')->name('gestorstoreevent');

    Route::get('/eventscreate','EventController@showeventcreateform')->name('creareventoformshow');;
    Route::post('/events/store','EventController@createevent');




    // actualizar evento
        
    // eliminar evento

    

    // peticiones         
    Route::get('/invitation/new', 'InvitationController@index')->name('newinvitation');
    Route::get('/invitations/{userId}', 'InvitationController@getInvitations');
    Route::post('/invitations', 'InvitationController@store');
    Route::post('/invitations/update', 'InvitationController@edit');
    Route::get('/invitationsautorizador/{userId}', 'InvitationController@getInvitationsAutorizador');
    Route::get('/invitationslogistica', 'InvitationController@getInvitationsLogistica');
    Route::get('/invitationsgestor', 'InvitationController@getInvitationsGestor');
    Route::get('/pendinginvitations', 'InvitationController@pendientesautorizar')->name('pendinginvitations');
    
    
    Route::get('/pendinginvitationsassign', 'InvitationController@pendientesasignar')->name('pendinginvitationsassign');
    Route::get('/gestordashboard', 'InvitationController@dashboardgestor')->name('dashboardgestor');


    Route::put('/autorizarpeticion', 'InvitationController@autorizarpeticion');
    Route::put('/cancelarpeticion', 'InvitationController@cancelarpeticion');
    Route::put('/eliminarpeticion', 'InvitationController@eliminarpeticion');
    Route::put('/editarpeticionpeticionario', 'InvitationController@editarpeticionpeticionario');
    Route::put('/editarpeticionautorizador', 'InvitationController@editarpeticionautorizador');
    Route::put('/modificarpeticion', 'InvitationController@modificarpeticion');
    Route::put('/cancelarpeticionautorizador', 'InvitationController@cancelarpeticionautorizador');
    Route::put('/enviarpeticionlogistica', 'InvitationController@enviarpeticionlogistica');
    Route::put('/savepeticionlogistica', 'InvitationController@savepeticionlogistica');
    
    // get areas
    Route::get('/areas', 'AreaController@index');

    // get depts
    Route::get('/departments/{id}', 'DepartmentController@index');
    
    // get sectores
    Route::get('/sectors', 'SectorController@index');

    // get zones
    Route::get('/zones/{id}', 'ZoneController@index');

    // contadores dashboard 
    Route::get('/checkinvitationscounterpeticionario/{id}', 'InvitationController@checkinvitationscounterpeticionario');
    Route::get('/checkinvitationscounterautorizador/{id}', 'InvitationController@checkinvitationscounterautorizador');
    Route::get('/checkinvitationscountergestor', 'InvitationController@checkinvitationscountergestor');
    
    //--------------
    // get eventos

    // update eventos

    // delete eventos
    

 
    
    Route::get('/testdept', function () {
        
        return Auth::user()->department->area->id;
    }  );
    

    


    // registros del evento y zona- tabla  event_zone
    Route::get('/eventzone/{eventId}', 'EventZoneController@index');

    // registros del evento departamento y zona, cupos por zona y departamento - tabla  event_department_zone
    Route::get('/eventdepartmentzone/{eventId}', 'EventZoneController@event_department_zone_all_records');
 
    // registros del evento departamento y zona, cupos por zona y departamento
    Route::get('/eventdepartmentzone/{eventId}/{departmentId}', 'EventZoneController@event_department_zone_cupo');

    // registros del evento departamento y zona, cupos por zona y departamento - tabla  event_department_zone
    Route::get('/eventdepartmentzone/{eventId}/{areaId}/{sectorId}', 'EventZoneController@event_department_zone_all_records');

    // registros del evento y cupos genericos por departamento -  tabla event_department_generic
    Route::get('/eventdepartmentgeneric/{eventId}', 'EventZoneController@event_department_all_records');
    
    Route::get('/eventdepartmentgeneric/{eventId}/{departmentId}', 'EventZoneController@event_department_cupo');

    
   



/*

        // AREAS 
            // listado de todas las AREAS  GET LIST
            Route::get('/getAreassall', 'AreaController@getAllAreas')->name('getAreasAll');
            // listado de todos los AREAS show LIST - DEVUELVE VISTA
            Route::get('/getAreasShowList', 'AreaController@getAreasShowList')->name('getAreasShowList');
            // AREAS store
            Route::post('/areastore', 'AreaController@areaStore');
            // AREAS edit
            Route::post('/areaedit', 'AreaController@areaEdit');
            // AREAS delete
            Route::put('/eliminararea', 'AreaController@deleteArea');           
            
            
        // DEPARTAMENTOS 
            // listado de todas las DEPARTAMENTOS  GET LIST
            Route::get('/getDepartmentssall', 'DepartmentController@getAllDepartments')->name('getDepartmentsAll');
            // listado de todos los DEPARTAMENTOS show LIST - DEVUELVE VISTA
            Route::get('/getDepartmentsShowList', 'DepartmentController@getDepartmentsShowList')->name('getDepartmentsShowList');
            // DEPARTAMENTOS store
            Route::post('/departmentstore', 'DepartmentController@departmentStore');
            // DEPARTAMENTOS edit
            Route::post('/departmentedit', 'DepartmentController@departmentEdit');
            // DEPARTAMENTOS delete
            Route::put('/eliminardepartment', 'DepartmentController@deleteDepartment');         
            
                        
*/








   
            


    // test email
    Route::post('/sendemail', 'TemplateController@sendEmail');

    Route::get('/testusuarios', 'UserController@testusuarios');

    
   //  -----------------------------
    


    Route::post('ckeditor/image_upload', 'TemplateController@upload')->name('upload');



    

    // usuarios plataforma ----------------------------------
    Route::get('/manageusers', 'UserController@manageusers')->name('users.manageusers');



    // ------------------------

    // config
        Route::get('/config', 'ConfigController@index');
        Route::put('/bansimport', 'ConfigController@importExcel')->name('users.import.excel');

        
        Route::get('/checkusermail/{userEmailToCheck}', 'UserController@checkUserEmailApp');
        
        Route::get('/crearplantillas', 'InvitationController@crearPlantillasIniciales');

        Route::get('/creareventomanual', 'EventController@crearEventoManual');

        Route::get('/downloadcodes/{eventId}', 'InvitationController@pruebaevento');

        // ruta para probar la generacion bulk de QRs
        Route::get('/testguestinvitation', 'InvitationController@testguestinvitation');

        
    });
    
    Route::get('/testphp', 'UserController@testphp');
