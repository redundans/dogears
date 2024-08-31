<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DogEar;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function show(Request $request)
    {
        $dogears = DogEar::search(trim($request->search) ?? '')->simplePaginate(10);
        return view('dogears.index', [ 'title' => 'Search: ' . trim($request->search), 'dogears' => $dogears ]);
    }
}
