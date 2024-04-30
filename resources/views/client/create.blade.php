@extends('layouts.app')

@section('title', 'client')

@section('content')
    <div>
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
        <form action="{{route('client.store')}}" method="post">
            @csrf
                <label for="">Nom client</label>
                @error('nom')
                    <div class="text-danger">{{$message}}</div>
                @enderror
                <input type="text" name="nom" placeholder="Nom client"><br>
                <label for="">Tel client</label>
                @error('tel')
                    <div class="text-danger">{{$message}}</div>
                @enderror
                <input type="text" name="tel" placeholder="Tel client"><br>
                <label for="">Adress client</label>
                @error('adress')
                    <div class="text-danger">{{$message}}</div>
                @enderror
                <input type="text" name="adress" placeholder="Adress client"><br>
                <label for="">Email client</label>
                @error('email')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <input type="text" name="email" placeholder="Email client"><br>
                <input type="submit" value="create">
        </form>
    </div>
@endsection
