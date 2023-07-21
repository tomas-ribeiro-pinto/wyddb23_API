<div x-show="show" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true"
     style="display: none">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                <div class="absolute right-0 top-0 hidden pr-4 pt-4 sm:block">
                    <button x-on:click="show = false" type="button"
                            class="rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        <span class="sr-only">Close</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                             aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <form method="POST" action="/edit-map" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Adicionar Mapa</h2>
                            @if($map != null)
                                <div class="sm:col-span-full mb-4 mt-2">
                                    <label class="block text-sm font-medium leading-6 text-gray-900">Mapa Atual PT 🇵🇹</label>
                                    <a target="_blank" class="text-blue-500 underline" href="/storage/{{$map->url_pt}}">{{$map->url_pt}}</a>
                                </div>
                            @endif
                            <div class="sm:col-span-full mb-4">
                                <label class="block text-sm font-medium leading-6 text-gray-900">Mapa PT 🇵🇹</label>
                                <div class="mt-2">
                                    <input name="pdf_pt" type="file"
                                           accept=".pdf">
                                </div>
                                @error('pdf_pt')
                                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        @if($map != null)
                            <div class="sm:col-span-full mb-4 mt-2">
                                <label class="block text-sm font-medium leading-6 text-gray-900">Mapa Atual EN 🇬🇧</label>
                                <a target="_blank" class="text-blue-500 underline" href="/storage/{{$map->url_en}}">{{$map->url_en}}</a>
                            </div>
                        @endif
                        <div class="sm:col-span-full mb-4">
                            <label class="block text-sm font-medium leading-6 text-gray-900">Mapa EN 🇬🇧</label>
                            <div class="mt-2">
                                <input name="pdf_en" type="file"
                                       accept=".pdf">
                            </div>
                            @error('pdf_en')
                            <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        @if($map != null)
                            <div class="sm:col-span-full mb-4 mt-2">
                                <label class="block text-sm font-medium leading-6 text-gray-900">Mapa Atual ES 🇪🇸</label>
                                <a target="_blank" class="text-blue-500 underline" href="/storage/{{$map->url_es}}">{{$map->url_es}}</a>
                            </div>
                        @endif
                        <div class="sm:col-span-full mb-4">
                            <label class="block text-sm font-medium leading-6 text-gray-900">Mapa ES 🇪🇸</label>
                            <div class="mt-2">
                                <input name="pdf_es" type="file"
                                       accept=".pdf">
                            </div>
                            @error('pdf_es')
                            <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        @if($map != null)
                            <div class="sm:col-span-full mb-4 mt-2">
                                <label class="block text-sm font-medium leading-6 text-gray-900">Mapa Atual IT 🇮🇹</label>
                                <a target="_blank" class="text-blue-500 underline" href="/storage/{{$map->url_it}}">{{$map->url_it}}</a>
                            </div>
                        @endif
                        <div class="sm:col-span-full mb-4">
                            <label class="block text-sm font-medium leading-6 text-gray-900">Mapa IT 🇮🇹</label>
                            <div class="mt-2">
                                <input name="pdf_it" type="file"
                                       accept=".pdf">
                            </div>
                            @error('pdf_it')
                            <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                        <button type="submit"
                                class="inline-flex w-full justify-center rounded-md bg-black px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-gray-800 sm:ml-3 sm:w-auto">
                            Adicionar
                        </button>
                        <button x-on:click="show = false" type="button"
                                class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>