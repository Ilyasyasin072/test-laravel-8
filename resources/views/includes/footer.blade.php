{{-- FOOTER --}}
<div class="container">
    <div class="footer">
        Copyright ILYAS YASIN © {{ now()->year }}
    </div>
</div>
@section('scripts')
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
@stack('js') @show
</body>

</html>