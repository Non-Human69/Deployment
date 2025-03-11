<x-beheer-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Beheer') }}
        </h2>
    </x-slot>
    <h2 class="text-2xl font-bold mb-4">Dashboard</h2>
    <p class="text-gray-700 mb-4">Welkom op het dashboard van het management systeem.</p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <div class="bg-blue-100 p-4 rounded-lg shadow">
            <a href="{{ route('profile.edit') }}" class="block p-2 hover:bg-blue-200 rounded" >
                <h3 class="text-xl font-bold mb-2">Gebruikers Profiel</h3></a>
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=dashboard_2" />
                <p class="text-gray-700">Manage users and their permissions.</p>
        </div>
        <div class="bg-green-100 p-4 rounded-lg shadow">
            <h3 class="text-xl font-bold mb-2">Instellingen</h3>
            <p class="text-gray-700">Stel in systeem instellingen.</p>
        </div>
        <div class="bg-yellow-100 p-4 rounded-lg shadow">
            <h3 class="text-xl font-bold mb-2">Statistieken</h3>
            <p class="text-gray-700">Toon statistieken.</p>
        </div>
    </div>
</x-beheer-layout>
