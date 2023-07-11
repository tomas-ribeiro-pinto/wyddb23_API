<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Agenda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-lg text-center">Selecione o dia que pretende editar:</h1>
            <div class="flex flex-wrap ">
                @foreach($days as $day)
                    <a href="{{request()->fullUrl() . '/' . $day->id}}" class="flex cols-span-6 justify-center items-center bg-red-500 rounded-lg h-36 p-4 m-4">
                        <span class="text-2xl font-bold text-white">Dia {{date('d/m', strtotime($day->day))}}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
