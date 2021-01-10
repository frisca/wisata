<!-- fixed-top-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
  <div class="navbar-wrapper">
    <div class="navbar-container content">
      <div class="collapse navbar-collapse show" id="navbar-mobile">
        <ul class="nav navbar-nav mr-auto float-left">
          <li class="nav-item d-block d-md-none">
            <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a>
          </li>
        </ul>
        <ul class="nav navbar-nav float-right">
          <!-- <li class="dropdown dropdown-notification nav-item">
            <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-mail">             </i></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="arrow_box_right">
                <a class="dropdown-item" href="#"><i class="ft-book"></i> Read Mail</a>
                <a class="dropdown-item" href="#"><i class="ft-bookmark"></i> Read Later</a>
                <a class="dropdown-item" href="#"><i class="ft-check-square"></i> Mark all Read       </a>
              </div>
            </div>
          </li> -->
          <li class="dropdown dropdown-user nav-item">
            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">             
              <span class="avatar">
                <img src="{{ asset('theme-assets/images/portrait/small/avatar-s-27.png') }}" alt="avatar"><i></i>
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="arrow_box_right">
                <a class="dropdown-item" href="#">
                  <span class="avatar">
                    <img src="{{ asset('theme-assets/images/portrait/small/avatar-s-27.png')}}" alt="avatar">
                    <span class="user-name text-bold-700 ml-1">{{ auth()->user()->name }}</span>
                  </span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="ft-user"></i> Ubah Profile</a>
                <a class="dropdown-item" href="#"><i class="ft-message-square"></i> Oborolan</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ URL('logout') }}"><i class="ft-power"></i> Logout</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>