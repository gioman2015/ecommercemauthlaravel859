@extends('admin.admin_master')
@section('admin')

<style>
	.btn {
	background:#3A8F40;
	color:#3A8F40;
	border:0px;
	padding:16px;
	}
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

	 


<!--   ------------ Add Search Page -------- -->


          <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Buscar por Fecha </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('search-by-date-order') }}">
	 	@csrf
					   

	 <div class="form-group">
		<h5>Seleccionar Fecha <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="date" name="date" id="date" class="form-control" > 
	 @error('date') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div>
 	 

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Buscar">					 
						</div>
					</form>
					<td width="25%">	
						<form action="{{ route('download.ventas.date') }}" method="post">
							@csrf
							<input type="hidden" id="txtdate" name="txtdate">
							{{-- <input type="submit" class="btn btn-rounded mb-5" onclick="enviarTexto()" value="Exportar a EXCEL"> --}}
							<input type="submit" class="btn btn-rounded mb-5" onclick="enviarTexto()" value="Exportar a PDF">
						</form>	   	
					</td>
					  
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>




   <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Buscar por Mes </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('search-by-month-order') }}">
	 	@csrf
					   

	 <div class="form-group">
		<h5>Seleccionar Mes  <span class="text-danger">*</span></h5>
		<div class="controls">
	
		<select name="month" id="month" class="form-control">
			<option label="Choose One"></option>
			<option value="January">January</option>
			<option value="February">February</option>
			<option value="March">March</option>
			<option value="April">April</option>
			<option value="May">May</option>
			<option value="Jun">Jun</option>
			<option value="July">July</option>
			<option value="August">August</option>
			<option value="September">September</option>
			<option value="October">October</option>
			<option value="November">November</option>
			<option value="December">December</option>


		</select> 

	 @error('month') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div> 


 <div class="form-group">
		<h5>Seleccione Año  <span class="text-danger">*</span></h5>
		<div class="controls">
	
		<select name="year_name" id="year_name" class="form-control">
			<option label="Choose One"></option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
			<option value="2022">2022</option>
			<option value="2023">2023</option>
			<option value="2024">2024</option>
			<option value="2025">2025</option>
			<option value="2026">2026</option> 
		</select> 

	 @error('year_name') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div>  

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Buscar">					 
						</div>
					</form>
					<td width="25%">	
						<form action="{{ route('download.ventas.months') }}" method="post">
							@csrf
							<input type="hidden" id="monthmonth" name="monthmonth">
							<input type="hidden" id="monthyear" name="monthyear">
							<input type="submit" class="btn btn-rounded mb-5" value="Exportar a PDF">
						</form>	   	
					</td>
					  
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>





			   <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Buscar por Año </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('search-by-year-order') }}" >
	 	@csrf
					   
<div class="form-group">
		<h5>Seleccionar Año  <span class="text-danger">*</span></h5>
		<div class="controls">
	
		<select name="year" id="year" class="form-control">
			<option label="Choose One"></option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
			<option value="2022">2022</option>
			<option value="2023">2023</option>
			<option value="2024">2024</option>
			<option value="2025">2025</option>
			<option value="2026">2026</option> 
		</select> 

	 @error('year') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div>   

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Buscar">					 
						</div>
					</form>
					<td width="25%">	
						<form action="{{ route('download.ventas') }}" method="post">
							@csrf
							<input type="hidden" id="txtyear" name="txtyear">
							<input type="submit" class="btn btn-rounded mb-5" value="Exportar a PDF">
						</form>	   	
					</td>
					  
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>








 <!--   ------------End  Add Search Page -------- -->


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	  {{-- Script Reporte por Date --}}
	  <script>
		  function enviarTexto(){
			  var texto=document.getElementById('date').value;
			  document.getElementById('txtdate').value=texto;
		  }
	  </script>
	  {{-- Script Reporte por Date --}}
	  {{-- Script Reporte por Mes-Mes --}}
	  <script>
		  $(document).on('change', '#month', function(event) {
		   $('#monthmonth').val($("#month option:selected").text());
	  });
	  </script>
	  {{-- Script Reporte por Mes-Mes --}}
	  {{-- Script Reporte por Mes-Año --}}
	  <script>
		  $(document).on('change', '#year_name', function(event) {
		   $('#monthyear').val($("#year_name option:selected").text());
	  });
	  </script>
	  {{-- Script Reporte por Mes-Año --}}
	  
	  {{-- Script Reporte por Año --}}
	  <script>
		  $(document).on('change', '#year', function(event) {
		   $('#txtyear').val($("#year option:selected").text());
	  });
	  </script>
	  {{-- Script Reporte por Año --}}


@endsection