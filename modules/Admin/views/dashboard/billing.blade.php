
	@include('packages::partials.header')
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
							 		@include('packages::partials.user-info')
									<div class="personal-detail-profile">
								 		@include('packages::partials.billing')
										@include('packages::partials.add-address')
										@include('packages::partials.my-wallet') 
										@include('packages::partials.add-card')
										@include('packages::partials.my-bill')  
										
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
 	@include('packages::partials.footer')