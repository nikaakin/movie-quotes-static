<x-layout>
    <div class="flex items-center mt-48 flex-col text-white text-4xl">
        <img src="{{ $quote->movie->image }}" alt="alt" class=" w-175 h-auto mb-16">
        <p class="mb-28">“{{ $quote->getTranslation('quote', 'en') }}”</p>
        <h1><a href="/movies/{{ $quote->movie->slug }}" class="underline">{{ $quote->movie->title }}</a></h1>
    </div>
</x-layout>