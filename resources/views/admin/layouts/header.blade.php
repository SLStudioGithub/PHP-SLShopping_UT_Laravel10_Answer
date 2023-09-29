<nav class="navbar header-navbar pcoded-header">
  <div class="navbar-wrapper">
    <div class="navbar-logo">
      <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
        <img class="img-fluid img-40" src="{{ asset('images/slstudio_logomark_white.svg') }}">
        <span>SLショッピング</span>
      </a>
      <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
        <i class="ti-menu"></i>
      </a>
      <a class="mobile-options waves-effect waves-light">
        <i class="ti-more"></i>
      </a>
    </div>
    <div class="navbar-container container-fluid">
      <ul class="nav-left">
        <li>
          <div class="sidebar_toggle">
            <a href="javascript:void(0)"><i class="ti-menu"></i></a>
          </div>
        </li>
      </ul>
      <ul class="nav-right">
        <li class="user-profile header-notification">
          <a href="#!" class="waves-effect waves-light">
            <span>{{ Auth::user()->name }}</span>
            <i class="ti-angle-down"></i>
          </a>
          <ul class="show-notification profile-notification">
            <li class="waves-effect waves-light">
              <a href="{{ route('admin.detail', ['id' => Auth::user()->id]) }}"><i class="ti-layout-cta-left"></i>詳細</a>
            </li>
            <li class="waves-effect waves-light">
              <a id="logoutLink" href=""><i class="ti-layout-sidebar-left"></i> Logout</a>
            </li>
          </ul>
        </li>
      </ul>
      <form action="{{ route('admin.logout') }}" method="post" hidden="true" name="logoutForm">
        @csrf
        <input type="submit">
      </form>
    </div>
  </div>
</nav>