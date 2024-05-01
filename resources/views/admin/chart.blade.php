@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="chart"></canvas>

    <script>
        var ctx = document.getElementById('chart').getContext('2d');
        var chart = new Chart(ctx, {
            type:'bar',
            data: {
                labels:{!! json_encode($labels) !!},
                datasets: {!! json_encode($datasets) !!}
            }
        })
    </script>
</body>
</html>
@endsection
