<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ver Contacto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3>{{ $contacto->nombre }} {{ $contacto->apellidos }}</h3>
                <p><strong>Usuario:</strong> {{ $contacto->user->name }}</p>
                <!-- Agrega más detalles del contacto aquí -->
                <a href="{{ route('contactos.index') }}" class="text-blue-500 underline">Volver a la lista</a>
            </div>
        </div>
    </div>
</x-app-layout>
