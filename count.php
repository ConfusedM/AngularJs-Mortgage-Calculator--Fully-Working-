<?php

$pri = $_POST["pri"];
$yr1 = $_POST["int1"];
$yr2 = $_POST["int2"];
$yr3 = $_POST["int3"];
$yr4 = $_POST["int4"];
$yr5 = $_POST["int5"];
$yrs = $_POST["yrs"];

function monrate($x){

	return $x/1200;

}

function powerof($monrate, $periodleft){


	return pow(1 + $monrate,$periodleft);

}


function countmonth1($pri, $yr1, $yrs){


	return ($pri * monrate($yr1) * powerof(monrate($yr1), $yrs)) / (powerof(monrate($yr1), $yrs) - 1);

}


echo countmonth1($pri, $yr1, $yrs*12);

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<table>
		<tr>
			<th>Month</th>
			<th>Payment</th>
			<th>Beginning Principal</th>
			<th>Interest</th>
			<th>Principal Paid</th>
			<th>Final Principal</th>
		</tr>
	</table>

</body>
</html>