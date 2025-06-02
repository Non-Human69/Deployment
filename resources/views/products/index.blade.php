<x-beheer-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Producten') }}
        </h2>
    </x-slot>
    <h2 class="text-2xl font-bold mb-4">Voorraad</h2>

    <!-- Create Product Button -->
    <div class="flex justify-start mb-4">
        <button class="bg-blue-500 text-white p-2 rounded" onclick="toggleCreateForm()">Nieuw Product</button>
    </div>

    <!-- Create Product Form (Collapsible) -->
    <div class="bg-white p-4 rounded-lg shadow mb-4 hidden" id="create-product-form">
        <h3 class="text-xl font-bold mb-2">Nieuw Product</h3>
        <form method="POST" action="{{ route('products.store') }}">
            @csrf
            <div class="mb-4">
                <label for="naam" class="block text-gray-700">Naam</label>
                <input type="text" name="naam" id="naam" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="categorie" class="block text-gray-700">Categorie</label>
                <input type="text" name="categorie" id="categorie" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="prijs" class="block text-gray-700">Prijs</label>
                <input type="number" name="prijs" id="prijs" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="voorraadaantal" class="block text-gray-700">Voorraadaantal</label>
                <input type="number" name="voorraadaantal" id="voorraadaantal" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="vervaldatum" class="block text-gray-700">Vervaldatum</label>
                <input type="date" name="vervaldatum" id="vervaldatum" class="w-full p-2 border rounded" required>
            </div>
            <button type="submit" class="bg-green-500 text-white p-2 rounded">Product Aanmaken</button>
        </form>
    </div>

    <!-- Products List -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach($products as $product)
        <div class="bg-blue-100 p-4 rounded-lg shadow">
            <h3 class="text-xl font-bold mb-2">{{ $product->naam }}</h3>
            <p class="text-gray-700">Categorie: {{ $product->categorie }}</p>
            <p class="text-gray-700">Prijs: €{{ $product->prijs }}</p>
            <p class="text-gray-700">Op voorraad: {{ $product->voorraadaantal }}</p>
            <p class="text-gray-700">Vervaldatum: {{ $product->vervaldatum }}</p>
            <button class="bg-yellow-500 text-white p-2 rounded mt-2" onclick="editProduct($product=id )">Bewerken</button>
            <button class="bg-red-500 text-white p-2 rounded mt-2" onclick="deleteProduct( $product=id)">Verwijderen</button>
        </div>
    @endforeach
    </div>

    <!-- Edit Product Form (hidden by default) -->
    <div id="edit-product-form" class="bg-white p-4 rounded-lg shadow mb-4 hidden">
        <h3 class="text-xl font-bold mb-2">Product Bewerken</h3>
        <form method="POST" action="" id="edit-product-form-action">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="edit-id">
            <div class="mb-4">
                <label for="edit-naam" class="block text-gray-700">Naam</label>
                <input type="text" name="naam" id="edit-naam" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="edit-categorie" class="block text-gray-700">Categorie</label>
                <input type="text" name="categorie" id="edit-categorie" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="edit-prijs" class="block text-gray-700">Prijs</label>
                <input type="number" name="prijs" id="edit-prijs" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="edit-voorraadaantal" class="block text-gray-700">Voorraadaantal</label>
                <input type="number" name="voorraadaantal" id="edit-voorraadaantal" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="edit-vervaldatum" class="block text-gray-700">Vervaldatum</label>
                <input type="date" name="vervaldatum" id="edit-vervaldatum" class="w-full p-2 border rounded" required>
            </div>
            <button type="submit" class="bg-green-500 text-white p-2 rounded">Product Bijwerken</button>
        </form>
    </div>

    <script>
        function toggleCreateForm() {
            const form = document.getElementById('create-product-form');
            form.classList.toggle('hidden');
        }

        function editProduct(id) {
            // Fetch product data and populate the form
            fetch(`/products/${id}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('edit-id').value = data.id;
                    document.getElementById('edit-naam').value = data.naam;
                    document.getElementById('edit-categorie').value = data.categorie;
                    document.getElementById('edit-prijs').value = data.prijs;
                    document.getElementById('edit-voorraadaantal').value = data.voorraadaantal;
                    document.getElementById('edit-vervaldatum').value = data.vervaldatum;
                    document.getElementById('edit-product-form').classList.remove('hidden');
                    document.getElementById('edit-product-form-action').action = `/products/${id}`;
                });
        }

        function deleteProduct(id) {
            if (confirm('Weet je zeker dat je dit product wilt verwijderen?')) {
                fetch(`/products/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => {
                    if (response.ok) {
                        location.reload();
                    } else {
                        alert('Er is een fout opgetreden bij het verwijderen van het product.');
                    }
                });
            }
        }
    </script>
</x-beheer-layout>
