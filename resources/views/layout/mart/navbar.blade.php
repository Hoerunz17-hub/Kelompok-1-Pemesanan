<header>
      <div class="container-fluid">
        <div class="row py-3 border-bottom">

          <div class="col-sm-4 col-lg-3 text-center text-sm-start">
            <div class="main-logo">
            </div>
          </div>

          <div class="col-6 col-lg-8">
            <div class="d-flex justify-content-end align-items-center gap-4">

                <!-- Support -->
                <div class="text-end d-none d-md-block">
                <span class="fs-6 text-muted">Waiters Menu</span>
                <h6 class="mb-0 fw-bold">Warung Makan Sejahtera</h6>
                </div>

                <!-- Ikon -->
                <ul class="d-flex justify-content-end list-unstyled m-0">
                    <li class="dropdown">
                        <a href="#"
                        class="rounded-circle bg-light p-2 mx-1"
                        id="userMenu"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                            <svg width="24" height="24" viewBox="0 0 24 24">
                                <use xlink:href="#user"></use>
                            </svg>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                            <li>
                                <a class="dropdown-item" href="#">Profil</a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="m-0">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="#" class="rounded-circle bg-light p-2 mx-1">
                        <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#heart"></use></svg>
                        </a>
                    </li>
                    <li class="d-lg-none">
                        <a href="#" class="rounded-circle bg-light p-2 mx-1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                        <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#cart"></use></svg>
                        </a>
                    </li>
                    <li class="d-lg-none">
                        <a href="#" class="rounded-circle bg-light p-2 mx-1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch">
                        <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#search"></use></svg>
                        </a>
                    </li>
                </ul>

                <!-- Cart -->
                <div class="cart text-end d-none d-lg-block dropdown">
                    <a href="{{ route('cart.index') }}" class="border-0 bg-transparent d-flex flex-column gap-2 lh-1 text-decoration-none">
                        <span class="fs-6 text-muted dropdown-toggle">Your Cart</span>
                    </a>
                </div>
            </div>
          </div>
        </div>
      </div>

    </header>