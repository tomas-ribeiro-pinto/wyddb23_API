<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Conteúdos SYM Day') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 sm:px-6 lg:px-8">
                <a href="{{ route('content') }}" class="text-sm inline-flex items-center hover:underline font-semibold text-green-700 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-1 w-5 h-5 fill-green-700">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    Voltar atrás
                </a>
            </div>
            <div class="p-4 mb-2 flex flex-wrap justify-center items-center">
                <a href="{{route('edit-guides')}}"
                   class="flex flex-1 justify-center items-center bg-orange-600 rounded-xl h-56 w-36 p-4 m-4">
                    <div class="flex-col">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto text-white mb-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                        </svg>

                        <p class="text-2xl font-bold text-white">Guiões</p>
                    </div>
                </a>
                <div x-data='{ show: false }' class="flex flex-1 justify-center items-center bg-orange-600 rounded-xl h-56 w-36 p-4 m-4">
                    <button @click="show = true" class="flex flex-1 justify-center items-center bg-orange-600 rounded-xl h-56 w-36 p-4 m-4">
                        <div class="flex-col">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto text-white mb-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" />
                            </svg>
                            <p class="text-2xl font-bold text-white">Mapa</p>
                        </div>
                    </button>
                    <x-edit-map :map="$map"/>
                </div>
                <a href="{{route('edit-timetable')}}"
                   class="flex flex-1 justify-center items-center bg-orange-600 rounded-xl h-56 w-36 p-4 m-4">
                    <div class="flex-col">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto text-white mb-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        <p class="text-2xl font-bold text-white">Horários</p>
                    </div>
                </a>
            </div>
            <div class="p-4 mb-2 flex flex-wrap justify-center items-center">
                <div x-data='{ show: false }' class="flex flex-1 justify-center items-center bg-orange-600 rounded-xl h-56 w-36 p-4 m-4">
                    <button @click="show = true" class="flex flex-1 justify-center items-center bg-orange-600 rounded-xl h-56 w-36 p-4 m-4">
                        <div class="flex-col">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto text-white mb-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                            </svg>
                            <p class="text-2xl font-bold text-white">Emergência</p>
                        </div>
                    </button>
                    <x-edit-emergency :emergency="$emergency"/>
                </div>
                <div x-data='{ show: false }' class="flex flex-1 justify-center items-center bg-orange-600 rounded-xl h-56 w-36 p-4 m-4">
                    <button @click="show = true" class="flex flex-1 justify-center items-center bg-orange-600 rounded-xl h-56 w-36 p-4 m-4">
                        <div class="flex-col">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto text-white mb-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                            </svg>
                            <p class="text-2xl font-bold text-white">SYM Forum</p>
                        </div>
                    </button>
                    <x-edit-link :link="$sym_forum" :action="'/sym-forum/edit-link'"/>
                </div>
                <div x-data='{ show: false }' class="flex flex-1 justify-center items-center bg-orange-600 rounded-xl h-56 w-36 p-4 m-4">
                    <button @click="show = true" class="flex flex-1 justify-center items-center bg-orange-600 rounded-xl h-56 w-36 p-4 m-4">
                        <div class="flex-col">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto text-white mb-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 20.25h12m-7.5-3v3m3-3v3m-10.125-3h17.25c.621 0 1.125-.504 1.125-1.125V4.875c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125z" />
                            </svg>
                            <p class="text-2xl font-bold text-white">Live Streaming</p>
                        </div>
                    </button>
                    <x-edit-link :link="$live_streaming" :action="'/live-streaming/edit-link'"/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
