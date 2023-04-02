@props(['lang'])

<a 
href="/{{ $lang }}" 
class="w-14 h-14  rounded-full 
flex justify-center items-center text-2xl 
{{ $lang === request()->session()->get('applocale') ? 
"text-black border border-white bg-white": "text-white border border-white bg-primary"}}"
>
{{ $lang }}</a>