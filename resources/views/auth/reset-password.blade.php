@extends('frontend.main_master')
@section('content')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{url('/')}}">Home</a></li>
                <li class='active'>Resetear Contraseña</li>
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
    <h4 class="">Resetear Contraseña </h4>
    
     
   

     <form method="POST" action="{{ route('password.update') }}">
            @csrf

     <input type="hidden" name="token" value="{{ $request->route('token') }}">


        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Direccion de Correo <span>*</span></label>
            <input type="email" id="email" name="email" class="form-control unicase-form-control text-input">
        </div>

         <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Contraseña <span>*</span></label>
            <input type="password" id="password" name="password" class="form-control unicase-form-control text-input">
        </div>

         <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Confirmar Contraseña <span>*</span></label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control unicase-form-control text-input">
        </div>
        
        
        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Resetear Contraseña</button>
    </form>   


</div>
<!-- Sign-in -->
 
<!-- create a new account -->   
 </div><!-- /.row -->
        </div><!-- /.sigin-in-->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->




@include('frontend.body.brands')



<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->    </div><!-- /.container -->
</div><!-- /.body-content -->
 

@endsection





