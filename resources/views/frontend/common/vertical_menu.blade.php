@php
    $categories = App\Models\Category::orderBy('category_order','ASC')->get();
@endphp

  <form action="{{ route('product.search') }}" method="POST">
    @csrf
    <div class="row">
      <div class="col-xs-10 col-sm-10 col-md-10">
        <input type="search" required="required" class="header_search_input" placeholder="Buscar productos..." name="search" style="width: 100%; height: 35px;">
      </div>
      <div class="col-xs-1 col-sm-1 col-md-1">
        <button type="submit" class="btn btn-primary icon" value="submit" style="background: #292929; color:white; margin-left: -10px">
          <i class="fa fa-search"></i>
          {{-- <img src="{{asset('frontend/assets/images/search.png')}}" alt="" width="10px"> --}}
        </button>
      </div>
    </div>
  </form>
  <br>

<div class="side-menu animate-dropdown outer-bottom-xs"  {{-- style="background-image: url({{asset('frontend/assets/images/body.jpg')}})" --}}>
    <div class="head" style="background: #292929; color:white"><i class="icon fa fa-align-justify fa-fw"></i> Categorias</div>
    <nav class="yamm megamenu-horizontal">
      <ul class="nav">
        @foreach ($categories as $category) 
        <li class="dropdown menu-item" > <a href="#" class="dropdown-toggle" data-toggle="dropdown" {{-- style="color:white" --}}><i class="{{$category->category_icon}}"></i>
          @if(session()->get('language') == 'spanish') {{$category->category_name_esp}} @else {{$category->category_name_en}} @endif</a>
          <ul class="dropdown-menu mega-menu">
            <li class="yamm-content">
              <div class="row">
                @php
                    $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_order','ASC')->get()
                @endphp
                @foreach ($subcategories as $subcategory)
                <div class="col-sm-12 col-md-3">
                    <a href="{{url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug_en)}}">
                  <h2 class="title">@if(session()->get('language') == 'spanish') {{$subcategory->subcategory_name_esp}} @else {{$subcategory->subcategory_name_en}} @endif</h2></a>
                  @php
                    $subsubcategories = App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('subsubcategory_order','ASC')->get()
                  @endphp
                  @foreach ($subsubcategories as $subsubcategory)
                  <ul class="links list-unstyled">
                    <li>
                      <a href="{{url('subsubcategory/product/'.$subsubcategory->id.'/'.$subsubcategory->subsubcategory_slug_en)}}">
                        @if(session()->get('language') == 'spanish') 
                          <i class="fa fa-circle" style="font-size: 8px;"></i> {{$subsubcategory->subsubcategory_name_esp}} 
                        @else 
                          <i class="fa fa-circle" style="font-size: 8px;"></i> {{$subsubcategory->subsubcategory_name_en}} 
                        @endif
                        </a>
                      </li>
                  </ul>
                  @endforeach {{-- end subsubcategory foreach --}}
                </div>
                @endforeach {{-- end subcategory foreach --}}
                <!-- /.col -->
              </div>
              <!-- /.row --> 
            </li>
            <!-- /.yamm-content -->
          </ul>
          <!-- /.dropdown-menu --> </li>
        <!-- /.menu-item -->
        @endforeach {{-- end category foreach --}}

          <!-- /.dropdown-menu --> </li>
        <!-- /.menu-item -->
        
        {{-- <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-futbol-o"></i>Sports</a>  --}}
          <!-- ================================== MEGAMENU VERTICAL ================================== --> 
          <!-- /.dropdown-menu --> 
          <!-- ================================== MEGAMENU VERTICAL ================================== --> </li>
        <!-- /.menu-item -->
        
        {{-- <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-envira"></i>Home and Garden</a>  --}}
          <!-- /.dropdown-menu --> </li>
        <!-- /.menu-item -->
        
      </ul>
      <!-- /.nav --> 
    </nav>
    <!-- /.megamenu-horizontal --> 
  </div>
  <!-- /.side-menu --> 