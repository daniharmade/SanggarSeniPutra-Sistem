<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand" style="font-size: 10px !important">
      <a href="{{ url('/') }}">Sanggar Seni Putra Karuhun</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ url('/') }}">RM</a>
    </div>
    <ul class="sidebar-menu">
      @if (Auth::user()->role == 'USER')

        <li class="menu-header">Dashboard</li>
        <li><a class="nav-link" href="{{ route('user.dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

        <li class="menu-header">Kesenian</li>
        <li class="{{ request()->is('list-kesenian*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('list-kesenian.index') }}">
            <i class="fas fa-door-open"></i> <span>List Kesenian</span>
          </a>
        </li>

        <li class="menu-header">TRANSAKSI</li>
        <li class="{{ request()->is('my-booking-list*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('my-booking-list.index') }}">
            <i class="fas fa-list"></i> <span>My Booking List</span>
          </a>
        </li>

        <li class="menu-header">SETTING</li>
        <li class="{{ request()->is('change-pass*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('user.change-pass.index') }}">
            <i class="fas fa-key"></i> <span>Ganti Password</span>
          </a>
        </li>

      @endif

      @if (Auth::user()->role == 'ADMIN')

        <li class="menu-header">Dashboard</li>
        <li><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

        <li class="menu-header">DATA MASTER</li>
        {{-- <li class="{{ request()->is('admin/room*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('room.index') }}">
            <i class="fas fa-door-open"></i> <span>Ruangan</span>
          </a>
        </li> --}}
        <li class="{{ request()->is('admin/kesenian*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('kesenian.index') }}">
            <i class="fas fa-door-open"></i> <span>Kesenian</span>
          </a>
        </li>
        <li class="{{ request()->is('admin/user*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fas fa-user"></i> <span>User</span>
          </a>
        </li>

        <li class="menu-header">TRANSAKSI</li>
        <li class="{{ request()->is('admin/booking-list*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('booking-list.index') }}">
            @inject('booking_list', 'App\Models\BookingList')
            <i class="fas fa-list"></i> <span> Booking List</span>
          </a>
        </li>

        {{-- <li class="{{ request()->is('admin/sjf-schedule*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('sjfSchedule.index') }}">
            @inject('booking_list', 'App\Models\BookingList')
            <i class="fas fa-list"></i> <span> SJF Schedule</span>
          </a>
        </li> --}}

        <li class="menu-header">SETTING</li>
        <li class="{{ request()->is('admin/change-pass*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('admin.change-pass.index') }}">
            <i class="fas fa-key"></i> <span>Ganti Password</span>
          </a>
        </li>

      @endif

      </ul>

  </aside>
</div>