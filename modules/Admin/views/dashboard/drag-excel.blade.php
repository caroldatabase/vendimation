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
    	<link href="{{ URL::asset('assets/css/jquery.dm-uploader.min.css')}}" rel="stylesheet">
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
									@include('packages::partials.user-info')
									<div class="we-can-collect-conta">
										we can collect contatcs from your social media accounts please click on the icons to sync your contacts
									</div>
									<div class="pro-social">
										<ul class="pro-social-icon">
											<li><a href="#" class="gplus"><img src="{{ asset('assets/img/gplus.png')}}"></a></li>
											<li><a href="#" class="fb"><img src="{{ asset('assets/img/fb.png')}}"></a></li>
											<li><a href="#" class="gplus"><img src="{{ asset('assets/img/gplus.png')}}"></a></li>
										</ul>
									</div>
									<div class="personal-box work-detail product-view wallet add-new-card add-excel-parameter">
									<div class="add-btn-card drag-excel-btn">
										<div id="drag-and-drop-zone" class="dm-uploader p-5">
								            <div id="fileDropBox"><img src="{{asset('assets/img/excel.jpg')}}" width="23px;"> Drag &amp; Drop Any excel file here </div>

								            <div class="btn btn-primary btn-block mb-5">
								                <span>Open the file Browser</span>
								                <input type="file" id="excel_file" title='Click to add Files' />
								            </div>
								          </div><!-- /uploader -->
								        </div>  
									</div>
									<div id="uploaded_xls"></div> 
 

									<div class="master-excel-file uploader-progress" style="position:relative;">
										<p><span class="upload-text">Uploading… contact file.xls</span><span class="min-ago"><span class="excel-dot"><a href="#"><i class="fa fa-window-close"></i></a></span></span>
										
										</p>
										<div class="row">
											<div class="progress-wrap progress" data-progress-percent="25"><div class="progress-bar progress" style="left: 103.5px;"></div>
											</div>
										</div>
									</div>

									<div class="team-contact-excel">
											<h4>You need 95 more contacts to continue</h4>
										<div class="personal-box work-detail">
											<div class="contact-list">
										
												<div class="user-list-contact">
													<div class="user-pic-cont">
														<img src="{{asset('assets/img/team-pic.png')}}" height="44px;">
													</div>
													<div class="user-desc-cont">
														<h5>Grag Dlubacz</h5>
														<p><span>Shell</span> <span>#oil&amp;gas</span></p>
														<span class="plus-circle"><a href="#"><img src="{{asset('assets/img/plus-icon.jpg')}}"></a></span>
													</div>
												</div>
												<div class="user-list-contact">
													<div class="user-pic-cont">
														<img src="{{asset('assets/img/team-pic.png')}}" height="44px;">
													</div>
													<div class="user-desc-cont">
														<h5>Grag Dlubacz</h5>
														<p><span>Shell</span> <span>#oil&amp;gas</span></p>
														<span class="plus-circle"><a href="#"><img src="{{asset('assets/img/plus-icon.jpg')}}"></a></span>
													</div>
												</div>
												<div class="user-list-contact">
													<div class="user-pic-cont">
														<img src="{{asset('assets/img/team-pic.png')}}" height="44px;">
													</div>
													<div class="user-desc-cont">
														<h5>Grag Dlubacz</h5>
														<p><span>Shell</span> <span>#oil&amp;gas</span></p>
														<span class="plus-circle"><a href="#"><img src="{{asset('assets/img/plus-icon.jpg')}}"></a></span>
													</div>
												</div>
												<div class="user-list-contact">
													<div class="user-pic-cont">
														<img src="{{asset('assets/img/team-pic.png')}}" height="44px;">
													</div>
													<div class="user-desc-cont">
														<h5>Grag Dlubacz</h5>
														<p><span>Shell</span> <span>#oil&amp;gas</span></p>
														<span class="plus-circle"><a href="#"><img src="{{asset('assets/img/plus-icon.jpg')}}"></a></span>
													</div>
												</div>
												<div class="contact-search">
													<span><a href="#"><img src="{{asset('assets/img/add-circle.jpg')}}"></a> <input type="text" placeholder="Add in your contact"></span>
												</div>
										
											</div>
										</div>
									</div>
									<div class="excel-product">
										
										<h4>If you dont have enough contacts you can select one of our contact starter packs.</h4>
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
														<p class="price-pro">£159</p>
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
														<p class="price-pro">£159</p>
													</div>
												</div>
												
										</div>
									</div>
										
									<div class="drag-sample">
										
										<div class="excel-next text-center">
											<a href="{{url('admin/account/profile')}}"> <input type="button" value="NEXT"  class="btn-login">
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
	 
	    
		<script src="{{ URL::asset('assets/js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>

		<script src="{{ URL::asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

		<script src="{{ URL::asset('assets/js/jquery.dm-uploader.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('assets/js/demo-ui.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('assets/js/demo-config.js') }}" type="text/javascript"></script>

		<script src="{{ URL::asset('assets/js/bootbox.js') }}" type="text/javascript"></script>

	 

	<script type="text/javascript">
		var fname;

      $('input[type="file"]').dmUploader({
        url: '/path/to/backend/upload.asp',
        //... More settings here...
        method:"POST",
        //allowedTypes: "image/*",
        onInit: function(){
          console.log('Callback: Plugin initialized');
          $('.uploader-progress').hide();
        },

         onUploadSuccess:function(id, data){
          //  console.log(id, percent);
        },
        onUploadComplete:function(id){
         console.log($('input[type="file"]').val());
        },
        onUploadError:function(id, xhr, status, errorThrown){
          console.log(errorThrown,status);
        },
        onBeforeUpload:function(id){
          console.log('onBeforeUpload');
        },
        onNewFile: function(id, file){
           fname = file.name;
           $('.uploader-progress').show();
          $('.upload-text').html('Uploading…'+fname);
        },
        onUploadProgress:function(id, percent){
        	$('.progress-bar').css('left',percent+'%');
            console.log('percent='+percent);

            var img = "{{asset('assets/img/excel.jpg')}}";

            if(percent=="100"){
           	var html  =  '<div class="master-excel-file">'
           								+ '<p><img src="'+img+'" height="16.5px;">'
										+ '<span class="master-text">'+fname+'</span>'
										+ '<span class="view-detail"><a href="#">VIEW DETAILS</a></span>'
										+ '<span class="min-ago">0 min ago<span class="excel-dot">'
										+ '<a href="#">•••</a></span></span></p></div>';
				$('#uploaded_xls').append(html);
				$('.uploader-progress').hide();
           } 
        },
        
        // ... More callbacks
      });
    </script>

</body>
</html>
