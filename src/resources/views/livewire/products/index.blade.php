<div class="p-4">
    <div class="flex justify-between mb-4">
        <input wire:model="search" class="input input-bordered" placeholder="Buscar productos...">

        <a href="#" class="btn btn-primary">
            Nuevo
        </a>
    </div>

    <table class="table w-full">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio Compra</th>
                <th>Stock</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>${{ $product->buy_price }}</td>
                <td>{{ $product->stock }}</td>
                <td class="flex gap-2">
                    <a href="#" class="btn btn-sm">ditar</a>
                    <button class="btn btn-sm btn-error">
                        Eliminar
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">No se encontraron productos...</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">{{ $products->links() }}</div>
</div>