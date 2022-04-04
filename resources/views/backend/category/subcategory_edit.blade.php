@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">
        <div class="row">

          {{-- ------------- Edit SubCategory Page --------------------- --}}
          <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Editar SubCategoría</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="POST" action="{{route('subcategory.update')}}">
                      @csrf
                      <input type="hidden" name="id" value="{{$subcategory->id}}">
                      <div class="form-group">
                        <h5>Seleccionar Categoría<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="category_id" id="select" required="" class="form-control">
                                <option value="" selected="" disable="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{$category->id==$subcategory->category_id ? 'selected':''}}>{{$category->category_name_en}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                              <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                    </div>
                      <div class="form-group">
                          <label for="exampleFormControlInput3">SubCategoría en Inglés</label>
                          <input type="text" name="subcategory_name_en" class="form-control" value="{{$subcategory->subcategory_name_en}}">
                          @error('subcategory_name_en')
                              <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label for="exampleFormControlPassword3">SubCategoría en Español</label>
                          <input type="text" name="subcategory_name_esp" class="form-control" value="{{$subcategory->subcategory_name_esp}}">
                          @error('subcategory_name_esp')
                              <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlPassword3">Orden de Categoría</label>
                        <input type="number" name="subcategory_order" class="form-control" value="{{$subcategory->subcategory_order}}">
                        @error('subcategory_order')
                            <span class="text-danger">{{$message}}</span>
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

@endsection
