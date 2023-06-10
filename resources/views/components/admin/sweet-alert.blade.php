@push('alert')
    <script>
        @if(session('success'))
            swal('Success', '{{ session('success') }}' , 'success');
        @elseif(session('error'))
            swal('Error', '{{ session('error') }}' , 'error');
        @endif

        $('body').on('click', '.btnDelete', function(e) {
            var form = $('#formDelete');
            e.preventDefault();

            swal({
                title: 'Apakah Anda yakin?',
                text: 'Setelah dihapus, Anda tidak akan dapat mengembalikan file ini!',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    let action = $(this).data('action');
                    form.attr('action', action);
                    form.submit();
                }
            });
        });
    </script>
@endpush