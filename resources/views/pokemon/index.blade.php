@extends('layouts.template')

@section('title', 'Pokemon | UTS-Pokedex-2022110006')

@section('body')
    <div class="container p-3 rounded shadow-lg bg-white">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Pokemon</h1>
            <a href="{{ route('pokemon.create') }}" class="btn btn-primary">
                Create New Pokemon
            </a>
        </div>
    </div>

    <div class="container mt-5 rounded shadow-lg bg-white p-3">
        <div class="row mb-3">
            <div class="col text-end">
                <form action="{{ route('pokemon.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control fs-5" placeholder="Search Pokemon" value="{{ request()->query('search') }}">
                        <button class="btn btn-primary fs-5" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
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
                {{-- @foreach ($pokemons as $pokemon)
                    <tr>
                        <td>{{ $pokemon->id }}</td>
                        <td>{{ $pokemon->name }}</td>
                        <td>{{ $pokemon->species }}</td>
                        <td>{{ $pokemon->primary_type }}</td>
                        <td>{{ $pokemon->power }}</td>
                        <td>
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
                @endforeach --}}
            </tbody>
        </table>
        <div class="mt-5 d-flex justify-content-center">
            {{-- {!! $pokemons->links('pagination::bootstrap-5') !!} --}}
        </div>
    </div>
@endsection
