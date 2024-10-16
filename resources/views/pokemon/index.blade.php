@extends('layouts.app')

@section('title', 'Pokemon | UTS-Pokedex-2022110006')

@section('content')
    <div class="container p-3 rounded shadow-lg bg-white">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="me-auto">Pokemon</h1>
            <div class="d-flex">
                <a href="{{ route('pokedex') }}" class="btn btn-secondary me-2">
                    Back to Pokedex
                </a>
                <a href="{{ route('pokemon.create') }}" class="btn btn-primary">
                    Create New Pokemon
                </a>
            </div>
        </div>
    </div>

    <div class="container mt-5 rounded shadow-lg bg-white p-3">
        <table class="table table-bordered table-hover mb-4 text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Species</th>
                    <th scope="col">Primary Type</th>
                    <th scope="col">Power</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pokemons as $pokemon)
                    <tr>
                        <td>{{ $padded = Str::padLeft($pokemon->id , 4, '0'); }}</td>
                        <td>{{ $pokemon->name }}</td>
                        <td>{{ $pokemon->species }}</td>
                        <td>{{ $pokemon->primary_type }}</td>
                        <td>{{ $pokemon->hp+ $pokemon->attack + $pokemon->defense }}</td>
                        <td>
                            <a href="{{ route('pokemon.show', $pokemon->id) }}" class="btn btn-success">
                                Detail
                            </a>
                            <a href="{{ route('pokemon.edit', $pokemon->id) }}" class="btn btn-warning">
                                Edit
                            </a>
                            <form action="{{ route('pokemon.destroy', $pokemon->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No records found!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Aktifkan pagination jika diperlukan --}}
        <div class="mt-5 d-flex justify-content-center">
            {!! $pokemons->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection
