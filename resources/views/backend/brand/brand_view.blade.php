@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">
        <div class="row">

          <div class="col-8">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Lista de Marcas <span class="badge badge-pill badge-danger"> {{ count($brands) }} </span></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Nombre Marca EN</th>
                              <th>Nombre Marca ESP</th>
                              <th>Imagen</th>
                              <th>Acción</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($brands as $item)
                            <tr>
                                <td>{{$item->brand_name_en}}</td>
                                <td>{{$item->brand_name_esp	}}</td>
                                <td><img src="{{asset($item->brand_image)}}" style="width: 70px"></td>
                                <td>
                                    <a href="{{route('brand.edit',$item->id)}}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                    <a href="{{route('brand.delete',$item->id)}}" {{-- onclick="return confirm('Are you sure to delete')" --}} class="btn btn-danger" title="Delete Data" id="delete"><i class="fa fa-trash"></i> </a>
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

          {{-- ------------- Add Brand Page --------------------- --}}
          <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Agregar Marca</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="POST" action="{{route('brand.store')}}" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <label for="exampleFormControlInput3">Nombre Marca Inglés</label>
                          <input type="text" name="brand_name_en" class="form-control">
                          @error('brand_name_en')
                              <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label for="exampleFormControlPassword3">Nombre Marca Español</label>
                          <input type="text" name="brand_name_esp" class="form-control">
                          @error('brand_name_esp')
                              <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label for="exampleFormControlPassword3">Imagen de la Marca</label>
                          <input type="file" name="brand_image" class="form-control">
                          @error('brand_image')
                              <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>
                      <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Agregar nuevo">
                  </form>
                   </div>
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
           </div>
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->

    </div>
</div>
<!-- /.content-wrapper -->

@endsection
