@extends('layouts.app')

@section('title', 'Register')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <form action="{{route('auth.register')}}" method="post">
        @csrf
        <label for="">Nom :</label>
        <input type="text" name="nom">
        @error('nom')
            <span class="text-danger">{{$message}}</span>
        @enderror
        <br>
        <label for="">Prenom :</label>
        <input type="text" name="prenom">
        @error('prenom')
            <span class="text-danger">{{$message}}</span>
        @enderror
        <br>
        <label for="">Tel :</label>
        <input type="text" name="tel">
        @error('tel')
            <span class="text-danger">{{$message}}</span>
        @enderror
        <br>
        <label for="">Adress :</label>
        <input type="text" name="adress">
        @error('adress')
            <span class="text-danger">{{$message}}</span>
        @enderror
        <br>
        <label for="">Email :</label>
        <input type="email" name="email">
        @error('email')
            <span class="text-danger">{{$message}}</span>
        @enderror
        <br>
        <label for="">Password :</label>
        <input type="password" name="password">
        @error('password')
            <span class="text-danger">{{$message}}</span>
        @enderror
        <br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
@endsection