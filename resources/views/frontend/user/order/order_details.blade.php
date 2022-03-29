@extends('frontend.main_master')
@section('content')

<div class="body-content">
	<div class="container">
		<div class="row">
			 @include('frontend.common.user_sidebar')
       
       <div class="col-md-10">
         <div class="row">
          <div class="col-md-12">
            <img src="{{asset('frontend/assets/images/estados/estados-envio.jpg')}}" style="width: 100%">
          </div>
        </div>
         <div class="row">
            <div class="col-md-3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $order->created_at }}</div>
            <div class="col-md-2">{{ $order->confirmed_date }}</div>
            <div class="col-md-2">&nbsp;&nbsp;{{ $order->processing_date }}</div>
            <div class="col-md-2">{{ $order->picked_date }}</div>
            <div class="col-md-2">{{ $order->shipped_date }}</div>
            {{-- <div class="col-md-2">{{ $order->delivered_date }}</div> --}}
         </div>
       </div>
             <div class="col-md-5">
                <div class="card">
                  <div class="card-header"><h4>Detalles Envio</h4></div>
                 <hr>
                 <div class="card-body" style="background: #E9EBEC;">
                   <table class="table">
                    <tr>
                      <th> Nombre : </th>
                       <th> {{ $order->name }} </th>
                    </tr>
        
                     <tr>
                      <th> Telefono : </th>
                       <th> {{ $order->phone }} </th>
                    </tr>
        
                     <tr>
                      <th> Correo electronico : </th>
                       <th> {{ $order->email }} </th>
                    </tr>
        
                     <tr>
                      <th> Departamento : </th>
                       <th> {{ $order->division->division_name }} </th>
                    </tr>
        
                     <tr>
                      <th> Municipio : </th>
                       <th> {{ $order->district->district_name }} </th>
                    </tr>
        
                    {{--  <tr>
                      <th> State : </th>
                       <th>{{ $order->state->state_name }} </th>
                    </tr> --}}
        
                    <tr>
                      <th> Nro de Guia : </th>
                       <th> {{ $order->post_code }} </th>
                    </tr>
        
                    <tr>
                      <th> Fecha de Pedido : </th>
                       <th> {{ $order->order_date }} </th>
                    </tr>
        
                   </table>
        
        
                 </div> 
        
                </div>
        
              </div> <!-- // end col md -5 -->

              <div class="col-md-5">
                <div class="card">
                  <div class="card-header"><h4>Detalles de Pedido
        <span class="text-danger"> Nro de Orden : {{ $order->invoice_no }}</span></h4>
                  </div>
                 <hr>
                 <div class="card-body" style="background: #E9EBEC;">
                   <table class="table">
                    <tr>
                      <th>  Nombre : </th>
                       <th> {{ $order->user->name }} </th>
                    </tr>
        
                     <tr>
                      <th>  Telefono : </th>
                       <th> {{ $order->user->phone }} </th>
                    </tr>
        
                     <tr>
                      <th> Metodo de Pago : </th>
                       <th> {{ $order->payment_type }} </th>
                    </tr>
        
                     {{-- <tr>
                      <th> Tranx ID : </th>
                       <th> {{ $order->transaction_id }} </th>
                    </tr> --}}
        
                     <tr>
                      <th> Nro de Orden  : </th>
                       <th class="text-danger"> {{ $order->invoice_no }} </th>
                    </tr>
        
                     <tr>
                      <th> Total : </th>
                       <th>{{ $order->amount }} </th>
                    </tr>
        
                    <tr>
                      <th> Estado : </th>
                       <th>   
                        @if($order->status == 'Pending')
                        <label for=""> 
                          <span class="badge badge-pill badge-warning" style="background: #418DB9;">Pendiente </span>
                         </label>
                      @elseif($order->status == 'confirm')
                        <label for=""> 
                          <span class="badge badge-pill badge-warning" style="background: #418DB9;">Confirmado </span>
                         </label>
                      @elseif($order->status == 'processing')
                        <label for=""> 
                          <span class="badge badge-pill badge-warning" style="background: #418DB9;">Procesando </span>
                         </label>
                      @elseif($order->status == 'picked')
                        <label for=""> 
                          <span class="badge badge-pill badge-warning" style="background: #418DB9;">Recojido </span>
                         </label>
                      @elseif($order->status == 'shipped')
                        <label for=""> 
                          <span class="badge badge-pill badge-warning" style="background: #418DB9;">Enviado </span>
                         </label>
                      @elseif($order->status == 'delivered')
                        <label for=""> 
                          <span class="badge badge-pill badge-warning" style="background: #418DB9;">Entregado </span>
                         </label>
                      @elseif($order->status == 'cancel')
                        <label for=""> 
                          <span class="badge badge-pill badge-warning" style="background: #418DB9;">Cancelado </span>
                         </label>
                      @endif
                      </th>
                    </tr>
        
        
        
                   </table>
        
        
                 </div> 
        
                </div>
        
              </div> <!-- // 2ND end col md -5 -->
        
        
              <div class="row">
        
        
        
        <div class="col-md-12">
        
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
        
                      <tr style="background: #e2e2e2;">
                        <td class="col-md-1">
                          <label for=""> Imagen</label>
                        </td>
        
                        <td class="col-md-2">
                          <label for=""> Nombre del producto </label>
                        </td>
        
                        <td class="col-md-2">
                          <label for=""> Código de producto </label>
                        </td>
        
        
                        <td class="col-md-2">
                          <label for=""> Color </label>
                        </td>
        
                         <td class="col-md-2">
                          <label for=""> Tamaño </label>
                        </td>
        
                         <td class="col-md-1">
                          <label for=""> Cantidad </label>
                        </td>
        
                        <td class="col-md-2">
                          <label for=""> Precio </label>
                        </td>
        
                      </tr>
        
        
                      @foreach($orderItem as $item)
               <tr>
                        <td class="col-md-1">
                          <label for=""><img src="{{ asset($item->product->product_thambnail) }}" height="50px;" width="50px;"> </label>
                        </td>
        
                        <td class="col-md-2">
                          <label for=""> {{ $item->product->product_name_en }}</label>
                        </td>
        
        
                         <td class="col-md-2">
                          <label for=""> {{ $item->product->product_code }}</label>
                        </td>
        
                        <td class="col-md-2">
                          <label for=""> {{ $item->color }}</label>
                        </td>
        
                        <td class="col-md-2">
                          <label for=""> {{ $item->size }}</label>
                        </td>
        
                         <td class="col-md-1">
                          <label for=""> {{ $item->qty }}</label>
                        </td>
        
                  <td class="col-md-2">
                          <label for=""> ${{ $item->price }}  ( $ {{ $item->price * $item->qty}} ) </label>
                        </td>
        
                      </tr>
                      @endforeach
        
                    </tbody>
        
                  </table>
        
                </div>

               </div> <!-- / end col md 8 -->
        
              </div> <!-- // END ORDER ITEM ROW -->
        
        {{-- @if($order->status !== "delivered")

        @else

        @php 
        $order = App\Models\Order::where('id',$order->id)->where('return_reason','=',NULL)->first();
        @endphp

        @if($order)
            <form action="{{ route('return.order',$order->id) }}" method="post">
            @csrf
              <div class="form-group">
                <label for="label"> Razón de devolución del pedido:</label>
                <textarea name="return_reason" id="" class="form-control" cols="30" rows="05" placeholder="Motivo de la devolución"></textarea>    
              </div>
              <button type="submit" class="btn btn-danger">Devolver Orden</button>
            </form>
          @else
            <span class="badge badge-pill badge-warning" style="background: red">You Have send return request for this product</span>
          @endif 
        @endif
        <br><br> --}}
        

		</div> <!-- // end row -->

	</div>

</div>


@endsection 