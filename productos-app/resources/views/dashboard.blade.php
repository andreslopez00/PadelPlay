<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            🏪 Tienda Online
        </h2>
        <div class="relative inline-block" x-data="{ cartOpen: false }">
            <button @click="cartOpen = !cartOpen" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                🛒 Carrito (<span x-text="$store.cart.items.length"></span>)
            </button>
            <div class="absolute right-0 mt-2 w-96 bg-white shadow-xl rounded-lg p-6 z-50" x-show="cartOpen" x-transition>
                <h3 class="text-xl font-bold">🛒 Carrito de Compras</h3>
                <ul class="mt-3 space-y-3 max-h-60 overflow-y-auto">
                    <template x-for="(item, index) in $store.cart.items" :key="index">
                        <li class="flex justify-between items-center border-b pb-2">
                            <span x-text="item.name" class="font-semibold"></span>
                            <span class="text-gray-700">$<span x-text="item.price.toFixed(2)"></span></span>
                            <button @click="$store.cart.remove(index)" class="text-red-500 hover:text-red-700">❌</button>
                        </li>
                    </template>
                </ul>
                <div class="mt-4 text-lg font-bold">Total: $<span x-text="$store.cart.total"></span></div>
                <button @click="$store.cart.clear()" class="bg-red-500 text-white px-4 py-2 mt-4 w-full rounded hover:bg-red-600">Vaciar Carrito</button>
                <button class="bg-green-500 text-white px-4 py-2 mt-2 w-full rounded hover:bg-green-600">🛍️ Finalizar Compra</button>
            </div>
        </div>
    </x-slot>

    <div class="py-12" x-data>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-2xl font-bold text-center">🛍️ Productos Destacados</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-6">
                    <template x-for="product in $store.shop.products" :key="product.name">
                        <div class="bg-gray-100 p-4 rounded-lg shadow-lg hover:shadow-2xl transition">
                            <img :src="product.image" alt="Producto" class="w-full h-40 object-cover rounded-md">
                            <h4 class="text-lg font-semibold mt-2" x-text="product.name"></h4>
                            <p class="text-gray-600">Precio: <span class="font-bold">$<span x-text="product.price"></span></span></p>
                            <button @click="$store.cart.add(product)" class="bg-blue-500 text-white px-4 py-2 mt-2 w-full rounded hover:bg-blue-600">Añadir al Carrito</button>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('shop', {
                products: [
                    { name: 'Producto 1', price: 15.99, image: 'https://via.placeholder.com/150' },
                    { name: 'Producto 2', price: 22.50, image: 'https://via.placeholder.com/150' },
                    { name: 'Producto 3', price: 30.00, image: 'https://via.placeholder.com/150' },
                    { name: 'Producto 4', price: 12.75, image: 'https://via.placeholder.com/150' }
                ]
            });

            Alpine.store('cart', {
                items: [],
                add(product) {
                    let existing = this.items.find(item => item.name === product.name);
                    if (existing) {
                        existing.quantity += 1;
                        existing.total = (existing.quantity * existing.price).toFixed(2);
                    } else {
                        this.items.push({ ...product, quantity: 1, total: product.price.toFixed(2) });
                    }
                },
                remove(index) {
                    this.items.splice(index, 1);
                },
                get total() {
                    return this.items.reduce((sum, item) => sum + parseFloat(item.total), 0).toFixed(2);
                },
                clear() {
                    this.items = [];
                }
            });
        });
    </script>
</x-app-layout>
