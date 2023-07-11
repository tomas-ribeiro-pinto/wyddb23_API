<x-edit-modal :width="null">
    <x-slot name="slot">
        <p class="text-sm"><span class="text-red-500 sups">*</span> Campo Obrigatório</p>
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <input type="hidden" name="id" value="{{$faq->id}}"/>
            <div class="sm:col-span-full">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Questão PT 🇵🇹<span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <input type="text" value="{{$faq->question_pt}}" name="question_pt" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                </div>
                @error('question_pt')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-full">
                <label class="block text-sm font-medium leading-6 text-gray-900">Descrição PT 🇵🇹<span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <textarea rows="3" type="text" name="answer_pt" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>{{$faq->answer_pt}}</textarea>
                </div>
                @error('description_pt')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-full">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Questão EN 🇬🇧<span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <input type="text" value="{{$faq->question_en}}" name="question_en" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                </div>
                @error('question_en')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-full">
                <label class="block text-sm font-medium leading-6 text-gray-900">Descrição EN 🇬🇧<span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <textarea rows="3" type="text" name="answer_en" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>{{$faq->answer_en}}</textarea>
                </div>
                @error('description_pt')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-full">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Questão ES 🇪🇸<span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <input type="text" value="{{$faq->question_es}}" name="question_es" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                </div>
                @error('question_es')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>


            <div class="sm:col-span-full">
                <label class="block text-sm font-medium leading-6 text-gray-900">Descrição ES 🇪🇸<span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <textarea rows="3" type="text" name="answer_es" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>{{$faq->answer_es}}</textarea>
                </div>
                @error('description_es')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-full">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Questão IT 🇮🇹<span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <input type="text" value="{{$faq->question_it}}" name="question_it" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                </div>
                @error('question_it')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-full">
                <label class="block text-sm font-medium leading-6 text-gray-900">Descrição IT 🇮🇹<span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <textarea rows="3" type="text" name="answer_it" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>{{$faq->answer_it}}</textarea>
                </div>
                @error('description_it')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </x-slot>
</x-edit-modal>