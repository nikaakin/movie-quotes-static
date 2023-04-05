    <x-layout>
        <div class="flex items-center h-full min-h-screen flex-col text-white">
            <a 
            href="{{ route('quotes.create', $movie->slug) }}"" 
            class="absolute right-5 top-5 bg-slate-700 px-5 py-2 hover:bg-slate-500 rounded">
            Add a quote</a>
            <h1 class="my-20 text-5xl">{{ $movie->title }}</h1>
            
            
            @foreach ($movie->quotes as $quote)
                <div class="flex flex-col items-center w-175 border-black rounded-b-[10px] overflow-hidden mb-16 ">
                    <img src="/storage/{{ $quote->photo }}" alt="alt" class=" w-full h-auto ">
                    <p class="text-4xl pb-10 pt-8 bg-white text-primary w-full break-normal">
                        {{ $quote->quote }}
                    </p>
                </div>       
            @endforeach

        </div>
    </x-layout>
