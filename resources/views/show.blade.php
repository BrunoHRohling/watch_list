@extends('layouts.app')

@section('title', 'Show Item')

@section('content')

    <nav>
        <a href="{{ route('items.index') }}">Go back</a>
    </nav>

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

    <div>
        <form action="{{ route('items.destroy', ['item' => $item]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endsection
