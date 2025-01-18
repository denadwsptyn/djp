<!DOCTYPE html>
<html lang="id">
	<!--begin::Head-->
	<head>
		<title>{{ ENV('APP_NAME')}} - @yield('title')</title>
		<meta charset="utf-8" />
        <meta name="description" content="DJP SPT Tahunan - Sistem Pelaporan Pajak Tahunan yang memudahkan wajib pajak dalam melaporkan pajak tahunan mereka secara online." />
        <meta name="keywords" content="DJP, SPT Tahunan, pajak, pelaporan pajak, online, sistem pelaporan, wajib pajak, Indonesia" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:locale" content="id_ID" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="DJP SPT Tahunan - Sistem Pelaporan Pajak Tahunan Online" />
        <meta property="og:url" content="https://djp.online/spt-tahunan" />
        <meta property="og:site_name" content="DJP SPT Tahunan" />
        @include('partials.css')
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" class="app-default">
		<!--begin::Theme mode setup on page load-->
		<!--begin::App-->
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<!--begin::Page-->
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				<!--begin::Header-->
				@yield('header')
				<!--end::Header-->
				<!--begin::Wrapper-->
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
					<!--begin::Sidebar-->
					@include('partials.sidebar')
					<!--end::Sidebar-->
					<!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Content-->
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-xxl">
									<!--begin::Table widget 12-->
									@yield('content')
									<!--end::Table widget 12-->
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Content wrapper-->
						<!--begin::Footer-->
						@include('partials.footer')
						<!--end::Footer-->
					</div>
					<!--end:::Main-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::App-->
		<!--begin::Javascript-->
		@include('partials.js')
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
