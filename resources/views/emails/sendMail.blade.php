<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Félicitations</title>
</head>
<body>  

    
    <p>Cher ,{{$mailData['nom']}}</p>
    
    {{-- <p>Nous sommes ravis de vous féliciter pour votre réussite exceptionnelle ! Votre travail acharné, votre dévouement et votre persévérance ont porté leurs fruits, et nous sommes extrêmement fiers de vous.</p>
    
    <p>Votre succès est une source d'inspiration pour tous ceux qui vous entourent, et nous sommes convaincus que vous continuerez à briller dans toutes vos entreprises futures.</p>
    
    <p>Continuez à viser haut et à poursuivre vos rêves avec détermination. Nous vous soutenons à chaque étape de votre parcours.</p>

    <p>Félicitations encore une fois, et tous nos meilleurs vœux pour l'avenir !</p> --}}

    <pre>
        {{$mailData['body']}}
    </pre>
    
    <p>Bien cordialement,</p>
    <p>Ayoujil</p>
</body>
</html>
