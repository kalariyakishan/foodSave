<div class="navbar navbar-sm navbar-footer border-top">
	<div class="container-fluid">
		<span>&copy; {{ \Carbon\Carbon::now()->year; }} <a href="/">Food Save</a> by <a href="/" target="_blank"> Limitless </a> </span>

		<ul class="nav" style="display:none;">
			<li class="nav-item">
				<a href="{{url('/Terms-Conditions')}}" class="navbar-nav-link navbar-nav-link-icon rounded" target="_blank">
					<div class="d-flex align-items-center mx-md-1">
						<i class="ph-lifebuoy"></i>
						<span class="d-none d-md-inline-block ms-2">Term Conditions</span>
					</div>
				</a>
			</li>
			<li class="nav-item ms-md-1">
				<a href="{{url('/Privacy')}}" class="navbar-nav-link navbar-nav-link-icon rounded" target="_blank">
					<div class="d-flex align-items-center mx-md-1">
						<i class="ph-file-text"></i>
						<span class="d-none d-md-inline-block ms-2">Privacy Policy</span>
					</div>
				</a>
			</li>
		</ul>
	</div>
</div>