<div class="personal-box work-detail product-view wallet add-new-card">
                                            
    <div class="add-btn-card">
        <a href="#">Add New Card</a>
    </div>
        
</div>
<form id="addCard" method="post">
    <div class="personal-box work-detail product-view add-card-process cc">
        <div class="input-card">
            <input type="text" placeholder="Card number" name="card_number" id="card_number">
            <img src="{{ asset('assets/img/visa.jpg')}}" style="position:absolute; right:15px; top:15px;">
            <span id="error_card_number" class="error"></span>
        </div>
        <div class="input-card">
            <input type="text" placeholder="Name on card" name="card_name" id="card_name">
              <span id="error_card_name" class="error"></span>
        </div>
        <div class="input-card">
            <div class="row">
                <div class="col-sm-8">
                    <input type="text" placeholder="MM/YY" name="expire_mm_yy"  maxlength="5" id="expire_mm_yy">
                     <span id="error_expire_mm_yy" class="error"></span>
                </div>
                <div class="col-sm-4">
                    <input type="text" placeholder="CVV" name="cvv" id="cvv"  maxlength="4">
                    <span id="error_cvv" class="error"></span>
                </div>
            </div>
        </div>
        <div class="input-card check-click">
            <input type="checkbox" id="checkbox" onchange="addCreditCard('{{$user->id}}')"   name="saveCard" value="1" > Add card to wallet
            <br>
            <span class="process"></span>
        </div>
        
    </div>
</form>