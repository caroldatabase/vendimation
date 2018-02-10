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
                                            <h3>{{$excel_name}}</h3>
<!--                                            <p>
                                                We have detected 4 columns in your file,<br/>please help us relate each column to our standard fields.
                                            </p>-->
                                        </div>

                                        <div class="contact-table">
<!--                                            <h3>210 contacts detected (110 acceptable for import)</h3>-->
                                            <h3>{{$totalRowsCount}} contacts detected({{$totalRows['accepted_count']}}  acceptable for import).</h3>
                                            <form method="post" id="ready_to_report" action="{{url('admin/import-contact')}}">
                                                <input type="hidden" name="action" value="{{md5('save-excel-import')}}"/>
                                            <table width="100%" border="0" style="text-align:center;">
                                                <thead><tr>
                                                    <td><input type="checkbox" onclick="$('input[name*=\'import_selected\']').prop('checked', this.checked);" ></td>
                                                    @foreach($db_contact_fields as $columnKey=>$columnValue)
                                                     <td>{{$columnValue}}</td>
                                                    @endforeach
                                                </tr>
                                                </thead><tbody>
                                                @foreach($totalRows['items'] as $row_id=>$row)
                                                <tr class="isvalid-{{$row['valid']}}">
                                                    <td><input type="checkbox" value="{{$row_id}}" name="import_selected[]"></td>
                                                    @foreach($db_contact_fields as $columnKey=>$columnValue)
                                                    <td class="error-{{$row[$columnKey]['error']}}">
                                                        @if($row[$columnKey]['value']!='')
                                                        {{$row[$columnKey]['value'] OR '-'}}
                                                        @else
                                                        -
                                                        @endif
                                                    </td>
                                                    @endforeach
                                                </tr>
                                                 @endforeach
                                                </tbody>
                                            </table>
                                            </form>
                                        </div>
                                        <div class="excel-next text-center" style="clear:both; position: relative;">
                                            <input type="submit" id="import-select-contact" value="IMPORT SELECTED" class="btn-login">
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
var ajaxLoader = $('<span class="ajax-loader" style="margin-right: 10px;"><img src="{{ URL::asset('assets/img/ajax-loader.gif') }}"/></span>')

    $(document).on('click','#import-select-contact',function(e){
        e.preventDefault();
           
            var data = $('#ready_to_report').serialize();
            $.ajax({
                url:url+'/admin/save-contact',
                data:data,
                type:'POST',
                dataType:'json',
                beforeSend:function(){
                $('#import-select-contact').before(ajaxLoader);   
                $('#import-select-contact').attr('disabled','disabled');
                },
                success:function(res){
                     $('.ajax-loader').remove();
                      $('#import-select-contact').removeAttr('disabled');
                      var messageContent = '<div class=""><h4>Success</h4><div>'+res.message+'</div></div>';
                     bootbox.alert(messageContent,function(){
                        if(res.status==1){
                            window.location.href="{{url('admin/account/profile')}}"
                        }
                     });
                },
                error:function(){
                     $('.ajax-loader').remove();
                      $('#import-select-contact').removeAttr('disabled');
                      alert('Error Occured. Please try again.')
                },
                complete:function(){}
            });
        return ;
    });
        </script>

    </body>
</html>
