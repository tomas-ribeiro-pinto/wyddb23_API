<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Moderação de Fotos #wyddonbosco23') }}
        </h2>
    </x-slot>
    <div class="flex py-2 justify-center items-center bg-green-800 mx-auto text-center mb-4">
        <h2 class="font-bold text-xl underline text-white">Imagens Aprovadas</h2>
    </div>
    <div class="py-12">
        <div class="px-6">
            <a href="{{ route('posts') }}" class="text-sm inline-flex items-center hover:underline font-semibold text-green-700 mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-1 w-5 h-5 fill-green-700">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>

                Ver lista de fotos por validar
            </a>
        </div>
        <div class="flex flex-wrap mx-auto sm:px-6 lg:px-8 justify-center items-center">
            @foreach($posts as $post)
                <div class="flex-col m-4 p-4 bg-transparent shadow-lg border border-gray-200 rounded-xl">
                    <img src="{{$post->image_url}}" class="h-56"/>
                    <form method="POST" action="{{request()->fullUrl() . '/delete/' . $post->id}}">
                        @csrf
                        <button type="submit" class="mt-2 rounded-md bg-red-500 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-red-400">
                            Apagar
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
