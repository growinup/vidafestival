@extends('layouts.appcess_main_layout')

@section('breadcrumbs')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h3>NUEVO USUARIO</h3>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{Session::get('myhome') }}">
                            <i class="feather icon-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">LISTADO USUARIOS</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
    
@endsection

@section('content')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                 

                          {{-- <div class="row">
                            <div class="col-7">
        
                                <div class="form-group row">
                                    <label for="myNombreEvento" class="control-label col-sm-12 col-md-12 col-lg-4">Nombre</label>
                                    <div class="col-sm-12 col-lg-8">
                                        <input type="text" class="form-control" id="myNombreEvento" name="myNombreEvento" placeholder="">
                                    </div>                                           
                                </div>                        
        
                            </div>
        
                            <div class="col-5">
            
                                <div class="form-group row">
                                    <label for="myFechaEvento" class="control-label col-sm-6 col-md-3">Data</label>
                                    <div class="col-sm-6 col-md-3">
                                    <input type="text" class="form-control" id="myFechaEvento" name="myFechaEvento" placeholder="" >
                                    </div>                                           
               
                                    <label for="myHoraEvento" class="control-label col-sm-6  col-md-3">Hora</label>
                                    <div class="col-sm-6  col-md-3">
                                        <input type="text" class="form-control" id="myHoraEvento" name="myHoraEvento" placeholder="" >
                                    </div>            
                                </div>            
                                
                                <div class="row" >
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="myFechaNoConfirmada">
                                        <label class="custom-control-label" for="myFechaNoConfirmada">Data no confirmada</label>
                                    </div>
                                </div>
        
                            </div> 
                        </div>--}}

                        
                        <br>

                    
                        <div class="row float-right">
                            <div class="col">
                                
                                <button class="btn btn-success" onclick="crearUsuario()">Crear usuario</button>
                            
                            </div>
                        </div>    

                        </div>

                </div>
            </div>
        </div>
    </div>

  

    


@endsection 


@section('scripts')

<script>

    function crearUsuario() {


        let myEmail = "test11@test.com";
        let myFirstName = "test name";
        let myLastName = "test lastName";
        let myNif = "00000011A";

        let myPostCode =  "08021";
        let myStreet = "Muntaner 350";
        let myRegion =  "Barcelona";
        let myTown =  "Barcelona";
        let myCountry = "Spain";
        let myPhone = "933933933";
        let myBirthDay = "2012-04-23";

        const headers = {
           'Content-Type': 'text/json'
        };
    

        var myConfirmMessage = '';

        Swal.fire({
            title: 'Crear usuario',
            text: "¿ Crear usuario ?",
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#129443',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK',
            cancelButtonText: 'Cancelar'
        }).then((result) => {

            if (result.value) {
            
                // axios.defaults.headers = {
                //     'Access-Control-Allow-Origin': '*',
                //     'Content-Type': 'application/json',
                // }

                axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';  
                axios.defaults.headers.common['Content-Type'] = 'application/json';  
                // axios.defaults.headers.common['Access-Control-Allow-Methods'] = '*' 
                axios.defaults.headers.common['Access-Control-Allow-Headers'] = 'access-control-allow-headers,access-control-allow-methods,access-control-allow-origin,authorization';  

                axios.post('https://app.marenostrumfuengirola.com/api/v1/users', {
                //  axios.post('https://app.marenostrumfuengirola.com/api/v1/auth/register', {
                    
                //             "user_id": 145,
                //             "username": "test7@test.com",
                //             "password": "1234",
                //             "enabled": 0,
                            


                    email: myEmail,
                    first_name: myFirstName ,
                    last_name: myLastName ,
                    nif: myNif,
                    address: [{
                    postcode: myPostCode,
                    street: myStreet,
                    region: myRegion,
                    town: myTown,
                    country: myCountry
                    }],
                    phone: myPhone,
                    birthday: myBirthDay,
                    role: "4740",
                    created_method: "A"

                } )
                    .then(response => {
                    
                        myConfirmMessage = 'El usuario ' + response.data['user_id'] + ' se ha creado correctamente';
                        if (response.data.success) {
                            Swal.fire(
                                'Usuario creado',
                                myConfirmMessage,
                                'success'
                            )

                        } else {
                            Swal.fire(
                                'Error!',
                                'No ha sido posible crear el usuario',
                                'error'
                            )
                        }
                    
                    })
                    .catch(function (error) {
                        console.log(error)
                    });

            }

        })


    }


</script>    
    
@endsection