<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
        <a href="index.html">
            <h5 class="logo-text">SEJAHTERA ADMIN</h5>
        </a>
    </div>

    <ul class="sidebar-menu do-nicescrol">
        <li class="sidebar-header">MAIN NAVIGATION</li>

        {{-- ================= SUPER ADMIN (SEMUA MENU MUNCUL) ================= --}}
        @if(Auth::user()->role == 'super_admin')

            <li class="{{ Request::is('adminpanel*') ? 'active' : '' }}">
                <a href="/adminpanel">
                    <i class="zmdi zmdi-view-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="{{ Request::is('user*') ? 'active' : '' }}">
                <a href="/user">
                    <i class="zmdi zmdi-accounts"></i>
                    <span>User</span>
                </a>
            </li>

            <li class="{{ Request::is('product*') ? 'active' : '' }}">
                <a href="/product">
                    <i class="zmdi zmdi-format-list-bulleted"></i>
                    <span>Product</span>
                </a>
            </li>

            <li class="{{ Request::is('order*') ? 'active' : '' }}">
                <a href="/order">
                    <i class="zmdi zmdi-shopping-cart"></i>
                    <span>Order</span>
                </a>
            </li>

            <li class="sidebar-header">LAPORAN</li>

            <li class="{{ Request::is('report/today') ? 'active' : '' }}">
                <a href="/report/today">
                    <i class="zmdi zmdi-info-outline text-info"></i>
                    <span>Information</span>
                </a>
            </li>

        {{-- ================= ADMIN (Dashboard + Order saja) ================= --}}
        @elseif(Auth::user()->role == 'admin')

            <li class="{{ Request::is('adminpanel*') ? 'active' : '' }}">
                <a href="/adminpanel">
                    <i class="zmdi zmdi-view-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="{{ Request::is('order*') ? 'active' : '' }}">
                <a href="/order">
                    <i class="zmdi zmdi-shopping-cart"></i>
                    <span>Order</span>
                </a>
            </li>

        @endif
    </ul>
</div>