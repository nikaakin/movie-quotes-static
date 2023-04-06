<x-layout>
    <x-dashboard-title/>
    <x-button class="mr-1 fixed bottom-1/2 right-5" href="{{ route('movies.create' ) }}">{{ __('form.dashboard.create-movie') }}</x-button>

    <x-button class="right-5 top-5 absolute" href="{{ route('dashboard.quotes') }}">{{ __('form.dashboard.quotes') }}</x-button>
    
         <div class="flex flex-col justify-center items-center w-[70vw] mx-auto text-black text-center">
             <div class="w-full my-3 mx-5 flex  bg-slate-200 rounded px-5 py-3 items-center">
                <p class="text-xl font-bold border-r-2 border-black  mr-5 pr-5 basis-48">{{ __('form.movie.title') }}</p>
                <p class="text-xl font-bold flex-1 border-r-2 border-black mr-5 pr-5">{{ __('form.movie.slug') }}</p>
                <div class="self-end  basis-80 text-xl font-bold">
                    {{ __('form.dashboard.actions') }}
                </div>
        </div>
        @foreach ($movies as $movie)
            <div class="flex flex-col justify-center items-center w-[70vw] mx-auto text-black text-center">
                <div class="w-full my-3 mx-5 flex  bg-slate-50 rounded px-5 py-3 hover:bg-slate-200 items-center">
                <p class="text-base font-semibold border-r-2 border-black  mr-5 pr-5 basis-48">{{ $movie->title }}</p>
                <p class="text-base font-semibold border-r-2 border-black  mr-5 pr-5 flex-1">{{ $movie->slug }}</p>
                <div class="self-end  flex flex-row text-sm">
                    <x-button class="mr-1" href="{{ route('quotes.create', $movie->slug ) }}">{{ __('form.dashboard.create-quote') }}</x-button>
                   <x-button class="mr-1" href="{{ route('movies.edit', $movie->id ) }}">{{ __('form.dashboard.edit') }}</x-button>
                   <form action="{{ route('movies.destroy', $movie->id ) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                        <x-button class="mr-1 block">{{ __('form.dashboard.delete') }}</x-button>
                    </button>
                   </form>
                </div>
             </div>
        @endforeach
        
    </div>
    {{ $movies->links() }}
</x-layout>
