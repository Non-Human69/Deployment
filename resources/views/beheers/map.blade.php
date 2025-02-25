<x-beheer-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Map') }}
        </h2>
    </x-slot>
    <h2 class="text-2xl font-bold mb-4">Plattegrond</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-blue-100 p-4 rounded-lg shadow md:col-span-1">
            <h3 class="text-xl font-bold mb-2">Items</h3>
            @foreach($products as $product)
                <div class="bg-white p-2 rounded-lg shadow mb-2 cursor-pointer" onclick="showLocation({{ $product->id }})">
                    <p class="text-gray-700">{{ $product->naam }}</p>
                </div>
            @endforeach
        </div>
        <div class="bg-white p-4 rounded-lg shadow md:col-span-2">
            <img src="https://cdn.shopify.com/s/files/1/0253/7753/8082/files/Picqer_1.jpg?v=1729739392" alt="Plattegrond" class="w-full">
        </div>
    </div>
</x-beheer-layout>
<script>
    function showLocation(productId) {
        console.log("Selected product id:", productId);
    }
</script>
