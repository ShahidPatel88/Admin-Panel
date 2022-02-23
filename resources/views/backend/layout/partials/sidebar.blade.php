<nav class="sidebar">
  <div class="sidebar-header">
    <!-- <a href="#" class="sidebar-brand">
      Lead<span>Kastle</span>
    </a> -->
    <a href="#" class="sidebar-brand">
      <img src="{{ asset('public/assets/images/logo.svg') }}" width="150px">
    </a>

    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item @if (Route::currentRouteName() == 'admin.dashboard') active @endif">
        <a href="{{ route('admin.dashboard') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item nav-category">Tally</li>
      <li class="nav-item @if (Route::currentRouteName() == 'admin.getGroupItems') active @endif">
        <a href="{{ route('admin.getGroupItems') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Add Group & Items</span>
        </a>
      </li>
      <li class="nav-item @if (Route::currentRouteName() == 'admin.getLedgerAccountLists') active @endif">
        <a href="{{ route('admin.getLedgerAccountLists') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Get Ledger Account</span>
        </a>
      </li>
      <li class="nav-item @if (Route::currentRouteName() == 'admin.getLedgerAccount') active @endif">
        <a href="{{ route('admin.getLedgerAccount') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Add Ledger Account</span>
        </a>
      </li>


      <li class="nav-item nav-category">Settings</li>
        <li class="nav-item @if (Route::currentRouteName() == 'admin.email-template') active @endif">
            <a href="{{route('admin.email-template')}}" class="nav-link">
                <i class="link-icon" data-feather="users"></i>
                <span class="link-title">Email Templates</span>
            </a>
        </li>
        <li class="nav-item @if (Route::currentRouteName() == 'admin.site-configuration') active @endif">
            <a href="{{ route('admin.site-configuration') }}" class="nav-link">
                <i class="link-icon" data-feather="thumbs-up"></i>
                <span class="link-title">Configuration</span>
            </a>
        </li>

        <li class="nav-item nav-category">Manage Profile</li>
        <li class="nav-item @if (Route::currentRouteName() == '#') active @endif">
                <a href="#" class="nav-link">
                    <i class="link-icon" data-feather="edit-2"></i>
                    <span class="link-title">Edit Profile</span>
                </a>
        </li>


    </ul>
  </div>
</nav>
