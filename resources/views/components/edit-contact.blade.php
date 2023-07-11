<x-edit-modal :width="null">
    <x-slot name="slot">
        <p class="text-sm"><span class="text-red-500 sups">*</span> Campo Obrigatório</p>
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <input type="hidden" name="id" value="{{$contact->id}}"/>
            <div class="sm:col-span-3">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Nome<span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <input type="text" value="{{$contact->person}}" name="person" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                </div>
                @error('person')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-3">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Contacto<span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <input type="text" value="{{$contact->contact}}" name="contact" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                </div>
                @error('contact')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-span-3">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Descrição PT 🇵🇹</label>
                <div class="mt-2">
                    <input type="text" value="{{$contact->description_pt}}" name="description_pt" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
                </div>
                @error('description_pt')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-span-3">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Descrição EN 🇬🇧</label>
                <div class="mt-2">
                    <input type="text" value="{{$contact->description_en}}" name="description_en" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
                </div>
                @error('description_en')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-span-3">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Descrição ES 🇪🇸</label>
                <div class="mt-2">
                    <input type="text" value="{{$contact->description_es}}" name="description_es" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
                </div>
                @error('description_es')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-span-3">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Descrição IT 🇮🇹</label>
                <div class="mt-2">
                    <input type="text" value="{{$contact->description_it}}" name="description_it" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
                </div>
                @error('description_it')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </x-slot>
</x-edit-modal>