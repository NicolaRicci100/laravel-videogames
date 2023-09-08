@extends('layouts.app')
@section('content')
    {{-- CONTAINER --}}
    <div class="container mt-1 p-3 border border-dark rounded shadow-lg">

        {{-- FORM HEADER --}}
        <div class="d-flex justify-content-between align-items-center border-bottom border-secondary mb-4">
            <h1>Add a Videogame</h1>
            <a class="btn btn-dark" href="{{ route('admin.videogames.index') }}"><i class="bi bi-arrow-left"></i>Back</a>
        </div>

        {{-- FORM BODY --}}
        <form action="{{ route('admin.videogames.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    {{-- TITLE --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control border border-dark" id="title" name="title"
                            value="{{ old('title') }}" required>
                    </div>
                    {{-- GENRE --}}
                    <div class="mb-3">
                        <label for="genre" class="form-label">Genre</label>
                        <input type="text" class="form-control border border-dark" id="genre" name="genre"
                            value="{{ old('genre') }}">
                    </div>
                    {{-- COVER --}}
                    <div class="mb-3">
                        <label for="cover" class="form-label">Cover</label>
                        <input type="text" class="form-control border border-dark" id="cover" name="cover"
                            value="{{ old('cover') }}" oninput="updatePreviewImage()">
                    </div>
                    {{-- COVER PREVIEW --}}
                    <div class="d-flex justify-content-center">
                        <img src="{{ old('cover', 'https://www.pulsecarshalton.co.uk/wp-content/uploads/2016/08/jk-placeholder-image.jpg') }}"
                            alt="preview" id="create-preview-cover" height="200" width="400">
                    </div>
                    {{-- RELEASE DATE --}}
                    <div class="mb-3">
                        <label for="release_date" class="form-label">Release date</label>
                        <input type="date" class="form-control border border-dark" id="release_date" name="release_date"
                            value="{{ old('release_date') }}">
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="publisher" class="form-label">Publisher</label>
                            <select name="publisher_id" id="publisher" class="form-select">
                                <option value="">None</option>
                                @foreach ($publishers as $publisher)
                                    <option @if (old('publisher_id', $videogame->publisher_id) == $publisher->id) selected @endif value="{{ $publisher->id }}">
                                        {{ $publisher->label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-6 border-start border-dark">

                    {{-- PRICE --}}
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" step="0.01" class="form-control border border-dark" id="price"
                            name="price" value="{{ old('price') }}">
                    </div>
                    {{-- PLATFORM --}}
                    <div class="mb-3">
                        <label for="platform" class="form-label">Platform</label>
                        <input type="text" class="form-control border border-dark" id="platform" name="platform"
                            value="{{ old('platform') }}">
                    </div>
                    {{-- DESCRIPTION --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control border border-dark" id="description" name="description" rows="2">{{ old('description') }}"</textarea>
                    </div>
                    {{-- AGE RATING --}}
                    <div class="mb-3">
                        <label for="age_rating" class="form-label">Age rating</label>
                        <select class="form-select border border-dark" id="age_rating" name="age_rating">
                            <option value="3" {{ old('age_rating') == '3' ? 'selected' : '' }}>3</option>
                            <option value="6" {{ old('age_rating') == '6' ? 'selected' : '' }}>6</option>
                            <option value="9" {{ old('age_rating') == '9' ? 'selected' : '' }}>9</option>
                            <option value="12" {{ old('age_rating') == '12' ? 'selected' : '' }}>12</option>
                            <option value="16" {{ old('age_rating') == '16' ? 'selected' : '' }}>16</option>
                            <option value="18" {{ old('age_rating') == '18' ? 'selected' : '' }}>18</option>
                        </select>
                    </div>
                    {{-- VOTE --}}
                    <div class="mb-5">
                        <label for="vote" class="form-label">Vote</label>
                        <input type="number" class="form-control border border-dark" id="vote" name="vote"
                            value="{{ old('vote') }}">
                    </div>
                    {{-- FORM ACTIONS --}}
                    <div class="d-flex justify-content-end pt-2">
                        <button type="reset" class="btn btn-secondary"><i
                                class="bi bi-arrow-clockwise"></i>Reset</button>
                        <button type="submit" class="btn btn-success ms-2"><i class="bi bi-plus-lg"></i>Create</button>
                    </div>
                </div>
            </div>

        </form>

    </div>

    <script>
        const placeholder = "https://www.pulsecarshalton.co.uk/wp-content/uploads/2016/08/jk-placeholder-image.jpg";

        function updatePreviewImage() {
            const coverInput = document.getElementById("cover");
            const previewCover = document.getElementById("create-preview-cover");

            if (coverInput.value) {
                previewCover.src = coverInput.value;
            } else {
                previewCover.src = placeholder;
            }
        }
    </script>
@endsection
