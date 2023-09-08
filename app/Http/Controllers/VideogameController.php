<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use App\Models\Videogame;
use Illuminate\Http\Request;

class VideogameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videogames = Videogame::orderBy('updated_at', 'DESC')->get();
        return view('admin.videogames.index', compact('videogames'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $platforms = Platform::select('id', 'name')->get();

        return view('admin.videogames.create', compact('platforms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $videogame = new Videogame();
        $videogame->fill($data);
        $videogame->save();

        if (array_key_exists('platforms', $data)) $videogame->platforms()->attach($data['platforms']);

        return to_route('admin.videogames.show', $videogame);
    }

    /**
     * Display the specified resource.
     */
    public function show(Videogame $videogame)
    {
        return view('admin.videogames.show', compact('videogame'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videogame $videogame)
    {

        $platforms = Platform::select('id', 'name')->get();

        $videogame_platform_ids = $videogame->platforms->pluck('id')->toArray();

        return view('admin.videogames.edit', compact('videogame', 'platforms', 'videogame_platform_ids'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Videogame $videogame)
    {
        $data = $request->all();

        $videogame->update($data);

        return redirect()->route('admin.videogames.show', $videogame->id);
    }

    // trash

    public function trash()
    {
        $videogames = Videogame::onlyTrashed()->get();
        return view('admin.videogames.trash', compact('videogames'));
    }

    public function dropAll()
    {
        Videogame::onlyTrashed()->forceDelete();
        return to_route('admin.videogames.trash')->with('alert-message', "All videogames in the trash deleted successfully")->with('alert-type', 'success');
    }

    public function drop(string $id)
    {
        $videogame = Videogame::onlyTrashed()->findOrFail($id);

        if (count($videogame->platform)) $videogame->platform()->detach();

        $videogame->forceDelete();
        return to_route('admin.videogames.trash')->with('alert-message', "Videogame '$videogame->title' deleted successfully")->with('alert-type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videogame $videogame)
    {
        $videogame->delete();
        return to_route('admin.videogames.index')->with('alert-message', "Videogame '$videogame->title' moved to trash successfully")->with('alert-type', 'success');
    }

    public function restore(string $id)
    {
        $videogame = Videogame::onlyTrashed()->findOrFail($id);

        $videogame->restore();

        return to_route('admin.videogames.trash')->with('alert-message', "Videogame '$videogame->title' restored successfully")->with('alert-type', 'success');
    }
}
