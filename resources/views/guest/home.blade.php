@extends('layouts.app')
@section('content')
    <div class="card text-bg-dark rounded-0">


        <div class="jumbotron p-5 mb-4 rounded-3">
            <h1>Our video games</h1>
            @forelse ($videogames as $videogame)
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $videogame->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted"> <strong>Genre: </strong>{{ $videogame->genre }}</h6>
                        <div class="clearfix">
                            <img class="float-start me-2" src="{{ $videogame->cover }}" alt="{{ $videogame->title }}">
                            <p class="card-text">{{ $videogame->description }}</p>
                        </div>
                        <div class="d-flex justify-content-end">
                            <p><strong>Platform: </strong>{{ $videogame->platform }}</p>
                            <p class="mx-4"><strong>Vote: </strong>{{ $videogame->vote }}</p>
                            <p><strong>Min age: </strong>{{ $videogame->age_rating }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <h3 class="text-center">There are no games</h3>
            @endforelse
        </div>
    </div>
@endsection
