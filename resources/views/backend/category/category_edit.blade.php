@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">
        <div class="row">


          {{-- ------------- Add Category Page --------------------- --}}
          <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Editar Categoría</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="POST" action="{{route('category.update')}}" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="id" value="{{$category->id}}">
                      <input type="hidden" name="old_image" value="{{$category->slider_categoria_1}}">
                      <input type="hidden" name="old_image2" value="{{$category->slider_categoria_2}}">
                      <input type="hidden" name="old_image3" value="{{$category->slider_categoria_3}}">
                      <div class="form-group">
                          <label for="exampleFormControlInput3">Categoría en Inglés</label>
                          <input type="text" name="category_name_en" class="form-control" value="{{$category->category_name_en}}">
                          @error('category_name_en')
                              <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label for="exampleFormControlPassword3">Categoría en Español</label>
                          <input type="text" name="category_name_esp" class="form-control"  value="{{$category->category_name_esp}}">
                          @error('category_name_esp')
                              <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlPassword3">Categoría Icono</label>
                        <input type="text" name="category_icon" class="form-control"  value="{{$category->category_icon}}">
                        @error('category_icon')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlPassword3">Orden de Categoría</label>
                        <input type="number" name="category_order" class="form-control" value="{{$category->category_order}}">
                        @error('category_order')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                      @if ($category->slider_categoria_1)
                        <img src="{{asset($category->slider_categoria_1)}}" width="25%">
                      @else
                          
                      @endif
                      <div class="form-group">
                        <h5>Categoría Deslizador<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="file" name="category_slider1" class="form-control" onChange="mainThamUrl(this)" required="">
                        </div>
                        <img src="" id="mainThmb">
                        @error('category_slider1')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      @if ($category->slider_categoria_2)
                        <img src="{{asset($category->slider_categoria_2)}}" width="25%">
                      @else
                          
                      @endif
                      <div class="form-group">
                        <h5>Categoría Deslizador<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="file" name="category_slider2" class="form-control" onChange="mainThamUrl2(this)">
                        </div>
                        <img src="" id="mainThmb2">
                        @error('category_slider2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      @if ($category->slider_categoria_3)
                        <img src="{{asset($category->slider_categoria_3)}}" width="25%">
                      @else
                          
                      @endif
                      <div class="form-group">
                        <h5>Categoría Deslizador<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="file" name="category_slider3" class="form-control" onChange="mainThamUrl3(this)">
                        </div>
                        <img src="" id="mainThmb3">
                        @error('category_slider3')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Actualizar">
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
				$('#mainThmb').attr('src',e.target.result).width(300);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
<script type="text/javascript">
	function mainThamUrl2(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb2').attr('src',e.target.result).width(300);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
<script type="text/javascript">
	function mainThamUrl3(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb3').attr('src',e.target.result).width(300);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>

@endsection
