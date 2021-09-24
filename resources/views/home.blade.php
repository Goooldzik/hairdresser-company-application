@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

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
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    You have a {{ auth()->user()->hairdresser->clients->count() }} clients
                    <br />
                    @foreach(auth()->user()->hairdresser->clients as $client)
                        <div>
                            Client libary: {{ $client->client_library_id }}
                        </div>
                        <div>
                            Client name: {{ $client->name }}
                        </div>
                        <div>
                            Client surname: {{ $client->surname }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
