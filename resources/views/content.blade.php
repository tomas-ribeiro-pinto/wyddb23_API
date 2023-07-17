<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Conteúdo APP WYD Don Bosco 23') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 mb-2 flex flex-wrap justify-center items-center">
                <a href="{{route('edit-agenda')}}"
                   class="flex flex-1 justify-center items-center bg-red-500 rounded-xl h-56 w-36 p-4 m-4">
                    <div class="flex-col">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto text-white mb-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-2xl font-bold text-white">Agenda</p>
                    </div>
                </a>
                <a href="{{route('edit-accommodation')}}"
                   class="flex flex-1 justify-center items-center bg-green-700 rounded-xl h-56 w-36 p-4 m-4">
                    <div class="flex-col">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto text-white mb-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <p class="text-2xl font-bold text-white">Centros de Acolhimento</p>
                    </div>
                </a>
                <a href="{{route('edit-visits')}}"
                   class="flex flex-1 justify-center items-center bg-amber-500 rounded-xl h-56 w-36 p-4 m-4">
                    <div class="flex-col">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 mx-auto text-white mb-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                        </svg>
                        <p class="text-2xl font-bold text-white">Pontos de Interesse</p>
                    </div>
                </a>
            </div>

            <div class="p-4 mb-2 flex flex-wrap justify-center items-center">
                <a href="{{route('symday')}}"
                   class="flex flex-1 justify-center items-center bg-orange-600 rounded-xl h-56 w-36 p-4 m-4">
                    <div class="flex-col">
                        <p class="text-2xl font-bold text-white">SYM Day</p>
                    </div>
                </a>
                <a href="{{route('fatima')}}"
                   class="flex flex-1 justify-center items-center bg-amber-800 rounded-xl h-56 w-36 p-4 m-4">
                    <div class="flex-col">
                        <p class="text-2xl font-bold text-white">Fátima</p>
                    </div>
                </a>
                <a href="{{route('edit-information')}}"
                   class="flex flex-1 justify-center items-center bg-blue-600 rounded-xl h-56 w-36 p-4 m-4">
                    <div class="flex-col">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto text-white mb-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        <p class="text-2xl font-bold text-white">Informações</p>
                    </div>
                </a>
            </div>
            <div class="p-4 mb-2 flex flex-wrap justify-center items-center">
                <a href="{{route('edit-contacts')}}"
                   class="flex flex-1 justify-center items-center bg-black rounded-xl h-56 w-36 p-4 m-4">
                    <div class="flex-col">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto text-white mb-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <p class="text-2xl font-bold text-white">Contactos</p>
                    </div>
                </a>
                <a href="{{route('edit-faqs')}}"
                   class="flex flex-1 justify-center items-center bg-purple-500 rounded-xl h-56 w-36 p-4 m-4">
                    <div class="flex-col">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto text-white mb-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                        </svg>
                        <p class="text-2xl font-bold text-white">FAQs</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
