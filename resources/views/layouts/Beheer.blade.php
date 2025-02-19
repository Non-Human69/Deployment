<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- TODO -->
<!-- scrollbar in the table instead of next to the table -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <header class="bg-blue-600 text-white p-4">
            <div class="container mx-auto">
                <h1 class="text-3xl font-bold">Management System</h1>
            </div>
        </header>
        <div class="flex flex-1">
            <aside class="bg-gray-800 text-white w-64 p-4">
                <nav>
                    <ul>
                        <li class="mb-2"><a href="{{ route('beheers.index') }}" class="block p-2 hover:bg-gray-700 rounded">Hoofdmenu</a></li>
                        <li class="mb-2"><a href="{{ route('voorraads.index') }}" class="block p-2 hover:bg-gray-700 rounded">Voorraad</a></li>
                        <li class="mb-2"><a href="#" class="block p-2 hover:bg-gray-700 rounded">Settings</a></li>
                        <li class="mb-2"><a href="#" class="block p-2 hover:bg-gray-700 rounded">Reports</a></li>
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
                &copy; 2023 Management System. All rights reserved.
            </div>
        </footer>
    </div>
</body>

</html>
