<x-edit-modal :width="'w-full'">
    <x-slot name="slot">
        <p class="text-sm"><span class="text-red-500 sups">*</span> Campo Obrigatório</p>
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <input type="hidden" name="id" value="{{$guide->id}}"/>
            <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-6 text-gray-900">Título PT 🇵🇹<span
                            class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <input type="text" value="{{$guide->title_pt}}" name="title_pt"
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
                    <input type="text" value="{{$guide->title_en}}" name="title_en"
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
                    <input type="text" value="{{$guide->title_es}}" name="title_es"
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
                    <input type="text" value="{{$guide->title_it}}" name="title_it"
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
                <x-trix-field :id="'body_pt_' . $guide->id" :name="'body_pt'" :value="$guide->body_pt->toTrixHtml()"/>
                @error('body_pt')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-full">
                <label class="block text-sm font-medium leading-6 text-gray-900">Conteúdo EN 🇬🇧<span
                            class="text-red-500 sups">*</span></label>
                <x-trix-field :id="'body_en_' . $guide->id" :name="'body_en'" :value="$guide->body_en->toTrixHtml()"/>
                @error('body_en')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="sm:col-span-full">
                <label class="block text-sm font-medium leading-6 text-gray-900">Conteúdo ES 🇪🇸<span
                            class="text-red-500 sups">*</span></label>
                <x-trix-field :id="'body_es_' . $guide->id" :name="'body_es'" :value="$guide->body_es->toTrixHtml()"/>
                @error('body_es')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-full">
                <label class="block text-sm font-medium leading-6 text-gray-900">Conteúdo IT 🇮🇹<span
                            class="text-red-500 sups">*</span></label>
                <x-trix-field :id="'body_it_' . $guide->id" :name="'body_it'" :value="$guide->body_pt->toTrixHtml()"/>
                @error('body_it')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </x-slot>
</x-edit-modal>