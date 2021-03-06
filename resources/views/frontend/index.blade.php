@extends('frontend.main_master')
@section('content')

@section('title')
Home Easy Online Shop
@endsection

<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container" >
      <div class="row"> 
        <!-- ============================================== SIDEBAR ============================================== -->
        <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
          <!-- ================================== TOP NAVIGATION ================================== -->
          @include('frontend.common.vertical_menu')
          <!-- ================================== TOP NAVIGATION : END ================================== --> 
          
          <!-- ============================================== HOT DEALS ============================================== -->
          @include('frontend.common.hot_deals')
          <!-- ============================================== HOT DEALS: END ============================================== --> 
          
          <!-- ============================================== SPECIAL OFFER ============================================== -->
          
          <div class="sidebar-widget outer-bottom-small wow fadeInUp">
            <h3 class="section-title">Oferta Especial</h3>
            <div class="sidebar-widget-body outer-top-xs">
              <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                <div class="item">
                  <div class="products special-product">
                    @foreach ($special_offer as $product) 
                      <div class="product">
                        <div class="product-micro">
                          <div class="row product-micro-row">
                            <div class="col col-xs-5">
                              <div class="product-image">
                                <div class="image"> <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}"> <img src="{{asset($product->product_thambnail)}}" alt=""> </a> </div>
                                <!-- /.image --> 
                                
                              </div>
                              <!-- /.product-image --> 
                            </div>
                            <!-- /.col -->
                            <div class="col col-xs-7">
                              <div class="product-info">
                                <h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">@if(session()->get('language') == 'spanish') {{$product->product_name_esp}} @else {{$product->product_name_en}} @endif</a></h3>
                                {{-- <div class=""></div> --}}
                                @auth
                                  @php
                                    $user = Auth::user();
                                  @endphp
                                  @if ($user->type_user == 1)
                                    <div class="product-price"> <span class="price"> ${{ number_format($product->supplier_price,0,",",".") }} </span>  </div>
                                  @else
                                    @if ($product->discount_price == NULL)
                                      <div class="product-price"> <span class="price"> ${{ number_format($product->selling_price,0,",",".") }} </span>  </div>
                                    @else
                                      <div class="product-price"> <span class="price"> ${{ number_format($product->discount_price,0,",",".") }} </span> <span class="price-before-discount">$ {{ number_format($product->selling_price,0,",",".") }}</span> </div>
                                    @endif
                                  @endif
                                @else
                                  @if ($product->discount_price == NULL)
                                    <div class="product-price"> <span class="price"> ${{ number_format($product->selling_price,0,",",".") }} </span>  </div>
                                  @else
                                    <div class="product-price"> <span class="price"> ${{ number_format($product->discount_price,0,",",".") }} </span> <span class="price-before-discount">$ {{ number_format($product->selling_price,0,",",".") }}</span> </div>
                                  @endif
                                @endauth
                                <!-- /.product-price --> 
                                
                              </div>
                            </div>
                            <!-- /.col --> 
                          </div>
                          <!-- /.product-micro-row --> 
                        </div>
                        <!-- /.product-micro --> 
                        
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            <!-- /.sidebar-widget-body --> 
          </div>
          <!-- /.sidebar-widget --> 
          <!-- ============================================== SPECIAL OFFER : END ============================================== --> 
          <!-- ============================================== PRODUCT TAGS ============================================== -->
           @include('frontend.common.product_tags')
          <!-- ============================================== PRODUCT TAGS : END ============================================== --> 
          <!-- ============================================== SPECIAL DEALS ============================================== -->
          <div class="sidebar-widget outer-bottom-small wow fadeInUp">
            <h3 class="section-title">Venta Especial</h3>
            <div class="sidebar-widget-body outer-top-xs">
              <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                <div class="item">
                  <div class="products special-product">
                    @foreach ($special_deals as $product) 
                      <div class="product">
                        <div class="product-micro">
                          <div class="row product-micro-row">
                            <div class="col col-xs-5">
                              <div class="product-image">
                                <div class="image"> <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}"> <img src="{{asset($product->product_thambnail)}}" alt=""> </a> </div>
                                <!-- /.image --> 
                                
                              </div>
                              <!-- /.product-image --> 
                            </div>
                            <!-- /.col -->
                            <div class="col col-xs-7">
                              <div class="product-info">
                                <h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">@if(session()->get('language') == 'spanish') {{$product->product_name_esp}} @else {{$product->product_name_en}} @endif</a></h3>
                                {{-- <div class=""></div> --}}
                                @auth
                                  @php
                                    $user = Auth::user();
                                  @endphp
                                  @if ($user->type_user == 1)
                                    <div class="product-price"> <span class="price"> ${{ number_format($product->supplier_price,0,",",".") }} </span>  </div>
                                  @else
                                    @if ($product->discount_price == NULL)
                                      <div class="product-price"> <span class="price"> ${{ number_format($product->selling_price,0,",",".") }} </span>  </div>
                                    @else
                                      <div class="product-price"> <span class="price"> ${{ number_format($product->discount_price,0,",",".") }} </span> <span class="price-before-discount">$ {{ number_format($product->selling_price,0,",",".") }}</span> </div>
                                    @endif
                                  @endif
                                @else
                                  @if ($product->discount_price == NULL)
                                    <div class="product-price"> <span class="price"> ${{ number_format($product->selling_price,0,",",".") }} </span>  </div>
                                  @else
                                    <div class="product-price"> <span class="price"> ${{ number_format($product->discount_price,0,",",".") }} </span> <span class="price-before-discount">$ {{ number_format($product->selling_price,0,",",".") }}</span> </div>
                                  @endif
                                @endauth
                                <!-- /.product-price --> 
                                
                              </div>
                            </div>
                            <!-- /.col --> 
                          </div>
                          <!-- /.product-micro-row --> 
                        </div>
                        <!-- /.product-micro --> 
                        
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            <!-- /.sidebar-widget-body --> 
          </div>
          <!-- /.sidebar-widget -->
          <!-- ============================================== SPECIAL DEALS : END ============================================== --> 
          <!-- ============================================== NEWSLETTER ============================================== -->
          {{-- <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
            <h3 class="section-title">Newsletters</h3>
            <div class="sidebar-widget-body outer-top-xs">
              <p>Sign Up for Our Newsletter!</p>
              <form>
                <div class="form-group">
                  <label class="sr-only" for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
                </div>
                <button class="btn btn-primary">Subscribe</button>
              </form>
            </div>
            <!-- /.sidebar-widget-body --> 
          </div> --}}
          <!-- /.sidebar-widget --> 
          <!-- ============================================== NEWSLETTER: END ============================================== --> 
          
          <!-- ============================================== Testimonials============================================== -->
          @include('frontend.common.testimonials')          
          <!-- ============================================== Testimonials: END ============================================== -->
          
          {{-- <div class="home-banner"> <img src="{{asset('frontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image"> </div> --}}
        </div>
        <!-- /.sidemenu-holder --> 
        <!-- ============================================== SIDEBAR : END ============================================== --> 
        
        <!-- ============================================== CONTENT ============================================== -->
        <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
          <!-- ========================================== SECTION ??? HERO ========================================= -->
          
          <div id="hero">
            <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm" >
              @foreach($sliders as $slider)
              <div class="item" style="background-image: url({{asset($slider->slider_img)}});">
                <div class="container-fluid">
                  <div class="caption bg-color vertical-center text-left">
                    <div class="big-text fadeInDown-1"> {{$slider->title}} </div>
                    <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{$slider->desciption}}</span> </div>
                  </div>
                  <!-- /.caption --> 
                </div>
                <!-- /.container-fluid --> 
              </div>
              <!-- /.item -->    
              @endforeach          
            </div>
            <!-- /.owl-carousel --> 
          </div>
          
          <!-- ========================================= SECTION ??? HERO : END ========================================= --> 
          
          <!-- ============================================== INFO BOXES ============================================== -->
          {{-- <div class="info-boxes wow fadeInUp">
            <div class="info-boxes-inner">
              <div class="row">
                <div class="col-md-6 col-sm-4 col-lg-4">
                  <div class="info-box">
                    <div class="row">
                      <div class="col-xs-12">
                        <h4 class="info-box-heading green">money back</h4>
                      </div>
                    </div>
                    <h6 class="text">30 Days Money Back Guarantee</h6>
                  </div>
                </div>
                <!-- .col -->
                
                <div class="hidden-md col-sm-4 col-lg-4">
                  <div class="info-box">
                    <div class="row">
                      <div class="col-xs-12">
                        <h4 class="info-box-heading green">free shipping</h4>
                      </div>
                    </div>
                    <h6 class="text">Shipping on orders over $99</h6>
                  </div>
                </div>
                <!-- .col -->
                
                <div class="col-md-6 col-sm-4 col-lg-4">
                  <div class="info-box">
                    <div class="row">
                      <div class="col-xs-12">
                        <h4 class="info-box-heading green">Special Sale</h4>
                      </div>
                    </div>
                    <h6 class="text">Extra $5 off on all items </h6>
                  </div>
                </div>
                <!-- .col --> 
              </div>
              <!-- /.row --> 
            </div>
            <!-- /.info-boxes-inner --> 
            
          </div> --}}
          <!-- /.info-boxes --> 
          <!-- ============================================== INFO BOXES : END ============================================== --> 
          <!-- ============================================== SCROLL TABS ============================================== -->
          
          <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
            <div class="more-info-tab clearfix ">
              <h3 class="new-product-title pull-left">Productos Nuevos</h3>
              <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
                @foreach ($categories as $category)
                  <li><a data-transition-type="backSlide" href="#category{{$category->id}}" data-toggle="tab">{{$category->category_name_en}}</a></li>
                @endforeach
              </ul>
              <!-- /.nav-tabs --> 
            </div>
            <div class="tab-content outer-top-xs">

              <div class="tab-pane in active" id="all">
                <div class="product-slider">
                  {{-- -------------------------------------------------------------------------------------------------------------------------------------------- --}}
                  <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                    {{-- -------------------------------------------------------------------------------------------------------------------------------------------- --}}
                    @foreach ($products as $product)
                    <div class="item item-carousel">
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
                            <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{asset($product->product_thambnail)}}" alt=""></a> </div>
                            <!-- /.image -->
                            @php
                              $amount = $product->selling_price - $product->discount_price;
                              $discount = ($amount/$product->selling_price) * 100;
                            @endphp       
                              <div>
                                @auth
            @php
              $user = Auth::user();
            @endphp
            @if ($user->type_user == 1)
            
            @else
            @php
            $amount = $product->selling_price - $product->discount_price;
            $discount = ($amount/$product->selling_price) * 100;
            @endphp     
              
              <div>
                @if ($product->discount_price == NULL)
                <div class="tag new"><span>new</span></div>
                @else
                <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                @endif
              </div>
            @endif
          @else
          @php
          $amount = $product->selling_price - $product->discount_price;
          $discount = ($amount/$product->selling_price) * 100;
          @endphp     
            
            <div>
              @if ($product->discount_price == NULL)
              <div class="tag new"><span>new</span></div>
              @else
              <div class="tag hot"><span>{{ round($discount) }}%</span></div>
              @endif
            </div>
          @endauth
                              </div>
                         </div>

                          <!-- /.product-image -->
                          
                          <div class="product-info text-left">
                            <h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">
                              @if(session()->get('language') == 'spanish') {{$product->product_name_esp}} @else {{$product->product_name_en}} @endif</a>
                            </h3>
                            {{-- <div class=""></div> --}}
                            <div class="description"></div>
                            @auth
                              @php
                                $user = Auth::user();
                              @endphp
                              @if ($user->type_user == 1)
                                <div class="product-price"> <span class="price"> ${{ number_format($product->supplier_price,0,",",".") }} </span>  </div>
                              @else
                                @if ($product->discount_price == NULL)
                                  <div class="product-price"> <span class="price"> ${{ number_format($product->selling_price,0,",",".") }} </span>  </div>
                                @else
                                  <div class="product-price"> <span class="price"> ${{ number_format($product->discount_price,0,",",".") }} </span> <span class="price-before-discount">$ {{ number_format($product->selling_price,0,",",".") }}</span> </div>
                                @endif
                              @endif
                            @else
                              @if ($product->discount_price == NULL)
                                <div class="product-price"> <span class="price"> ${{ number_format($product->selling_price,0,",",".") }} </span>  </div>
                              @else
                                <div class="product-price"> <span class="price"> ${{ number_format($product->discount_price,0,",",".") }} </span> <span class="price-before-discount">$ {{ number_format($product->selling_price,0,",",".") }}</span> </div>
                              @endif
                            @endauth
                            {{-- @if ($product->discount_price == NULL)
                              <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
                            @else
                              <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
                            @endif --}}
                            <!-- /.product-price --> 
                            
                          </div>
                          <!-- /.product-info -->
                          <div class="cart clearfix animate-effect">
                            <div class="action">
                              <ul class="list-unstyled">
                                <li class="add-cart-button btn-group">
                                  <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                                  <button class="btn btn-primary cart-btn" type="button">Agregar al Carrito</button>
                                </li> 
                                  <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"  style="background-color: #292929"> <i class="fa fa-heart"></i> </button>
                                
                              </ul>
                            </div>
                            <!-- /.action --> 
                          </div>
                          <!-- /.cart --> 
                        </div>
                        <!-- /.product --> 
                        
                      </div>
                      <!-- /.products --> 
                    </div>
                    <!-- /.item -->
                    @endforeach {{-- end all opcion foreach --}}
                  </div>
                  <!-- /.home-owl-carousel --> 
                </div>
                <!-- /.product-slider --> 
              </div>
              <!-- /.tab-pane -->

              
              @foreach ($categories as $category)
              <div class="tab-pane in active" id="category{{$category->id}}">
                <div class="product-slider">
                  <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                    @php
                      $catwiseProcuct = App\Models\Product::where([['category_id',$category->id],['status','1']])->orderBy('id','DESC')->get();
                    @endphp
                    @forelse ($catwiseProcuct as $product)
                      <div class="item item-carousel">
                        <div class="products">
                          <div class="product">
                            <div class="product-image">
                              <div class="image"> <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}"><img  src="{{asset($product->product_thambnail)}}" alt=""></a> </div>
                              <!-- /.image -->
                              @php
                                $amount = $product->selling_price - $product->discount_price;
                                $discount = ($amount/$product->selling_price) * 100;
                              @endphp                 
                                <div>
                                  @auth
            @php
              $user = Auth::user();
            @endphp
            @if ($user->type_user == 1)
            
            @else
            @php
            $amount = $product->selling_price - $product->discount_price;
            $discount = ($amount/$product->selling_price) * 100;
            @endphp     
              
              <div>
                @if ($product->discount_price == NULL)
                <div class="tag new"><span>new</span></div>
                @else
                <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                @endif
              </div>
            @endif
          @else
          @php
          $amount = $product->selling_price - $product->discount_price;
          $discount = ($amount/$product->selling_price) * 100;
          @endphp     
            
            <div>
              @if ($product->discount_price == NULL)
              <div class="tag new"><span>new</span></div>
              @else
              <div class="tag hot"><span>{{ round($discount) }}%</span></div>
              @endif
            </div>
          @endauth
                                </div>
                          </div>

                            <!-- /.product-image -->
                            
                            <div class="product-info text-left">
                              <h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">@if(session()->get('language') == 'spanish') {{$product->product_name_esp}} @else {{$product->product_name_en}} @endif</a></h3>
                              {{-- <div class=""></div> --}}
                              <div class="description"></div>
                              @auth
                                @php
                                  $user = Auth::user();
                                @endphp
                                @if ($user->type_user == 1)
                                  <div class="product-price"> <span class="price"> ${{ number_format($product->supplier_price,0,",",".") }} </span>  </div>
                                @else
                                  @if ($product->discount_price == NULL)
                                    <div class="product-price"> <span class="price"> ${{ number_format($product->selling_price,0,",",".") }} </span>  </div>
                                  @else
                                    <div class="product-price"> <span class="price"> ${{ number_format($product->discount_price,0,",",".") }} </span> <span class="price-before-discount">$ {{ number_format($product->selling_price,0,",",".") }}</span> </div>
                                  @endif
                                @endif
                              @else
                                @if ($product->discount_price == NULL)
                                  <div class="product-price"> <span class="price"> ${{ number_format($product->selling_price,0,",",".") }} </span>  </div>
                                @else
                                  <div class="product-price"> <span class="price"> ${{ number_format($product->discount_price,0,",",".") }} </span> <span class="price-before-discount">$ {{ number_format($product->selling_price,0,",",".") }}</span> </div>
                                @endif
                              @endauth
                              <!-- /.product-price --> 
                              
                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                              <div class="action">
                                <ul class="list-unstyled">
                                  <li class="add-cart-button btn-group">
                                    <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                                    <button class="btn btn-primary cart-btn" type="button">Agregar al Carrito</button>
                                  </li>
                                   <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"  style="background-color: #292929"> <i class="fa fa-heart"></i> </button>
                                  
                                </ul>
                              </div>
                              <!-- /.action --> 
                            </div>
                            <!-- /.cart --> 
                          </div>
                          <!-- /.product --> 
                          
                        </div>
                        <!-- /.products --> 
                      </div>
                      <!-- /.item -->
                      @empty
                        <h5 class="text-danger">@if(session()->get('language') == 'spanish') {{-- No hay productos --}} @else  {{-- No product found --}}</h5>
                      @endempty
                    @endforelse {{-- end all opcion foreach --}}
                  </div>
                  <!-- /.home-owl-carousel --> 
                </div>
                <!-- /.product-slider --> 
              </div>
              <!-- /.tab-pane -->
              @endforeach {{-- end category foreach --}}




            </div>
            <!-- /.tab-content --> 
          </div>
          <!-- /.scroll-tabs --> 
          <!-- ============================================== SCROLL TABS : END ============================================== --> 
          <!-- ============================================== WIDE PRODUCTS ============================================== -->
          {{-- <div class="wide-banners wow fadeInUp outer-bottom-xs">
            <div class="row">
              <div class="col-md-7 col-sm-7">
                <div class="wide-banner cnt-strip">
                  <div class="image"> <img class="img-responsive" src="{{asset('frontend/assets/images/banners/home-banner1.jpg')}}" alt=""> </div>
                </div>
                <!-- /.wide-banner --> 
              </div>
              <!-- /.col -->
              <div class="col-md-5 col-sm-5">
                <div class="wide-banner cnt-strip">
                  <div class="image"> <img class="img-responsive" src="{{asset('frontend/assets/images/banners/home-banner2.jpg')}}" alt=""> </div>
                </div>
                <!-- /.wide-banner --> 
              </div>
              <!-- /.col --> 
            </div>
            <!-- /.row --> 
          </div> --}}
          <!-- /.wide-banners --> 
          
          <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 
          <!-- ============================================== FEATURED PRODUCTS ============================================== -->
          <section class="section featured-product wow fadeInUp">
            <h3 class="section-title">Productos Destacados</h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
              @foreach ($featured as $product)
              <div class="item item-carousel">
                <div class="products">
                  <div class="product">
                    <div class="product-image">
                      <div class="image"> <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}"><img  src="{{asset($product->product_thambnail)}}" alt=""></a> </div>
                      <!-- /.image -->
                      @php
                        $amount = $product->selling_price - $product->discount_price;
                        $discount = ($amount/$product->selling_price) * 100;
                      @endphp                 
                        <div>
                          @auth
            @php
              $user = Auth::user();
            @endphp
            @if ($user->type_user == 1)
            
            @else
            @php
            $amount = $product->selling_price - $product->discount_price;
            $discount = ($amount/$product->selling_price) * 100;
            @endphp     
              
              <div>
                @if ($product->discount_price == NULL)
                <div class="tag new"><span>new</span></div>
                @else
                <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                @endif
              </div>
            @endif
          @else
          @php
          $amount = $product->selling_price - $product->discount_price;
          $discount = ($amount/$product->selling_price) * 100;
          @endphp     
            
            <div>
              @if ($product->discount_price == NULL)
              <div class="tag new"><span>new</span></div>
              @else
              <div class="tag hot"><span>{{ round($discount) }}%</span></div>
              @endif
            </div>
          @endauth
                        </div>
                   </div>

                    <!-- /.product-image -->
                    
                    <div class="product-info text-left">
                      <h3 class="name">
                        <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">
                          @if(session()->get('language') == 'spanish') 
                          {{$product->product_name_esp}} 
                          @else 
                            {{$product->product_name_en}}  
                          @endif
                        </a>
                      </h3>
                      {{-- <div class=""></div> --}}
                      <div class="description"></div>
                      @auth
                        @php
                          $user = Auth::user();
                        @endphp
                        @if ($user->type_user == 1)
                          <div class="product-price"> <span class="price"> ${{ number_format($product->supplier_price,0,",",".") }} </span>  </div>
                        @else
                          @if ($product->discount_price == NULL)
                            <div class="product-price"> <span class="price"> ${{ number_format($product->selling_price,0,",",".") }} </span>  </div>
                          @else
                            <div class="product-price"> <span class="price"> ${{ number_format($product->discount_price,0,",",".") }} </span> <span class="price-before-discount">$ {{ number_format($product->selling_price,0,",",".") }}</span> </div>
                          @endif
                        @endif
                      @else
                        @if ($product->discount_price == NULL)
                          <div class="product-price"> <span class="price"> ${{ number_format($product->selling_price,0,",",".") }} </span>  </div>
                        @else
                          <div class="product-price"> <span class="price"> ${{ number_format($product->discount_price,0,",",".") }} </span> <span class="price-before-discount">$ {{ number_format($product->selling_price,0,",",".") }}</span> </div>
                        @endif
                      @endauth
                      <!-- /.product-price --> 
                      
                    </div>
                    <!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                      <div class="action">
                        <ul class="list-unstyled">
                          <li class="add-cart-button btn-group">
                            <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                            <button class="btn btn-primary cart-btn" type="button">Agregar al Carrito</button>
                          </li>
                          <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"  style="background-color: #292929"> <i class="fa fa-heart"></i> </button>
                        </ul>
                      </div>
                      <!-- /.action --> 
                    </div>
                    <!-- /.cart --> 
                  </div>
                  <!-- /.product --> 
                  
                </div>
                <!-- /.products --> 
              </div>
              <!-- /.item -->
              @endforeach

            </div>
            <!-- /.home-owl-carousel --> 
          </section>
          <!-- /.section --> 
          <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 

          <!-- ============================================== SKIPPRODUCT0 PRODUCTS ============================================== -->
          {{-- <section class="section featured-product wow fadeInUp">
            <h3 class="section-title">@if(session()->get('language') == 'spanish') {{$skip_category_0->category_name_esp}} @else {{$skip_category_0->category_name_en}} @endif</h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
              @foreach ($skip_product_0 as $product)
              <div class="item item-carousel">
                <div class="products">
                  <div class="product">
                    <div class="product-image">
                      <div class="image"> <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}"><img  src="{{asset($product->product_thambnail)}}" alt=""></a> </div>
                      <!-- /.image -->
                      @php
                        $amount = $product->selling_price - $product->discount_price;
                        $discount = ($amount/$product->selling_price) * 100;
                      @endphp                 
                        <div>
                          @if ($product->discount_price == NULL)
                          <div class="tag new"><span>new</span></div>
                          @else
                          <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                          @endif
                        </div>
                   </div>

                    <!-- /.product-image -->
                    
                    <div class="product-info text-left">
                      <h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">{{$product->product_name_en}}</a></h3>
                      <div class=""></div>
                      <div class="description"></div>
                      @if ($product->discount_price == NULL)
                        <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
                      @else
                        <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
                      @endif
                      <!-- /.product-price --> 
                      
                    </div>
                    <!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                      <div class="action">
                        <ul class="list-unstyled">
                          <li class="add-cart-button btn-group">
                            <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                          </li>
                          <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                          <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                        </ul>
                      </div>
                      <!-- /.action --> 
                    </div>
                    <!-- /.cart --> 
                  </div>
                  <!-- /.product --> 
                  
                </div>
                <!-- /.products --> 
              </div>
              <!-- /.item -->
              @endforeach

            </div>
            <!-- /.home-owl-carousel --> 
          </section> --}}
          <!-- /.section --> 
          <!-- ============================================== SKIPPRODUCT0 PRODUCTS : END ============================================== --> 

          <!-- ============================================== WIDE PRODUCTS ============================================== -->
          {{-- <div class="wide-banners wow fadeInUp outer-bottom-xs">
            <div class="row">
              <div class="col-md-12">
                <div class="wide-banner cnt-strip">
                  <div class="image"> <img class="img-responsive" src="{{asset('frontend/assets/images/banners/home-banner.jpg')}}" alt=""> </div>
                  <div class="strip strip-text">
                    <div class="strip-inner">
                      <h2 class="text-right">New Mens Fashion<br>
                        <span class="shopping-needs">Save up to 40% off</span></h2>
                    </div>
                  </div>
                  <div class="new-label">
                    <div class="text">NEW</div>
                  </div>
                  <!-- /.new-label --> 
                </div>
                <!-- /.wide-banner --> 
              </div>
              <!-- /.col --> 
              
            </div>
            <!-- /.row --> 
          </div> --}}
          <!-- /.wide-banners --> 
          <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 
          <!-- ============================================== BEST SELLER ============================================== -->
          
          {{-- <div class="best-deal wow fadeInUp outer-bottom-xs">
            <h3 class="section-title">Best seller</h3>
            <div class="sidebar-widget-body outer-top-xs">
              <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
                <div class="item">
                  <div class="products best-product">
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{asset('frontend/assets/images/products/p20.jpg')}}" alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col2 col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                              <div class=""></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{asset('frontend/assets/images/products/p21.jpg')}}" alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col2 col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                              <div class=""></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="products best-product">
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{asset('frontend/assets/images/products/p22.jpg')}}" alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col2 col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                              <div class=""></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{asset('frontend/assets/images/products/p23.jpg')}}" alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col2 col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                              <div class=""></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="products best-product">
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{asset('frontend/assets/images/products/p24.jpg')}}" alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col2 col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                              <div class=""></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{asset('frontend/assets/images/products/p25.jpg')}}" alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col2 col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                              <div class=""></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="products best-product">
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{asset('frontend/assets/images/products/p26.jpg')}}" alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col2 col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                              <div class=""></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{asset('frontend/assets/images/products/p27.jpg')}}" alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col2 col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                              <div class=""></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.sidebar-widget-body --> 
          </div> --}}
          <!-- /.sidebar-widget --> 
          <!-- ============================================== BEST SELLER : END ============================================== --> 
          
          <!-- ============================================== BLOG SLIDER ============================================== -->
          {{-- <section class="section latest-blog outer-bottom-vs wow fadeInUp">
            <h3 class="section-title">latest form blog</h3>
            <div class="blog-slider-container outer-top-xs">
              <div class="owl-carousel blog-slider custom-carousel">
                <div class="item">
                  <div class="blog-post">
                    <div class="blog-post-image">
                      <div class="image"> <a href="blog.html"><img src="{{asset('frontend/assets/images/blog-post/post1.jpg')}}" alt=""></a> </div>
                    </div>
                    <!-- /.blog-post-image -->
                    
                    <div class="blog-post-info text-left">
                      <h3 class="name"><a href="#">Voluptatem accusantium doloremque laudantium</a></h3>
                      <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
                      <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                      <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                    <!-- /.blog-post-info --> 
                    
                  </div>
                  <!-- /.blog-post --> 
                </div>
                <!-- /.item -->
                
                <div class="item">
                  <div class="blog-post">
                    <div class="blog-post-image">
                      <div class="image"> <a href="blog.html"><img src="{{asset('frontend/assets/images/blog-post/post2.jpg')}}" alt=""></a> </div>
                    </div>
                    <!-- /.blog-post-image -->
                    
                    <div class="blog-post-info text-left">
                      <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                      <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                      <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                      <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                    <!-- /.blog-post-info --> 
                    
                  </div>
                  <!-- /.blog-post --> 
                </div>
                <!-- /.item --> 
                
                <!-- /.item -->
                
                <div class="item">
                  <div class="blog-post">
                    <div class="blog-post-image">
                      <div class="image"> <a href="blog.html"><img src="{{asset('frontend/assets/images/blog-post/post1.jpg')}}" alt=""></a> </div>
                    </div>
                    <!-- /.blog-post-image -->
                    
                    <div class="blog-post-info text-left">
                      <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                      <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                      <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                      <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                    <!-- /.blog-post-info --> 
                    
                  </div>
                  <!-- /.blog-post --> 
                </div>
                <!-- /.item -->
                
                <div class="item">
                  <div class="blog-post">
                    <div class="blog-post-image">
                      <div class="image"> <a href="blog.html"><img src="{{asset('frontend/assets/images/blog-post/post2.jpg')}}" alt=""></a> </div>
                    </div>
                    <!-- /.blog-post-image -->
                    
                    <div class="blog-post-info text-left">
                      <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                      <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                      <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                      <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                    <!-- /.blog-post-info --> 
                    
                  </div>
                  <!-- /.blog-post --> 
                </div>
                <!-- /.item -->
                
                <div class="item">
                  <div class="blog-post">
                    <div class="blog-post-image">
                      <div class="image"> <a href="blog.html"><img src="{{asset('frontend/assets/images/blog-post/post1.jpg')}}" alt=""></a> </div>
                    </div>
                    <!-- /.blog-post-image -->
                    
                    <div class="blog-post-info text-left">
                      <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                      <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                      <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                      <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                    <!-- /.blog-post-info --> 
                    
                  </div>
                  <!-- /.blog-post --> 
                </div>
                <!-- /.item --> 
                
              </div>
              <!-- /.owl-carousel --> 
            </div>
            <!-- /.blog-slider-container --> 
          </section> --}}
          <!-- /.section --> 
          <!-- ============================================== BLOG SLIDER : END ============================================== --> 
          
          <!-- ============================================== FEATURED PRODUCTS ============================================== -->
          {{-- <section class="section wow fadeInUp new-arriavls">
            <h3 class="section-title">New Arrivals</h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
              <div class="item item-carousel">
                <div class="products">
                  <div class="product">
                    <div class="product-image">
                      <div class="image"> <a href="detail.html"><img  src="{{asset('frontend/assets/images/products/p19.jpg')}}" alt=""></a> </div>
                      <!-- /.image -->
                      
                      <div class="tag new"><span>new</span></div>
                    </div>
                    <!-- /.product-image -->
                    
                    <div class="product-info text-left">
                      <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                      <div class=""></div>
                      <div class="description"></div>
                      <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                      <!-- /.product-price --> 
                      
                    </div>
                    <!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                      <div class="action">
                        <ul class="list-unstyled">
                          <li class="add-cart-button btn-group">
                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                          </li>
                          <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                          <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                        </ul>
                      </div>
                      <!-- /.action --> 
                    </div>
                    <!-- /.cart --> 
                  </div>
                  <!-- /.product --> 
                  
                </div>
                <!-- /.products --> 
              </div>
              <!-- /.item -->
              
              <div class="item item-carousel">
                <div class="products">
                  <div class="product">
                    <div class="product-image">
                      <div class="image"> <a href="detail.html"><img  src="{{asset('frontend/assets/images/products/p28.jpg')}}" alt=""></a> </div>
                      <!-- /.image -->
                      
                      <div class="tag new"><span>new</span></div>
                    </div>
                    <!-- /.product-image -->
                    
                    <div class="product-info text-left">
                      <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                      <div class=""></div>
                      <div class="description"></div>
                      <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                      <!-- /.product-price --> 
                      
                    </div>
                    <!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                      <div class="action">
                        <ul class="list-unstyled">
                          <li class="add-cart-button btn-group">
                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                          </li>
                          <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                          <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                        </ul>
                      </div>
                      <!-- /.action --> 
                    </div>
                    <!-- /.cart --> 
                  </div>
                  <!-- /.product --> 
                  
                </div>
                <!-- /.products --> 
              </div>
              <!-- /.item -->
              
              <div class="item item-carousel">
                <div class="products">
                  <div class="product">
                    <div class="product-image">
                      <div class="image"> <a href="detail.html"><img  src="{{asset('frontend/assets/images/products/p30.jpg')}}" alt=""></a> </div>
                      <!-- /.image -->
                      
                      <div class="tag hot"><span>hot</span></div>
                    </div>
                    <!-- /.product-image -->
                    
                    <div class="product-info text-left">
                      <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                      <div class=""></div>
                      <div class="description"></div>
                      <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                      <!-- /.product-price --> 
                      
                    </div>
                    <!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                      <div class="action">
                        <ul class="list-unstyled">
                          <li class="add-cart-button btn-group">
                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                          </li>
                          <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                          <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                        </ul>
                      </div>
                      <!-- /.action --> 
                    </div>
                    <!-- /.cart --> 
                  </div>
                  <!-- /.product --> 
                  
                </div>
                <!-- /.products --> 
              </div>
              <!-- /.item -->
              
              <div class="item item-carousel">
                <div class="products">
                  <div class="product">
                    <div class="product-image">
                      <div class="image"> <a href="detail.html"><img  src="{{asset('frontend/assets/images/products/p1.jpg')}}" alt=""></a> </div>
                      <!-- /.image -->
                      
                      <div class="tag hot"><span>hot</span></div>
                    </div>
                    <!-- /.product-image -->
                    
                    <div class="product-info text-left">
                      <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                      <div class=""></div>
                      <div class="description"></div>
                      <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                      <!-- /.product-price --> 
                      
                    </div>
                    <!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                      <div class="action">
                        <ul class="list-unstyled">
                          <li class="add-cart-button btn-group">
                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                          </li>
                          <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                          <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                        </ul>
                      </div>
                      <!-- /.action --> 
                    </div>
                    <!-- /.cart --> 
                  </div>
                  <!-- /.product --> 
                  
                </div>
                <!-- /.products --> 
              </div>
              <!-- /.item -->
              
              <div class="item item-carousel">
                <div class="products">
                  <div class="product">
                    <div class="product-image">
                      <div class="image"> <a href="detail.html"><img  src="{{asset('frontend/assets/images/products/p2.jpg')}}" alt=""></a> </div>
                      <!-- /.image -->
                      
                      <div class="tag sale"><span>sale</span></div>
                    </div>
                    <!-- /.product-image -->
                    
                    <div class="product-info text-left">
                      <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                      <div class=""></div>
                      <div class="description"></div>
                      <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                      <!-- /.product-price --> 
                      
                    </div>
                    <!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                      <div class="action">
                        <ul class="list-unstyled">
                          <li class="add-cart-button btn-group">
                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                          </li>
                          <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                          <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                        </ul>
                      </div>
                      <!-- /.action --> 
                    </div>
                    <!-- /.cart --> 
                  </div>
                  <!-- /.product --> 
                  
                </div>
                <!-- /.products --> 
              </div>
              <!-- /.item -->
              
              <div class="item item-carousel">
                <div class="products">
                  <div class="product">
                    <div class="product-image">
                      <div class="image"> <a href="detail.html"><img  src="{{asset('frontend/assets/images/products/p3.jpg')}}" alt=""></a> </div>
                      <!-- /.image -->
                      
                      <div class="tag sale"><span>sale</span></div>
                    </div>
                    <!-- /.product-image -->
                    
                    <div class="product-info text-left">
                      <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                      <div class=""></div>
                      <div class="description"></div>
                      <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                      <!-- /.product-price --> 
                      
                    </div>
                    <!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                      <div class="action">
                        <ul class="list-unstyled">
                          <li class="add-cart-button btn-group">
                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                          </li>
                          <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                          <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                        </ul>
                      </div>
                      <!-- /.action --> 
                    </div>
                    <!-- /.cart --> 
                  </div>
                  <!-- /.product --> 
                  
                </div>
                <!-- /.products --> 
              </div>
              <!-- /.item --> 
            </div>
            <!-- /.home-owl-carousel --> 
          </section> --}}
          <!-- /.section --> 
          <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 
          
        </div>
        <!-- /.homebanner-holder --> 
        <!-- ============================================== CONTENT : END ============================================== --> 
      </div>
      <!-- /.row --> 
      <!-- ============================================== BRANDS CAROUSEL ============================================== -->
      @include('frontend.body.brands')
      <!-- /.logo-slider --> 
      <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 
    </div>
    <!-- /.container --> 
  </div>
@endsection