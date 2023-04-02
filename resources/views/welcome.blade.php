<x-layout>
    <div class=" text-blue-900 ">{{ __("validation.test") }}</div>
     @foreach (config('language') as $lang)
        <a href="/{{ $lang }}">{{ ucwords($lang) }}</a>
     @endforeach
</x-layout>