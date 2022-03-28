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
                <h3 class="box-title">Lista de Categorías<span class="badge badge-pill badge-danger"> {{ count($categories) }} </span></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                            <th>Icono</th>
                            <th>Deslizador</th>
                            <th>Nombre de Categoría EN</th>
                            <th>Nombre de Categoría ESP</th>
                            <th>Orden</th>
                            <th>Acción</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($categories as $item)
                            <tr>
                                <td><span><i class="{{$item->category_icon}}"></i></span> </td>
                                <td><img src="{{asset($item->slider_categoria_img)}}" style="width: 70px"></td>
                                <td>{{$item->category_name_en}}</td>
                                <td>{{$item->category_name_esp	}}</td>
                                <td>{{$item->category_order	}}</td>
                                <td>
                                    <a href="{{route('category.edit',$item->id)}}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                    <a href="{{route('category.delete',$item->id)}}" {{-- onclick="return confirm('Are you sure to delete')" --}} id="delete" class="btn btn-danger" title="Delete Data"><i class="fa fa-trash"></i> </a>
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

          {{-- ------------- Add Category Page --------------------- --}}
          <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Agregar Categoría</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <label for="exampleFormControlInput3">Categoría en Inglés</label>
                          <input type="text" name="category_name_en" class="form-control">
                          @error('category_name_en')
                              <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label for="exampleFormControlPassword3">Categoría en Español</label>
                          <input type="text" name="category_name_esp" class="form-control">
                          @error('category_name_esp')
                              <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlPassword3">Categoría Icono</label>
                        <input type="text" name="category_icon" class="form-control">
                        @error('category_icon')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlPassword3">Orden de Categoría</label>
                        <input type="number" name="category_order" class="form-control">
                        @error('category_order')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <h5>Categoría Deslizador<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="file" name="category_slider" class="form-control" onChange="mainThamUrl(this)" required="">
                        </div>
                        <img src="" id="mainThmb">
                        @error('category_slider')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Agregar Nuevo">
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

<script type="text/javascript">
	function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).height(300).width(300);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>

@endsection
