<div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="fixed bg-amber-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
    <p class="text-lg font-bold leading-6 text-white">
        {{$message}}
    </p>
</div>
