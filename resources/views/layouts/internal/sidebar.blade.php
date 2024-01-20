<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  

    <a href="/dashboard" class="app-brand-link">
        <span class="app-brand-logo demo">

        <img src="../../../../../../../../../../images/PIKES-logo.png" alt="PIKES Logo" width="75" height="75">

        </span>

    </a>

    <!-- <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a> -->




<ul class="menu-inner py-1">
<!-- Dashboards -->
<li class="menu-item  {{'dashboard' == request()->path() ? 'active': ''}}">
  <a href="{{route('admin.dashboard')}}" class="menu-link menu-link">
    <i class="menu-icon tf-icons bx bx-home-circle"></i>
    <div class="text-truncate" data-i18n="Dashboard">Dashboard</div>
  </a>
</li>

<li class="menu-item">
  <a href="/chatify" class="menu-link">
    <i class="menu-icon tf-icons bx bx-chat"></i>
    <div class="text-truncate" data-i18n="Chat">Chat</div>
  </a>
</li>


<!-- Apps & Pages -->
<li class="menu-header small text-uppercase">
  <span class="menu-header-text" data-i18n="Customer Related">Tables &amp; Pages</span>
</li>


        <li class="{{ Request::is('admin/orders*') ? 'menu-item open active' : 'menu-item' }}">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-shopping-bag"></i>
            <div class="text-truncate" data-i18n="Orders">Orders</div>
          </a>
          <ul class="menu-sub">
            <li class="menu-item {{'admin/orders' == request()->path() ? 'active': ''}}">
              <a href="{{route('orders.index')}}" class="menu-link">
                <div class="text-truncate" data-i18n="Order List">Order List</div>
              </a>
            </li>
          </ul>
        </li>

        <li class="{{ Request::is('admin/customers*') ? 'menu-item open active' : 'menu-item' }}">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-group"></i>
            <div class="text-truncate" data-i18n="Customers">Customers</div>
          </a>
          <ul class="menu-sub">
            <li class="menu-item {{'admin/customers' == request()->path() ? 'active': ''}}">
              <a href="{{route('customers.index')}}" class="menu-link">
                <div class="text-truncate" data-i18n="Customer List">Customer List</div>
              </a>
            </li>

            <!-- <li class="menu-item {{'admin/customers/create' == request()->path() ? 'active': ''}}">
              <a href="{{route('customers.create')}}" class="menu-link">
                <div class="text-truncate" data-i18n="Add Customer">Add Customer</div>
              </a>
            </li> -->

          </ul>
        </li>

        <li class="{{ Request::is('admin/deceased*') ? 'menu-item open active' : 'menu-item' }}">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-bible"></i>
            <div class="text-truncate" data-i18n="Deceased">Deceased</div>
          </a>
          <ul class="menu-sub">
            <li class="menu-item {{'admin/deceased' == request()->path() ? 'active': ''}}">
              <a href="{{route('deceased.index')}}" class="menu-link">
                <div class="text-truncate" data-i18n="Deceased List">Deceased List</div>
              </a>
            </li>
            <!-- <li class="menu-item {{'admin/packages/create' == request()->path() ? 'active': ''}}">
              <a href="{{route('packages.create')}}" class="menu-link">
                <div class="text-truncate" data-i18n="Add Deceased">Add Package</div>
              </a>
            </li> -->
          </ul>
        </li>

<li class="menu-header small text-uppercase">
  <span class="menu-header-text" data-i18n="Employee Related"></span>
</li>


        <li class="{{ Request::is('admin/products*', 'admin/products/create*') ? 'menu-item open active' : 'menu-item' }}">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-cart-alt"></i>
            <div class="text-truncate" data-i18n="Products">Products</div>
          </a>
          <ul class="menu-sub">
            <li class="menu-item {{'admin/products' == request()->path() ? 'active': ''}}">
              <a href="{{route('products.index')}}" class="menu-link">
                <div class="text-truncate" data-i18n="Product List">Product List</div>
              </a>
            </li>
            <li class="menu-item {{'admin/products/create' == request()->path() ? 'active': ''}}">
              <a href="{{route('products.create')}}" class="menu-link">
                <div class="text-truncate" data-i18n="Add Product">Add Product</div>
              </a>
            </li>
          </ul>
        </li>

        <li class="{{ Request::is('admin/packages*', 'admin/packages/create*') ? 'menu-item open active' : 'menu-item' }}">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-package"></i>
            <div class="text-truncate" data-i18n="Packages">Packages</div>
          </a>
          <ul class="menu-sub">
            <li class="menu-item {{'admin/packages' == request()->path() ? 'active': ''}}">
              <a href="{{route('packages.index')}}" class="menu-link">
                <div class="text-truncate" data-i18n="Package List">Package List</div>
              </a>
            </li>
            <li class="menu-item {{'admin/packages/create' == request()->path() ? 'active': ''}}">
              <a href="{{route('packages.create')}}" class="menu-link">
                <div class="text-truncate" data-i18n="Add Package">Add Package</div>
              </a>
            </li>
          </ul>
        </li>

        <li class="{{ Request::is('admin/services*', 'admin/services/create*') ? 'menu-item open active' : 'menu-item' }}">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-donate-heart"></i>
            <div class="text-truncate" data-i18n="Services">Services</div>
          </a>
          <ul class="menu-sub">
            <li class="menu-item {{'admin/services' == request()->path() ? 'active': ''}}">
              <a href="{{route('services.index')}}" class="menu-link">
                <div class="text-truncate" data-i18n="Service List">Service List</div>
              </a>
            </li>
            <li class="menu-item {{'admin/services/create' == request()->path() ? 'active': ''}}">
              <a href="{{route('services.create')}}" class="menu-link">
                <div class="text-truncate" data-i18n="Add Service">Add Service</div>
              </a>
            </li>
          </ul>
        </li>

