@extends('frontend.main_master')
@section('content')

<div class="body-content">
	<div class="container">
		<div class="row">
			 @include('frontend.common.user_sidebar')

			 <div class="col-md-2">
			</div>
	 
			<div class="col-md-9">
	 
			 <div class="table-responsive">
			   <table class="table">
				 <tbody>
	 
				   <tr style="background: #e2e2e2;">
					 <td class="col-md-1">
					   <label for=""> Fecha de Pedido</label>
					 </td>
	 
					 <td class="col-md-3">
					   <label for=""> Total</label>
					 </td>
	 
					 <td class="col-md-3">
					   <label for=""> Metodo de Pago</label>
					 </td>
	 
	 
					 <td class="col-md-2">
					   <label for=""> Nro de Orden</label>
					 </td>
	 
					  <td class="col-md-2">
					   <label for=""> Estado</label>
					 </td>
	 
					  <td class="col-md-1">
					   <label for="">  </label>
					 </td>
	 
				   </tr>
	 
	 
				   @foreach($orders as $order)
			<tr>
					 <td class="col-md-1">
					   <label for=""> {{ $order->order_date }}</label>
					 </td>
	 
					 <td class="col-md-3">
					   <label for=""> ${{ number_format($order->amount,0,",",".") }}</label>
					 </td>
	 
	 
					  <td class="col-md-3">
					   <label for=""> {{ $order->payment_type }}</label>
					 </td>
	 
					 <td class="col-md-2">
					   <label for=""> {{ $order->invoice_no }}</label>
					 </td>
	 
					  <td class="col-md-2">
						@if($order->status == 'Pending')
							<img src="{{asset('frontend/assets/images/estados/Stado1.jpg')}}" style="width: 100%">
							<label for=""> 
								<span class="badge badge-pill badge-warning" style="background: #418DB9;"> Pago Pendiente </span>
						   </label>
						@elseif($order->status == 'confirm')
							<img src="{{asset('frontend/assets/images/estados/Stado2.jpg')}}" style="width: 100%">
							<label for=""> 
								<span class="badge badge-pill badge-warning" style="background: #418DB9;">Pago Confirmado </span>
						   </label>
						@elseif($order->status == 'processing')
							<img src="{{asset('frontend/assets/images/estados/Stado4.jpg')}}" style="width: 100%">
							<label for=""> 
								<span class="badge badge-pill badge-warning" style="background: #418DB9;">Orden Enpacada </span>
						   </label>
						{{-- @elseif($order->status == 'picked')
							<img src="{{asset('frontend/assets/images/estados/Stado4.jpg')}}" style="width: 100%">
							<label for=""> 
								<span class="badge badge-pill badge-warning" style="background: #418DB9;">Recojido </span>
						   </label> --}}
						@elseif($order->status == 'shipped')
							<img src="{{asset('frontend/assets/images/estados/Stado5.jpg')}}" style="width: 100%">
							<label for=""> 
								<span class="badge badge-pill badge-warning" style="background: #418DB9;">Orden Enviada</span>
						   </label>
						{{-- @elseif($order->status == 'delivered')
							<img src="{{asset('frontend/assets/images/estados/Stado6.jpg')}}" style="width: 100%">
							<label for=""> 
								<span class="badge badge-pill badge-warning" style="background: #418DB9;">Entregado </span>
						   </label>
						@elseif($order->status == 'cancel')
							<img src="{{asset('frontend/assets/images/estados/Stado7.jpg')}}" style="width: 100%">
							<label for=""> 
								<span class="badge badge-pill badge-warning" style="background: #418DB9;">Cancelado </span>
						   </label> --}}
						@endif
					   	{{-- <label for=""> 
						 	<span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span>
						</label> --}}
					 </td>
	 
			<td class="col-md-1">
				<a href="{{ url('user/order_details/'.$order->id ) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Detalle de Orden</a>
	 
				{{-- <a target="_blank" href="{{ url('user/invoice_download/'.$order->id ) }}" class="btn btn-sm btn-danger" style="margin-top: 5px"><i class="fa fa-download" style="color: white;"></i> Invoice </a> --}}
	 
			 </td>
	 
				   </tr>
				   @endforeach
	 
	 
	 
	 
	 
				 </tbody>
	 
			   </table>
	 
			 </div>
	 
	 
	 
	 
	 
			</div> <!-- / end col md 8 -->



		</div> <!-- // end row -->

	</div>

</div>

@endsection 