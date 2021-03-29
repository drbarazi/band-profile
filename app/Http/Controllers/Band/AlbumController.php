<?php

namespace App\Http\Controllers\Band;

use App\Http\Controllers\Controller;
use App\Http\Requests\Album\AlbumRequest;
use App\Models\{Album, Band};
use Illuminate\Support\Str;

class AlbumController extends Controller
{
    public function create()
    {
        return view('albums.create', [
            'title' => 'New Album',
            'bands' => Band::get(),
            'submitLabel' => 'Create',
            'album' => New Album,
        ]);
    }

    public function store(AlbumRequest $request)
    {        
        $band =  Band::find(request('band'));
        Album::create([
            'name' => request('name'),
            'slug' => Str::slug(request('name')),
            'band_id' => request('band'),
            'year' => request('year'),
        ]);
        return back()->with('status', 'Album was created into '. $band->name);
    }

    public function table()
    {
        return view('albums.table', [
            'title' => 'List Albums',
            'albums' => Album::paginate(20),
        ]);
    }

    public function edit(Album $album)
    {
        return view('albums.edit', [
            'title' => "Edit album: {$album->name}",
            'album' => $album,
            'submitLabel' => 'Update',
            'bands' => Band::get(),
        ]);
    }

    public function update(Album $album, AlbumRequest $request)
    {
        $album->update([
            'name' => request('name'),
            'slug' => Str::slug(request('name')),
            'band_id' => request('band'),
            'year' => request('year'),
        ]);
        return redirect()->route('albums.table')->with('status', 'Album was updated');
    }

    public function destroy(Album $album)
    {
        $album->delete();
    }
}
