@extends('layout.app')

@section('title', 'Watch List')

@section('content')
    <a href="{{ route('items.create') }}">Add Item</a>

    @forelse ($items as $item)
        <div>
            <a href="{{ route('items.show', ['item' => $item]) }}">{{ $item->title }}</a>
        </div>
    @empty
        <div>There is no watch list!</div>
    @endforelse
@endsection
