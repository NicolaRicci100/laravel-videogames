@extends('layouts.app')
@section('content')
    <div class="container">
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
                            <a href="{{ route('admin.videogames.show', $videogame) }}" class="btn btn-secondary"><i
                                    class="bi bi-eye"></i></a>
                            <a href="{{ route('admin.videogames.edit', $videogame) }}" class="btn btn-primary"><i
                                    class="bi bi-pen"></i></a>
                            <form class="d-inline" action="{{ route('admin.videogames.destroy', $videogame) }}"
                                method="POST">
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
