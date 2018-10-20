<?php
$host='148.66.138.153';
$uname='emergencyRoot';
$pwd='emergencyPass';
$db="emergencydb";

$conn = new mysqli($host,$uname,$pwd, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


//0 for failed, 1 for success

        // prepare and bind


$stmt = $conn->prepare("INSERT INTO `clientprofile` (`clientUN`, `fname`, `mname`, `lname`, `age`, `gender`, `cont`, `address`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
$stmt->bind_param("ssssisss", $user, $fname, $mname, $lname, $age, $gender, $cont, $add );

// set parameters and execute

$user = $_REQUEST['user'];
$fname = $_REQUEST['fname'];
$mname = $_REQUEST['mname'];
$lname = $_REQUEST['lname'];
$age = $_REQUEST['age'];
$gender = $_REQUEST['gender'];
$cont = $_REQUEST['cont'];
$add = $_REQUEST['add'];

$stmt->execute();


//INSERT INTO `emapz`.`notifs` (`clientUN`, `date_Time`, `lati`, `longi`, `method`) 
//        VALUES ('+639178806503', '2017-11-09 16:46:26', '122.8559436', '10.1737101', 'SMS');
//$success = mysql_query("INSERT INTO notifs (clientUN, lati, longi, helpType) "
//            . " VALUES('$user','$lat','$long','$') ",$con) or die ("error insert");
$flag['code'] = mysqli_errno($conn);
//1062 for duplicate
//0 for SUCCESS, means no error

print(json_encode($flag));

