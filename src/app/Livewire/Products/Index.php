<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    protected $listeners = ['productSaved' => '$refresh']; // refresh when product is created/updated

    public function render()
    {
        $products = Product::where('name', 'like', "%{$this->search}%")
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('livewire.products.index', ['products' => $products])
            ->layout('layouts.dashboard');;
    }
}
