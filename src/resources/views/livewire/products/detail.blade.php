<div class="p-4 max-w-2xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @if($notFound)
        <div class="md:col-span-2 text-center">
            <i class="bi bi-database-exclamation text-error" style="font-size:150px;"></i>
            <h1 class="text-xl font-semibold">
                Oops! Producto no encontrado…
            </h1>
            <button
                type="button"
                class="btn btn-primary mt-3"
                onclick="history.back()">
                Volver
            </button>
        </div>
        @else
        <div class="flex flex-col items-center mb-3 md:col-span-2">
            @if($product->image)
            <img
                src="{{ asset('storage/' . $product->image) }}"
                alt="Imagen del Producto"
                class="w-50 object-cover rounded shadow hover:scale-200">
            @else
            <h1 class="text-error font-light ">Producto sin Imagen</h1>
            @endif
        </div>

        <div>
            <label>Identificador</label>
            <input
                type="text"
                disabled
                class="input input-bordered w-full mt-1 font-bold !text-black"
                value="{{ $product->id }}" />
        </div>

        <div>
            <label>Código de Barras</label>
            <input
                type="text"
                disabled
                class="input input-bordered w-full mt-1 font-bold !text-black"
                value="{{ $product->barcode }}" />
        </div>

        <div>
            <label>Fecha de Creación</label>
            <input
                type="text"
                disabled
                class="input input-bordered w-full mt-1 font-bold !text-black"
                value="{{ \Carbon\Carbon::parse($product->created_at)->format('d/m/Y h:m:s A') }}" />
        </div>

        <div>
            <label>Última Modificación</label>
            <input
                type="text"
                disabled
                class="input input-bordered w-full mt-1 font-bold !text-black"
                value="{{ \Carbon\Carbon::parse($product->updated_at)->format('d/m/Y h:m:s A') }}" />
        </div>

        <div>
            <label>Visibilidad</label>
            <input
                type="text"
                disabled
                class="input input-bordered w-full mt-1 font-bold {{ $product->visible ? '!text-green-800' : '!text-red-800' }}"
                value="{{ $product->visible ? 'VISIBLE' : 'NO VISIBLE' }}" />
        </div>

        <div>
            <label>Estado</label>
            <input
                type="text"
                disabled
                class="input input-bordered w-full mt-1 font-bold {{ $product->deleted_at ? '!text-red-800' : '!text-green-800' }}"
                value="{{ $product->deleted_at ? 'ELIMINADO' : 'DISPONIBLE' }}" />
        </div>

        <div class="md:col-span-2">
            <label>Nombre</label>
            <input
                type="text"
                disabled
                class="input input-bordered w-full mt-1 font-bold !text-black"
                value="{{ $product->name }}" />
        </div>

        <div class="md:col-span-2">
            <label>Descripción</label>
            <textarea
                disabled
                class="textarea textarea-bordered w-full mt-1 !text-black"
                rows="4">{{ $product->description ?? '-----' }}</textarea>
        </div>

        <div>
            <label>Precio de Compra</label>
            <input
                type="text"
                disabled
                class="input input-bordered w-full mt-1 font-bold !text-black"
                value="{{ 'S./ '.$product->buy_price }}" />
        </div>

        <div>
            <label>Precio de Venta</label>
            <input
                type="text"
                disabled
                class="input input-bordered w-full mt-1 font-bold !text-green-800"
                value="{{ 'S./ '.$product->sell_price }}" />
        </div>

        <div>
            <label>Stock Mínimo</label>
            <input
                type="text"
                disabled
                class="input input-bordered w-full mt-1 font-bold !text-black"
                value="{{ $product->stock_min }}" />
        </div>

        <div>
            <label>Stock</label>
            <input
                type="text"
                disabled
                class="input input-bordered w-full mt-1 font-bold !text-green-800"
                value="{{ $product->stock }}" />
        </div>

        <div>
            <label>Presentación</label>
            <input
                type="text"
                disabled
                class="input input-bordered w-full mt-1 font-bold !text-black"
                value="{{ $product->presentation->name }}" />
        </div>

        <div>
            <label>Proveedor</label>
            <input
                type="text"
                disabled
                class="input input-bordered w-full mt-1 font-bold !text-black"
                value="{{ $product->supplier->name }}" />
        </div>

        <div class="flex flex-col items-center lg:items-end md:col-span-2">
            <div class="join">
                <button class="btn btn-success join-item">Editar</button>
                <button class="btn {{ $product->deleted_at ? 'btn-info' : 'btn-error' }} join-item" id="btn-delete" onclick="confirmDelete()" data-product-name="{{ $product->name }}" data-action-name="{{ $product->deleted_at ? 'restaurar': 'eliminar'  }}">{{ $product->deleted_at ? 'Restaurar' : 'Eliminar' }}</button>
                <button class="btn btn-primary join-item" onclick="history.back()">Volver</button>
            </div>
        </div>

        @endif


        @push('js')
        <script>
            function confirmDelete() {
                if (typeof Swal === 'undefined' || !window.Livewire) {
                    console.error('SweetAlert2 or Livewire not available');
                    return;
                }
                const btn = document.getElementById('btn-delete');
                const productName = btn.getAttribute('data-product-name');
                const actionName = btn.getAttribute('data-action-name');
                Swal.fire({
                    title: 'Confirmar Eliminación',
                    html: `¿Está seguro de ${actionName} el siguiente producto? <br> ${productName}`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'ELIMINAR',
                    cancelButtonText: 'CANCELAR',
                }).then(result => {
                    if (result.isConfirmed) {
                        window.Livewire.dispatch('deleteConfirmed');
                    }
                });
            }
        </script>
        @endpush
    </div>
</div>