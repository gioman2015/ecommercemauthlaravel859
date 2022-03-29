@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper">
    <div class="container-full">
      <!-- Main content -->
      <section class="content">

       <!-- Basic Forms -->
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Agregar Producto</h4>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                  <form method="POST" action="{{route('product-store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-12">
                        <div class="row">{{-- 1st row --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Seleccione marca <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="brand_id" id="select" required="" class="form-control">
                                            <option value="" selected="" disable="">Seleccione marca</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{$brand->id}}">{{$brand->brand_name_en}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                </div>
                            </div>{{-- end col-md-4 --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Seleccione categoría <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" id="select" required="" class="form-control">
                                            <option value="" selected="" disable="">Seleccione categoría</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name_en}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                          <span class="text-danger">{{$message}}</span>
                                      @enderror
                                    </div>
                                </div>
                            </div>{{-- end col-md-4 --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Seleccione subcategoría <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subcategory_id" class="form-control" {{-- required="" --}} >
                                            <option value="" selected="" disabled="">Seleccione subcategoría</option>
                                        </select>
                                    @error('subcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                            </div>{{-- end col-md-4 --}}
                        </div>{{-- end 1st row --}}

                        <div class="row">{{-- 2nd row --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Seleccione sub->subcategoría <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subsubcategory_id" class="form-control" {{-- required="" --}} >
                                            <option value="" selected="" disabled="">Seleccione sub->subcategoría</option>
                                        </select>
                                    @error('subsubcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                            </div>{{-- end col-md-4 --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Nombre del producto Eng <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_en" class="form-control" required="">
                                        @error('product_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>{{-- end col-md-4 --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Nombre del producto Esp <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_esp" class="form-control" required="">
                                        @error('product_name_esp')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>{{-- end col-md-4 --}}
                        </div>{{-- end 2nd row --}}

                        <div class="row">{{-- 3rd row --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Codigo del producto <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_code" class="form-control" required="">
                                        @error('product_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>{{-- end col-md-4 --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Cantidad del producto <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_qty" class="form-control" required="">
                                        @error('product_qty')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>{{-- end col-md-4 --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Peso del producto <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="number" name="product_weight" class="form-control" required=""/>
                                        @error('product_weight')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>{{-- end col-md-4 --}}
                        </div>{{-- end 3rd row --}}

                        <div class="row">{{-- 4th row --}}
                            <div class="col-md-3">
                                <div class="form-group">
                                    <h5>Etiqueta del producto Eng <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_tags_en" value="" data-role="tagsinput" placeholder="agregar etiqueta" required=""/>
                                        @error('product_tags_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>{{-- end col-md-4 --}}
                            <div class="col-md-3">
                                <div class="form-group">
                                    <h5>Etiqueta del producto Esp <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_tags_esp" value="" data-role="tagsinput" placeholder="agregar etiqueta" required=""/>
                                        @error('product_tags_esp')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>{{-- end col-md-3 --}}
                            <div class="col-md-3">
                                <div class="form-group">
                                    <h5>Tamaño del producto Eng <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_size_en" value="" data-role="tagsinput" placeholder="agregar etiqueta"/>
                                        @error('product_size_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>{{-- end col-md-3 --}}
                            <div class="col-md-3">
                                <div class="form-group">
                                    <h5>Tamaño del producto Esp <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_size_esp" value="" data-role="tagsinput" placeholder="agregar etiqueta"/>
                                        @error('product_size_esp')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>{{-- end col-md-3 --}}
                        </div>{{-- end 4th row --}}

                        <div class="row">{{-- 5th row --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Color del producto Eng <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_color_en" value="" data-role="tagsinput" placeholder="agregar etiqueta" />
                                        @error('product_color_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>{{-- end col-md-4 --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Color del producto Esp <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_color_esp" value="" data-role="tagsinput" placeholder="agregar etiqueta" />
                                        @error('product_color_esp')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>{{-- end col-md-4 --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Puntos<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="number" name="puntos" value="0" class="form-control" />
                                        @error('puntos')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>{{-- end col-md-4 --}}

                        </div>{{-- end 5th row --}}

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Precio de venta del producto <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="number" name="selling_price" class="form-control" required="">
                                        @error('selling_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>{{-- end col-md-4 --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Precio con descuento del producto <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="number" name="discount_price" class="form-control">
                                        @error('discount_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>{{-- end col-md-4 --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Precio para proveedor del producto <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="number" name="supplier_price" class="form-control">
                                        @error('supplier_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>{{-- end col-md-4 --}}
                        </div>{{-- end Prices row --}}

                        <div class="row">{{-- 6th row --}}

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Imagen en miniatura<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="product_thambnail" class="form-control" onChange="mainThamUrl(this)" required="">
                                    </div>
                                    <img src="" id="mainThmb">
                                    @error('product_thambnail')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>{{-- end col-md-6 --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Imagen multiple<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg" required="">
                                    </div>
                                    @error('multi_img')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="row" id="preview_img"></div>
                                </div>
                            </div>{{-- end col-md-6 --}}
                        </div>{{-- end 6th row --}}

                        <div class="row">{{-- 7th row --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Descripción corta Eng <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_descp_en" class="form-control" required placeholder="Area del texto" required=""></textarea>
                                    </div>
                                </div>
                            </div>{{-- end col-md-6 --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Descripción corta Esp <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_descp_esp" class="form-control" required placeholder="Area del texto" required=""></textarea>
                                    </div>
                                </div>
                            </div>{{-- end col-md-6 --}}
                        </div>{{-- end 7th row --}}

                        <div class="row">{{-- 8th row --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Descripción larga Eng <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea id="editor1" name="long_descp_en" rows="10" cols="80" required="">

                                        </textarea>
                                    </div>
                                </div>
                            </div>{{-- end col-md-6 --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Descripción larga Esp <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea id="editor2" name="long_descp_esp" rows="10" cols="80" required="">

                                        </textarea>
                                    </div>
                                </div>
                            </div>{{-- end col-md-6 --}}
                        </div>{{-- end 8th row --}}

                        <hr>
                    </div>


                    </div>
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
                                        <label for="checkbox_2">Hot Deals</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_3" name="featured" value="1">
                                        <label for="checkbox_3">Featured</label>
                                    </fieldset>
                                </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <div class="controls">
                                      <fieldset>
                                          <input type="checkbox" id="checkbox_4" name="special_offer" value="1">
                                          <label for="checkbox_4">Special Offer</label>
                                      </fieldset>
                                      <fieldset>
                                          <input type="checkbox" id="checkbox_5" name="special_deals" value="1">
                                          <label for="checkbox_5">Special Deals</label>
                                      </fieldset>
                                  </div>
                              </div>
                            </div>
                      </div>
                      <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Agregar producto">
                      </div>
                  </form>

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
      $('select[name="category_id"]').on('change', function(){
          var category_id = $(this).val();
          if(category_id) {
              $.ajax({
                  url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                      $('select[name="subsubcategory_id"]').html('');
                      var d =$('select[name="subcategory_id"]').empty();
                        d =$('select[name="subcategory_id"]').append('<option value=""> --- </option>');
                        $.each(data, function(key, value){
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });



$('select[name="subcategory_id"]').on('change', function(){
          var subcategory_id = $(this).val();
          if(subcategory_id) {
              $.ajax({
                  url: "{{  url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                        var d =$('select[name="subsubcategory_id"]').empty();
                        d =$('select[name="subsubcategory_id"]').append('<option value=""> --- </option>');
                        $.each(data, function(key, value){
                            $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });


  });
  </script>

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


<script>

  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data

          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result).height(150) ;
                  /* .width(300); */ //create image element
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });

      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });

  </script>

@endsection
