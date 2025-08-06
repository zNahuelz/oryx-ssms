<div class="p-4 space-y-4">
    <div class="flex flex-col sm:flex-row justify-between items-center gap-2">
        <div class="w-full sm:w-auto inline-flex">
            <input
                type="text"
                wire:model.lazy="search"
                placeholder="Buscar productos..."
                class="input input-bordered w-full sm:w-64 me-2" />
            <select wire:model="searchMode" class="select select-bordered w-full">
                @foreach ($searchModes as $key => $label)
                <option value="{{ $key }}">{{ $label }}</option>
                @endforeach
            </select>
        </div>

        <div class="w-full sm:w-auto">
            <a class="btn btn-primary w-full sm:w-auto" href="{{ route('products.index') }}">Recargar</a>
        </div>
    </div>
    <div class="overflow-auto">
        <table class="table w-full">
            <thead>
                <tr class="text-black">
                    <th>#</th>
                    <th wire:click="sortBy('name')" class="cursor-pointer">
                        Nombre
                        @if($sortField === 'name')
                        <i class="bi {{ $sortDirection === 'asc' ? 'bi-caret-up-fill' : 'bi-caret-down-fill' }}"></i>
                        @endif
                    </th>
                    <th wire:click="sortBy('sell_price')" class="cursor-pointer text-end">
                        Precio Venta
                        @if($sortField === 'sell_price')
                        <i class="bi {{ $sortDirection === 'asc' ? 'bi-caret-up-fill' : 'bi-caret-down-fill' }}"></i>
                        @endif
                    </th>
                    <th wire:click="sortBy('stock')" class="cursor-pointer">
                        Stock
                        @if($sortField === 'stock')
                        <i class="bi {{ $sortDirection === 'asc' ? 'bi-caret-up-fill' : 'bi-caret-down-fill' }}"></i>
                        @endif
                    </th>
                    <th>Presentación</th>
                    <th>Estado</th>
                    <th class="text-center">Herramientas</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr class="hover:bg-primary/15">
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td class="text-end">S./ {{ $product->buy_price }}</td>
                    <td class="text-center">{{ $product->stock }}</td>
                    <td>{{ $product->presentation->name === 'Unidad' ? 'Unidad' : "{$product->presentation->name} {$product->presentation->quantity} {$product->presentation->unit}" }}</td>
                    <td>
                        <strong class="{{ $product->deleted_at ? 'text-red-800' : 'text-green-800' }}">
                            {{ $product->deleted_at ? 'Eliminado' : 'Disponible' }}
                        </strong>
                    </td>
                    </td>
                    <td class="text-center">
                        <div class="join">
                            <a href="#" class="join-item btn btn-sm btn-success">Editar</a>
                            <a href="{{ route('products.detail',['id' => $product->id]) }}" class="join-item btn btn-sm btn-primary">Detalles</a>
                            <button class="join-item btn btn-sm {{ $product->deleted_at ? 'btn-info' : 'btn-error' }}" onclick="confirmDelete({{ $product->id }}, '{{ $product->name }}', '{{ $product->deleted_at ? 'restaurar' : 'eliminar' }}')">{{ $product->deleted_at ? 'Restaurar' : 'Eliminar' }}</button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">No se encontraron productos...</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="flex flex-col sm:flex-row justify-between items-center">
        <div class="w-full sm:w-auto">
            <select wire:model="perPage" class="select select-bordered w-full sm:w-32">
                <option value="5">5 Elementos</option>
                <option value="10">10 Elementos</option>
                <option value="25">25 Elementos</option>
                <option value="50">50 Elementos</option>
            </select>
        </div>
        <div class="w-full sm:w-auto mt-4 sm:mt-0">{{ $products->links('components.pagination') }}</div>
    </div>
</div>

@push('js')
<script>
    function confirmDelete(id, productName, actionName) {
        Swal.fire({
            title: 'Confirmar acción',
            html: `¿Está seguro de <strong>${actionName}</strong> el siguiente producto?<br><strong>${productName}</strong>`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: actionName.toUpperCase(),
            cancelButtonText: 'CANCELAR',
        }).then((result) => {
            if (result.isConfirmed) {
                window.Livewire.dispatch('deleteProduct', {
                    id: id
                });
            }
        });
    }
</script>
@endpush
</div>