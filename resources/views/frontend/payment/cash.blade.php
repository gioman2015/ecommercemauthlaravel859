@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
Cash On Delivery
@endsection

<style>
    ul#menulista li {
      display:inline;
    }
</style>

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul id="menulista" {{-- class="list-inline list-unstyled" --}}>
				<li><a href="{{url('/')}}">Home</a></li>
				<li>Datos de Envio</li>
				<li class='active'>Metodo de Pago</li>
				{{-- <li>Orden Realizada con Exito</li> --}}
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb --> 




<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">





				<div class="col-md-6">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Su Valor de Compra </h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">
					<input type="hidden" name="notes" value="{{ $data['notes'] }}"> 
					@php
						$envios = App\Models\PreciosEnvios::latest()->get();
					@endphp
				@if ($data['type']==0)
					
					@if ($data['weigth'] <= 3 )
						@php
							$envios = App\Models\PreciosEnvios::where('id',2)->first();
						@endphp
						<input type="hidden" value="{{$envios->price}}">
					@elseif ($data['weigth'] <= 5)
						@php
							$envios = App\Models\PreciosEnvios::where('id',4)->first();
						@endphp
						<input type="hidden" value="{{$envios->price}}">
					@else
						@php
							$envios = App\Models\PreciosEnvios::where('id',6)->first();
						@endphp
						<input type="hidden" value="{{$envios->price}}">
					@endif
				@else
					
					@if ($data['weigth'] <= 3 )
						@php
							$envios = App\Models\PreciosEnvios::where('id',1)->first();
						@endphp
						<input type="hidden" value="{{$envios->price}}">
					@elseif ($data['weigth'] <= 5)
						@php
							$envios = App\Models\PreciosEnvios::where('id',3)->first();
						@endphp
						<input type="hidden" value="{{$envios->price}}">
					@else
						@php
							$envios = App\Models\PreciosEnvios::where('id',5)->first();
						@endphp
						<input type="hidden" value="{{$envios->price}}">
					@endif
				@endif
<hr>
		 <li>
		 	@if(Session::has('coupon'))

<strong>SubTotal: </strong> ${{ $cartTotal }} <hr>

<strong>Coupon Name : </strong> {{ session()->get('coupon')['coupon_name'] }}
( {{ session()->get('coupon')['coupon_discount'] }} % )
 <hr>

 <strong>Coupon Discount : </strong> ${{ session()->get('coupon')['discount_amount'] }} 
 <hr>

  <strong>Grand Total : </strong> ${{ session()->get('coupon')['total_amount'] }} 
 <hr>


		 	@else

<strong>SubTotal: </strong> ${{ $cartTotal }} <hr>
<strong>Valor de Envio: </strong> ${{ $envios->price }} <hr>
@php
	$totalenvio = $envios->price + $cartTotal
@endphp
<strong>Grand Total : </strong> ${{$totalenvio}}<hr>


		 	@endif 

		 </li>
				</ul>
						
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->
 </div> <!--  // end col md 6 -->







	<div class="col-md-5">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title"></h4>
		    </div>

<form action="{{ route('cash.order') }}" method="post" id="payment-form">
                            @csrf
        <div class="form-row">
			<div class="row">
				<div class="col-md-5" style="border: #292929 solid 3px; border-radius: 5px;">
					<p><b>Deposito o transferencia desde nequi o bancolombia a nuestra cuenta de ahorros bancolombia:</b></p>
					<img src="{{asset('frontend/assets/images/logos-bancolombia-nequi.png')}}" style="width: 100%"><br>
					<center><input type="radio" name="payment_type" value="bdancolombia"></center>
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-5" style="border: #292929 solid 3px; border-radius: 5px;">
					<p><b>Deposito o transferencia desde daviplata o davivienda a nuestra cuenta de ahorros davivienda:</b></p>
					<img src="{{asset('frontend/assets/images/logos-davivienda-daviplata.png')}}" style="width: 100%"><br>
					<center><input type="radio" name="payment_type" value="davivienda"></center>
				</div>
				</div>
			</div>
          {{-- <img src="{{ asset('frontend/assets/images/payments/cash.png') }}"> --}}

            <label for="card-element">

      <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
      <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
      <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
      <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
      <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
      <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
      <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
      <input type="hidden" name="cedula" value="{{ $data['cedula'] }}"> 
      <input type="hidden" name="address" value="{{ $data['address'] }}"> 
      <input type="hidden" name="address2" value="{{ $data['address2'] }}"> 
      <input type="hidden" name="barrio" value="{{ $data['barrio'] }}"> 
      <input type="hidden" name="notes" value="{{ $data['notes'] }}"> 
      <input type="hidden" name="payment_method" value="{{ $data['payment_method'] }}"> 

            </label>




        </div>
        <br>
        <button class="btn btn-primary" style="background-color: #292929">Enviar Pedido</button>
        </form>



		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->
 </div><!--  // end col md 6 -->







</form>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- === ===== BRANDS CAROUSEL ==== ======== -->








<!-- ===== == BRANDS CAROUSEL : END === === -->	
</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection 