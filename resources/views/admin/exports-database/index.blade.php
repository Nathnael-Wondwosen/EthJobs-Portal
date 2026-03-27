@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Export Database</h1>
        </div>

        <div class="section-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Export Database</h4>

                    </div>
                    <div class="card-body">
    <div class="alert alert-success alert-has-icon">
        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
        <div class="alert-body">
            <div class="alert-title">Success</div>
            If you fire this action, it will export your entire database.
        </div>
        <form action="" class="mt-2 export-db">
            <button class="btn btn-success submit-button" type="submit">Export Database</button>
        </form>
    </div>
</div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
    $(document).ready(function() {
        $('.export-db').on('submit', function(e) {
            e.preventDefault();

            swal({
                title: 'Are you sure?',
                text: 'This action will export the entire database!',
                icon: 'warning',
                buttons: true,
                dangerMode: false,
            })
            .then((willExport) => {
                if (willExport) {
                    let url = $(this).attr('action');

                    $.ajax({
                        method: 'POST',
                        url: url,
                        data: {_token: "{{ csrf_token() }}"},
                        beforeSend: function() {
                            swal('Exporting database, please wait...', {
                                icon: 'info',
                                buttons: false,
                                closeOnClickOutside: false
                            });
                        },
                        success: function(response) {
                            swal(response.message, {
                                icon: 'success',
                            });

                            // Initiate the download
                        downloadFile(response.download_url);
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr);
                            swal(xhr.responseJSON.message, {
                                icon: 'error',
                            });
                        }
                    })
                }
            });
        })
    })
</script>
@endpush
