<?php

namespace App\Http\Controllers;

use App\Models\DogEar;
use App\Models\Collection;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DogEarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collections = Collection::latest()->get();
        return view('dogears.index', [ 'dogears' => DogEar::latest()->simplePaginate(10), 'collections' => $collections ]);
    }

    public function user(int $id) {
        $user = User::where('id', $id)->first();
        $collections = $user->collections()->get();
        return view('user.show', [ 'title' => $user->name, 'dogears' => $user->dogears()->latest()->simplePaginate(10), 'collections' => $collections ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $collections = $user->collections()->get();
        return view('dogears.create', [ 'title' => 'Add link', 'collections' => $collections ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
        ]);

        $dogear = DogEar::where('url', $request->url)->first();

        if (!$dogear){
            $link = new \Spekulatius\PHPScraper\PHPScraper;
            $link->go($request->url);

            $dogear = DogEar::create([
                'url' => $request->url,
                'name' => $link->title,
                'description' => Str::of( $link->description )->limit( 200 ),
                'headings' => $this->r_implode( "\n", $link->headings ),
                'paragraphs' => $this->r_implode( "\n", $link->paragraphs ),
            ]);

            $keywords = $link->keywords();
            foreach($keywords as $keyword) {
                $tag = Tag::where('name', $keyword)->first() ??  Tag::create([
                    'name' => $keyword,
                    'slug' => Str::slug($keyword),
                ]);
                $dogear->tags()->attach($tag->id);
            }
        }

        $user = Auth::user();
        $dogear->users()->detach($user->id);
        $dogear->users()->attach($user->id);

        if($request->collection) {
            $dogear->collections()->detach();
            $dogear->collections()->attach($request->collection);
        }


        return redirect( route('dogears.show',['id' => $dogear->id]) );
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $dogear = DogEar::where('id', $id)->first();
        if(!$dogear)
        {
            return redirect( route('dogears') );
        }
        return view('dogears.show', [ 'title' => $dogear->name, 'dogear' => $dogear ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $dogear = DogEar::where('id', $id)->first();
        $tags = Tag::latest()->get();
        $collections = Collection::latest()->get();
        if(!$dogear)
        {
            return redirect( route('dogears') );
        }
        return view('dogears.edit', [ 'title' => $dogear->name, 'dogear' => $dogear, 'tags' => $tags, 'collections' => $collections ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'url' => 'required|url',
            'name' => 'required',
            'description' => 'required',
            'collections' => 'required',
        ]);
        $dogear = DogEar::where('id', $id)->first();
        $dogear->name = $request->name;
        $dogear->description = $request->description;
        $dogear->collections()->detach();
        if(0!==$request->collections){
            $dogear->collections()->attach($request->collections);
        }
        $dogear->save();
        return view('dogears.show', [ 'title' => $dogear->name, 'dogear' => $dogear ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $dogear = DogEar::find($id);
        $user = Auth::user();
        $dogear->users()->detach($user->id);
        if(0===count($dogear->users()->get()))
        {
            $dogear->delete();
        }
        return redirect( route('dogears') );
    }

    /**
     * Recursive implode function.
     */
    function r_implode( $glue, $pieces )
    {
        $value = [];
        foreach($pieces as $piece)
        {
            if( is_array( $piece ) )
            {
                $value[] = $this->r_implode( $glue, $piece );
            }
            else
            {
                $value[] = trim( $piece );
            }
          }
          return implode( $glue, $value );
    }
}
