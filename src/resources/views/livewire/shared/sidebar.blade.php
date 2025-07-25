<aside class="min-h-full w-64 bg-base-200 border-r border-base-300">
  <!-- Logo Section -->
  <div class="p-2 border-b border-base-300">
    <div class="flex flex-col items-center gap-3">
      <div>
        <h2 class="font-bold text-lg text-primary">Oryx SSMS</h2>
        <p class="text-sm text-base-content/70">Sistema de Gestión</p>
      </div>
    </div>
  </div>

  <!-- Navigation Menu -->
  <div class="p-4">
    <ul class="menu menu-sm gap-1">
      <!-- Dashboard -->
      <li>
        <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors hover:bg-primary/50">
          <i class="bi bi-house-door-fill  text-lg leading-none"></i>
          <span class="font-medium">Inicio</span>
        </a>
      </li>

      <!-- Nueva Venta -->
      <li>
        <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors hover:bg-primary/50">
          <i class="bi bi-cart-plus text-lg leading-none"></i>
          <span class="font-medium">Nueva venta</span>
        </a>
      </li>

      <!-- Productos Dropdown -->
      <li>
        <details>
          <summary class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors hover:bg-primary/50">
            <i class="bi bi-boxes text-lg leading-none"></i>
            <span class="font-medium">Productos</span>
          </summary>
          <ul class="ml-6 mt-2 space-y-1">
            <li><a href="#" class="block px-3 py-1 rounded hover:bg-primary/50">Nuevo</a></li>
            <li><a href="{{ route('products.index') }}" class="block px-3 py-1 rounded hover:bg-primary/50">Listado</a></li>
          </ul>
        </details>
      </li>

      <!-- Settings -->
      <li>
        <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors hover:bg-primary/50">
          <i class="bi bi-gear-wide-connected text-lg leading-none"></i>
          <span class="font-medium">Configuración</span>
        </a>
      </li>

      <!-- Logout -->
      <li>
        <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors hover:bg-error/10 text-error">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 18 16">
            <path d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
          </svg>
          <span class="font-medium">Cerrar Sesión</span>
        </a>
      </li>
    </ul>
  </div>
</aside>