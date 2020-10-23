
<div class="row container mt-5">
    <div class="col-4">
        <div class="box_dash p-4 rounded">
            <span class="font-weight-bold h4"> Desempenho </span> Tempo real
            <span class="d-block"> serviços de hoje </span>
            <span class="h2">
                <?= $services ?> 
            </span>Serviços
        </div>
    </div>
    <div class="col-4"> 
        <div class="box_dash p-4 rounded">
            <div class="h4"> usuários cadastrados: </div>
            <h1 class="h2 text-center">
                <?= $users ?>
            </h1>
        </div>
    </div>
    <div class="col-4">
        <div class="box_dash p-4 rounded">
            <div class="h4"> parceiros cadastrados: </div>
            <h1 class="h2 text-center">
                <?= $parters ?>
            </h1>
        </div>
    </div>
    <div class="w-100"></div>
    <div class="col mt-5">
        <div class="h4">
        Desempenho da semana:
        </div>
        <div id="chart">
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>

<script>
      $.get('https://localhost/Projects/easyWork/admin/getChart', res => {

        var chart = document.getElementById('chart')
        var ctx = document.getElementById('myChart').getContext('2d');
        
        let data = JSON.parse(res)
        let label = []
        let days = []

        data.forEach(element => {
            label.push(element[1])
            days.push(element[0])
        });

            var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: label,
                datasets: [{
                    label: "Dias do mes",
                    data: days,
                    backgroundColor: [
                        '#4a91ee',
                        '#4a91ee',
                        '#4a91ee',
                        '#4a91ee',
                        '#4a91ee',
                        '#4a91ee',
                        '#4a91ee'
                    ],
                    borderColor: [
                        '#4a91ee',
                        '#4a91ee',
                        '#4a91ee',
                        '#4a91ee',
                        '#4a91ee',
                        '#4a91ee',
                        '#4a91ee'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    })  

</script>