<x-layout>
    <x-dashboard-title/>

    <x-button class="right-5 top-5 absolute" href="{{ route('dashboard.movies') }}">{{ __('form.dashboard.movies') }}</x-button>
    
         <div class="flex flex-col justify-center items-center w-[70vw] mx-auto text-black text-center">
             <div class="w-full my-3 mx-5 flex  bg-slate-200 rounded px-5 py-3 items-center">
                <p class="text-xl font-bold border-r-2 border-black  mr-5 pr-5 basis-48">{{ __('form.movie.title') }}</p>
                <p class="text-xl font-bold flex-1 border-r-2 border-black mr-5 pr-5">{{ __('form.dashboard.quotes') }}</p>
                <div class=" basis-80 text-xl font-bold">
                    {{ __('form.dashboard.actions') }}
                </div>
        </div>
        @foreach ($quotes as $quote)
            <div class="flex flex-col justify-center items-center w-[70vw] mx-auto text-black text-center">
                <div class="w-full my-3 mx-5 flex  bg-slate-50 rounded px-5 py-3 hover:bg-slate-200 items-center">
                <p class="text-base font-semibold border-r-2 border-black  mr-5 pr-5 basis-48">{{ $quote->movie->title }}</p>
                <p class="text-base font-semibold flex-1 border-r-2 border-black mr-5 pr-5">{{ $quote->quote }}</p>
                <div class="self-end  text-base flex flex-row">
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
