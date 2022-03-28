@extends('frontend.main_master')
@section('content')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Login</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->            
<div class="col-md-6 col-sm-6 sign-in">
    <h4 class="">Iniciar Sesión</h4>
    {{-- <p class="">Hello, Welcome to your account.</p> --}}
    {{-- <div class="social-sign-in outer-top-xs">
        <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
        <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
    </div> --}}
   

    <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
            @csrf 

 
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Correo <span>*</span></label>
            <input type="text" id="email" name="email" class="form-control unicase-form-control text-input">
             @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="info-title" for="exampleInputPassword1">Contraseña <span>*</span></label>
            <input type="password" id="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" >
             @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            
        </div>
        <div class="radio outer-xs">
            <label>
                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Recordame!
            </label>
            <a href="{{ route('password.request') }}" class="forgot-password pull-right">Olvidaste tu contraseña?</a>
        </div>
        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Logear</button>
    </form>
</div>
<!-- Sign-in -->

<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
    <h4 class="checkout-subtitle">Crear una cuenta nueva</h4>
    <p class="text title-tag-line">Crea tu nueva cuenta.</p>
   
    <form method="POST" action="{{ route('register') }}">
            @csrf

         <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Nombre<span>*</span></label>
            <input type="text" id="name" name="name" class="form-control unicase-form-control text-input">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror 
        </div>

        <div class="form-group">
            <label class="info-title" for="exampleInputEmail2">Dirección de correo electrónico <span>*</span></label>
            <input type="email" id="email" name="email" class="form-control unicase-form-control text-input">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Número de teléfono <span>*</span></label>
            <input type="text" id="phone" name="phone" class="form-control unicase-form-control text-input" >
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Contraseña <span>*</span></label>
            <input type="password" id="password" name="password" class="form-control unicase-form-control text-input" >
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
         <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Confirmar Contraseña <span>*</span></label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control unicase-form-control text-input" >
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('Acepto los :terms_of_service y la :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Términos de servicio').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Política de privacidad').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif
        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Registrarse">
        {{-- <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button> --}}
    </form>
    
    
</div>  
<!-- create a new account -->           
        </div><!-- /.sigin-in-->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->


{{-- @include('auth.register') --}}

@include('frontend.body.brands')


<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->    </div><!-- /.container -->
</div><!-- /.body-content -->

@endsection
