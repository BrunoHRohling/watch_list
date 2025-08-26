@extends('layouts.app')

@section('title', 'Show Item')

@section('content')

    <nav>
        <a href="{{ route('items.index') }}">Go back</a>
    </nav>

    @isset($item->poster_url)
        <img src="{{ $item->poster_url }}" alt="Item image">
    @else
        <img src="{{ asset('storage/images/Image-not-found.png') }}" alt="Item image">
    @endisset

    <div>
        <p>Title: {{ $item->title }}</p>
    </div>

    <div>
        <p>Type: {{ $item->type }}</p>
    </div>

    <div>
        <p>Year: {{ $item->year }}</p>
    </div>

    <div>
        <p>Status: {{ $item->status }}</p>
    </div>

    <div>
        <p>Rating: {{ $item->rating }}</p>
    </div>

    <div>
        <p>Notes: {{ $item->notes }}</p>
    </div>

    <div>
        <p>Created at: {{ $item->created_at }}</p>
    </div>

    <div>
        <p>Updated at: {{ $item->updated_at }}</p>
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
