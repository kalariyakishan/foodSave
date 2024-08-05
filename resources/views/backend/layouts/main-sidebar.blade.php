<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- Sidebar header -->
				<div class="sidebar-section">
					<div class="sidebar-section-body d-flex justify-content-center">
						<h5 class="sidebar-resize-hide flex-grow-1 my-auto">Navigation</h5>

						<div>
							<button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
								<i class="ph-arrows-left-right"></i>
							</button>

							<button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
								<i class="ph-x"></i>
							</button>
						</div>
					</div>
				</div>
				<!-- /sidebar header -->


				<!-- Main navigation -->
				<div class="sidebar-section">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header pt-0">
							<div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Main</div>
							<i class="ph-dots-three sidebar-resize-show"></i>
						</li>
						<li class="nav-item">
							<a href="{{ route('home') }}" class="nav-link {{ (Request::is('home') ? 'active' : '') }}">
								<i class="ph-house"></i>
								<span>
									Dashboard
								</span>
							</a>
						</li>

						<li class="nav-item">
							<a href="{{ route('admins.index') }}" class="nav-link {{{ (Request::is('admins/*') ? 'active' : '') }}} || {{{ (Request::is('admins') ? 'active' : '') }}}">
								<i class="ph-user-circle-gear"></i>
								<span>
									Admins
								</span>
							</a>
						</li>

						<li class="nav-item">
							<a href="{{ route('users.index') }}" class="nav-link {{{ (Request::is('users/*') ? 'active' : '') }}} || {{{ (Request::is('users') ? 'active' : '') }}}">
								<i class="ph-users"></i>
								<span>
									Users
								</span>
							</a>
						</li>

						<li class="nav-item">
							<a href="{{ route('restaurants.index') }}" class="nav-link {{{ (Request::is('restaurants/*') ? 'active' : '') }}} || {{{ (Request::is('restaurants') ? 'active' : '') }}}">
								<i class="ph-handshake"></i>
								<span>
									Restaurants
								</span>
							</a>
						</li>
						
						<li class="nav-item">
							<a href="../../../../docs/other_changelog.html" class="nav-link">
								<i class="ph-list-numbers"></i>
								<span>Changelog</span>
								<span class="badge bg-primary align-self-center rounded-pill ms-auto">4.0</span>
							</a>
						</li>

						{{-- <li class="nav-item">
							<a href="../../../../docs/other_changelog.html" class="nav-link">
								<i class="ph-list-numbers"></i>
								<span>Changelog</span>
								<span class="badge bg-primary align-self-center rounded-pill ms-auto">4.0</span>
							</a>
						</li> --}}

						

						

					

						



						

						

					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->