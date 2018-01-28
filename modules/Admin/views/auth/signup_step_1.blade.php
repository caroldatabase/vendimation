<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>Vendimation Login</title>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta content="width=device-width, initial-scale=1" name="viewport" />
      <meta content="" name="author" />
      <link href="https://fonts.googleapis.com/css?family=Muli:400,800" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{asset('assets/css/login.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/login.min.css')}}" rel="stylesheet" type="text/css" />
   </head>
   </head>
   <body class=" login">
      <div class="backRight">
         <div class="RectangleRight">
            <a href="#">
               <?xml version="1.0" encoding="UTF-8"?>
               <svg width="182px" height="112px" viewBox="0 0 182 112" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <!-- Generator: Sketch 48.2 (47327) - http://www.bohemiancoding.com/sketch -->
                  <title>logo</title>
                  <desc>Created with Sketch.</desc>
                  <defs></defs>
                  <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                     <g id="logo" fill="#00A5EC" fill-rule="nonzero">
                        <polygon id="Path-2" points="47.3383245 69.517337 19.1009343 102.349727 0.519143675 86.3685185 44.9405742 34.7184997 93.3707798 77.4450238 163.06381 0.130993072 181.268137 16.5408823 95.3397713 111.865598"></polygon>
                     </g>
                  </g>
               </svg>
            </a>
         </div>
         <div class="vendimation">
            <div class="text">Powered by Vendimation</div>
            <div class="logov">
               <a href="#">
               <img src="{{ asset('assets/img/logov.png')}}">
               </a>
            </div>
         </div>
         <div class="carousel slide carousel-fade hidden-xs" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
               <div class="item active"></div>
               <div class="item"></div>
               <div class="item"></div>
            </div>
         </div>
         <!-- Remeber to put all the content you want on top of the slider below the slider code -->
         <div class="title">
            <p>We are designing for a global user base... [With InVision] we can get feedback not just from drivers we see in San Francisco but from all around the world.</p>
            <p class="author"><span></span>MIKE DAVIDSON</p>
         </div>
         <div class="middleDivider">
            <ul>
               <li class="active"><span>&nbsp;</span></li>
               <li></li>
               <li class="last"></li>
            </ul>
         </div>
      </div>
      <!-- BEGIN LOGIN -->
      <div class="content"> 
      <!-- BEGIN LOGIN FORM -->
      <form class="login-form" action="{{url('admin/signup/step_2')}}" method="post">
         <div class="index">
            <ul>
               <li>01</li>
               <li class="personalDetails"><span>&nbsp;</span>Personal Details</li>
               <li class="form-select">
                  <div class="btn-group">
                     <button type="button" class="btn btn-default">English</button>
                     <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                     <i class="fa fa-angle-down"></i>
                     </button>
                     <ul class="dropdown-menu">
                        <li>
                           <a href="javascript:;"> Spanish </a>
                        </li>
                        <li>
                           <a href="javascript:;"> German </a>
                        </li>
                     </ul>
                  </div>
               </li>
            </ul>
         </div>
         <div class="clearfix"></div>
         <h3 class="mt30">Get started absolutely free</h3>
         <p class="comment">Free forever. No credit card needed.</p>
         <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> Enter any username and password. </span>
         </div>
         <div class="form-group form-group-name">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Full Name" name="username" /> 
         </div>
         <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label>Email address</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" /> 
         </div>
         <div class="form-group form-group-name">
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> 
         </div>
         <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="colorGrey">MOBILE PHONE</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="PHONE/MOBILE" name="username" /> 
         </div>
         <div class="date form-group" data-provide="datepicker">
            <div class="input-group date form_datetime form_datetime bs-datetime">
               <label>Date of Birth</label>
               <input type="text"  id="dateofbday" class="form-control form-control-solid placeholder-no-fix" placeholder="Date of Birth">
               <span class="input-group-addon">
               <button type="button" style="border:0;background:transparent;">
               <img src="{{ asset('assets/img/dob.png')}}">
               </button>
               </span>
            </div>
         </div>
         <div class="savePass">
            <div class="mt-checkbox-list" data-error-container="#form_2_services_error">
               <label class="mt-checkbox" style="width:100%;">
               <input type="checkbox" value="1" name="service"> By clicking here you confirm that you agree with our terms & conditions
               <span></span>
               </label>
            </div>
         </div>
         <div class="panelBtn">
            <ul>
               <li>
                  <input type="submit" value="CREATE MY ACCOUNT" class="btn-login" />
               </li>
               <li><span class="or hidden-xs">Or</span></li>
               <li><a href="#" class="gplus"><img src="{{ asset('assets/img/gplus.png')}}"></a></li>
               <li><a href="#" class="fb"><img src="{{ asset('assets/img/fb.png')}}"></a></li>
            </ul>
         </div>
         <div class="clearfix"></div>
         <p class="signup"><span></span><a href="{{url('admin/login')}}">Login</a></p>
      </form>

        <script src="{{ URL::asset('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>

        <script src="{{ URL::asset('assets/global/plugins/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{ URL::asset('assets/global/plugins/bootstrap-switch.min.js')}}" type="text/javascript"></script>
        <script src="{{ URL::asset('assets/global/plugins/jquery.validate.min.js')}}" type="text/javascript"></script>
        <script src="{{ URL::asset('assets/pages/scripts/login.min.js')}}" type="text/javascript"></script>

        <script src="{{ URL::asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

      <script type="text/javascript">
         $(document).ready(function($) {
            $(".form-control").focus(function(){
            $(this).parent().removeClass("round");
            $(this).parent().addClass("bluebg");
         }).blur(function(){
            $(this).parent().removeClass("bluebg");
            $(this).parent().addClass("round");
         })
         $('.carousel').carousel();
         });   
           $("#dateofbday").datepicker();

      </script>
   </body>
</html>