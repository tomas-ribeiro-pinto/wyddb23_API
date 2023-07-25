<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Moderação de Fotos #wyddonbosco23') }}
        </h2>
    </x-slot>

    <div class="flex py-2 justify-center items-center bg-amber-500 mx-auto text-center mb-4">
        <h2 class="font-bold text-xl underline text-white">Imagens Últimos 5 Posts</h2>
    </div>

    <div class="py-12">
        <div class="px-8">
            <a href="{{ route('posts-verified') }}" class="text-sm inline-flex items-center hover:underline font-semibold text-green-700 mb-6 float-right">
                Ver Fotos Aprovadas
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 fill-green-700">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>
        <div class="flex mx-auto sm:px-6 lg:px-8 justify-center items-center mb-8">
            <form method="POST" action="{{request()->fullUrl() . '/create'}}" enctype="multipart/form-data">
                @csrf
                <div class="flex bg-red-500 text-white rounded-lg">
                    <div class="flex-1 p-1 px-3">
                        <input id="content" name="content" type="file"
                               accept=".png, .jpg" required>
                    </div>
                    <button type="submit"
                            class="inline-flex w-full justify-center rounded-md bg-black px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-gray-800 sm:ml-3 sm:w-auto">
                        Adicionar Foto Manualmente
                    </button>
                </div>
            </form>
            <script>
                var uploadField = document.getElementById("content");

                uploadField.onchange = function() {
                    if(this.files[0].size > 2097152 * 8){
                        alert("Ficheiro é demasiado grande! Reduza o tamanho do ficheiro para menos de 16MB");
                        uploadField.value = "";
                    }
                };
            </script>
        </div>
        <div class="flex flex-wrap mx-auto sm:px-6 lg:px-8 justify-center items-center">
            @foreach($posts as $post)
                <div class="flex-col m-4 p-4 bg-amber-500 shadow-lg border border-gray-200 rounded-xl">
                    <img src="{{$post}}" class="h-56"/>
                    <form method="POST" action="{{request()->fullUrl() . '/add'}}">
                        @csrf
                        <input type="hidden" name="post" value="{{$post}}"/>
                        <button type="submit" class="rounded-md bg-green-700 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-green-600">
                            Adicionar Imagem
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
