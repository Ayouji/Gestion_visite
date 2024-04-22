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
@error('fail')
        <span class="text-danger">{{$message}}</span>
@enderror
<body>
    <form action="{{route('auth.store')}}" method="post">
        @csrf
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
        <input type="submit" value="login">
    </form>
</body>
</html>
@endsection