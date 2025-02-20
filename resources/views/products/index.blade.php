<x-beheer-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Producten') }}
        </h2>
    </x-slot>
    <h2 class="text-2xl font-bold mb-4">Voorraad</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach($products as $product)
        <div class="bg-blue-100 p-4 rounded-lg shadow">
            <h3 class="text-xl font-bold mb-2">{{ $product->naam }}</h3>
            <p class="text-gray-700">Categorie: {{ $product->categorie }}</p>
            <p class="text-gray-700">Prijs: €{{ $product->prijs }}</p>
            <p class="text-gray-700">Op voorraad: {{ $product->voorraadaantal }}</p>
            <p class="text-gray-700">Barcode: {{ $product->barcode }}</p>
        </div>
    @endforeach
    </div>
</x-beheer-layout>
