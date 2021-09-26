@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Hairdresser</th>
                                <th scope="col">Client</th>
                                <th scope="col">Content</th>
                                <th scope="col">Created at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($library as $lib)
                                <tr>
                                    <td>
                                        <a href="{{ route('hairdressers.show', $lib->hairdresser->id) }}">
                                            {{ $lib->hairdresser->name }} {{ $lib->hairdresser->surname }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('clients.show', $lib->client->id) }}">
                                            {{ $lib->client->name }} {{ $lib->client->surname }}
                                        </a>
                                    </td>
                                    <td>{{ $lib->content }}</td>
                                    <td>{{ $lib->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $library->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
