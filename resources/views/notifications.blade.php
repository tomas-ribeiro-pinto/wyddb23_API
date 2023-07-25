<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notificações APP WYD Don Bosco 23') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex items-center justify-center">
            <div class="p-4 mb-2 w-1/2">
                <form method="POST">
                    @csrf
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 md:grid-cols-6">
                        <div class="col-span-full">
                            <p class="text-sm"><span class="text-red-500 sups">*</span> Campo Obrigatório</p>
                            <div x-data='{ show: false }' class="sm:px-6 lg:px-8 mb-8">
                                <button @click="show = true" type="button" class="btn block float-right rounded-md bg-black px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-gray-800">Enviar Notificação</button>
                                <x-confirm-notification/>
                            </div>
                        </div>
                        <div class="flex-col sm:col-span-3">
                            <div>
                                <label class="block text-sm font-medium leading-6 text-gray-900">Título PT 🇵🇹<span class="text-red-500 sups">*</span></label>
                                <div class="mt-2">
                                    <input type="text" name="title_pt" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                                </div>
                                @error('title_pt')
                                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium leading-6 text-gray-900">Conteúdo PT 🇵🇹<span class="text-red-500 sups">*</span></label>
                                <div class="mt-2">
                                    <textarea rows="3" name="body_pt" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required></textarea>
                                </div>
                                @error('body_pt')
                                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex-col sm:col-span-3">
                            <div>
                                <label class="block text-sm font-medium leading-6 text-gray-900">Título EN 🇬🇧<span class="text-red-500 sups">*</span></label>
                                <div class="mt-2">
                                    <input type="text" name="title_en" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                                </div>
                                @error('title_en')
                                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium leading-6 text-gray-900">Conteúdo EN 🇬🇧<span class="text-red-500 sups">*</span></label>
                                <div class="mt-2">
                                    <textarea rows="3" name="body_en" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required></textarea>
                                </div>
                                @error('body_en')
                                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="flex-col sm:col-span-3">
                            <div>
                                <label class="block text-sm font-medium leading-6 text-gray-900">Título ES 🇪🇸<span class="text-red-500 sups">*</span></label>
                                <div class="mt-2">
                                    <input type="text" name="title_es" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                                </div>
                                @error('title_es')
                                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium leading-6 text-gray-900">Conteúdo ES 🇪🇸<span class="text-red-500 sups">*</span></label>
                                <div class="mt-2">
                                    <textarea rows="3" name="body_es" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required></textarea>
                                </div>
                                @error('body_es')
                                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="flex-col sm:col-span-3">
                            <div>
                                <label class="block text-sm font-medium leading-6 text-gray-900">Título IT 🇮🇹<span class="text-red-500 sups">*</span></label>
                                <div class="mt-2">
                                    <input type="text" name="title_it" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                                </div>
                                @error('title_it')
                                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium leading-6 text-gray-900">Conteúdo IT 🇮🇹<span class="text-red-500 sups">*</span></label>
                                <div class="mt-2">
                                    <textarea rows="3" name="body_it" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required></textarea>
                                </div>
                                @error('body_it')
                                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="flex-col sm:col-span-3">
                            <div>
                                <label class="block text-sm font-medium leading-6 text-gray-900">Redirecionar para Ecrâ</label>
                                <div class="mt-2">
                                    <p class="text-sm mb-2">Selecione o ecrã em que a notificação abrirá. Se deixar em branco, o ecrã principal será aberto.</p>
                                    <select class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" name="screen">
                                        <option selected></option>
                                        @foreach(['welcome', 'symDay', 'prayers', 'agenda', 'guides', 'accommodation', 'visit'] as $option)
                                            <option value="{{$option}}">{{$option}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('body_it')
                                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex-col sm:col-span-3">
                            <div class="sm:col-span-full">
                                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Redirecionar para URL</label>
                                <div class="mt-2">
                                    <input type="text" placeholder="Ex: https://www.salesianos.pt/wp-content/uploads/sites/2/2020/01/salesianos-lisboa-patio.jpg" name="url" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                                </div>
                                @error('picture')
                                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
