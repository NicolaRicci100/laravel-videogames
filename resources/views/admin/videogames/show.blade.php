@extends('layouts.app')

@section('content')
    <div class="my-4">
        <h3>{{ $videogame->title }}</h3>
    </div>


    <div class="">
        <div class="card-top ">
            <div class="row">
                <div class="col-4">
                    <img src="{{ $videogame->cover }}" alt="">
                </div>
            </div>



        </div>
        <div class="row">
            <div class="col-8">

                <p class="">{{ $videogame->genre }}</p>
            </div>
            <div class="col-8">
                <h4 class="">{{ $videogame->release_date }}</h4>
                <p class="">{{ $videogame->price }}</p>
                <h4 class="">{{ $videogame->platform }}</h4>
                <h4 class="">{{ $videogame->age_rating }}</h4>
                <h4 class="">{{ $videogame->vote }}</h4>
                <p class="">{{ $videogame->description }}</p>

            </div>
        </div>
    </div>
@endsection
