
<h4>My Wallet</h4>
    
    @foreach($card as $result)
    <div class="personal-box work-detail product-view wallet" >
        <div class="row">
            <div class="col-sm-6">
                <p class="wallet-in"><a href="#"><img src="{{ asset('assets/img/circle-right.jpg')}}"></a> <span class="nam-card">{{$result->first_name}}<span>****{{substr($result->card_number,-4)}}</span></span></p>
            </div>
            <div class="col-sm-6 visa">
                <img src="{{ asset('assets/img/visa.jpg')}}"> <input type="text" class="cvv" placeholder="CVV">
            </div>
        </div>
    </div>
    @endforeach
     
