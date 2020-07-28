<section id="principal">
<script src="js/Chart.min.js" ></script>
<canvas id="myChart"></canvas>
<script>
<?php
   require_once("php/venta.php");
   $obj = new Venta();
   $Cliente = $obj->cliente();
   $total = $obj->total();

?>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [ <?php echo $cliente; ?> ],
        datasets: [{
            label: 'Grafica de Venta',
            data: [<?php echo $total; ?>],
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