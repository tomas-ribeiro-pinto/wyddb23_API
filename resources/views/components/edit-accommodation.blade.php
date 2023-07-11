<x-edit-modal :width="null">
    <x-slot name="slot">
        <p class="text-sm"><span class="text-red-500 sups">*</span> Campo Obrigatório</p>
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <input type="hidden" name="id" value="{{$accommodationLocation->id}}"/>
            <input type="hidden" name="location" value="{{$accommodationLocation->location}}"/>
            <div class="sm:col-span-full">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Centro<span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <input type="text" name="name" value="{{$accommodationLocation->name}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                </div>
                @error('name')
                    <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex-col col-span-3">
                <div>
                    <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Morada<span class="text-red-500 sups">*</span></label>
                    <div class="mt-2">
                        <input type="text" name="address_line1" value="{{$accommodationLocation->address_line1}}" placeholder="Ex: Praça São João Bosco, 34" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                    </div>
                </div>

                <div>
                    <div class="mt-2">
                        <input type="text" name="address_line2" value="{{$accommodationLocation->address_line2}}" placeholder="Ex: 1399-007, Lisboa" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                    </div>
                    @error('address_line1')
                    <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                    @error('address_line2')
                    <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="sm:col-span-3">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Contacto Telefónico<span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <input type="text" name="contact" value="{{$accommodationLocation->contact}}" placeholder="Ex: +351 910 000 000" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                </div>
                @error('contact')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-3">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Descrição PT 🇵🇹</label>
                <div class="mt-2">
                    <textarea rows="3" type="text" name="description_pt" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{$accommodationLocation->description_pt}}</textarea>
                </div>
                @error('description_pt')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-3">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Descrição EN 🇬🇧</label>
                <div class="mt-2">
                    <textarea rows="3" type="text" name="description_en" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{$accommodationLocation->description_en}}</textarea>
                </div>
                @error('description_pt')
                    <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-6 text-gray-900">Descrição ES 🇪🇸</label>
                <div class="mt-2">
                    <textarea rows="3" type="text" name="description_es" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{$accommodationLocation->description_es}}</textarea>
                </div>
                @error('description_es')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-6 text-gray-900">Descrição IT 🇮🇹</label>
                <div class="mt-2">
                    <textarea rows="3" type="text" name="description_it" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{$accommodationLocation->description_it}}</textarea>
                </div>
                @error('description_it')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-full">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Link Foto Centro</label>
                <div class="my-4">
                    <img src="{{$accommodationLocation->picture}}" width="auto"/>
                </div>
                <div class="mt-2">
                    <input type="text" placeholder="Ex: https://www.salesianos.pt/wp-content/uploads/sites/2/2020/01/salesianos-lisboa-patio.jpg" name="picture" value="{{$accommodationLocation->picture}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
                </div>
                @error('picture')
                    <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

        </div>
    </x-slot>
</x-edit-modal>