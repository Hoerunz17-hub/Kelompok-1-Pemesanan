<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart" aria-labelledby="My Cart">
  <div class="offcanvas-header justify-content-center">
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <div class="offcanvas-body">
    <form action="" method="POST">
      <div class="order-md-last">

        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Order</span>
          <span class="badge bg-primary rounded-pill">
            <select class="transparent-arrows" name="order_number">
              <option>001</option>
              <option>002</option>
              <option>003</option>
            </select>
          </span>
        </h4>

        <ul class="list-group mb-3" id="cart-list">
            @foreach (session('cart', []) as $item)
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">{{ $item['name'] }}</h6>
                        <small class="text-body-secondary">Qty: {{ $item['qty'] }}</small>
                    </div>
                    <span class="text-body-secondary">${{ $item['price'] * $item['qty'] }}</span>
                </li>
            @endforeach

            <li class="list-group-item d-flex justify-content-between">
                <span>Total</span>
                <strong>${{ collect(session('cart', []))->sum(fn($i) => $i['price'] * $i['qty']) }}</strong>
            </li>
        </ul>


        <div class="d-flex gap-2 mb-3">
          <div class="flex-fill">
            <label class="form-label text-body-primary">Name</label>
            <input type="text" class="form-control" name="customer_name">
          </div>

            @php
                $last = \App\Models\Order::latest('id')->first();
                $nextId = $last ? $last->id + 1 : 1;

                $no_invoice = 'INV-' . date('Ymd') . '-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
            @endphp

            <div class="flex-fill">
                <label class="form-label">No Invoice</label>
                <input type="text" class="form-control" name="invoice_number" value="{{ $no_invoice }}" readonly>
            </div>
        </div>

        <div class="d-flex gap-2 mb-3">
          <select class="form-select transparent-arrow" name="type" style="background-color:#ffe19f;">
            <option>Dine in</option>
            <option>Take Away</option>
          </select>

          <select class="form-select transparent-arrow" name="cashier" style="background-color:#ffe19f;">
              <option>Yudi</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Note</label>
          <input type="text" class="form-control" name="note" style="background-color:#ffe19f;">
        </div>

        <button type="submit" class="w-100 btn btn-primary btn-lg">
          Konfirmasi Pesanan
        </button>

      </div>
    </form>
  </div>
</div>
