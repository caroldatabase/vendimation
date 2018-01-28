
        <!-- END THEME LAYOUT SCRIPTS -->
  @if(isset($js_file))
    @foreach($js_file as $key => $js )
        <script src="{{ URL::asset('assets/js/'.$js) }}" type="text/javascript"></script>
    @endforeach
    @else
      <script src="{{ URL::asset('assets/js/common.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('assets/js/bootbox.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('assets/js/formValidate.js') }}" type="text/javascript"></script>
  @endif
    <script src="https://use.fontawesome.com/a832a5b49f.js"></script>
    <script type="text/javascript">
        var   email_req     = "Please enter email";
        var   password_req  = "Please enter password";
        var   url           = "{{ url::to('/')}}";
    </script> 
    </body>
</html>