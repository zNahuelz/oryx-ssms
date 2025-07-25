<div class="bg-neutral-content/10 flex min-h-screen flex-col items-center justify-center">
	<div class="card bg-base-100 w-100 p-6 shadow-xl">
		<h1 class="text-center text-xl font-bold">Inicio de Sesión</h1>
		<div class="mt-2 flex flex-col items-center">
			<i class="bi bi-shop text-dark mb-4 text-[100px]"></i>
		</div>

		<form
			wire:submit.prevent="login"
			class="space-y-3">
			<label class="input input-bordered w-full" class:input-error={$errors.email}>
				<i class="bi bi-envelope text-xl opacity-50"></i>
				<input type="email" name="email" wire:model.defer="email" placeholder="Correo Electrónico" class="grow" />
			</label>

			@error('email')
			<p class="text-sm text-error">{{ $message }}</p>
			@enderror


			<label class="input input-bordered w-full" class:input-error={$errors.password}>
				<i class="bi bi-key text-xl opacity-50"></i>
				<input type="password" name="password" wire:model.defer="password" placeholder="Contraseña" class="grow" />
			</label>

			@error('password')
			<p class="text-sm text-error">{{ $message }}</p>
			@enderror

			<p class="mb-3 text-center text-sm">
				¿Olvidaste tu contraseña?
				<span class="text-primary/50 hover:text-primary font-bold">Click aquí</span>
			</p>




			<div class="flex flex-col items-center">
				<button class="btn btn-primary btn-md w-40" type="submit" wire:loading.attr="disabled">
                    <span wire:loading.remove>Iniciar Sesión</span>
                    <span wire:loading>Cargando...</span>
				</button>
			</div>
		</form>
	</div>
</div>