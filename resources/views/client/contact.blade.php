@extends('layouts.app')

@section('title', 'client')

@section('content')
    <div class="container">
        @if(session('succes'))
            <div class="alert alert-success">
                {{ session('succes') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('contact.store_2') }}" method="post">
            @csrf
            <div class="form-group">
                <select class="form-control mb-3" name="client_id">
                    <option value="" selected disabled>--- Sélectionnez un client ---</option>
                    @foreach($client as $item)
                        <option value="{{ $item->id }}">{{ $item->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="nom">Nom Contact</label>
                @error('nom')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="text" class="form-control mb-3" name="nom" placeholder="Nom client">
            </div>
            <div class="form-group">
                <label for="prenom">Prénom Contact</label>
                @error('prenom')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="text" class="form-control mb-3" name="prenom" placeholder="Prénom client">
            </div>
            <div class="form-group">
                <label for="tel">Téléphone Contact</label>
                @error('tel')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="text" class="form-control mb-3" name="tel" placeholder="Téléphone client">
            </div>
            <button type="submit" class="btn btn-primary mb-3">Créer</button>
        </form>
    </div>
@endsection
