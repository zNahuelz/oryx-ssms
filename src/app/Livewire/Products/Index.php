<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10; //TODO: Fix this.
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $searchMode = 'name';

    protected $queryString = ['search', 'sortField', 'sortDirection', 'perPage'];

    public $searchModes = ['name' => 'Por Nombre', 'barcode' => 'Por Código de Barras', 'description' => 'Por Descripción'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function render()
    {
        $products = Product::withTrashed()
            ->when(
                $this->search,
                fn($q) =>
                $q->where("{$this->searchMode}", 'like', "%{$this->search}%")
            )
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate((int)$this->perPage);

        return view('livewire.products.index', [
            'products' => $products,
            'searchModes' => $this->searchModes,
        ])->layout('layouts.dashboard', ['title' => 'Productos']);
    }
}
