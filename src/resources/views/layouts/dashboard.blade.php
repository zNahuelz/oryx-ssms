<!DOCTYPE html>
<html lang="en" data-theme="onyx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Oryx SSMS - Cargando...')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    @livewireScripts
    <div class="drawer lg:drawer-open min-h-screen bg-base-100">
        <!-- Hidden checkbox for mobile toggle -->
        <input id="drawer-toggle" type="checkbox" class="drawer-toggle" />
        <!-- Sidebar -->
        <div class="drawer-side z-40">
            <label for="drawer-toggle" class="drawer-overlay"></label>
            <livewire:shared.sidebar />
        </div>
        <!-- Main content area -->
        <div class="drawer-content flex flex-col">
            <!-- Navbar -->
            <livewire:shared.navbar />
            <!-- Page content -->
            <main class="flex-1 overflow-x-hidden p-6">

                @if(session('message'))
                @php
                $alertType = match(session('alert-type')) {
                'success' => 'alert-success',
                'error' => 'alert-error',
                'warning' => 'alert-warning',
                'info' => 'alert-info',
                default => 'alert-info'
                };
                @endphp

                <div class="alert {{ $alertType }} mb-4 shadow-lg">
                    <i class="bi 
            @if(session('type') === 'success') bi-check-circle 
            @elseif(session('type') === 'error') bi-x-circle 
            @elseif(session('type') === 'warning') bi-exclamation-triangle 
            @else bi-info-circle @endif
                "></i>
                    <span>{{ session('message') }}</span>
                </div>
                @endif

                @yield('content')
                {{ $slot ?? '' }}
                @stack('js')
            </main>
        </div>
    </div>
</body>

</html>