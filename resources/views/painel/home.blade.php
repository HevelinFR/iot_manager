@extends('painel.main')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
      const  type = ['line', 'bar', 'polarArea', 'doughnut', 'radar', 'polarArea'];
</script>

<div class="container-fluid">
    {{$msg}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">
        @foreach($ambientes as $ambiente)

        @foreach($ambiente->dispositivos as $idDispositivo => $dispositivo)
        <!-- Area Chart -->
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{$ambiente->nome}} - {{$dispositivo->nome}}</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="chart-{{ $dispositivo->id }}" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
        </div>
    
        @php
            $labels = [];

            foreach($dispositivo->amostras as $amostra){
                $labels[] = $amostra->created_at;
            }

            $data = [];

            foreach($dispositivo->amostras as $amostra){
                $data[] = strval($amostra->value);
            }

        @endphp

        <script>
            const ctx<?=$dispositivo->id?> = document.getElementById('chart-{{ $dispositivo->id }}');

            new Chart(ctx<?=$dispositivo->id?>, {
                type: type['{{$idDispositivo}}'],
                data: {
                    labels: <?=json_encode($labels)?>,
                    datasets: [{
                        label: '{{ $dispositivo->nome }}',
                        data: <?=json_encode($data)?>,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
        @endforeach

        @endforeach
    </div>

</div>


<!-- @foreach($ambientes as $ambiente)

<div class="wrapper-container">
    <h1>{{$ambiente->nome}}</h1>

    <div style="text-align: center; width:100%">
        @foreach($ambiente->dispositivos as $dispositivo)

        <canvas id="chart"></canvas>
        @endforeach
    </div>

</div>





@endforeach -->

@endsection