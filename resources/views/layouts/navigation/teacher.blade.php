<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand justify-content-center">
    <div class="brand-logo" style="width: 70px; height: 70px;"></div>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
  <li class="menu-header small text-uppercase"><span class="menu-header-text">Dashboard</span></li>
    <!-- Dashboard -->
    <!-- :href="route('teacher.timetable')" :active="request()->routeIs('teacher.timetable')" -->
    <li class="menu-item {{ request()->routeIs('teacher.timetable') ? 'active' : '' }}">
      <a href="{{ route('teacher.timetable') }}" class="menu-link">
        <!-- <i class="menu-icon tf-icons bx bx-home-circle"></i> -->
        <div data-i18n="Analytics">Home</div>
      </a>
    </li>

    <li class="menu-item {{ request()->is('teacher/task') ? 'active' : (request()->is('teacher/task/*') ? 'active' : '') }}">
      <a href="{{ route('teacher.task') }}" class="menu-link">
        <!-- <i class="menu-icon tf-icons bx bx-home-circle"></i> -->
        <div data-i18n="Analytics">Tes</div>
      </a>
    </li>
  </ul>
</aside>