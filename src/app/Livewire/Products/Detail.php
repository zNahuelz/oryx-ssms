<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class Detail extends Component
{

    public $product;
    public $notFound = false;

    protected $listeners = [
        'deleteConfirmed' => 'deleteProduct',
    ];

    public function deleteProduct()
    {
        if ($this->product->deleted_at) {
            $this->product->restore();
            session()->flash('message', "Producto: {$this->product->name} restaurado correctamente.");
            session()->flash('alert-type', 'success');
            return redirect()->route('products.index');
        } else {
            $this->product->delete();
            session()->flash('message', "Producto: {$this->product->name} eliminado correctamente.");
            session()->flash('alert-type', 'success');
            return redirect()->route('products.index');
        }
    }

    public function mount($id)
    {
        $this->product = Product::withTrashed()->find($id);

        if (!$this->product) {
            $this->notFound = true;
        }
    }

    public function render()
    {
        return view('livewire.products.detail')->layout('layouts.dashboard');
    }
}
