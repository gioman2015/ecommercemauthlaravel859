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
                <h3 class="box-title">Configuracion Header</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Color Fondo</th>
                              <th>Imagen de Fondo</th>
                          </tr>
                      </thead>
                      <tbody>
                            <tr>
                                <td>{{$header->background_color}}</td>
                                <td>
                                    @if ($header->background_imagen)
                                        <img src="{{asset($header->background_imagen)}}" style="width: 70px">
                                    @else
                                    <span class="badge badge-pill badge-danger">Sin Imagen de fondo</span>
                                    @endif
                                    
                                </td>
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

          {{-- ------------- Message Page --------------------- --}}
          <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Actualizar Header Frontend</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="POST" action="{{route('header.update')}}" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="exampleFormControlInput3">Color</label>
                        <input type="color" name="background_color" class="form-control" value="#141414">
                        @error('background_color')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <input type="hidden" name="old_image" value="{{$header->background_imagen}}">
                    <div class="form-group">
                        <label for="exampleFormControlPassword3">Imagen</label>
                        <input type="file" name="background_imagen" class="form-control">
                        @error('background_imagen')
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