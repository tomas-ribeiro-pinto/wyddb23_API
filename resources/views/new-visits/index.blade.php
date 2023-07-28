<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Pontos de Interesse') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-lg text-center">Selecione a região para editar os respetivos pontos de
                interesse:</h1>
            <div class="flex flex-wrap justify-center">
                @foreach($locations as $location)
                    <a href="{{request()->fullUrl() . '/' . $location}}"
                       class="flex flex-1 justify-center items-center bg-amber-500 rounded-lg h-36 w-36 p-4 m-4">
                        <span class="text-2xl font-bold text-white">{{ucwords($location)}}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
