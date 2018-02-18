
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

                    {!! Form::email('email',null, ['class' => 'form-control form-control-solid placeholder-no-fix', 'placeholder'=>'kroy@programmerlab.com' ])  !!} 
                </div>
                <div class="form-group {{ $errors->first('password', ' has-error') }}">
                    <label>Password</label>
                      {!! Form::password('password', ['class' => 'form-control form-control-solid placeholder-no-fix', 'placeholder'=>'Password' ])  !!} 

                    <div class="forgot"><a href="{{url('admin/forgot-password')}}">Forgot?</a></div>
                    </div>
                    <div class="savePass"><input type="checkbox" id="chkBox"> <label for="chkBox">Save my password</label></div>
                <div class="panelBtn" style="line-height: 5">
                    <div class="col-md-6">
                        <input type="submit" value="LOGIN" class="btn-login" />
                        
                    </div>
                    <div class="col-md-6">
                        <ul>
                             <li> <span class="or hidden-xs">Or</span></li>
                            <li><a href="{{url('auth/google')}}" class="gplus"><img src="{{ URL::asset('assets/ven/img/gplus.png')}}"></a></li>
                            <li><a href="{{url('auth/facebook')}}" class="fb"><img src="{{ URL::asset('assets/ven/img/fb.png')}}"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
                <p class="signup"><span></span><a href="{{url('admin/signup/step_1')}}">Create an account?</a></p>
               
            </form>
           
        </div>


