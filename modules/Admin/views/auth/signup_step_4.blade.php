 @extends('packages::layouts.signupmaster')
    @section('content') 
      <!-- BEGIN LOGIN -->
    <div class="content">
      <!-- BEGIN LOGIN FORM -->
        {!! Form::open(['url' => url('admin/signup/step_5') ,'class'=>'form-horizontal user-form','id'=>'user-form-final','enctype'=>'multipart/form-data', 'method' => 'post']) !!}
        <div class="index">
            <ul>
                <li>04</li>
                <li class="personalDetails"><span>&nbsp;</span>Additional Information</li> 
            
          </ul>
          
        </div>
        <div class="clearfix"></div>
        <h3 class="mt30">Enjoying your best time</h3>
        <p class="comment">Free forever. No credit card needed.</p>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> Enter any username and password. </span>
        </div>
        <div class="addInfoName form-group">
          <ul>
            <li class="partnerImg">
                <img src="{{ url('assets/img/user1.png')}}"  width="120px" class="img-responsive center-block">
            </li>
            <li>
             
              <ul>
                <li class="name">{{ ucfirst($user->name) }}</li>
                <li class="designation">{!! ucfirst($user->designation) !!}</li>
                <li class="location">{!! $user->address !!}</li>
              </ul>
            </li>
          </ul>

        </div>
        
        <div class="form-group form-group-name"> 
            <label>Company Name</label>
                <input class="form-control form-control-solid placeholder-no-fix" style="min-height:64px;" type="text" autocomplete="off" placeholder="Company Name"  value="{{ $user->companyName}}" readonly="readonly"> 
                @if(!empty($user->companyLogo) && file_exists($user->companyLogo))
                 <img src="{!! url($user->companyLogo) !!}" class="cLogo" width="50px">
                @else
                 <img src="{{ asset('assets/img/com-logo.png')}}" class="cLogo">
                @endif 
        </div> 
        

        <div class="form-group natureBusiness targetMkt form-group-name">
              <label>Nature of Your Business</label>   
           <select id="multiple" class="form-control select2" multiple name="bussiness_nature"> 

            <optgroup label="Nature of Business"> 
                @foreach($businessNatureType as $result)
                    <option value="{{ $result->id }}">{{ $result->title }}</option>
                @endforeach
            </optgroup> 
            </select>

            <div class="forgot plusMinus"><a href="#"><span></span></a></div>
          <div class="clearfix"></div> 
        </div>
        <div class="form-group natureBusiness targetMkt form-group-name">
              <label>Targeting Markets</label>   
           <select id="multiple" class="form-control select2" multiple name="target_market_type"> 

                <optgroup label="Targeting Markets"> 
                     @foreach($targetMarketType as $result)
                        <option value="{{ $result->id }}">{{ $result->title }}</option>
                    @endforeach
                </optgroup> 
            </select>

            <div class="forgot plusMinus"><a href="#"><span></span></a></div>
          <div class="clearfix"></div> 
        </div> 

          <div class="clearfix"></div>
           
         <div class="panelBtn">
            <ul>
                <li>
                    <input type="submit" value="CONTINUE" class="btn-login">
                </li>
                <li>
                <a href="{{url('admin/login')}}">   
                    <input type="button" value="SKIP" class="btn btn-circle btn-default btn-skip">
                </a>  
                </li>
              
            </ul>
         </div>
        <div class="clearfix"></div>
        <p class="signup"><span></span><a href="{{url('admin/login')}}">Login</a></p>
    {!! Form::close()!!}
@stop