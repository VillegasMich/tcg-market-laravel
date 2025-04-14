<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Internal Invoice Record - Order #{{ $order->getId() }}</title>
  <!-- CDN de Tailwind CSS (versión 2.x o la que prefieras) -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
  <div class="max-w-3xl mx-auto my-10 p-6 bg-white shadow-md">

    <header class="text-center border-b pb-4">
      <h1 class="text-3xl font-bold">Internal Invoice Record</h1>
      <p class="text-sm text-gray-600">For Company Internal Use Only</p>
    </header>

    <section class="mt-6">
      <h2 class="text-xl font-semibold border-b pb-2">Order Details</h2>
      <div class="mt-4">
        <p><strong>Order Number:</strong> {{ $order->getId() }}</p>
        <p><strong>Date:</strong> {{ $order->getCreatedAt() }}</p>
      </div>
    </section>

    <section class="mt-6">
      <h2 class="text-xl font-semibold border-b pb-2">Order Items</h2>
      <div class="mt-4 overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">#</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Card Name</th>
              <th class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase">Quantity</th>
              <th class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase">Unit Price</th>
              <th class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase">Subtotal</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($order->getItems() as $item)
            <tr>
              <td class="px-4 py-2">{{ $loop->iteration }}</td>
              <td class="px-4 py-2">{{ $item->getTCGCard()->getName() }}</td>
              <td class="px-4 py-2 text-right">{{ $item->getQuantity() }}</td>
              <td class="px-4 py-2 text-right">${{ number_format($item->getTCGCard()->getPrice(), 2) }}</td>
              <td class="px-4 py-2 text-right">${{ number_format($item->getSubtotal(), 2) }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </section>

    <section class="mt-6">
      <h2 class="text-xl font-semibold border-b pb-2">Totals</h2>
      <div class="mt-4 space-y-2">
        <p><strong>Subtotal:</strong> ${{ number_format($order->getTotal(), 2) }}</p>
        <p><strong>Taxes:</strong> ${{ number_format(0, 2) }}</p>
        <p><strong>Total:</strong> ${{ number_format($order->getTotal(), 2) }}</p>
      </div>
    </section>

    <footer class="mt-8 border-t pt-4 text-center">
      <p class="text-sm text-gray-600">Internal Document - For Company Records Only</p>
      <p class="text-xs text-gray-500">Generated on {{ now() }}</p>
    </footer>
  </div>
</body>
</html>
