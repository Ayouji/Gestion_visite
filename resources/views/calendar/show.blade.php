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
<body><div class="container">
    <a href="{{ route('calendar.index') }}" class="btn btn-primary mt-3">Retour au calendrier</a>
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
            <input type="text" class="form-control" name="type_result" placeholder="Resultat de Visite ...">
            <input type="text" class="form-control mt-3" name="comment" placeholder="Comment ...">
            <input type="hidden" value="{{ $visite->id }}" name="visite_id" style="display: none">
        </div>
        <button type="submit" class="btn btn-primary mt-3" id="buttonSeve" style="display: none">Save result</button>
    </form>

    <form action="{{ url('result/' . $visite->id) }}" method="post" class="mt-3">
        @csrf
        @method('PUT')
        <div class="mt-3" id="zoneraport" style="display: none;">
            <input type="date" class="form-control" name="date_start" min="{{$visite->date_start}}" value="{{ $visite->date_start }}">
            <input type="time" class="form-control mt-3" name="date_h" value="{{ $visite->date_h }}">
        </div>
        <button type="submit" class="btn btn-primary mt-3" id="buttonUp" style="display: none">Update</button>
    </form>
</div>
<form action="{{route('emails.sendMail')}}" method="POST">
    @csrf
    <div class="d-flex justify-content-center mb-5">
        <input type="text" name="email" value="{{$visite->client->email}}"  style="display: none">
    <button type="submit" id="sendEmail" style="display: none" class="btn btn-success right-2 mt-3">Send Email</button>
    </div>    
</form>

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
                } else if ($(this).attr("id") === "rapport") {
                    $("#zoneraport").show();
                    $("#buttonUp").show();
                    $("#zoneoui").hide();
                    $("#buttonSeve").hide();
                    $("#sendEmail").hide();
                } else {
                    $("#sendEmail").hide();
                    $("#zoneoui").hide();
                    $("#zoneraport",).hide();
                    $("#buttonSeve").hide();
                    $("#buttonUp").hide();
                }
            });
        });
</script>
</body>
</html>