<div class="overflow-hidden">
    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8 mb-8">
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-green-700">
                <tr>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">
                        <a wire:click="sortBy('current_progress')" class="py-2 hover:underline cursor-pointer hover:font-bold">Horas</a>
                    </th>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6">
                        <a wire:click="sortBy('action_id')" class="py-2 hover:underline cursor-pointer hover:font-bold">Título PT</a>
                    </th>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6">
                        <a wire:click="sortBy('action_id')" class="py-2 hover:underline cursor-pointer hover:font-bold">Título EN</a>
                    </th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">
                        <a wire:click="sortBy('content_en')" class="py-2 hover:underline cursor-pointer hover:font-bold">Local</a>
                    </th>
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    </th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                @forelse($entryDays as $entry)
                    <tr wire:loading.class.delay="opacity-50" wire:key="row-{{  $entry->id }}">
                        <td class="whitespace-wrap px-3 py-4 text-sm text-gray-500">
                            {{date('G:i', strtotime($entry->start_time))}} - {{date('G:i', strtotime($entry->end_time))}}
                        </td>
                        <td class="whitespace-wrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$entry->title_pt}}</td>
                        <td class="whitespace-wrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$entry->title_en}}</td>
                        <td class="whitespace-wrap px-3 py-4 text-sm text-gray-500">{{$entry->location}}</td>
                        <form method="POST" action="">
                            @csrf
                            <td class="w-36">
                                <div x-data="{ show: false }" class="flex my-auto mr-2">
                                    <a href="#" class="btn block rounded-md bg-green-700 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-green-600">Editar</a>
                                    <button @click="show = true" type="button" class="flex-1 ml-2 block rounded-md bg-red-500 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-red-400">Remover</button>
                                    <x-confirmation-modal></x-confirmation-modal>
                                </div>
                            </td>
                        </form>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-lg p-8 text-gray-500">
                            <div class="flex content-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                </svg>

                                <span>No Actions Available</span>
                            </div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>