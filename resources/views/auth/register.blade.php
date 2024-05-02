@extends('layouts.app')

@section('title', 'Register')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('fail'))
                <div class="alert alert-danger" role="alert">
                    {{ session('fail') }}
                </div>
            @endif
            <form action="{{ route('auth.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom :</label>
                    <input type="text" class="form-control" id="nom" name="nom">
                    @error('nom')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom :</label>
                    <input type="text" class="form-control" id="prenom" name="prenom">
                    @error('prenom')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tel" class="form-label">Téléphone :</label>
                    <input type="text" class="form-control" id="tel" name="tel">
                    @error('tel')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="adress" class="form-label">Adresse :</label>
                    <input type="text" class="form-control" id="adress" name="adress">
                    @error('adress')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email :</label>
                    <input type="email" class="form-control" id="email" name="email">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password :</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Photo :</label>
                    <input type="file" class="form-control" id="image" name="image" >
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                <a href="{{ url('/') }}" class="btn btn-link">Login</a>
            </form>
        </div>
    </div>
</div>
@endsection
