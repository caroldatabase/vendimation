<div class="col-sm-7 excel-sec">
    <div class="profile-left-main">
        <div class="add-excel">
            <div class="excel-iocn text-center">
                <p><img src="{{asset('assets/img/excel.jpg')}}"></p>
                <h3>MyContacts.exl</h3>
                <p>
                    We have detected 4 columns in your file,<br>
please help us relate each column to our standard fields.
                </p>
            </div>
            
            <div class="excel-form">
                <div class="left-excel-form">
                    <h4>In Your File</h4>
                    <form>
                        <input type="text" placeholder="First Name">
                        <input type="text" placeholder="Last Name">
                        <input type="text" placeholder="Email">
                        <input type="text" placeholder="Address">
                        <input type="text" placeholder="Preference">
                    </form>
                </div>
                <div class="left-excel-form">
                    <h4>In SalesPlus</h4>
                    <form>
                        <input type="text" placeholder="First Name">
                        <input type="text" placeholder="Last Name">
                        <input type="text" placeholder="Email">
                        <input type="text" placeholder="Address">
                        <input type="text" placeholder="Preference">
                    </form>
                </div>
            </div>
            
            <div class="excel-next text-center">
                <input type="submit" value="NEXT" onclick="dragExcel()" class="btn-login">
            </div>
            
        </div>
    </div>
</div>