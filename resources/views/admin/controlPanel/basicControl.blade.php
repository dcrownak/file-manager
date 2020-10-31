@extends('admin.layouts.master')
@section('page_title','Basic Control')
@push('extra_styles')
	<link href="{{ asset('assets/backend/css/select2.min.css') }}" rel="stylesheet" type="text/css">
@endpush
@section('content')
	<!-- Container Fluid-->
	<div class="container-fluid" id="container-wrapper">

		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">@lang('Basic Control')</h1>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="./">@lang('Home')</a></li>
				<li class="breadcrumb-item active" aria-current="page">@lang('Basic Control')</li>
			</ol>
		</div>

		<div class="row">
			<div class="col-lg-6">
				<!-- Basic Control -->
				<div class="card mb-4">
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary">@lang('Basic Control')</h6>
					</div>
					<div class="card-body">
						<form action="{{ route('basicControl.store') }}" method="post">
							@csrf
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group row">
										<label for="maxUploadFileSize" class="col-md-4 col-form-label">@lang('Max Upload File Size')</label>
										<div class="col-md-7">
											<input type="text" name="maxUploadFileSize" value="{{ $maxUploadFileSize }}"
												   class="form-control form-control-sm @error('maxUploadFileSize') is-invalid @enderror"
												   placeholder= "@lang('Max Upload File Size')">
											<div class="invalid-feedback">
												@error('maxUploadFileSize') @lang($message) @enderror
											</div>
										</div>
									</div>
								</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <div class="col-sm-4">@lang('Allow File Types')</div>
                                        <div class="col-sm-7">

                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" value="jpeg" name="fileType[]" id="jpeg" {{  (in_array('jpeg',$allowFileTypes) ? ' checked' : '') }}>
                                                <label class="custom-control-label" for="jpeg">@lang('jpeg')</label>
                                            </div>

                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" value="jpg" name="fileType[]" id="jpg" {{  (in_array('jpg',$allowFileTypes) ? ' checked' : '') }}>
                                                <label class="custom-control-label" for="jpg">@lang('jpg')</label>
                                            </div>

                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" value="png" name="fileType[]" id="png" {{  (in_array('png',$allowFileTypes) ? ' checked' : '') }}>
                                                <label class="custom-control-label" for="png">@lang('png')</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>



							</div>
							<div class="form-group row">
								<div class="col-sm-10">
									<input type="submit" name="submit" value="Submit" class="btn btn-primary btn-sm">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!---Container Fluid-->
@endsection
@push('extra_scripts')
	<script src="{{ asset('assets/backend/js/bootstrap-notify.min.js') }}"></script>
@endpush
@section('scripts')
	@include('admin.layouts.flash-message')
@endsection
