<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PokemonController extends Controller
{
    /**
     * Create a new controller instance.
     *
     *
     */
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pokemons = Pokemon::paginate(20);
        return view('pokemon.index', compact('pokemons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pokemon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:pokemon|max:255',
            'species' => 'required|max:100',
            'primary_type' => 'required|max:50',
            'weight' => 'required|numeric|max_digits:8',
            'height' => 'required|numeric|max_digits:8',
            'hp' => 'required|integer|max_digits:4',
            'attack' => 'required|integer|max_digits:4',
            'defense' => 'required|integer|max_digits:4',
            'is_legendary' => 'required|boolean',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $validated['is_legendary'] = $request->input('is_legendary', 0) ? true : false;

        $pokemon = Pokemon::create($validated);

        if ($request->hasFile('photo')) {
            $this->storeImage($pokemon, $request->file('photo'));
        }

        return redirect()->route('pokemon.index')->with('success', 'Pokemon created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pokemon $pokemon)
    {
        session(['previous_url' => url()->previous()]);
        return view('pokemon.show', compact('pokemon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemon $pokemon)
    {
        return view('pokemon.edit', compact('pokemon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pokemon $pokemon)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'species' => 'required|max:100',
            'primary_type' => 'required|max:50',
            'weight' => 'required|numeric|max_digits:8',
            'height' => 'required|numeric|max_digits:8',
            'hp' => 'required|integer|max_digits:4',
            'attack' => 'required|integer|max_digits:4',
            'defense' => 'required|integer|max_digits:4',
            'is_legendary' => 'required|boolean',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $pokemon->update($validated);

        if ($request->hasFile('photo')) {
            if ($pokemon->photo) {
                Storage::delete($pokemon->photo);
            }
            $this->storeImage($pokemon, $request->file('photo'));
        }

        return redirect()->route('pokemon.index')->with('success', 'Pokemon updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        $pokemon->delete();

        return redirect()->route('pokemon.index')->with('success', 'Pokemon deleted successfully');
    }

    private function storeImage(Pokemon $pokemon, $file)
    {
        $filePath = $file->store('public');
        $pokemon->update(['photo' => Storage::url($filePath)]);
    }
}
