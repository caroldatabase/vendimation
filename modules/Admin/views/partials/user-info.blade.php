<div class="profile-info">
    <div class="profile-picture">
        @if(file_exists($user->profile_image))
        <img src="{{ url($user->profile_image)}}" width="109px">
        @else
        <img src="{{ asset('assets/img/user1.png')}}" width="109px">
        @endif
        
    </div>
    <div class="profile-view-desc">
        <h3 class="cart-user-name Juan-Brooks">{{  $user->name or $user->first_name.' '.$user->last_name}}</h3>
        <p class="cart-partner Partner-at-Morgan">{{ ucfirst($user->designation)}} at {{ ucfirst($user->companyName)}}</p>
        <p class="cart-location Port-Chester-New-Yo"><img src="{{ asset('assets/images/location.png')}}"> 
            {{ucfirst($user->address)}}
        </p>
    </div>
</div>