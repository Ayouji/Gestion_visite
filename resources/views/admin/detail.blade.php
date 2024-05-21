@extends('layouts.app')

@section('title', 'Visite Details')

@section('content')
<div>
    
    <br><div class="container">
        <div class="row text-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-success">Résultat validé</h5>
                        <p class="card-text">{{$etatoui ?? '0'}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Résultat non validé</h5>
                        <p class="card-text">{{$etatnon ?? '0'}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-warning">Résultat rapporté</h5>
                        <p class="card-text">{{$etatrapor ?? '0'}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <br><br>
        <a class="btn btn-primary mb-3" href="{{ url('admin/commercial') }} ">Return Admin</a>
    <table class="table table-bordered table-striped text-center bg-white">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date_Start</th>
                <th>Time</th>
                <th>type_visite</th>
                <th>Objectif</th>
                <th>Resulte (etat)</th>
                <th>type_result</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($result as $item)
            <tr>
                <td>{{$item->result_id}}</td>
                <td>{{$item->visite->date_start}}</td>
                <td>{{$item->visite->date_h}}</td>
                <td>{{$item->visite->type_visite}}</td>
                <td>{{$item->visite->objectif}}</td>
                @if($item->etat === 'oui')
                    <td class="text-success">{{$item->etat}}</td>
                @elseif($item->etat === 'non')
                    <td class="text-danger">{{$item->etat}}</td>
                @else
                    <td class="text-warning">{{$item->etat}}</td>
                @endif
                <td>{{$item->type_result}}</td>
            </tr>
            @empty
                <tr>
                    <td colspan="7"> Aucun résultat trouvé!</td>
                </tr>
            @endforelse 
        </tbody>
    </table>
    
</div>
@endsection