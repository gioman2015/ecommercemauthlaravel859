@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">
        <div class="row">

          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Lista de productos</h3>
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
