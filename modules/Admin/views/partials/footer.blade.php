

    <script src="{{ URL::asset('assets/js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/js/jquery.flot.js')}}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/js/custom.js')}}" type="text/javascript"></script>

    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js">
    </script>
    <script src="{{ URL::asset('assets/js/jquery.creditCardValidator.js')}}" type="text/javascript"></script>

    <style type="text/css">
        .file-error{
            color: red;
        }
        #update_address{
          display: none;
        }
    </style>

    <script type="text/javascript">
        var url = "{{url('/')}}";

        function showAddress()
        {
          $('#update_address').show();
        }

        function addCard()
        {
             window.location = url+"/admin/drag-excel"; 
        }
        function dragExcel(){
            window.location= url+'/admin/add-excel';

        }

        function isEmpty(str) {
            return (!str || 0 === str.length);
        }

        function addCreditCard(uid){
            var name = $('#card_name').val(); 
            var card = $('#card_number').val(); 
            var expiry = $('#expire_mm_yy').val(); 
            var cvv = $('#cvv').val();  

            if((/^\s*$/).test(card)){
                $('#error_card_number').html('Please enter card number'); 
               document.getElementById("checkbox").checked = false;
                return false;
            }else{
               $('#error_card_number').html(""); 
            }

            if((/^\s*$/).test(name)){
                $('#error_card_name').html('Please enter name as written on card'); 
               document.getElementById("checkbox").checked = false;
                return false;
            }else{
               $('#error_card_name').html(""); 
            }

            if((/^\s*$/).test(expiry)){
                $('#error_expire_mm_yy').html('Please enter card expiry date'); 
               document.getElementById("checkbox").checked = false;
                return false;
            }else{
               $('#error_expire_mm_yy').html(""); 
            }

            if((/^\s*$/).test(cvv)){
                $('#error_cvv').html('Please enter cvv'); 
               document.getElementById("checkbox").checked = false;
                return false;
            }else{
               $('#error_cvv').html(""); 
            }

            var checked = $("input#checkbox:checked").length;
            
              if (checked == 0) {
                return false;
              }

            var data =  $('form#addCard').serialize(); 
            $.ajax({
                type: "POST",
                data: data,
                url: url+'/admin/addCard?user_id='+uid,
                beforeSend: function() {
                   $('.process').html('Please wait...');
                },
                success: function(response) {
                        console.log(response);  
              //bootbox.alert('Activated');  
              $('.process').html('');          
                if(response.status==0)
                    {
                         document.getElementById("checkbox").checked = false;
                        $('.process').html(response.message);         
                    }else
                    {
                        $('.add-new-card').before(response.data);
                        $('.process').html('Card added successfully');
                        $('#addCard').hide();
                    }
                }
            });


        }

         $(function() {
            $('#card_name').keyup(function(){
                var name = $('#card_name').val(); 

                if((/^\s*$/).test(name)){ console.log('fd');
                    $('#error_card_name').html('Please enter name as written on card');
                     document.getElementById("checkbox").checked = false;
                }else{
                   $('#error_card_name').html(""); 
                }   
            });


            $('#card_number').keyup(function(){
                $('#card_number').validateCreditCard(function(result) {

                    $('#c').html('Card type: ' + (result.card_type == null ? '-' : result.card_type.name)
                              + '<br>Valid: ' + result.valid
                              + '<br>Length valid: ' + result.length_valid);
                    
                     console.log(result);
                    if(result.length_valid==false){
                        $('#error_card_number').html('Enter invalid card number');
                         document.getElementById("checkbox").checked = false;
                    }else{
                        $('#error_card_number').html(' ');
                    }

                });
            });
                
            $('#cvv').keyup(function(){
                    var cvv = $(this).val();
                    if(cvv.length==0){
                        return false;
                    }
                    if(!$.isNumeric(cvv) || (cvv.length)>4){ 
                        $('#error_cvv').html('invalid cvv');
                         document.getElementById("checkbox").checked = false;
                    }else{
                        $('#error_cvv').html('');
                    }

                })
            }); 

             jQuery('body').on('keyup', '#expire_mm_yy', function(e){
                console.log($(this).val());
                var val = $(this).val();
                 var regex = /[0-9]|\./;
                 if(regex.test(val) ==false){
                    $(this).val("");
                 } 
                var val = $(this).val();
                if(!isNaN(val)) {
                    if(val > 1 && val < 10 && val.length == 1) {
                        temp_val = "0" + val + "/";
                        $(this).val(temp_val);
                    }
                    else if (val >= 1 && val < 10 && val.length == 2 && e.keyCode != 8) {
                        temp_val = val + "/";
                        $(this).val(temp_val);                      
                    }
                    else if(val > 9 && val.length == 2 && e.keyCode != 8) {
                        temp_val = val + "/";
                        $(this).val(temp_val);
                    }
                }
                else if(val > 9 && val.length == 2 && e.keyCode != 8) {
                      if (val > 12) {
                        temp_val = "0" + val[0] + "/" + val[1];
                        $(this).val(temp_val);
                      } else {
                        temp_val = val + "/";
                        $(this).val(temp_val);
                      }
                    }
                });

             
             $('#addCard').hide();
             $('#add_new_card').click(function(){
                $('#addCard').show();
             });
    </script>
</body>
</html>
