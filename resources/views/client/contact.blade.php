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
        <form action="{{route('contact.store_2')}}" method="post">
            @csrf
                <select class="form-control w-75 text-center" name="client_id" id="">
                    <option value="" selected disabled>--- Selelct Client ---</option>
                        @foreach($client as $item)
                                <option value="{{$item->id}}">{{$item->nom}}</option>
                        @endforeach
                </select><br>
                <label for="">Nom Contact</label>
                @error('nom')
                    <div class="text-danger">{{$message}}</div>
                @enderror
                <input type="text" name="nom" placeholder="Nom client"><br>
                <label for="">Prenom client</label>
                @error('prenom')
                    <div class="text-danger">{{$message}}</div>
                @enderror
                <input type="text" name="prenom" placeholder="Prenom client"><br>
                <label for="">Tel client</label>
                @error('tel')
                    <div class="text-danger">{{$message}}</div>
                @enderror
                <input type="text" name="tel" placeholder="Tel client"><br>
                <input type="submit" value="create">
        </form>
    </div>
@endsection
