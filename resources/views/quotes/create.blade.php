<x-layout>
    <div class="text-white mt-32 text-center w-175  mx-auto">
        <h1 class=" text-2xl mb-8">
           {{ __('form.quote.title') }}
             <a href="{{ route('movies.show', $movie->slug) }}"  class="underline"> {{ $movie->title }}</a>
            </h1>
        <form action="/quotes/store" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="movie_id" value="{{ $movie->id }}">
            <input type="hidden" name="movie_slug" value="{{ $movie->slug }}">
            <div class="flex flex-col items-center mb-10 relative">
                <label for="quote[en]" class=" self-start mb-4">{{ __('form.quote.en') }}</label>
                <textarea 
                name="quote[en]" 
                id="quote[en]" 
                rows="3" 
                class=" w-full bg-white text-slate-700 p-2" 
                placeholder="{{ __("form.quote.placeholder") }}"
                >{{ old('quote[en]') }}</textarea>
                @error('quote.en')
                    <div class="text-red-500 text-sm -bottom-5 absolute">{{ $message }}</div>              
                @enderror
            </div>
          
            <div class="flex flex-col items-center mb-10 relative">
                <label for="quote[ka]" class=" self-start mb-4">{{ __('form.quote.ka') }} </label>
                <textarea 
                name="quote[ka]" 
                id="quote[ka]" 
                rows="3" 
                class=" w-full bg-white text-slate-700 p-2" 
                placeholder="{{ __('form.quote.placeholder') }}"
                >{{ old('quote[ka]') }}</textarea>
                @error('quote.ka')
                    <div class="text-red-500 text-sm -bottom-5 absolute">{{ $message }}</div>              
                @enderror
            </div>
          
            <div class="flex flex-col items-center mb-10 relative">
                <label for="photo" class=" self-start mb-4">{{ __('form.quote.photo') }} </label>
                <input id="photo" name="photo" type="file" class="bg-white text-slate-700">
                @error('photo')
                     <div class="text-red-500 text-sm -bottom-5 absolute">{{ $message }}</div>              
                 @enderror
            </div>

            <button type="submit" class=" bg-slate-700 px-5 py-2 hover:bg-slate-500 rounded">{{ __('form.quote.submit') }}</button>
        </form>
    </div>
</x-layout>