<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
//$host='localhost';
//$uname='root';
//$pwd='';
//$db="emapz";
//========
$host='148.66.138.153';
$uname='emergencyRoot';
$pwd='emergencyPass';
$db="emergencydb";
//==========================
$conn = new mysqli($host,$uname,$pwd, $db);

$stmt = $conn->prepare("INSERT INTO emergencydb.notifsbebers (clientUN, date_Time, lati, longi, type, method)"
        . " VALUES (?, (date_add(now(), INTERVAL 15 hour)),?, ?, ?, 'Online')");
$stmt->bind_param("ssss", $user, $lat, $long, $type);

// set parameters and execute
$user = filter_input(INPUT_GET, 'clientUN');
$lat = filter_input(INPUT_GET, 'lati');
$long = filter_input(INPUT_GET, 'longi');
$type = filter_input(INPUT_GET, 'type');

$stmt->execute();
     
//INSERT INTO `emapz`.`notifs` (`clientUN`, `date_Time`, `lati`, `longi`, `method`) 
//        VALUES ('+639178806503', '2017-11-09 16:46:26', '122.8559436', '10.1737101', 'SMS');
//$success = mysql_query("INSERT INTO notifs (clientUN, lati, longi, helpType) "
//            . " VALUES('$user','$lat','$long','$') ",$con) or die ("error insert");
$flag['code'] = mysqli_errno($conn);
//1062 for duplicate
//0 for SUCCESS, means no error

print(json_encode($flag));
?>




