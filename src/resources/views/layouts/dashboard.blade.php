<!DOCTYPE html>
<html lang="en" data-theme="onyx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Oryx SSMS - Cargando...')</title>
    @vite('resources/css/app.css')
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
                @yield('content')
                {{ $slot ?? '' }}
            </main>
        </div>
    </div>
</body>

</html>