@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                Clients list
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 15px; margin-bottom: 15px;">
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addClient">Add client</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name and surname</th>
                                <th scope="col">Phone number</th>
                                <th scope="col">Email</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $client)
                                <tr>
                                    <td>{{ $client->name }} {{ $client->surname }}</td>
                                    <td>{{ $client->phone_number }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>
                                        <a href="{{ route('library.index', $client->id) }}">Go to client library</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $clients->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addClient" tabindex="-1" aria-labelledby="addClientLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new client</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('clients.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label for="client_name" class="col-form-label">Client name</label>
                                <input type="text" class="form-control" id="client_name" name="client_name" value="{{ old('client_name') }}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="client_surname" class="col-form-label">Client surname</label>
                                <input type="text" class="form-control" id="client_surname" name="client_surname" value="{{ old('client_surname') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-4">
                                <label for="client_phone_number" class="col-form-label">Client phone number</label>
                                <input type="text" class="form-control" id="client_phone_number" name="client_phone_number" value="{{ old('client_phone_number') }}">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="client_email" class="col-form-label">Client email</label>
                                <input type="text" class="form-control" id="client_email" name="client_email" value="{{ old('client_email') }}">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="client_library_number" class="col-form-label">Client library number</label>
                                <input type="text" class="form-control" id="client_library_number" name="client_library_number" value="{{ random_int(1000, 9999) }}" disabled>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="add-client">Add</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-text')
    <script>
        $(function (){
            $('#add-client').click(function (){
                $.ajax({
                    url: '{{ route('clients.store') }}',
                    type: 'POST',
                    data: {
                        hairdresser_id: {{ auth()->id() }},
                        name: $('#client_name').val(),
                        surname: $('#client_surname').val(),
                        client_library_number: $('#client_library_number').val(),
                        phone_number: $('#client_phone_number').val(),
                        email: $('#client_email').val(),
                        created_at: '{{ now() }}'
                    },
                    success: function (response){
                        if(!response.message) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Added new client',
                                showDenyButton: false,
                                showCancelButton: false,
                                confirmButtonText: 'Refresh',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            })
                        } else {
                            $('#client_library_number').prop('disabled', false);
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 10000
                            });
                        }
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
