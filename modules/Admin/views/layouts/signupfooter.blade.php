<script src="{{ URL::asset('assets/js/jquery.min.js')}}" type="text/javascript"></script>

        <script src="{{ URL::asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
      
        <script src="{{ URL::asset('assets/js/jquery.validate.min.js')}}" type="text/javascript"></script>
     
        <script src="{{ URL::asset('assets/js/bootstrap-datepicker.min.js')}}"></script>

      

         <script src="{{ URL::asset('assets/js/components-bootstrap-multiselect.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/app.min.js')}}"></script>
        

        <script src="{{ URL::asset('assets/js/formValidate.js')}}"></script>


        <script src="{{ URL::asset('assets/js/select2.full.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/components-select2.min.js')}}"></script>
        

         
        

      <script type="text/javascript">
         $(document).ready(function($) {

            $('.select2-selection').removeClass();
            $('.select2-search__field').css('width','auto');  
            $('.form-group').css('')
            $(".form-control").focus(function(){
            $(this).parent().removeClass("round");
            $(this).parent().addClass("bluebg");
            }).blur(function(){
               $(this).parent().removeClass("bluebg");
               $(this).parent().addClass("round");
            })
            $('.carousel').carousel();

            $('input[type="text"],input[type="password"]').click('on',function(){
               
               var field_name=  $(this).attr('field_name');
                

               var label =  $('label:contains("'+field_name+'")').length;
             
   
               if(label==0){
                  $(this).before('<label>'+field_name+'</label>');
               }
            }); 
         });   
         $("#dateofbday").datepicker({
                 
                      autoclose: true,
                    //  startDate: '-5y',
                      endDate: '+0d' // there's no convenient "right now" notation yet
         }).on('changeDate', function(){

          //$(this).blur();
          // $("#dateofbday").datepicker('hide');
        }); 
           var email_req = "Email is required";
           var password_req = "Password is required";
      </script>
      <script src="{{ URL::asset('assets/js/common.js')}}"></script>

 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfSZam0MGVvUX5sXb0r_zN2Yb-7evucOo&sensor=false&libraries=places"></script>


<script type="text/javascript">
    var GoogleMapsDemo = GoogleMapsDemo || {};

GoogleMapsDemo.Utilities = (function () {
    var _getUserLocation = function (successCallback, failureCallback) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                successCallback(position);
            }, function () {
                failureCallback(true);
            });
         } else {
             failureCallback(false);
         }
    };
    
    return {
        GetUserLocation: _getUserLocation
    }
})();

GoogleMapsDemo.Application = (function () {
    var _geocoder;
    
    var _init = function () {
        _geocoder = new google.maps.Geocoder;
        
        GoogleMapsDemo.Utilities.GetUserLocation(function (position) {
            var latLng = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            _autofillFromUserLocation(latLng);
            _initAutocompletes(latLng);
        }, function (browserHasGeolocation) {
            _initAutocompletes();
        });
    };
    
    var _initAutocompletes = function (latLng) {
        $('.places-autocomplete').each(function () {
            var input = this;
            var isPostalCode = $(input).is('[id$=PostalCode]');
            var autocomplete = new google.maps.places.Autocomplete(input, {
                types: [isPostalCode ? '(regions)' : 'address']
            });
            if (latLng) {
                _setBoundsFromLatLng(autocomplete, latLng);
            }
            
            autocomplete.addListener('place_changed', function () {
                _placeChanged(autocomplete, input);
            });
            
            $(input).on('keydown', function (e) {
                // Prevent form submit when selecting from autocomplete dropdown with enter key
                if (e.keyCode === 13 && $('.pac-container:visible').length > 0) {
                    e.preventDefault();
                }
            });
        });
    }
    
    var _autofillFromUserLocation = function (latLng) {
        _reverseGeocode(latLng, function (result) {
            $('.address').each(function (i, fieldset) {
                _updateAddress({
                    fieldset: fieldset,
                    address_components: result.address_components
                });
            });
        });
    };
    
    var _reverseGeocode = function (latLng, successCallback, failureCallback) {
        _geocoder.geocode({ 'location': latLng }, function(results, status) {
            if (status === 'OK') {
                if (results[1]) {
                    successCallback(results[1]);
                } else {
                    if (failureCallback)
                        failureCallback(status);
                }
            } else {
                if (failureCallback)
                    failureCallback(status);
            }
        });
    }
    
    var _setBoundsFromLatLng = function (autocomplete, latLng) {
        var circle = new google.maps.Circle({
            radius: 40233.6, // 25 mi radius
            center: latLng
        });
        autocomplete.setBounds(circle.getBounds());
    }
    
    var _placeChanged = function (autocomplete, input) {
        var place = autocomplete.getPlace();
        _updateAddress({
            input: input,
            address_components: place.address_components
        });
    }
    
    var _updateAddress = function (args) {
        var $fieldset;
        var isPostalCode = false;
        if (args.input) {
            $fieldset = $(args.input).closest('fieldset');
            isPostalCode = $(args.input).is('[id$=PostalCode]');
            console.log(isPostalCode);
        } else {
            $fieldset = $(args.fieldset);
        }
    
        
    }
    
    return {
        Init: _init
    }
})();

/* This should ideally be a callback for the async version of the Google Maps script reference.
   However, Codepen doesn't give enough control over the document to ensure that the Google
   Maps script tag is placed after the JS code here. */
GoogleMapsDemo.Application.Init();

</script>
         
   </body>
</html>