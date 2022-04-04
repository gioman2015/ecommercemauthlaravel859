@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
@php
    $pending = App\Models\Order::where('status','pending')->orderBy('id','DESC')->get();
    $confirm = App\Models\Order::where('status','confirm')->orderBy('id','DESC')->get();
    $picked = App\Models\Order::where('status','picked')->orderBy('id','DESC')->get();
    $shipped = App\Models\Order::where('status','shipped')->orderBy('id','DESC')->get();
    $delivered = App\Models\Order::where('status','delivered')->orderBy('id','DESC')->get();
    $cancel = App\Models\Order::where('status','cancel')->orderBy('id','DESC')->get();
@endphp
<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">
        <div class="row">

          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Cantidad de Ordenes</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                            <th>Ordenes Pendientes</th>
                            <th>Ordenes Confirmadas</th>
                            <th>Ordenes Recojidas</th>
                            <th>Ordenes Enviadas</th>
                            {{-- <th>Fecha Orden</th> --}}
                            {{-- <th>Acción</th> --}}{{-- 'pending','confirm','picked','shipped','delivered','cancel' --}}
                          </tr>
                      </thead>
                      <tbody>
                            <tr>
                                <td>{{ count($pending) }}</td>
                                <td>{{ count($confirm) }}</td>
                                <td>{{ count($picked) }}</td>
                                <td>{{ count($shipped) }}</td>
                            </tr>
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