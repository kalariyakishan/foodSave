@props([
'href' => '/',
'label'=>'Back To List',
'class'=>''
])
<a href="{{ $href }}" type="button" class="btn btn-link flex-column {{ $class }}">
<i class="w-48px h-16px rounded-pill icon-arrow-left7 text-primary mb-2"></i>
<span class="text-dark">{{ $label }}</span>
</a>
