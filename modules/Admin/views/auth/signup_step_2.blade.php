@extends('packages::layouts.signupmaster')
    @section('content') 
      <!-- BEGIN LOGIN -->
      <div class="content">
      <!-- BEGIN LOGIN FORM -->

          {!! Form::open(['url' => url('admin/signup/step_3') ,'class'=>'form-horizontal user-form','id'=>'user-form','enctype'=>'multipart/form-data', 'method' => 'post']) !!}
 
              <div class="index">
               <ul>
                  <li>02</li>
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
            <div class="form-group form-group-name">
                  <div class="input-group">
                    <label>UPLOAD LOGO</label>
                 
                <div class="input-group-btn">
                  <span class="fileUpload btn btn-success">
                      <span class="upl" id="upload">UPLOAD LOGO</span>
                      <input type="file" class="upload up" id="up" name="companyLogo">
                    </span><!-- btn-orange -->
                 </div><!-- btn -->
                 </div><!-- group -->
                               
               </div> 
                
                 <div class="form-group"> 
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Company Name" name="companyName"> 
                </div>


                <div class="form-group">
                   
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="DESIGNATION" name="designation"> 
                </div>
                <div class="form-group form-group-name">  
                    
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Address" name="address"> 
               </div>
               <div class="col-md-8 col-xs-8">
                   <div class="row">
                    <div class="form-group">
                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                        <label class="colorGrey">OFFICE NUMBER</label>
                        <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="OFFICE NUMBER" name="office_number"> </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-4">
                   <div class="row">
                   <div class="form-group" style="margin-left:15px;">

                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                        <label class="colorGrey">EXTENSION</label>
                        <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="EXTENSION" name="extension"> 
                   </div>
                   </div>
               </div>
               <div class="clearfix"></div>
               <div class="savePass">
            
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
               
            {!! Form::close()!!}
        @stop