document.addEventListener("DOMContentLoaded", function () {
    const cart = [];
    const cartCount = document.getElementById("cart-count");
    const cartItems = document.getElementById("cart-items");
    const cartTotal = document.getElementById("cart-total");

    // Capturar todos los botones de "Agregar al carrito"
    document.querySelectorAll(".add-to-cart").forEach(button => {
        button.addEventListener("click", function () {
            const productId = this.getAttribute("data-id");
            const productName = this.getAttribute("data-name");
            const productPrice = parseFloat(this.getAttribute("data-price"));

            addToCart(productId, productName, productPrice);
        });
    });

    function addToCart(id, name, price) {
        const existingProduct = cart.find(item => item.id === id);
        if (existingProduct) {
            existingProduct.quantity++;
        } else {
            cart.push({ id, name, price, quantity: 1 });
        }
        updateCartUI();
    }

    function updateCartUI() {
        cartCount.innerText = cart.reduce((sum, item) => sum + item.quantity, 0);
        cartItems.innerHTML = "";
        let total = 0;

        cart.forEach(product => {
            total += product.price * product.quantity;
            cartItems.innerHTML += `
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    ${product.name} (x${product.quantity})
                    <span>$${(product.price * product.quantity).toFixed(2)}</span>
                    <button class="btn btn-danger btn-sm remove-item" data-id="${product.id}">❌</button>
                </li>`;
        });

        cartTotal.innerText = total.toFixed(2);

        // Agregar evento para eliminar productos
        document.querySelectorAll(".remove-item").forEach(button => {
            button.addEventListener("click", function () {
                removeFromCart(this.getAttribute("data-id"));
            });
        });
    }

    function removeFromCart(id) {
        const index = cart.findIndex(item => item.id === id);
        if (index !== -1) {
            if (cart[index].quantity > 1) {
                cart[index].quantity--;
            } else {
                cart.splice(index, 1);
            }
            updateCartUI();
        }
    }

    document.getElementById("checkout-btn").addEventListener("click", function () {
        if (cart.length === 0) {
            alert("Tu carrito está vacío.");
            return;
        }
        alert("Pago exitoso. ¡Gracias por tu compra!");
        cart.length = 0;
        updateCartUI();
        var modal = bootstrap.Modal.getInstance(document.getElementById("cartModal"));
        modal.hide();
    });
});
