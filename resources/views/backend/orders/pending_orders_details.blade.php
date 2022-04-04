@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Detalles de Orden</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Detalles de Orden</li>
								 
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>



		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 
<div class="col-md-6 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					<h4 class="box-title"><strong>Detalles de Envío</strong> </h4>
				  </div>
				  

<table class="table">
            <tr>
              <th> Nombre Destinatario : </th>
               <th> {{ $order->name }} </th>
            </tr>

             <tr>
              <th> Telefono Destinatario : </th>
               <th> {{ $order->phone }} </th>
            </tr>

             <tr>
              <th> Correo Destinatario : </th>
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

             {{-- <tr>
              <th> State : </th>
               <th>{{ $order->state->state_name }} </th>
            </tr> --}}

            {{-- <tr>
              <th> Post Code : </th>
               <th> {{ $order->post_code }} </th>
            </tr> --}}
            <tr>
              <th> Cedula/Nit : </th>
              <th>{{ $order->cedula }}</th>
            </tr>

            <tr>
              <th> Direccion: </th>
              <th>{{ $order->address }}</th>
            </tr>

            @if ( $order->address2 == null )
                
            @else
              <tr>
                <th> Direccion Alternativa: </th>
                <th>{{ $order->address2 }}</th>
              </tr>
            @endif
            

            <tr>
              <th> Barrio : </th>
              <th>{{ $order->barrio }}</th>
            </tr>

            <tr>
              <th> Anotaciones : </th>
              <th>{{ $order->notes }}</th>
            </tr>

            <tr>
              <th> Fecha de Pedido : </th>
               <th> {{ $order->order_date }} </th>
            </tr>
             
           </table>
 


				</div>
			  </div> <!--  // cod md -6 -->


<div class="col-md-6 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					<h4 class="box-title"><strong>Detale de Pedido</strong><span class="text-danger"> Orden nro : {{ $order->invoice_no }}</span></h4>
				  </div>
				   

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
              <th> Forma de Pago : </th>
               <th> {{ $order->payment_type }} </th>
            </tr>

             <tr>
              <th> Metodo de Envio : </th>
               <th> {{ $order->payment_method }} </th>
            </tr>

             <tr>
              <th> Orden nro  : </th>
               <th class="text-danger"> {{ $order->invoice_no }} </th>
            </tr>

             <tr>
              <th> Valor Total : </th>
               <th>${{ $order->amount }} </th>
            </tr>

            <tr>
              <th> Estado : </th>
               <th>
                @if($order->status == 'Pending')
                <span class="badge badge-pill badge-warning" style="background: #418DB9;">Pago Pendiente</span> </th>

                @elseif($order->status == 'confirm')
                <span class="badge badge-pill badge-warning" style="background: #418DB9;">Pago Confirmado</span> </th>

                @elseif($order->status == 'processing')
                <span class="badge badge-pill badge-warning" style="background: #418DB9;">Orden Empacada</span> </th>

                @elseif($order->status == 'picked')
                {{-- <a href="{{ route('picked.shipped',$order->id) }}" class="btn btn-block btn-success" id="shipped">Orden Enviada</a> --}}

                @elseif($order->status == 'shipped')
                <span class="badge badge-pill badge-warning" style="background: #418DB9;">Orden Enviada</span> </th>
               {{-- <a href="{{ route('shipped.delivered',$order->id) }}" class="btn btn-block btn-success" id="delivered">Delivered Order</a> --}}

                @endif
                
            </tr>


            <tr>
              <th>  </th>
               <th> 
               	@if($order->status == 'Pending')
               	<a href="{{ route('pending-confirm',$order->id) }}" class="btn btn-block btn-success" id="confirm">Confirmar Orden</a>

               	@elseif($order->status == 'confirm')
               	<a href="{{ route('confirm.processing',$order->id) }}" class="btn btn-block btn-success" id="processing">Orden en Proceso</a>

               	@elseif($order->status == 'processing')
               	<a href="{{ route('processing.picked',$order->id) }}" class="btn btn-block btn-success" id="picked">Orden Recojida</a>

               	@elseif($order->status == 'picked')
               	{{-- <a href="{{ route('picked.shipped',$order->id) }}" class="btn btn-block btn-success" id="shipped">Orden Enviada</a> --}}

               	@elseif($order->status == 'shipped')
                {{-- <a href="{{ route('shipped.delivered',$order->id) }}" class="btn btn-block btn-success" id="delivered">Delivered Order</a> --}}
                
                @elseif($order->status == 'cancel')
                <span>{{$order->return_reason}}</span>

               	@endif

                 </th>
            </tr>

           
             
           </table>
 


				</div>

        
			  </div> <!--  // cod md -6 -->
        
    <div class="col-md-6 col-12">
      <div class="box box-bordered border-primary">
        <div class="box-header with-border">
          <table class="table">
            <tr>
              <form action="{{ route('guia.order',$order->id) }}" method="post">
                @csrf
                <input type="hidden" name="orderid" value="{{$order->id}}">
                <th> Nro de Guia </th>
                <th> <input type="number" name="guia" {{-- size="50" --}} placeholder="Nro de Guia"></th>
                <th><input type="submit" value="Nro Guia" class="btn btn-block btn-success" ></th>
              </form>
            </tr>
            <tr>
              <center><p>{{$order->post_code}}</p></center>
            </tr>
          </table>
        </div>
      </div>
    </div>


<div class="col-md-12 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					 
				  </div>



 <table class="table">
            <tbody>
  
              <tr>
                <td width="10%">
                  <label for=""> Image</label>
                </td>

                 <td width="20%">
                  <label for=""> Product Name </label>
                </td>

             <td width="10%">
                  <label for=""> Product Code</label>
                </td>


               <td width="10%">
                  <label for=""> Color </label>
                </td>

                <td width="10%">
                  <label for=""> Size </label>
                </td>

                  <td width="10%">
                  <label for=""> Quantity </label>
                </td>

               <td width="10%">
                  <label for=""> Price </label>
                </td>
                
              </tr>


              @foreach($orderItem as $item)
       <tr>
               <td width="10%">
                  <label for=""><img src="{{ asset($item->product->product_thambnail) }}" height="50px;" width="50px;"> </label>
                </td>

               <td width="20%">
                  <label for=""> {{ $item->product->product_name_en }}</label>
                </td>


                <td width="10%">
                  <label for=""> {{ $item->product->product_code }}</label>
                </td>

               <td width="10%">
                  <label for=""> {{ $item->color }}</label>
                </td>

               <td width="10%">
                  <label for=""> {{ $item->size }}</label>
                </td>

                <td width="10%">
                  <label for=""> {{ $item->qty }}</label>
                </td>

         <td width="10%">
                  <label for=""> ${{ $item->price }}  ( $ {{ $item->price * $item->qty}} ) </label>
                </td>
                
              </tr>
              @endforeach





            </tbody>
            
          </table>










				  
				</div>
			  </div>  <!--  // cod md -12 -->









 

 

 


		  </div>
		  <!-- /. end row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection