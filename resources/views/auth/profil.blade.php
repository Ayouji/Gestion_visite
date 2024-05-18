@extends('layouts.app')

@section('title', 'profil')
@section('content')

<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-6">
             @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center mb-4">Profil</h1>
                    <form action="{{ route('profil.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 w-100">
                            <input type="file" class="form-control-file text-right mr-5 w-75" id="image" name="image">
                            <img src="{{Storage::url($user->image) ?? ''}} " class="img-fluid" width="100px" alt="Profile Image">
                            
                        </div>
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom :</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="{{$user->nom}}">
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prenom :</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" value="{{$user->prenom}}">
                        </div>
                        <div class="mb-3">
                            <label for="tel" class="form-label">Tel :</label>
                            <input type="text" class="form-control" id="tel" name="tel" value="{{$user->tel}}">
                        </div>
                        <div class="mb-3">
                            <label for="adress" class="form-label">Adresse :</label>
                            <input type="text" class="form-control" id="adress" name="adress" value="{{$user->adress}}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email :</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
                        </div>
                        <input type="submit" class="form-control" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
