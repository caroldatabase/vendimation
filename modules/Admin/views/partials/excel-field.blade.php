<div class="col-sm-7 excel-sec">
    <div class="profile-left-main">
        <div class="add-excel">
            <div class="excel-iocn text-center">
                <p><img src="{{asset('assets/img/excel.jpg')}}"></p>
                <h3>{{$excel_name}}</h3>
                <p>
                    We have detected {{$sheetHeadingCount}} columns in your file,<br>
please help us relate each column to our standard fields.
                </p>
            </div>
            
            <div class="excel-form map-excel-colum-form">
               <div class="left-excel-form">
                   <h4>In SalesPlus</h4>
                    <form>
                   @foreach($db_contact_fields as $columnKey=>$columnValue)
                 <input type="text" readonly="readonly" value="{{$columnValue}}" placeholder="{$columnValue}}">
                 @endforeach
<!--                        <input type="text" placeholder="First Name">
                        <input type="text" placeholder="Last Name">
                        <input type="text" placeholder="Email">
                        <input type="text" placeholder="Address">
                        <input type="text" placeholder="Preference">-->
                    </form>
                </div>
                <div class="left-excel-form">
                    
                     <h4>In Your File</h4>
                     <form method="post" id="excel-column-form" action="{{url('admin/import-contact')}}">
                      @foreach($db_contact_fields as $columnKey=>$columnValue)
                      <select name="excel_map[{{$columnKey}}]" class="form-control form-control-select">
                          <option value="" class="text-center"> ---Select--- </option>
                            @foreach($sheetHeading as $key=>$value)
                             <option value="{{$value}}">{{$value}}</option>
                          @endforeach
                      </select>
                    @endforeach
                    </form>
                </div>
            </div>
            
            <div class="excel-next text-center">
                <input type="submit" value="NEXT" onclick="jQuery('#excel-column-form').submit()" class="btn-login">
            </div>
            
        </div>
    </div>
</div>