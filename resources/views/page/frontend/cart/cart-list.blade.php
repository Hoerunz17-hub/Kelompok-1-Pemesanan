@foreach ($cart as $item)
    <li class="list-group-item d-flex justify-content-between lh-sm">
        <div>
            <h6 class="my-0">{{ $item['name'] }}</h6>
            <small class="text-body-secondary">Qty: {{ $item['qty'] }}</small>
        </div>
        <span class="text-body-secondary">
            ${{ $item['price'] * $item['qty'] }}
        </span>
    </li>
@endforeach

<li class="list-group-item d-flex justify-content-between">
    <span>Total</span>
    <strong>${{ collect($cart)->sum(fn($i) => $i['price'] * $i['qty']) }}</strong>
</li>
