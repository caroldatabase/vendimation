@extends('packages::layouts.master')
  @section('title', 'Dashboard')
    @section('header')
    <h1>Dashboard</h1>
    @stop
    @section('content') 
      @include('packages::partials.navigation')
      <!-- Left side column. contains the logo and sidebar -->
<<<<<<< HEAD
      <div class="main-section">
		<div class="container-fluid">
			<div class="row">
				<!--main menu start-->
					@include('packages::partials.sidebar')
					@include('packages::users.home')   
				<!--main menu end-->
			</div>
		</div>
	</div>   
@stop
=======
      @include('packages::partials.sidebar')
      @include('packages::users.home')   
@stop
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
