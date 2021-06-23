<!DOCTYPE html>
<html lang="es">

<head>
    <title tkey="titulo_layout_main">Appcess - FC Barcelona</title>

    <!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="" />

    <!-- Favicon icon -->
    <link rel="icon" href="../files/assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="../files/bower_components/bootstrap/css/bootstrap.min.css">

    <!-- waves.css -->
    <link rel="stylesheet" href="../files/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- feather icon -->
    <link rel="stylesheet" type="text/css" href="../files/assets/icon/feather/css/feather.css">
    <!-- font-awesome-n -->
    <link rel="stylesheet" type="text/css" href="../files/assets/css/font-awesome-n.min.css">
    <!-- Redial css -->
    <link rel="stylesheet" href="../files/assets/pages/chart/radial/css/radial.css" type="text/css" media="all">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/css/widget.css">

    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"> --}}

   <!-- Scripts -->
   {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
   <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js"></script>

    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="../files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">

    {{-- Chosen --}}
    <link rel="stylesheet" type="text/css" href="../files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/css/widget.css">

    <link rel="stylesheet" href="../files/assets/chosen/docsupport/style.css">
    <link rel="stylesheet" href="../files/assets/chosen/docsupport/prism.css">
    <link rel="stylesheet" href="../files/assets/chosen/chosen.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
    <link rel="stylesheet" href="../files/assets/extensions/Editor/css/editor.dataTables.min.css">

    <link rel="stylesheet" href="/css/appcess-custom.css">
    {{-- @if(  (Auth::user()->hasRole('admin')) ) --}}
    {{-- Definiciones propias de la aplicacion --}}
    <script src="{{asset('js/lang/appcess-es.js')}}"></script>

    {{-- Definiciones propias de la aplicacion --}}
    <script src="{{asset('js/appcess-defs.js')}}"></script>
    {{-- carga de funciones para crud de ubicaciones --}}
    <script src="{{asset("js/locations.js")}} " ></script>
    {{-- carga de funciones tipos de actividad por ubicacion  --}}
    <script src="{{asset("js/activities.js")}} " ></script>
    {{-- carga de funciones para crud sectores  --}}
    <script src="{{asset("js/sectors.js")}} " ></script>
    {{-- carga de funciones para crud zonas  --}}
    <script src="{{asset("js/zones.js")}} " ></script>
    {{-- carga de funciones para crud tipologias actividad  --}}
    <script src="{{asset("js/activity-types.js")}} " ></script>
    {{-- carga de funciones para crud tipo invitacion --}}
    <script src="{{asset("js/invitation-types.js")}} " ></script>
    {{-- carga de funciones para crud motivos cancelacion edicion--}}
    <script src="{{asset("js/edit-purpose.js")}} " ></script>
    {{-- carga de funciones para crud finalidades--}}
    <script src="{{asset("js/purposes.js")}} " ></script>
    {{-- carga de funciones para crud areas--}}
    <script src="{{asset("js/areas.js")}} " ></script>
    {{-- carga de funciones para crud departamentos--}}
    <script src="{{asset("js/departments.js")}} " ></script>
    {{-- carga de funciones para crud Asistentes--}}
    <script src="{{asset("js/guests.js")}} " ></script>
    {{-- carga de funciones para crud Prohibidos--}}
    <script src="{{asset("js/bans.js")}} " ></script>
    {{-- carga de funciones para crud idiomas--}}
    <script src="{{asset("js/languages.js")}} " ></script>
    {{-- carga de funciones para crud nacionalidades--}}
    <script src="{{asset("js/nationalities.js")}} " ></script>
    {{-- carga de funciones para crud plantillas de email--}}
    <script src="{{asset("js/email-templates.js")}} " ></script>
    {{-- carga de funciones para crud eventos --}}
    <script src="{{asset("js/eventos.js")}} " ></script>
    <script src="{{asset("js/eventos-edit.js")}} " ></script>
    {{-- carga de funciones para gestion de peticiones --}}
    <script src="{{asset("js/peticiones.js")}} " ></script>
    {{-- carga funciones para logisita y autorizador  --}}
    <script src="{{asset("js/peticiones-autorizador-logistica.js")}} " ></script>
    {{-- carga funciones usuarios sistema  --}}
    <script src="{{asset("js/users.js")}} " ></script>

    {{-- @endif --}}


    {{-- other js --}}
    {{-- ckeditor --}}
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>

    <style>

        .modal {
            overflow-y:auto;
        }

        .header-navbar .navbar-wrapper .navbar-logo{ justify-content: center; }
    </style>

</head>

<body>
{{--    <div class="loader d-none"></div>--}}

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner">
            </div>
        </div>
    </div>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <!-- [ Header ] start -->
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                    <a href="{{Session::get('myhome') }}">
                            <img class="img-fluid" src="../files/assets/images/marenostrum-logo.png" width="125" style="padding-left:10px;" alt="appcess logo" />
                        </a>
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                    <i class="full-screen feather icon-maximize"></i>
                                </a>
                            </li>
                          </ul>
                        <ul class="nav-right">


                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                    <strong>{{ Auth::user()->dep }}  </strong>    <strong>  </strong>
                                        <i class="icon feather icon-user"></i> {{ Auth::user()->name }}
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li class="drp-u-details">
                                               <span>  {{ Auth::user()->name }} </span>
                                        </li>

                                         <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();" tkey="menu_usuario__cerrar_sesion">
                                             {{ __('Tancar sessió') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>


                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <!-- [ navigation menu ] start -->
                    <nav class="pcoded-navbar">
                        <div class="nav-list">
                            <div class="pcoded-inner-navbar main-menu">

                                @if(  (Auth::user()->hasRole('admin')) || (Auth::user()->hasRole('superadmin'))  || (Auth::user()->hasRole('gestor')))
                                {{-- <div class="pcoded-navigation-label">CÀRREGA D'INFORMACIÓ</div> --}}
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu ">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
            								<span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                            <span class="pcoded-mtext menu-items-font-size" tkey="menu_carga_datos">CÀRREGA DADES</span>
                                        </a>


                                        <ul class="pcoded-submenu">
                                            <li class="pcoded-hasmenu ">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                                    <span class="pcoded-mtext " tkey="menu_carga_datos__ubicaciones">Ubicacions</span>
                                                </a>
                                                <ul class="pcoded-submenu">

                                                    <li class="">
                                                    <a href="#" class="waves-effect waves-dark" onclick="mostrarPanelUbicaciones()">
                                                            <span class="pcoded-mtext" tkey="menu_carga_datos__ubicaciones__ubicacion" >Ubicació </span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                    <a href="#" class="waves-effect waves-dark" onclick="mostrarPanelActividades()">
                                                            <span class="pcoded-mtext" tkey="menu_carga_datos__ubicaciones__tipologia_actividad">Tipologia activitat </span>
                                                        </a>
                                                    </li>

                                                    <li class="">
                                                    <a href="#" target="" class="waves-effect waves-dark" onclick="mostrarPanelSectores()">
                                                            <span class="pcoded-mtext" tkey="menu_carga_datos__ubicaciones__sector">Sector </span>
                                                        </a>
                                                    </li>

                                                    <li class="">
                                                    <a href="#"  class="waves-effect waves-dark" onclick="mostrarPanelZonas()">
                                                            <span class="pcoded-mtext" tkey="menu_carga_datos__ubicaciones__zona">Zona </span>
                                                        </a>
                                                    </li>

                                                 </ul>
                                            </li>
                                        </ul>


                                        <ul class="pcoded-submenu">
                                            <li class="pcoded-hasmenu ">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                                    <span class="pcoded-mtext"  tkey="menu_carga_datos__eventos">Esdeveniments</span>
                                                </a>
                                                <ul class="pcoded-submenu">

                                                    <li class="">
                                                    <a href="#" class="waves-effect waves-dark" onclick="mostrarPanelTipologiaActividad()">
                                                            <span class="pcoded-mtext"   tkey="menu_carga_datos__eventos_tipologia_eventos">Tipología esdeveniments </span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#" target="" class="waves-effect waves-dark">
                                                            {{-- <span class="pcoded-mtext" style="color:gray;">Calendari </span> --}}
                                                            <span class="pcoded-mtext" style="color:gray;"   tkey="menu_carga_datos__eventos_calendario">Calendari </span>
                                                        </a>
                                                    </li>

                                                    <li class="">
                                                    <a href="#"  class="waves-effect waves-dark" onclick="mostrarPanelTipoInvitacion()">
                                                            <span class="pcoded-mtext"   tkey="menu_carga_datos__eventos_tipos_invitaciones">Tipus invitacions </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>

                                        <ul class="pcoded-submenu">
                                            <li class="pcoded-hasmenu ">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class=""></i></span>
                                                    <span class="pcoded-mtext" tkey="menu_carga_datos__peticiones" >Peticions</span>
                                                </a>
                                                <ul class="pcoded-submenu">


                                                    <li class="">
                                                    <a href="#"  class="waves-effect waves-dark" onclick="mostrarPanelMotivos()">
                                                            <span class="pcoded-mtext"  tkey="menu_carga_datos__peticiones_motivos">Motius </span>
                                                        </a>
                                                    </li>

                                                    <li class="">
                                                    <a href="#"  class="waves-effect waves-dark" onclick="mostrarPanelFinalidades()">
                                                            <span class="pcoded-mtext" tkey="menu_carga_datos__peticiones_finalidades" >Finalitat </span>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </li>
                                        </ul>


                                        <ul class="pcoded-submenu">
                                            <li class="pcoded-hasmenu ">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class=""></i></span>
                                                    <span class="pcoded-mtext "  tkey="menu_carga_datos__bbdd">Base de datos</span>
                                                </a>
                                                <ul class="pcoded-submenu">

                                                    <li class="">
                                                    <a href="#" class="waves-effect waves-dark" onclick="mostrarPanelAreas()">
                                                            <span class="pcoded-mtext"   tkey="menu_carga_datos__bbdd__areas">Àrees</span>
                                                        </a>
                                                    </li>

                                                    <li class="">
                                                    <a href="#" class="waves-effect waves-dark" onclick="mostrarPanelDepartamentos()">
                                                            <span class="pcoded-mtext"  tkey="menu_carga_datos__bbdd__departamentos">Departaments</span>
                                                        </a>
                                                    </li>

                                                    <li class="">
                                                        <a href="#" class="waves-effect waves-dark" onclick="mostrarPanelAsistentes()">
                                                            <span class="pcoded-mtext"  tkey="menu_carga_datos__bbdd_asistentes" >Assistents </span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                    <a href="#"  class="waves-effect waves-dark" onclick="mostrarPanelProhibodos()">
                                                            <span class="pcoded-mtext"   tkey="menu_carga_datos__bbdd_prohibiciones">Prohibicions </span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#" target="" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext" style="color:gray;"   tkey="menu_carga_datos__bbdd_empleados">Empleats </span>
                                                        </a>
                                                    </li>

                                                    <li class="">
                                                        <a href="#"  class="waves-effect waves-dark" onclick="mostrarPanelPrincipalUsuariosSistema()">
                                                            <span class="pcoded-mtext"   tkey="menu_carga_datos__bbdd_usuarios_sistema">Usuaris Sistema </span>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </li>
                                        </ul>

                                        <ul class="pcoded-submenu">
                                            <li class="pcoded-hasmenu ">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class=""></i></span>
                                                    <span class="pcoded-mtext"    tkey="menu_carga_datos__imagen_corp">Imatge Corp</span>
                                                </a>
                                                <ul class="pcoded-submenu">

                                                    <li class="">
                                                    <a href="#" class="waves-effect waves-dark" onclick="mostrarPanelPlantillasEmail()">
                                                            <span class="pcoded-mtext"    tkey="menu_carga_datos__imagen_corp__plantillas">Plantilles </span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#" target="" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext"  style="color:gray;"   tkey="menu_carga_datos__imagen_corp__branding">Branding </span>
                                                        </a>
                                                    </li>

                                                    {{-- <li class="">
                                                        <a href="#" target="" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext"  style="color:gray;"    tkey="menu_carga_datos__imagen_corp__textos_legales">Textes legals </span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#" target="" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext"  style="color:gray;"    tkey="menu_carga_datos__imagen_corp__mensajes_standard">Missatges standards </span>
                                                        </a>
                                                    </li> --}}

                                                </ul>
                                            </li>
                                        </ul>

                                        <ul class="pcoded-submenu">
                                            <li class="pcoded-hasmenu ">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class=""></i></span>
                                                    <span class="pcoded-mtext"  tkey="menu_carga_datos__configuracion">Configuració</span>
                                                </a>
                                                <ul class="pcoded-submenu">

                                                    <li class="">
                                                        <a href="#"  class="waves-effect waves-dark" onclick="mostrarPanelIdiomas()">
                                                                <span class="pcoded-mtext" tkey="menu_carga_datos__configuracion__idiomas" >Idiomes </span>
                                                            </a>
                                                        </li>
    
                                                        <li class="">
                                                        <a href="#"  class="waves-effect waves-dark" onclick="mostrarPanelNacionalidades()">
                                                                <span class="pcoded-mtext"  tkey="menu_carga_datos__configuracion__nacionalidades" >Nacionalitats </span>
                                                            </a>
                                                        </li>



                                                    <li class="">
                                                        <a href="#" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext"  style="color:gray;"  tkey="menu_carga_datos__configuracion_roles">Rols </span>
                                                        </a>
                                                    </li>
                                                    {{-- <li class="">
                                                        <a href="#" target="" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext"  style="color:gray;"  tkey="menu_carga_datos__configuracion_permisos">Permisos </span>
                                                        </a>
                                                    </li> --}}
                                                    <li class="">
                                                        <a href="#" target="" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext"  style="color:gray;"  tkey="menu_carga_datos__configuracion__servidores">Servidors </span>
                                                        </a>
                                                    </li>

                                                    <li class="">
                                                        <a href="#" target="" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext"  style="color:gray;"  tkey="menu_carga_datos__configuracion__otros">Altres </span>
                                                        </a>
                                                    </li>
                                                    {{-- <li class="">
                                                        <a href="#" target="" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext"  style="color:gray;"  tkey="menu_carga_datos__configuracion__notificaciones">Notificacions </span>
                                                        </a>
                                                    </li> --}}
                                                </ul>
                                            </li>
                                        </ul>

                                    </li>  {{-- carrega dades --}}

                                </ul>
                                @endif
                                {{-- fin nuevo menu carga datos --}}

                                {{-- gestio esdeveniments --}}
                                @if(  (Auth::user()->hasRole('admin'))  || (Auth::user()->hasRole('gestor')) || (Auth::user()->hasRole('superadmin')) )
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu " >
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
            								<span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                            <span class="pcoded-mtext menu-items-font-size"  tkey="menu_gestion_eventos">GESTIÓ ESDEVENIMENTS</span>
                                        </a>

                                        <ul class="pcoded-submenu">
                                            <li class="pcoded-hasmenu ">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                                    <span class="pcoded-mtext"  tkey="menu_gestion_eventos__eventos">Esdeveniments</span>
                                                </a>
                                                <ul class="pcoded-submenu">

                                                    <li class="">
                                                        <a href="#" class="waves-effect waves-dark" onclick="menuCrearEvento()">
                                                            <span class="pcoded-mtext"  tkey="menu_gestion_eventos__eventos__crear">Crear </span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                    <a href="#"  class="waves-effect waves-dark" onclick="mostrarPanelEventos()">
                                                            <span class="pcoded-mtext"   tkey="menu_gestion_eventos__eventos__listar">Llistar </span>
                                                        </a>
                                                    </li>

                                                    <li class="d-none">
                                                        <a href="#" target="" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext" style="color:gray;"   tkey="menu_gestion_eventos__calendario">Calendari </span>
                                                        </a>
                                                    </li>
        
        
                                                    <li class="d-none">
                                                        <a href="#" class="waves-effect waves-dark"  onclick="mostrarPanelEventos()">
                                                            <span class="pcoded-mtext"    tkey="menu_gestion_eventos__entradas_y_cupos">Entrades i cupos </span>
                                                        </a>
                                                    </li>
                                                    
                                                </ul>
                                            </li>

   
                                        </ul>


                                        <ul class="pcoded-submenu">
                                            <li class="pcoded-hasmenu ">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                                    <span class="pcoded-mtext"  tkey="menu_gestion_eventos__bbdd">BBDD</span>
                                                </a>
                                                <ul class="pcoded-submenu">

                                                    <li class="">

                                                        <a href="#"  class="waves-effect waves-dark" onclick="mostrarPanelPrincipalUsuariosSistema()">
                                                            <span class="pcoded-mtext" tkey="menu_gestion_eventos__bbdd__usuarios_sistema">Usuaris Sistema </span>
                                                        </a>


                                                    </li>
                                                    <li class="">
                                                        <a href="#" class="waves-effect waves-dark" onclick="mostrarPanelProhibodos()">
                                                            <span class="pcoded-mtext"  tkey="menu_gestion_eventos__bbdd__prohibiciones">Prohibicions </span>
                                                        </a>
                                                    </li>

                                                    <li class="">
                                                        <a href="#" target="" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext" style="color:gray;"  tkey="menu_gestion_eventos__bbdd__empleados">Empleats </span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#"  class="waves-effect waves-dark" onclick="mostrarPanelAsistentes()">
                                                            <span class="pcoded-mtext"  tkey="menu_gestion_eventos__bbdd__asistentes">Assistents </span>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </li>


                                            <li class="">
                                                <a href="#" target="" class="waves-effect waves-dark"  onclick="mostrarPanelPlantillasEmail()">
                                                    <span class="pcoded-mtext" tkey="menu_gestion_eventos__bbdd__plantillas">Plantilles </span>
                                                </a>
                                            </li>


                                        </ul>
                                    </li>
                                </ul>
                                @endif
                                {{-- fin gestio esdeveniments --}}

                                {{-- menu peticionario  --}}
                                @if(  (Auth::user()->hasRole('empleado'))  || (Auth::user()->hasRole('peticionario'))   || (Auth::user()->hasRole('gestor'))  || (Auth::user()->hasRole('superadmin')))
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu ">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
            								<span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                            <span class="pcoded-mtext menu-items-font-size"  tkey="menu_peticiones">PETICIONS</span>
                                        </a>


                                        <ul class="pcoded-submenu">
                                            <li class="pcoded-hasmenu ">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                                    <span class="pcoded-mtext"  tkey="menu_peticiones__peticiones">Peticions</span>
                                                </a>
                                                <ul class="pcoded-submenu">

                                                    <li class="">
                                                        <a href="#" class="waves-effect waves-dark" onclick="mostrarPanelPeticiones()">
                                                            <span class="pcoded-mtext"   tkey="menu_peticiones__peticiones__listar">Llistar </span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#"  class="waves-effect waves-dark" onclick="mostrarPanelEventosSolicitudPeticiones()">
                                                            <span class="pcoded-mtext"   tkey="menu_peticiones__peticiones__nueva_peticion">Nova petició </span>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </li>


                                            {{-- <li class="pcoded-hasmenu ">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                                    <span class="pcoded-mtext"  tkey="menu_peticiones__peticiones__bbdd">BBDD</span>
                                                </a>
                                                <ul class="pcoded-submenu">

                                                     <li class="">
                                                        <a href="#"  class="waves-effect waves-dark"  onclick="mostrarPanelAsistentes()">
                                                            <span class="pcoded-mtext"   tkey="menu_peticiones__peticiones__bbdd__asistentes">Assistents </span>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </li> --}}

                                            {{-- <li class="pcoded-hasmenu ">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                                    <span class="pcoded-mtext"  tkey="menu_peticiones__peticiones__bbdd__listados" >Llistats</span>
                                                </a>
                                                <ul class="pcoded-submenu">

                                                    <li class="">
                                                        <a href="#" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext"  style="color:gray;"  tkey="menu_peticiones__peticiones__bbdd__listados_listados">Llistats </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li> --}}
                                        </ul>
                                    </li>
                                    @endif

                                </ul>
                                {{-- fin peticionario --}}

                                {{-- menu autorizador  --}}
                                 {{-- @if(  (Auth::user()->hasRole('autorizador'))   || (Auth::user()->hasRole('superadmin')) )
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu ">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
            								<span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                            <span class="pcoded-mtext menu-items-font-size"  tkey="menu_autorizaciones">AUTORITZACIONS</span>
                                        </a>


                                        <ul class="pcoded-submenu">
                                            <li class="pcoded-hasmenu ">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                                    <span class="pcoded-mtext"  tkey="menu_autorizaciones__peticiones">Peticions</span>
                                                </a>
                                                <ul class="pcoded-submenu">

                                                    <li class="">
                                                        <a href="#" class="waves-effect waves-dark" onclick="mostrarPanelPrincipalAutorizador()">
                                                            <span class="pcoded-mtext"  tkey="menu_autorizaciones__peticiones__listar">Llistar </span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#" class="waves-effect waves-dark" onclick="mostrarPanelPrincipalAutorizador()">
                                                            <span class="pcoded-mtext"  tkey="menu_autorizaciones__peticiones_autorizar">Autoritzar </span>
                                                        </a>
                                                    </li>
                                                </ul>



                                            </li>

                                      
                                        </ul>
                                    </li>
                                    @endif


                                </ul> --}}
                                {{-- fin autorizador --}}


                                {{-- menu gestion envios --}}
                                {{-- menu logistica  --}}

                                {{-- @if(  (Auth::user()->hasRole('admin')) ||  (Auth::user()->hasRole('gestor'))   || (Auth::user()->hasRole('logistica'))   || (Auth::user()->hasRole('superadmin')) )
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu ">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
            								<span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                            <span class="pcoded-mtext menu-items-font-size" tkey="menu_logistica">LT</span>
                                        </a>


                                        <ul class="pcoded-submenu">
                                            <li class="pcoded-hasmenu ">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                                    <span class="pcoded-mtext"  tkey="menu_logistica__peticiones">Peticions</span>
                                                </a>
                                                <ul class="pcoded-submenu">

                                                    <li class="">
                                                        <a href="#" class="waves-effect waves-dark" onclick="mostrarPanelPrincipalLogistica()">
                                                            <span class="pcoded-mtext"  tkey="menu_logistica__peticiones__listar">Llistar </span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#" class="waves-effect waves-dark" onclick="mostrarPanelPrincipalLogistica()">
                                                            <span class="pcoded-mtext"  tkey="menu_logistica__peticiones__asignar">Assignar </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <li class="">
                                                    <a href="#" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext" style="color:gray;" tkey="menu_logistica__calendario">Calendari </span>
                                                    </a>
                                                </li>
                                            </li>
                                         
                                        </ul>
                                    </li>
                                </ul>
                                @endif --}}
                                {{-- fin menu logistica --}}

                                {{-- menu informes  --}}
                                @if(  (Auth::user()->hasRole('admin'))  ||  (Auth::user()->hasRole('gestor'))  ||  (Auth::user()->hasRole('logistica'))  || (Auth::user()->hasRole('superadmin')) )
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu ">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                             <span class="pcoded-mtext menu-items-font-size"  tkey="menu_informes">INFORMES</span>
                                       </a>


                                    <ul class="pcoded-submenu">
                                        <li class="pcoded-hasmenu ">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                                <span class="pcoded-mtext"  tkey="menu_informes__informes">Informes</span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class="">
                                                    <a href="#" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext"  style="color:gray;"  tkey="menu_informes__informes__peticiones">Peticions </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    </li>
                                </ul>
                                @endif
                                {{-- fin bloque informes  --}}
                            </ul>

                            </div>
                            {{-- fin bloque menu --}}

                        </div>
                    </nav>
                    <!-- [ navigation menu ] end -->

                    <div class="pcoded-content">
                        <!-- [ breadcrumb ] start -->
                        @yield('breadcrumbs')
                        <!-- [ breadcrumb ] end -->

                        {{-- contenido variable para los encabezados --}}
                        <div id="breadCrumbsContent">
                        </div>

                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <!-- Page-body start -->
                                    <div class="page-body">

                                        <div id="editModalContent">

                                        </div>

                                        <div id="modalAsistentesModalContent">

                                        </div>

                                        {{-- contenido principal layout variable  --}}
                                        <div id="mainContent">
                                        </div>

                                        {{-- carga de ventanas modales --}}
                                        @include ('locations.partials.locations-modal')
                                        @include ('activity.partials.activity-modal')
                                        @include ('sectors.partials.sectors-modal')
                                        @include ('zones.partials.zones-modal')
                                        @include ('activity-type.partials.activity-types-modal')
                                        @include ('invitation-types.partials.invitation-types-modal')
                                        @include ('editpurposes.partials.edit-purposes-modal')
                                        @include ('purposes.partials.purpose-modal')
                                        @include ('areas.partials.areas-modal')
                                        @include ('departments.partials.departments-modal')
                                        @include ('guests.partials.guests-modal')
                                        @include ('bans.partials.bans-modal')
                                        @include ('languages.partials.languages-modal')
                                        @include ('nationalities.partials.nationalities-modal')
                                        @include ('emailtemplates.partials.email-templates-main-panel-modal')
                                        @include ('events.partials.create-event')
                                        {{-- @include ('events.partials.edit-event') --}}
                                        @include('events.partials.template-editor')

                                        {{-- modales para peticiones  --}}
                                        @include('invitation.partials.order-modal')
                                        @include('invitation.partials.order-modal-asistentes')
                                        @include('invitation.partials.order-modal-peticion-resumen')

                                        {{-- modales para autorizador y logistica  --}}
                                        @include('invitation.partials.order-modal-peticion-ver-autorizador')
                                        @include('invitation.partials.order-modal-autorizador-modificar')
                                        @include('invitation.partials.order-modal-autorizador-cancelar')

                                        @include('invitation.partials.order-modal-logistica-asignar')
                                        @include('invitation.partials.order-modal-logistica-asignar-enviar')

                                        {{-- peticion nivel cero peticionario  --}}
                                        @include('invitation.partials.order-modal-enviar-peticion-nivel-cero')
                                        
                                        {{-- usuarios sistema  --}}
                                        @include('users.partials.users-modal')

                                        @yield('content')

                                    </div>
                                    {{-- page body ends --}}
                                </div>

                                <div class="row text-center mt-5">
                                    <div class="col">
                                        <img class="img-fluid" src="../files/assets/images/appcesslogoblack.png" width="90" style="" alt="appcess logo" />
                                    </div>
                                </div>
                                
                                <div class="row text-center mt-5">
                                    <div class="col">
                                        <a href="/avisolegal" target="_blank" tkey="footer__aviso_legal">Avis Legal</a> |
                                        <a href="/privacidad" target="_blank" tkey="footer__privacidad">Privacitat</a>
                                    </div>
                                </div>
                                <br>


                            </div>
                            <!-- Page-body end -->
                        </div>
                    </div>
                </div>
                <!-- [ style Customizer ] start -->
                <div id="styleSelector">
                </div>
                <!-- [ style Customizer ] end -->
            </div>

        </div>

    </div>


    <!-- Required Jquery -->
    <script type="text/javascript" src="../files/bower_components/jquery/js/jquery.min.js"></script>

    <script type="text/javascript" src="../files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../files/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="../files/bower_components/bootstrap/js/bootstrap.min.js"></script>


    {{-- <script type="text/javascript" src="../files/assets/js/pace.min.js"></script> --}}

    <!-- waves js -->
    <script src="../files/assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="../files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
      <!-- amchart js -->
    <script src="../files/assets/pages/widget/amchart/amcharts.js"></script>
    <script src="../files/assets/pages/widget/amchart/serial.js"></script>
    <script src="../files/assets/pages/widget/amchart/light.js"></script>
    <!-- Chartlist charts -->
    <script src="../files/bower_components/chartist/js/chartist.js"></script>
    <!-- Custom js -->
    <script src="../files/assets/js/pcoded.js"></script>
    <script src="../files/assets/js/vertical/vertical-layout.min.js"></script>
    <script type="text/javascript" src="../files/assets/pages/dashboard/custom-dashboard.min.js"></script>
    <script type="text/javascript" src="../files/assets/js/script.min.js"></script>


    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"> </script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <script src="../files/assets/extensions/Editor/js/dataTables.editor.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    {{-- chosen  --}}

    <script src="../files/assets/chosen/chosen.jquery.js" type="text/javascript"></script>
    <script src="../files/assets/chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
    <script src="../files/assets/chosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>

    {{-- maskedinput --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

    {{-- momentJS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.25.3/moment-with-locales.min.js"></script>


    <script>

        function testLoadTable() {

            $( "#mainContent" ).load( "./myhtml.html", function() {

                    $('#myDataTable').DataTable({
                        columns: [
                            {name:"id", data:"id",title:"my ID"},
                            {name:"nombre", data:"nombre", title:"Nombre"},
                        ],

                        ajax: {
                            url: "http://127.0.0.1:8000/areas"
                        },
                    });

            });
        }

        function mostrarPanelUbicaciones() {


            $( "#breadCrumbsContent" ).load( "./partialhtml/location/location-bc.html", function() {
            });

            $( "#mainContent" ).load( "./partialhtml/location/location-index.html", function() {

                cuposYEntradasTable = $('#locationsTable').DataTable( {
                    "scrollX": true,
                    "ajax": {
                        "url": "/getLocationsall",
                        "type": "GET",
                        "datatype": "json"
                    },

                    columns: [
                        { data: "id" ,visible: false },
                        { data: "nombre" , "title" : PANEL_UBICACIONES__TABLA__HEADERS.nombre },

                        { "defaultContent": "  <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'></a>     <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectDelete'>      </a>  ", "title" : "" , "width":"10%"}  ,
                    ],

                    "language": tablesLang

                } );


                $('#locationsTable').on('click', '#selectEdit', function (e) {

                    e.preventDefault();
                    var currentRow = $(this).closest("tr");
                    var data = $('#locationsTable').DataTable().row(currentRow).data();

                    editLocation(data)

                });

                $('#locationsTable').on('click', '#selectDelete', function (e) {

                    e.preventDefault();
                    var currentRow = $(this).closest("tr");
                    var data = $('#locationsTable').DataTable().row(currentRow).data();

                    deleteLocation( data )
                });
                updateTranslations()
            });
         
        } // funcion

        function mostrarPanelActividades () {


            $( "#breadCrumbsContent" ).load( "./partialhtml/activity/activity-bc.html", function() {
            });

            $( "#mainContent" ).load( "./partialhtml/activity/activity-index.html", function() {

                cuposYEntradasTable = $('#activitiesTable').DataTable( {
                    "scrollX": true,
                    "ajax": {
                        "url": "/getActividadsall",
                        "type": "GET",
                        "datatype": "json"
                    },

                    columns: [
                        { data: "id" ,visible: false },
                        { data: "location_id" ,visible: false },
                        { data: "name" , "title" : PANEL_ACTIVIDADES__TABLA__HEADERS.nombre },

                        { "defaultContent": "  <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'></a>     <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectDelete'>      </a>  ", "title" : "" , "width":"10%"}  ,
                    ],

                    "language": tablesLang

                } );


                $('#activitiesTable').on('click', '#selectEdit', function (e) {

                    e.preventDefault();
                    var currentRow = $(this).closest("tr");
                    var data = $('#activitiesTable').DataTable().row(currentRow).data();

                    editActivity(data)

                });

                $('#activitiesTable').on('click', '#selectDelete', function (e) {

                    e.preventDefault();
                    var currentRow = $(this).closest("tr");
                    var data = $('#activitiesTable').DataTable().row(currentRow).data();

                    deleteActivity( data )

                });

                crearListaUbicaciones();
                updateTranslations()
            }
            );
            // updateTranslations()
        }

        function mostrarPanelSectores () {

            $( "#breadCrumbsContent" ).load( "./partialhtml/sector/sector-bc.html", function() {
            });


            $( "#mainContent" ).load( "./partialhtml/sector/sector-index.html", function() {

                cuposYEntradasTable = $('#sectorsTable').DataTable( {
                    "scrollX": true,
                    "ajax": {
                    "url": "/getSectorssall",
                    "type": "GET",
                    "datatype": "json"
                },

                columns: [
                { data: "id" ,visible: false },
                { data: "location_id" ,visible: false },
                { data: "nombre" , "title" : PANEL_SECTOR__TABLA__HEADERS.nombre },

                { "defaultContent": "  <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'></a>     <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectDelete'>      </a>  ", "title" : "" , "width":"10%"}  ,
                ],

                "language": tablesLang

                } );


                $('#sectorsTable').on('click', '#selectEdit', function (e) {

                e.preventDefault();
                var currentRow = $(this).closest("tr");
                var data = $('#sectorsTable').DataTable().row(currentRow).data();

                editSector(data)

                });

                $('#sectorsTable').on('click', '#selectDelete', function (e) {

                e.preventDefault();
                var currentRow = $(this).closest("tr");
                var data = $('#sectorsTable').DataTable().row(currentRow).data();

                deleteSector( data )

                });

                crearListaUbicacionesForSectors();
                updateTranslations()
                }
            );
            // updateTranslations()
        }

        function mostrarPanelZonas () {

            $( "#breadCrumbsContent" ).load( "./partialhtml/zonas/zonas-bc.html", function() {
            });


            $( "#mainContent" ).load( "./partialhtml/zonas/zonas-index.html", function() {


                cuposYEntradasTable = $('#zonesTable').DataTable( {
                "scrollX": true,
                "ajax": {
                    "url": "/getZonassall",
                    "type": "GET",
                    "datatype": "json"
                },

                columns: [
                    { data: "id" ,visible: false },
                    { data: "location_id" ,visible: false },
                    { data: "sector_id" ,visible: false },
                    { data: "nombre" , "title" : PANEL_ZONAS__TABLA__HEADERS.nombre },

                    { "defaultContent": "  <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'></a>     <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectDelete'>      </a>  ", "title" : "" , "width":"10%"}  ,
                ],

                "language": tablesLang

                } );


                $('#zonesTable').on('click', '#selectEdit', function (e) {

                    e.preventDefault();
                    var currentRow = $(this).closest("tr");
                    var data = $('#zonesTable').DataTable().row(currentRow).data();

                    editZona(data)

                });

                $('#zonesTable').on('click', '#selectDelete', function (e) {

                    e.preventDefault();
                    var currentRow = $(this).closest("tr");
                    var data = $('#zonesTable').DataTable().row(currentRow).data();

                    deleteZona( data )

                });

                crearListaUbicacionesForZones()
                //crearListaSectoresForZones();
                updateTranslations()
                }
            );
            // updateTranslations()[`""]
        }

        function mostrarPanelTipologiaActividad() {

            $( "#breadCrumbsContent" ).load( "./partialhtml/activity-type/activity-type-bc.html", function() {
            });


            $( "#mainContent" ).load( "./partialhtml/activity-type/activity-type-index.html", function() {

                cuposYEntradasTable = $('#activitiesTypeTable').DataTable( {
                    "scrollX": true,
                    "ajax": {
                        "url": "/getTipoActividadsall",
                        "type": "GET",
                        "datatype": "json"
                    },

                    columns: [
                        { data: "id" ,visible: false },
                        { data: "activity_id" ,visible: false },
                        { data: "name" , "title" : PANEL_TIPO_ACTIVIDAD__TABLA__HEADERS.nombre },

                        { "defaultContent": "  <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'></a>     <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectDelete'>      </a>  ", "title" : "" , "width":"10%"}  ,
                    ],

                    "language": tablesLang

                } );


                $('#activitiesTypeTable').on('click', '#selectEdit', function (e) {

                    e.preventDefault();
                    var currentRow = $(this).closest("tr");
                    var data = $('#activitiesTypeTable').DataTable().row(currentRow).data();

                    editActivityType(data)

                    });

                $('#activitiesTypeTable').on('click', '#selectDelete', function (e) {

                e.preventDefault();
                var currentRow = $(this).closest("tr");
                var data = $('#activitiesTypeTable').DataTable().row(currentRow).data();

                deleteActivityType( data )

                });

                crearListaActividadesForTipologiaActividad();
                
                updateTranslations()
            }
            );
        }

        function mostrarPanelTipoInvitacion() {

            $( "#breadCrumbsContent" ).load( "./partialhtml/invitation-type/invitation-type-bc.html", function() {
            });

            $( "#mainContent" ).load( "./partialhtml/invitation-type/invitation-type-index.html", function() {

                cuposYEntradasTable = $('#invitationsTypeTable').DataTable( {
                    "scrollX": true,
                    "ajax": {
                        "url": "/getInvitationTypesall",
                        "type": "GET",
                        "datatype": "json"
                    },

                    columns: [
                        { data: "id" ,visible: false },
                        { data: "nombre" , "title" : PANEL_TIPO_INVITACION__TABLA__HEADERS.nombre },

                        { "defaultContent": "  <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'></a>     <a href='#' class='btn btn-danger btn-sm feather icon-trash d-none' id='selectDelete'>      </a>  ", "title" : "" , "width":"5%"}  ,
                    ],

                    "language": tablesLang

                } );

                $('#invitationsTypeTable').on('click', '#selectEdit', function (e) {

                    e.preventDefault();
                    var currentRow = $(this).closest("tr");
                    var data = $('#invitationsTypeTable').DataTable().row(currentRow).data();

                    editInvitationType(data)

                });

                $('#invitationsTypeTable').on('click', '#selectDelete', function (e) {

                    e.preventDefault();
                    var currentRow = $(this).closest("tr");
                    var data = $('#invitationsTypeTable').DataTable().row(currentRow).data();

                    deleteInvitationType( data )

                });

                updateTranslations()
           }
           );

        }

        function mostrarPanelMotivos() {

            $( "#breadCrumbsContent" ).load( "./partialhtml/motivos/motivos-bc.html", function() {
            });

            $( "#mainContent" ).load( "./partialhtml/motivos/motivos-index.html", function() {

                cuposYEntradasTable = $('#editPurposesTable').DataTable( {
                    "scrollX": true,
                    "ajax": {
                        "url": "/geteditpurposesall",
                        "type": "GET",
                        "datatype": "json"
                    },

                    columns: [
                        { data: "id" ,visible: false },
                        { data: "name" , "title" : PANEL_MOTIVOS__TABLA__HEADERS.nombre },

                        { "defaultContent": "  <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'></a>     <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectDelete'>      </a>  ", "title" : "" , "width":"10%"}  ,
                    ],

                    "language": tablesLang

                } );

                $('#editPurposesTable').on('click', '#selectEdit', function (e) {

                    e.preventDefault();
                    var currentRow = $(this).closest("tr");
                    var data = $('#editPurposesTable').DataTable().row(currentRow).data();

                    editEditPurpose(data)

                });

                $('#editPurposesTable').on('click', '#selectDelete', function (e) {

                    e.preventDefault();
                    var currentRow = $(this).closest("tr");
                    var data = $('#editPurposesTable').DataTable().row(currentRow).data();

                    deleteEditPurpose( data )

                });
                updateTranslations()
            }
          );

        }

        function mostrarPanelFinalidades() {

            $( "#breadCrumbsContent" ).load( "./partialhtml/finalidades/finalidades-bc.html", function() {
            });

            $( "#mainContent" ).load( "./partialhtml/finalidades/finalidades-index.html", function() {

                cuposYEntradasTable = $('#purposesTable').DataTable( {
                "scrollX": true,
                "ajax": {
                    "url": "/getpurposesall",
                    "type": "GET",
                    "datatype": "json"
                },

                columns: [
                    { data: "id" ,visible: false },
                    { data: "name" , "title" : PANEL_FINALIDADES__TABLA__HEADERS.nombre },

                    { "defaultContent": "  <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'></a>     <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectDelete'>      </a>  ", "title" : "" , "width":"10%"}  ,
                ],

                "language": tablesLang

            } );


            $('#purposesTable').on('click', '#selectEdit', function (e) {

                e.preventDefault();
                var currentRow = $(this).closest("tr");
                var data = $('#purposesTable').DataTable().row(currentRow).data();


                editPurpose(data)

            });

            $('#purposesTable').on('click', '#selectDelete', function (e) {

                e.preventDefault();
                var currentRow = $(this).closest("tr");
                var data = $('#purposesTable').DataTable().row(currentRow).data();
                deletePurpose( data )

            });

            updateTranslations()

           }
         );
        }

        function mostrarPanelAreas() {

            $( "#breadCrumbsContent" ).load( "./partialhtml/areas/areas-bc.html", function() {
            });

            $( "#mainContent" ).load( "./partialhtml/areas/areas-index.html", function() {

                cuposYEntradasTable = $('#areasTable').DataTable( {
                    "scrollX": true,
                    "ajax": {
                        "url": "/getAreassall",
                        "type": "GET",
                        "datatype": "json"
                    },

                    columns: [
                        { data: "id" ,visible: false },
                        { data: "nombre" , "title" : PANEL_AREAS__TABLA__HEADERS.nombre },

                        { "defaultContent": "  <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'></a>     <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectDelete'>      </a>  ", "title" : "" , "width":"10%"}  ,
                    ],

                    "language": tablesLang

                } );

                $('#areasTable').on('click', '#selectEdit', function (e) {

                    e.preventDefault();
                    var currentRow = $(this).closest("tr");
                    var data = $('#areasTable').DataTable().row(currentRow).data();

                    editArea(data)

                });

                $('#areasTable').on('click', '#selectDelete', function (e) {

                    e.preventDefault();
                    var currentRow = $(this).closest("tr");
                    var data = $('#areasTable').DataTable().row(currentRow).data();

                    deleteArea( data )

                });
                
                updateTranslations()
                }
            );
        }


        function mostrarPanelDepartamentos() {

            $( "#breadCrumbsContent" ).load( "./partialhtml/departamentos/departamentos-bc.html", function() {
            });

            $( "#mainContent" ).load( "./partialhtml/departamentos/departamentos-index.html", function() {

                cuposYEntradasTable = $('#departmentTable').DataTable( {
                    "scrollX": true,
                    "ajax": {
                        "url": "/getDepartmentssall",
                        "type": "GET",
                        "datatype": "json"
                   },

                    columns: [
                        { data: "id" ,visible: false },
                        { data: "area_id" ,visible: false },
                        { data: "nombre" , "title" : PANEL_DEPARTAMENTOS__TABLA__HEADERS.nombre },

                        { "defaultContent": "  <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'></a>     <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectDelete'>      </a>  ", "title" : "" , "width":"10%"}  ,
                    ],

                    "language": tablesLang

                } );


                $('#departmentTable').on('click', '#selectEdit', function (e) {

                    e.preventDefault();
                    var currentRow = $(this).closest("tr");
                    var data = $('#departmentTable').DataTable().row(currentRow).data();

                    editDepartment(data)

                });

                $('#departmentTable').on('click', '#selectDelete', function (e) {

                    e.preventDefault();
                    var currentRow = $(this).closest("tr");
                    var data = $('#departmentTable').DataTable().row(currentRow).data();

                    deleteDepartment( data )

                });

                crearListaAreasParaDepartamentosPanel();

                updateTranslations()
            }
            );
        }

        function mostrarPanelAsistentes() {
            $( "#breadCrumbsContent" ).load( "./partialhtml/asistentes/asistentes-bc.html", function() {
            });

            $( "#mainContent" ).load( "./partialhtml/asistentes/asistentes-index.html", function() {

                cargaSelectsGuests()

                setTimeout(() => {

                    $('#myGuestsTable').DataTable( {

                    "scrollX": true,
                    "ajax": {
                        "url": "/guests",
                        "type": "GET",
                        "datatype": "json"
                    },
                    "columns": [
                        {"data":"nombre", title: PANEL_ASISTENTES__TABLA__HEADERS.nombre},
                        {"data":"apellidos", title:PANEL_ASISTENTES__TABLA__HEADERS.apellidos},
                        {"data":"dni", title:PANEL_ASISTENTES__TABLA__HEADERS.dni},
                        {"data":"email", title:PANEL_ASISTENTES__TABLA__HEADERS.email},
                        {"data":"fecha_nacimiento", title:PANEL_ASISTENTES__TABLA__HEADERS.fecha_nacimiento,
                        "render": function (data, type, row, meta) {
                                    let myData =  moment(data).format('DD/MM/YYYY')

                                    if (myData != 'Invalid date') {
                                        data = myData
                                    } else {
                                        data = ''
                                    }

                                    return data
                                }

                        },

                        {"data":"nationality_id", title:PANEL_ASISTENTES__TABLA__HEADERS.nacionalidad,
                        render: function (data, type, row, meta) {
                                return listaNacionalidades[data - 1];

                            }

                        },
                        { "defaultContent": "  <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'></a>     <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectDelete'>      </a>  ", "title" : "" , "width":"10%"}  ,
                    ],

                    "language": tablesLang

                } );



                $('#myGuestsTable').on('click', '#selectEdit', function (e) {

                    e.preventDefault();
                    var currentRow = $(this).closest("tr");
                    var data = $('#myGuestsTable').DataTable().row(currentRow).data();

                    editGuest(data)

                });

                $('#myGuestsTable').on('click', '#selectDelete', function (e) {

                    e.preventDefault();
                    var currentRow = $(this).closest("tr");
                    var data = $('#myGuestsTable').DataTable().row(currentRow).data();

                    deleteGuest( data )

                });

                $('#myGuestInputDni').on("keyup", function () {

                if ($('#myGuestInputDni').val().length > 8) {
                    let searching = true;
                    let myUserDniToCheck = $('#myGuestInputDni').val();
                    // check database

                    if (searching) {
                        axios.get('/newguestcheck/' + myUserDniToCheck)
                            .then(response => {

                                // esta en la base de datos
                                if (response.data.data > 0 ) {

                                    Swal.fire(
                                        'Error!',
                                        "Aquest DNI ja existeix a la base de dades",
                                        'error'
                                    )
                                    $('#myGuestInputDni').val('')
                                    return;

                                }

                                searching = false;

                            })
                            .catch(function (error) {
                                console.log(error)
                            });
                    }

                }
                });

                }, 200);

                updateTranslations()
            }
            );


        }

        function mostrarPanelProhibodos() {
            $( "#breadCrumbsContent" ).load( "./partialhtml/prohibidos/prohibidos-bc.html", function() {
            });

            $( "#mainContent" ).load( "./partialhtml/prohibidos/prohibidos-index.html", function() {

                $('#myBansTable').DataTable( {

                "scrollX": true,
                "ajax": {
                    "url": "/bans",
                    "type": "GET",
                    "datatype": "json"
                },
                "columns": [
                    {"data":"ejercicio",title:PANEL_PROHIBIDOS__TABLA__HEADERS.ejercicio},
                    {"data":"expediente",title:PANEL_PROHIBIDOS__TABLA__HEADERS.expediente},
                    {"data":"fecha_resolucion",title:PANEL_PROHIBIDOS__TABLA__HEADERS.fecha_resolucion,
                
                    "render": function (data, type, row, meta) {
                                   let myData =  moment(data).format('DD/MM/YYYY')
                                    data = myData
                                    return data
                                }
                    },

                    {"data":"delegacion",title:PANEL_PROHIBIDOS__TABLA__HEADERS.delegacion},
                    {"data":"identificacion",title:PANEL_PROHIBIDOS__TABLA__HEADERS.identificacion},
                    {"data":"nombre",title:PANEL_PROHIBIDOS__TABLA__HEADERS.nombre},
                    {"data":"fecha_inicio",title:PANEL_PROHIBIDOS__TABLA__HEADERS.fecha_inicio,
                    "render": function (data, type, row, meta) {
                                   let myData =  moment(data).format('DD/MM/YYYY')
                                    data = myData
                                    return data
                                }
                    },

                    {"data":"fecha_fin",title:PANEL_PROHIBIDOS__TABLA__HEADERS.fecha_fin,
                    "render": function (data, type, row, meta) {
                                   let myData =  moment(data).format('DD/MM/YYYY')
                                    data = myData
                                    return data
                                }                    
                    },
                    { "defaultContent": "  <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'></a>     <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectDelete'>      </a>  ", "title" : "" , "width":"10%"}  ,
                ],

                "language": tablesLang

            } );



            $('#myBansTable').on('click', '#selectEdit', function (e) {

                e.preventDefault();
                var currentRow = $(this).closest("tr");
                var data = $('#myBansTable').DataTable().row(currentRow).data();

                editBan(data)

                });

                $('#myBansTable').on('click', '#selectDelete', function (e) {

                e.preventDefault();
                var currentRow = $(this).closest("tr");
                var data = $('#myBansTable').DataTable().row(currentRow).data();

                deleteBan( data )

                });

                updateTranslations()
            }
            );
        }

        function mostrarPanelIdiomas() {
            $( "#breadCrumbsContent" ).load( "./partialhtml/idiomas/idiomas-bc.html", function() {
            });

            $( "#mainContent" ).load( "./partialhtml/idiomas/idiomas-index.html", function() {

                cuposYEntradasTable = $('#languagesTable').DataTable( {
                    "scrollX": true,
                    "ajax": {
                        "url": "/getlanguagesall",
                        "type": "GET",
                        "datatype": "json"
                },

                columns: [
                    { data: "id" ,visible: false },
                    { data: "name" , "title" : PANEL_IDIOMAS__TABLA__HEADERS.nombre },

                    { "defaultContent": "  <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'></a>     <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectDelete'>      </a>  ", "title" : "" , "width":"10%"}  ,
                ],

                "language": tablesLang

                } );


                $('#languagesTable').on('click', '#selectEdit', function (e) {

                    e.preventDefault();
                    var currentRow = $(this).closest("tr");
                    var data = $('#languagesTable').DataTable().row(currentRow).data();

                    editLanguage(data)

                });

                $('#languagesTable').on('click', '#selectDelete', function (e) {

                    e.preventDefault();
                    var currentRow = $(this).closest("tr");
                    var data = $('#languagesTable').DataTable().row(currentRow).data();
                    deleteLanguage( data )

                });

                updateTranslations()
            }
            );

        }

        function mostrarPanelNacionalidades() {
            $( "#breadCrumbsContent" ).load( "./partialhtml/nacionalidades/nacionalidades-bc.html", function() {
            });

            $( "#mainContent" ).load( "./partialhtml/nacionalidades/nacionalidades-index.html", function() {

                cuposYEntradasTable = $('#nationalitiesTable').DataTable( {
                    "scrollX": true,
                    "ajax": {
                        "url": "/getnationalitiesall",
                        "type": "GET",
                        "datatype": "json"
                    },

                    columns: [
                        { data: "id" ,visible: false },
                        { data: "name" , "title" : PANEL_NACIONALIDADES__TABLA__HEADERS.nombre },

                        { "defaultContent": "  <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'></a>     <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectDelete'>      </a>  ", "title" : "" , "width":"10%"}  ,
                    ],

                    "language": tablesLang

                } );



                $('#nationalitiesTable').on('click', '#selectEdit', function (e) {

                    e.preventDefault();
                    var currentRow = $(this).closest("tr");
                    var data = $('#nationalitiesTable').DataTable().row(currentRow).data();

                    editNationality(data)

                });

                $('#nationalitiesTable').on('click', '#selectDelete', function (e) {

                    e.preventDefault();
                    var currentRow = $(this).closest("tr");
                    var data = $('#nationalitiesTable').DataTable().row(currentRow).data();

                    deleteNationality( data )

                });

                updateTranslations()
            }
            );

        }


        function mostrarPanelPlantillasEmail() {

            $( "#breadCrumbsContent" ).load( "./partialhtml/plantillas/plantillas-bc.html", function() {
            });

            $( "#mainContent" ).load("./partialhtml/plantillas/plantillas-index.html", function() {

                tablaPlantillasPanel = $('#emailTemplatesTableMainPanel').DataTable( {
                    "scrollX": true,
                    "ajax": {
                        "url": "/getalltemplates",
                        "type": "GET",
                        "datatype": "json"
                    },

                    columns: [
                        { data: "id" ,visible: false },

                        { data: "name" , "title" : PANEL_PLANTILLAS__TABLA__HEADERS.nombre },
                        { data: "location_id" ,visible: false },
                        { data: "activity_id" ,visible: false },
                        { data: "activity_type_id" ,visible: false },
                        { data: "activity_type_id" , visible: false, "title" : PANEL_PLANTILLAS__TABLA__HEADERS.tipo_actividad  ,
                            render: function ( data, type, row, meta ) {
                                        if (data==1) return PANEL_PLANTILLAS__TABLA__HEADERS.tipo_actividad_liga;
                                        if (data==3) return PANEL_PLANTILLAS__TABLA__HEADERS.tipo_actividad_champions;

                                        return PANEL_PLANTILLAS__TABLA__HEADERS.tipo_actividad_no_definido;
                                }
                        },
                        { data: "subject"   , "title" : PANEL_PLANTILLAS__TABLA__HEADERS.asunto},
                        { "defaultContent": "<a href='#' class='btn btn-primary btn-sm feather icon-copy' id='selectClone'></a>       <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'></a>     <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectDelete'>      </a>  ", "title" : "" , "width":"100px"}  ,
                    ],

                    "language": tablesLang

                } );

                $('#emailTemplatesTableMainPanel').on('click', '#selectClone', function (e) {

                    e.preventDefault();
                    var currentRow = $(this).closest("tr");
                    var data = $('#emailTemplatesTableMainPanel').DataTable().row(currentRow).data();

                           clonarEmailTemplateModal (data)

                    });


                    $('#emailTemplatesTableMainPanel').on('click', '#selectEdit', function (e) {

                    e.preventDefault();
                    var currentRow = $(this).closest("tr");
                    var data = $('#emailTemplatesTableMainPanel').DataTable().row(currentRow).data();

                               editEmailTemplateModal (data)

                    });

                    $('#emailTemplatesTableMainPanel').on('click', '#selectDelete', function (e) {

                    e.preventDefault();
                    var currentRow = $(this).closest("tr");
                    var data = $('#emailTemplatesTableMainPanel').DataTable().row(currentRow).data();

                    deleteTemplate( data )

                    });


                    crearListaIdiomasEmailTemplateModal()

                    setTimeout(() => {
                        crearListaUbicacionesEmailTemplateModal()
                    }, 300);

                    setTimeout(() => {
                        crearListaTiposInvitacionEmailTemplateModal()
                    }, 700);

                    crearListaUbicacionesForTemplatesPanel()
                    crearListaActividadesForTemplatesPanel(1)

                    updateTranslations()
            }
            );

        }


        function prepareForCreateEventModal() {

                crearListaLocationsForCreateEventsModal()
                crearListaActividadesForCreateEventsModal()
                crearListaTiposActividadForCreateEventsModal()


                $('#myFechaEventoCrearEventoModal').mask('99/99/9999');
                $('#myHoraEventoCrearEventoModal').mask('99:99');
        }

        function menuCrearEvento () {
            mostrarPanelEventos()
            prepareForCreateEventModal()
            
            

            setTimeout(() => {
                updateTranslations()
                showModalCrearEvento()

            }, 2000);
        }

        function mostrarPanelEventos() {

            var myTableEventSelectedTable = "myEventSelectTablePanel";
            let table;

            var variableMolona;
            var data;

            var dateEvent;
            var datePeticio;
            var eventName;
            var eventID;

            var quantitatInvitacions;
            var zonaPeticio;

            var enNomDe;

            const myStock = 25;
            var myPending = 25;
            var myTotalInvitationPrice;

            var myPrice = 150;

            var myFinalidadID;
            var myFinalidad;
            var  myTipoInvitacionID;
            var myTipoInvitacion;
            var email_secundario_peticion;
            var listadoAsistentes = [];

            var fechaNoConfirmada;

            $( "#breadCrumbsContent" ).load( "./partialhtml/eventos/eventos-bc.html", function() {
            });

            $( "#mainContent" ).load( "./partialhtml/eventos/eventos-index.html", function() {


                crearListaLocationsForEventsPanel()

                    // crearListaActividadesForEventsPanel()
                    // crearListaTiposActividadForEventsPanel()

                prepareForCreateEventModal()

                table = $('#myEventSelectTablePanel').DataTable({

                "scrollX": true,
                "ajax": {
                    "url": "/events",
                    "type": "GET",
                    "datatype": "json"
                },

                "columns": [

                    { "defaultContent": "  <a href='#' class='btn btn-primary btn-sm feather icon-arrow-down' id='selectExport'>  </a>     <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'>  </a>     <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectDelete'>      </a>   "}  ,
                    { data: "activity_id" , visible:false },
                    { data: "id_partido" , title: PANEL_EVENTOS__TABLA__HEADERS.id_partido},
                    { data: "nombre" , title: PANEL_EVENTOS__TABLA__HEADERS.nombre },
                    { data: "jornada" , title: PANEL_EVENTOS__TABLA__HEADERS.jornada , visible:false},
                    { data: "type_id" , visible:false },
                    { data: "type_id" , visible:false ,  title: PANEL_EVENTOS__TABLA__HEADERS.tipo_actividad ,
                            render: function ( data, type, row, meta ) {
                                if (data==1) return PANEL_EVENTOS__TABLA__HEADERS.tipo_actividad_liga;
                                if (data==3) return PANEL_EVENTOS__TABLA__HEADERS.tipo_actividad_champions;

                                return PANEL_EVENTOS__TABLA__HEADERS.tipo_actividad_no_definido;
                        }
                        },

                        { data: "not_confirmed_date",visible:false ,

                            render: function ( data, type, row, meta ) {
                                    fechaNoConfirmada = data;
                                    return data;
                            }

                        },

                        { "data": "fecha" , title: PANEL_EVENTOS__TABLA__HEADERS.fecha ,

                        render: function ( data, type, row, meta ) {

                            if (fechaNoConfirmada == 1) return PANEL_EVENTOS__TABLA__HEADERS.fecha_no_confirmada;
                            return moment( data,'YYYY/MM/DD' ).format('DD/MM/YYYY') ;
                    }

                        },
                        { "data": "hora" ,title: PANEL_EVENTOS__TABLA__HEADERS.hora,
                            render: function (data, type, row, meta) {
                                return moment( data,'HH:mm' ).format('HH:mm')
                            } },
                        { "data": "ubicacion_id",title: PANEL_EVENTOS__TABLA__HEADERS.ubicacion_id , visible:false},
                        { "data": "id_aforo", title: PANEL_EVENTOS__TABLA__HEADERS.id_aforo, visible:false },

                        ],


                    "language": tablesLang
                });

                $('#'+myTableEventSelectedTable).on('click', '#selectEdit', function (e) {
                    e.preventDefault();

                    var currentRow = $(this).closest("tr");

                    var data = $('#myEventSelectTablePanel').DataTable().row(currentRow).data();

                    // ir a edicion evento

                    // asignamos los datos del evento seleccionado
                    myEventData = data

                    // abrir modal edicion evento

                    $( "#editModalContent" ).load( "./partialhtml/eventos/eventos-modal.html", function() {
                        try {                   
                            setTimeout(() => {
                                updateTranslations()     
                                console.log ('traducido')                           
                            }, 500);        

                            editEventShowModal()      
                            
                        } catch (error) {
                            
                        } finally {
                            
                        }
                    });

                });


                $('#'+myTableEventSelectedTable).on('click', '#selectDelete', function (e) {
                    e.preventDefault();

                    var currentRow = $(this).closest("tr");

                    var data = $('#myEventSelectTablePanel').DataTable().row(currentRow).data();

                    // ir a eliminar evento

                    
                    deleteEvent( data )
                    
                });
                
                $('#'+myTableEventSelectedTable).on('click', '#selectExport', function (e) {
                    e.preventDefault();

                    var currentRow = $(this).closest("tr");

                    var data = $('#myEventSelectTablePanel').DataTable().row(currentRow).data();

                    // descargar CSV
                    window.location.href='/downloadcodes/' + data.id
                    
                });

                updateTranslations()
            }
            );

        }



        function mostrarPanelPeticiones() {

            $( "#breadCrumbsContent" ).load( "./partialhtml/peticiones/peticiones-bc.html", function() {
            });


            $( "#mainContent" ).load( "./partialhtml/peticiones/peticiones-index.html", function() {

                inicializarTablaParaGestionPeticiones()
                inicializarAsistentesPeticionesTemporal()

                updateTranslations()
            }
            );

        }

        function mostrarPanelEventosSolicitudPeticiones() {
            var userDepartmentID;
            var userID;
            var userName;
            var userDepartmentName;
            var isEdit = false;
            var oldValueCantidad = 0;


            $( "#breadCrumbsContent" ).load( "./partialhtml/solicitud-peticiones/solicitud-peticiones-bc.html", function() {
            });



            $( "#mainContent" ).load( "./partialhtml/solicitud-peticiones/solicitud-peticiones-index.html", function() {
                inicializarTablaEventosParaHacerPeticiones()
                crearListaActividadesPanelSeleccionPeticiones()
                inicializarAsistentesPeticionesTemporal()
                updateTranslations()
                }
            );
        }

        function mostrarPanelPrincipalAutorizador() {

            $( "#breadCrumbsContent" ).load( "./partialhtml/autorizador/autorizador-bc.html", function() {
            });


            $( "#mainContent" ).load( "./partialhtml/autorizador/autorizador-index.html", function() {

                 isAutorizador = true;
                 isLogistica = false;
                 isGestor = false;

              //  inicializarCKEditorParaLogistica()
                initDocReadyAutorizadorLogistica()
         

             }
            );

        }

        function mostrarPanelPrincipalLogistica() {

            $( "#breadCrumbsContent" ).load( "./partialhtml/logistica/logistica-bc.html", function() {
            });


            $( "#mainContent" ).load( "./partialhtml/logistica/logistica-index.html", function() {

                isAutorizador = false;
                isLogistica = true;
                isGestor = false;

                inicializarCKEditorParaLogistica()
                initDocReadyAutorizadorLogistica()

            }
            );

        }

        function mostrarPanelPrincipalDashboardGestor() {
            
                $( "#breadCrumbsContent" ).load( "./partialhtml/dashboard-gestor/dashboard-gestor-bc.html", function() {
                });

                $( "#mainContent" ).load( "./partialhtml/dashboard-gestor/dashboard-gestor-index.html", function() {

                    var isAutorizador = false;
                    var isLogistica = true;
                    isGestor = true;
                    inicializarCKEditorParaLogistica()
                    // initDocReadyAutorizadorLogistica()
                    initDocReadyGestor()
                    

                    }
                );  
  
        }


        function mostrarPanelPrincipalUsuariosSistema() {
            $( "#breadCrumbsContent" ).load( "./partialhtml/usuarios/usuarios-bc.html", function() {
            });

            $( "#mainContent" ).load( "./partialhtml/usuarios/usuarios-index.html", function() {

                cuposYEntradasTable = $('#usersTableUsuariosSistema').DataTable( {
                "scrollX": true,
                "ajax": {
                    "url": "/getallusers",
                    "type": "GET",
                    "datatype": "json"
                },

                columns: [
                    { data: "id" ,visible: false },
                    { data: "name" , "title" : PANEL_USUARIOS_SISTEMA__TABLA__HEADERS.nombre },
                    { data: "email" , "title" : PANEL_USUARIOS_SISTEMA__TABLA__HEADERS.email },
                    { data: "role_name" , "title" : PANEL_USUARIOS_SISTEMA__TABLA__HEADERS.nombre_rol },
                    { data: "department_id" ,visible: false },

                    { "defaultContent": "  <a href='#' class='btn btn-warning btn-sm feather icon-edit-2' id='selectEdit'></a>     <a href='#' class='btn btn-danger btn-sm feather icon-trash' id='selectDelete'>      </a>  ", "title" : "" , "width":"10%"}  ,
                ],

                "language": tablesLang

            } );





                $('#usersTableUsuariosSistema').on('click', '#selectEdit', function (e) {

                    e.preventDefault();
                    var currentRow = $(this).closest("tr");
                    var data = $('#usersTableUsuariosSistema').DataTable().row(currentRow).data();

                    editUserPanelUsuariosSistema(data)

                });

                $('#usersTableUsuariosSistema').on('click', '#selectDelete', function (e) {

                    e.preventDefault();
                    var currentRow = $(this).closest("tr");
                    var data = $('#usersTableUsuariosSistema').DataTable().row(currentRow).data();

                    deleteUserPanelUsuariosSistema( data )

                });

                crearListaAreasPanelUsuariosSistema();
                crearListaDepartamentosUsuariosSistema(0)

                crearListaAreasPanelUsuariosSistemaModal()

                updateTranslations()
                }
            );
        }


    </script>

    @section('scripts')
      <script>

      </script>


    @show

    <script>

        $(document).ready(function () {

            // carga inicial de la aplicación una vez descargado css, js y html

            // cargar el dashboard del perfil logueado

            try {                
                mostrarDashBoardHomeUsuario()
            } catch (error) {
                
            } finally {
                stopPreloader()
            }


            updateTranslations()

        })
        // fin document ready


    </script>

</body>

</html>
