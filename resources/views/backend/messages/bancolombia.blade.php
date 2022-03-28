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
                <h3 class="box-title">Informacion Bancolombia</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Tipo</th>
                              <th>Numero</th>
                              <th>C.C</th>
                              <th>Titular</th>
                          </tr>
                      </thead>
                      <tbody>
                            <tr>
                                <td>{{$bancolombia->tipo}}</td>
                                <td>{{$bancolombia->numero}}</td>
                                <td>{{$bancolombia->cc}}</td>
                                <td>{{$bancolombia->titular}}</td>
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
                 <h3 class="box-title">Actualizar Informacion Bancolombia</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="POST" action="{{route('bancolombia.update')}}">
                      @csrf
                      <div class="form-group">
                        <label for="exampleFormControlInput3">Tipo</label>
                        <input type="text" name="tipo" class="form-control" required>
                        @error('tipo')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput3">Numero</label>
                        <input type="text" name="numero" class="form-control" required>
                        @error('numero')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput3">C.C.</label>
                        <input type="text" name="cc" class="form-control" required>
                        @error('cc')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput3">Titular</label>
                        <input type="text" name="titular" class="form-control" required>
                        @error('titular')
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