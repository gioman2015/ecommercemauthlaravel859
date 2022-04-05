@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">
        <div class="row"> 
          <!-- /.col -->

          {{-- ------------- Edit Brand Page --------------------- --}}
          <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Editar Precio</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="POST" action="{{route('precios.update',$envios->id)}}">
                      @csrf
                      <input type="hidden" name="id" value="{{$envios->id}}">
                      <div class="form-group">
                          <label for="exampleFormControlInput3">Peso</label>
                          <input type="text" name="desde" class="form-control" value="{{$envios->desde}}">
                          @error('desde')
                              <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput3">Peso</label>
                        <input type="text" name="hasta" class="form-control" value="{{$envios->hasta}}">
                        @error('haste')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                      <div class="form-group">
                          <label for="exampleFormControlPassword3">Tipo de envio</label>
                          <input type="text" name="type" class="form-control" value="{{$envios->type}}" readonly>
                          @error('type')
                              <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlPassword3">Precio</label>
                        <input type="text" name="price" class="form-control" value="{{$envios->price}}">
                        @error('price')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                      
                      <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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