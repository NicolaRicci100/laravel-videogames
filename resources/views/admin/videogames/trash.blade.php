@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="buttons d-flex justify-content-end">
            <a href="{{ route('admin.videogames.dropAll') }}" class="btn btn-danger my-4 text-end">Delete all</a>
        </div>
        <table id="projects-table" class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Release Date</th>
                    <th scope="col">Price</th>
                    <th scope="col">Platform</th>
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
                        <td>{{ $videogame->created_at }}</td>
                        <td>{{ $videogame->updated_at }}</td>
                        <td class="vert">
                            <form class="d-inline" action="{{ route('admin.videogames.restore', $videogame) }}"
                                method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success"><i class="bi bi-recycle"></i></button>
                            </form>
                            <form class="d-inline" action="{{ route('admin.videogames.drop', $videogame) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-x-lg"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center w-100" colspan="10" style="width: 15%;">
                            <h2>Trash is empty</h2>
                        </td>
                    </tr>
                @endempty
        </tbody>
    </table>
    <div class="buttons d-flex justify-content-center">
        <a href="{{ route('admin.videogames.index') }}" class="btn btn-secondary my-4 text-end">Go back</a>
    </div>
</div>
@endsection
