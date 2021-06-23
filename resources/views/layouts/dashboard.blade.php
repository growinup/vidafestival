@extends('layouts.appcess_main_layout')

    {{-- DASHBOARD PRINCIPAL DE LA APLICACIÓN --}}

    @section('breadcrumbs')
    @endsection

    @section('content')
    @endsection
  

    @section('scripts')
    <script>   
        
        // inicializamos todos los valores de la aplicacion

        // inicializamos la URL del browser del CKEditor para la subida de archivos con nuestro
        // csrf token

      //  myBrowserUploadUrl = "{{route('upload', ['_token' => csrf_token() ])}}";
        myCSRFToken = '{{csrf_token()}}'
        
        // obtenemos el nombre de usuario y su ID para tenerlo siempre disponible en la aplicacion

        userID =  {{Auth::user()->id}};
        userName = '{{Auth::user()->name}}';
        userEmail = '{{Auth::user()->email}}';

        

        usuarioActual.userID = {{Auth::user()->id}};
        usuarioActual.userName = '{{Auth::user()->name}}';

        usuarioActual.departmentName = '{{Auth::user()->dep}}';
        usuarioActual.departmentId = {{Auth::user()->department_id}};

        usuarioActual.rol = {{ Session::get('userRole') }}


        // variables para paneles de peticiones
        var userDepartmentID;
        var userID;
        var userName;
        var userDepartmentName;
        var isEdit = true;
        var oldValueCantidad = 0;
        
        userDepartmentID = {{ Auth::user()->department_id }};
        userDepartmentName = '{{Auth::user()->dep}}';

        userID =  {{Auth::user()->id}};
        userName = '{{Auth::user()->name}}';
    
        myUserID =  {{ Auth::user()->id }};

        departamentonuevo = {{Auth::user()->department->id}}


    </script>    

    {{-- <script src="{{asset("js/peticiones-autorizador-logistica.js")}} " ></script> --}}
    
@endsection