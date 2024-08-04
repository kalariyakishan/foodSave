@props([
'href' => '/',
'label'=>'Add',
'class'=> '',
'id'=>''
])
<a href="{{ $href }}" id="{{ $id }}" type="button" class="btn btn-link flex-column {{ $class }}">
<i class="w-48px h-16px rounded-pill ph-plus text-primary mb-2"></i>
<span class="text-dark">{{ $label }}</span>
</a>

