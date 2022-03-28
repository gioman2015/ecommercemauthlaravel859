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
                <h3 class="box-title">lista de productos</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                            <th>Nombre de usuario</th>
                            <th>correo electrónico del usuario</th>
                            <th>Tipo de usuario</th>
                            <th>Acción</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($users as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>
                                    @if ($item->type_user == 1)
                                        <span class="badge badge-pill badge-success">Proveedor</span>
                                    @else
                                        <span class="badge badge-pill badge-danger">Normal User</span>
                                    @endif
                                </td>
                                <td width="20%">
                                    @if($item->type_user == 1)
                                        <a href="{{ route('user.normal',$item->id) }}" class="btn btn-danger" title="Usuario Normal"><i class="fa fa-arrow-down"></i> </a>
                                    @else
                                        <a href="{{ route('user.proveedor',$item->id) }}" class="btn btn-success" title="Proveedor"><i class="fa fa-arrow-up"></i> </a>
                                    @endif
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

        <!-- /.row -->
      </section>
      <!-- /.content -->

    </div>
</div>
<!-- /.content-wrapper -->

@endsection
