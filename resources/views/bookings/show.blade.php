@extends('layouts.app')

@section('content')
    <div class="container">
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
                        @foreach($booking->client->library()->limit(5)->get() as $library)
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
