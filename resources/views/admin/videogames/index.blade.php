@extends('layouts.app')
@section('content')
    <div class="mx-5">
        @include('includes.alert')
        <div class="buttons d-flex justify-content-end">
            <a href="{{ route('admin.videogames.create') }}" class="btn btn-success me-2 my-4 text-end">Create new
                videogame</a>
            <a href="{{ route('admin.videogames.trash') }}" class="btn btn-secondary my-4 text-end">Go to the trash</a>
        </div>
        <table id="projects-table" class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Release Date</th>
                    <th scope="col">Price</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">Platforms</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Last Update</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($videogames as $videogame)
                    <tr class="align-middle">
                        <th scope="row">{{ $videogame->id }}</th>
                        <td>{{ $videogame->title }}</td>
                        <td>{{ $videogame->genre }}</td>
                        <td>{{ $videogame->release_date }}</td>
                        <td>{{ $videogame->price }}</td>
                        <td>{{ $videogame->platform }}</td>
                        <td>
                            @if ($videogame->publisher)
                                {{ $videogame->publisher->label }}
                            @else
                                -
                            @endif
                        <td>
                            @forelse ($videogame->platforms as $platform)
                                <span
                                    class="badge rounded-pill text-bg-{{ $platform->color }}">{{ $platform->name }}</span><br>
                            @empty
                                -
                            @endforelse
                        </td>
                        <td>{{ $videogame->created_at }}</td>
                        <td>{{ $videogame->updated_at }}</td>
                        <td class="vert">
                            <a href="{{ route('admin.videogames.show', $videogame) }}" class="btn btn-secondary"><i
                                    class="bi bi-eye"></i></a>
                            <a href="{{ route('admin.videogames.edit', $videogame) }}" class="btn btn-primary"><i
                                    class="bi bi-pen"></i></a>
                            <form class="d-inline delete-form" action="{{ route('admin.videogames.destroy', $videogame) }}"
                                method="POST" data-name="{{ $videogame->title }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-x-lg"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" style="width: 15%;">
                            <h2>Nothing to see here..</h2>
                        </td>
                    </tr>
                @endempty
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
@vite('resources/js/delete-confirm.js');
@endsection
