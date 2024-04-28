@extends('layouts.app')
@section('title', 'Visite')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visite</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Formulaire de Visite</div>
    
                    <div class="card-body">
                        <a href="{{ route('calendar.index') }}" class="btn btn-primary mb-3">Retour au calendrier</a>
    
                        <form action="{{ route('result.store') }}" method="post" class="mt-3">
                            @csrf
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="oui" value="oui" name="etat">
                                <label class="form-check-label" for="oui">Oui</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="non" value="non" name="etat">
                                <label class="form-check-label" for="non">Non</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="rapport" value="rapport" name="etat">
                                <label class="form-check-label" for="rapport">Rapporter</label>
                            </div>
    
                            <div class="mt-3" id="zoneoui" style="display: none;">
                                <label for="type_result" class="form-label mt-2">Resultat de Visite :</label>
                                <select class="form-select" id="type_result" name="type_result">
                                    <option value="" selected disabled>--- Type de résultat ---</option>
                                    @foreach($result as $item)
                                        <option value="{{$item->type_result}}">{{$item->type_result}}</option>
                                    @endforeach
                                </select>
    
                                <label for="comment" class="form-label mt-2">Comment / Objectif :</label>
                                <input type="text" class="form-control mt-2" id="comment" name="comment" placeholder="Comment ...">
                                <input type="hidden" value="{{ $visite->id }}" name="visite_id">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3" id="buttonSeve" style="display: none">Sauvegarder le résultat</button>
                        </form>
    
                        <form action="{{ url('result/' . $visite->id) }}" method="post" class="mt-3">
                            @csrf
                            @method('PUT')
                            <div class="mt-3" id="zoneraport" style="display: none;">
                                <label for="date_start" class="form-label mt-2">Date de début :</label>
                                <input type="date" class="form-control mt-2" name="date_start" min="{{$visite->date_start}}" value="{{ $visite->date_start }}">
                                <label for="date_h" class="form-label mt-2">Heure de Visite :</label>
                                <input type="time" class="form-control mt-2" name="date_h" value="{{ $visite->date_h }}">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3" id="buttonUp" style="display: none">Mettre à jour</button>
                        </form>
    
                        <form action="{{route('emails.sendMail')}}" method="POST" class="mt-3">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="email" value="{{$visite->client->email}}"  style="display: none">
                                <input type='checkbox' id="idEmail" style="display: none">
                                <label for="" id="label" style="display: none"> checked to send email</label>
                                <div id="form" style="display: none">
                                    <select name="type_message" id="idSelected" class="form-select" onchange="showMessage()">
                                        <option value="" selected disabled>--- Type de message ---</option>
                                        @foreach($model as $item)
                                            <option value="{{$item->id}}" data-text="{{$item->message}}">{{$item->type_message}}</option>
                                        @endforeach
                                    </select>
                                    <textarea name="message" id="message" cols="30" rows="10" class="form-control mt-2">{{$item->message}}</textarea>
                                </div>
                            </div>
                            <button type="submit" id="sendEmail" style="display: none" class="btn btn-success mb-5">Envoyer le mail</button>
                        </form>
    
                        <form action="{{route('resultNon.store_2')}}" method="POST" class="mt-3">
                            @csrf
                            <input type="hidden" name="visite_id" value="{{$visite->id}}">
                            <input class="form-check-input" type="hidden" id="non" value="non" name="etat">
                            <button type="submit" id="addResult" style="display: none" class="btn btn-success mt-3">Sauvegarder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script>
            function showMessage() {
                var selectedOption = document.querySelector("#idSelected option:checked");
                var message = selectedOption.getAttribute("data-text");
                    document.getElementById("message").value = message;
                }
                $(document).ready(function() {
                $('#buttonSeve').click(function() {
                    $('#sendEmail').click();
                });

                $('input[type="checkbox"]').change(function() {
                    if ($(this).prop("checked")) {
                        $("#form").show();
                    } else {
                        $("#form").hide();
                    }
                });

                $('input[type="radio"]').change(function() {
                    var id = $(this).attr("id");
                    
                    $("#zoneoui, #buttonSeve, #sendEmail, #idEmail, #form, #zoneraport,#label, #buttonUp, #addResult").hide();

                    if (id === "oui") {
                        $("#zoneoui, #buttonSeve, #sendEmail, #idEmail,#label").show();
                    } else if (id === "rapport") {
                        $("#zoneraport, #buttonUp").show();
                    } else if (id === "non") {
                        $("#addResult").show();
                    }
                });
            });

    </script>
</body>
</html>
@endsection