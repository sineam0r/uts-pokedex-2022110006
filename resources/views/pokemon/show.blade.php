@extends('layouts.app')

@section('title', 'Pokemon | UTS-Pokedex-2022110006')

@section('content')
    <div class="container p-3 rounded shadow-lg bg-white">
        <div class="card-header mb-3">
            <h3 class="card-title">Pokemon Details</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">ID</th>
                        <td>{{$padded = Str::padLeft($pokemon->id , 4, '0');}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Name</th>
                        <td>{{$pokemon->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Species</th>
                        <td>{{$pokemon->species}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Primary Type</th>
                        <td>{{$pokemon->primary_type}}</td>
                    </tr>
                    <tr>
                        <th scope="row">HP</th>
                        <td>{{$pokemon->hp}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Attack</th>
                        <td>{{$pokemon->attack}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Defense</th>
                        <td>{{$pokemon->defense}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Power</th>
                        <td>{{$pokemon->hp + $pokemon->attack + $pokemon->defense}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Legendary?</th>
                        <td>{{$pokemon->is_legendary ? 'Yes' : 'No'}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Photo</th>
                        <td><img src="{{ asset('storage/' . $pokemon->photo) }}" class="img-thumbnail w-25"></td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-4">
                <a href="{{ session('previous_url', route('pokemon.index')) }}" class="btn btn-secondary">
                    Back
                </a>
            </div>
        </div>
    </div>
@endsection

