@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                Hairdressers list
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 15px; margin-bottom: 15px;">
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addHairdresser">Add hairdresser</button>
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
                            @foreach($hairdressers as $hairdresser)
                                <tr>
                                    <td>{{ $hairdresser->name }} {{ $hairdresser->surname }}</td>
                                    <td>{{ $hairdresser->profile->description }}</td>
                                    <td>{{ $hairdresser->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addHairdresser" tabindex="-1" aria-labelledby="addHairdresserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new hairdresser</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('hairdressers.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <label for="user_id">Select user</label>
                                <select class="form-control" id="user_id" name="user_id">
                                    @foreach($users as $user)
                                        @if(is_null($hairdressers->where('user_id', $user->id)->first()))
                                            <option value="{{ $user->id }}">{{ $user->name }} {{ $user->surname }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label for="hairdresser_name" class="col-form-label">Hairdresser name</label>
                                <input type="text" class="form-control" id="hairdresser_name" name="hairdresser_name" value="{{ old('hairdresser_name') }}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="hairdresser_surname" class="col-form-label">Hairdresser surname</label>
                                <input type="text" class="form-control" id="hairdresser_surname" name="hairdresser_surname" value="{{ old('hairdresser_surname') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label for="hairdresser_phone_number" class="col-form-label">Hairdresser phone number</label>
                                <input type="text" class="form-control" id="hairdresser_phone_number" name="hairdresser_phone_number" value="{{ old('hairdresser_phone_number') }}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="hairdresser_number" class="col-form-label">Hairdresser number</label>
                                <input type="text" class="form-control" id="hairdresser_number" name="hairdresser_number" value="{{ random_int(10000, 99999) }}" disabled>
                            </div>
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
                    url: '{{ route('hairdressers.store') }}',
                    type: 'POST',
                    data: {
                        user_id: $('#user_id').val(),
                        hairdresser_number: $('#hairdresser_number').val(),
                        name: $('#hairdresser_name').val(),
                        surname: $('#hairdresser_surname').val(),
                        phone_number: $('#hairdresser_phone_number').val(),
                        created_at: '{{ now() }}',
                    },
                    success: function (response){
                        console.log(response)
                        if(!response.message) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Added new hairdresser',
                                showDenyButton: false,
                                showCancelButton: false,
                                confirmButtonText: 'Refresh',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            })
                        } else {
                            $('#hairdresser_number').prop('disabled', false);
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
                            title: response.message,
                            showConfirmButton: false,
                            timer: 10000
                        });
                    }
                });
            });
        });
    </script>
@endsection
