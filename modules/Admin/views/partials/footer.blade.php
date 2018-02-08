

    <script src="{{ URL::asset('assets/js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/js/jquery.flot.js')}}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/js/custom.js')}}" type="text/javascript"></script>


    <script type="text/javascript">
        var url = "{{url('/')}}";
        function addCard()
        {
             window.location = url+"/admin/account/add-excel";
        }
        function dragExcel(){
            window.location= url+'/admin/account/drag-excel';

        }
    </script>


</body>
</html>
