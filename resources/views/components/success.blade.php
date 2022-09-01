@if (session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
        class="fixed bg-gray-500 py-2 px-4 rounded-xl bottom-12 right-12 text-3xl drop-shadow-xl">
        <p class="text-white font-medium">{{ session('success') }}</p>
    </div>
@endif
