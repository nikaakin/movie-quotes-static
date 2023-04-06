<x-layout>
    <x-dashboard-title/>
    <div class="flex w-175 mx-auto justify-center gap-5">
        <x-button class="text-2xl font-bold" href="{{ route('dashboard.movies') }}">{{ __('form.dashboard.movies') }}</x-button>
        <x-button class="text-2xl font-bold" href="{{ route('dashboard.quotes') }}">{{ __('form.dashboard.quotes') }}</x-button>
    </div>
</x-layout>