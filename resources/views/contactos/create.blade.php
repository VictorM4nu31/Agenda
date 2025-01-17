<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Contacto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('contactos.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" required>
                    </div>
                    <div>
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos" required>
                    </div>
                    <div>
                        <label for="user_id">Usuario</label>
                        <input type="text" name="user_id" id="user_id" required>
                    </div>
                    <button type="submit">Crear</button>
                </form>
                <a href="{{ route('contactos.index') }}" class="text-blue-500 underline">Volver a la lista</a>
            </div>
        </div>
    </div>
</x-app-layout>
