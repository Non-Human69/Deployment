<x-beheer-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Beheer') }}
        </h2>
    </x-slot>
    <h2 class="text-2xl font-bold mb-4">Dashboard</h2>
    <p class="text-gray-700 mb-4">Welcome to the management system dashboard.</p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <div class="bg-blue-100 p-4 rounded-lg shadow">
            <h3 class="text-xl font-bold mb-2">Users</h3>
            <p class="text-gray-700">Manage users and their permissions.</p>
        </div>
        <div class="bg-green-100 p-4 rounded-lg shadow">
            <h3 class="text-xl font-bold mb-2">Settings</h3>
            <p class="text-gray-700">Configure system settings.</p>
        </div>
        <div class="bg-yellow-100 p-4 rounded-lg shadow">
            <h3 class="text-xl font-bold mb-2">Reports</h3>
            <p class="text-gray-700">View system reports and analytics.</p>
        </div>
    </div>
</x-beheer-layout>