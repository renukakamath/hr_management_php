<?php
include 'connection.php';
$a=$_POST['id'];
$sql="SELECT *,sum(extra_hour) as sumh FROM `overtime` inner join employee using (employee_id) where employee_id='$a'";
// $result=mysqli_query( $con,$sql);
// $row = mysqli_fetch_assoc($result);
$otime=select($sql)[0]['sumh'];

$salary=select($sql)[0]['salary'];

$total=$otime*200;


$last=$total+$salary;

$response = array(
    'value1' => $otime,
    'value2' => $last
);

// Encode the array as a JSON object
$json_response = json_encode($response);


echo $json_response;
?>
