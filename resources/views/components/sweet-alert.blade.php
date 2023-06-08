@if(session('success'))
    <div id="flash" data-flash="{{ session('success') }}"></div>
    @push('alert')
        <script>
            var flash = $('#flash').data('flash');
            if(flash){
                swal('Good Job', flash , 'success');
            }
        </script>
    @endpush
@endif