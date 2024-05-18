<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Réinitialisation de mot de passe</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .card {
            max-width: 600px;
            margin: 20px auto;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .card-header {
            background-image: linear-gradient(144deg, #AF40FF, #5B42F3 50%, #00DDEB);
            color: #fff;
            text-align: center;
            padding: 15px;
            font-size: 1.25rem;
        }
        .card-body {
            padding: 20px;
        }
        .button-63 {
            align-items: center;
            background-image: linear-gradient(144deg, #AF40FF, #5B42F3 50%, #00DDEB);
            border: 0;
            border-radius: 8px;
            box-shadow: rgba(163, 145, 184, 0.2) 0 15px 30px -5px;
            box-sizing: border-box;
            color: #fff;
            display: inline-flex;
            font-family: 'Phantomsans', sans-serif;
            font-size: 15px;
            justify-content: center;
            line-height: 1em;
            max-width: 100%;
            min-width: 140px;
            padding: 19px 24px;
            text-decoration: none;
            user-select: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            Réinitialisation de mot de passe
        </div>
        <div class="card-body">
            <p>Bonjour,</p>
            <p>Nous avons reçu une demande de réinitialisation de votre mot de passe. Cliquez sur le bouton ci-dessous pour réinitialiser votre mot de passe :</p>
            <div class="text-center">
                <a href="{{ route('reset.password', $token) }}" class="button-63">Réinitialiser le mot de passe</a>
            </div>
        </div>
    </div>
</body>
</html>
