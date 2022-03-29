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
                            <th>Imagen</th>
                            <th>Nombre de Producto</th>
                            <th>Cantidad vendida</th>
                            <th>Fecha de venta</th>
                            {{-- <th>Acción</th> --}}
                          </tr>
                      </thead>
                      <tbody>
                            @foreach($orderItem as $item)
                            <tr>
                                <td><img src="{{asset($item->product->product_thambnail)}}" style="width:60px; height: 50px;"></td>
                                <td>{{ $item->product->product_name_en }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->created_at }}</td>
                                {{-- <td width="20%">
                                    {{-- <a href="{{route('product.edit',$item->id)}}" class="btn btn-primary" title="Product Details Data"><i class="fa fa-eye"></i></a>
                                    <a href="{{route('product.edit',$item->id)}}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                    <a href="{{route('product.delete',$item->id)}}" id="delete" class="btn btn-danger" title="Delete Data"><i class="fa fa-trash"></i> </a>
                                    @if($item->status == 1)
                                        <a href="{{ route('product.inactive',$item->id) }}" class="btn btn-danger" title="Inactive Now"><i class="fa fa-arrow-down"></i> </a>
                                    @else
                                        <a href="{{ route('product.active',$item->id) }}" class="btn btn-success" title="Active Now"><i class="fa fa-arrow-up"></i> </a>
                                    @endif
                                </td> --}}
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
