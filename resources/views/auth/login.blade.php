<x-layout>

    <div class="mt-20 w-175 mx-auto text-white">
        <h1 class="text-4xl mb-10">{{ __('form.login.title') }}</h1>

        <form action="/login" method="post">
        @csrf

        <div class="flex flex-col items-center mb-10">
            <label for="email" class=" self-start mb-4">{{ __('form.login.email') }}</label>
            <input 
            name="email" 
            id="email" 
            type="text"
            class=" w-full bg-white text-slate-700 p-2" 
            placeholder="{{ __('form.login.placeholder') }} "
            />
            @error('email')
                <div class="text-red-500 text-sm">{{ $message }}</div>              
            @enderror
        </div>
     
        <div class="flex flex-col items-center mb-10">
            <label for="password" class=" self-start mb-4">{{ __('form.login.password') }}</label>
            <input 
            name="password" 
            id="password" 
            type="password"
            class=" w-full bg-white text-slate-700 p-2" 
            placeholder="{{ __('form.login.placeholder') }} "
            />
            @error('password')
                <div class="text-red-500 text-sm">{{ $message }}</div>              
            @enderror
        </div>

        <button 
        class="bg-slate-700 px-5 py-2 hover:bg-slate-500 rounded text-white " 
        type="submit">{{ __('form.login.submit') }}</button>

        </form>

        @if(session()->has("status"))
            <div class="text-red-500  text-lg mt-2">{{ session()->get("status") }}</div>
        @endif

    </div>
</x-layout>