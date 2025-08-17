@extends('layout.app')

@section('title', 'Edit Item')

@section('content')
    <form action="{{ route('items.update', ['item' => $item]) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ $item->title }}">
            @error('title')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="type">Type</label>
            <select name="type" id="type">
                <option value="">---</option>
                <option value="movie" {{ $item->type == 'movie' ? 'selected' : '' }}>Movie</option>
                <option value="series" {{ $item->type == 'series' ? 'selected' : '' }}>Series</option>
            </select>
            @error('type')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="year">Year (Opcional)</label>
            <input type="number" id="year" name="year" value="{{ $item->year }}">
            @error('year')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="poster_url">Poster Url (Opcional)</label>
            <input type="url" id="poster_url" name="poster_url" value="{{ $item->poster_url }}">
            @error('poster_url')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="">---</option>
                <option value="planned" {{ $item->status == 'planned' ? 'selected' : '' }}>Planned</option>
                <option value="watching" {{ $item->status == 'watching' ? 'selected' : '' }}>Watching</option>
                <option value="watched" {{ $item->status == 'watched' ? 'selected' : '' }}>Watched</option>
                <option value="dropped" {{ $item->status == 'dropped' ? 'selected' : '' }}>Dropped</option>
            </select>
            @error('status')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="rating">Rating (Opcional)</label>
            <input type="number" id="rating" name="rating" value="{{ $item->rating }}">
            @error('rating')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="notes">Notes (Opcional)</label>
            <textarea name="notes" id="notes">{{ $item->notes }}</textarea>
            @error('notes')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit">Update</button>
        </div>
    </form>
@endsection
