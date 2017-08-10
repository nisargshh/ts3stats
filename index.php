<?php
require 'main.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js" integrity="sha256-SiHXR50l06UwJvHhFY4e5vzwq75vEHH+8fFNpkXePr0=" crossorigin="anonymous"></script>
  <script type="text/javascript">
  var dates = <?php echo json_encode($dates); ?>;
  var maxusers = <?php echo json_encode($clientmax); ?>;
  </script>
</head>
<body>
  <canvas id="myChart" style="position: relative; height:40vh; width:80vw"></canvas>
  <script type="text/javascript">
  var ctx = document.getElementById('myChart').getContext('2d');
  var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
      labels: dates,
      datasets: [{
        label: "Max Users",
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: maxusers,
      }]
    },

    // Configuration options go here
    options: {}
  });
  </script>
</body>
</html>
