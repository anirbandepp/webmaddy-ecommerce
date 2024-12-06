<!-- Footer -->
<div class="footer text-muted">
    &copy; {{ date('Y') }}. <a href="#" target="_blank">
        Ecommerce Platform</a> Powered by
    <a href="https://www.webmaddy.com" target="_blank">Webmaddy</a>
</div>
<!-- /footer -->

<!-- notify js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"
    integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- /notify js -->

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

{{-- alert message --}}
@if (Session::has('success'))
    <script>
        $.notify("{{ ucwords(Session::get('success')) }}", "success");
    </script>
@elseif(Session::has('error'))
    <script>
        $.notify("{{ ucwords(Session::get('error')) }}", "error");
    </script>
@endif
{{-- end of alert message --}}
