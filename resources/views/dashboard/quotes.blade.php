<x-layout>
    <x-dashboard-title/>

    <x-button class="right-5 top-5 absolute" href="{{ route('dashboard.movies') }}">{{ __('form.dashboard.movies') }}</x-button>
    
    <div class="block w-[70vw] mx-auto text-black text-center">
        <div class="w-full my-3  grid grid-cols-12  bg-slate-200 rounded px-5 py-3 items-center">
                <p class="text-xl font-bold border-r-2 border-black  mr-5 pr-5 basis-48 col-span-2">{{ __('form.movie.title') }}</p>
                <p class="text-xl font-bold  border-r-2 border-black mr-5 pr-5 col-span-6">{{ __('form.dashboard.quotes') }}</p>
                <div class=" text-xl font-bold col-span-4">
                    {{ __('form.dashboard.actions') }}
                </div>
        </div>
        @foreach ($quotes as $quote)
            <div class="w-[70vw] mx-auto text-black text-center">
                <div class="w-full my-3   grid grid-cols-12 bg-slate-50 rounded px-5 py-3 hover:bg-slate-200 items-center">
                <p class="text-base font-semibold border-r-2 border-black  mr-5 pr-5  col-span-2">
                    <a href="{{ route('movies.show', $quote->movie->slug ) }}" class="underline">{{ $quote->movie->title }}</a>    
                </p>
                <p class="text-base font-semibold  border-r-2 border-black mr-5 pr-5 col-span-6">{{ $quote->quote }}</p>
                <div class=" text-sm flex flex-row col-span-4">
                   <x-button class="mr-1" href="{{ route('quotes.create', $quote->movie->slug ) }}">{{ __('form.dashboard.create-quote') }}</x-button>
                   <x-button class="mr-1" href="{{ route('quotes.edit', $quote->id ) }}">{{ __('form.dashboard.edit') }}</x-button>
                   <form action="{{ route('quotes.destroy', $quote->id ) }}" method="POST">
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
    {{ $quotes->links() }}
</x-layout>
