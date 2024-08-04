@props([
	'url'=>null,
	'lightbox'=>false,
	'delete_url'=>null,
	'id'=>null,
	'title'=>null,
	'download'=>null,
	'class'=>'col-sm-6 col-lg-3'
])
<div class="{{ $class }}" id="{{ $id }}">
<div class="card">
	<div class="card-img-actions m-1">
		<img class="card-img img-fluid" src="{{ $url }}" alt="Preview">
		<div class="card-img-actions-overlay card-img">
			@if($lightbox)
			<a href="{{ $url }}" class="btn btn-outline-white btn-icon rounded-pill" data-bs-popup="lightbox" data-gallery="gallery1">
				<i class="ph-plus"></i>
			</a>
			@endif
			@if($delete_url)
			<a href="javascript::void(0);" onclick="confirmImageDelete('{{ $delete_url }}','{{ $id }}')" class="btn btn-outline-white btn-icon rounded-pill ms-2">
				<i class="ph-trash"></i>
			</a>
			@endif
		</div>
	</div>
	@if($title)
	<div class="card-body">
		<div class="d-flex align-items-start flex-nowrap">
			<div class="text-truncate">
				<div class="fw-semibold me-2" title="{{ $title }}">{{str_limit($title,20)}}</div>
				{{-- <span class="fs-sm text-muted">Size: 432kb</span> --}}
			</div>
			@if($download)
			<div class="d-inline-flex ms-auto">
				<a href="{{ $download }}" class="text-body" download="{{ $title }}"><i class="ph-download-simple"></i></a>
				<a href="{{ $download }}" class="text-body ms-2" target="__blank"><i class="ph-eye"></i></a>
			</div>
			@endif
		</div>
	</div>
	@endif
</div>

</div>