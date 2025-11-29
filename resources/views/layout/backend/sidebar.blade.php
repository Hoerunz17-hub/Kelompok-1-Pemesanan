<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
        <a href="index.html">
            <img src="{{ asset('assetsbackend/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
            <h5 class="logo-text">SEJAHTERA ADMIN</h5>
        </a>
    </div>
    <ul class="sidebar-menu do-nicescrol">
        <li class="sidebar-header">MAIN NAVIGATION</li>
        <li class="{{ Request::is('adminpanel*') ? 'active' : '' }}">
            <a href="adminpanel">
                <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>

        <li class="{{ Request::is('user*') ? 'active' : '' }}">
            <a href="/user">
                <i class="zmdi zmdi-invert-colors"></i> <span>User</span>
            </a>
        </li>

        <li class="{{ Request::is('product*') ? 'active' : '' }}">
            <a href="/product">
                <i class="zmdi zmdi-format-list-bulleted"></i> <span>Product</span>
            </a>
        </li>
        <li class="{{ Request::is('order*') ? 'active' : '' }}">
            <a href="/order">
                <i class="zmdi zmdi-format-list-bulleted"></i> <span>Order</span>
            </a>
        </li>
        <li class="sidebar-header">LAPORAN </li>
        <li><a href="javaScript:void();"><i class="zmdi zmdi-share text-info"></i> <span>Information</span></a></li>




    </ul>

</div>
