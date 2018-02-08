<h4>Personal Details</h4>
 <div class="personal-box box-bg">
    <ul>
        <li><span class="box-info-icon"><img src="{{ asset('assets/images/email.svg')}}" width="20px"></span><span class="personal-text-static">{{$user->email}}</span></li>
        <li><span class="box-info-icon"><img src="{{ asset('assets/images/address.svg')}}"></span><span class="personal-text-static">
            {{$user->address}}
        </span></li>
        <li><span class="box-info-icon"><img src="{{ asset('assets/images/call.svg')}}"></span><span class="personal-text-static">
            {{$user->mobile.', '.$user->office_number }}
        </span></li>
        <li><span class="box-info-icon"><img src="{{ asset('assets/images/dob.svg')}}"></span><span class="personal-text-static" style="border-bottom:none;">{{$user->dateOfBirth }}</span></li>
    </ul>
</div>