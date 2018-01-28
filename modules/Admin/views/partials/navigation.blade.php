<!--header section start-->
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-2 text-center main-logo">
                        <div class="logo">
                            <a href="#"><img src="{{URL::asset('assets/img/main-logo.jpg')}}"></a>
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="search-keyword">
                            <span><img src="{{URL::asset('assets/img/search-icon.jpg')}}"> 
                                <input type="text" placeholder="Find a user, team, meeting..."></span>
                        </div>
                        <div class="header-right-menu">
                            <ul class="icon-header">
                                <li class="notification">
                                    <a href="#">
                                        <img src="{{ URL::asset('assets/img/notification-icon.jpg')}}"></a> 
                                        <div class="oval">3</div></li>
                                <li>
                                    <a href="#"><img src="{{ URL::asset('assets/img/message-icon.jpg')}}"></a>
                                </li>
                                <li><a href="#"><img src="{{URL::asset('assets/img/play-icon.jpg')}}"></a></li>
                            </ul>
                        </div>
                        <div class="invite-pro-pic">
                            <ul>
                                <li class="invite"><a href="#">INVITE</a></li>
                                <li class="dropdown"><a href="#" class="dropdown-toggle"  data-toggle="dropdown"><img src="{{URL::asset('assets/img/pro-pic.jpg')}}"></a>

                                     <ul class="dropdown-menu">
                                        <li><a href="{{url('admin/logout')}}">Logout</a></li>
                                      </ul>
                                  </li>     

                            </ul>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    <!--header section end-->