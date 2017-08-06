<?php
require_once 'main.php';
?>

<!DOCTYPE html>
<html>
<head>
  <!--Load the AJAX API-->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">

  google.charts.load("current", {packages:["calendar"]});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var dates = <?php echo json_encode($dates); ?>;
    var clientmax = <?php echo json_encode($clientmax); ?>;
    var data = <?php echo json_encode($data); ?>;
    var newdates = dates.toString();
    var firstdates, firstdate, maxclients;
    firstdates = dates[0];
    firstdate = new Date(firstdates);


    var dataTable = new google.visualization.DataTable();
       dataTable.addColumn({ type: 'date', id: 'Date'});
       dataTable.addColumn({ type: 'number', id: 'Max Clients'});

       for (var i = 0; i < dates.length; i++) {
             firstdates = dates[i];
             firstdate = new Date(firstdates);
             maxclients = clientmax[i];
             dataTable.addRows([[firstdate, parseInt(maxclients)]]);
       }

  // Set chart options

  var chart = new google.visualization.Calendar(document.getElementById('calendar_basic'));
  var options = {
         title: "Teamspeak Statistics",
         tooltip: {isHtml: true},
         focusTarget: 'category',
         height: 1000000000000000,
         noDataPattern: {
           backgroundColor: '#ADAAA9',
           color: ''
         }
  };
  chart.draw(dataTable, options);
}
</script>
</head>

<body>
  <!--Div that will hold the pie chart-->
  <div id="calendar_basic" style="width: 1000px; height: 350px;"></div>
</body>
</html>
