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
  var avgusers = <?php echo json_encode($clientavg); ?>;
  </script>
</head>
<body>
  <table>
    <tr>
      <td><canvas id="maxChart" style="position: relative; height:45vh; width:100vw"></canvas></td>
    </tr>
    <tr>
      <td><canvas id="avgChart" style="position: relative; height:45vh; width:100vw"></canvas></td>
    </tr>
  </table>

  <script type="text/javascript">
  var ctx = document.getElementById('maxChart').getContext('2d');
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

  <script type="text/javascript">
  var ctx = document.getElementById('avgChart').getContext('2d');
  var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
      labels: dates,
      datasets: [{
        label: "AVG Users",
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: avgusers,
      }]
    },

    // Configuration options go here
    options: {}
  });
  </script>
</body>
</html>
