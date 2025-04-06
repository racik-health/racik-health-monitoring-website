@props(['href' => null, 'active' => null, 'icon' => null, 'text'])

<li>
    <a {{ $attributes->merge([
        'class' =>
            'w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg focus:outline-hidden transition-colors ' .
            ($active ?? request()->is($href) ? 'bg-gray-100' : 'hover:bg-gray-100'),
    ]) }}
        href="{{ $href }}">
        @if ($icon)
            <i class="{{ $icon }} text-xl"></i>
        @endif
        {{ $text }}
    </a>
</li>
