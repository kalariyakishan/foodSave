@props([
    'url' => '#',
    'datatable' => '#datatable',
    'type'=>''
])
<a href="#" onclick="confirmDelete('{{ $url }}','{{ $datatable }}','Delete Confirmation','Are you sure you want to delete this record','{{ $type }}')" class="dropdown-item" data-url="{{ $url }}">
    <i class="ph-trash me-2"></i>
    Delete
</a>
            