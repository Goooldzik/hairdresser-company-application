@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        {{ $client->name }} {{ $client->surname }} profile
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-sm-3">
                <button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#addVisit">Add visit</button>
            </div>
            <div class="col-sm-3">
                <button type="button" class="btn btn-warning w-100" data-toggle="modal" data-target="#editClient">Edit client data</button>
            </div>
            <div class="col-sm-3">
                <button type="button" class="btn btn-danger w-100" id="delete-client">Delete client</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">Client information</div>

                    <div class="card-body">
                        <div>
                            Full name: {{ $client->name }} {{ $client->surname }}
                        </div>
                        <div>
                            Email: {{ $client->email }}
                        </div>
                        <div>
                            Phone number: {{ $client->phone_number }}
                        </div>
                        <div>
                            Client library number: {{ $client->client_library_number }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">Client visits</div>
                    <div class="card-body">
                        @foreach($client->bookings()->orderBy('id', 'desc')->get() as $booking)
                            <div>
                                {{ $booking->visit_at }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        Last 5 visits
                    </div>
                    <div class="card-body">
                        @foreach($client->library()->limit(5)->get() as $library)
                            <span style="float: left;">{{ $library->content }}</span>
                            <span style="float: right;">{{ $library->created_at }}</span>
                            <br />
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('library.index', $client->id) }}">See full library</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addVisit" tabindex="-1" aria-labelledby="addVisitLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addVisitLabel">Add new visit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label for="client_name" class="col-form-label">Client name</label>
                                <input type="text" class="form-control" id="client_name" name="client_name" value="{{ $client->name }}" disabled>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="client_surname" class="col-form-label">Client surname</label>
                                <input type="text" class="form-control" id="client_surname" name="client_surname" value="{{ $client->surname }}" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <label for="hairdresser">Select hairdresser</label>
                                <select class="form-control" id="hairdresser" name="hairdresser">
                                    @foreach($hairdressers->all() as $hairdresser)
                                        <option value="{{ $hairdresser->id }}" @if($hairdresser->user_id == auth()->id()) selected @endif>{{ $hairdresser->name }} {{ $hairdresser->surname }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <label for="booking_date" class="col-form-label">Booking date</label>
                                <input type="datetime-local" class="form-control" name="booking_date" id="booking_date" value="{{ old('booking_date') }}">
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
    <div class="modal fade" id="editClient" tabindex="-1" aria-labelledby="editClientLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editClientLabel">Edit client data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label for="client_name" class="col-form-label">Client name</label>
                                <input type="text" class="form-control" id="client_name" name="client_name" value="{{ $client->name }}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="client_surname" class="col-form-label">Client surname</label>
                                <input type="text" class="form-control" id="client_surname" name="client_surname" value="{{ $client->surname }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-4">
                                <label for="client_phone_number" class="col-form-label">Client phone number</label>
                                <input type="text" class="form-control" id="client_phone_number" name="client_phone_number" value="{{ $client->phone_number }}">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="client_email" class="col-form-label">Client email</label>
                                <input type="text" class="form-control" id="client_email" name="client_email" value="{{ $client->email }}">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="client_library_number" class="col-form-label">Client library number</label>
                                <input type="text" class="form-control" id="client_library_number" name="client_library_number" value="{{ $client->client_library_number }}" disabled>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="edit-client">Edit</button>
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
                    url: '{{ route('bookings.store') }}',
                    type: 'POST',
                    data: {
                        client_id: {{ $client->id }},
                        hairdresser_id: $('#hairdresser').val(),
                        visit_at: $('#booking_date').val(),
                        created_at: '{{ now() }}'
                    },
                    success: function (response){
                        Swal.fire({
                            icon: 'success',
                            title: 'Added new visit',
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

            $('#edit-client').click(function (){
                $.ajax({
                    url: '{{ route('clients.update', $client->id) }}',
                    type: 'PUT',
                    data: {
                        name: $('#client_name').val(),
                        surname: $('#client_surname').val(),
                        phone_number: $('#client_phone_number').val(),
                        email: $('#client_email').val(),
                        updated_at: '{{ now() }}'
                    },
                    success: function (response){
                        Swal.fire({
                            icon: 'success',
                            title: 'Edited client',
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

            $('#delete-client').click(function (){
                Swal.fire({
                    icon: 'warning',
                    title: 'You want delete client?',
                    showDenyButton: false,
                    showCancelButton: true,
                    confirmButtonText: 'Delete',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('clients.delete', $client->id) }}',
                            type: 'DELETE',
                            success: function (response){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Client removed'
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
                    }
                });
            });
        });
    </script>
@endsection
