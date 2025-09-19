@extends('layouts.app')

@section('title', 'Watch List')

@section('content')
    <nav class="flex flex-row">
        <a href="{{ route('items.create') }}" class="button border-blue-900 text-blue-900">Add Item</a>
    </nav>

    <form action="{{ route('items.index') }}" method="GET">
        <div class="search-filter">
            <div class="p-1 grid">
                <label for="q" class="font-medium">Title:</label>
                <input type="text" id="q" name="q" value="{{ request('q') }}" placeholder="Type a title..."
                    class="border-1 rounded-md p-1">
            </div>
            <div class="p-1 grid">
                <label for="s" class="font-medium">Status:</label>
                <select name="s" id="s" class="border-1 rounded-md p-1">
                    <option value="">---</option>
                    <option value="planned">Planned</option>
                    <option value="watching">Watching</option>
                    <option value="watched">Watched</option>
                    <option value="dropped">Dropped</option>
                </select>
            </div>
            <div class="p-1 grid">
                <label for="t" class="font-medium">Type:</label>
                <select name="t" id="t" class="border-1 rounded-md p-1">
                    <option value="">---</option>
                    <option value="movie">Movie</option>
                    <option value="series">Series</option>
                </select>
            </div>
            <div class="p-1 grid">
                <button type="submit" class="bg-blue-600 rounded-lg text-white font-medium p-2 h-10 mt-5">Search</button>
            </div>
            @if (request(['q', 's', 't']))
                <div class="p-1 grid">
                    <a href="{{ route('items.index') }}" class="button text-blue-800 h-10 mt-5">Clear</a>
                </div>
            @endif
        </div>
    </form>

    <div class="grid grid-cols-4">
        @forelse ($items as $item)
            <div class="col-auto m-2">
                <div class="p-2 my-2 text-center">
                    <a href="{{ route('items.show', ['item' => $item]) }}" class="font-medium text-blue-700">
                        {{ $item->title }}

                        @isset($item->year)
                            ({{ $item->year }})
                        @endisset

                        <div class="grid justify-center">
                            @isset($item->poster_url)
                                <img src="{{ $item->poster_url }}" alt="Item image" class="rounded-4xl" height="100%">
                            @else
                                <img src="{{ asset('storage/images/Image-not-found.png') }}" alt="Item image" class="rounded-4xl" height="100%">
                            @endisset
                        </div>
                    </a>
                </div>

                <div class="my-2">
                    <form action="{{ route('items.rating', ['item' => $item]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div>
                            <label for="rating" class="">Rating: </label>
                            <input type="number" id="rating_{{ $item->id }}" name="rating"
                                value="{{ $item->rating }}">
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
                                <option value="watching" {{ $item->status == 'watching' ? 'selected' : '' }}>Watching
                                </option>
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
    </div>

    @if ($items->count())
        <nav>
            {{ $items->links() }}
        </nav>
    @endif
@endsection
