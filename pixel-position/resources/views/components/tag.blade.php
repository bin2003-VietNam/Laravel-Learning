@props(['tag','size' => 'base'])

@php
    $classes = 'bg-white/10 
                    hover:bg-white/25 
                    rounded-xl 
                    font-bold
                    transition-colors
                    duration-200';

    if ($size === 'base') {
        $classes .= "py-1 px-3 text-base";
    }

    if ($size === 'small') {
        $classes .= "py-1 px-2 text-xs";
    }


@endphp

<a href="/tags/{{ strtolower($tag->name) }}"  class="{{ $classes }}">
    {{ $tag->name }}
</a>