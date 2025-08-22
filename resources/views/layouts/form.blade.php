@extends('layouts.app')

@section('title', isset($item) ? 'Edit Item' : 'Add Item')

@section('content')
    <form action="{{ isset($item) ? route('items.update', ['item' => $item]) : route('items.store') }}" method="POST">
        @csrf
        @isset($item)
            @method('PUT')
        @endisset

        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ $item->title ?? old('title') }}">
            @error('title')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="type">Type</label>
            <select name="type" id="type">
                <option value="">---</option>
                <option value="movie"
                    @isset($item)
                        {{ $item->type == 'movie' ? 'selected' : '' }}
                    @else
                        {{ old('type') == 'movie' ? 'selected' : '' }}
                    @endisset>
                    Movie</option>
                <option value="series"
                    @isset($item)
                        {{ $item->type == 'series' ? 'selected' : '' }}
                    @else
                        {{ old('type') == 'series' ? 'selected' : '' }}
                    @endisset>
                    Series</option>
            </select>
            @error('type')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="year">Year (Opcional)</label>
            <input type="number" id="year" name="year" value="{{ $item->year ?? old('year') }}">
            @error('year')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="poster_url">Poster Url (Opcional)</label>
            <input type="url" id="poster_url" name="poster_url" value="{{ $item->poster_url ?? old('poster_url') }}">
            @error('poster_url')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="">---</option>
                <option value="planned"
                    @isset($item)
                        {{ $item->status == 'planned' ? 'selected' : '' }}
                    @else
                        {{ old('status') == 'planned' ? 'selected' : '' }}
                    @endisset>
                    Planned
                </option>
                <option value="watching"
                    @isset($item)
                        {{ $item->status == 'watching' ? 'selected' : '' }}
                    @else
                        {{ old('status') == 'watching' ? 'selected' : '' }}
                    @endisset>
                    Watching
                </option>
                <option value="watched"
                    @isset($item)
                        {{ $item->status == 'watched' ? 'selected' : '' }}
                    @else
                        {{ old('status') == 'watched' ? 'selected' : '' }}
                    @endisset>
                    Watched
                </option>
                <option value="dropped"
                    @isset($item)
                        {{ $item->status == 'dropped' ? 'selected' : '' }}
                    @else
                        {{ old('status') == 'dropped' ? 'selected' : '' }}
                    @endisset>
                    Dropped
                </option>
            </select>
            @error('status')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="rating">Rating (Opcional)</label>
            <input type="number" id="rating" name="rating" value="{{ $item->rating ?? old('rating') }}">
            @error('rating')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="notes">Notes (Opcional)</label>
            <textarea name="notes" id="notes">{{ $item->notes ?? old('notes') }}</textarea>
            @error('notes')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit">
                @isset($item)
                    Update
                @else
                    Add
                @endisset
            </button>
            @isset($item)
                <a href="{{ route('items.show', ['item' => $item]) }}">Cancel</a>
            @else
                <a href="{{ route('items.index') }}">Cancel</a>
            @endisset
        </div>
    </form>
@endsection
