@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your information</div>

                <div class="card-body">
                    You are hairdresser in company
                    <br />
                    <div>
                        Your number: {{ auth()->user()->hairdresser->hairdresser_number }}
                    </div>
                    <div>
                        Name: {{ auth()->user()->hairdresser->name }}
                    </div>
                    <div>
                        Surname: {{ auth()->user()->hairdresser->surname }}
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Your clients</div>

                <div class="card-body">
                    You have a {{ auth()->user()->hairdresser->clients->count() }} clients
                    <br />
                    <div class="row">
                        @foreach(auth()->user()->hairdresser->clients as $client)
                            <div class="col-sm-4">
                                <div>
                                    Client library number: {{ $client->client_library_number }}
                                </div>
                                <div>
                                    Client name: {{ $client->name }}
                                </div>
                                <div>
                                    Client surname: {{ $client->surname }}
                                </div>
                                <div>
                                    <a href="{{ route('library.index', $client->id) }}">Go to client library</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    Your clients today
                </div>
                <div class="card-body">
                    @foreach(auth()->user()
                        ->hairdresser
                        ->bookings()
                        ->where('status', 0)
                        ->where('visit_at', '<', Carbon\Carbon::tomorrow())
                        ->orderBy('id', 'desc')
                        ->get() as $booking)
                        <div>
                            <span style="float:left;">
                                {{ $booking->client->name }} {{ $booking->client->surname }}
                            </span>
                            <span style="float:right;">
                                {{ $booking->visit_at }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
