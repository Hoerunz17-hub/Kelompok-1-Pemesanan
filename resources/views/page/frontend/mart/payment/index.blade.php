<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    .payment-card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      max-width: 400px;
      width: 100%;
    }
    .payment-card h4 {
      font-weight: 600;
      margin-bottom: 20px;
    }
    .btn-pay {
      background-color: #e3f2fd;
      color: #000;
      font-weight: 600;
    }
    .btn-pay:hover {
      background-color: #bbdefb;
    }
  </style>
</head>
<body>
  <div class="payment-card p-4">
    <h4 class="text-center">Order Summary</h4>
    <form>
      <!-- Order ID -->
      <div class="mb-3">
        <label for="orderId" class="form-label fw-semibold">Order ID</label>
        <input type="text" class="form-control" id="orderId" placeholder="Enter Order ID">
      </div>

      <!-- Payment Method -->
      <div class="mb-3">
        <label for="paymentMethod" class="form-label fw-semibold">Payment Method</label>
        <select class="form-select" id="paymentMethod">
          <option selected disabled>Choose payment method</option>
          <option value="1">Credit Card</option>
          <option value="2">Bank Transfer</option>
          <option value="3">E-Wallet</option>
          <option value="4">Cash on Delivery</option>
        </select>
      </div>

      <!-- Subtotal -->
      <div class="mb-4">
        <label for="subtotal" class="form-label fw-semibold">Subtotal</label>
        <input type="text" class="form-control" id="subtotal" value="$1290.00" readonly>
      </div>

      <!-- Button -->
      <button type="submit" class="btn btn-pay w-100 py-2">Confirm & Pay</button>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
