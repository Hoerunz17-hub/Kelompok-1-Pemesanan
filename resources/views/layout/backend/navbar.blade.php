<header class="topbar-nav">
    <nav class="navbar navbar-expand fixed-top">
        <ul class="navbar-nav mr-auto align-items-center">
            <li class="nav-item">
                <a class="nav-link toggle-menu" href="javascript:void();">
                    <i class="icon-menu menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <form class="search-bar">
                    <input type="text" class="form-control" placeholder="Enter keywords">
                    <a href="javascript:void();"><i class="icon-magnifier"></i></a>
                </form>
            </li>
        </ul>

        <ul class="navbar-nav align-items-center right-nav-link">

            <!-- PROFILE -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
                    <span class="user-profile d-flex align-items-center">

                        <!-- Foto profil atau fallback avatar -->
                        <img 
                            src="{{ Auth::user()->photo 
                                ? asset(Auth::user()->photo) 
                                : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}"
                            class="img-circle" 
                            width="40" 
                            height="40" 
                            alt="user avatar"
                        >

                        <span class="ml-2 text-white font-weight-bold">{{ Auth::user()->name }}</span>
                    </span>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-item user-details">
                        <a href="/profile">
                            <div class="media">
                                <div class="avatar">
                                    <img 
                                        class="align-self-start mr-3 img-circle"
                                        src="{{ Auth::user()->photo 
                                            ? asset(Auth::user()->photo) 
                                            : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}"
                                        width="60" 
                                        height="60" 
                                        alt="user avatar"
                                    >
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-2 user-title">{{ Auth::user()->name }}</h6>
                                    <p class="user-subtitle">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="dropdown-divider"></li>

                    <li class="dropdown-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link p-0">
                                <i class="icon-power mr-2"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
</header>