@extends('layouts.resetpasswordlayout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <!-- Authentication card start -->

            {{-- <form class="md-float-material form-material"> --}}
            <form class="md-float-material form-material" method="POST" action="{{ route('password.email') }}">
                @csrf                
                <div class="text-center">
                    {{-- <img src="../files/assets/images/auth/logo-dark.png" alt="logo.png"> --}}
                </div>
                <div class="auth-box card">
                    <div class="card-block">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <div class="row">
                            <div class="col">
 
                
                                <div class="text-center">
                                    <img src="{{asset("files/assets/images/appcess-logo.png")}}" width="120" alt="">
                                </div>         
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <hr>
                            </div>
                        </div>


                        <div class="row m-b-20">
                            <div class="col-md-12">
                                <h3 class="text-left" tkey="reset_password__header">Reset de contrasenya</h3>
                            </div>
                        </div>

                        <div class="form-group form-primary">
                            <input type="email" id="email"  name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">
                            <span class="form-bar"></span>
                            <label class="float-label">Email</label>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="row mb-4 mt-4">
                            <div class="col">
                                <div class="text-center">
                                    <img src="{{asset ("files/assets/images/appcesslogoblack.png")}}" width="90" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary  btn-md btn-block waves-effect text-center m-b-20" tkey="reset_password__boton" >
                                    {{-- {{ __('Enviar link de reset de contrasenya') }} --}}
                                    Enviar <span style=" text-transform: lowercase;" tkey="reset_password__boton">link de reset de contrasenya</span> 
                                </button>
             
                            </div>
                        </div>

                        
                        <div class="text-right">
                            <span class="f-w-400 text-right" tkey="reset_password__volver_appcess">Tornar a Appcess - FCB </span>
                            <strong>
                                <a class="f-w-600" href="/" tkey="reset_password__inicio_de_sesion">Inici de sessió.</a>
                            </strong>

                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                {{-- <p class="text-inverse text-left m-b-0">Thank you.</p>
                                <p class="text-inverse text-left"><a href="index.html"><b>Back to website</b></a></p>
                            </div> --}}
                            <div class="col-md-2">
                                {{-- <img src="../files/assets/images/auth/Logo-small-bottom.png" alt="small-logo.png"> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--<div class="login-card card-block auth-body mr-auto ml-auto">-->
            <!--<form class="md-float-material form-material">-->
            <!--<div class="text-center">-->
            <!--<img src="../files/assets/images/logo.png" alt="logo.png">-->
            <!--</div>-->
            <!--<div class="auth-box">-->
            <!---->
            <!--</div>-->
            <!--</form>-->
            <!--&lt;!&ndash; end of form &ndash;&gt;-->
            <!--</div>-->
            <!-- Authentication card end -->
        </div>
        <!-- end of col-sm-12 -->
    </div>
    <!-- end of row -->
</div>
@endsection
