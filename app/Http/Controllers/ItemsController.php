<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemStoreRequest;
use App\Models\WatchItems;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ItemsController extends Controller
{
    public function index(): View
    {
        return view('index', ['items' => WatchItems::all()]);
    }

    public function show(WatchItems $item): View
    {
        return view('show', ['item' => $item]);
    }

    public function store(ItemStoreRequest $request): RedirectResponse
    {
        $item = WatchItems::create($request->validated());
        return redirect()->route('items.show', ['item' => $item]);
    }

    public function edit(WatchItems $item): View
    {
        return view('edit', ['item' => $item]);
    }

    public function update(WatchItems $item, ItemStoreRequest $request): RedirectResponse
    {
        $item->update($request->validated());
        return redirect()->route('items.show', ['item' => $item]);
    }

    public function delete(WatchItems $item): RedirectResponse
    {
        $item->delete();
        return redirect()->route('items.index');
    }

    // public function status(WatchItems $item, ItemStoreRequest $request): RedirectResponse
    // {
    //     $item->update($request->validate([
    //         'status' => 'required|in:planned,watching,watched,dropped'
    //     ]));
    //     return redirect()->route('items.index');
    // }
}
