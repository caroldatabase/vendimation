<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Vendimation Dashboard </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Vendimation" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Muli:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="{{ URL::asset('assets/css/style.css')}}" rel="stylesheet">
    </head>
    <body>
      @include('packages::partials.navigation')
      <!-- Left side column. contains the logo and sidebar -->
      <div class="main-section">
		<div class="container-fluid">
			<div class="row">
				<!--main menu start-->
					@include('packages::partials.sidebar')
					@include('packages::partials.right-panel')
				<!--main menu end-->
			</div>
		</div>
	</div> 
	@if(isset($js_file))
	    @foreach($js_file as $key => $js )
	        <script src="{{ URL::asset('assets/js/'.$js) }}" type="text/javascript"></script>
	    @endforeach
	    @else
	      <script src="{{ URL::asset('assets/js/common.js') }}" type="text/javascript"></script>
	      <script src="{{ URL::asset('assets/js/bootbox.js') }}" type="text/javascript"></script>
	      <script src="{{ URL::asset('assets/js/formValidate.js') }}" type="text/javascript"></script>
	@endif

</body>
</html>
