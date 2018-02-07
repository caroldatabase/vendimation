<<<<<<< HEAD
<!--header section start-->
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-2 text-center main-logo">
                        <div class="logo">
                            <a href="{{url('admin')}}"><img src="{{URL::asset('assets/img/main-logo.jpg')}}"></a>
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
                                <li class="dropdown">
                                <a href="#" class="dropdown-toggle"  data-toggle="dropdown">
                                    @if(file_exists($user->profile_image))
                                    <img src="{{ url($user->profile_image)}}" width="35px">
                                    @else
                                    <img src="{{ asset('assets/img/user1.png')}}" width="35px">
                                    @endif
                                      <img src="{{ asset('assets/img/down-arrow.png')}}" width="35px">
                                </a>

                                 <ul class="dropdown-menu" style="right:0; left: auto;">
                                     <li style="width: 100%"><a href="{{url('admin/account/profile')}}">Profile</a></li>
                                     <li style="width: 100%""><a href="{{url('admin/account/billing')}}">Billing</a></li>
                                     <li style="width: 100%""><a href="{{url('admin/account/add-excel')}}">Add Contacts</a></li>
                                    <li style="width: 100%""><a href="{{url('admin/logout')}}">Logout</a></li>
                                  </ul>
                              </li>     

                            </ul>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    <!--header section end-->
=======
  <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="{{url('admin')}}" style="
    margin-top: 25px;
    font-size: 20px;
    color: yellow;
">
                       <!--  <img src="http://webpedialab.com/ytasker/public/in/layouts/layout4/img/new-logo.jpg" alt="logo" class="logo-default"  style="width: 170px" />  -->
                           
                           Admin
                       </a>
                    <div class="menu-toggler sidebar-toggler">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN PAGE ACTIONS -->
                <!-- DOC: Remove "hide" class to enable the page header actions -->
                <div class="page-actions">
                    <div class="btn-group">
                        <button type="button" class="btn red-haze btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span class="hidden-sm hidden-xs">Actions&nbsp;</span>
                            <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('user')}}">
                                    <i class="icon-user"></i> View Users </a>
                            </li>
                            
                            
                        </ul>
                    </div>
                </div>
                <!-- END PAGE ACTIONS -->
                <!-- BEGIN PAGE TOP -->
                <div class="page-top">
                    <!-- BEGIN HEADER SEARCH BOX -->
                    <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                    <form class="search-form" action="page_general_search_2.html" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control input-sm" placeholder="Search..." name="query">
                            <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>
                        </div>
                    </form>
                    <!-- END HEADER SEARCH BOX -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="separator hide"> </li>
                           
                            
                            <!-- BEGIN INBOX DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            
                            
                            <!-- END TODO DROPDOWN -->
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user dropdown-dark">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <span class="username username-hide-on-mobile"> Admin </span>
                                    <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                                    <img alt="" class="img-circle" src="{{URL::asset('assets/layouts/layout4/img/avatar9.jpg') }}" /> </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="{{ url('admin/profile') }}">
                                            <i class="icon-user"></i> My Profile </a>
                                    </li>
                                    
                                    <li class="divider"> </li>
                                   <!--  <li>
                                        <a href="#">
                                            <i class="icon-lock"></i> Lock Screen </a>
                                    </li> -->
                                    <li>
                                        <a href="{{ url('admin/logout') }}">
                                            <i class="icon-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                             
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END PAGE TOP -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
