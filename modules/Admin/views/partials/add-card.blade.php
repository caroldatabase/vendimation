<div class="personal-box work-detail product-view wallet add-new-card">
                                            
    <div class="add-btn-card">
        <a href="#">Add New Card</a>
    </div>
        
</div>
<form id="addCard" method="post">
    <div class="personal-box work-detail product-view add-card-process cc">
        <div class="input-card">
            <input type="text" placeholder="Card number" name="card_number">
            <img src="{{ asset('assets/img/visa.jpg')}}" style="position:absolute; right:15px; top:15px;">
        </div>
        <div class="input-card">
            <input type="text" placeholder="Name on card" name="card_name">
        </div>
        <div class="input-card">
            <div class="row">
                <div class="col-sm-8">
                    <input type="text" placeholder="MM/YY" name="expire_mm_yy">
                </div>
                <div class="col-sm-4">
                    <input type="text" placeholder="CVV" name="cvv">
                </div>
            </div>
        </div>
        <div class="input-card check-click">
            <input type="checkbox" checked="true" name="saveCard" value="1" > Add card to wallet
        </div>
        
    </div>
</form>