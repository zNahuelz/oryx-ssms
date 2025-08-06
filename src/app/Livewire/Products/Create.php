<?php

namespace App\Livewire\Products;

use App\Models\Presentation;
use App\Models\Product;
use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name, $description, $barcode, $buy_price, $sell_price, $stock, $stock_min, $presentationId, $supplierId;
    public bool $visible = false;
    public $image;

    public $presentations = [];
    public $suppliers = [];

    protected $rules = [
        'name' => ['required', 'min:3', 'max:150'],
        'description' => ['nullable', 'max:255'],
        'barcode' => ['required', 'min:13', 'max:30', 'unique:products,barcode'],
        'image' => ['nullable', 'image', 'max:2048'],
        'buy_price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
        'sell_price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
        'stock' => ['required', 'numeric'],
        'stock_min' => ['required', 'numeric'],
        'visible' => ['boolean'],
        'presentationId' => ['required', 'exists:presentations,id'],
        'supplierId' => ['required', 'exists:suppliers,id'],
    ];

    protected $messages = [
        'name.required' => 'El nombre del producto es obligatorio.',
        'name.min' => 'El nombre del producto debe tener al menos 3 caracteres.',
        'name.max' => 'El nombre del producto no puede exceder los 150 caracteres.',
        'barcode.required' => 'El código de barras es obligatorio.',
        'barcode.min' => 'El código de barras debe tener al menos 13 caracteres.',
        'barcode.max' => 'El código de barras no puede exceder los 30 caracteres.',
        'barcode.unique' => 'El código de barras ya está en uso.',
        'buy_price.required' => 'El precio de compra es obligatorio.',
        'sell_price.required' => 'El precio de venta es obligatorio.',
        'stock.required' => 'El stock es obligatorio.',
        'stock_min.required' => 'El stock mínimo es obligatorio.',
        'visible.boolean' => 'La visibilidad debe ser verdadera o falsa.',
        'presentationId.required' => 'La presentación es obligatoria.',
        'presentationId.exists' => 'La presentación seleccionada no es válida.',
        'supplierId.required' => 'El proveedor es obligatorio.',
        'supplierId.exists' => 'El proveedor seleccionado no es válido.',
        'image.image' => 'El archivo debe ser una imagen.',
        'image.max' => 'La imagen no puede exceder los 2 MB.',
    ];

    public function mount()
    {
        $this->presentations = Presentation::all();
        $this->suppliers = Supplier::all();
    }

    public function generateRandomBarcode()
    {
        $validBarcode = false;
        while (!$validBarcode) {
            $barcode = $this->barcodeFactory();
            if (!Product::where('barcode', $barcode)->exists()) {
                $this->barcode = $barcode;
                $validBarcode = true;
            }
        }
    }

    private function barcodeFactory()
    {
        $value = rand(1, 99999);
        $barcode = str_pad((string)$value, 13, '0', STR_PAD_LEFT);
        return $barcode;
    }

    public function save()
    {
        $this->validate();

        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store('uploads/products_images', 'public');
        }

        Product::create([
            'name' => strtoupper(trim($this->name)),
            'description' => strtoupper(trim($this->description)) ?? '-----',
            'barcode' => trim($this->barcode),
            'image' => $imagePath,
            'buy_price' => $this->buy_price,
            'sell_price' => $this->sell_price,
            'stock' => $this->stock,
            'stock_min' => $this->stock_min,
            'visible' => $this->visible ?? true,
            'presentation_id' => $this->presentationId,
            'supplier_id' => $this->supplierId,
        ]);

        session()->flash('message', 'Producto registrado correctamente.');
        session()->flash('alert-type', 'success');
        return redirect()->route('products.index');
    }

    public function render()
    {
        return view('livewire.products.create')
            ->layout('layouts.dashboard', ['title' => 'Registro de Producto']);
    }
}
