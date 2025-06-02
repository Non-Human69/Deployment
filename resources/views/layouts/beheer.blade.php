<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- TODO -->
<!-- scrollbar in the table instead of next to the table -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beheer systeem</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('js/menu.js') }}" rel="Scripts">
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <header class="bg-green-500 text-white p-4">
            <div class="container mx-auto">
                <h1 class="text-3xl font-bold">Beheer systeem</h1>
            </div>
        </header>
        <div class="flex flex-1">
            <aside class="sidebar bg-gray-800 text-white w-64 p-2">
            <img src="{{ asset('pictures/Logo.png') }}" alt="Logo" class="">
                <nav>
                    <ul>
                        <li class="mb-2"><a href="{{ route('beheers.index') }}" class="block p-2 hover:bg-gray-700 rounded">Hoofdmenu <i class="fa-thin fa-house"></i></a></li>
                        <li class="mb-2"><a href="{{ route('products.index') }}" class="block p-2 hover:bg-gray-700 rounded">Voorraad</a></li>
                        <li class="mb-2"><a href="#" class="block p-2 hover:bg-gray-700 rounded">Statistieken</a></li>
                        <li class="mb-2"><a href="{{ route('beheers.map') }}" class="block p-2 hover:bg-gray-700 rounded">Plattegrond</a></li>
                        <li class="mb-2"><a href="#" class="block p-2 hover:bg-gray-700 rounded">Instellingen</a></li>
                        <li class="mb-2"><a href="{{ route('profile.edit') }}" class="block p-2 hover:bg-gray-700 rounded">Account</a></li>
                    </ul>
                </nav>
            </aside>
            <main class="flex-1 p-4">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    {{ $slot }}
                </div>
            </main>
        </div>
        <footer class="bg-gray-800 text-white p-4">
            <div class="container mx-auto text-center">
                &copy; 2025 Beheer systeem. All rights reserved.
            </div>
        </footer>
    </div>
</body>

</html>
