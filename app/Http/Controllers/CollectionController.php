<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('collections.index', [ 'title' => 'Collections', 'collections' => Collection::latest()->get() ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('collections.create', [ 'title' => 'New collection', 'collections' => Collection::latest()->get() ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:4',
        ]);

        $validated['slug'] = Str::slug($request->name);

        $request->user()->collections()->create($validated);

        return redirect('collections');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $collection = Collection::where('id', $id)->first();
        $collections = Collection::latest()->get();

        return view('dogears.index', [ 'title' => 'Collection: ' . $collection->name, 'dogears' => $collection->dogears()->simplePaginate(10), 'collections' => $collections ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collection $collection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Collection $collection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collection $collection)
    {
        //
    }
}
