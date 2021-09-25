@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                {{ $client->name }} {{ $client->surname }} library
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 15px; margin-bottom: 15px;">
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addToLibrary">Add to library</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Hairdresser</th>
                                <th scope="col">Content</th>
                                <th scope="col">Created at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($client->library()->orderBy('id', 'DESC')->get() as $library)
                                <tr>
                                    <td>{{ $library->hairdresser->name }} {{ $library->hairdresser->surname }}</td>
                                    <td>{{ $library->content }}</td>
                                    <td>{{ $library->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addToLibrary" tabindex="-1" aria-labelledby="addToLibraryLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add to library</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('library.store') }}">
                        @csrf
                        <input type="hidden" name="client_id" value="{{ $client->id }}">
                        <div class="form-group">
                            <label for="client_name_surname" class="col-form-label">Client name and surname</label>
                            <input type="text" class="form-control" id="client_name_surname" value="{{ $client->name }} {{ $client->surname }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="content" class="col-form-label">Visit content</label>
                            <textarea class="form-control" id="content" name="content">{{ old('content') }}</textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="add-to-library">Add</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-text')
    <script>
        $(function (){
            $('#add-to-library').click(function (){
                $.ajax({
                    url: '{{ route('library.store') }}',
                    type: 'POST',
                    data: {
                        hairdresser_id: {{ auth()->id() }},
                        client_id: {{ $client->id }},
                        content: $('#content').val(),
                        client_library_number: {{ $client->client_library_number }},
                        created_at: '{{ now() }}'
                    },
                    success: function (response){
                        Swal.fire({
                            icon: 'success',
                            title: 'Added to library',
                            showDenyButton: false,
                            showCancelButton: false,
                            confirmButtonText: 'Refresh',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        })
                    },
                    error: function (response){
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: response.responseJSON.message,
                            showConfirmButton: false,
                            timer: 10000
                        });
                    }
                });
            });
        });
    </script>
@endsection
