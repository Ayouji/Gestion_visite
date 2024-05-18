@extends('layouts.app')

@section('title', 'Détails de la Visite')

@section('content')
<div class="container">
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
<br><br><a href="{{ route('calendar.index') }}" class="btn btn-primary mb-3">Retour au calendrier</a>
    <div class="card">
        
        <div class="card-header">
            <h3 class="mb-0">Détails de la Visite</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th class="font-weight-bold">ID:</th>
                            <td>{{$vresult->result_id}}</td>
                        </tr>
                        <tr>
                            <th class="font-weight-bold">Date de Début:</th>
                            <td>{{$vresult->visite->date_start}}</td>
                        </tr>
                        <tr>
                            <th class="font-weight-bold">Type de Visite:</th>
                            <td>{{$vresult->visite->type_visite}}</td>
                        </tr>
                        <tr>
                            <th class="font-weight-bold">Objectif:</th>
                            <td>{{$vresult->visite->objectif}}</td>
                        </tr>
                        <tr>
                            <th class="font-weight-bold">Résultat (État):</th>
                            <td class="@if($vresult->etat === 'oui') text-success @else text-danger @endif">{{$vresult->etat}}</td>
                        </tr>
                        <tr>
                            <th class="font-weight-bold">Type de Résultat:</th>
                            <td>{{$vresult->type_result}}</td>
                        </tr>
                        <tr>
                            <th class="font-weight-bold">Commentaire:</th>
                            <td>{{$vresult->comment}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
