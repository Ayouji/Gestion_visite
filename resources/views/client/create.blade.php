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
        <br><br><br><br>
        <form action="{{ route('client.store') }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="nom">Nom client</label>
                @error('nom')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="text" class="form-control mb-3" name="nom" placeholder="Nom client">
            </div>
            <div class="form-group mb-3">
                <label for="tel">Téléphone client</label>
                @error('tel')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="text" class="form-control mb-3" name="tel" placeholder="Téléphone client">
            </div>
            <div class="form-group mb-3">
                <label for="adress">Adresse client</label>
                @error('adress')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="text" class="form-control mb-3" name="adress" placeholder="Adresse client">
            </div>
            <div class="form-group mb-3">
                <label for="email">Email client</label>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="text" class="form-control mb-3" name="email" placeholder="Email client">
            </div>
            <button type="submit" class="btn btn-primary mb-3">Créer</button>
            <a href="{{ url('admin/client') }}" >Retour au Client</a>
        </form>
    </div>
@endsection
