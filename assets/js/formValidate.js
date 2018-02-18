


var Login = function() {

    var handleLogin = function() {

        $('.user-form, .contact-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                 name: {
                    required: true
                },
                email: {
                    required: true
                },
                password: {
                    required: true
                },
                
                 
                category_group_name:{
                    required:true
                },
                category_group_image:{
                    required:true
                },
                category_name:{
                    required:true
                },
                category_image:{
                    required:true
                },
                name:{
                    required:true
                },
                first_name:{
                    required:true
                }
            },

            messages: {
                email: {
                    required: "Please enter your email."
                },
                password: {
                    required: "Please enter your password."
                },
                category_image : {
                    required: "Please enter category image."
                },
                category_group_name:{
                    required:"Please enter category group name"
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit  
            
             $('.form-group').removeClass( "has-error" );

                $('.alert-danger', $('.user-form')).show();
            },

            highlight: function(element) {  

                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {  

                 label.closest('.form-group').removeClass('has-error');
                label.remove();

            },

            errorPlacement: function(error, element) {
                error.insertAfter(element.closest('.input-icon'));
            },

            submitHandler: function(form) {

                form.submit(); // form validation success, call ajax form submit
            }
        });

        $('.user-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.user-form').validate().form()) {
                    $('.user-form').submit(); //form validation success, call ajax form submit
                }
                return false;
            }
        });
    }

    var handleForgetPassword = function() {
        $('.forget-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },

            messages: {
                email: {
                    required: "Email is required."
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit   

            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function(error, element) {
                error.insertAfter(element.closest('.input-icon'));
            },

            submitHandler: function(form) {
                form.submit();
            }
        });

        $('.forget-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.forget-form').validate().form()) {
                    $('.forget-form').submit();
                }
                return false;
            }
        });

        jQuery('#forget-password').click(function() {
            jQuery('.login-form').hide();
            jQuery('.forget-form').show();
        });

        jQuery('#back-btn').click(function() {
            jQuery('.login-form').show();
            jQuery('.forget-form').hide();
        });

    }

    var handleRegister = function() {

        function format(state) {
            if (!state.id) { return state.text; }
            var $state = $(
             '<span><img src="../assets/global/img/flags/' + state.element.value.toLowerCase() + '.png" class="img-flag" /> ' + state.text + '</span>'
            );
            
            return $state;
        }

        if (jQuery().select2 && $('#country_list').size() > 0) {
            $("#country_list").select2({
                placeholder: '<i class="fa fa-map-marker"></i>&nbsp;Select a Country',
                templateResult: format,
                templateSelection: format,
                width: 'auto', 
                escapeMarkup: function(m) {
                    return m;
                }
            });


            $('#country_list').change(function() {
                $('.user-register-form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });
        }
        $('.user-register-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true
                },
                phone_or_mobile: {
                    required: true
                },
                dateOfBirth: {
                    required: true
                },
                tnc: {
                    required: true
                },
                companyName: {
                    required: true
                },                
                 address: {
                    required: true
                },
                office_number: {
                    required: true
                },             
                        
                region: {
                    required: true
                }         
            },

            messages: { // custom messages for radio buttons and checkboxes
                tnc: {
                    required: "Please accept TNC first."
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit   

            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function(error, element) {
                if (element.attr("name") == "tnc") { // insert checkbox errors after the container                  
                    error.insertAfter($('#register_tnc_error'));
                } else if (element.closest('.input-icon').size() === 1) {
                    error.insertAfter(element.closest('.input-icon'));
                } else {
                    error.insertAfter(element);
                }
            },

            submitHandler: function(form) {
               form[0].submit();
              return false;
            }
        });

        $('.user-register-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.user-register-form').validate().form()) {
                    $('.user-register-form').submit();
                }
                return false;
            }
        });



         $('.forget-password-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {

               
                email: {
                    required: true,
                    email: true
                },
                 
            },

            messages: { // custom messages for radio buttons and checkboxes
                email: {
                    required: "Please accept TNC first."
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit   

            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function(error, element) {
                if (element.attr("name") == "tnc") { // insert checkbox errors after the container                  
                    error.insertAfter($('#register_tnc_error'));
                } else if (element.closest('.input-icon').size() === 1) {
                    error.insertAfter(element.closest('.input-icon'));
                } else {
                    error.insertAfter(element);
                }
            },

            submitHandler: function(form) {
                form[0].submit();
            }
        });



        jQuery('#register-btn').click(function() {
            jQuery('.login-form').hide();
            jQuery('.user-register-form').show();
        });

        jQuery('#register-back-btn').click(function() {
            jQuery('.login-form').show();
            jQuery('.user-register-form').hide();
        });
    }

    return {
        //main function to initiate the module
        init: function() {

            handleLogin();
            handleForgetPassword();
            handleRegister();

        }

    };

}();

jQuery(document).ready(function() {
    Login.init();
});


$(function(){ 

    
      $('#office_number').on('keydown',function (e) {
          if (e.shiftKey || e.ctrlKey || e.altKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
            // alert(key);
            if((key>=96 && key<=105) || (key>=48 && key<=57) || key==189 || key==8 || key==32 ||  key==9 || key==109 || key==39 || key==37){
               console.log(key);
            }else{
                e.preventDefault();
            }
             
             
          }
      }); 


     $('#office_number').on('keyup',function(){
        // alert('ds');

        var value = $(this).val(); 
          $("#office_number").val(function(i, text) {
            text = text.replace(/(\d{3})(\d{3})(\d{4})/, "$1-$2-$3"); 
            text =    text.substr(0, 12);
            return text;
        });
        
    }); 
});