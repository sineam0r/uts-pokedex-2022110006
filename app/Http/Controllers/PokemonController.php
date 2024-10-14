<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
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
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'hp' => 'required|integer',
            'attack' => 'required|integer',
            'defense' => 'required|integer',
            'is_legendary' => 'required|boolean',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $pokemon = Pokemon::create($validated);

        return redirect()->route('pokemon.index')->with('success', 'Pokemon created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pokemon $pokemon)
    {
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
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'hp' => 'required|integer',
            'attack' => 'required|integer',
            'defense' => 'required|integer',
            'is_legendary' => 'required|boolean',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $pokemon->update($validated);

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
}
