<x-layout>
    <div class="flex justify-center my-20">
        <h1 class="text-4xl font-bold text-gray-500">{{ __('form.dashboard.title') }}</h1>
    </div>
    <x-button class="right-5 top-5 absolute">{{ __('form.dashboard.button') }}</x-button>
    
    <div class="flex flex-col justify-center items-center w-175 mx-auto">
        @foreach ($quotes as $quote)
        <div>
            <p class="text-2xl font-bold text-gray-500">{{ $quote->quote }}</p>
            <p class="text-xl font-bold text-gray-500">{{ $quote->movie }}</p>

            {{-- movie name | quote | add quote to this movie | edit quote | delete quote --}}
        </div>
        @endforeach
    </div>
</x-layout>
