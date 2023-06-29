<x-add-modal>
    <x-slot name="slot">
        <p class="text-sm"><span class="text-red-500 sups">*</span> Campo Obrigatório</p>
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-full">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Ponto de Interesse<span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <input type="text" name="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                </div>
                @error('name')
                    <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex-col col-span-6">
                <div>
                    <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Morada<span class="text-red-500 sups">*</span></label>
                    <div class="mt-2">
                        <input type="text" name="address_line1" placeholder="Ex: Praça São João Bosco, 34" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                    </div>
                </div>

                <div>
                    <div class="mt-2">
                        <input type="text" name="address_line2" placeholder="Ex: 1399-007, Lisboa" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                    </div>
                    @error('address_line1')
                    <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                    @error('address_line2')
                    <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="sm:col-span-full">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Descrição PT<span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <textarea rows="5" type="text" name="description_pt" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                </div>
                @error('description_pt')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-full">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Descrição EN<span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <textarea rows="5" type="text" name="description_en" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                </div>
                @error('description_pt')
                    <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-full">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Foto Ponto de Interesse <span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <input type="text" placeholder="Ex: https://www.salesianos.pt/wp-content/uploads/sites/2/2020/01/salesianos-lisboa-patio.jpg" name="picture" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                </div>
                @error('picture')
                    <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </x-slot>
</x-add-modal>