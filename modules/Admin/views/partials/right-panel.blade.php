    
<style type="text/css">
.See-All {
  width: 49px;
  height: 19px;
  font-family: Muli;
  font-size: 14.5px;
  font-weight: 800;
  font-style: normal;
  font-stretch: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: left;
  float: right;
  color: #00a5ec;
}
.arrow_forward---material {
  width: 17.7px;
  height: 9.7px;
  background-color: #00a5ec;
}
.Worth54350 {
  width: 151px;
  height: 20px;
  font-family: Muli;
  font-size: 16px;
  font-weight: 600;
  font-style: normal;
  font-stretch: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: left;
  color: #474d60;
}
</style>
<div class="col-sm-10 main-left-content">

    <div class="shadow-up"></div>
    <div class="my-funnel">
        <div class="row">
            <div class="col-sm-12">
                <h1>My Funnels</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <span class="See-All"> <a href="#"> See All </a> </span> 
                <i class=" arrow_forward---material"></i> 
            </div>
            @for($i=1;$i<=3;$i++)
            <div class="col-sm-4">
                <div class="bar-chart">
                    <h4>My Oil & Gas Funnel  <span><i class="fa fa-ellipsis-h" aria-hidden="true"></i></span></h4>
                    <p>Contact <span>{{$contact_count or 0}}</span></p>
                    <p>Notification <span>{{$notification_count or 0}}</span></p>
                    <p>Closed Deals   <span> {{$close_deals or 0 }}</span></p>
                    <div id="chart">  
                        <ul id="bars">
                        <li><div data-percentage="35" class="bar" id="first-oil"></div><span>08</span></li>
                        <li><div data-percentage="100" class="bar" id="second-oil"></div><span>26</span></li>
                        <li><div data-percentage="56" class="bar" id="third-oil"></div><span>08</span></li>
                        <li><div data-percentage="80" class="bar" id="fourth-oil"></div><span>20</span></li>
                        <li><div data-percentage="35" class="bar" id="fifth-oil"></div><span>08</span></li>
                        <li><div data-percentage="20" class="bar" id="sixth-oil"></div><span>04</span>
                        <li><div data-percentage="40" class="bar" id="seventh-oil"></div><span>16</span>
                        </li>
                        </ul>
                        <p class="status-para">Status will be based on highest percentage bar</p>
                    </div>
                </div>
            </div>
            @endfor
           
        </div>
    </div>
    
    <div class="my-team">
        <div class="row">
            <div class="col-sm-12">
                <h1>My Team</h1>
            </div>
        </div>
        <div class="row">
             <div class="col-sm-12">
                <span class="See-All"> See All </span> 
                <span class=" arrow_forward---material"> </span> 
            </div>
            <div class="col-sm-4">
                <div class="team-block">
                    <div class="profile-desc">
                        <div class="team-pic-pro">
                            <img src="{{asset('assets/img/team-pic.png')}}">
                        </div>
                        <div class="team-desc">
                            <h4>Semuel Spencer</h4>
                            <p class="team-email">sasp@egament.com</p>
                            <span class="team-designation">Creative Director</span>
                        </div>
                     </div>
                    <div class="team-deals">
                        <div class="closed-deals">
                            <p>Closed Deals</p>
                            <span>03</span>
                        </div>
                        <div class="reject-deals">
                            <p>Reject Deals</p>
                            <span><div class="dot-red"></div> 02</span>
                        </div>
                    </div>
                    <div class="area-chart">
                        <p>Overall activity</p>
                         <div class="box-body">
                            <div id="interactive" style="height: 200px;"></div>
                        </div>
                    </div>  
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-block">
                    <div class="profile-desc">
                        <div class="team-pic-pro">
                            <img src="{{asset('assets/img/team-pic.png')}}">
                        </div>
                        <div class="team-desc">
                            <h4>Semuel Spencer</h4>
                            <p class="team-email">sasp@egament.com</p>
                            <span class="team-designation">Creative Director</span>
                        </div>
                     </div>
                    <div class="team-deals">
                        <div class="closed-deals">
                            <p>Closed Deals</p>
                            <span>03</span>
                        </div>
                        <div class="reject-deals">
                            <p>Reject Deals</p>
                            <span><div class="dot-red"></div> 02</span>
                        </div>
                    </div>
                    <div class="area-chart">
                        <p>Overall activity</p>
                         <div class="box-body">
                            <div id="interactive2" style="height: 200px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-block">
                    <div class="profile-desc">
                        <div class="team-pic-pro">
                            <img src="{{asset('assets/img/team-pic.png')}}">
                        </div>
                        <div class="team-desc">
                            <h4>Semuel Spencer</h4>
                            <p class="team-email">sasp@egament.com</p>
                            <span class="team-designation">Creative Director</span>
                        </div>
                     </div>
                    <div class="team-deals">
                        <div class="closed-deals">
                            <p>Closed Deals</p>
                            <span>03</span>
                        </div>
                        <div class="reject-deals">
                            <p>Reject Deals</p>
                            <span><div class="dot-red"></div> 02</span>
                        </div>
                    </div>
                    <div class="area-chart">
                        <p>Overall activity</p>
                        <div class="box-body">
                            <div id="interactive3" style="height: 200px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="my-co-ag">
        <div class="row-mca">
            <div class="col-sm-4">
                <div class="my-contact-head">
                    <h1>My Contacts   <span class="See-All" style="margin: 10px"> <a href="#"> See All</a></span></h1>
                    
                </div>
            
                <div class="contact-list">
                    <div class="contact-search">
                        <span><img src="{{asset('assets/img/search-btn.jpg')}}"> 
                            <input type="text" placeholder="Search in your contact"></span>
                    </div>

                    @foreach($contactGroup as $key => $result)
                    <div class="user-list-contact">
                        <div class="user-pic-cont">
                            <img src="{{asset('assets/img/team-pic.png')}}" height="44px;">
                        </div>
                        <div class="user-desc-cont">
                            <h5>{{$result->groupName}}</h5>
                            <p><span>Shell</span> <span>#oil&gas</span></p>
                            <span class="plus-circle"><a href="#">
                                <img src="{{asset('assets/img/plus-icon.jpg')}}"></a></span>
                        </div>
                    </div>
                    @endforeach
                    
                    <div class="see-all-contact">
                        <p><img src="{{asset('assets/img/see-all.jpg')}}"> <span class="see-all-para">SEE ALL {{$contact_count}}</span> <span class="people-para">people in your contact</span></p>
                    </div>
                    
                </div>
            </div>
            
            <div class="col-sm-8">
                <div class="my-contact-head">
                    <h1>My Agenda</h1>
                </div>
                <div class="calendar-meet">
                    <div class="calendar-block">
                        <div id="calendar">
                            <div id="calendar_header"><i class="icon-chevron-left fa fa-angle-left"></i>
                            <h1></h1><i class="icon-chevron-right fa fa-angle-right"></i></div>
                            <div id="calendar_weekdays"></div>
                            <div id="calendar_content"></div>
                          </div>
                    </div>
                    
                    <div class="today-meeting">
                    <p class="today-meeting-head">
                        <span>TODAY'S MEETING</span> <a href="#">ADD EVENT</a>
                    </p>
                    <div class="step-meeting">
                        <img src="{{asset('assets/img/step-bullet.jpg')}}">
                    </div>
                    <div class="slide-meeting">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
   

    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">

                    <div class="item active">
                        <h4>App revamp discussion</h4>
                        <p>Sat Mar 23, 2017, 04pm-05pm (IST)</p>
                        <div class="map-meeting">
                        <img src="{{asset('assets/img/map.jpg')}}">
                        </div>
                        <div class="la-am-es">
                        <img src="{{asset('assets/img/dummy-image.jpg')}}">
                        </div>
                    </div>

                  <div class="item">
                    <h4>App revamp discussion</h4>
                        <p>Sat Mar 23, 2017, 04pm-05pm (IST)</p>
                        <div class="map-meeting">
                        <img src="{{asset('assets/img/map.jpg')}}">
                        </div>
                        <div class="la-am-es">
                        <img src="{{asset('assets/img/dummy-image.jpg')}}">
                        </div>
                </div>
    
                <div class="item">
                <h4>App revamp discussion</h4>
                    <p>Sat Mar 23, 2017, 04pm-05pm (IST)</p>
                    <div class="map-meeting">
                        <img src="{{asset('assets/img/map.jpg')}}">
                    </div>
                    <div class="la-am-es">
                        <img src="{{asset('assets/img/dummy-image.jpg')}}">
                    </div>
                </div>

                <div class="item">
                    <h4>App revamp discussion</h4>
                        <p>Sat Mar 23, 2017, 04pm-05pm (IST)</p>
                        <div class="map-meeting">
                        <img src="{{asset('assets/img/map.jpg')}}"> 
                        </div>
                        <div class="la-am-es">
                        <img src="{{asset('assets/img/dummy-image.jpg')}}">
                        </div>
                </div>
            </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                                                
            </div>
                                            
                                            
                                            <div class="reminder-btn">
                                                <a href="#" style="float:right">Set Reminder</a>
                                            </div>
                                        </div>
                </div>
            </div>
            
        </div>
    </div>
</div>