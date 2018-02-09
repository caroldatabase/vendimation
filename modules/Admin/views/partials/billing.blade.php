<h4>Billing Address</h4>
    <div class="personal-box box-bg">
        <ul>
             <li><span class="box-info-icon"><img src="{{ asset('assets/images/email.svg')}}" width="20px"></span><span class="personal-text-static">{{$user->email}}</span></li>
                <li><span class="box-info-icon"><img src="{{ asset('assets/images/address.svg')}}"></span><span class="personal-text-static">
                    {{$user->address}}
                </span></li>
                <li><span class="box-info-icon"><img src="{{ asset('assets/images/call.svg')}}"></span><span class="personal-text-static">
                    {{$user->mobile.', '.$user->office_number }}
                </span></li>
               
            <li class="border-top">
                <span class="personal-text-static" style="border-bottom:none;">
                    <a href="#" style="width:50%;text-align: right;float: left;" class="Remove">REMOVE</a> 
                    <a href="#" style="width:50%;float: left;text-align: center;" class="Edit"><label>EDIT</label></a>
                </span>
            </li>
        </ul>
    </div>
