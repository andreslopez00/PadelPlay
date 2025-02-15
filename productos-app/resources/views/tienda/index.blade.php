<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Botón flotante en la esquina superior derecha */
    .floating-cart {
      position: fixed;
      top: 20px;
      right: 20px;
      z-index: 1050; /* Debe estar sobre el contenido */
    }
  </style>
</head>
<body>
  <div class="container my-4">
    <h1>Bienvenido a nuestra Tienda</h1>

    <div class="list-group mt-4">
      <!-- Loop para mostrar los productos -->
      @foreach ($productos as $producto)
        <div class="list-group-item d-flex justify-content-between align-items-center">
          <div>
            <strong>{{ $producto->nombre }}</strong> - ${{ $producto->precio }}
          </div>
          <button class="btn btn-primary add-to-cart" data-id="{{ $producto->id }}" data-nombre="{{ $producto->nombre }}" data-precio="{{ $producto->precio }}">Añadir al carrito</button>
        </div>
      @endforeach
    </div>
  </div>

  <!-- Botón flotante del carrito -->
  <button type="button" class="btn btn-secondary floating-cart" data-bs-toggle="offcanvas" data-bs-target="#cartOffcanvas" aria-controls="cartOffcanvas">
    Carrito
  </button>

  <!-- Offcanvas del carrito -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="cartOffcanvas" aria-labelledby="cartOffcanvasLabel">
    <div class="offcanvas-header">
      <h5 id="cartOffcanvasLabel">Carrito de Compras</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
    </div>
    <div class="offcanvas-body">
      <ul id="carrito-lista" class="list-group">
        <!-- Aquí se llenará dinámicamente con los productos -->
      </ul>
      <p class="mt-3">Total: <span id="carrito-total">€0.00</span></p>
      <button id="carrito-checkout" class="btn btn-success">Ir a pagar</button>
    </div>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
  document.addEventListener('DOMContentLoaded', function() {
    const carritoLista = document.getElementById('carrito-lista');
    const carritoTotal = document.getElementById('carrito-total');
    const checkoutButton = document.getElementById('carrito-checkout');
    const userId = document.body.getAttribute('data-user-id') || 'guest';

    // Función para obtener el carrito desde localStorage
    function obtenerCarrito() {
      return JSON.parse(localStorage.getItem(`carrito_${userId}`)) || [];
    }

    // Función para guardar el carrito en localStorage
    function guardarCarrito(carrito) {
      localStorage.setItem(`carrito_${userId}`, JSON.stringify(carrito));
    }

    // Función para actualizar la UI del carrito
    function actualizarCarritoUI() {
      const carrito = obtenerCarrito();
      carritoLista.innerHTML = '';
      let total = 0;

      carrito.forEach((item, index) => {
        const li = document.createElement('li');
        li.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'align-items-center');
        li.innerHTML = `
          ${item.nombre} x${item.cantidad} - €${(item.precio * item.cantidad).toFixed(2)}
          <button class="btn btn-danger btn-sm eliminar-item" data-index="${index}">X</button>
        `;
        carritoLista.appendChild(li);
        total += item.precio * item.cantidad;
      });

      carritoTotal.textContent = `€${total.toFixed(2)}`;
    }

    // Función para agregar productos al carrito
    function agregarAlCarrito(productoId, nombre, precio, cantidad = 1) {
      const carrito = obtenerCarrito();
      const productoExistente = carrito.find(item => item.id === productoId);
      if (productoExistente) {
        productoExistente.cantidad += cantidad;
      } else {
        carrito.push({ id: productoId, nombre, precio, cantidad });
      }
      guardarCarrito(carrito);
      actualizarCarritoUI();
    }

    // Función para eliminar productos del carrito
    function eliminarDelCarrito(index) {
      let carrito = obtenerCarrito();
      carrito.splice(index, 1); // Elimina el producto del array
      guardarCarrito(carrito);
      actualizarCarritoUI();
    }

    // Evento para agregar productos al carrito
    document.querySelectorAll('.add-to-cart').forEach(button => {
      button.addEventListener('click', function() {
        const productId = this.getAttribute('data-id');
        const productName = this.getAttribute('data-nombre');
        const productPrice = parseFloat(this.getAttribute('data-precio'));
        agregarAlCarrito(productId, productName, productPrice);
        alert(`${productName} ha sido añadido al carrito.`);
      });
    });

    // Delegación de eventos para eliminar productos del carrito
    carritoLista.addEventListener('click', function(e) {
      if (e.target.classList.contains('eliminar-item')) {
        const index = e.target.getAttribute('data-index');
        eliminarDelCarrito(index);
      }
    });

    // Evento para el botón de pago
    if (checkoutButton) {
        checkoutButton.addEventListener('click', function() {
            const carrito = obtenerCarrito();
            
            if (carrito.length === 0) {
                alert('El carrito está vacío');
                return;
            }

            fetch('{{ route('procesar_pago') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ carrito })
            })
            .then(response => {
                if (!response.ok) {
                    return response.text().then(text => {
                        throw new Error(`HTTP error! status: ${response.status}, body: ${text}`);
                    });
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    localStorage.removeItem(`carrito_${userId}`);
                    actualizarCarritoUI();
                    alert('Compra realizada con éxito. Redirigiendo...');
                    window.location.href = '{{ route('tienda') }}';
                } else {
                    throw new Error(data.error || 'Error desconocido al procesar la compra');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al procesar la compra: ' + error.message);
            });
        });
    }

    // Cargar carrito al inicio
    actualizarCarritoUI();
});
</script>

</body>
</html>
