@foreach ($cart as $item)
    <li class="list-group-item d-flex justify-content-between lh-sm">
        <div>
            <h6 class="my-0">{{ $item['name'] }}</h6>
            <small class="text-body-secondary">Qty: {{ $item['qty'] }}</small>
        </div>
        <span class="text-body-secondary">
            ${{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}
        </span>
    </li>
@endforeach

<li class="list-group-item d-flex justify-content-between">
    <span>Total</span>
    <strong>
        {{ number_format(array_sum(array_map(fn($x) => $x['qty'] * $x['price'], $cart)), 0, ',', '.') }}
    </strong>
    <input type="hidden" name="total_cost" value="{{ array_sum(array_map(fn($x) => $x['qty'] * $x['price'], $cart)) }}">
</li>

