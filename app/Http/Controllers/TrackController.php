<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Track;
use Inertia\Inertia;
use Illuminate\Support\Str;

class TrackController extends Controller
{
    public function index(){
        $tracks = Track::where('display', true)->orderby('artist')->get();

        return Inertia::render('Tracks/index', ['tracks' => $tracks]);
    }

    public function create(){
        return Inertia::render('Tracks/create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'artist' => ['required', 'string', 'min:3','max:255'],
            'display' => ['required', 'boolean'],
            'image' => ['required', 'image', 'mimes:jpg,png,svg', 'max:10000'],
            'music' => ['required', 'file', 'mimes:mp3,wav', 'max:10000'],
        ]);

        $uuid = Str::uuid();

        $imageExt = $request->image->extension();
        $imagePath = $request->image->storeAs('storage/tracks/images', $uuid . '.' . $imageExt);

        $musicExt = $request->music->extension();
        $musicPath = $request->music->storeAs('tracks/musics', $uuid . '.' . $musicExt);

        Track::create([
            'uuid' =>  $uuid,
            'title' => $request->title,
            'artist' => $request->artist,
            'display' => $request->display,
            'image' => $imagePath,
            'music' => $musicPath
        ]);

        return redirect()->route('tracks.index');
    }

    public function edit(Track $track){
        return Inertia::render('Tracks/edit', ['track' => $track]);
    }

    public function update(Request $request, Track $track){
        $request->validate([
            'title' => ['required', 'string', 'min:3','max:255'],
            'artist' => ['required', 'string', 'min:3','max:255'],
            'display' => ['required', 'boolean']
        ]);

        $track->title = $request->title;
        $track->artist = $request->artist;
        $track->display = $request->display;
        $track->save();

        return redirect()->route('tracks.index');
    }

    public function destroy(Request $request, Track $track){
        $track->delete();

        return redirect()->route('tracks.index');
    }
}
