@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        {{ $booking->client->name }} {{ $booking->client->surname }} visit on {{ $booking->visit_at }}
                    </div>
                </div>
            </div>
        </div>
        @if($booking->status == 0)
            <div class="row py-3">
                <div class="col-sm-3">
                    <button class="btn btn-primary w-100" id="change-visit-status">Change visit status</button>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">Client information</div>

                    <div class="card-body">
                        <div>
                            Full name: {{ $booking->client->name }} {{ $booking->client->surname }}
                        </div>
                        <div>
                            Email: {{ $booking->client->email }}
                        </div>
                        <div>
                            Phone number: {{ $booking->client->phone_number }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">Visit information</div>
                    <div class="card-body">
                        <div>
                            Visit on {{ $booking->visit_at }}
                        </div>
                        <div>
                            Created at {{ $booking->created_at }}
                        </div>
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
                        @foreach($booking->client->getLastVisits() as $library)
                            <span style="float: left;">{{ $library->content }}</span>
                            <span style="float: right;">{{ $library->created_at }}</span>
                            <br />
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('library.index', $booking->client->id) }}">See full library</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-text')
    <script>
        $(function (){
            $('#change-visit-status').click(function (){
                Swal.fire({
                    icon: 'warning',
                    title: 'You want change visit status? You can do it only one time',
                    showDenyButton: false,
                    showCancelButton: true,
                    confirmButtonText: 'Change',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('booking.change', $booking->id) }}',
                            type: 'PUT',
                            success: function (response){
                                console.log(response)
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Status changed',
                                    showConfirmButton: false,
                                    timer: 1500
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
