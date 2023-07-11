<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Contactos') }}
            @if ($errors->any())
                <div class="float-right bg-red-500 p-6 rounded-lg text-sm text-white">
                    <ul class="list-disc">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div x-data='{ show: false }' class="sm:px-6 lg:px-8 mb-8">
                    <button @click="show = true" type="button" class="btn block float-right rounded-md bg-black px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-gray-800">Adicionar Registo</button>
                    <x-add-contact/>
                </div>
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8 mb-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-black">
                            <tr>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">
                                    <a class="py-2 hover:underline cursor-pointer hover:font-bold">Nome</a>
                                </th>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6">
                                    <a class="py-2 hover:underline cursor-pointer hover:font-bold">Descrição PT</a>
                                </th>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6">
                                    <a class="py-2 hover:underline cursor-pointer hover:font-bold">Contacto</a>
                                </th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            @forelse($contacts as $contact)
                                <tr>
                                    <td class="whitespace-wrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$contact->person}}</td>
                                    <td class="whitespace-wrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$contact->person}}</td>
                                    <td class="whitespace-wrap px-3 py-4 text-sm text-gray-500">{{$contact->contact}}</td>
                                    <td class="w-36">
                                        @if(!auth()->user()->hasRole('notifier'))
                                            <div class="flex">
                                                <div x-data='{ show: false }' class="mr-2">
                                                    <button @click="show = true" type="button" class="rounded-md bg-green-700 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-green-600">Editar</button>
                                                    <x-edit-contact :contact="$contact"/>
                                                </div>
                                                @if(auth()->user()->hasRole('admin'))
                                                    <div x-data="{ show: false }" class="mr-2">
                                                        <button @click="show = true" type="button" class="rounded-md bg-red-500 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-red-400">Remover</button>
                                                        <x-confirmation-modal :model="$contact"/>
                                                    </div>
                                                @endif
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-lg p-8 text-gray-500">
                                        <div class="flex content-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                            </svg>

                                            <span>Sem registos disponíveis</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
