<<<<<<< HEAD

 <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" action="index.html" method="post">
                <h1><img src="{{ URL::asset('assets/ven/img/small-logo.png')}}"><span>Vendimation</span></h1>

                <h3>Sign in to Vendimation</h3>
                <p class="comment">We're happy you're here.</p>
                 @if ($errors->any())
                <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                           {{ $error }}
                        @endforeach
                </div>
               @endif
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any username and password. </span>
                </div>
                <div class="form-group {{ $errors->first('email', ' has-error') }}">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label>Email address</label>

                    {!! Form::email('email',null, ['class' => 'form-control form-control-solid placeholder-no-fix', 'placeholder'=>'Email' ])  !!} 
                </div>
                <div class="form-group {{ $errors->first('password', ' has-error') }}">
                    <label>Password</label>
                      {!! Form::password('password', ['class' => 'form-control form-control-solid placeholder-no-fix', 'placeholder'=>'Password' ])  !!} 

                    <div class="forgot"><a href="{{url('admin/forgot-password')}}">Forgot?</a></div>
                    </div>
                    <div class="savePass"><input type="checkbox" id="chkBox"> <label for="chkBox">Save my password</label></div>
                <div class="panelBtn">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="row">
                    <input type="submit" value="LOGIN" class="btn-login" />
                    </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="row">
                    <ul>
                         <li> <span class="or hidden-xs">Or</span></li>
                        <li><a href="{{url('auth/google')}}" class="gplus"><img src="{{ URL::asset('assets/ven/img/gplus.png')}}"></a></li>
                        <li><a href="{{url('auth/facebook')}}" class="fb"><img src="{{ URL::asset('assets/ven/img/fb.png')}}"></a></li>
                    </ul>
                    </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <p class="signup"><span></span><a href="{{url('admin/signup/step_1')}}">Create an account?</a></p>
               
            </form>
           
        </div>


=======
<h3 class="form-title">Sign in</h3>
     @if (count($errors) > 0)
    <div class="alert alert-danger">
        <button class="close" data-close="alert"></button>
        <span> 
            
                    @foreach ($errors->all() as $error)
                    {{ $error }}
                    @endforeach
                
        </span>
    </div>
     @endif
    <div class="form-group{{ $errors->first('email', ' has-error') }}">
        <label class="control-label visible-ie8 visible-ie9"> email <span class="error">*</span></label>
        <div class="input-icon">
          
             {!! Form::email('email',null, ['class' => 'form-control placeholder-no-fix', 'placeholder'=>'Email' ])  !!} 
        </div>
    </div>
   <div class="form-group{{ $errors->first('password', ' has-error') }}">
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <div class="input-icon">
            
            
             {!! Form::password('password', ['class' => 'form-control placeholder-no-fix', 'placeholder'=>'Password' ])  !!} 

            </div>
    </div>
  
       <div class="form-actions">
                    <button type="submit" class="btn green uppercase">Login</button>
                    <label class="rememberme check mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="remember" value="1" />Remember
                        <span></span>
                    </label>
                    <a href="{{url('admin/forgot-password')}}" id="forget-password" class="forget-password">Forgot Password?</a>
                </div>
                
                <div class="create-account">
                    <p>
                        <a href="javascript:;"  class="uppercase"></a>
                    </p>
                </div>
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
