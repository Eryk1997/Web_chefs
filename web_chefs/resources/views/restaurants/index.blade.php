@extends('layouts.app')

@section('content')
    @if (!is_null($restaurants))
        <div class="row">
            @foreach ($restaurants as $restaurant)
                <div class="card col-3 m-auto p-0">
                    <div class="card-header">
                        {{ $restaurant->name }}
                    </div>
                    @if (count($restaurant->users))
                        <ul class="list-group list-group-flush text-center">
                            @foreach ($restaurant->users as $user)
                                <li class="list-group-item">{{ $user->name }}</li>
                            @endforeach
                        @else
                            <li class="list-group-item">Brak pracowników</li>
                    @endif
                    </ul>

                </div>
            @endforeach
        </div>
    @else
        <div class="m-auto text-center mt-5">
            Brak restauracji
        </div>
    @endif
@endsection
