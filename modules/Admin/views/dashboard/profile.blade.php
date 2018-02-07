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
        <link href="{{ URL::asset('assets/css/vendimation-style-270118.css')}}" rel="stylesheet">
        <script type="text/javascript">
          var url = "{{url('/')}}";

      	</script>
    
    </head>
    <body>
      @include('packages::partials.navigation')
      <!-- Left side column. contains the logo and sidebar -->
      <div class="main-section">
		<div class="container-fluid">
			<div class="row">
				<!--main menu start-->
					@include('packages::partials.sidebar')
						<div class="col-sm-10 main-left-content profile-page">
						<div class="row">
							<div class="col-sm-7">
								<div class="profile-left-main">
								</div>
							</div>
							<div class="col-sm-5 profile-right-col">
								<div class="profile-right-main">
									<div class="profile-info">
										<div class="profile-picture">
											@if(file_exists($user->profile_image))
											<img src="{{ url($user->profile_image)}}" width="120px">
											@else
											<img src="{{ asset('assets/img/user1.png')}}" width="120px">
											@endif
											
										</div>
										<div class="profile-view-desc">
											<h3 class="cart-user-name">{{  $user->name or $user->first_name.' '.$user->last_name}}</h3>
											<p class="cart-partner">{{$user->designation}}</p>
											<p class="cart-location"><img src="{{asset('assets/img/cart-location.jpg')}}"> 
												{{$user->designation}}
											</p>
										</div>
									</div>
									<div class="personal-detail-profile">
										<h4>Personal Details</h4>
										<div class="personal-box">
											<ul>
												<li><span class="box-info-icon"><img src="{{ asset('assets/img/msg.png')}}" width="20px"></span><span class="personal-text-static">{{$user->email}}</span></li>
												<li><span class="box-info-icon"><img src="{{ asset('assets/img/address.jpg')}}"></span><span class="personal-text-static">
													{{$user->address}}
												</span></li>
												<li><span class="box-info-icon"><img src="{{ asset('assets/img/call.jpg')}}"></span><span class="personal-text-static">
													{{$user->mobile.', '.$user->office_number }}
												</span></li>
												<li><span class="box-info-icon"><img src="{{ asset('assets/img/cake.jpg')}}"></span><span class="personal-text-static" style="border-bottom:none;">{{$user->dateOfBirth }}</span></li>
											</ul>
										</div>
										
										<h4>Work Detail</h4>
										<div class="personal-box work-detail">
											<div class="row">
												<div class="col-sm-12 work-detail-border">
													<label>Nature of your business</label>
													<p class="pro-tags">
														@foreach($businessNatureType as $result)
														<a href="#">{{$result->title}}</a> 
														@endforeach
													</p>

												</div>
											</div>
											<div class="row">
												<div class="col-sm-12 work-detail-border">
												<label>Targeting Market</label>
												<p class="pro-tags">
												@foreach($targetMarketType as $result)
														<a href="#">{{$result->title}}</a> 
														@endforeach
													</p>
												</div>
											</div>

										<div class="row">
												<div class="col-sm-12 work-detail-border">
												<label>Targeting countries / cities / region</label>
												<p class="pro-tags"><a href="#"> 
													{{$user->region or 'NA'}}
												</a></p>
												</div>
											</div>

										</div>
								 	<h4>My Products</h4>
										<div class="personal-box work-detail product-view">
											<div class="row">
												<div class="col-sm-8">
													<h5>Restaurants Asian Food</h5>
													<ul>
														<li><img src="{{ asset('assets/img/contacts-book.png')}}"> 100 Contacts</li>
														<li><img src="{{ asset('assets/img/contacts-book.png')}}"> 80 Companies</li>
														<li><img src="{{ asset('assets/img/contacts-book.png')}}"> Owner</li>
														
													</ul>
												</div>
												<div class="col-sm-4">
													<img src="{{ asset('assets/img/product1.jpg')}}">
												</div>
												<div class="clearfix"></div>
												<div class="col-sm-12">
													<p class="price-pro">£159 <span class="send-inv"><a href="#">SEND INVOICE</a></span></p>
												</div>
												

											</div>
											<div class="row">
												<div class="col-sm-8">
													<h5>Restaurants Asian Food</h5>
													<ul>
														<li><img src="{{ asset('assets/img/contacts-book.png')}}"> 100 Contacts</li>
														<li><img src="{{ asset('assets/img/contacts-book.png')}}"> 80 Companies</li>
														<li><img src="{{ asset('assets/img/contacts-book.png')}}"> Owner</li>
														
													</ul>
												</div>
												<div class="col-sm-4">
													<img src="{{ asset('assets/img/product1.jpg')}}">
												</div>
												<div class="clearfix"></div>
												<div class="col-sm-12">
													<p class="price-pro">£159 <span class="send-inv"><a href="#">SEND INVOICE</a></span></p>
												</div>
											</div>
											
										</div> 
										
									<h4>My Wallet</h4>
										<div class="personal-box work-detail product-view wallet">
											<div class="row">
												<div class="col-sm-6">
													<p class="wallet-in"><a href="#"><img src="{{ asset('assets/img/circle-right.jpg')}}"></a> <span class="nam-card">Juan Brook<span>****2561</span></span></p>
												</div>
												<div class="col-sm-6 visa">
													<img src="{{ asset('assets/img/visa.jpg')}}"> <input type="text" class="cvv" placeholder="CVV">
												</div>
											</div>
										</div>
										
										<div class="personal-box work-detail product-view wallet">
											<div class="row">
												<div class="col-sm-6">
													<p class="wallet-in"><a href="#"><img src="{{ asset('assets/img/circle-right.jpg')}}"></a> <span class="nam-card">Juan Brook<span>****2561</span></span></p>
												</div>
												<div class="col-sm-6 visa">
													<img src="{{ asset('assets/img/visa.jpg')}}"> <input type="text" class="cvv" placeholder="CVV">
												</div>
											</div>
										</div>
										
										<div class="personal-box work-detail product-view wallet add-new-card">
											
										<div class="add-btn-card">
											<a href="#">Add New Card</a>
										</div>
											
										</div>
									<form id="addCard" method="post">
										<div class="personal-box work-detail product-view add-card-process">
											<div class="input-card">
												<input type="text" placeholder="Card number" name="card_number">
												<img src="{{ asset('assets/img/visa.jpg')}}" style="position:absolute; right:15px; top:15px;">
											</div>
											<div class="input-card">
												<input type="text" placeholder="Name on card" name="card_name">
											</div>
											<div class="input-card">
												<div class="row">
													<div class="col-sm-8">
														<input type="text" placeholder="MM/YY" name="expire_mm_yy">
													</div>
													<div class="col-sm-4">
														<input type="text" placeholder="CVV" name="cvv">
													</div>
												</div>
											</div>
											<div class="input-card check-click">
												<input type="checkbox" checked="true" name="saveCard" value="1" > Add card to wallet
											</div>
											
										</div>
									</form>
										 
										<h4>My Funnel</h4>
										<div class="personal-box work-detail">
											<div class="bar-chart">
										<h4>My Oil & Gas Funnel</h4>
										<p>Contact <span>120</span></p>
										<p>Notification <span>23</span></p>
										<p>Closed Deals <span>10</span></p>
										<div id="chart">  
											<ul id="bars">
											<li><div data-percentage="35" class="bar" id="first-oil"></div><span>08</span></li>
											<li><div data-percentage="100" class="bar" id="second-oil"></div><span>26</span></li>
											<li><div data-percentage="56" class="bar" id="third-oil"></div><span>08</span></li>
											<li><div data-percentage="80" class="bar" id="fourth-oil"></div><span>20</span></li>
											<li><div data-percentage="35" class="bar" id="fifth-oil"></div><span>08</span></li>
											<li><div data-percentage="20" class="bar" id="sixth-oil"></div><span>04</span>
											<li><div data-percentage="40" class="bar" id="seventh-oil"></div><span>16</span>
											</li>
											</ul>
											<p class="status-para">Status will be based on highest percentage bar</p>
										</div>
									</div>
										</div> 
										 
									</div>
								</div>
								
							</div>
						</div>
					</div>
				<!--main menu end-->
			</div>
		</div>
	</div> 
 

	<script src="{{ URL::asset('assets/js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/js/jquery.flot.js')}}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/js/custom.js')}}" type="text/javascript"></script>




</body>
</html>
