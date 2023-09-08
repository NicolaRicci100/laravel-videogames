@extends('layouts.app')

@section('content')
    <div class="card-header  my-5 ">
        <h3>{{ $videogame->title }}</h3>
        <hr>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-2">
                <img src="{{ $videogame->cover }}" alt="" class="">
            </div>
            <div class="col-10 ">

                <h4>Date: <span class="text-primary">{{ $videogame->release_date }}</span></h4>
                <h4>Platform: <span class="text-primary">{{ $videogame->platform }}</span></h4>
                <h4>Age Rating: <span class="text-primary">{{ $videogame->age_rating }}</span></h4>
                <h4>Vote: <span class="text-primary">{{ $videogame->vote }}</span></h4>
                <h4>Gender: <span class="text-primary">{{ $videogame->genre }}</span></h4>
                <h4>Price: <span class="text-primary">{{ $videogame->price }}</span></h4>
                <h4>Platforms: @forelse ($videogame->platforms as $platform)
                        <span class="badge rounded-pill text-bg-{{ $platform->color }}">{{ $platform->name }}</span>
                    @empty
                        -
                    @endforelse
                </h4>
                <h4>Description:</h4>
                <p class="col-7 text-primary">{{ $videogame->description }}</p>

            </div>
        </div>
    </div>
@endsection
