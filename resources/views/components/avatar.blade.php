@php
    $classes = match ($size) {
        'small' => 'w-8 h-8',
        'medium' => 'w-12 h-12',
        default => 'w-12 h-12',
    };
@endphp

<img src="{{ asset('storage/' . $src) }}" class="{{ $classes }} rounded-full object-cover" alt={{ $alt }}>
