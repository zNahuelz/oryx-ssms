@if ($paginator->hasPages())
<div class="join">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <button class="join-item btn btn-disabled">«</button>
    @else
    <button wire:click="previousPage" wire:loading.attr="disabled" class="join-item btn">
        «
    </button>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    {{-- "Three Dots" Separator --}}
    @if (is_string($element))
    <button class="join-item btn btn-disabled">{{ $element }}</button>
    @endif

    {{-- Array Of Links --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <button class="join-item btn btn-primary">{{ $page }}</button>
    @else
    <button wire:click="gotoPage({{ $page }})" class="join-item btn">{{ $page }}</button>
    @endif
    @endforeach
    @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <button wire:click="nextPage" wire:loading.attr="disabled" class="join-item btn">
        »
    </button>
    @else
    <button class="join-item btn btn-disabled">»</button>
    @endif
</div>
@endif