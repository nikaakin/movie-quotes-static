<x-layout>
    <div class="text-white mt-32 text-center w-175  mx-auto">
        <h1 class=" text-2xl mb-8">
           {{ __('form.quote.title') }}
            </h1>
        <form action="{{ route('movies.store') }}" method="POST">
            @csrf
            <div class="flex flex-col items-center mb-10 relative">
                <label for="title" class=" self-start mb-4">{{ __('form.movie.title') }}</label>
                <input 
                name="title" 
                id="title" 
                rows="3" 
                class=" w-full bg-white text-slate-700 p-2" 
                placeholder="{{ __("form.movie.placeholder") }}"
                value="{{ old('title') }}"
                />
                @error('title')
                    <div class="text-red-500 text-sm -bottom-5">{{ $message }}</div>              
                @enderror
            </div>
          
            <div class="flex flex-col items-center mb-10 relative">
                <label for="slug" class=" self-start mb-4">{{ __('form.movie.slug') }} </label>
                <input 
                name="slug" 
                id="slug" 
                rows="3" 
                class=" w-full bg-white text-slate-700 p-2" 
                placeholder="{{ __('form.movie.placeholder') }}"
                value="{{ old('slug') }}"
                />
                @error('slug')
                    <div class="text-red-500 text-sm -bottom-5">{{ $message }}</div>              
                @enderror
            </div>
          

            <button type="submit" class=" bg-slate-700 px-5 py-2 hover:bg-slate-500 rounded">{{ __('form.movie.submit') }}</button>
        </form>
    </div>
</x-layout>