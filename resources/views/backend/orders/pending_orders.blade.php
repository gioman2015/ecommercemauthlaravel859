@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">



			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Lista de órdenes pendientes</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Fecha</th>
								<th>Orden</th>
								<th>Cantidad</th>
								<th>Pago</th>
								<th>Estado</th>
								<th>Acción</th>

							</tr>
						</thead>
						<tbody>
	 @foreach($orders as $item)
	 <tr>
		<td> {{ $item->order_date }}  </td>
		<td> {{ $item->invoice_no }}  </td>
		<td> ${{ $item->amount }}  </td>

		<td> {{ $item->payment_method }}  </td>
		<td>
			@if($item->status == 'Pending')
                <span class="badge badge-pill badge-warning" style="background: #418DB9;">Pago Pendiente</span> </th>

                @elseif($item->status == 'confirm')
                <span class="badge badge-pill badge-warning" style="background: #418DB9;">Pago Confirmado</span> </th>

                @elseif($item->status == 'processing')
                <span class="badge badge-pill badge-warning" style="background: #418DB9;">Orden Empacada</span> </th>

                @elseif($item->status == 'picked')
                {{-- <a href="{{ route('picked.shipped',$order->id) }}" class="btn btn-block btn-success" id="shipped">Orden Enviada</a> --}}

                @elseif($item->status == 'shipped')
                <span class="badge badge-pill badge-warning" style="background: #418DB9;">Orden Enviada</span> </th>
               {{-- <a href="{{ route('shipped.delivered',$order->id) }}" class="btn btn-block btn-success" id="delivered">Delivered Order</a> --}}

            @endif
			 <span class="badge badge-pill badge-primary">{{ $item->status }} </span>  </td>

		<td width="25%">
 <a href="{{ route('pending.order.details',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-eye"></i> </a>

		</td>

	 </tr>
	  @endforeach
						</tbody>

					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->


			</div>
			<!-- /.col -->






		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->

	  </div>




@endsection
