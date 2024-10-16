@extends('layouts.app')

@section('title', 'Pokemon | UTS-Pokedex-2022110006')

@section('content')
    <div class="container p-3 rounded shadow-lg bg-white">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Pokedex</h1>
            <a href="{{ route('pokemon.index') }}" class="btn btn-primary">
                Pokemon list
            </a>
        </div>
    </div>

    <div class="container mt-5 rounded shadow-lg bg-white p-3">
        <div class="row">
            @forelse ($pokemons as $pokemon)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . Str::after($pokemon->photo, 'public/')) }}" class="card-img-top" alt="{{ $pokemon->name }}">
                        <div class="card-body">
                            <p class="card-text" style="text-align: left">
                                #<strong>{{ Str::padLeft($pokemon->id, 4, '0') }}</strong>
                            </p>
                            <h5 class="card-title">
                                <a href="{{ route('pokemon.show', $pokemon->id) }}" style="text-align: left">{{ $pokemon->name }}</a>
                            </h5>
                            <span class="badge rounded-pill {{ $pokemon->primary_type === 'Fire' ? 'bg-danger' : ($pokemon->primary_type === 'Water' ? 'bg-primary' : ($pokemon->primary_type === 'Grass' ? 'bg-success' : 'bg-secondary')) }}">{{ $pokemon->primary_type }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning text-center">No records found!</div>
                </div>
            @endforelse
        </div>
        <div class="mt-5 d-flex justify-content-center">
            {!! $pokemons->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection

