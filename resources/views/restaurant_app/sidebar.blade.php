<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border-bottom: 1px solid #536271;">
      <a href="<%= root_url %>" class="site_title text-center" data-no-turbolink><i class="fa fa-paw"></i> <span>Yum Yum</span></a>
    </div>

    <div class="clearfix"></div>
    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <ul class="nav side-menu">
          <li data="dashboard"><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i> Tổng quan </a></li>
          <li data="restaurants"><a><i class="fa fa-sitemap"></i> Chuỗi nhà hàng <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ route('restaurants.index', [session('workspace')->url]) }}">Danh sách nhà hàng</a></li>
              <li><a href="{{ route('restaurants.create', [session('workspace')->url]) }}">Thêm mới</a></li>
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