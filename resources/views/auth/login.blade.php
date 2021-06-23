@extends('layouts.loginlayout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <!-- Authentication card start -->
 
            <form class="md-float-material form-material" method="POST" action="{{ route('login') }}">
            {{-- <form class="" method="POST" action="{{ route('login') }}"> --}}
                    @csrf                
                <div class="text-center">
                    {{-- <img src="../files/assets/images/auth/logo-dark.png" alt="logo.png"> --}}                 
                </div>
                <div class="auth-box card">
                    <div class="card-block">
                        <div class="row">
                            <div class="col">
                        
                
                                <div class="text-center">
                                    <img src="./files/assets/images/appcess-logo.png" width="150" alt="">
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
                                <h3 class="text-center" tkey="inicio_de_sesion_header">Inici de sessió</h3>
                            </div>
                        </div>
                        
                        <div class="form-group form-primary">
                            {{-- <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required="">
                            <span class="form-bar"></span>
                            <label class="float-label">El teu email</label>        --}}

                            
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email" AUTO>
                            <span class="form-bar"></span>
                            <label class="float-label" tkey="inicio_de_sesion_label_email">El teu email</label>     
           
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                            
                        </div>
                        <div class="form-group form-primary">
                            {{-- <input type="password" name="password" class="form-control" required="">
                            <span class="form-bar"></span>
                            <label class="float-label">La teva contrasenya</label> --}}

                            
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <span class="form-bar"></span>
                            <label class="float-label" tkey="inicio_de_sesion_label_password">La teva contrasenya</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                            
                        </div>
                        <div class="row m-t-25 text-left">
                            <div class="col-12">
                                <div class="checkbox-fade fade-in-primary d-">
                                    <label>
                                        
                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <span class="cr"><i class="cr-icon fas fa-check txt-primary"></i></span>
                                        <span class="text-inverse" tkey="inicio_de_sesion_recordar">Recordar</span>
                                    </label>

                                </div>
                                
                                <div class="forgot-phone text-right float-right">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-right f-w-600" tkey="inicio_de_sesion_olvidada_contraseña"> Has oblidat la teva contrasenya?</a>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <div class="row m-t-30">
                            <div class="col-md-12">

                                <div class="text-center mb-4">
                                    <img src="./files/assets/images/appcesslogoblack.png" width="90" alt="">
                                </div>                                
                       
                                <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20" tkey="inicio_de_sesion_boton_iniciar_sesion">
                                    Inici <span style="text-transform:lowercase;"> de sessió</span>
                                </button>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            {{-- <div class="col-md-10">
                            </div>
                            <div class="col-md-2">
                                <img src="../files/assets/images/auth/Logo-small-bottom.png" alt="small-logo.png">
                            </div> --}}
                        </div>
                    </div>
                </div>
            </form>
            
            <!-- end of form -->
        </div>
        <!-- end of col-sm-12 -->
    </div>
    <!-- end of row -->


    <footer class="mt-5">
        <div class="text-center">
            <div class="row">
                <div class="col" style="color:gray;">
                    &copy; 2021 AINA Group
                </div>
            </div>
        </div>
    </footer>
</div>






@endsection
