@extends('layouts.app')

@section('content')

<style>
    .container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>

<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-6 bg-white">
            <canvas id="chart"></canvas>
        </div>
        <div class="col-md-6 bg-white">
            <canvas id="mychart"></canvas>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('chart').getContext('2d');
        var chart = new Chart(ctx, {
            type:'bar',
            data: {
                labels:{!! json_encode($labels) !!},
                datasets: {!! json_encode($datasets) !!}
            }
        });

        var ctx2 = document.getElementById('mychart').getContext('2d');
        var chart2 = new Chart(ctx2, {
            type:'bar',
            data: {
                labels:{!! json_encode($visitByCommercial->pluck('nom')) !!},
                datasets: [{
                    label: 'Visites par commercial',
                    data: {!! json_encode($visitByCommercial->pluck('count')) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            }
        });
    </script>
@endsection
