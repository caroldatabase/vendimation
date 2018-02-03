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
        
        <div class="form-group" style="height: 200px"> 
          <br></br>
          <div class="form-control" style=" color: #00a5ec;">{{ $msg or ''}}</div>
          <div class="form-control" style="color: #323c47"> <a href="{{url('admin/login')}}"> Click here to login </a></div>
        </div>
         

@stop