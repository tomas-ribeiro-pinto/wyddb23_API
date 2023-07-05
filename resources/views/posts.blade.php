<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Moderação de Fotos #wyddonbosco23') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex flex-wrap mx-auto sm:px-6 lg:px-8 justify-center items-center">
            @foreach($posts as $post)
                <div class="flex-col m-4 p-4 bg-amber-500 shadow-lg border border-gray-200 rounded-xl">
                    <img src="{{$post->image_url}}" class="h-56"/>
                    <p class="text-white">Utilizador: {{$post->user_id}}</p>
                    <form method="POST" action="{{request()->fullUrl() . '/validate/' . $post->id}}">
                        @csrf
                        <button type="submit" class="rounded-md bg-green-700 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-green-600">
                            Validar Imagem
                        </button>
                    </form>
                    <form method="POST" action="{{request()->fullUrl() . '/delete/' . $post->id}}">
                        @csrf
                        <button type="submit" class="rounded-md bg-red-500 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-red-400">
                            Apagar
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
