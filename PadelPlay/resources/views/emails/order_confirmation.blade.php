<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmación de Compra</title>
</head>
<body>
    <h2>¡Gracias por tu compra en PadelPlay!</h2>
    <p>Hola {{ $orderDetails['user'] }},</p>
    <p>Hemos recibido tu pedido con los siguientes productos:</p>

    @if(is_array($orderDetails['items']))
    @foreach($orderDetails['items'] as $item)
        <li>{{ $item['name'] }} - {{ $item['quantity'] }} x €{{ number_format($item['price'], 2) }}</li>
    @endforeach
@else
    <p>Error: No se pudieron cargar los productos.</p>
@endif


    <p><strong>Total Pagado: €{{ number_format($orderDetails['total'], 2) }}</strong></p>

    <p>Recibirás otro email cuando enviemos tu pedido.</p>
    <p><strong>¡Gracias por confiar en PadelPlay!</strong></p>
</body>
</html>
