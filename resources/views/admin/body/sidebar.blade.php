@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
						  <h3><b>Easy</b> Shop</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li class="{{($route == 'dashboard')? 'active':''}}">
          <a href="{{url('admin/dashboard')}}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
		
        <li class="treeview {{($prefix == '/brand')? 'active':''}}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Marcas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'all.brand')? 'active':'' }}">
              <a href="{{ route('all.brand') }}"><i class="ti-more"></i>Todas las Marcas</a></li>
          </ul>
        </li> 
		  
        <li class="treeview {{($prefix == '/category')? 'active':''}}">
          <a href="#">
            <i data-feather="mail"></i> <span>Categoria</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'all.category')? 'active':'' }}"><a href="{{ route('all.category') }}"><i class="ti-more"></i>Todas las Categorias</a></li>
            <li class="{{ ($route == 'all.subcategory')? 'active':'' }}"><a href="{{ route('all.subcategory') }}"><i class="ti-more"></i>Todas las SubCategorias</a></li>
            <li class="{{ ($route == 'all.subsubcategory')? 'active':'' }}"><a href="{{ route('all.subsubcategory') }}"><i class="ti-more"></i>Todas las Sub->SubCategorias</a></li>
          </ul>
        </li>
		
        <li class="treeview {{($prefix == '/product')? 'active':''}}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Productos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'add-product')? 'active':'' }}"><a href="{{route('add-product')}}"><i class="ti-more"></i>Agregar Producto</a></li>
            <li class="{{ ($route == 'manage-product')? 'active':'' }}"><a href="{{route('manage-product')}}"><i class="ti-more"></i>Administrar Productos</a></li>
          </ul>
        </li> 	
        
        <li class="treeview {{($prefix == '/slider')? 'active':''}}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'manage-slider')? 'active':'' }}"><a href="{{route('manage-slider')}}"><i class="ti-more"></i>Administrar Slider</a></li>
          </ul>
        </li>

        <li class="treeview {{($prefix == '/coupons')? 'active':''}}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Cupones</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'manage-coupon')? 'active':'' }}"><a href="{{route('manage-coupon')}}"><i class="ti-more"></i>Administrar Cupones</a></li>
          </ul>
        </li>

        <li class="treeview {{($prefix == '/user')? 'active':''}}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Usuarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'manage-user')? 'active':'' }}"><a href="{{route('manage-user')}}"><i class="ti-more"></i>Administrar Usuarios</a></li>
          </ul>
        </li>

        <li class="treeview {{($prefix == '/shipping')? 'active':''}}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Direcciones</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'manage-division')? 'active':'' }}"><a href="{{route('manage-division')}}"><i class="ti-more"></i>Administrar Departamentos</a></li>
            <li class="{{ ($route == 'manage-district')? 'active':'' }}"><a href="{{route('manage-district')}}"><i class="ti-more"></i>Administrar Municipios</a></li>
            {{-- <li class="{{ ($route == 'manage-state')? 'active':'' }}"><a href="{{route('manage-state')}}"><i class="ti-more"></i>Administrar Ciudad/Barrios</a></li> --}}
          </ul>
        </li> 

        <li class="treeview {{($prefix == '/message')? 'active':''}}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Configuraciones</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'web-message')? 'active':'' }}"><a href="{{route('web-message')}}"><i class="ti-more"></i>Mensaje Web</a></li>
            <li class="{{ ($route == 'mail-message')? 'active':'' }}"><a href="{{route('mail-message')}}"><i class="ti-more"></i>Mensaje E-mail</a></li>
            <li class="{{ ($route == 'precios-envios')? 'active':'' }}"><a href="{{route('precios-envios')}}"><i class="ti-more"></i>Precios Envios</a></li>
            <li class="{{ ($route == 'datos.davivienda')? 'active':'' }}"><a href="{{route('datos.davivienda')}}"><i class="ti-more"></i>Datos Davivienda</a></li>
            <li class="{{ ($route == 'datos.bancolombia')? 'active':'' }}"><a href="{{route('datos.bancolombia')}}"><i class="ti-more"></i>Datos Bancolombia</a></li>
          </ul>
        </li>
		 
        <li class="header nav-small-cap">User Interface</li>
		  
        <li class="treeview {{ ($prefix == '/orders')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Envíos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'pending-orders')? 'active':'' }}"><a href="{{ route('pending-orders') }}"><i class="ti-more"></i>Envios Pendientes</a></li>
            <li class="{{ ($route == 'confirmed-orders')? 'active':'' }}"><a href="{{ route('confirmed-orders') }}"><i class="ti-more"></i>Envios Confirmados</a></li>
            <li class="{{ ($route == 'processing-orders')? 'active':'' }}"><a href="{{ route('processing-orders') }}"><i class="ti-more"></i>Processing Orders</a></li>
            <li class="{{ ($route == 'picked-orders')? 'active':'' }}"><a href="{{ route('picked-orders') }}"><i class="ti-more"></i> Picked Orders</a></li>
            <li class="{{ ($route == 'shipped-orders')? 'active':'' }}"><a href="{{ route('shipped-orders') }}"><i class="ti-more"></i> Shipped Orders</a></li>
            <li class="{{ ($route == 'delivered-orders')? 'active':'' }}"><a href="{{ route('delivered-orders') }}"><i class="ti-more"></i> Delivered Orders</a></li>
            <li class="{{ ($route == 'cancel-orders')? 'active':'' }}"><a href="{{ route('cancel-orders') }}"><i class="ti-more"></i> Cancel Orders</a></li>
          </ul>
        </li>  
		
        <li class="treeview {{ ($prefix == '/reports')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Reportes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'all-reports')? 'active':'' }}"><a href="{{ route('all-reports') }}"><i class="ti-more"></i>Reportes</a></li>
          </ul>
        </li>  

        <li class="treeview {{ ($prefix == '/alluser')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>All Users </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'all-users')? 'active':'' }}"><a href="{{ route('all-users') }}"><i class="ti-more"></i>All Users</a></li>
          </ul>
        </li> 
        
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>