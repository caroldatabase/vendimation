<div class="tab-pane active" id="tab_1_1"> 
<div class="portlet light bordered">
 <div class="portlet-title">
            <div class="caption">
                <i class="icon-social-dribbble font-green"></i>
                <span class="caption-subject font-green bold uppercase">Personel Info
                </span>
            </div> 
        </div>
   

    <div class="form-group {{ $errors->first('first_name', ' has-error') }}">
        <label class="control-label">First Name</label>
        <input type="text" placeholder="First Name" class="form-control" name="first_name" value="{{$user->first_name}}"> </div>
    <div class="form-group {{ $errors->first('first_name', ' has-error') }}" >
        <label class="control-label">Last Name</label>
        <input type="text" placeholder="Last Name" class="form-control" name="last_name" value="{{$user->last_name}} ">  
    </div>
     <div class="form-group {{ $errors->first('first_name', ' has-error') }}">
        <label class="control-label ">Email</label>
        <input type="email" placeholder="Email" class="form-control" name="email" value="{{$user->email}} "> 
    </div>
    <div class="form-group {{ $errors->first('password', ' has-error') }}">
        <label class="control-label">Password</label>
        <input type="password" placeholder="******" class="form-control" name="password"> 
    </div>

   
    <div class="form-group {{ $errors->first('occupation', ' has-error') }}">
        <label class="control-label">Interests</label>
        <input type="text" placeholder="Design, Web etc." class="form-control" name="interests" value="{{$user->interests}} "> </div>
    <div class="form-group">
        <label class="control-label">Occupation</label>
        <input type="text" placeholder="Occupation" class="form-control" name="occupation" value="{{$user->occupation}}">
         </div>
    <div class="form-group {{ $errors->first('about_me', ' has-error') }}">
        <label class="control-label">About</label>
        <textarea class="form-control" rows="3" placeholder="Basic detail" name="about_me">{{$user->about_me}}</textarea>
    </div>

    <div class="form-group {{ $errors->first('address', ' has-error') }}">
        <label class="control-label">Address</label>
        <textarea class="form-control" rows="3" placeholder="Address" name="address" >{{$user->address}}</textarea>
    </div>
    <div class="form-group {{ $errors->first('companyName', ' has-error') }}">
        <label class="control-label">Company Name</label>
        <input type="text" placeholder="Company Name" class="form-control" name="companyName" value="{{$user->companyName}}"> 
    </div>
     <div class="form-group {{ $errors->first('phone', ' has-error') }}">
        <label class="control-label">Mobile Number</label>
        <input type="text" placeholder="Mobile or Phone" class="form-control" name="phone"  value="{{$user->phone}}"> </div>
     <div class="form-group">
        <label class="control-label">Ext</label>
        <input type="text" placeholder="extension" class="form-control" name="extension" value="{{$user->phone}} "> </div>
     <div class="margin-top-10">

                <button type="submit" class="btn green" value="personelInfo" name="submit"> Save </button>
                <button type="submit" class="btn default"> Cancel </button>
            </div>  
</div>
</div>