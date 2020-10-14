<script src="{{ asset('js/sb-admin-2.js') }}"></script>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    })
</script>
@yield('script')
</body>

</html>