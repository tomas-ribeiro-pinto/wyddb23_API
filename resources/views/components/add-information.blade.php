<x-add-modal :width="'w-full'">
    <x-slot name="slot">
        <p class="text-sm"><span class="text-red-500 sups">*</span> Campo Obrigatório</p>
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-6 text-gray-900">Título PT 🇵🇹<span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <input type="text" name="title_pt" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                </div>
                @error('title_pt')
                    <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-6 text-gray-900">Título EN 🇬🇧<span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <input type="text" name="title_en" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                </div>
                @error('title_en')
                    <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-6 text-gray-900">Título ES 🇪🇸<span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <input type="text" name="title_es" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                </div>
                @error('title_es')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-6 text-gray-900">Título IT 🇮🇹<span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <input type="text" name="title_it" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                </div>
                @error('title_it')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-full">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Imagem <span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <input type="text" placeholder="Ex: https://www.salesianos.pt/wp-content/uploads/sites/2/2020/01/salesianos-lisboa-patio.jpg" name="image_url" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                </div>
                @error('image_url')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-full">
                <label class="block text-sm font-medium leading-6 text-gray-900">Conteúdo PT 🇵🇹<span class="text-red-500 sups">*</span></label>
                <input id="body_pt" type="hidden" value="{{old('body_pt')}}" name="body_pt">
                <trix-editor input="body_pt">{{old('body_pt')}}</trix-editor>
                @error('body_pt')
                    <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-full">
                <label class="block text-sm font-medium leading-6 text-gray-900">Conteúdo EN 🇬🇧<span class="text-red-500 sups">*</span></label>
                <input id="body_en" type="hidden" name="body_en">
                <trix-editor input="body_en"></trix-editor>
                @error('body_en')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-full">
                <label class="block text-sm font-medium leading-6 text-gray-900">Conteúdo ES 🇪🇸<span class="text-red-500 sups">*</span></label>
                <input id="body_es" type="hidden" name="body_es">
                <trix-editor input="body_es"></trix-editor>
                @error('body_es')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-full">
                <label class="block text-sm font-medium leading-6 text-gray-900">Conteúdo IT 🇮🇹<span class="text-red-500 sups">*</span></label>
                <input id="body_it" type="hidden" name="body_it">
                <trix-editor input="body_it"></trix-editor>
                @error('body_it')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </x-slot>
</x-add-modal>