<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Conteúdo APP WYD Don Bosco 23') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 mb-2">
                    <a href="{{route('edit-agenda')}}" class="btn bg-red-500 text-white p-2 rounded-lg">Editar Agenda</a>
                    <a href="{{route('dashboard')}}" class="btn bg-red-500 text-white p-2 rounded-lg">Editar Acolhimento</a>
                    <a href="{{route('dashboard')}}" class="btn bg-red-500 text-white p-2 rounded-lg">Editar Visitas</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
