<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar História') }}
            @if ($errors->any())
                <div class="float-right bg-red-500 p-6 rounded-lg text-sm text-white">
                    <ul class="list-disc">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-4">
            <div class="mb-4 sm:px-6 lg:px-4">
                <a href="{{ route('story-group')}}" class="text-sm inline-flex items-center hover:underline font-semibold text-green-700 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-1 w-5 h-5 fill-green-700">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    Voltar atrás
                </a>
                <h2 class="text-2xl font-bold">Histórias - <span class="text-green-500">{{$storyGroup->title}}</span></h2>
            </div>
            <div class="overflow-hidden">
                <div class="sm:px-6 lg:px-8 mb-8">
                    <form method="POST" action="{{route('stories', [$storyGroup->id]) }}/add" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="group" value="{{$storyGroup->id}}"/>
                        <div class="flex bg-red-500 text-white rounded-lg float-right">
                            <div class="flex-1 p-1 px-3">
                                <input id="content" name="content" type="file"
                                       accept=".png, .jpg, .mp4" required>
                            </div>
                            <button type="submit"
                                    class="inline-flex w-full justify-center rounded-md bg-black px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-gray-800 sm:ml-3 sm:w-auto">
                                Adicionar
                            </button>
                        </div>
                    </form>
                    <script>
                        var uploadField = document.getElementById("content");

                        uploadField.onchange = function() {
                            if(this.files[0].size > 2097152){
                                alert("Ficheiro é demasiado grande! Reduza o tamanho do ficheiro para menos de 2MB");
                                uploadField.value = "";
                            };
                        };
                    </script>
                </div>
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8 mb-8">
                    <div class="sm:grid-cols-2 md:grid-cols-4 grid mt-6">
                        @foreach($stories as $story)
                            <div class="col-span-1 flex-col items-center justify-center border-gray-200 border p-2">
                                <div x-data='{ show: false }' class="sm:px-6 lg:px-8 mb-8">
                                    <button @click="show = true">
                                        <div class="flex bg-red-500 px-2 py-1 rounded-full text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Apagar
                                        </div>
                                    </button>
                                    <x-confirmation-modal :model="$story"/>
                                </div>
                                <div class="mt-1">
                                    @if(!$story->is_video)
                                        <img src="/storage/{{$story->content_url}}" class="mx-auto"/>
                                    @else
                                        <iframe src="/storage/{{$story->content_url}}" class="w-full h-80"></iframe>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>