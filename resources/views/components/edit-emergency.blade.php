<div x-show="show" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true"
     style="display: none">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 w-full sm:p-6">
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
                <form method="POST" action="/edit-emergency">
                    @csrf
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Editar Emergência</h2>
                            <p class="text-sm"><span class="text-red-500 sups">*</span> Campo Obrigatório</p>
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-3">
                                    <label class="block text-sm font-medium leading-6 text-gray-900">Título PT 🇵🇹<span
                                                class="text-red-500 sups">*</span></label>
                                    <div class="mt-2">
                                        <input type="text" value="{{$emergency->title_pt}}" name="title_pt"
                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                               required/>
                                    </div>
                                    @error('title_pt')
                                    <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="sm:col-span-3">
                                    <label class="block text-sm font-medium leading-6 text-gray-900">Título EN 🇬🇧<span
                                                class="text-red-500 sups">*</span></label>
                                    <div class="mt-2">
                                        <input type="text" value="{{$emergency->title_en}}" name="title_en"
                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                               required/>
                                    </div>
                                    @error('title_en')
                                    <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="sm:col-span-3">
                                    <label class="block text-sm font-medium leading-6 text-gray-900">Título ES 🇪🇸<span
                                                class="text-red-500 sups">*</span></label>
                                    <div class="mt-2">
                                        <input type="text" value="{{$emergency->title_es}}" name="title_es"
                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                               required/>
                                    </div>
                                    @error('title_es')
                                    <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="sm:col-span-3">
                                    <label class="block text-sm font-medium leading-6 text-gray-900">Título IT 🇮🇹<span
                                                class="text-red-500 sups">*</span></label>
                                    <div class="mt-2">
                                        <input type="text" value="{{$emergency->title_it}}" name="title_it"
                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                               required/>
                                    </div>
                                    @error('title_it')
                                    <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="sm:col-span-full">
                                    <label class="block text-sm font-medium leading-6 text-gray-900">Conteúdo PT 🇵🇹<span
                                                class="text-red-500 sups">*</span></label>
                                    <x-trix-field :id="'body_pt_' . $emergency->id" :name="'body_pt'" :value="$emergency->body_pt->toTrixHtml()"/>
                                    @error('body_pt')
                                    <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="sm:col-span-full">
                                    <label class="block text-sm font-medium leading-6 text-gray-900">Conteúdo EN 🇬🇧<span
                                                class="text-red-500 sups">*</span></label>
                                    <x-trix-field :id="'body_en_' . $emergency->id" :name="'body_en'" :value="$emergency->body_en->toTrixHtml()"/>
                                    @error('body_en')
                                    <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="sm:col-span-full">
                                    <label class="block text-sm font-medium leading-6 text-gray-900">Conteúdo ES 🇪🇸<span
                                                class="text-red-500 sups">*</span></label>
                                    <x-trix-field :id="'body_es_' . $emergency->id" :name="'body_es'" :value="$emergency->body_es->toTrixHtml()"/>
                                    @error('body_es')
                                    <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="sm:col-span-full">
                                    <label class="block text-sm font-medium leading-6 text-gray-900">Conteúdo IT 🇮🇹<span
                                                class="text-red-500 sups">*</span></label>
                                    <x-trix-field :id="'body_it_' . $emergency->id" :name="'body_it'" :value="$emergency->body_it->toTrixHtml()"/>
                                    @error('body_it')
                                    <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                        <button type="submit"
                                class="inline-flex w-full justify-center rounded-md bg-black px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-gray-800 sm:ml-3 sm:w-auto">
                            Guardar
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