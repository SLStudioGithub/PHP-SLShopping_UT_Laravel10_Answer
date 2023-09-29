<nav class="pcoded-navbar">
  <div class="pcoded-inner-navbar main-menu">
    <div>
      <div class="main-menu-header">
        <div class="user-details">
          <span id="more-details">{{ Auth::user()->name }}</span>
        </div>
      </div>
    </div>
    <div class="pcoded-navigation-label">Home</div>
    <ul class="pcoded-item pcoded-left-item">
      <li>
        <a href="{{ route('admin.dashboard') }}" class="waves-effect waves-dark">
          <span class="pcoded-micon"><i class="ti-home"></i></span><span class="pcoded-mtext">HOME</span>
          <span class="pcoded-mcaret"></span>
        </a>
      </li>
    </ul>
    <div class="pcoded-navigation-label">管理者</div>
    <ul class="pcoded-item pcoded-left-item">
      <li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
          <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
          <span class="pcoded-mtext">管理者</span>
          <span class="pcoded-mcaret"></span>
        </a>
        <ul class="pcoded-submenu">
          <li>
            <a href="{{ route('admin.index') }}" class="waves-effect waves-dark">
              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
              <span class="pcoded-mtext">一覧</span>
              <span class="pcoded-mcaret"></span>
            </a>
          </li>
          <li>
            <a href="{{ route('admin.createView') }}" class="waves-effect waves-dark">
              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
              <span class="pcoded-mtext">新規作成</span>
              <span class="pcoded-mcaret"></span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
    <div class="pcoded-navigation-label">商品</div>
    <ul class="pcoded-item pcoded-left-item">
      <li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
          <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
          <span class="pcoded-mtext">商品</span>
          <span class="pcoded-mcaret"></span>
        </a>
        <ul class="pcoded-submenu">
          <li>
            <a href="{{ route('admin.items.index') }}" class="waves-effect waves-dark">
              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
              <span class="pcoded-mtext">一覧</span>
              <span class="pcoded-mcaret"></span>
            </a>
          </li>
          <li>
            <a href="{{ route('admin.items.createView') }}" class="waves-effect waves-dark">
              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
              <span class="pcoded-mtext">新規作成</span>
              <span class="pcoded-mcaret"></span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
    <div class="pcoded-navigation-label">ブランド</div>
    <ul class="pcoded-item pcoded-left-item">
      <li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
          <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
          <span class="pcoded-mtext">ブランド</span>
          <span class="pcoded-mcaret"></span>
        </a>
        <ul class="pcoded-submenu">
          <li>
            <a href="{{ route('admin.brands.index') }}" class="waves-effect waves-dark">
              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
              <span class="pcoded-mtext">一覧</span>
              <span class="pcoded-mcaret"></span>
            </a>
          </li>
          <li>
            <a href="{{ route('admin.brands.createView') }}" class="waves-effect waves-dark">
              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
              <span class="pcoded-mtext">新規作成</span>
              <span class="pcoded-mcaret"></span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
    <div class="pcoded-navigation-label">カテゴリー</div>
    <ul class="pcoded-item pcoded-left-item">
      <li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
          <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
          <span class="pcoded-mtext">カテゴリー</span>
          <span class="pcoded-mcaret"></span>
        </a>
        <ul class="pcoded-submenu">
          <li>
            <a href="{{ route('admin.categories.index') }}" class="waves-effect waves-dark">
              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
              <span class="pcoded-mtext">一覧</span>
              <span class="pcoded-mcaret"></span>
            </a>
          </li>
          <li>
            <a href="{{ route('admin.categories.createView') }}" class="waves-effect waves-dark">
              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
              <span class="pcoded-mtext">新規作成</span>
              <span class="pcoded-mcaret"></span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>