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
                                <li class="invite"><a href="javascript::void(0)" data-toggle="modal" data-target="#inviteModal">INVITE</a></li>
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
                                     <li style="width: 100%"><a href="{{url('admin/account/billing')}}">Billing</a></li>
                                     <li style="width: 100%"><a href="{{url('admin/drag-excel')}}">Add Contacts</a></li>
                                    <li style="width: 100%"><a href="{{url('admin/logout')}}">Logout</a></li>
                                  </ul>
                              </li>     

                            </ul>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    <!--header section end-->

    <div class="modal fade" id="inviteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Invite User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="invite_user" method="post" onsubmit="return false">
      <div class="modal-body">
        <label>Email Address</label>
        <input type="email" required="" class="form-control" name="email" placeholder="Enter Email Address">
        <input type="hidden"  name="userId" value="{{$user->id}}">
        <span id="inviteError"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="inviteBtn">Invite</button>
      </div>
      </form>
    </div>
  </div>
</div>