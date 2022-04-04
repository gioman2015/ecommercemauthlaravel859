<div id="brands-carousel" class="logo-slider wow fadeInUp">
    <div class="logo-slider-inner">
      <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
        @php
            $brands = App\Models\Brand::latest()->get();
        @endphp
        @foreach($brands as $brand)
            <div class="col-lg-3 col-md-4 col-6">
                <div class="client-logo">
                <img src="{{$brand->brand_image}}" class="img-fluid" alt="">
                </div>
            </div>
        @endforeach
      </div>
      <!-- /.owl-carousel #logo-slider --> 
    </div>
    <!-- /.logo-slider-inner --> 
    
    
  {{-- </div>
  <div id="hero">
    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm" >
      @php
          $brands = App\Models\Brand::latest()->get();
      @endphp
      @foreach($brands as $brand)
      <div class="row">
        <div class="col-lg-4 col-md-4 col-6"></div>
        <div class="col-lg-4 col-md-4 col-6">
          <div class="item" style="background-image: url({{$brand->brand_image}});">
            
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-6"></div>
      </div>
      <!-- /.item -->    
      @endforeach          
    </div>
    <!-- /.owl-carousel --> 
  </div> --}}