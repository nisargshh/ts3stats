<?php
//error_reporting(0);
require_once 'config/db.php';
require_once 'config/ts3server.php';

$url = "http://api.planetteamspeak.com/serverhistory/$tsip/?duration=1";  //API
$content = file_get_contents($url);
$result = json_decode($content, true);
//PUTTING THE TIMESTAMP AND NO. OF CLIENTS IN DATABASE!
foreach ($result['result']['data'] as $key => $mydata) {        //$key = TIMESTAMP, $mydata = clients
    $time = explode(" ", $key);                                 //SEPERATE TIME AND DATE [DATE=$TIME[0],TIME=$TIME[1]]

  //SQL QUERY TO CHECK IF DATA ALREADY EXISTS
    $sql = "SELECT * FROM users WHERE dated='". $time[0] ."' AND timed='". $time[1] ."'";
    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if (mysqli_num_rows($query) > 0) {      //DATA ALREADY EXISTS
    } else {       //DATA DOESNT EXIST
    $sql = "INSERT INTO users (dated, timed, clients) VALUES ('$time[0]', '$time[1]', '$mydata')";
        if (mysqli_query($conn, $sql)) {
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

//GROUPING ALL THE DATES
$sql = "SELECT dated FROM users GROUP BY dated ";
$result = mysqli_query($conn, $sql);
$dates = array();
while ($r = mysqli_fetch_assoc($result)) {
    $dates[] = $r['dated'];
}
$nodates = sizeof($dates);

//GETTING MAX CLIENTS PER DAY
$clientmax = array();
for ($i=0; $i < $nodates; $i++) {
    $sql = "SELECT MAX(clients) AS avgclients FROM users WHERE dated='" . $dates[$i] . "'";
    $query = mysqli_query($conn, $sql);
    $avg = mysqli_fetch_assoc($query);
    $clientmax[] = $avg['avgclients'];
}

//GETTING AVG CLIENTS PER DAY
$clientavg = array();
for ($i=0; $i < $nodates; $i++) {
    $sql = "SELECT AVG(clients) AS avgclients FROM users WHERE dated='" . $dates[$i] . "'";
    $query = mysqli_query($conn, $sql);
    $avg = mysqli_fetch_assoc($query);
    $clientavg[] = $avg['avgclients'];
}
