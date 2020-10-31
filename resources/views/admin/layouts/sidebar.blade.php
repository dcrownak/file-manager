<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
		<div class="sidebar-brand-icon">
			<img src="{{ asset('assets/upload/logo2.png') }}">
		</div>
		<div class="sidebar-brand-text mx-3">File Manager</div>
	</a>
	<hr class="sidebar-divider my-0">
	<li class="nav-item">
		<a class="nav-link" href="index.html">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>
	<hr class="sidebar-divider">


	<li class="nav-item {{ activeMenu(['file.index']) }}">
		<a class="nav-link" href="{{ route('file.index') }}">
			<i class="fas fa-fw fa-chart-area"></i>
			<span>File Manager</span>
		</a>
	</li>

	<hr class="sidebar-divider">
	<div class="sidebar-heading">
		@lang('Settings Panel')
	</div>
	<li class="nav-item {{ activeMenu(['basicControl.index']) }}">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseControl" aria-expanded="true" aria-controls="collapseControl">
			<i class="fas fa-fw fa-columns"></i>
			<span>@lang('Control Panel')</span>
		</a>
		<div id="collapseControl" class="collapse {{ showMenu(['basicControl.index']) }}" aria-labelledby="headingControl" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">@lang('Control Panel')</h6>
				<a class="collapse-item {{ activeMenu(['basicControl.index']) }}" href="{{ route('basicControl.index') }}">@lang('Basic Control')</a>
			</div>
		</div>
	</li>

	<hr class="sidebar-divider">
	<div class="version" id="version-ruangadmin"></div>
</ul>
