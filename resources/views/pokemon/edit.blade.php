@extends('layouts.app')

@section('title', 'Pokemon | UTS-Pokedex-2022110006')

@section('content')
    <div class="container p-3 rounded shadow-lg bg-white">
        <h1>Edit Pokemon</h1>
    </div>

    <div class="container mt-5 rounded shadow-lg bg-white p-3">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('pokemon.update', $pokemon->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        placeholder="Name" name="name" value="{{old('name', $pokemon->name)}}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="species">Species</label>
                        <input type="text" class="form-control @error('species') is-invalid @enderror" id="species"
                        placeholder="Species" name="species" value="{{old('species', $pokemon->species)}}">
                        @error('species')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div style="margin-top: 20px;"></div>

            <div class="form-group">
                <label for="primary_type">Primary Type</label>
                <select class="form-select @error('primary_type') is-invalid @enderror" id="primary_type" name="primary_type">
                    <option value="">Select Primary Type</option>
                    <option value="Grass" {{old('primary_type', $pokemon->primary_type) == 'Grass' ? 'selected' : ''}}>Grass</option>
                    <option value="Fire" {{old('primary_type', $pokemon->primary_type) == 'Fire' ? 'selected' : ''}}>Fire</option>
                    <option value="Water" {{old('primary_type', $pokemon->primary_type) == 'Water' ? 'selected' : ''}}>Water</option>
                    <option value="Bug" {{old('primary_type', $pokemon->primary_type) == 'Bug' ? 'selected' : ''}}>Bug</option>
                    <option value="Normal" {{old('primary_type', $pokemon->primary_type) == 'Normal' ? 'selected' : ''}}>Normal</option>
                    <option value="Poison" {{old('primary_type', $pokemon->primary_type) == 'Poison' ? 'selected' : ''}}>Poison</option>
                    <option value="Electric" {{old('primary_type', $pokemon->primary_type) == 'Electric' ? 'selected' : ''}}>Electric</option>
                    <option value="Ground" {{old('primary_type', $pokemon->primary_type) == 'Ground' ? 'selected' : ''}}>Ground</option>
                    <option value="Fairy" {{old('primary_type', $pokemon->primary_type) == 'Fairy' ? 'selected' : ''}}>Fairy</option>
                    <option value="Fighting" {{old('primary_type', $pokemon->primary_type) == 'Fighting' ? 'selected' : ''}}>Fighting</option>
                    <option value="Psychic" {{old('primary_type', $pokemon->primary_type) == 'Psychic' ? 'selected' : ''}}>Psychic</option>
                    <option value="Rock" {{old('primary_type', $pokemon->primary_type) == 'Rock' ? 'selected' : ''}}>Rock</option>
                    <option value="Ghost" {{old('primary_type', $pokemon->primary_type) == 'Ghost' ? 'selected' : ''}}>Ghost</option>
                    <option value="Ice" {{old('primary_type', $pokemon->primary_type) == 'Ice' ? 'selected' : ''}}>Ice</option>
                    <option value="Dragon" {{old('primary_type', $pokemon->primary_type) == 'Dragon' ? 'selected' : ''}}>Dragon</option>
                    <option value="Dark" {{old('primary_type', $pokemon->primary_type) == 'Dark' ? 'selected' : ''}}>Dark</option>
                    <option value="Steel" {{old('primary_type', $pokemon->primary_type) == 'Steel' ? 'selected' : ''}}>Steel</option>
                    <option value="Flying" {{old('primary_type', $pokemon->primary_type) == 'Flying' ? 'selected' : ''}}>Flying</option>
                </select>
                @error('primary_type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div style="margin-top: 20px;"></div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="weight">Weight</label>
                        <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight"
                        placeholder="Weight" name="weight" value="{{old('weight', $pokemon->weight)}}">
                        @error('weight')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="height">Height</label>
                        <input type="number" class="form-control @error('height') is-invalid @enderror" id="height"
                        placeholder="Height" name="height" value="{{old('height', $pokemon->height)}}">
                        @error('height')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div style="margin-top: 20px;"></div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="attack">Attack</label>
                        <input type="number" class="form-control @error('attack') is-invalid @enderror" id="attack"
                        placeholder="Attack" name="attack" value="{{old('attack', $pokemon->attack)}}">
                        @error('attack')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="hp">HP</label>
                        <input type="number" class="form-control @error('hp') is-invalid @enderror" id="hp"
                        placeholder="HP" name="hp" value="{{old('hp', $pokemon->hp)}}">
                        @error('hp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="defense">Defense</label>
                        <input type="number" class="form-control @error('defense') is-invalid @enderror" id="defense"
                        placeholder="Defense" name="defense" value="{{old('defense', $pokemon->defense)}}">
                        @error('defense')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div style="margin-top: 20px;"></div>

            <div class="form-check">
                <input type="hidden" name="is_legendary" value="0">
                <input class="form-check-input @error('is_legendary') is-invalid @enderror" type="checkbox" id="is_legendary" name="is_legendary" value="1" {{old('is_legendary', $pokemon->is_legendary) ? 'checked' : ''}}>
                <label class="form-check-label" for="is_legendary">Legendary</label>
                @error('is_legendary')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mt-2 mb-2">
                <label class="form-label" for="photo">Photo</label>
                <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo" id="photo" accept="image/*">
                @error('photo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div style="margin-top: 30px;"></div>

            <button type="submit" class="btn btn-primary btn-block">Save</button>
        </form>
    </div>
@endsection
