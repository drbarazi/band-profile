<?php

namespace App\Http\Controllers\Band;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\{Genre, Band};
use App\Http\Requests\Band\BandRequest;
use Illuminate\Support\Facades\Storage;

class BandController extends Controller
{

    public function table()
    {
        return view('bands.table', [
            'bands' => Band::latest()->paginate(20),
        ]);
    }

    public function create()
    {
       
        return view('bands.create', [
            'genres' => Genre::get(),
            'band' => new Band,
            'submitLabel' => 'Create',
        ]);
    }

    public function store(BandRequest $request)
    {
        request()->validate([
            'name' => 'required|unique:bands,name',
            'thumbnail' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'genres' => 'required|array'
        ]);
        
        $band = Band::create([
            'name' => $request->name,
            'slug' => Str::slug(request('name')),
            'thumbnail' => request('thumbnail') ? request()->file('thumbnail')->store('images/band') : null,
        ]);
        $band->genres()->sync(request('genres'));

        return back()->with('success', 'Band was created');
    }

    public function edit(Band $band)
    {
        return view('bands.edit', [
            'band' => $band,
            'genres' =>  Genre::get(),
            'submitLabel' => 'Update',
        ]);
    }

    public function update(Band $band, BandRequest $request)
    {
        
        
        if(request('thumbnail')) {
            Storage::delete($band->thumbnail);
            $thumbnail = request()->file('thumbnail')->store('images/band');
        } elseif($band->thumbnail) {
            $thumbnail = $band->thumbnail;
        } else {
            $thumbnail = null;
        }

        $band->update([
            'name' => request('name'),
            'slug' => Str::slug(request('name')),
            'thumbnail' => $thumbnail,
        ]);
        $band->genres()->sync(request('genres'));

        return  redirect()->route('bands.table')->with('update', 'Band was updated');
    }

    public function destroy(Band $band)
    {
        Storage::delete($band->thumbnail);
        $band->genres()->detach();
        $band->albums()->delete();
        $band->delete();
    }
}
