<x-layout>
    <div class="text-white pt-32 text-center w-175  mx-auto">
        <h1 class=" text-2xl mb-8">
           {{ __('form.movie.edit') }}
            </h1>
        <form action="{{ route('movies.update', $movie->id) }}" method="POST">
            @csrf
            @method('PATCH')
            
            <div class="flex flex-col items-center mb-10 relative">
                <label for="title" class=" self-start mb-4">{{ __('form.movie.title-ka') }}</label>
                <input 
                name="title" 
                id="title" 
                rows="3" 
                class=" w-full bg-white text-slate-700 p-2" 
                placeholder="{{ __("form.movie.placeholder") }}"
                value="{{ $movie->title }}"
                />
                @error('title')            
                    <div class="text-red-500 text-sm -bottom-5 absolute">{{ $message }}</div>              
                @enderror
            </div>
          
            <div class="flex flex-col items-center mb-10 relative">
                <label for="title_geo" class=" self-start mb-4">{{ __('form.movie.title-en') }} </label>
                <input 
                name="title_geo" 
                id="title_geo" 
                rows="3" 
                class=" w-full bg-white text-slate-700 p-2" 
                placeholder="{{ __('form.movie.placeholder') }}"
                value="{{ $movie->title_geo }}"
                />
                @error('title_geo')
                    <div class="text-red-500 text-sm -bottom-5 absolute">{{ $message }}</div>              
                @enderror
            </div>
          

            <button type="submit" class=" bg-slate-700 px-5 py-2 hover:bg-slate-500 rounded">{{ __('form.movie.submit-edit') }}</button>
        </form>
    </div>
</x-layout>