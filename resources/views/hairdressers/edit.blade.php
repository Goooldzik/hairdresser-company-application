@extends('layouts.app')

@if($hairdresser->id != $user->id)
    {{ redirect(url('/home')) }}
@endif

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if($errors->any())
                <div class="col-sm-12">
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                </div>
            @endif
            @if(session('status'))
                <div class="col-sm-12">
                    <div class="alert alert-primary">
                        @if(session('status'))
                            {{ session('status') }}
                        @endif
                    </div>
                </div>
            @endif
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                Edit your profile
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <form method="post" action="{{ route('hairdressers.update', $hairdresser->id) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="name">Your name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $hairdresser->name }}">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="surname">Your name</label>
                                    <input type="text" class="form-control" name="surname" id="surname" value="{{ $hairdresser->surname }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="phone_number">Your phone number</label>
                                    <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ $hairdresser->phone_number }}">
                                </div>
                                <div class="form-group col-sm-6">
                                    <div class="form-row">
                                        <div class="form-group col-sm-6">
                                            <label for="photo">Your photo</label>
                                            <input type="file" class="form-control" name="photo" id="photo">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            @if(!is_null($hairdresser->profile->photo_path))
                                                <img class="rounded" src="{{ asset('/storage' . $hairdresser->profile->photo_path) }}" alt="Your photo">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12">
                                    <label for="description">Your description</label>
                                    <textarea rows="5" class="form-control" name="description" id="description">{{ $hairdresser->profile->description }}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12">
                                    <button type="submit" class="btn btn-primary">Update your profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
