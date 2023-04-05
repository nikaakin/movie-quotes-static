@props(['lang'])

@php
    $classes = "text-white border border-white bg-primary";
    
    if($lang === app()->getLocale()){
        $classes = "text-black border border-white bg-white";
    }
@endphp

<a 
{{ $attributes(['class'=> "w-14 h-14  rounded-full 
flex justify-center items-center text-2xl ". $classes]) }}
>
{{ $lang }}</a>