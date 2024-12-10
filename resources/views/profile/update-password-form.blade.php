<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Cambiar Contraseña') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Asegúrese de que su cuenta utilice una contraseña larga y aleatoria para mantenerse segura.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="current_password" value="{{ __('Contraseña Actual') }}" />
            <x-input id="current_password" type="password"
                class="mt-1 block w-full h-8 bg-white text-black border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-700 pl-1"
                wire:model="state.current_password" autocomplete="current-password"
                placeholder="Coloque su contraseña actual" />
            <x-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password" value="{{ __('Nueva Contraseña') }}" />
            <x-input id="password" type="password"
                class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1"
                wire:model="state.password" autocomplete="new-password" placeholder="Coloque su nueva contraseña" />
            <x-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password_confirmation" value="{{ __('Confirma la Contraseña') }}" />
            <x-input id="password_confirmation" type="password"
                class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1"
                wire:model="state.password_confirmation" autocomplete="new-password"
                placeholder="Confirme su nueva contraseña" />
            <x-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Guardado Exitoso') }}
        </x-action-message>

        <button class="boton">
            {{ __('Guardar') }}
        </button>
    </x-slot>
</x-form-section>
