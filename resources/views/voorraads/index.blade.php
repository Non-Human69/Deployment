<x-beheer-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Voorraads') }}
        </h2>
    </x-slot>
    <h2 class="text-2xl font-bold mb-4">Voorraad</h2>
    @foreach ($voorraads as $voorraad)
        <div class="bg-white p-4 rounded-lg shadow mb-4">
            <h3 class="text-xl font-bold mb-2">{{ $voorraad->name }}</h3>
            <p class="text-gray-700">{{ $voorraad->description }}</p>
        </div>
    @endforeach

<!-- Content for index goes here -->
</x-beheer-layout>
