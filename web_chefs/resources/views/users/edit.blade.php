@extends('layouts.app')

@section('content')
    <div class="card col-3 m-auto p-0">
        <div class="card-header row m-0">
            <div class="row justify-content-between">
                <div class="col-8 mt-2">
                    Edit user
                </div>
                <div class="col-2">
                    <a href="{{ route('users.index') }}">
                        <button class="btn btn-primary">back</button>
                    </a>
                </div>
            </div>
        </div>

        <ul class="list-group list-group-flush">
            <form action="{{ route('user.update', auth()->user()) }}" method="post">
                @csrf
                @method('PUT')

                <div class="row mb-3 mt-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ $user->name }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="lastname" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                    <div class="col-md-6">
                        <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror"
                            name="lastname" value="{{ $user->lastname }}" required autocomplete="lastname" autofocus>

                        @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ $user->email }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row m-auto justify-content-center mb-3">
                    <button type="submit" class="btn btn-primary col-3">Update</button>
                </div>
            </form>
        </ul>
    </div>
@endsection
