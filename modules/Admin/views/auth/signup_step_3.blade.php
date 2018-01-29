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
      <form class="login-form" action="{{url('admin/signup/step_3')}}" method="post">
                <div class="index">
          <ul>
            <li>03</li>
            <li class="personalDetails"><span>&nbsp;</span>About Company</li>
            
            
          </ul>
          
        </div>
        <div class="clearfix"></div>
        <h3 class="mt30">Enjoying your best time</h3>
        <p class="comment">Free forever. No credit card needed.</p>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any username and password. </span>
                </div>
        <div class="form-group">
                    
                    <input class="form-control form-control-solid placeholder-no-fix" style="min-height:64px;" type="text" autocomplete="off" placeholder="Company Name" name="password"> 
          <a href="#"><img src="assets/img/com-logo.png" class="cLogo"></a>
          </div>
            
        

        <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label>DESIGNATION</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Head of Design" name="username"> </div>
                <div class="form-group form-group-name">
                    
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Address" name="password"> 
          </div>
          <div class="col-md-8 col-xs-8">
          <div class="row">
           <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="colorGrey">OFFICE NUMBER</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="PHONE/MOBILE" name="username"> </div>
           </div>
           </div>
           <div class="col-md-4 col-xs-4">
          <div class="row">
          <div class="form-group" style="margin-left:15px;">

                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="colorGrey">EXTENSION</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="0215" name="username"> 
          </div>
          </div>
          </div>
          <div class="clearfix"></div>
          <div class="savePass">
            <div class="mt-checkbox-list" data-error-container="#form_2_services_error">
               <label class="mt-checkbox" style="width:100%;">
               <input type="checkbox" value="1" name="service"> By clicking here you confirm that you agree with our terms &amp; conditions
               <span></span>
               </label>
            </div>
         </div>
          
      <div class="panelBtn">
            <ul>
               <li>
                  <input type="submit" value="CONTINUE" class="btn-login">
               </li>
              
            </ul>
         </div>
        <div class="clearfix"></div>
        <p class="signup"><span></span><a href="{{url('admin/login')}}">Login</a></p>
               
            </form>
      </div>  
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