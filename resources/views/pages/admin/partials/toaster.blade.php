<script type="text/javascript">
    function returnSuccess(success) {
        toastr.success(success);
    }
    function returnError(error) {
        toastr.error(error);
    }
</script>
@if (\Session::has('success'))
    <script type="text/javascript">
        returnSuccess('{!! \Session::get('success') !!}')
    </script>
@elseif(\Session::has('error'))
    <script type="text/javascript">
        returnError('{!! \Session::get('error') !!}')
    </script>
@endif