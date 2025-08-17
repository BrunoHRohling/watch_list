@extends('layout.app')

@section('title', 'Show Item')

@section('content')

    <div>
        <p>{{ $item->title }}</p>
    </div>

    <div>
        <p>{{ $item->type }}</p>
    </div>

    <div>
        <p>{{ $item->year }}</p>
    </div>

    <div>
        <p>{{ $item->status }}</p>
    </div>

    <div>
        <p>{{ $item->rating }}</p>
    </div>

    <div>
        <p>{{ $item->poster_url }}</p>
    </div>

    <div>
        <p>{{ $item->notes }}</p>
    </div>

    <div>
        <p>{{ $item->created_at }}</p>
    </div>

    <div>
        <p>{{ $item->updated_at }}</p>
    </div>

    <div>
        <a href="{{ route('items.edit', ['item' => $item]) }}">Edit</a>
    </div>

    {{-- <div>
        <form action="{{ route('items.status', ['item' => $item]) }}" method="POST">
            @csrf
            @method('PATCH')
            <div>
                <label for="status">Status</label>
                <select name="status" id="status">
                    <option value="planned" {{ $item->status == 'planned' ? 'selected' : '' }}>Planned</option>
                    <option value="watching" {{ $item->status == 'watching' ? 'selected' : '' }}>Watching</option>
                    <option value="watched" {{ $item->status == 'watched' ? 'selected' : '' }}>Watched</option>
                    <option value="dropped" {{ $item->status == 'dropped' ? 'selected' : '' }}>Dropped</option>
                </select>
            </div>
            <div>
                <button type="submit">Update Status</button>
            </div>
        </form>
    </div> --}}

    <div>
        <form action="{{ route('items.destroy', ['item' => $item]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endsection
