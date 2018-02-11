<div class="col-sm-7 excel-sec" >
    <div class="profile-left-main" id="update_address" style="display: none">
        <div class="add-excel">
            <div class="excel-iocn text-center">
                <h3>Update Address</h3>
                
            </div>
            
            <div class="excel-form map-excel-colum-form">
               <form>
               <div class="left-excel-form">
                   
                         <h4>Full Name</h4>
                        <input type="text" placeholder="Full Name" name="full_name" value="{{$user->name}}">
                        <h4>Mobile</h4> 
                        <input type="text" placeholder="Mobile" name="mobile" id="Mobile" value="{{$user->mobile}}">
                        <h4>Phone</h4>
                        <input type="text" placeholder="Phone" name="phone" id="phone"  value="{{$user->phone}}">
                       <h4>Designation</h4>   
                        <input type="text" placeholder="Designation" name="designation"  value="{{$user->designation}}">
                        <h4>Company Name</h4>  
                        <input type="text" placeholder="Company Name" name="companyName"  value="{{$user->companyName}}" >
                        <h4>Company Logo</h4>  
                        <input type="text" placeholder="Company Logo" name="companyLogo">
                </div>
                <div class="left-excel-form">
                    
                      <h4>Email</h4>
                        <input type="text" placeholder="Email Address" name="email"  value="{{$user->email}}">
                        <h4>Address</h4>
                        <textarea  style="padding: 15px; width: 100%; border: 1px solid #eee; border-radius: 5px;"  placeholder="Address" name="address" id="address" rows="5" > {{$user->address}}</textarea>
                        <h4>DOB</h4>
                        <input type="text" placeholder="date of birthday" name="dateofbday" id="dateofbday" value="{{$user->dateofbday}}">
                       <h4>office Number</h4>
                        <input type="text" placeholder="Office Number" name="office_number"  value="{{$user->office_number}}">
                        <h4>Extension</h4>  
                        <input type="text" placeholder="Extension" name="extension"  value="{{$user->extension}}">
                    
                </div>
                </form>
            </div>
            
            <div class="excel-next text-center">
                <input type="submit" value="Update" onclick="UpdateAddress()" class="btn-login">
            </div>
            
        </div>
    </div>
</div>