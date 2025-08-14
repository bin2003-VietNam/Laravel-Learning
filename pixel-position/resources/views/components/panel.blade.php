@php
    $classes = 'p-4 bg-white/10 rounded-lg flex gap-x-6 border border-transparent hover:border-blue-800 cursor-pointer transition-colors duration-200 group';
@endphp
<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>