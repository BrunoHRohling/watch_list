<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemStoreRequest;
use App\Models\WatchItems;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index(Request $request): View
    {
        $q = trim($request->get('q', ''));
        $s = trim($request->get('s', ''));
        $t = trim($request->get('t', ''));

        $query = WatchItems::query()
            ->where('title', 'like', "%{$q}%");

        if (!empty($s)) $query->where('status', '=', $s);
        if (!empty($t)) $query->where('type', '=', $t);

        $items = $query->latest()->paginate(10)->withQueryString(); // mantém ?q=... nos links de paginação

        return view('index', compact('items', 'q', 's', 't'));
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

    public function status(WatchItems $item, Request $request): RedirectResponse
    {
        $item->update($request->validate([
            'status' => 'required|in:planned,watching,watched,dropped'
        ]));
        return redirect()->route('items.index');
    }
}
