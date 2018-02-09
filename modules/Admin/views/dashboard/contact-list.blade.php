<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Vendimation Dashboard </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Vendimation" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Muli:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="{{ URL::asset('assets/css/style.css')}}" rel="stylesheet">
        <link href="{{ URL::asset('assets/css/vendimation-style-270118.css')}}" rel="stylesheet">
    </head>
    <body>
        @include('packages::partials.navigation')
        <!-- Left side column. contains the logo and sidebar -->
        <div class="main-section">
            <div class="container-fluid">
                <div class="row">
                    <!--main menu start-->
                    @include('packages::partials.sidebar')
                    <div class="col-sm-10 main-left-content profile-page">
                        <div class="row">
                            <div class="col-sm-10 box-shadow excel-sec">
                                <div class="profile-left-main">
                                    <div class="add-excel">
                                        <div class="excel-iocn text-center">
                                            <p><img src="{{ asset('assets/img/excel.jpg')}}"></p>
                                            <h3>MyContacts.exl</h3>
<!--                                            <p>
                                                We have detected 4 columns in your file,<br/>please help us relate each column to our standard fields.
                                            </p>-->
                                        </div>

                                        <div class="contact-table">
<!--                                            <h3>210 contacts detected (110 acceptable for import)</h3>-->
                                            <h3>{{$totalRowsCount}} contacts detected</h3>
                                            <table width="100%" border="0" style="text-align:center;">
                                                <tr>
                                                    <td><input type="checkbox" name="selectAll"></td>
                                                    @foreach($db_contact_fields as $columnKey=>$columnValue)
                                                     <td>{{$columnValue}}</td>
                                                    @endforeach
                                                </tr>
                                                @foreach($totalRows as $columnKey=>$row)
                                                <tr>
                                                     <td><input type="checkbox" name="selectAll[]"></td>
                                                    @foreach($mapFields as $key=>$value)
                                                     <td>{{$row[$value] or 'Not found'}}</td>
                                                    @endforeach
                                                </tr>
                                                 @endforeach
                                            </table>
                                        </div>
                                        <div class="excel-next text-center">
                                            <input type="submit" value="IMPORT SELECTED" class="btn-login">
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!--main menu end-->
                </div>
            </div>
        </div> 
        @if(isset($js_file))
        @foreach($js_file as $key => $js )
        <script src="{{ URL::asset('assets/js/'.$js) }}" type="text/javascript"></script>
        @endforeach
        @else
         <!--  <script src="{{ URL::asset('assets/js/common.js') }}" type="text/javascript"></script>
          <script src="{{ URL::asset('assets/js/bootbox.js') }}" type="text/javascript"></script>
          <script src="{{ URL::asset('assets/js/formValidate.js') }}" type="text/javascript"></script> -->
        @endif

        <script type="text/javascript">
var url = "{{url('/')}}";
function dragExcel() {
    window.location = url + '/admin/account/drag-excel';

}
        </script>

    </body>
</html>
