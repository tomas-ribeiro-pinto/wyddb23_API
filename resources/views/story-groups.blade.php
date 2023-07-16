<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Histórias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div x-data='{ show: false }' class="sm:px-6 lg:px-8 mb-8">
                <button @click="show = true" type="button" class="btn block float-right rounded-md bg-black px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-gray-800">Adicionar Tópico</button>
                <x-add-story-group/>
            </div>
            <div class="p-4 mb-2 grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 space-y-6 justify-center items-center">
                @foreach($storyGroups as $storyGroup)
                    <div class="flex-col">
                        <div x-data='{ show: false }' class="sm:px-6 lg:px-8 mb-8 absolute">
                            <button @click="show = true">
                                <div class="flex bg-red-500 px-2 py-1 rounded-full text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Apagar
                                </div>
                            </button>
                            <x-confirmation-modal :model="$storyGroup"/>
                        </div>
                        <a href="{{route('stories', [$storyGroup->id])}}"
                           class="flex justify-center content-center">
                            <img src="/storage/{{$storyGroup->image_url}}" alt="" style="object-fit: cover" class="border-amber-300 border-4 p-1 h-56 w-56 rounded-full"/>
                        </a>
                        <p class="text-center font-bold text-2xl mt-2">{{$storyGroup->title}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
