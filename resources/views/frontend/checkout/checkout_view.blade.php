@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
My Checkout
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
				<li class='active'>Datos de Envio</li>
				<li>Metodo de Pago</li>
				{{-- <li>Orden Realizada con Exito</li> --}}
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb --> 




<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->

    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">		

				<!-- guest-login -->			
				<div class="col-md-6 col-sm-6 already-registered-login">
                    <h4 class="checkout-subtitle"><b>Datos de envio</b></h4>
           
                    <form class="register-form" action="{{ route('checkout.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1"><b>Nombre</b>  <span>*</span></label>
                            <input type="text" name="shipping_name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Full Name" value="{{ Auth::user()->name }}" required="">
                        </div>  <!-- // end form group  -->
                        
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1"><b>Email </b> <span>*</span></label>
                            <input type="email" name="shipping_email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Email" value="{{ Auth::user()->email }}" required="">
                        </div>  <!-- // end form group  -->

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1"><b>Cedula </b> <span>*</span></label>
                            <input type="number" name="cedula" class="form-control unicase-form-control text-input" required="">
                        </div>  <!-- // end form group  -->

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1"><b>Telefono</b></label>
                            <input type="number" name="shipping_phone" class="form-control unicase-form-control text-input" placeholder="Nro telefonico" value="{{ Auth::user()->phone }}" required="">
                        </div>  <!-- // end form group  -->
                          {{-- <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1"><b>Post Code </b> <span>*</span></label>
                            <input type="text" name="post_code" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Post Code">
                          </div>  <!-- // end form group  --> --}}
                </div>
				<!-- guest-login -->

				<!-- already-registered-login -->
				<div class="col-md-6 col-sm-6 already-registered-login">
                    <div class="form-group">
                        <h5><b>Departamento </b> <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="division_id" class="form-control" required="" >
                                <option value="" selected="" disabled="">Departamento</option>
                                @foreach($divisions as $item)
                                    <option value="{{ $item->id }}" {{-- {{ $item->id == $address->division_id ? 'selected': '' }} --}}>{{ $item->division_name }}</option>	
                                @endforeach
                            </select>
                            @error('division_id') 
                                <span class="text-danger">{{ $message }}</span>
                            @enderror 
                        </div>
                    </div> <!-- // end form group -->                    
                    <div class="form-group">
                        <h5><b>Ciudad</b>  <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="district_id" class="form-control" required="" >
                                <option value="" selected="" disabled="">Ciudad</option>
                                @foreach ($district as $item)
                                    <option value="{{ $item->id }}" {{-- {{ $item->id == $address->district_id ? 'selected': '' }} --}}>{{ $item->district_name }}</option>
                                @endforeach
                            </select>
                            @error('district_id')   
                                <span class="text-danger">{{ $message }}</span>
                            @enderror 
                        </div>
                    </div> <!-- // end form group -->
                    {{-- <div class="form-group">
                        <h5><b>State Select</b> <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="state_id" class="form-control">
                                <option value="" selected="" disabled="">Select State</option>
                            </select>
                            @error('state_id') 
                                <span class="text-danger">{{ $message }}</span>
                            @enderror 
                         </div>
                    </div> <!-- // end form group --> --}}
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1"><b>Direccion</b> <span class="text-danger">*</span></label>
                        <input class="form-control" name="address" {{-- value="{{ $address->address }}" --}}>
                    </div>  <!-- // end form group  -->
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1"><b>Direccion complementaria</b></label>
                        <input class="form-control" name="address2" {{-- value="{{ $address->address2 }}" --}}>
                    </div>  <!-- // end form group  -->
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1"><b>Barrio</b> <span class="text-danger">*</span></label>
                        <input class="form-control" name="barrio" {{-- value="{{ $address->barrio }}" --}}>
                    </div>  <!-- // end form group  -->
                    
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Anotaciones</label>
                        <textarea class="form-control" cols="30" rows="5" placeholder="Notes" name="notes">{{-- {{ $address->notes }} --}}</textarea>
                    </div>  <!-- // end form group  -->
				</div>	
				<!-- already-registered-login -->		
			</div>			
		</div>
		<!-- panel-body  -->
	</div><!-- row -->
</div>
<!-- End checkout-step-01  -->
					</div><!-- /.checkout-steps -->
				</div>




				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Checkout Progress</h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">
                    @php
                        $peso = 0;
                    @endphp
					@foreach($carts as $item)
                    
					<li> 
						<strong>Image: </strong>
						<img src="{{ asset($item->options->image) }}" style="height: 50px; width: 50px;">
					</li>

					<li> 
						<strong>Qty: </strong>
						 ( {{ $item->qty }} )

						 {{-- <strong>Color: </strong>
						 {{ $item->options->color }}

						 <strong>Size: </strong>
						 {{ $item->options->size }} --}}
					</li>
                    @endforeach

                    @foreach($carts as $item)
                    @php
                        $peso = $peso + $item->options->product_weight
                    @endphp					
                    @endforeach
                    @php
                        $pesoqty = $peso * $item->qty
                    @endphp
                    <input type="hidden" name="weigth" value="{{$pesoqty}}">
                    
<hr>
		 <li>

		 	@if(Session::has('coupon'))

<strong>SubTotal: </strong> ${{ number_format($cartTotal,0,",",".") }} <hr>

<strong>Coupon Name : </strong> {{ session()->get('coupon')['coupon_name'] }}
( {{ session()->get('coupon')['coupon_discount'] }} % )
 <hr>

 <strong>Coupon Discount : </strong> ${{-- {{ session()->get('coupon')['discount_amount'] }}  --}}
 @php
     $descuento = round( session()->get('coupon')['discount_amount'] )
 @endphp
 {{number_format($descuento,0,",",".")}}
 <hr>
  <strong>Grand Total : </strong> ${{-- {{ session()->get('coupon')['total_amount'] }} --}}
  @php
     $grandtotal = round( session()->get('coupon')['total_amount'] )
 @endphp
 {{number_format($grandtotal,0,",",".")}} 
 <hr>


		 	@else
             

<strong>SubTotal: </strong> ${{ number_format($cartTotal,0,",",".") }} <hr>

<strong>Grand Total : </strong> ${{ number_format($cartTotal,0,",",".") }} <hr>


		 	@endif 

		 </li>



				</ul>		
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar --> </div>







<div class="col-md-4">
    <!-- checkout-progress-sidebar -->
    <div class="checkout-progress-sidebar ">
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="unicase-checkout-title">Seleccione Metodo de Envio</h4>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Paso a recojer</label> 		
                            <input type="radio" name="payment_method" value="recojer">
                            <img src="{{ asset('frontend/assets/images/payments/4.png') }}">		    		
                        </div> <!-- end col md 4 -->
                    {{-- </div> --}}
                        {{-- <div class="col-md-4">
                            <label for="">Card</label> 		
                            <input type="radio" name="payment_method" value="card">	
                            <img src="{{ asset('frontend/assets/images/payments/3.png') }}">    		
                        </div> <!-- end col md 4 --> --}}
                    {{-- <div class="row"> --}}
                        <div class="col-md-6">
                            <label for="">Envia</label> 		
                            <input type="radio" name="payment_method" value="cash">	<br>
                            <img src="{{ asset('frontend/assets/images/payments/6.png') }}">  		
                        </div> <!-- end col md 4 -->
                    </div> <!-- // end row  --> 
                    <hr>
                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button"  style="background-color: #292929">Metodo de Envio</button>


                </div>
            </div>
        </div> 
<!-- checkout-progress-sidebar --> </div>
</form>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- === ===== BRANDS CAROUSEL ==== ======== -->








<!-- ===== == BRANDS CAROUSEL : END === === -->	
</div><!-- /.container -->
</div><!-- /.body-content -->

<script type="text/javascript">
    $(document).ready(function() {
      $('select[name="division_id"]').on('change', function(){
          var division_id = $(this).val();
          if(division_id) {
              $.ajax({
                  url: "{{  url('/district-get/ajax') }}/"+division_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                      $('select[name="state_id"]').empty();
                     var d =$('select[name="district_id"]').empty();
                     d =$('select[name="district_id"]').append('<option value=""> --- </option>');
                        $.each(data, function(key, value){
                            $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });
$('select[name="district_id"]').on('change', function(){
          var district_id = $(this).val();
          if(district_id) {
              $.ajax({
                  url: "{{  url('/state-get/ajax') }}/"+district_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                     var d =$('select[name="state_id"]').empty();
                     d =$('select[name="state_id"]').append('<option value=""> --- </option>');
                        $.each(data, function(key, value){
                            $('select[name="state_id"]').append('<option value="'+ value.id +'">' + value.state_name + '</option>');
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });

  });
  </script>

@endsection 