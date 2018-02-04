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
										<h4>Billing Address</h4>
										<div class="personal-box">
											<ul>
												<li><span class="box-info-icon">
												<img src="{{asset('assets/img/msg.png')}}" width="20px"></span>
												<span class="personal-text-static">{{$user->email}}<span style="float:right; margin-right:15px;"><img src="{{asset('assets/img/circle-right.jpg')}}"></span></span>
												</li>
												<li><span class="box-info-icon"><img src="{{asset('assets/img/address.jpg')}}"></span><span class="personal-text-static">{{$user->address}}</span></li>
												<li><span class="box-info-icon" style="border-bottom: 1px solid #eee;"><img src="{{asset('assets/img/call.jpg')}}"></span><span class="personal-text-static">{{$user->mobile .','.$user->office_number}}</span></li>
												<li>
													<span class="personal-text-static" style="border-bottom:none;">
														<a href="#" style="width:50%;text-align: right;float: left;">REMOVE</a> 
														<a href="#" style="width:50%;float: left;text-align: center;"><label>EDIT</label></a>
													</span>
												</li>
											</ul>
										</div>
										
										<div class="personal-box work-detail product-view wallet add-new-card">
											
												<div class="add-btn-card">
													<a href="#">Add New Address</a>
												</div>
										</div>
										<h4>My Wallet</h4>
										<div class="personal-box work-detail product-view wallet">
											<div class="row">
												<div class="col-sm-6">
													<p class="wallet-in"><a href="#"><img src="{{asset('assets/img/circle-right.jpg')}}"></a> <span class="nam-card">Juan Brook<span>****2561</span></span></p>
												</div>
												<div class="col-sm-6 visa">
													<img src="{{asset('assets/img/visa.jpg')}}"> <input type="text" class="cvv" placeholder="CVV">
												</div>
											</div>
										</div>
										
										<div class="personal-box work-detail product-view wallet">
											<div class="row">
												<div class="col-sm-6">
													<p class="wallet-in">
														<a href="#">
															<img src="{{asset('assets/img/circle-right.jpg')}}" height="24px;"></a> <span class="nam-card">Juan Brook<span>****2561</span></span></p>
												</div>
												<div class="col-sm-6 visa">
													<img src="{{asset('assets/img/visa.jpg')}}"> <input type="text" class="cvv" placeholder="CVV">
												</div>
											</div>
										</div>
										
										<div class="personal-box work-detail product-view wallet add-new-card">
												<div class="add-btn-card">
													<a href="#">Add New Card</a>
												</div>
											
										</div>
										
										<h4>New Card</h4>
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
									</form
										
										<h4>My Bill</h4>
										<div class="personal-box work-detail product-view">
											<div class="row">
												<div class="col-sm-8">
													<h5>Restaurants Asian Food</h5>
													<ul>
														<li><img src="{{asset('assets/img/contacts-book.png')}}"> 100 Contacts</li>
														<li><img src="{{asset('assets/img/contacts-book.png')}}"> 80 Companies</li>
														<li><img src="{{asset('assets/img/contacts-book.png')}}"> Owner</li>
														
													</ul>
												</div>
												<div class="col-sm-4">
													<img src="{{asset('assets/img/product1.jpg')}}">
												</div>
												<div class="clearfix"></div>
												<div class="col-sm-12">
													<p class="price-pro">£159 <span class="send-inv"><a href="#">REMOVE</a></span></p>
												</div>
												

											</div>
											<div class="row">
												<div class="col-sm-8">
													<h5>Restaurants Asian Food</h5>
													<ul>
														<li><img src="{{asset('assets/img/contacts-book.png')}}"> 100 Contacts</li>
														<li><img src="{{asset('assets/img/contacts-book.png')}}"> 80 Companies</li>
														<li><img src="{{asset('assets/img/contacts-book.png')}}"> Owner</li>
														
													</ul>
												</div>
												<div class="col-sm-4">
													<img src="{{asset('assets/img/product1.jpg')}}">
												</div>
												<div class="clearfix"></div>
												<div class="col-sm-12">
													<p class="price-pro">£159 <span class="send-inv"><a href="#">REMOVE</a></span></p>
												</div>
											</div>
											
										</div>
										
										<div class="excel-next text-center">
											<input type="button" value="PAY NOW" onclick="addCard()"  class="btn-login">
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
	 
 	 <script src="http://vendimation.xyz/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="http://vendimation.xyz/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="http://vendimation.xyz/assets/js/jquery.flot.js" type="text/javascript"></script>
    <script src="http://vendimation.xyz/assets/js/custom.js" type="text/javascript"></script>
	
	<script type="text/javascript">
		var url = "{{url('/')}}";
		function addCard()
		{
			 window.location = url+"/admin/account/add-excel";
		}
	</script>

</body>
</html>
