<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="<%= root_url %>" class="site_title text-center" data-no-turbolink><i class="fa fa-paw"></i> <span>Munia</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile">
      <div class="profile_pic">
        <img src="/img/user.png" alt="..." class="img-circle profile_img" width="57" height="57">
      </div>
      <div class="profile_info">
        <span>Welcome,</span>
        <h2>John Connor</h2>
      </div>
      <div class="clearfix"></div>
    </div>
    <!-- /menu profile quick info -->
    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <ul class="nav side-menu">
          <li data="dashboard"><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i> Tổng quan </a></li>
          <li data="employees"><a><i class="fa fa-user"></i> Nhân viên <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ url('/employees') }}">Danh sách nhân viên</a></li>
              <li><a href="{{ url('/employees/create') }}">Thêm nhân viên</a></li>
              <li><a href="/admin/tags">Lịch làm việc</a></li>
            </ul>
          </li>
          <li data="users"><a><i class="fa fa-user"></i> Đặt chỗ <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="/admin/users">Danh sách bàn</a></li>
            </ul>
          </li>
        </ul>
      </div>

    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="" data-original-title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div>
    <!-- /menu footer buttons -->

  </div>
</div>