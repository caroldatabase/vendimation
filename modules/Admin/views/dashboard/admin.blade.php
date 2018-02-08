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
                                            <img src="{{ asset('assets/img/team-pic.png')}}">
                                        </div>
                                        <div class="profile-view-desc">
                                            <h3 class="cart-user-name">Juan Brooks</h3>
                                            <p class="cart-partner">Partner at Morgan &amp; Morgan</p>
                                            <p class="cart-location"><img src="{{ asset('assets/img/cart-location.jpg')}}"> Port Chester, New York</p>
                                        </div>
                                    </div>
                                    <div class="personal-detail-profile">
                                        <h4>Personal Details</h4>
                                        <div class="personal-box">
                                            <ul>
                                                <li><span class="box-info-icon"><img src="{{ asset('assets/img/cal-icon.jpg')}}"></span><span class="personal-text-static">juanbrooks@morganandmorgan.com</span></li>
                                                <li><span class="box-info-icon"><img src="{{ asset('assets/img/address.jpg')}}"></span><span class="personal-text-static">Store Kongensgade 66, 1264 
                                                        København K,Denmark
                                                    </span></li>
                                                <li><span class="box-info-icon"><img src="{{ asset('assets/img/call.jpg')}}"></span><span class="personal-text-static">+31 10 519 2666, +31 10 519 2666</span></li>
                                                <li><span class="box-info-icon"><img src="{{ asset('assets/img/cake.jpg')}}"></span><span class="personal-text-static" style="border-bottom:none;">25/12/1988</span></li>
                                            </ul>
                                        </div>

                                        <h4>Work Detail</h4>
                                        <div class="personal-box work-detail">
                                            <div class="row">
                                                <div class="col-sm-12 work-detail-border">
                                                    <label>Nature of your business</label>
                                                    <p class="pro-tags"><a href="#">MEDICAL MALPRACTICE</a> <a href="#">ACCOUNT</a> <a href="#">SALE</a></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 work-detail-border">
                                                    <label>Targeting Market</label>
                                                    <p class="pro-tags"><a href="#">MEDICAL</a> <a href="#">ACCOUNT</a> <a href="#">SALE</a></p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12 work-detail-border">
                                                    <label>Targeting countries / cities / region</label>
                                                    <p class="pro-tags"><a href="#">MEDICAL MALPRACTICE</a> <a href="#">ACCOUNT</a> <a href="#">SALE</a></p>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- 	<h4>My Products</h4>
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
                                                                
                                                        </div> -->

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
