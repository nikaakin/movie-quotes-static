    <x-layout>
        <div class="flex items-center h-full min-h-screen flex-col text-white">
            @auth
                <x-button 
                href="{{ route('quotes.create', $movie->slug) }}" 
                class="right-5 top-5 absolute">{{ __('form.list.button') }}</x-button>
            @endauth

            <h1 class="my-20 text-5xl">{{ $movie->title }}</h1>
            
            
            @foreach ($movie->quotes as $quote)
                <div class="flex flex-col items-center w-175 border-black rounded-b-[10px] overflow-hidden mb-16 ">
                    <img src="{{asset('storage/photos').'/'. $quote->photo  }}" alt="alt" class=" w-full h-auto ">
                    <p class="text-4xl pb-10 pt-8 bg-white text-primary w-full break-normal">
                        {{ $quote->quote }}
                    </p>
                </div>       
            @endforeach

        </div>
    </x-layout>
