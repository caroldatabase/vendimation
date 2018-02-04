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
        
        <div class="form-group" style="height: 250px"> 
          <br></br>
          <label style="font-size: 20px; font-family: Muli">Congratulation!</label>
          <div class="form-control">Welcome to Vendimation! Verify your email address to get started.</div>

          <div class="form-control" style="color: #323c47; margin-top: 15px "> 
            <a href="{{url('admin/login')}}"> 
              Click here to login 
            </a>
          </div>
        </div>
        </div>
         

@stop