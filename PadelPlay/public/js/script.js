const products = [
    { id: 1, name: "Pala Pro", price: 199.99 },
    { id: 2, name: "Pelotas de Pádel (Pack 3)", price: 9.99 },
    { id: 3, name: "Zapatillas Pádel", price: 79.99 }
];

let cart = [];

document.addEventListener("DOMContentLoaded", function () {
    displayProducts();
    document.getElementById("checkout-btn").addEventListener("click", checkout);
});

function displayProducts() {
    const productList = document.getElementById("product-list");
    productList.innerHTML = "";
    products.forEach(product => {
        productList.innerHTML += `
            <div class="col-md-4">
                <div class="card p-3 shadow-sm">
                    <h5>${product.name}</h5>
                    <p>$${product.price.toFixed(2)}</p>
                    <button class="btn btn-primary" onclick="addToCart(${product.id})">Agregar al carrito</button>
                </div>
            </div>
        `;
    });
}

function addToCart(productId) {
    const product = products.find(p => p.id === productId);
    cart.push(product);
    updateCartUI();
}

function updateCartUI() {
    document.getElementById("cart-count").innerText = cart.length;
    const cartItems = document.getElementById("cart-items");
    cartItems.innerHTML = "";
    let total = 0;
    cart.forEach(product => {
        total += product.price;
        cartItems.innerHTML += `<li class="list-group-item">${product.name} - $${product.price.toFixed(2)}</li>`;
    });
    document.getElementById("cart-total").innerText = total.toFixed(2);
}

function checkout() {
    if (cart.length === 0) {
        alert("Tu carrito está vacío.");
        return;
    }
    alert("Pago exitoso. ¡Gracias por tu compra!");
    cart = [];
    updateCartUI();
    var modal = bootstrap.Modal.getInstance(document.getElementById("cartModal"));
    modal.hide();
}
