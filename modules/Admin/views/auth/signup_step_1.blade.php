@extends('packages::layouts.signupmaster')
    @section('content') 
      <!-- BEGIN LOGIN -->
      <div class="content"> 
      <!-- BEGIN LOGIN FORM -->
         {!! Form::open(['url' => url('admin/signup/step_2') ,'class'=>'form-horizontal user-register-form','id'=>'user-form','enctype'=>'multipart/form-data', 'method' => 'post']) !!}
 
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
                           <a href="javascript:;"> English </a>
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
         <div class="form-group form-group-name {{ $errors->first('name', ' has-error') }}">
              {!! Form::text('name',($user->name)?$user->name:$user->first_name, ['class' => 'form-control form-control-solid placeholder-no-fix','data-required'=>1,'autocomplete'=>"off","placeholder"=>'Full Name','field_name'=>"Full Name"])  !!} 
               <span class="help-block" style="color:red">{{ $errors->first('name', ':message') }} 
         </div> 

         <div class="form-group form-group-name {{ $errors->first('email', ' has-error') }}">
            {!! Form::text('email',$user->email, ['class' => 'form-control form-control-solid placeholder-no-fix','data-required'=>1,"autocomplete"=>"off","placeholder"=>'Email Address','field_name'=>"Email Address"])  !!} 
            <span class="help-block" style="color:red">{{ $errors->first('email', ':message') }} 
         </div>

           <div class="form-group form-group-name {{ $errors->first('password', ' has-error') }}">
            {!! Form::password('password', ['class' => 'form-control form-control-solid placeholder-no-fix','data-required'=>1,"autocomplete"=>"off","placeholder"=>'Password','field_name'=>"Password"])  !!} 
            <span class="help-block" style="color:red">{{ $errors->first('password', ':message') }} 
         </div>
 
         <div class="form-group form-group-name {{ $errors->first('phone_or_mobile', ' has-error') }}"> 
             {!! Form::text('phone_or_mobile',null, ['class' => 'form-control form-control-solid placeholder-no-fix','data-required'=>1,"placeholder"=>'PHONE/MOBILE','value'=>old('phone_or_mobile'),'field_name'=>"Phone/Mobile",'id'=>'phone_or_mobile'])  !!} 
            <span class="help-block" style="color:red">{{ $errors->first('phone_or_mobile', ':message') }} </span>
         </div>


         <div class="form-group form-group-name"> 
            
             <div class="input-group  date date-picker" data-date="15 Mar,1988" data-date-format="dd M,yyyy" data-date-viewmode="years">
            <input type="text" id="dateofbday" class="form-control" readonly="" value="{{ old('dateOfBirth') }}"  field_name="Date of Birth"  name="dateOfBirth" placeholder="Date of Birth">
                  <span class="input-group-addon">
                      <button type="button" style="border:0;background:transparent;" onclick="$('#dateofbday').datepicker('show')">
               <img src="{{ asset('assets/img/dob.png')}}">
               </button>
               </span>
             </div>
             <span class="help-block" style="color:red">{{ $errors->first('dateOfBirth', ':message') }} </span>
         </div> 
          
         <div class="savePass" id="register_tnc_error" >
            <div class="mt-checkbox-list" data-error-container="#form_2_services_error">
               <label class="mt-checkbox {{ $errors->first('phone_or_mobile', ' has-error') }}" style="width:100%;">
               <input type="checkbox" value="1" name="tnc" > <a href="{{url('terms-and-condition')}}" target="_blank"> By clicking  here  </a> you confirm that you agree with our terms & conditions
               <span></span>
               </label>
                     <span class="help-block" style="color:red">{{ $errors->first('tnc', ':message') }} </span>
              
            </div>
         </div>
         <div class="panelBtn">
            <ul>
               <li>
                  <input type="submit" value="CREATE MY ACCOUNT" class="btn-login" />
               </li>
              
                         <li> <span class="or hidden-xs">Or</span></li>
                        <li><a href="{{url('auth/google')}}" class="gplus"><img src="{{ URL::asset('assets/ven/img/gplus.png')}}"></a></li>
                        <li><a href="{{url('auth/facebook')}}" class="fb"><img src="{{ URL::asset('assets/ven/img/fb.png')}}"></a></li>
            </ul>
         </div>
         <div class="clearfix"></div>
         <p class="signup"><span></span><a href="{{url('admin/login')}}">Login</a></p>
      {!! Form::close() !!} 

       @stop