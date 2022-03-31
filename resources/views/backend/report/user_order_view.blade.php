@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<style>
	.btn {
	background:#3A8F40;
	color:#3A8F40;
	border:0px;
	padding:16px;
	}
</style>
<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">
        <div class="row">

          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Lista de Usuarios</h3>
                <a href="{{ route('download.user') }}" class="btn">Exportar a PDF</i> </a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Cantidad de Ordenes</th>
                            {{-- <th>Fecha Orden</th> --}}
                            {{-- <th>Acción</th> --}}
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($user as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>
                                    @if ($item->type_user == 1)
                                        <span >Proveedor</span>
                                    @else
                                        <span >Usuario Normal</span>
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $orders = App\Models\Order::where('user_id',$item->id)->get();
                                        /* dd(count($orders)); */
                                    @endphp
                                    {{ count($orders) }}</td>
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

        <!-- /.row -->
      </section>
      <!-- /.content -->

    </div>
</div>
<!-- /.content-wrapper -->

@endsection
