@extends('layouts.app')

@section('title', 'Create Client')

@section('content')
@if(session('delete'))
        <div class="alert alert-success">
            {{ session('delete') }}
        </div>
    @endif
@if (session('succes'))
<div class="alert alert-success">
    {{ session('succes') }}
</div>
@endif
<div>
    <a href="{{url('client/create')}}" class="btn btn-primary mb-3">Create Cleint </a>

    <h4>La liste des client avec leurs contact :</h4>
    <table class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Tel</th>
                <th>Adress</th>
                <th>Nom contact</th>
                <th>Tel contact</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($client as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nom}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->tel}}</td>
                <td>{{$item->adress}}</td>
                <td>
                    <select class="form-control w-100 text-center" name="" id="">
                        <option value="" selected disabled>--- Nom Contact ---</option>
                            @foreach($item->contactte as $contact)
                                    <option value="">{{$contact->nom}} {{$contact->prenom}}</option>
                            @endforeach
                    </select>
                </td>
                <td>
                    <select class="form-control w-100 text-center" name="" id="">
                        <option value="" selected disabled>--- Tel Contact ---</option>
                            @foreach($item->contactte as $contact)
                                    <option value="">{{$contact->tel}}</option>
                            @endforeach
                    </select>
                </td>
                <td>
                    <a href="{{url('contact/create/')}}">create</a>
                    <a href="{{url('client/destroy/'.$item->id)}}">delete</a> 
                 </td> 
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
@endsection