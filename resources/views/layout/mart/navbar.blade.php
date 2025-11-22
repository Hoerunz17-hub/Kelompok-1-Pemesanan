<header>
      <div class="container-fluid">
        <div class="row py-3 border-bottom">

          <div class="col-sm-4 col-lg-3 text-center text-sm-start">
            <div class="main-logo">
              <a href="index.html">
                <img src="{{ asset('assetsfrontend/images/CAKEMART.png') }}" alt="logo" class="img-fluid" style="width:241px; height:54px;">
              </a>
            </div>
          </div>

          <div class="col-6 col-lg-8">
            <div class="d-flex justify-content-end align-items-center gap-4">

                <!-- Support -->
                <div class="text-end d-none d-md-block">
                <span class="fs-6 text-muted">For Support?</span>
                <h6 class="mb-0 fw-bold">+62 878 123 456</h6>
                </div>

                <!-- Ikon -->
                <ul class="d-flex justify-content-end list-unstyled m-0">
                    <li>
                        <a href="#" class="rounded-circle bg-light p-2 mx-1">
                        <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#user"></use></svg>
                        </a>
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
                    <a href="{{ route('page.frontend.cart.index') }}" class="border-0 bg-transparent d-flex flex-column gap-2 lh-1 text-decoration-none">
                        <span class="fs-6 text-muted dropdown-toggle">Your Cart</span>
                    </a>
                </div>
            </div>
          </div>

        </div>
      </div>


      <div class="container-fluid">
        <div class="row py-3">
          <div class="d-flex  justify-content-center justify-content-sm-between align-items-center">
            <nav class="main-menu d-flex navbar navbar-expand-lg">

              <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

                <div class="offcanvas-header justify-content-center">
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

              </div>
          </div>
        </div>
      </div>
    </header>
