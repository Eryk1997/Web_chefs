@extends('layouts.app')

@section('content')
    @if (!is_null($user))
        <div class="row">
            <div class="card col-3 m-auto p-0">
                <div class="card-header">
                    User info
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Name: {{ $user->name }}</li>
                    <li class="list-group-item">Lastname: {{ $user->lastname }}</li>
                    <li class="list-group-item">Email: {{ $user->email }}</li>
                </ul>
            </div>
            <div class="card col-3 m-auto p-0">
                <div class="card-header">
                    All restaurants
                </div>
                <ul class="list-group list-group-flush">
                    @if (count($restaurants))
                        @foreach ($restaurants as $restaurant)
                            <div class="row m-0">
                                <li class="list-group-item col-6">Name: {{ $restaurant->name }}</li>
                                <form class="col-3" method="post" action="{{route('attach.restaurant',$restaurant)}}">
                                    @csrf
                                    @method('PUT')
                                    <input hidden name="permission" value="{{ $restaurant }}">
                                    <button class="btn btn-primary"
                                        @if ($user->restaurants->contains($restaurant)) disabled @endif>Attach</button>
                                </form>
                                <form class="col-3" method="post" action="{{route('detach.restaurant',$restaurant)}}">
                                    @csrf
                                    @method('PUT')
                                    <input hidden name="permission" value="{{ $restaurant }}">
                                    <button class="btn btn-danger"
                                        @if (!$user->restaurants->contains($restaurant)) disabled @endif>Detach</button>
                                </form>
                            </div>
                        @endforeach
                    @else
                        <li class="list-group-item">Brak restauracji</li>
                    @endif

                </ul>
            </div>
        </div>
    @else
        <div class="m-auto text-center mt-5">
            Brak takiego konta
        </div>
    @endif
@endsection
