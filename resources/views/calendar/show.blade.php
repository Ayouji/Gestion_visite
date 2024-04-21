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
    
<div class="container">
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

                        <div class="mt-3" id="zoneoui" style="display: none">
                            <label for="" class="mt-2">Resultat de Visite : </label>
                            <input type="text" class="form-control mt-2" name="type_result" placeholder="Resultat de Visite ...">
                            <label for="" class="mt-2">Comment / Objectif : </label>
                            <input type="text" class="form-control mt-2" name="comment" placeholder="Comment ...">
                            <input type="hidden" value="{{ $visite->id }}" name="visite_id" style="display: none">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3" id="buttonSeve" style="display: none">Save result</button>
                    </form>

                    <form action="{{ url('result/' . $visite->id) }}" method="post" class="mt-3">
                        @csrf
                        @method('PUT')
                        <div class="mt-3" id="zoneraport" style="display: none;">
                            <label for="" class="mt-2">Date_start : </label>
                            <input type="date" class="form-control mt-2" name="date_start" min="{{$visite->date_start}}" value="{{ $visite->date_start }}">
                            <label for="" class="mt-2">Heure de Visite : </label>
                            <input type="time" class="form-control mt-2" name="date_h" value="{{ $visite->date_h }}">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3" id="buttonUp" style="display: none">Update</button>
                    </form>
                    <form action="{{route('emails.sendMail')}}" method="POST">
                        @csrf
                        <div class="d-flex justify-content-center mb-5">
                            <input type="text" name="email" value="{{$visite->client->email}}"  style="display: none">
                        </div>
                        <button type="submit" id="sendEmail" style="display: none" class="btn btn-success mb-5">Send Email</button>
                    </form>
                    <form action="{{route('resultNon.store_2')}}" method="POST">
                        @csrf
                        <div class="d-flex justify-content-center mb-5">
                            <input type="text" name="visite_id" value="{{$visite->id}}" style="display:none">
                            <input class="form-check-input" type="text" id="non" value="non" name="etat" style="display: none">
                        </div>
                        <button type="submit" id="addResult" style="display : none" class="btn btn-success mt-3">save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    
    $(document).ready(function() {
            $('#buttonSeve').click(function() {
            $('#sendEmail').click();
        });
            $('input[type="radio"]').change(function() {
                if ($(this).attr("id") === "oui") {
                    $("#zoneoui").show();
                    $("#buttonSeve").show();
                    $("#sendEmail").show();
                    $("#zoneraport").hide();
                    $("#buttonUp").hide();
                    $("#addResult").hide();
                } else if ($(this).attr("id") === "rapport") {
                    $("#zoneraport").show();
                    $("#buttonUp").show();
                    $("#zoneoui").hide();
                    $("#buttonSeve").hide();
                    $("#sendEmail").hide();
                    $("#addResult").hide();
                }else if($(this).attr("id") === "non"){
                    $("#addResult").show();
                    $("#zoneoui").hide();
                    $("#buttonSeve").hide();
                    $("#sendEmail").hide();
                    $("#zoneraport").hide();
                    $("#buttonUp").hide();

                }
                else {
                    $("#sendEmail").hide();
                    $("#zoneoui").hide();
                    $("#zoneraport",).hide();
                    $("#buttonSeve").hide();
                    $("#buttonUp").hide();
                    $("#addResult").hide();
                }
            });
        });
    </script>
</body>
</html>
@endsection