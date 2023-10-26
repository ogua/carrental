<aside class="main-sidebar elevation-4 sidebar-{{ config('admin.theme.sidebar') }}">

    <a href="{{ admin_url('/') }}" class="brand-link {{ config('admin.theme.logo') ? 'navbar-'.config('admin.theme.logo') : '' }}">
        <img src="{!! config('admin.logo.image') !!}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{!! config('admin.logo.text', config('admin.name')) !!}</span>
    </a>

    <!-- sidebar: style can be found in sidebar.less -->
    <div class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Admin::user()->avatar }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Admin::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/admin" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
    @hasanyrole('User')
        <li class="nav-item">
               <a href="/admin/available-cars" class="nav-link">
                <i class="nav-icon fas fa-bus"></i>
                <p>Cars</p>
            </a>
        </li>

        <li class="nav-item">
               <a href="/admin/available-drivers" class="nav-link">
                <i class="nav-icon fas fa-bus"></i>
                <p>Drivers</p>
            </a>
        </li>

        <li class="nav-item">
           <a href="/admin/my-booking" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>Bookings</p>
          </a>
        </li>

        @endhasanyrole

        @hasanyrole('Administrator')

        {{-- <li class="nav-item">
           <a href="/admin/auth/menu" class="nav-link">
            <i class="nav-icon fas fa-bars"></i>
            <p>Menu</p>
          </a>
        </li> --}}

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-bus" ></i>
                <p>Cars
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                   <a href="/admin/cars" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>All Cars</p>
                  </a>
                </li>

                <li class="nav-item">
                   <a href="/admin/cars-under-maintenance" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Under maintenance</p>
                  </a>
                </li>

                <li class="nav-item">
                   <a href="/admin/cars-unavailable" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Unavailable</p>
                  </a>
                </li>
                
            </ul>
        </li>
        {{-- <li class="nav-item">
           <a href="/admin/cars" class="nav-link">
            <i class="nav-icon fas fa-bus"></i>
            <p>Cars</p>
          </a>
        </li> --}}
        
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-bus" ></i>
                <p>Drivers
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                   <a href="/admin/drivers" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>All Drivers</p>
                  </a>
                </li>

                <li class="nav-item">
                   <a href="/admin/drivers-available" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Drivers available</p>
                  </a>
                </li>

                <li class="nav-item">
                   <a href="/admin/drivers-unavailable" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Drivers Unavailable</p>
                  </a>
                </li>
                
            </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-bus" ></i>
                <p>Accounts
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                   <a href="/admin/online-payments" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>All Transactions</p>
                  </a>
                </li>

                <li class="nav-item">
                   <a href="/admin/online-payments-per-day" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Transactions per day</p>
                  </a>
                </li>

                <li class="nav-item">
                   <a href="/admin/online-payments-per-month" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Transactions per month</p>
                  </a>
                </li>
                
            </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-bus" ></i>
                <p>Bookings
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                   <a href="/admin/bookings" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>All booking</p>
                  </a>
                </li>

                <li class="nav-item">
                   <a href="/admin/booking-cancelled" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>booking Cancel</p>
                  </a>
                </li>

                <li class="nav-item">
                   <a href="/admin/paid-booking" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Paid booking</p>
                  </a>
                </li>

                <li class="nav-item">
                   <a href="/admin/unpaid-booking" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Unpaid booking</p>
                  </a>
                </li>

                <li class="nav-item">
                   <a href="/admin/returned-cars" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Returned Cars</p>
                  </a>
                </li>

                <li class="nav-item">
                   <a href="/admin/overdue-return" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Overdue return</p>
                  </a>
                </li>
                
            </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-bus" ></i>
                <p>Settings
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                   <a href="/admin/roles" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Roles</p>
                  </a>
                </li>

                <li class="nav-item">
                   <a href="/admin/auth/users" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Users</p>
                  </a>
                </li>

                <li class="nav-item">
                   <a href="/admin/auth/admin" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Admin</p>
                  </a>
                </li>                
            </ul>
        </li>

      @endhasanyrole  
</ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
