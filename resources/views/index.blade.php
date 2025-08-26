@extends('layouts.app')

@section('title', 'Watch List')

@section('content')
    <nav>
        <a href="{{ route('items.create') }}" class="link">Add Item</a>
    </nav>

    <div class="flex flex-row">
        <form action="{{ route('items.index') }}" method="GET">
            <div class="">
                <label for="q">Search by title:</label>
                <input type="text" id="q" name="q" value="{{ request('q') }}" placeholder="Type a title...">
            </div>
            <div>
                <label for="s">Filter by status:</label>
                <select name="s" id="s">
                    <option value="">---</option>
                    <option value="planned">Planned</option>
                    <option value="watching">Watching</option>
                    <option value="watched">Watched</option>
                    <option value="dropped">Dropped</option>
                </select>
            </div>
            <div>
                <label for="t">Filter by type:</label>
                <select name="t" id="t">
                    <option value="">---</option>
                    <option value="movie">Movie</option>
                    <option value="series">Series</option>
                </select>
            </div>
            <div>
                <button type="submit">Search</button>
            </div>
            @if (request(['q', 's', 't']))
                <div>
                    <a href="{{ route('items.index') }}">Clear</a>
                </div>
            @endif
        </form>
    </div>

    @forelse ($items as $item)
        <div>
            @isset($item->poster_url)
                <img src="{{ $item->poster_url }}" alt="Item image">
            @else
                <img src="{{ asset('storage/images/Image-not-found.png') }}" alt="Item image">
            @endisset

            <div>
                <a href="{{ route('items.show', ['item' => $item]) }}">
                    {{ $item->title }}
                    @isset($item->year)
                        ({{ $item->year }})
                    @endisset
                </a>
            </div>

            <div>
                <form action="{{ route('items.rating', ['item' => $item]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="rating"></label>
                        <input type="number" id="rating_{{ $item->id }}" name="rating" value="{{ $item->rating }}">
                        @error('rating')
                            <p>{{ $message }}</p>
                        @enderror

                        <button type="submit">Update rating</button>
                    </div>
                </form>
            </div>

            <div>
                <form action="{{ route('items.status', ['item' => $item]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="status"></label>
                        <select name="status" id="status_{{ $item->id }}">
                            <option value="planned" {{ $item->status == 'planned' ? 'selected' : '' }}>Planned</option>
                            <option value="watching" {{ $item->status == 'watching' ? 'selected' : '' }}>Watching</option>
                            <option value="watched" {{ $item->status == 'watched' ? 'selected' : '' }}>Watched</option>
                            <option value="dropped" {{ $item->status == 'dropped' ? 'selected' : '' }}>Dropped</option>
                        </select>
                        @error('status')
                            <p>{{ $message }}</p>
                        @enderror

                        <button type="submit">Update status</button>
                    </div>
                </form>
            </div>

            <div>
                <a href="{{ route('items.edit', ['item' => $item]) }}">Edit</a>
            </div>

            <div>
                <form action="{{ route('items.destroy', ['item' => $item]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </div>

        </div>
    @empty
        <div>There is no watch list!</div>
    @endforelse

    @if ($items->count())
        <nav>
            {{ $items->links() }}
        </nav>
    @endif
@endsection
