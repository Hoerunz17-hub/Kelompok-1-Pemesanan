  @extends('layout.backend.app')
  @section('content')
      <div class="clearfix"></div>

      <div class="container-fluid">
          <div class="col-lg-12">
              <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">INVOIVE</h5>
                      <div class="table-responsive">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th scope="col">NO-INVOICE</th>
                                      <th scope="col">NO MEJA</th>
                                      <th scope="col">NAMA</th>
                                      <th scope="col">TYPE ORDER</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>

                                  </tr>

                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-12">
              <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">DETAIL PESANAN INV-0987</h5>
                      <div class="table-responsive">
                          <table class="table table-striped">
                              <thead>
                                  <tr>
                                      <th scope="col">NO</th>
                                      <th scope="col">ITEM</th>
                                      <th scope="col">QTY</th>
                                      <th scope="col">PRICE</th>
                                      <th scope="col">SUBTOTAL</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <th scope="row">1</th>
                                      <td>Mark</td>
                                      <td>Otto</td>
                                      <td>@mdo</td>
                                      <td>@mdo</td>
                                  </tr>

                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-12">

              {{-- BOX ITEM --}}
              <div class="card"
                  style="background: rgba(0, 120, 160, 0.35);
        border-radius: 12px; padding: 14px 18px; margin-bottom: 14px;">

                  <div class="d-flex justify-content-between" style="color:white; font-size:14px; font-weight:500;">
                      <span>Es buahnya extra kiwi sama nasigoreng extra sawi</span>
                      <span>3.000</span>
                  </div>
              </div>

              {{-- BOX TOTAL + WAITER --}}
              <div class="card" style="background: rgba(0, 120, 160, 0.35);
        border-radius: 12px; padding: 18px;">

                  {{-- TOTAL --}}
                  <div class="d-flex justify-content-between"
                      style="color:white; font-size:16px; font-weight:600; margin-bottom:14px;">
                      <span>Total</span>
                      <span>150.000</span>
                  </div>

                  <hr style="border-color: rgba(255,255,255,0.2); margin: 0 0 14px;">

                  {{-- WAITER --}}
                  <div class="d-flex justify-content-between" style="color:white; font-size:15px; font-weight:500;">
                      <span>Waiter</span>
                      <span>Yanto</span>
                  </div>

              </div>

          </div>



          <div class="overlay toggle-menu"></div>
      </div>
  @endsection
