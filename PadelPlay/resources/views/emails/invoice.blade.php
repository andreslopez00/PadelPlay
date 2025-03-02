<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura PadelPlay</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h2>Factura de Compra - PadelPlay</h2>
    <p><strong>Cliente:</strong> {{ $orderDetails['user'] }}</p>
    <p><strong>Email:</strong> {{ $orderDetails['email'] }}</p>

    <h3>Detalles del Pedido</h3>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio con IVA (€)</th>
                <th>Subtotal sin IVA (€)</th>
                <th>IVA (€)</th>
                <th>Total (€)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderDetails['items'] as $item)
                @php
                    $precioConIVA = $item['price'];
                    $subtotalSinIVA = $precioConIVA / 1.21;
                    $ivaCalculado = $precioConIVA - $subtotalSinIVA;
                @endphp
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>{{ number_format($precioConIVA, 2) }}</td>
                    <td>{{ number_format($subtotalSinIVA, 2) }}</td>
                    <td>{{ number_format($ivaCalculado, 2) }}</td>
                    <td>{{ number_format($precioConIVA * $item['quantity'], 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Resumen del Pago</h3>
    <table>
        <tr>
            <th>Subtotal (sin IVA):</th>
            <td>{{ $subtotal }} €</td>
        </tr>
        <tr>
            <th>IVA (21%):</th>
            <td>{{ $iva }} €</td>
        </tr>
        <tr>
            <th>Total a Pagar:</th>
            <td><strong>{{ $total }} €</strong></td>
        </tr>
    </table>

    <p><strong>Gracias por confiar en PadelPlay.</strong></p>

</body>
</html>
