<section id="principal">
<script src="js/Chart.min.js" ></script>
<canvas id="myChart"></canvas>
<script>
<?php
   require_once("php/materiaprima.php");
   $obj = new Materiaprima();
   $nombre = $obj->nombre();
   $existencias = $obj->existencias();

?>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [ <?php echo $nombre; ?> ],
        datasets: [{
            label: 'Grafica de Materia prima',
            data: [<?php echo $existencias; ?>],
            backgroundColor:"rgba (100,100,255,0.5)",
            borderColor: "blue",  
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
</section>