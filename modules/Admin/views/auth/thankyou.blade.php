 @extends('packages::layouts.signupmaster')
    @section('content') 
      <!-- BEGIN LOGIN -->
    <div class="content">
      <!-- BEGIN LOGIN FORM -->
        <div class="index"> 
        </div>
        <div class="clearfix"></div>
        <h3 class="mt30">Enjoying your best time</h3>
        <p class="comment">Free forever. No credit card needed.</p>
        
        <div class="form-group" style="min-height: 250px; padding: 15px"> 
            <label style="font-size: 20px; font-family: Muli">Congratulation!</label>
            <div class="form-control" style="font-size: 15px">Welcome to Vendimation! Verify your email address to get started.
          <a href="{{url('admin/login')}}" style="margin-top:15px; display: block;"> 
              
              Click here to login 
            </a>
          </div>
 
        </div>
        </div>
         

@stop