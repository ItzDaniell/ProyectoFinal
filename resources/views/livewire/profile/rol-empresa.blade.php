<x-action-section>
    <x-slot name="title">
        {{ __('Solicitar Rol Empresa') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Por favor, completa el formulario para solicitar el rol de empresa y promocionar tus bienes o servicios relacionados con la tecnología.') }}
    </x-slot>

    <x-slot name="content">
        <!-- Eliminamos cualquier padding extra y centralizamos el formulario -->
        <div class="p-0">
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <!-- Nombre -->
                    <div>
                        <x-label for="nombre" value="{{ __('Nombre') }}" />
                        <x-input id="nombre" type="text" class="mt-1 block w-full text-gray-800 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" wire:model="nombre" />
                        <x-input-error for="nombre" class="mt-2" />
                    </div>

                    <!-- Apellido -->
                    <div>
                        <x-label for="apellido" value="{{ __('Apellido') }}" />
                        <x-input id="apellido" type="text" class="mt-1 block w-full text-gray-800 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" wire:model="apellido" />
                        <x-input-error for="apellido" class="mt-2" />
                    </div>

                    <!-- Correo -->
                    <div>
                        <x-label for="correo" value="{{ __('Correo Electrónico') }}" />
                        <x-input id="correo" type="email" class="mt-1 block w-full text-gray-800 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" wire:model="correo" />
                        <x-input-error for="correo" class="mt-2" />
                    </div>

                    <!-- Teléfono -->
                    <div>
                        <x-label for="telefono" value="{{ __('Teléfono') }}" />
                        <x-input id="telefono" type="text" class="mt-1 block w-full text-gray-800 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" wire:model="telefono" />
                        <x-input-error for="telefono" class="mt-2" />
                    </div>

                    <!-- Nombre de la Empresa -->
                    <div>
                        <x-label for="nombre_empresa" value="{{ __('Nombre de la Empresa') }}" />
                        <x-input id="nombre_empresa" type="text" class="mt-1 block w-full text-gray-800 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" wire:model="nombre_empresa" />
                        <x-input-error for="nombre_empresa" class="mt-2" />
                    </div>

                    <!-- RUC -->
                    <div>
                        <x-label for="ruc" value="{{ __('RUC') }}" />
                        <x-input id="ruc" type="text" class="mt-1 block w-full text-gray-800 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" wire:model="ruc" />
                        <x-input-error for="ruc" class="mt-2" />
                    </div>

                    <!-- Dirección -->
                    <div class="sm:col-span-2">
                        <x-label for="direccion" value="{{ __('Dirección de la Empresa') }}" />
                        <x-input id="direccion" type="text" class="mt-1 block w-full text-gray-800 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" wire:model="direccion" />
                        <x-input-error for="direccion" class="mt-2" />
                    </div>

                    <!-- Motivo -->
                    <div class="sm:col-span-2">
                        <x-label for="motivo" value="{{ __('Motivo para el Rol Empresa') }}" />
                        <textarea id="motivo" class="mt-1 block w-full text-gray-800 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" rows="4" wire:model="motivo"></textarea>
                        <x-input-error for="motivo" class="mt-2" />
                    </div>
                </div>

                <!-- Botón de Enviar -->
                <div class="flex justify-end mt-6">
                    <x-button class="boton">
                        {{ __('Enviar Solicitud') }}
                    </x-button>
                </div>
        </div>
    </x-slot>
</x-action-section>