<li class="menu-header small text-uppercase">
  <span class="menu-header-text" data-i18n="Admin Related"></span>
</li>

        <li class="{{ Request::is('admin/notifications*', 'admin/notifications/create*') ? 'menu-item open active' : 'menu-item' }}">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-bell"></i>
            <div class="text-truncate" data-i18n="Notifications">Notifications</div>
          </a>
          <ul class="menu-sub">
            <li class="menu-item {{'admin/notifications' == request()->path() ? 'active': ''}}">
              <a href="{{route('notifications.index')}}" class="menu-link">
                <div class="text-truncate" data-i18n="Notification List">Notification List</div>
              </a>
            </li>
            <li class="menu-item {{'admin/notifications/create' == request()->path() ? 'active': ''}}">
              <a href="{{route('notifications.create')}}" class="menu-link">
                <div class="text-truncate" data-i18n="Add Notification">Add Notification</div>
              </a>
            </li>
          </ul>
        </li>

        <li class="{{ Request::is('admin/announcements*', 'admin/announcements/create*') ? 'menu-item open active' : 'menu-item' }}">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-volume-full"></i>
            <div class="text-truncate" data-i18n="Announcements">Announcements</div>
          </a>
          <ul class="menu-sub">
            <li class="menu-item {{'admin/announcements' == request()->path() ? 'active': ''}}">
              <a href="{{route('announcements.index')}}" class="menu-link">
                <div class="text-truncate" data-i18n="Announcement List">Announcement List</div>
              </a>
            </li>
            <li class="menu-item {{'admin/announcements/create' == request()->path() ? 'active': ''}}">
              <a href="{{route('announcements.create')}}" class="menu-link">
                <div class="text-truncate" data-i18n="Add Announcement">Add Announcement</div>
              </a>
            </li>
          </ul>
        </li>
    

        <li class="{{ Request::is('admin/employees*') ? 'menu-item open active' : 'menu-item' }}">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-hard-hat"></i>
            <div class="text-truncate" data-i18n="Employees">Employees</div>
          </a>
          <ul class="menu-sub">
            <li class="menu-item {{'admin/employees' == request()->path() ? 'active': ''}}">
              <a href="{{route('employees.index')}}" class="menu-link">
                <div class="text-truncate" data-i18n="Employee List">Employee List</div>
              </a>
            </li>

            <li class="menu-item {{'admin/employees/create' == request()->path() ? 'active': ''}}">
              <a href="{{route('employees.create')}}" class="menu-link">
                <div class="text-truncate" data-i18n="Add Employee">Add Employee</div>
              </a>
            </li>

          </ul>
        </li>

        <li class="{{ Request::is('admin/users*') ? 'menu-item open active' : 'menu-item' }}">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div class="text-truncate" data-i18n="Users">Employees</div>
          </a>
          <ul class="menu-sub">
            <li class="menu-item {{'admin/users' == request()->path() ? 'active': ''}}">
              <a href="{{route('users.index')}}" class="menu-link">
                <div class="text-truncate" data-i18n="Users List">Users List</div>
              </a>
            </li>

          </ul>
        </li>

<!-- Charts & Maps -->
<li class="menu-header small text-uppercase">
<span class="menu-header-text" data-i18n="Charts & Maps">Charts &amp; Maps</span>
</li>

<li class="menu-item">
  <a href="javascript:void(0);" class="menu-link">
    <i class="menu-icon tf-icons bx bx-chart"></i>
    <div class="text-truncate" data-i18n="Charts">Charts</div>
  </a>
</li>


<li class="menu-item">
  <form method="POST" action="{{ route('logout') }}">
      @csrf
      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
          <i class="bx bx-power-off me-2"></i>
          <span class="align-middle">Log Out</span>
      </a>
  </form>
</li>

</aside>
<!-- / Menu -->