@extends('layout.app')

@section('title', 'Create Item')

@section('content')
    <form action="{{ route('items.store') }}" method="POST">
        @csrf

        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}">
            @error('title')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="type">Type</label>
            <select name="type" id="type">
                <option value="">---</option>
                <option value="movie">Movie</option>
                <option value="series">Series</option>
            </select>
            @error('type')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="year">Year (Opcional)</label>
            <input type="number" id="year" name="year" value="{{ old('year') }}">
            @error('year')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="poster_url">Poster Url (Opcional)</label>
            <input type="url" id="poster_url" name="poster_url" value="{{ old('poster_url') }}">
            @error('poster_url')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="">---</option>
                <option value="planned">Planned</option>
                <option value="watching">Watching</option>
                <option value="watched">Watched</option>
                <option value="dropped">Dropped</option>
            </select>
            @error('status')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="rating">Rating (Opcional)</label>
            <input type="number" id="rating" name="rating" value="{{ old('rating') }}">
            @error('rating')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="notes">Notes (Opcional)</label>
            <textarea name="notes" id="notes">{{ old('notes') }}</textarea>
            @error('notes')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit">Add To List</button>
        </div>
    </form>
@endsection
