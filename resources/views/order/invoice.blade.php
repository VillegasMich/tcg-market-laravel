<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>{{__('Invoice.title')}}</title>
  <style>
    body {
      font-family: DejaVu Sans, sans-serif;
      margin: 20px;
      font-size: 14px;
    }

    header,
    footer {
      text-align: center;
      margin-bottom: 20px;
    }

    header h1 {
      margin: 0;
    }

    .order-details,
    .totals {
      margin-bottom: 20px;
    }

    .order-details p,
    .totals p {
      margin: 4px 0;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    table th,
    table td {
      border: 1px solid #333;
      padding: 8px;
      text-align: left;
    }

    table th {
      background-color: #f2f2f2;
    }

    .text-right {
      text-align: right;
    }
  </style>
</head>

<body>
  <header>
    <h1>Factura - Orden de TCG Cards</h1>
    <p>Gracias por confiar en nosotros</p>
  </header>

  <section class="order-details">
    <h2>Detalles de la Orden</h2>
    <p><strong>Número de Orden:</strong> {{ $order->getId() }}</p>
    <p><strong>Fecha:</strong> {{ $order->getCreatedAt() }}</p>
  </section>

  <section class="order-items">
    <h2>Items de la Orden</h2>
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Nombre de la Carta</th>
          <th>Cantidad</th>
          <th>Precio Unitario</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($order->getItems() as $item)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->getTCGCard()->getName() }}</td>
            <td>{{ $item->getQuantity() }}</td>
            <td class="text-right">${{ number_format($item->getSubtotal(), 2) }}</td>
            <td class="text-right">${{ number_format($item->getQuantity() * $item->getSubtotal(), 2) }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </section>

  <section class="totals">
    <h2>Totales</h2>
    <p><strong>Subtotal:</strong> ${{ number_format($order->getTotal(), 2) }}</p>
    <p><strong>Impuestos:</strong> ${{ number_format(0, 2) }}</p>
    <p><strong>Total:</strong> ${{ number_format($order->getTotal(), 2) }}</p>
  </section>

  <footer>
    <p>Si tienes alguna pregunta, contáctanos en soporte@tcgmarket.com</p>
    <p>¡Gracias por tu compra!</p>
  </footer>
</body>

</html>
