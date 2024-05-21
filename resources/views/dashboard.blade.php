@extends('layouts.app')

@section('title', 'Dashboard')


@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
  <br><br><br><br>
    <div class="container">
        <div class="row">
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
             <div class="col-6 ">
          <div class="carousel-item active" data-bs-interval="2000">
            <img src="{{ asset('img/img2.png') }}" class="d-block w-100" alt="...">
            <p >Bienvenue dans votre compte de calendrier</p>
         
          </div></div>
         
          <div class="col-6">
          <div class="carousel-item">
            <img src="{{ asset('img/img4.png') }}" class="d-block w-100" alt="...">
           <p> Vous pouvez sélectionner vos visites à votre page de calendrier.
           </p>
             
         
          </div></div>
        <div class="col-6">
          <div class="carousel-item">
            <img src="{{ asset('img/img3.png') }}" class="d-block w-100" alt="...">
           <P>Vous pouvez ajuster l'heure et le sujet avec le client et son administrateur.</P>
         
          </div></div>
         <div class="col-6"> 
          <div class="carousel-item">
            <img src="{{ asset('img/img5.png') }}" class="d-block w-100" alt="...">
            <p >Sélectionnez le résultat de cette visite ou modifiez la date
               et Vous pouvez envoyer email à le client</p>
         
          </div></div>
          
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
         data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
         data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden"></span>
        </button>
      </div>
      

  
</body>
   
</html>
@endsection
