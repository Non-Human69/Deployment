<x-beheer-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Map') }}
        </h2>
    </x-slot>
    <link href="{{ asset('js/menu.js') }}" rel="Scripts">
    <h2 class="text-2xl font-bold mb-4">Plattegrond</h2>
    <div class="grid grid-cols-1 md:grid-cols-10 gap-4 h-screen overflow-hidden overflow-y-auto">
        <!-- Product List Section -->
        <div class="bg-blue-100 p-4 rounded-lg shadow md:col-span-3 overflow-y-auto">
            <h3 class="text-xl font-bold mb-2">Producten</h3>
            @foreach($products as $product)
                <div class="bg-white p-2 rounded-lg shadow mb-2 cursor-pointer" onclick="showProductInfo('{{ $product->naam }}', '{{ $product->categorie }}', '{{ $product->prijs }}', '{{ $product->voorraadaantal }}', '{{ $product->barcode }}')">
                    <p class="text-gray-700">{{ $product->naam }}</p>
                </div>
            @endforeach
        </div>

        <!-- Product Information and Map Section -->
        <div class="md:col-span-7 flex flex-col overflow-hidden">
            <!-- Product Information Section -->
            <div id="productInfo" class="bg-white p-6 rounded-lg shadow-lg mb-4 hidden">
                <h3 id="productName" class="text-xl font-bold mb-4"></h3>
                <img src="https://via.placeholder.com/150" alt="Product afbeelding" class="mb-4">
                <p id="productCategory" class="text-gray-700"></p>
                <p id="productPrice" class="text-gray-700"></p>
                <p id="productStock" class="text-gray-700"></p>
                <p id="productBarcode" class="text-gray-700"></p>
                <button id="locationButton" class="bg-blue-500 text-white p-2 rounded-full w-12 h-12 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C8.134 2 5 5.134 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.866-3.134-7-7-7z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11a2 2 0 110-4 2 2 0 010 4z" />
                    </svg>
                </button>
            </div>

            <!-- Map Section -->
            <div class="bg-white p-4 rounded-lg shadow flex-grow">
                <img src="https://cdn.shopify.com/s/files/1/0253/7753/8082/files/Picqer_1.jpg?v=1729739392" alt="Plattegrond" class="w-full h-3/4">
                <div id="mapPin" class="absolute hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C8.134 2 5 5.134 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.866-3.134-7-7-7z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11a2 2 0 110-4 2 2 0 010 4z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</x-beheer-layout>

<script>
    function showProductInfo(name, category, price, stock, barcode) {
        document.getElementById('productName').innerText = name;
        document.getElementById('productCategory').innerText = 'Categorie: ' + category;
        document.getElementById('productPrice').innerText = 'Prijs: €' + price;
        document.getElementById('productStock').innerText = 'Voorraad: ' + stock;
        document.getElementById('productBarcode').innerText = 'Barcode: ' + barcode;
        document.getElementById('productInfo').classList.remove('hidden');
    }

    document.getElementById('locationButton').addEventListener('click', function() {
        const mapPin = document.getElementById('mapPin');
        if (mapPin.classList.contains('hidden')) {
            mapPin.style.top = '68%'; // Adjust the position as needed
            mapPin.style.left = '68%'; // Adjust the position as needed
            mapPin.classList.remove('hidden');
        } else {
            mapPin.classList.add('hidden');
        }
    });
</script>
