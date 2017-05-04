<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>
      @if(getWorkspaceAdmin()->restaurantAdmin())
        <h4 class="pull-left" style="padding-top: 10px">{{ getWorkspaceAdmin()->restaurant->name }}</h4>
      @endif
      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="/img/user.png" alt="">
            {{ getWorkspaceAdmin()->username }}
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            {{-- <li><a href="#"> Profile</a></li> --}}
            <li><a href="#" onclick="
                    event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out pull-right"></i> Log Out</a>
                <form id="logout-form" action="{{ route('workspace.logout',[ session('workspace')->url ]) }}" method="POST" style="display: none;">
                    {!! csrf_field() !!}
                </form>
            </li>
          </ul>
        </li>
        @if(getWorkspaceAdmin()->restaurantAdmin())
          <li role="presentation" class="dropdown notify">
            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="true">
              <i class="fa fa-envelope-o"></i>
              @if(session('order_not_proccessed') > 0)
                <span class="badge bg-green">{{ session('order_not_proccessed') }}</span>
              @endif
            </a>
            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
              <li>
                <a>
                  <span class="image"><img src="/img/user.png"></span>
                  <span>
                    <span>Hệ thống</span>
                    <span class="time">3 phút trước</span>
                  </span>
                  <span class="message">
                    Bạn có <strong>{{ session('order_not_proccessed') }}</strong> đơn hàng chưa xử lý.
                  </span>
                </a>
              </li>
              <li>
                <div class="text-center">
                  <a>
                    <strong>See All Alerts</strong>
                    <i class="fa fa-angle-right"></i>
                  </a>
                </div>
              </li>
            </ul>
          </li>
        @endif
      </ul>
    </nav>
  </div>
</div>