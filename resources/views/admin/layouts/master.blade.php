<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="{{ asset('assets/upload/logo.png') }}" rel="icon">
	<title> @yield('page_title') | Admin </title>
	@include('admin.layouts.styles')
</head>

<body id="page-top">
<div id="wrapper">
	<!-- Sidebar -->
@include('admin.layouts.sidebar')
<!-- Sidebar -->

	<div id="content-wrapper" class="d-flex flex-column">
		<div id="content">
			<!-- TopBar -->
		@include('admin.layouts.topbar')
		<!-- TopBar -->

		@section('content')
		@show

		<!-- Modal Logout -->
			@include('admin.layouts.logout')
		</div>
		<!-- Footer -->
	@include('admin.layouts.footer')
	<!-- Footer -->
	</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

@include('admin.layouts.scripts')
@yield('scripts')
</body>

</html>
