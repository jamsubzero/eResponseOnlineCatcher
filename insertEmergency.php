<?php
//$host='localhost';
//$uname='root';
//$pwd='';
//$db="emapz";
//========
$host='localhost';
$uname='emerge15_root';
$pwd='emerPass';
$db="emerge15_emergency";

$conn = new mysqli($host,$uname,$pwd, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$flag['code']=0;
//0 for failed, 1 for success

        // prepare and bind
$stmt = $conn->prepare("INSERT INTO notifs (clientUN, date_Time, lati, longi, method)"
        . " VALUES (?, (date_add(now(), INTERVAL 15 hour)) ,?, ?, 'Online')");
$stmt->bind_param("sss", $user, $lat, $long);

// set parameters and execute

$user = $_REQUEST['clientUN'];
$lat = $_REQUEST['lati'];
$long = $_REQUEST['longi'];
$success = $stmt->execute();


//INSERT INTO `emapz`.`notifs` (`clientUN`, `date_Time`, `lati`, `longi`, `method`) 
//        VALUES ('+639178806503', '2017-11-09 16:46:26', '122.8559436', '10.1737101', 'SMS');
//$success = mysql_query("INSERT INTO notifs (clientUN, lati, longi, helpType) "
//            . " VALUES('$user','$lat','$long','$') ",$con) or die ("error insert");
if($success){
$flag['code']=1;
}
print(json_encode($flag));
?>




