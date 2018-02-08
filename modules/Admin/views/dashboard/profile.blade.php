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
                            <!-- center part-->
                        </div>
                    </div>
                    <div class="col-sm-5 profile-right-col">
                        <div class="profile-right-main">
                            @include('packages::partials.user-info')
                            <div class="personal-detail-profile"> 
                                @include('packages::partials.personel-detail')	 
                                @include('packages::partials.my-work')	
                                @include('packages::partials.my-products')
                                @include('packages::partials.my-wallet')
                                @include('packages::partials.add-card')
                                @include('packages::partials.my-funnel')  
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