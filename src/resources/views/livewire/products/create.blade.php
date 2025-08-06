<div class="p-4 max-w-2xl mx-auto">

    <div class="flex flex-col items-center mb-3">
        @if ($image)
        <div class="mt-3 flex flex-col items-center">
            <p class="text-sm text-gray-500 mb-3">Vista previa:</p>
            <img src="{{ $image->temporaryUrl() }}"
                class="w-32 h-32 object-cover rounded shadow"
                alt="Vista previa de la imagen">
        </div>
        @endif
        @error('image')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <form wire:submit.prevent="save" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label>Nombre</label>
            <label class="input input-bordered w-full mt-1">
                <i class="bi bi-fonts text-xl opacity-50"></i>
                <input
                    type="text"
                    wire:model.defer="name"
                    placeholder="Nombre del Producto..."
                    class="grow" />
            </label>
            @error('name') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Código de Barras</label>
            <label class="input input-bordered w-full mt-1">
                <i class="bi bi-upc text-xl opacity-50"></i>
                <input
                    type="text"
                    wire:model.defer="barcode"
                    placeholder="Código de Barras..."
                    class="grow" />
            </label>
            @error('barcode') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Imagen</label>
            <input
                type="file"
                wire:model.defer="image"
                class="file-input w-full mt-1" />
            @error('image') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Visibilidad</label>
            <br>
            <label class="label mt-3">
                <input type="hidden" wire:model.defer="visible" value="0" />
                <input type="checkbox" class="toggle" wire:model.defer="visible" value="1" />

            </label>
            @error('visible') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Precio de Compra</label>
            <label class="input input-bordered w-full mt-1">
                <i class="bi bi-cash text-xl opacity-50"></i>
                <input
                    type="number"
                    wire:model.defer="buy_price"
                    placeholder="0.00"
                    class="grow"
                    step="0.01" />
            </label>
            @error('buy_price') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Precio de Venta</label>
            <label class="input input-bordered w-full mt-1">
                <i class="bi bi-cash-coin text-xl opacity-50"></i>
                <input
                    type="number"
                    wire:model.defer="sell_price"
                    placeholder="0.00"
                    class="grow"
                    step="0.01" />
            </label>
            @error('sell_price') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Stock</label>
            <label class="input input-bordered w-full mt-1">
                <i class="bi bi-box-seam text-xl opacity-50"></i>
                <input
                    type="number"
                    wire:model.defer="stock"
                    placeholder="0"
                    class="grow" />
            </label>
            @error('stock') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Stock Mínimo</label>
            <label class="input input-bordered w-full mt-1">
                <i class="bi bi-boxes text-xl opacity-50"></i>
                <input
                    type="number"
                    wire:model.defer="stock_min"
                    placeholder="1"
                    class="grow" />
            </label>
            @error('stock_min') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="md:col-span-2">
            <label>Presentación</label>
            <select wire:model.defer="presentationId" class="select select-bordered w-full mt-1">
                <option value="0">-- Seleccionar --</option>
                @foreach($presentations as $presentation)
                <option value="{{ $presentation->id }}">
                    {{ "{$presentation->name} {$presentation->quantity} {$presentation->unit}" }}
                </option>
                @endforeach
            </select>
            @error('presentationId') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="md:col-span-2">
            <label>Proveedor</label>
            <select wire:model.defer="supplierId" class="select select-bordered w-full mt-1">
                <option value="0">-- Seleccionar --</option>
                @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}">
                    {{ $supplier->name }}
                </option>
                @endforeach
            </select>
            @error('presentationId') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="md:col-span-2">
            <label>Descripción</label>
            <textarea
                wire:model.defer="description"
                class="textarea textarea-bordered w-full mt-1"
                rows="4"></textarea>
            @error('description') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="md:col-span-2 flex justify-end">
            <button class="btn btn-info me-2" type="button" title="Generar Código de Barras Aleatorio" wire:click="generateRandomBarcode">
                <i class="bi bi-upc-scan" wire:loading.remove wire:target="generateRandomBarcode"></i>
                <span class="loading loading-spinner loading-xs" wire:loading wire:target="generateRandomBarcode"></span>
            </button>
            <button class="btn btn-success">
                <span wire:loading.remove wire:target="save">Guardar</span>
                <span wire:loading wire:target="save">Guardando...</span>
            </button>
        </div>
    </form>

</div>