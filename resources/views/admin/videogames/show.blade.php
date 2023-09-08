@extends('layouts.app')

@section('content')
    <section class="container mt-4">
        <header>
            <h1>{{ $videogame->title }}</h1>
        </header>
        <hr>
        <div class="clearfix">
            @if ($videogame->cover)
                <img class="float-start me-2 img-fluid" width="250" src="{{ $videogame->cover }}"
                    alt="{{ $videogame->title }}">
            @endif
            <p>{{ $videogame->description }}</p>
            <div class="d-flex justify-content-around">
                <span><strong>Release Date:</strong> {{ $videogame->release_date }}</span>
                <span><strong>Platform:</strong> {{ $videogame->platform }}</span>
                <span><strong>Publisher:</strong>
                    {{ $videogame->publisher ? $videogame->publisher->label : 'None' }}</span>
                <span><strong>Age Rating:</strong> {{ $videogame->age_rating }}</span>
                <span><strong>Vote:</strong> {{ $videogame->vote }}</span>
                <span><strong>Genre:</strong> {{ $videogame->genre }}</span>
                <span><strong>Price:</strong> {{ $videogame->price }}</span>
            </div>
        </div>
        <hr>
        <footer class="d-flex justify-content-between">
            <a href="{{ route('admin.videogames.index') }}" class="btn btn-outline-secondary">Return to List</a>
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.videogames.edit', $videogame) }}" class="btn btn-outline-warning">
                    <i class="fas fa-pencil"></i> Modify
                </a>
                <form action="{{ route('admin.videogames.destroy', $videogame) }}" method="POST" class="delete-form ms-2">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger">
                        <i class="fas fa-trash"></i> Eliminate
                    </button>
                </form>
            </div>
        </footer>
    </section>
@endsection
