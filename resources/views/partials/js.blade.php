<script>
    var hostUrl = "assets/";
</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<!--begin::Tooltip Initialization-->
<script>
    $(document).ready(function() {
        $('[data-bs-tooltip="tooltip"]').tooltip();
    });
</script>
@yield('scripts')
